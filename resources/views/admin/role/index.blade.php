 
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
<h2>Danh sách vai trò</h2>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên vai trò</th>
                <th scope="col">Mô tả vai trò</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
                <tr>
                  <th scope="row">{{$role->id}}</th>
                  <td>
                    {{$role->name}}
                  </td>
                  <td>{{$role->display_name}}</td>

                  <td>
                  <a href="" class="btn btn-default">Sửa</a>
                  <a data-url="" href="" class="btn btn-danger action_delete">Xóa</a>
                  </td>
                  
                </tr>
              @endforeach
            </tbody>
          
          </table>
          
          </div>
          <div>
            {{$roles->links()}}
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
