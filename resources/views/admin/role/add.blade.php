 
@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="">
@endsection
@section('js')
     <script>
          $('.checkbox_wrapper').on('click',function(){
               $(this).parents('.card').find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
          });
     </script>
@endsection
 @section('content')
     <!-- Content Wrapper. Contains page content -->
<h2>Thêm vai trò</h2>
<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{route('roles.save')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="col-md-12">
                    <div class="mb-3">
                         <label for="name" class="form-label">Tên vai trò</label>
                         <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Nhập tên vai trò" value="{{old('name')}}">
                    </div>
                    <div class="mb-3">
                         <label class="form-label">Mô tả vai trò</label><br>
                         <textarea name="display_name" rows="4" class="form-control"></textarea>
                    </div>
               </div>
               <div class="col-md-12">
                    <div class="row">
                         @foreach ($permissionsParent as $permissionsParentItem)
                         <div class="card border-primary mb-3 col-md-12">
                              <div class="card-header">
                                   <label >
                                        <input type="checkbox" class="checkbox_wrapper" value="{{$permissionsParentItem->id}}">
                                   </label>
                                   Module {{$permissionsParentItem->name}}
                              </div>
                              <div class="row">
                                   @foreach ($permissionsParentItem->permissionsChildrent as $permissionChildrent)
                                   <div class="card-body text-primary  col-md-3">
                                   <h5 class="card-title">
                                        <label >
                                             <input type="checkbox" class="checkbox_childrent" name="permission_id[]" value="{{$permissionChildrent->id}}">
                                        </label>
                                        {{$permissionChildrent->name}}
                                   </h5>
                                   </div>
                                   @endforeach
                              </div>
                         </div>
                         @endforeach
                    </div>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
 @endsection

