 
@extends('layouts.admin')
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
              
              <tr>
                <th scope="row">1</th>
                <td>Iphone X</td>
                <td>
                    <img src="" alt="">
                </td>
                <td>1900000</td>
                <td>Iphone X</td>

                <td>
                  <a href="" class="btn btn-default">Sửa</a>
                  <a href="" class="btn btn-danger">Xóa</a>
                </td>
                
              </tr>
             
              
            </tbody>
          </table>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
