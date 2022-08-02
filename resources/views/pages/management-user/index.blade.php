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
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <button class="btn btn-primary btn-lable-wrap left-label"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add User</span></button>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user" data-whatever="@mdo">Add User</button> --}}
                    <div class="table-wrap">
                        <div class="table-responsive text-center">
                            <table id="tbl_log_history" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Departement</th>
                                        <th>Email</th>
                                        <th>Status Karyawan</th>
                                        <th>Type Karyawan</th>
                                        <th>Start Date</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($users as $data): ?>
                                    <tr>
                                        <td>{{$data->id}}</td>
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
                                        <form action="/user/{{$data->id}}" method="POST">
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm" href="{{ route('user.edit',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                        @csrf 
                                        @method("delete")
                                            <button type="submit" class="btn btn-info btn-icon-anim btn-square btn-sm"><i class="icon-trash"></i></button>
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
    </div>
</div>
<!-- /Row -->

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
                    <div class="form-group">
                        <label for="txtEmployeeName" class="control-label mb-10">Name</label>
                        <input type="text" class="form-control" id="txtEmployee_name" name="txtEmployeeName">
                    </div>
                    <div class="form-group">
                        <label for="txtUsername" class="control-label mb-10">Username</label>
                        <input type="text" class="form-control" id="txtUsername" name="txtUsername">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label mb-10">Password</label>
                        <input type="password" class="form-control" id="password" name="txtPassword">
                    </div>
                    <div class="form-group">
                        <label for="txtNik" class="control-label mb-10">Nomor Induk Karyawan(NIK)</label>
                        <input type="text" class="form-control" id="txtNik" name="txtNik">
                    </div>
                    <div class="form-group">
                        <label for="txtJob_title" class="control-label mb-10">Posisi</label>
                        <input type="text" class="form-control" id="txtJob_title" name="txtJobTitle">
                    </div>
                    <div class="form-group">
                        <label for="txtDepartment" class="control-label mb-10">Department</label>
                        <input type="text" class="form-control" id="txtDepartment" name="txtDepartment">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail" class="control-label mb-10">Email</label>
                        <input type="text" class="form-control" id="txtEmail" name="txtEmail">
                    </div>
                    <div class="form-group">
                        <label for="txtStatus" class="control-label mb-10">Status</label>
                        <select name="txtStatus" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Resign">Resign</option>
                        </select>  
                    </div>
                    <div class="form-group">
                        <label for="txtType" class="control-label mb-10">Tipe</label>
                        <select name="txtType" class="form-control">
                            <option value="Karyawan Tetap">Karyawan Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Outsource">Outsource</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtGender" class="control-label mb-10">Jenis Kelamin</label>
                        <select name="txtGender" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dtmStartDate" class="control-label mb-10">Tanggal Masuk</label>
                            <input type='date' class="form-control" name="dtmStartDate">
                            
                    </div>
                    <div class="form-group">
                        <label for="dtmEndDate" class="control-label mb-10">Tanggal Keluar</label>
                            <input type='date' class="form-control" name="dtmEndDate">
                            
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            
        </div>
    </div>
</div>

@endsection


@push('script')


@endpush