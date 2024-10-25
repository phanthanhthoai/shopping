<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\StorageImageTrait;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AdminProductControler extends Controller
{
    use StorageImageTrait;

    private $category;
    private $htmlSelect;
    private $product;
    private $productImage;
    public function __construct(Category $category,Product $product,ProductImage $productImage)
    {
        $this->category= $category;
        $this->product = $product;
        $this->productImage= $productImage;
    }
    public function index()
    {
        Paginator::useBootstrap();
        $products= $this->product->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }
    public function create()
    {
        $htmlOption=$this->categoryRecursive(null);
        return view('admin.product.add', compact('htmlOption'));
    }
    public function edit($id)
    {
        $product = $this->product->find($id);
        // $category = DB::table('categories')->find($product->category_id);
        $htmlOption=$this->categoryRecursive($product->category_id);
        return view('admin.product.edit',compact('product','htmlOption'));
    }
    public function delete($id)
    {
        try{
            $this->product->find($id)->delete();
            return response([
                'code' =>200,
                'message'=> 'success'
            ],200);

        }catch (\Exception $exception){
            Log::error('Message: '.$exception->getMessage().'Line : '.$exception->getLine());
            return response()->json([
                'code' =>500,
                'message' => 'fail',
            ],500);
        }
    }
    public function update(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $dataProductUpdate =[
                'name' => $request->name,
                'price' => $request->price,
                'content'=> $request->contents,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id
            ];
            $dataImage= $this->storageTraitUpload($request,'feature_image_path','product');
            if(!empty($dataImage)){
                $dataProductUpdate['feature_image_name']= $dataImage['file_name'];
                $dataProductUpdate['feature_image_path']= $dataImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product= $this->product->find($id);
    
            // thrm vao product_images
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('adminproduct.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line : '.$exception->getLine());
        }
        
    }

    public function save(ProductRequest $request)
    {
        try{
            DB::beginTransaction();
            $dataProductCreate =[
                'name' => $request->name,
                'price' => $request->price,
                'content'=> $request->contents,
                'user_id' => Auth::id(),
                'category_id' => $request->category_id
            ];
            $dataImage= $this->storageTraitUpload($request,'feature_image_path','product');
            if(!empty($dataImage)){
                $dataProductCreate['feature_image_name']= $dataImage['file_name'];
                $dataProductCreate['feature_image_path']= $dataImage['file_path'];
            }
            $product=$this->product->create($dataProductCreate);
    
            // thrm vao product_images
            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('adminproduct.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line : '.$exception->getLine());
        }
        
    }
    public function categoryRecursive($parent_id,$id=0, $text='')
    {
        $data = Category::all();
        foreach( $data as $value){
            if($value['parent_id']== $id){
                if(!empty($parent_id) && $parent_id == $value['id']){
                    $this->htmlSelect.= "<option selected value=".$value['id'].">".$text.$value['name']."</option>";
                }else{
                    $this->htmlSelect.= "<option value=".$value['id'].">".$text.$value['name']."</option>";
                }
                $this->categoryRecursive($parent_id,$value['id'],"-");
            }
        }
        return $this->htmlSelect;
    }
}
