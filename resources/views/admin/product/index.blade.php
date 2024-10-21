 
@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{asset('admins/product/list.css')}}">
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<h2>Danh sách sản phẩm</h2>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('adminproduct.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $productItem)
                <tr>
                  <th scope="row">{{$productItem->id}}</th>
                  <td>
                    {{$productItem->name}}
                  </td>
                  <td>
                      <img class="productImg_150_100" src="{{$productItem->feature_image_path}}" alt="">
                  </td>
                  <td>{{$productItem->price}}</td>
                  <td>{{$productItem->category->name}}</td>

                  <td>
                  <a href="{{ route('adminproduct.edit', ['id' =>$productItem->id]) }}" class="btn btn-default">Sửa</a>
                  <a href="{{ route('adminproduct.delete',['id' =>$productItem->id])}}" class="btn btn-danger">Xóa</a>
                  </td>
                  
                </tr>
              @endforeach
              
              
            </tbody>
          
          </table>
          
          </div>
          <div>
            {{$products->links()}}
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
