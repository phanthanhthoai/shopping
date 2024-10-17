 
@extends('layouts.admin')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
               <form action="{{route('categories.update',['id'=> $category->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                         <label for="name">Tên danh mục</label>
                         <input type="text" class="form-control" id="name" value="{{$category->name}}" name="name" aria-describedby="" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                         <label for="categoryParent">Danh mục cha</label>
                              <select class="form-control" id="parent_id" name="parent_id">
                                   <option value="0">Chọn danh mục cha</option>
                                   {!!$htmlOption!!}
                              </select>
                         </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
               </form>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
