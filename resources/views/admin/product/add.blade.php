 
@extends('layouts.admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admins/product/add.css')}}">
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
               <form action="{{route('adminproduct.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Tên sản phẩm</label>
                         <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                         @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="mb-3">
                         <label for="image" class="form-label">Ảnh đại diện</label>
                         <input type="file" class="form-control-file" id="feature_image_path" name="feature_image_path" aria-describedby="" >
                    </div>
                    <div class="mb-3">
                         <label for="image" class="form-label">Ảnh chi tiết</label>
                         <input type="file" multiple class="form-control-file"  name="image_path[]" aria-describedby="" >
                    </div>
                    <div class="mb-3">
                         <label for="price" class="form-label">Giá</label>
                         <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" aria-describedby="" placeholder="Nhập giá" value="{{old('price')}}">
                         @error('price')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="mb-3">
                         <label for="categoryParent" class="form-label">Chọn danh mục</label>
                              <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                   <option value="">Chọn danh mục</option>
                                   {!!$htmlOption!!}
                              </select>
                              @error('category_id')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <!-- <div class="form-group">
                         <label >Nhập tags cho sản phẩm</label>
                         <select class="form-control" multiple="multiple" class="tags_select_choose">
                             
                         </select>
                    </div> -->
                    <div class="mb-3">
                         <label class="form-label">Nhập nội dung</label>
                         <textarea class="form-control @error('contents') is-invalid @enderror" name="contents" rows="3">{{old('contents')}}</textarea>
                         @error('contents')
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
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
     $(function (){
          $(".tags_select_choose").select2({
               tags: true,
               tokenSeparators: [',', ' ']
          })
     });
 </script>
 @endsection
