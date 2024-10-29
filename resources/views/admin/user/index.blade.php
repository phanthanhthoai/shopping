 
@extends('layouts.admin')
@section('css')
  <link rel="stylesheet" href="{{asset('admins/slider/list.css')}}">
@endsection
@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script> 

<script src= "{{ asset('admins/main.js')}}"></script>
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<h2>Danh sách User</h2>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>
                    {{$user->name}}
                  </td>
                  <td>{{$user->email}}</td>
                  <td>
                  <a href="{{route('users.edit',['id'=>$user->id])}}">Sửa</a>
                  <a data-url="{{route('users.delete',['id' =>$user->id])}}" href="{{route('users.delete',['id' =>$user->id])}}" class="btn btn-danger action_delete">Xóa</a>
                  </td>
                  
                </tr>
              @endforeach
            </tbody>
          
          </table>
          
          </div>
          <div>
            {{$users->links()}}
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
