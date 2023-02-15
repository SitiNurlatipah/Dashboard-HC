@extends('layouts.master')

@section('title', 'Manajement User')

@section('content')
<div class="row">
    <div class="col-sm-12">
    
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Manajemen User</h6>
                </div>
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Management User</span></li>
                </ol>
                <!-- /Breadcrumb -->
                <div class="clearfix"></div>
            </div>
            
                <div class="panel-body">
                    <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                    <!-- <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add User</span></button> -->
                    <div class="table-wrap">
                    
                        <div class="table-responsive text-center">
                        
                            <table id="userTable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        
                                        <th class="text-center">NIK</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Departement</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Status Karyawan</th>
                                        <th class="text-center">Type Karyawan</th>
                                        <th class="text-center">Start Date</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1; foreach($users as $data): ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        
                                        <td>{{ $data->txtNik }}</td> 
                                        <td>{{ $data->txtEmployeeName }}</td>
                                        <td>{{ $data->txtJobTitle }}</td>
                                        <td>{{ $data->txtDepartment }}</td>
                                        <td>{{ $data->txtEmail }}</td>
                                        <td>{{ $data->txtStatus }}</td>
                                        <td>{{ $data->txtType }}</td>
                                        <td>{{ $data->dtmStartDate }}</td>
                                        <td>{{ $data->txtGender }}</td>
                                        <td>
                                            <form action="{{route('user.delete', $data->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateUser{{$data->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                            @csrf 
                                            @method("delete")
                                                <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                            </form>
                                        {{--<a class="btn btn-default btn-icon-anim btn-square btn-sm"  id="editUser" data-toggle="modal" data-target="#updateUser{{$data->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                        <form action="{{route('user.delete', $data->id)}}" method="POST">
                                        @csrf 
                                        @method("delete")
                                            <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm show_confirm" ><i class="icon-trash"></i></button>
                                        </form>--}}
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
                <form action="{{ route('user.post') }}" method="POST">
                @csrf 
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="txtEmployeeName" class="control-label mb-5">Name</label>
                            <input type="text" class="form-control" id="txtEmployee_name" name="txtEmployeeName" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtNik" class="control-label mb-5">Nomor Induk Karyawan(NIK)</label>
                            <input type="text" class="form-control" id="txtNik" name="txtNik" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        
                        <div class="col-sm-4">
                            <label for="txtEmail" class="control-label mb-5">Email</label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" required>
                        </div>
                        
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="txtJob_title" class="control-label mb-5">Posisi</label>
                            <input type="text" class="form-control" id="txtJob_title" name="txtJobTitle" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtDepartment" class="control-label mb-5">Department</label>
                            <input type="text" class="form-control" id="txtDepartment" name="txtDepartment" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtGender" class="control-label mb-5">Jenis Kelamin</label>
                            <select name="txtGender" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>   
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="txtStatus" class="control-label mb-5">Status</label>
                            <select name="txtStatus" class="form-control">
                                <option value="Aktif">Aktif</option>
                                <option value="Resign">Resign</option>
                            </select>  
                        </div>
                        <div class="col-sm-4">
                            <label for="txtType" class="control-label mb-5">Tipe</label>
                            <select name="txtType" class="form-control">
                                <option value="Karyawan Tetap">Karyawan Tetap</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Outsource">Outsource</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="dtmStartDate" class="control-label mb-5">Tanggal Masuk</label>
                            <input type='date' class="form-control" name="dtmStartDate" required>        
                        </div>
                        <div class="col-sm-6">
                            <label for="dtmEndDate" class="control-label mb-5">Tanggal Keluar</label>
                            <input type='date' class="form-control" name="dtmEndDate" required>        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Add Data Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal add user -->

<!-- modal update user -->
@foreach($users as $data)
<div class="modal fade" id="updateUser{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="update-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Update User</h5>
            </div>
            <div class="modal-body">
                <form action="/user/{{$data->id}}" method="POST">
                @csrf
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="txtEmployeeName" class="control-label mb-5">Name</label>
                            <input type="text" class="form-control" id="txtEmployee_name" name="txtEmployeeName" value="{{$data->txtEmployeeName}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="txtNik" class="control-label mb-5">Nomor Induk Karyawan(NIK)</label>
                            <input type="text" class="form-control" id="txtNik" name="txtNik" value="{{$data->txtNik}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtEmail" class="control-label mb-5">Email</label>
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="{{$data->txtEmail}}">
                        </div>
                        
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="txtJob_title" class="control-label mb-5">Posisi</label>
                            <input type="text" class="form-control" id="txtJob_title" name="txtJobTitle" value="{{$data->txtJobTitle}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="txtDepartment" class="control-label mb-5">Department</label>
                            <input type="text" class="form-control" id="txtDepartment" name="txtDepartment" value="{{$data->txtDepartment}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtStatus" class="control-label mb-5">Status</label>
                            <select name="txtStatus" class="form-control" value="{{$data->txtStatus}}">
                                <!-- <option value="{{$data->txtStatus}}">{{$data->txtStatus}}</option> -->
                                <option value="Aktif">Aktif</option>
                                <option value="Resign">Resign</option>
                            </select>  
                        </div>
                        <div class="col-sm-4">
                            <label for="txtType" class="control-label mb-5">Tipe</label>
                            <select name="txtType" class="form-control" value="{{$data->txtType}}">
                                <option value="{{$data->txtType}}">{{$data->txtType}}</option>
                                <option value="Karyawan Tetap">Karyawan Tetap</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Outsource">Outsource</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="txtGender" class="control-label mb-5">Jenis Kelamin</label>
                            <select name="txtGender" class="form-control" value="{{$data->txtGender}}" >
                                <!-- <option value="{{$data->txtGender}}">{{$data->txtGender}}</option> -->
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="dtmStartDate" class="control-label mb-5">Tanggal Masuk</label>
                            <input type='date' class="form-control" name="dtmStartDate" value="{{$data->dtmStartDate}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="dtmEndDate" class="control-label mb-5">Tanggal Keluar</label>
                            <input type='date' class="form-control" name="dtmEndDate" value="{{$data->dtmEndDate}}">
                        </div>
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
$('#userTable').dataTable( {
paging: true,
searching: true
} ); 
$(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissable").alert('close');
}); 
</script>
@endpush