 
@extends('layouts.admin')
@section('css')
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
<h2>User Edit</h2>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
               <form action="{{route('users.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Tên</label>
                         <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" >
                        
                    </div>
                    <div class="mb-3">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" name="email" value="{{$user->email}}" >
                        
                    </div>
                    <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="text" class="form-control" name="password" >
                        
                    </div>
                    <div class="mb-3">
                         <label>Chọn vai trò</label>
                         <select name="role_id" id="form-control">
                              <option value=""></option>
                              @foreach ($roles as $role)
                              <option
                                   {{$roleUser->contains('role_id',$role->id)? 'selected':''}}
                                    value="{{$role->id}}">{{$role->name}}</>
                              @endforeach
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
 @section('js')

 @endsection
