 
@extends('layouts.admin')
 
 @section('title')
  <title>Trang chu</title>
 @endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->
    @include('partials.content-header',['name'=>'Home', 'key'=>'Home'])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            Trang chủ
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection
