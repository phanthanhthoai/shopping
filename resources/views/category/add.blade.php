 
@extends('layouts.admin')
 
 @section('title')
  <title>Trang chu</title>
 @endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->
     @include('partials.content-header',['name'=>'category', 'key'=>'Add'])
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
               <form>
               <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
               </div>
               <div class="form-group">
                    <label for="exampleFormControlSelect1">Danh mục cha</label>
                         <select class="form-control" id="exampleFormControlSelect1">
                              <option>Chọn danh mục cha</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                         </select>
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
