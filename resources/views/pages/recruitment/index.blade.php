@extends('layouts.master')

@section('title', 'Recruitment')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Recruitment Progress</h6>
                </div>
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Recruitment Progress</span></li>
                </ol>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <!-- Breadcrumb -->
                    
                    <!-- /Breadcrumb -->
                    <div  class="tab-struct custom-tab-1 mt-0">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Recruitment Progress</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Recruitment Data</a></li>
                            
                        </ul>
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable mt-10 pb-5 pt-5">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
                </div>
                @endif
                <div class="tab-content" id="myTabContent_7">
                <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                <div class="row">
                <div class="col-sm-12">
                <br> 
                <div class="process-wrapper">
                <div id="progress-bar-container">
                    <ul>
                        <li class="step step01 active"><div class="step-inner">FPTK</div></li>
                        <li class="step step02"><div class="step-inner">Interview HR</div></li>
                        <li class="step step03"><div class="step-inner">Interview User</div></li>
                        <li class="step step04"><div class="step-inner">Psikotes</div></li>
                        <li class="step step05"><div class="step-inner">MCU</div></li>
                        <li class="step step06"><div class="step-inner">Ttd Kontrak</div></li>
                        <li class="step step07"><div class="step-inner">Join</div></li>
                    </ul>
                    
                    <div id="line">
                        <div id="line-progress"></div>
                    </div>
                </div>

                <div id="progress-content-section">
                
                    <div class="section-content fptk active">
                    @foreach($progress as $p)
                    
                    <div class="baris">
                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateFPTK{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                        <span class="baris kiri">{{$p->nama}}</span>
                        <span class="baris kiri">{{$p->recruitmentStatus}}</span>
                        @if($p->tanggalFptk==null)
                        <span class="baris kanan">{{$p->tanggalFptk}}</span>
                        @else
                        <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalFptk))}}</span>
                        @endif
                    </div>    
                        
                        
                    @endforeach
                    </div>
                    
                    <div class="section-content hr">
                        <h2>Interview HR</h2>
                        @foreach($progress as $p)
                        @if($p->fptkStatus=='PASS')
                        <div class="baris">
                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateHR{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalInterviewHr==null)
                            {{$p->tanggalInterviewHr}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalInterviewHr))}}</span>
                            @endif
                        </div>
                        @endif
                    @endforeach
                    </div>
                    
                    <div class="section-content user">
                        <h2>Interview User 1</h2>
                        @foreach($progress as $p)
                        @if($p->interviewHrStatus=='PASS')
                        <div class="baris">
                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateUser1{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalInterviewUser1==null)
                            {{$p->tanggalInterviewUser1}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalInterviewUser1))}}</span>
                            <span class="baris kanan">{{$p->user1}}</span>

                            @endif
                        </div>
                        @endif
                        @endforeach
                        <h2>Interview User 2</h2>
                        @foreach($progress as $p)
                        @if($p->interviewUser1Status=='PASS')
                        <div class="baris">
                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateUser2{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>

                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalInterviewUser2==null)
                            {{$p->tanggalInterviewUser2}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalInterviewUser2))}}</span>
                            <span class="baris kanan">{{$p->user2}}</span>

                            @endif
                        </div>
                        @endif
                        @endforeach
                        <h2>Interview User 3</h2>
                        @foreach($progress as $p)
                        @if($p->interviewUser2Status=='PASS')
                        <div class="baris">
                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateUser3{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>

                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalInterviewUser3==null)
                            {{$p->tanggalInterviewUser3}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalInterviewUser3))}}</span>
                            <span class="baris kanan">{{$p->user3}}</span>
                            @endif
                        </div>
                        @endif
                        @endforeach
                    </div>
                    
                    <div class="section-content psikotes">
                        <h2>PSIKOTES</h2>
                        @foreach($progress as $p)
                        @if($p->interviewUser3Status=='PASS')
                        <div class="baris">
                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updatePsiko{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalPsikotes==null)
                            {{$p->tanggalPsikotes}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalPsikotes))}}</span>
                            @endif
                        </div>
                        @endif
                        @endforeach
                    </div>
                    
                    <div class="section-content mcu">
                        <h2>MCU</h2>
                        @foreach($progress as $p)
                        @if($p->recruitmentStatus=='Internship')
                        @if($p->interviewUser1Status=='PASS')
                        <div class="baris">
                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateMcu{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri" style="margin-right: auto">{{$p->nama}}</span>
                            
                            @if($p->mcuStatus=='fitnote')
                            <span class="baris label label-warning">{{$p->note}}</span>
                            @if($p->tanggalMcu==null)
                            {{$p->tanggalMcu}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalMcu))}}</span>
                            @endif
                            
                            @else
                            @if($p->tanggalMcu==null)
                            {{$p->tanggalMcu}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalMcu))}}</span>
                            @endif
                            @endif
                        </div>
                        @endif
                        @else
                        @if($p->psikotesStatus=='PASS')
                        <div class="baris">
                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateMcu{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri" style="margin-right: auto">{{$p->nama}}</span>
                            
                            @if($p->mcuStatus=='fitnote')
                            <span class="baris label label-warning">{{$p->note}}</span>
                            @if($p->tanggalMcu==null)
                            {{$p->tanggalMcu}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalMcu))}}</span>
                            @endif
                            
                            @else
                            @if($p->tanggalMcu==null)
                            {{$p->tanggalMcu}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalMcu))}}</span>
                            @endif
                            @endif
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                    
                    <div class="section-content ttd">
                        <h2>Tanda Tangan Kontrak</h2>
                        @foreach($progress as $p)
                        @if($p->recruitmentStatus!='Internship')
                        @if($p->mcuStatus=='fit')
                        <div class="baris">
                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateTtd{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalTtd==null)
                            {{$p->tanggalTtd}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalTtd))}}</span>
                            @endif
                        </div>
                        @elseif($p->mcuStatus=='fitnote')
                        <div class="baris">
                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateTtd{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                            <span class="baris kiri">{{$p->nama}}</span>
                            
                            @if($p->tanggalTtd==null)
                            {{$p->tanggalTtd}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalTtd))}}</span>
                            @endif
                        </div>
                        
                        @endif
                        @endif
                        @endforeach
                    </div>
                    
                    <div class="section-content join">
                        <h2>Join</h2>
                        @foreach($progress as $p)
                        @if($p->recruitmentStatus=='Internship')
                        @if($p->mcuStatus=='fit')
                        <div class="baris">
                            <span class="baris label label-success" style="margin-right: auto">{{$p->nama}}</span>
                            <span class="baris kiri">{{$p->recruitmentStatus}}</span>
                            @if($p->tanggalJoin==null)
                            {{$p->tanggalJoin}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalJoin))}}</span>
                            @endif
                        </div>
                        @elseif($p->mcuStatus=='fitnote')
                        <div class="baris">
                            <span class="baris label label-success" style="margin-right: auto">{{$p->nama}}</span>
                            <span class="baris kiri">{{$p->recruitmentStatus}}</span>
                            @if($p->tanggalJoin==null)
                            {{$p->tanggalJoin}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalJoin))}}</span>
                            @endif
                        </div>
                        @endif
                        @else
                        @if($p->joinStatus=='yes')
                        <div class="baris">
                            <span class="baris label label-success" style="margin-right: auto">{{$p->nama}}</span>
                            <span class="baris kiri">{{$p->recruitmentStatus}}</span>
                            @if($p->tanggalJoin==null)
                            {{$p->tanggalJoin}}
                            @else
                            <span class="baris kanan">{{date('d-m-Y', strtotime($p->tanggalJoin))}}</span>
                            @endif
                        </div>
                        @endif
                        @endif
                        @endforeach
                   </div>
                
                </div>
            </div>
            </div>
            </div>

                </div>
                <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-progress" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        
                <div class="table-wrap">
                <div class="table-responsive">
                <table id="recruitmentTable" class="table table-striped table-hover displayx table-bordered font-11 mt-10">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Job Title</th>
                            <th class="text-center">Status Recruitment</th>
                            <th class="text-center">Status Progress</th>
                            <th class="text-center">Leadtime Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($progress as $index=>$p)
                        <tr>
                            <td class="text-center">{{$index+1}}</td>
                            <td>{{$p->nama}}</td>
                            <td>{{$p->jobtitle}}</td>
                            <td>{{$p->recruitmentStatus}}</td>
                            <td>{{$p->progressrecruitment}}</td>
                            <td class="text-center">
                                @if($p->joinStatus=='yes')
                                    @if($p->recruitmentStatus=='Tetap')
                                        @if(\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)<='90')
                                        <span class="label label-success">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInDays($p->tanggalFptk, true)}}</span> 
                                        @else
                                        <span class="label label-danger">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInDays($p->tanggalFptk, true)}}</span> 
                                        @endif
                                    @endif
                                    @if($p->recruitmentStatus=='Internship')
                                        @if(\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)<='14')
                                        <span class="label label-success">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)}}</span> 
                                        @else
                                        <span class="label label-danger">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)}}</span> 
                                        @endif
                                    @endif
                                    @if($p->recruitmentStatus=='PKWT')
                                        @if(\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)<='30')
                                        <span class="label label-success">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)}}</span> 
                                        @else
                                        <span class="label label-danger">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)}}</span> 
                                        @endif
                                    @endif
                                    @if($p->recruitmentStatus=='OTS')
                                        @if(\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)<='14')
                                        <span class="label label-success">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)}}</span> 
                                        @else
                                        <span class="label label-danger">{{\Carbon\Carbon::parse($p->tanggalJoin)->diffInWeekdays($p->tanggalFptk, true)}}</span> 
                                        @endif
                                    @endif
                                @else
                                <span></span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{route('recruitment.delete',$p->idRecruitment)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$p->idRecruitment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
        </div>
        </div>
        </div>
    </div>
</div>
<!-- add modal -->
<div class="modal fade" id="add-progress" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data Recruitment</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('recruitment.post') }}" method="POST">
                @csrf 
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="">--Pilih Status Recritment--</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="nama" class="control-label mb-5">Job Title</label>
                            <input type="text" class="form-control" name="jobtitle">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="">--Progress Recruitment--</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="fptkStatus" class="control-label mb-5">FPTK</label>
                            <select name="fptkStatus" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtTrainer" class="control-label mb-5">Tanggal FPTK</label>
                            <input type="date" class="form-control"  name="tanggalFptk">
                        </div> 
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="interviewHrStatus" class="control-label mb-5">Interview HR</label>
                            <select name="interviewHrStatus" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview HR</label>
                            <input type="date" class="form-control" name="tanggalInterviewHr">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="interviewUser1Status" class="control-label mb-5">Interview User 1</label>
                            <select name="interviewUser1Status" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 1</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser1">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="interviewUser2Status" class="control-label mb-5">Interview User 2</label>
                            <select name="interviewUser2Status" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 2</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="interviewUser3Status" class="control-label mb-5">Interview User 3</label>
                            <select name="interviewUser3Status" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 3</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser3">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="psikotesStatus" class="control-label mb-5">Psikotes</label>
                            <select name="psikotesStatus" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Psikotes</label>
                            <input type="date" class="form-control" name="tanggalPsikotes">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="mcuStatus" class="control-label mb-5">MCU</label>
                            <select name="mcuStatus" class="form-control">
                                <option value="">--Status--</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal MCU</label>
                            <input type="date" class="form-control" name="tanggalMcu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="control-label mb-5">Note MCU*</label>
                        <input type="text" class="form-control" name="note">   
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="ttdStatus" class="control-label mb-5">TTD</label>
                            <select name="ttdStatus" class="form-control">
                                <option value="">--Status--</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal TTD</label>
                            <input type="date" class="form-control" name="tanggalTtd">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="joinStatus" class="control-label mb-5">Join</label>
                            <select name="joinStatus" class="form-control">
                                <option value="">--Status--</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Join</label>
                            <input type="date" class="form-control" name="tanggalJoin">
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
<!-- update -->
@foreach($progress as $p)
<div class="modal fade" id="update{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="fptkStatus" class="control-label mb-5">FPTK</label>
                            <select name="fptkStatus" class="form-control">
                                <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                                <option value="PASS">OPEN</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtTrainer" class="control-label mb-5">Tanggal FPTK</label>
                            <input type="date" class="form-control"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                        </div> 
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="interviewHrStatus" class="control-label mb-5">Interview HR</label>
                            <select name="interviewHrStatus" class="form-control" >
                                <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview HR</label>
                            <input type="date" class="form-control" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="interviewUser1Status" class="control-label mb-5">Interview User 1</label>
                            <select name="interviewUser1Status" class="form-control" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 1</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="nama" class="control-label mb-5">Interviewer</label>
                            <input type="text" class="form-control" name="user1" value="{{$p->user1}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="interviewUser2Status" class="control-label mb-5">Interview User 2</label>
                            <select name="interviewUser2Status" class="form-control" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 2</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="nama" class="control-label mb-5">Interviewer</label>
                            <input type="text" class="form-control" name="user2" value="{{$p->user2}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="interviewUser3Status" class="control-label mb-5">Interview User 3</label>
                            <select name="interviewUser3Status" class="form-control" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 3</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="nama" class="control-label mb-5">Interviewer</label>
                            <input type="text" class="form-control" name="user3" value="{{$p->user3}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="psikotesStatus" class="control-label mb-5">Psikotes</label>
                            <select name="psikotesStatus" class="form-control" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Psikotes</label>
                            <input type="date" class="form-control" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="mcuStatus" class="control-label mb-5">MCU</label>
                            <select name="mcuStatus" class="form-control" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal MCU</label>
                            <input type="date" class="form-control" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="control-label mb-5">Note MCU*</label>
                        <input type="text" class="form-control" name="note" value="{{$p->note}}">   
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="ttdStatus" class="control-label mb-5">TTD</label>
                            <select name="ttdStatus" class="form-control" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal TTD</label>
                            <input type="date" class="form-control" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="joinStatus" class="control-label mb-5">Join</label>
                            <select name="joinStatus" class="form-control">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Join</label>
                            <input type="date" class="form-control" name="tanggalJoin" value="{{$p->tanggalJoin}}">
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
<div class="modal fade" id="updateHR{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="OPEN">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalFptk" value="{{$p->tanggalFptk}}">
                        
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="interviewHrStatus" class="control-label mb-5">Interview HR</label>
                            <select name="interviewHrStatus" class="form-control" >
                                <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview HR</label>
                            <input type="date" class="form-control" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                        </div>
                    </div>
                    <select hidden name="interviewUser1Status" >
                        <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                    <input type="hidden" name="user1" value="{{$p->user1}}">
                    <select hidden name="interviewUser2Status" >
                            <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                            <option value="PASS">PASS</option>
                            <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                    <input type="hidden" name="user2" value="{{$p->user2}}">
                    <select hidden name="interviewUser3Status" >
                        <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                    <input type="hidden" name="user3" value="{{$p->user3}}">
                    <select hidden name="psikotesStatus" >
                            <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                            <option value="PASS">PASS</option>
                            <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                    <select hidden name="mcuStatus" >
                        <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                        <option value="fit">Fit</option>
                        <option value="fitnote">Fit with note</option>
                        <option value="unfit">Unfit</option>
                    </select>
                    <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                    <input type="hidden" name="note" value="{{$p->note}}">   
                    <select hidden name="ttdStatus" >
                        <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                    <select hidden name="joinStatus">
                        <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updateFPTK{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="fptkStatus" class="control-label mb-5">FPTK</label>
                            <select name="fptkStatus" class="form-control">
                                <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                                <option value="PASS">OPEN</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtTrainer" class="control-label mb-5">Tanggal FPTK</label>
                            <input type="date" class="form-control"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                        </div> 
                    </div>
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser1Status" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        <input type="hidden" name="user1" value="{{$p->user1}}">
                        <select hidden name="interviewUser2Status" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        <input type="hidden" name="user2" value="{{$p->user2}}">
                        <select hidden name="interviewUser3Status" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        <input type="hidden" name="user3" value="{{$p->user3}}">
                        <select hidden name="psikotesStatus" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        <select hidden name="mcuStatus" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        <input type="hidden" name="note" value="{{$p->note}}">   
                    <select hidden name="ttdStatus" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        <select hidden name="joinStatus">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updateUser1{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="interviewUser1Status" class="control-label mb-5">Interview User 1</label>
                            <select name="interviewUser1Status" class="form-control" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 1</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="nama" class="control-label mb-5">Interviewer</label>
                            <input type="text" class="form-control" name="user1" value="{{$p->user1}}">
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="PASS">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser2Status" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        <input type="hidden" name="user2" value="{{$p->user2}}">
                        <select hidden name="interviewUser3Status" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        <input type="hidden" name="user3" value="{{$p->user3}}">
                        <select hidden name="psikotesStatus" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        <select hidden name="mcuStatus" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        <input type="hidden" name="note" value="{{$p->note}}">   
                        <select hidden name="ttdStatus" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        <select hidden name="joinStatus">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updateUser2{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="PASS">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser1Status" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        <input type="hidden" name="user1" value="{{$p->user1}}">
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="interviewUser2Status" class="control-label mb-5">Interview User 2</label>
                            <select name="interviewUser2Status" class="form-control" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 2</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="nama" class="control-label mb-5">Interviewer</label>
                            <input type="text" class="form-control" name="user2" value="{{$p->user2}}">
                        </div>
                    </div>
                        <select hidden name="interviewUser3Status" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        <input type="hidden" name="user3" value="{{$p->user3}}">
                        <select hidden name="psikotesStatus" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        <select hidden name="mcuStatus" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        <input type="hidden" name="note" value="{{$p->note}}">   
                    <select hidden name="ttdStatus" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        <select hidden name="joinStatus">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updateUser3{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="PASS">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser1Status" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        <input type="hidden" name="user1" value="{{$p->user1}}">
                        <select hidden name="interviewUser2Status" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        <input type="hidden" name="user2" value="{{$p->user2}}">
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="interviewUser3Status" class="control-label mb-5">Interview User 3</label>
                            <select name="interviewUser3Status" class="form-control" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Interview User 3</label>
                            <input type="date" class="form-control" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="nama" class="control-label mb-5">Interviewer</label>
                            <input type="text" class="form-control" name="user3" value="{{$p->user3}}">
                        </div>
                    </div>
                        <select hidden name="psikotesStatus" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        <select hidden name="mcuStatus" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        <input type="hidden" name="note" value="{{$p->note}}">   
                    <select hidden name="ttdStatus" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        <select hidden name="joinStatus">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updatePsiko{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="PASS">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser1Status" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        <input type="hidden" name="user1" value="{{$p->user1}}">
                        <select hidden name="interviewUser2Status" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        <input type="hidden" name="user2" value="{{$p->user2}}">
                        <select hidden name="interviewUser3Status" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        <input type="hidden" name="user3" value="{{$p->user3}}">
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="psikotesStatus" class="control-label mb-5">Psikotes</label>
                            <select name="psikotesStatus" class="form-control" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Psikotes</label>
                            <input type="date" class="form-control" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        </div>
                    </div>
                        <select hidden name="mcuStatus" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        <input type="hidden" name="note" value="{{$p->note}}">   
                    <select hidden name="ttdStatus" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        <select hidden name="joinStatus">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updateMcu{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="PASS">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser1Status" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        <input type="hidden" name="user1" value="{{$p->user1}}">
                        <select hidden name="interviewUser2Status" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        <input type="hidden" name="user2" value="{{$p->user2}}">
                        <select hidden name="interviewUser3Status" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        <input type="hidden" name="user3" value="{{$p->user3}}">
                        <select hidden name="psikotesStatus" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="mcuStatus" class="control-label mb-5">MCU</label>
                            <select name="mcuStatus" class="form-control" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal MCU</label>
                            <input type="date" class="form-control" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="control-label mb-5">Note MCU*</label>
                        <input type="text" class="form-control" name="note" value="{{$p->note}}">   
                    </div>  
                    <select hidden name="ttdStatus" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                    @if($p->recruitmentStatus=='Internship')
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="joinStatus" class="control-label mb-5">Join</label>
                            <select name="joinStatus" class="form-control">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Join</label>
                            <input type="date" class="form-control" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        </div>
                    </div>
                    @else
                    <select hidden name="joinStatus">
                            <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    <input type="hidden" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                    @endif
                        
                        
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="updateTtd{{$p->idRecruitment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/recruitment/{{$p->idRecruitment}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-8">
                            <label for="nama" class="control-label mb-5">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$p->nama}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="recruitmentStatus" class="control-label mb-5">Status</label>
                            <select name="recruitmentStatus" class="form-control">
                            <option value="{{$p->recruitmentStatus}}">{{$p->recruitmentStatus}}</option>
                            <option value="PKWT">PKWT</option>
                            <option value="Tetap">Tetap</option>
                            <option value="OTS">OTS</option>
                            <option value="Internship">Internship</option>
                            </select>                        
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Job Title</label>
                        <input type="text" class="form-control" name="jobtitle" value="{{$p->jobtitle}}">
                        </div>
                        <div class="col-sm-6">
                        <label for="nama" class="control-label mb-5">Progress Recruitment</label>
                            <select name="progressrecruitment" class="form-control">
                                <option value="{{$p->progressrecruitment}}">{{$p->progressrecruitment}}</option>
                                <option value="FPTK">FPTK</option>
                                <option value="Interview HR">Interview HR</option>
                                <option value="Interview User 1">Interview User 1</option>
                                <option value="Interview User 2">Interview User 2</option>
                                <option value="Interview User 3">Interview User 3</option>
                                <option value="MCU">MCU</option>
                                <option value="Psikotest">Psikotest</option>
                                <option value="TTD">TTD</option>
                                <option value="Join">Join</option>
                            </select>
                        </div>
                    </div>
                    <select hidden name="fptkStatus">
                        <option value="{{$p->fptkStatus}}">{{$p->fptkStatus}}</option>
                        <option value="PASS">OPEN</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden"  name="tanggalFptk" value="{{$p->tanggalFptk}}">
                    <select hidden name="interviewHrStatus" >
                        <option value="{{$p->interviewHrStatus}}">{{$p->interviewHrStatus}}</option>
                        <option value="PASS">PASS</option>
                        <option value="FAIL">FAIL</option>
                    </select>
                    <input type="hidden" name="tanggalInterviewHr" value="{{$p->tanggalInterviewHr}}">
                    <select hidden name="interviewUser1Status" >
                                <option value="{{$p->interviewUser1Status}}">{{$p->interviewUser1Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser1" value="{{$p->tanggalInterviewUser1}}">
                        <input type="hidden" name="user1" value="{{$p->user1}}">
                        <select hidden name="interviewUser2Status" >
                                <option value="{{$p->interviewUser2Status}}">{{$p->interviewUser2Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser2" value="{{$p->tanggalInterviewUser2}}">
                        <input type="hidden" name="user2" value="{{$p->user2}}">
                        <select hidden name="interviewUser3Status" >
                                <option value="{{$p->interviewUser3Status}}">{{$p->interviewUser3Status}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalInterviewUser3" value="{{$p->tanggalInterviewUser3}}">
                        <input type="hidden" name="user3" value="{{$p->user3}}">
                        <select hidden name="psikotesStatus" >
                                <option value="{{$p->psikotesStatus}}">{{$p->psikotesStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        <input type="hidden" name="tanggalPsikotes" value="{{$p->tanggalPsikotes}}">
                        <select hidden name="mcuStatus" >
                                <option value="{{$p->mcuStatus}}">{{$p->mcuStatus}}</option>
                                <option value="fit">Fit</option>
                                <option value="fitnote">Fit with note</option>
                                <option value="unfit">Unfit</option>
                            </select>
                        <input type="hidden" name="tanggalMcu" value="{{$p->tanggalMcu}}">
                        <input type="hidden" name="note" value="{{$p->note}}">   
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="ttdStatus" class="control-label mb-5">TTD</label>
                            <select name="ttdStatus" class="form-control" >
                                <option value="{{$p->ttdStatus}}">{{$p->ttdStatus}}</option>
                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal TTD</label>
                            <input type="date" class="form-control" name="tanggalTtd" value="{{$p->tanggalTtd}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="joinStatus" class="control-label mb-5">Join</label>
                            <select name="joinStatus" class="form-control">
                                <option value="{{$p->joinStatus}}">{{$p->joinStatus}}</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="intTotalParticipants" class="control-label mb-5">Tanggal Join</label>
                            <input type="date" class="form-control" name="tanggalJoin" value="{{$p->tanggalJoin}}">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endforeach

@endsection
@push('script')
<script>
$('#recruitmentTable').dataTable( {
paging: true,
searching: true
} );

$(".step").click( function() {
	$(this).addClass("active").prevAll().addClass("active");
	$(this).nextAll().removeClass("active");
});

$(".step01").click( function() {
	$("#line-progress").css("width", "0%");
	$(".fptk").addClass("active").siblings().removeClass("active");
});

$(".step02").click( function() {
	$("#line-progress").css("width", "17%");
	$(".hr").addClass("active").siblings().removeClass("active");
});

$(".step03").click( function() {
	$("#line-progress").css("width", "33%");
	$(".user").addClass("active").siblings().removeClass("active");
});

$(".step04").click( function() {
	$("#line-progress").css("width", "50%");
	$(".psikotes").addClass("active").siblings().removeClass("active");
});

$(".step05").click( function() {
	$("#line-progress").css("width", "66%");
	$(".mcu").addClass("active").siblings().removeClass("active");
});
$(".step06").click( function() {
	$("#line-progress").css("width", "83%");
	$(".ttd").addClass("active").siblings().removeClass("active");
});
$(".step07").click( function() {
	$("#line-progress").css("width", "100%");
	$(".join").addClass("active").siblings().removeClass("active");
});

</script>
@endpush
