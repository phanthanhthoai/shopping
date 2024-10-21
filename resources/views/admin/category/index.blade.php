 
@extends('layouts.admin')
 @section('content')
     <!-- Content Wrapper. Contains page content -->
     <h2>Danh mục sản phẩm</h2>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('categories.create')}}" class="btn btn-success m-2">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                  <a href="{{ route('categories.edit', ['id' =>$category->id]) }}" class="btn btn-default">Sửa</a>
                  <a href="{{ route('categories.delete',['id' =>$category->id])}}" class="btn btn-danger">Xóa</a>
                </td>
                
              </tr>
              @endforeach
              
            </tbody>
          </table>
          </div>
          <div class="col-md-12">
            {{$categories->links()}}
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
