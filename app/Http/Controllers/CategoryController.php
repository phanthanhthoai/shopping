<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    private $category;
    private $htmlSelect;

    public function __construct()
    {
        $this->htmlSelect='';
    }
    public function create(){
        $htmlOption=$this->categoryRecursive(null);

        return view('admin.category.add',compact('htmlOption'));
    }
    public function index(){
        $categories = Category::where('deleted_at','=',null)->get();
        return view('admin.category.index', compact('categories'));
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
    public function edit($id)
    {
        $category = DB::table('categories')->find($id);
        $htmlOption=$this->categoryRecursive($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));
    }
    public function update($id, Request $request)
    {
        Category::where('id',$id)->update([
            'name'=> $request->input('name'),
            'parent_id'=> $request->input('parent_id')
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id)
    {
        Category::where('id',$id)->delete();
        return redirect()->route('categories.index');
    }
    public function save(Request $request)
    {
        $name= $request->input('name');
        $parent_id= $request->input('parent_id');
        DB::table('categories')->insert([
            'name'=> $name,
            'parent_id'=> $parent_id
       ]);
       return redirect()->route('categories.index');
    }
}
