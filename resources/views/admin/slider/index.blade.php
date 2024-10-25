 
@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{asset('admins/slider/list.css')}}">
@endsection
@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script> 

<script src= "{{ asset('admins/slider/index/list.js')}}"></script>
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<h2>Danh sách Slider</h2>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên slider</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sliders as $sliderItem)
                <tr>
                  <th scope="row">{{$sliderItem->id}}</th>
                  <td>
                    {{$sliderItem->name}}
                  </td>
                  <td>
                      <img class="productImg_150_100" src="{{$sliderItem->image_path}}" alt="">
                  </td>
                  <td>{{$sliderItem->description}}</td>

                  <td>
                  <a href="{{route('sliders.edit',['id' =>$sliderItem->id])}}" class="btn btn-default">Sửa</a>
                  <a data-url="{{route('sliders.delete',['id' =>$sliderItem->id])}}" href="{{route('sliders.delete',['id' =>$sliderItem->id])}}" class="btn btn-danger action_delete">Xóa</a>
                  </td>
                  
                </tr>
              @endforeach
            </tbody>
          
          </table>
          
          </div>
          <div>
            {{$sliders->links()}}
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
