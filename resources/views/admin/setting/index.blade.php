 
@extends('layouts.admin')
@section('css')
@endsection
@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script> 
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<h2>Danh sách Settings</h2>
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
                <th scope="col">Config key</th>
                <th scope="col">Config value</th>
                <th scope="col">Quản lí</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($settings as $settingItem)
                <tr>
                  <th scope="row">{{$settingItem->id}}</th>
                  <td>
                    {{$settingItem->config_key}}
                  </td>
                  <td>{{$settingItem->config_value}}</td>
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
            {{$settings->links()}}
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
