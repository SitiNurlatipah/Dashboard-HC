@extends('layouts.master')

@section('title', 'Training')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Training</h6>
                </div>
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Training Realization</span></li>
                </ol>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <!-- Breadcrumb -->
                    
                    <!-- /Breadcrumb -->
                    <div  class="tab-struct custom-tab-1 mt-0">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Training</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Trainee</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">Cost Center</a></li>
                            
                        </ul>
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable mt-10 pb-5 pt-5">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
                </div>
                @endif
                <div class="tab-content" id="myTabContent_7">
                <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                    <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-realisasi" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>

                    <!-- <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-realisasi" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data</span></button> -->

                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="realizationTable" class="table table-hover table-striped table-bordered displayx text-center font-11 color-bg-table" >
                                <thead bgcolor="#8ee8fa">
                                    <tr>
                                        <th rowspan="2" class="text-center">RPT</th>
                                        <th rowspan="2" class="text-center color-thead">ID</th>
                                        <th rowspan="2" class="text-center">Nama Training</th>
                                        <th rowspan="2" class="text-center">Sisa Hari</th>
                                        <th rowspan="2" class="text-center">Tanggal Mulai</th>
                                        <th rowspan="2" class="text-center">Tanggal Selesai</th>
                                        <th colspan="3" class="text-center">Waktu</th>
                                        <th rowspan="2" class="text-center">Jumlah Peserta</th>
                                        <th rowspan="2" class="text-center">Pelaksanaan</th>
                                        <th rowspan="2" class="text-center">Training Type</th>
                                        <th rowspan="2" class="text-center">Media</th>
                                        <th rowspan="2" class="text-center">Vendor</th>
                                        <th rowspan="2" class="text-center">Lokasi</th>
                                        <th colspan="2" class="text-center">Training cost</th>
                                        <th rowspan="2" class="text-center">Sertifikat</th>
                                        <th rowspan="2" class="text-center">EP</th>
                                        <th rowspan="2" class="text-center">ES</th>
                                        <th rowspan="2" class="text-center">Action (Update/Delete)</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Mulai</th>
                                        <th class="text-center">Selesai</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Pendaftaran</th>
                                        <th class="text-center">Snack</th>
                                    </tr>
                                </thead>
                                @foreach($training_realizations as $realisasi)
                               
                                    <tr>
                                        
                                        <td>
                                        @if ($realisasi->txtStatus=="Plan")
                                            <span class="label label-success">{{$realisasi->txtStatus}}</span>
                                            @elseif($realisasi->txtStatus=="Unplan")
                                            <span class="">{{$realisasi->txtStatus}}</span>
                                            @else
                                            {{$realisasi->txtStatus}}
                                            @endif    
                                        </td>
                                        <td>{{$realisasi->id}}</td>
                                        <td>
                                            @if (\Carbon\Carbon::parse($realisasi->dateTanggalMulai)->diffInDays(now(), false)==0)
                                            <span class="label label-success">{{$realisasi->txtTrainingName}}</span>
                                            @elseif ((\Carbon\Carbon::parse($realisasi->dateTanggalMulai)->diffInDays(now(), false)<=(-1))&&
                                            (\Carbon\Carbon::parse($realisasi->dateTanggalMulai)->diffInDays(now(), false)>=(-5)))
                                            <span class="label label-danger">{{$realisasi->txtTrainingName}}</span>
                                            @elseif ((\Carbon\Carbon::parse($realisasi->dateTanggalMulai)->diffInDays(now(), false)<(-5))&&
                                            (\Carbon\Carbon::parse($realisasi->dateTanggalMulai)->diffInDays(now(), false)>=(-10)))
                                            <span class="label label-warning">{{$realisasi->txtTrainingName}}</span>
                                            @else
                                            <span class="">{{$realisasi->txtTrainingName}}</span>
                                            @endif 
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($realisasi->dateTanggalMulai)->diffInDays(now(), false)}}</td>
                                        <td>{{date('d-m-Y', strtotime($realisasi->dateTanggalMulai))}}</td>
                                        <td>
                                            @if ($realisasi->tanggalSelesai=="")
                                            <span></span>
                                            @else
                                            {{date('d-m-Y', strtotime($realisasi->tanggalSelesai))}}
                                            @endif 
                                        </td>
                                        <td>{{date('h:i', strtotime($realisasi->timeDurationStart))}}</td>
                                        <td>{{date('h:i', strtotime($realisasi->timeDurationEnd))}}</td>
                                        <td>{{date('h:i', strtotime($realisasi->timeDurationTotal))}}</td>
                                        <td>{{$realisasi->intTotalParticipant}}</td>
                                        <td>{{$realisasi->txtPelaksanaan}}</td>
                                        <td>{{$realisasi->txtTrainingType}}</td>
                                        <td>{{$realisasi->txtMedia}}</td>
                                        <td>{{$realisasi->txtTrainer}}</td>
                                        <td>{{$realisasi->lokasi}}</td>
                                        <td>
                                            @if ($realisasi->statusPembayaran=="Lunas")
                                            <span class="label label-success">Rp{{number_format($realisasi->intTotalCost,0,',','.')}}</span>
                                            @else($realisasi->txtFormUsulan=="Belum Lunas")
                                            <span class="label label-danger">Rp{{number_format($realisasi->intTotalCost,0,',','.')}}</span>
                                            @endif   
                                        </td>
                                        <td>{{$realisasi->costSnack}}</td>
                                        <td>
                                            @if ($realisasi->sertifikat=="Tidak Ada")
                                            <span class="">{{$realisasi->sertifikat}}</span>
                                            @else
                                            <span class="label label-success">{{$realisasi->sertifikat}}</span>
                                            @endif
                                        </td>
                                            
                                        <td>
                                        
                                        </td>
                                        <td></td>
                                            
                                        <td>
                                        <form action="{{route('realization.delete',$realisasi->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$realisasi->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                        @csrf 
                                        @method("delete")
                                            <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                        </form>
                                        </td>
                                    </tr>    
                                @endforeach
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="ratatable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                               
                                
                                <th class="text-center">Training ID</th>
                                <th class="text-center">Judul Training</th>    
                                <th class="text-center">Rata-rata</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rata as $i)
                            <tr>
                                
                                <td class="col-md-2">{{ $i->training_id }}</td>
                                <td class="col-md-2">{{ $i->txtTrainingName }}</td>
                                <td class="col-md-2">{{ number_format($i->rata2,0) }}</td>
                                
                            </tr>
                                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    </div>
                    <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                        <!-- <div class="col card-header text-right"> -->
                        <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-trainee" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        <!-- </div> -->
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="traineeTable" class="table table-striped table-hover displayx table-bordered font-11 text-center mt-10" width="100%">
                                    <thead bgcolor="#8ee8fa">
                                        <tr>
                                            <th rowspan="2" class="text-center">ID Training</th>
                                            <th rowspan="2" class="text-center">Nama Peserta</th>
                                            <th rowspan="2" class="text-center">NIK</th>
                                            <th rowspan="2" class="text-center">Golongan</th>
                                            <th rowspan="2" class="text-center">Cost Center</th>
                                            <th rowspan="2" class="text-center">Judul Training</th>
                                            <th rowspan="2" class="text-center">Bulan</th>
                                            <th rowspan="2" class="text-center">Total Jam</th>
                                            <th rowspan="2" class="text-center">Post Test</th>
                                            <th colspan="8" class="text-center">Evaluasi</th>
                                            <th rowspan="2" class="text-center">Training Komentar</th>
                                            <th colspan="3" class="text-center">Assesment Training</th>
                                            <th rowspan="2" class="text-center">Action (Update/Delete)</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">1</th>
                                            <th class="text-center">2</th>
                                            <th class="text-center">3</th>
                                            <th class="text-center">4</th>
                                            <th class="text-center">5</th>
                                            <th class="text-center">6</th>
                                            <th class="text-center">7</th>
                                            <th class="text-center">8</th>
                                            <th class="text-center">Before</th>
                                            <th class="text-center">Target</th>
                                            <th class="text-center">Actual</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($trainees as $trainee)
                                    
                                    
                                    <tr>
                                        <td>{{$trainee->training_id}}</td>
                                        <td>{{$trainee->txtEmployeeName}}</td>
                                        <td>{{$trainee->txtNik}}</td>
                                        <td>{{$trainee->golongan}}</td>
                                        <td>{{$trainee->cost_center}}</td>
                                        <td>{{$trainee->txtTrainingName}}</td>
                                        <td>{{date('F Y', strtotime($trainee->dateTanggalMulai))}}</td>
                                        <td>{{date('h:i', strtotime($trainee->timeDurationTotal))}}</td>
                                        <td>{{$trainee->post_test}}</td>
                                        <td>{{$trainee->evaluasi_1}}</td>
                                        <td>{{$trainee->evaluasi_2}}</td>
                                        <td>{{$trainee->evaluasi_3}}</td>
                                        <td>{{$trainee->evaluasi_4}}</td>
                                        <td>{{$trainee->evaluasi_5}}</td>
                                        <td>{{$trainee->evaluasi_6}}</td>
                                        <td>{{$trainee->evaluasi_7}}</td>
                                        <td>{{$trainee->evaluasi_8}}</td>
                                        <td>{{$trainee->komentar}}</td>
                                        <td>{{$trainee->assesment_before}}</td>
                                        <td>{{$trainee->assesment_target}}</td>
                                        <td>{{$trainee->assesment_actual}}</td>
                                        <td>
                                            <form action="{{route('trainee.delete',$trainee->idTrainee)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateTrainee{{$trainee->idTrainee}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                            @csrf 
                                            @method("delete")
                                                <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>  
                                    @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div  id="profile_16" class="tab-pane fade" role="tabpanel">
                    </div>
                </div>
                </div>
            </div>
        </div>	
    </div>
