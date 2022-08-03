@extends('layouts.master')

@section('title', 'Update User')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Update User</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <form action="">
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Nama</label>
                                <input type="text" class="form-control" name="txtEmployeeName" value="{{$data->txtEmployeeName}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left" for="example-email">Nomor Induk Karyawan</label>
                                <input type="email" id="example-email" name="txtNik" class="form-control" value="{{$data->txtNik}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Username</label>
                                <input type="txt" class="form-control" name="txtUsername" value="{{$data->txtUsername}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Password</label>
                                <input type="password" class="form-control" name="txtPassword" value="{{$data->txtPassword}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Posisi</label>
                                <input type="txt" class="form-control" name="txtJobTitle" value="{{$data->txtJobTitle}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Department</label>
                                <input type="txt" class="form-control" name="txtDepartment" value="{{$data->txtDepartment}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Email</label>
                                <input type="txt" class="form-control" name="txtEmail" value="{{$data->txtEmail}}">
                            </div>
                            <div class="form-group">
                            <label for="txtStatus" class="control-label mb-10 text-left">Status</label>
                            <select name="txtStatus" class="form-control" value="{{$data->txtStatus}}">
                                <option value="Aktif">Aktif</option>
                                <option value="Resign">Resign</option>
                            </select>  
                            </div>
                            <div class="form-group">
                            <label for="txtType" class="control-label mb-10 text-left">Tipe</label>
                            <select name="txtType" class="form-control" value="txtType">
                                <option value="Karyawan Tetap">Karyawan Tetap</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Outsource">Outsource</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="txtGender" class="control-label mb-10 text-left">Jenis Kelamin</label>
                            <select name="txtGender" class="form-control" value="txtGender">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                
                            </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="dtmStartDate" value="{{$data->dtmStartDate}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 text-left">Tanggal Keluar</label>
                                <input type="date" class="form-control" name="dtmEndDate" value="{{$data->dtmEndDate}}">
                            </div>
                            <div class="modal-footer">
                            <a type="button" class="btn btn-default" href="{{ route('user') }}">Close</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


