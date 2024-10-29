 
@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="{{asset('admins/product/add.css')}}">
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<h2>Sửa Settings</h2>
     
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
               <form action="{{route('settings.update',['id'=> $setting->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                         <label for="config_key">Config key</label>
                         <input type="text" class="form-control @error('config_key') is-invalid @enderror" id="config_key" name="config_key" value="{{$setting->config_key}}">
                         @error('config_key')
                              <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    @if (request()->type ==='Text')
                         <div class="form-group">
                              <label for="config_value">Config value</label>
                              <input type="text" class="form-control @error('config_value') is-invalid @enderror" id="config_value" name="config_value" value="{{$setting->config_value}}">
                              @error('config_value')
                                   <div class="alert alert-danger">{{ $message }}</di>
                              @enderror
                         </div>
                         @elseif(request()->type ==='Textarea')
                         <div class="form-group">
                              <label for="config_value">Config value</label>
                              <textarea name="config_value" id="config_value" class="form-control @error('config_value') is-invalid @enderror">
                              {{$setting->config_value}}
                              </textarea>
                              @error('config_value')
                                   <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                         </div>
                    @endif
                    
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
