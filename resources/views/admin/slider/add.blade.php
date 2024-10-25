 
@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/add.css')}}">
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
     <!-- <div class="col-md-12">
          @if ($errors->any())
               <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
          @endif
     </div> -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
               <form action="{{route('sliders.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Tên slider</label>
                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="" placeholder="Nhập tên slider" value="{{old('name')}}">
                         @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="mb-3">
                         <label for="description" class="form-label">Mô tả</label>
                         <input type="text" class="form-control @error('description') is-invalid @enderror"  name="description" aria-describedby="" placeholder="Nhập mô tả slider" value="{{old('description')}}">
                         @error('description')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="mb-3">
                         <label for="image" class="form-label">Hình ảnh</label>
                         <input type="file" class="form-control-file @error('description') is-invalid @enderror" id="image_path" name="image_path" aria-describedby="" value="{{old('image_path')}}" >
                         @error('image_path')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
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
