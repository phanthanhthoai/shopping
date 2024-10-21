<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

trait StorageImageTrait{
     public function storageTraitUpload(Request $request,$fielName,$folder)
     {
          if($request->hasFile($fielName)){
               $file = $request->$fielName;
               $fileOrigin =$file->getClientOriginalName();
               $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
               $path = $request->file($fielName)->storeAs('public/'. $folder . '/' .Auth::id(),$fileName);
               $dataUploadTrait = [
                    'file_name'=> $fileOrigin,
                    'file_path'=> Storage::url($path)
               ];
               return $dataUploadTrait;
          }
          return null;
     }
     public function storageTraitUploadMutiple($file,$folder)
     {
     
          $fileOrigin =$file->getClientOriginalName();
          $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
          $path = $file->storeAs('public/'. $folder . '/' .Auth::id(),$fileName);
          $dataUploadTrait = [
               'file_name'=> $fileOrigin,
               'file_path'=> Storage::url($path)
          ];
          return $dataUploadTrait;
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