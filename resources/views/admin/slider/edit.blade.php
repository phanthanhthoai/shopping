 
@extends('layouts.admin')
@section('css')

<link rel="stylesheet" href="">
@endsection
 @section('content')
<h3>Sửa slider</h3>     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          
               <form action="{{route('sliders.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Tên slider</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{$slider->name}}">
                    </div>
                    <div class="mb-3">
                         <label for="image" class="form-label">Ảnh đại diện</label>
                         <input type="file" class="form-control-file" id="image_path" name="image_path" aria-describedby="" >
                         <div class="col-md-4 feature_image_container">
                              <div class="row">
                                   <img class="feature_image" src="{{$slider->image_path}}" alt="">
                              </div>
                         </div>
                    </div>
                    <div class="mb-3">
                         <label class="form-label">Mô tả</label>
                         <input type="text" class="form-control"  name="description" value="{{$slider->description}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
               </form>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
 @section('js')
 @endsection
