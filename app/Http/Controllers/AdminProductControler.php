<?php

namespace App\Http\Controllers;
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
class AdminProductControler extends Controller
{
    use StorageImageTrait;
    private $category;
    private $htmlSelect;
    private $product;

    public function __construct(Category $category,Product $product)
    {
        $this->category= $category;
        $this->product = $product;
    }
    public function index()
    {
        $products= $this->product->latest()->paginate(10);
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
    public function save(Request $request)
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
