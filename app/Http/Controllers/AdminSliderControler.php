<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;
use App\Models\Slider;
use Illuminate\Pagination\Paginator;

class AdminSliderControler extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider= $slider;
    }
    public function index()
    {
        Paginator::useBootstrap();
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }
    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $dataSliderUpdate =[
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImage= $this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImage)){
                $dataSliderUpdate['image_name']= $dataImage['file_name'];
                $dataSliderUpdate['image_path']= $dataImage['file_path'];
            }
            $slider=$this->slider->find($id)->update($dataSliderUpdate);
            DB::commit();
            return redirect()->route('sliders.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line : '.$exception->getLine());
        }
    }
    public function delete($id)
    {
        try{
            $this->slider->find($id)->delete();
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
    public function save(SliderAddRequest $request)
    {
        try{
            DB::beginTransaction();
            $dataSliderCreate =[
                'name' => $request->name,
                'description' => $request->description,
                
            ];
            $dataImage= $this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImage)){
                $dataSliderCreate['image_name']= $dataImage['file_name'];
                $dataSliderCreate['image_path']= $dataImage['file_path'];
            }
            $slider=$this->slider->create($dataSliderCreate);
            DB::commit();
            return redirect()->route('sliders.index');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line : '.$exception->getLine());
        }
    }
}
