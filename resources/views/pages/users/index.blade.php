@extends('layouts.master')

@section('title', 'Pengguna')

@section('content')
<div class="row">
    <div class="col-sm-12">
    
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">User</h6>
                </div>
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>User</span></li>
                </ol>
                <!-- /Breadcrumb -->
                <div class="clearfix"></div>
            </div>
                <div class="panel-body">
                    <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                    <!-- <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add User</span></button> -->
                    <div class="table-wrap">
                    
                        <div class="table-responsive text-center">
                            <table id="" class="table table-hover font-11 table-bordered display mb-30" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1; foreach($pengguna as $user): ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        
                                        <td>{{ $user->namalengkap }}</td> 
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                        <img src="{{asset('img/userimgs/'.$user->foto) }}" width="50px" height="50px" alt="..."></td>
                                        <td>
                                            <form action="{{route('pengguna.delete',$user->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateUser{{$user->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                            @csrf 
                                            @method("delete")
                                                <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                            </form>                
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    <!-- </div> -->
<!-- </div> -->
<!-- /Row -->
<!-- modal add user -->
<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Tambah User</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengguna.post') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                    <div class="form-group">
                        <label for="txtEmployeeName" class="control-label mb-5">Nama</label>
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap" required>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="txtUsername" class="control-label mb-5">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="control-label mb-5">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control password-field" id="password-field" name="password" required>
                                <div class="input-group-addon buat-password" id="buat-password"><i class="fa fa-eye"></i></div>
                            </div>
                            <!-- <input type="password" class="form-control" id="password-field" name="password" required><div class="pull-left"><i class="fa  fa-shopping-cart mr-20"></i>
                            <div class="input-group-append">
                                <span class="input-group-text" id="password-icon">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="Admin">Administrator</option>
                            <option value="HC">Admin HC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Foto</label>
                        <input enctype="multipart/form-data" type="file" class="file-upload upload" required="" name="foto" id="" placeholder="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal add user -->

<!-- modal update user -->
@foreach($pengguna as $user)
<div class="modal fade" id="updateUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="update-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Update User</h5>
            </div>
            <div class="modal-body">
                <form action="/users/{{$user->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="" class="control-label mb-5">Nama</label>
                        <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="{{$user->namalengkap}}" required>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="txtUsername" class="control-label mb-5">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="control-label mb-5">Ganti Password</label>
                            <!-- <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" required> -->
                            <div class="input-group">
                                <input type="password" class="form-control password-field" id="password-field" name="password" >
                                <div class="input-group-addon buat-password" id="buat-password"><i class="fa fa-eye"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="{{$user->role}}">{{$user->role}}</option>
                            <option value="Admin">Administrator</option>
                            <option value="HC">Admin HC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10" for="exampleInputEmail_2">Foto</label>
                        <p>
                        <img src="{{ asset('img/userimgs/'.$user->foto) }}" alt="User Image" width="50px" height="50px">
                        <input type="file" class="file-upload upload"  name="foto" value="{{$user->foto}}" id="" placeholder="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- end modal update user -->
@endsection


@push('script')
<script type="text/javascript">
     $('.delete').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
$('.display').dataTable( {
paging: true,
searching: true
} ); 
const passwordField = document.getElementById("password-field");
const passwordIcon = document.getElementById("buat-password");

passwordIcon.addEventListener("click", function() {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
    } else {
        passwordField.type = "password";
        passwordIcon.innerHTML = '<i class="fa fa-eye"></i>';
    }
});

</script>
@endpush