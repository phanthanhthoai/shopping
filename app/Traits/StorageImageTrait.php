<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
}