</div>

<div class="modal fade" id="add-realisasi" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('realization.post') }}" method="POST">
                @csrf 
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="dateTanggalMulai">
                        </div>
                        <div class="col-sm-4">
                            <label for="txtPelaksanaan" class="control-label mb-5">Pelaksanaan</label>
                            <select name="txtPelaksanaan" class="form-control">
                            <option value="">--Pilih Pelaksanaan Training--</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                            <option value="Blended">Blended</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="txtMedia" class="control-label mb-5">Media</label>
                            <input type="text" class="form-control" name="txtMedia">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="intTrainingName" class="control-label mb-5">Nama Training</label>
                            <input type="text" class="form-control" name="txtTrainingName">
                        </div>
                        <div class="col-sm-6">
                            <label for="txtTrainer" class="control-label mb-5">Trainer/Vendor</label>
                            <input type="text" class="form-control"  name="txtTrainer">
                        </div>
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtTrainee" class="control-label mb-5">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi">
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Total Peserta</label>
                            <input type="number" class="form-control" name="intTotalParticipant">
                        </div>
                        <div class="col-sm-4">
                            <label for="txtStatus" class="control-label mb-5">RPT</label>
                            <select name="txtStatus" class="form-control">
                            <option value="">--Pilih Status--</option>
                            <option value="Plan">Plan</option>
                            <option value="Unplan">Unplan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtTrainingType" class="control-label mb-5">Tipe</label>
                            <select name="txtTrainingType" class="form-control">
                            <option value="">--Pilih Tipe Training--</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                            <option value="In House">In House</option>
                            </select>                        
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalCost" class="control-label mb-5">Biaya Pendaftaran</label>
                            <input type="number" class="form-control" name="intTotalCost">
                        </div> 
                        <div class="col-sm-4">
                            <label for="costSnack" class="control-label mb-5">Biaya Snack</label>
                            <input type="number" class="form-control" name="costSnack">
                        </div> 
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="statusPembayaran" class="control-label mb-5">Status Pembayaran</label>
                            <select name="statusPembayaran" class="form-control">
                            <option value="">--Pilih Status Pembayaran--</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                            </select>                        
                        </div>
                        <div class="col-sm-4">
                            <label for="sertifikat" class="control-label mb-5">Sertifikat</label>
                            <select name="sertifikat" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Ada">Ada</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                            </select>                        
                        </div>
                        <div class="col-sm-4">
                            <label for="tanggalSelesai" class="control-label mb-5">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggalSelesai">
                        </div>
                    </div>
                    <div class="row form-group">
                        
                        <div class="col-sm-4">
                            <label for="timeDurationStart" class="control-label mb-5">Jam Mulai</label>
                            <input type="time" class="form-control" name="timeDurationStart">
                        </div>
                        <div class="col-sm-4">
                            <label for="timeDurationEnd" class="control-label mb-5">Jam Selesai</label>
                            <input type="time" class="form-control" name="timeDurationEnd">
                        </div>
                        <div class="col-sm-4">
                            <label for="timeDurationTotal" class="control-label mb-5">Total Jam</label>
                            <input type="time" class="form-control" name="timeDurationTotal">
                        </div>
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
<!-- end add data -->
@foreach($training_realizations as $realisasi)
    <div class="modal fade" id="update{{$realisasi->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
                </div>
                <div class="modal-body">
                <form action="/realization/{{$realisasi->id}}" method="POST">
                @csrf 
                @method('put')
                <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="dateTanggalMulai" value="{{$realisasi->dateTanggalMulai}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="txtPelaksanaan" class="control-label mb-5">Pelaksanaan</label>
                            <select name="txtPelaksanaan" class="form-control">
                            <option value="{{$realisasi->txtPelaksanaan}}">{{$realisasi->txtPelaksanaan}}</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                            <option value="Blended">Blended</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="txtMedia" class="control-label mb-5">Media</label>
                            <input type="text" class="form-control" name="txtMedia" value="{{$realisasi->txtMedia}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="intTrainingName" class="control-label mb-5">Nama Training</label>
                            <input type="text" class="form-control" name="txtTrainingName" value="{{$realisasi->txtTrainingName}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="txtTrainer" class="control-label mb-5">Trainer/Vendor</label>
                            <input type="text" class="form-control"  name="txtTrainer" value="{{$realisasi->txtTrainer}}">
                        </div>
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtTrainee" class="control-label mb-5">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" value="{{$realisasi->lokasi}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Total Peserta</label>
                            <input type="number" class="form-control" name="intTotalParticipant" value="{{$realisasi->intTotalParticipant}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="txtStatus" class="control-label mb-5">RPT</label>
                            <select name="txtStatus" class="form-control">
                            <option value="{{$realisasi->txtStatus}}">{{$realisasi->txtStatus}}</option>
                            <option value="Plan">Plan</option>
                            <option value="Unplan">Unplan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="txtTrainingType" class="control-label mb-5">Tipe</label>
                            <select name="txtTrainingType" class="form-control">
                            <option value="{{$realisasi->txtTrainingType}}">{{$realisasi->txtTrainingType}}</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                            <option value="In House">In House</option>
                            </select>                        
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalCost" class="control-label mb-5">Biaya Pendaftaran</label>
                            <input type="number" class="form-control" name="intTotalCost" value="{{$realisasi->intTotalCost}}">
                        </div> 
                        <div class="col-sm-4">
                            <label for="costSnack" class="control-label mb-5">Biaya Snack</label>
                            <input type="number" class="form-control" name="costSnack" value="{{$realisasi->costSnack}}">
                        </div> 
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="statusPembayaran" class="control-label mb-5">Status Pembayaran</label>
                            <select name="statusPembayaran" class="form-control">
                            <option value="{{$realisasi->statusPembayaran}}">{{$realisasi->statusPembayaran}}</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                            </select>                        
                        </div>
                        <div class="col-sm-4">
                            <label for="sertifikat" class="control-label mb-5">Sertifikat</label>
                            <select name="sertifikat" class="form-control">
                            <option value="{{$realisasi->sertifikat}}">{{$realisasi->sertifikat}}</option>
                            <option value="Ada">Ada</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                            </select>                        
                        </div>
                        <div class="col-sm-4">
                            <label for="tanggalSelesai" class="control-label mb-5">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tanggalSelesai" value="{{$realisasi->tanggalSelesai}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        
                        <div class="col-sm-4">
                            <label for="timeDurationStart" class="control-label mb-5">Jam Mulai</label>
                            <input type="time" class="form-control" name="timeDurationStart" value="{{$realisasi->timeDurationStart}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="timeDurationEnd" class="control-label mb-5">Jam Selesai</label>
                            <input type="time" class="form-control" name="timeDurationEnd" value="{{$realisasi->timeDurationEnd}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="timeDurationTotal" class="control-label mb-5">Total Jam</label>
                            <input type="time" class="form-control" name="timeDurationTotal" value="{{$realisasi->timeDurationTotal}}">
                        </div>
                    </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endforeach
<!-- modal add trainee -->
<div class="modal fade" id="add-trainee" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body form-wrap">
                <form action="{{ route('trainee.post') }}" method="POST">
                @csrf 
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">ID Training</label>
                        <input type="text" class="form-control" name="training_id">
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-5">Trainee</label>
                            <select class="selectpicker form-control" multiple data-style="form-control btn-default btn-outline" data-live-search="true" name="user_id[]" id="user_id[]">
                                @foreach($users as $user)
                                <option value="{{$user->txtNik}}">{{$user->txtEmployeeName}}</option>
                                @endforeach
                            </select>        
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Form Evaluasi</h8>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_1" placeholder="1">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_2" placeholder="2">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_3" placeholder="3">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_4" placeholder="4">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_5" placeholder="5">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_6" placeholder="6">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_7" placeholder="7">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_8" placeholder="8">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Training Komentar</label>
                        <input type="text" class="form-control" name="komentar">
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Nilai Post Test</label>
                        <input type="text" class="form-control" name="post_test">
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Assesment Training</h8>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Before</label>
                            <input type="text" class="form-control" name="assesment_before">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Target</label>
                            <input type="text" class="form-control" name="assesment_target">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Actual</label>
                            <input type="text" class="form-control" name="assesment_actual">
                        </div>
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
<!-- end add modal -->
<!-- update modal -->
@foreach($trainees as $trainee)
    <div class="modal fade" id="updateTrainee{{$trainee->idTrainee}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Trainee</h5>
                </div>
                <div class="modal-body">
                <form action="/training/trainee/{{$trainee->idTrainee}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="dateTanggal" class="control-label mb-5">NIK</label>
                            <input type="text" class="form-control" name="user_id" value="{{$trainee->user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="dateTanggal" class="control-label mb-5">Nama Training</label>
                            <input type="text" class="form-control" name="training_id" value="{{$trainee->training_id}}">
                        </div>
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Form Evaluasi</h8>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_1" placeholder="1" value="{{$trainee->evaluasi_1}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_2" placeholder="2" value="{{$trainee->evaluasi_2}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_3" placeholder="3" value="{{$trainee->evaluasi_3}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_4" placeholder="4" value="{{$trainee->evaluasi_5}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_5" placeholder="5" value="{{$trainee->evaluasi_5}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_6" placeholder="6" value="{{$trainee->evaluasi_6}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_7" placeholder="7" value="{{$trainee->evaluasi_7}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_8" placeholder="8" value="{{$trainee->evaluasi_8}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Training Komentar</label>
                        <input type="text" class="form-control" name="komentar" value="{{$trainee->komentar}}">
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Nilai Post Test</label>
                        <input type="text" class="form-control" name="post_test" value="{{$trainee->post_test}}">
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Assesment Training</h8>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Before</label>
                            <input type="text" class="form-control" name="assesment_before" value="{{$trainee->assesment_before}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Target</label>
                            <input type="text" class="form-control" name="assesment_target" value="{{$trainee->assesment_target}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Actual</label>
                            <input type="text" class="form-control" name="assesment_actual" value="{{$trainee->assesment_actual}}">
                        </div>
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
@endforeach
<!-- end update modal -->

@endsection

@push('script')
<script type="text/javascript">
$('.selectpicker').selectpicker();
$('#realizationTable').dataTable( {
    paging: true,
    searching: true
} );
$('#ratatable').dataTable( {
    paging: true,
    searching: true
} );
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
$('#traineeTable').dataTable( {
    paging: true,
    searching: true
} );

</script>
@endpush