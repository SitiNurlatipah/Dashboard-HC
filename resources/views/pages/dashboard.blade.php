@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
	<!-- Row -->
    {{--<div class="row">
        <div class="col-md-12">
        
            <div class="panel panel-default card-view pt-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="form-wrap">
                        <!-- <form id="filter-form">
                            <label>Tanggal Awal:</label>
                            <input type="date" id="start_date" name="start_date" value="">
                            <label>Tanggal Akhir:</label>
                            <input type="date" id="end_date" name="end_date" value="">
                            <button type="submit">Filter</button>
                        </form> -->
                            <form action="{{ route('dashboard.filter') }}" method="POST" id="filter-form" class="form-inline mb-30 mt-30">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" />
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('dashboard') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="allYtdMtd" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="totalchart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Training</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body col-lg-4">
                            <div class="btn-group ml-10" role="group" aria-label="Basic example">
                            <button id="plain1" class="btn btn-primary autocompare">Column</button>
                            <button id="plain2" class="btn btn-primary autocompare">Stacked</button>
                            </div>
                            <div id="training" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-4">
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <button id="pelaksanaan1" class="btn btn-primary autocompare">Column</button>
                            <button id="pelaksanaan2" class="btn btn-primary autocompare">Stacked</button>
                            </div>
                            <div id="pelaksanaan" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-4">
                            <div id="biaya" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body col-lg-6">
                            <div id="plan_unplantraining" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="plain1" class="btn btn-primary autocompare">Column</button>
                        <button id="plain2" class="btn btn-primary autocompare">Stacked</button>
                        </div>
                        <div id="training" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="pelaksanaan1" class="btn btn-primary autocompare">Column</button>
                        <button id="pelaksanaan2" class="btn btn-primary autocompare">Stacked</button>
                        </div>
                        <div id="pelaksanaan" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="biaya" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel-wrapper collapse in">
                
                <div class="panel-body col-lg-6">
                    <div id="plan_unplantraining" class="" style="height:367px;"></div>
                </div>
                <div class="panel-body col-lg-6">
                    <div id="" class="" style="height:367px;"></div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="geto" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="salesChart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        
                        <div id="productChart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        
                        <div id="outputChart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="costMillionChart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        
            <div class="panel panel-default card-view pt-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="form-wrap">
                        <!-- <form id="filter-form">
                            <label>Tanggal Awal:</label>
                            <input type="date" id="start_date" name="start_date" value="">
                            <label>Tanggal Akhir:</label>
                            <input type="date" id="end_date" name="end_date" value="">
                            <button type="submit">Filter</button>
                        </form> -->
                            <form action="{{ route('dashboard.filter') }}" method="POST" id="filter-form" class="form-inline mb-30 mt-30">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('dashboard') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Overtime & Berita Department</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div  class="pills-struct mt-5">
                    <ul role="tablist" class="nav nav-pills" id="myTabs_6">
                        <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#home_6">Overtime</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false">Berita</a></li>
                        
                    </ul>
                    <div class="tab-content" id="myTabContent_6">
                        <div  id="home_6" class="tab-pane fade active in" role="tabpanel">
                            <div class="row">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body col-sm-12">
                                        <div id="overtimekaryawan" class="" style="height:367px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <div class="row col-sm-12 mt-10">
                                        <!-- <div class=" mb-5">
                                        <h6 class="panel-title txt-dark text-center">{{ \Carbon\Carbon::now()->format('F Y') }}</h6>
                                        </div> -->
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="100%" >
                                                    <thead class="bg-success">
                                                        <tr>
                                                            <th colspan="6" class="text-center">HC</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        
                                                        @if($overtime->id_department==1)
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        
                                                        @endif
                                                        
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-warning">
                                                        <tr>
                                                            <th colspan="6" class="text-center">BDA</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==7)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-twitter">
                                                        <tr>
                                                            <th colspan="6" class="text-center">PRD</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==2)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-grey">
                                                        <tr>
                                                            <th colspan="6" class="text-center">ENG</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==6)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-beige">
                                                        <tr>
                                                            <th colspan="6" class="text-center">MDP</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==8)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-seagreen">
                                                        <tr>
                                                            <th colspan="6" class="text-center">IOS</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==5)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row col-sm-12">
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-dark-green">
                                                        <tr>
                                                            <th colspan="6" class="text-center">QA</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==4)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                <thead class="bg-info">
                                                        <tr>
                                                            <th colspan="6" class="text-center">WHS</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Overtime Weight Hour</th>
                                                                
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i = 1; @endphp
                                                        @foreach($otdepartment as $overtime)
                                                        @if($overtime->id_department==3)
                                                        
                                                        <tr>
                                                            <td>{{$i++}}</td>
                                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                                            <td>{{$overtime->nik}}</td>
                                                            <td>{{$overtime->nama}}</td>
                                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                                            
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  id="profile_6" class="tab-pane fade" role="tabpanel">
                            <div class="row">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body col-sm-12">
                                        <div id="beritakaryawan" class="" style="height:367px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <div class="row col-sm-12">
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                    <thead class="bg-dark-green">
                                                        <tr>
                                                            <th colspan="6" class="text-center">TERLAMBAT</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">Department</th>
                                                            <th class="text-center">Jumlah</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($terlambat as $late)
                                                        <tr>
                                                            <td>{{date('F Y', strtotime($late->bulan))}}</td>
                                                            <td>{{$late->department}}</td>
                                                            <td>{{$late->telat}}</td>
                                                            <td class="text-center">
                                                                <a class="btn btn-info btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#show{{$late->iddepartment}}" data-whatever="@mdo"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                <thead class="bg-info">
                                                        <tr>
                                                            <th colspan="6" class="text-center">KELAHIRAN</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">Department</th>
                                                            <th class="text-center">Jumlah</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($kelahiran as $lahir)
                                                        <tr>
                                                            <td>{{date('F Y', strtotime($lahir->bulan))}}</td>
                                                            <td>{{$lahir->department}}</td>
                                                            <td>{{$lahir->jmlkelahiran}}</td>
                                                            <td class="text-center">
                                                                <a class="btn btn-info btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#showlahir{{$lahir->iddepartment}}" data-whatever="@mdo"><i class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-sm-4">
                                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                                <thead class="bg-beige">
                                                        <tr>
                                                            <th colspan="6" class="text-center">DUKACITA</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center">Bulan</th>
                                                            <th class="text-center">Department</th>
                                                            <th class="text-center">Jumlah</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($dukacita as $dcita)
                                                        <tr>
                                                            <td>{{date('F Y', strtotime($dcita->bulan))}}</td>
                                                            <td>{{$dcita->department}}</td>
                                                            <td>{{$dcita->jmldukacita}}</td>
                                                            <td class="text-center">
                                                                <a class="btn btn-info btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#showdukacita{{$dcita->iddepartment}}" data-whatever="@mdo"><i class="fa fa-eye"></i></a>
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
                
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">KCS Inventory</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        
                        <div id="kcsinventorychart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">KCH Inventory</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        
                        <div id="kchinventorychart" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">KCS</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                {{--<div class="row">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body col-lg-12">
                            <div id="kcsinventorychart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>--}}
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body col-lg-6">
                            <div id="fsnchart" class="" style="height:367px;"></div>
                            <div class="btn-group ml-15" role="group" aria-label="Basic example">
                            <button id="fsn1" class="btn btn-primary autocompare mr-5">Column</button>
                            <button id="fsn2" class="btn btn-primary autocompare">Stacked</button>
                            </div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="codechart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        
                        <div class="panel-body col-lg-6">
                            <div id="rucostchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="ruitemchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">  
                        <div class="panel-body col-lg-4">
                            <div id="toptenchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-4">
                            <div id="topreceiptchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-4">
                            <div id="topissuedchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">  
                        <div class="panel-body col-lg-6">
                            <div id="kcsdepartmentchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="kcscostcenterchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">KCH</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                {{--<div class="row">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body col-lg-12">
                            <div id="kchinventorychart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>--}}
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body col-lg-6">
                            <div id="fsnkchchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="codekchchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        
                        <div class="panel-body col-lg-6">
                            <div id="kchcostchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="kchitemchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        
                        <div class="panel-body col-lg-4">
                            <div id="toptenkchchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-4">
                            <div id="kchtopreceiptchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-4">
                            <div id="kchtopissuedchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-wrapper collapse in">
                        
                        <div class="panel-body col-lg-6">
                            <div id="kchdepartmentchart" class="" style="height:367px;"></div>
                        </div>
                        <div class="panel-body col-lg-6">
                            <div id="kchcostcenterchart" class="" style="height:367px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{--<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-5 col-xs-12">
            <div class="panel panel-default card-view pt-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box bg-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                        <span class="txt-dark block counter">$<span class="counter-anim">15,678</span></span>
                                        <span class="block"><span class="weight-500 uppercase-font txt-grey font-13">growth</span><i class="zmdi zmdi-caret-down txt-danger font-21 ml-5 vertical-align-middle"></i></span>
                                    </div>
                                    <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                        <div id="sparkline_4" class="sp-small-chart" ></div>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default card-view pt-0 bg-green">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="sm-data-box bg-white">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                        <span class="txt-light block counter"><span class="counter-anim">46.41</span>%</span>
                                        <span class="block"><span class="weight-500 uppercase-font txt-light font-13">population</span><i class="zmdi zmdi-caret-up txt-success font-21 ml-5 vertical-align-middle"></i></span>
                                    </div>
                                    <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                        <div id="sparkline_5" class="sp-small-chart" ></div>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body sm-data-box-1">
                        <span class="uppercase-font weight-500 font-14 block text-center txt-dark">success index this year</span>	
                        <div class="cus-sat-stat weight-500 txt-success text-center mt-5">
                            <span class="counter-anim">80.13</span><span>%</span>
                        </div>
                        <div class="progress-anim mt-20">
                            <div class="progress">
                                <div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="80.13" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <ul class="flex-stat mt-5">
                            <li class="half-width">
                                <span class="block">joined shcool</span>
                                <span class="block txt-dark weight-500 font-15">
                                    <i class="zmdi zmdi-trending-up txt-success font-20 mr-10"></i>52
                                </span>
                            </li>
                            <li class="half-width">
                                <span class="block">dropped shcool</span>
                                <span class="block txt-dark weight-500 font-15">+14.29</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">KCS</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Top 10 KCS HRGA</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="" class="" style="height:367px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>	
    
    <!-- Row -->
    <!-- Row -->
    <div class="row">
        
        <div class="col-lg-7 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Website Traffic</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div id="totalchart" class="" style="height:197px;"></div>
                            </div>
                        </div>
                    </div>
                
                    <div id="weather_3" class="panel panel-default card-view pa-0 weather-success">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="row ma-0">
                                    <div class="col-xs-6 pa-0">
                                        <div class="left-block-wrap pa-30">
                                            <p class="block nowday"></p>
                                            <span class="block nowdate"></span>
                                            <div class="left-block  mt-15"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 pa-0">
                                        <div class="right-block-wrap pa-30">
                                            <div class="right-block"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">radar Chart</h6>
                            </div>
                            <div class="pull-right">
                                <div class="pull-left inline-block dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div id="allYtdMtd" class="" style="height:401px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-lg-5 col-xs-12">
            <div id="weather_1" class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <div class="dropdown inline-block">
                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-outline dropdown-toggle border-none pa-0 font-16" type="button"><span></span><i class="zmdi  zmdi-chevron-down ml-15"></i></button>
                            <ul class="dropdown-menu bullet dropdown-menu-left"  role="menu">
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Montreal</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Melbourne   </a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Mumbai</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i> Washington DC</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Tokyo   </a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Los Angeles </a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Singapore  </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <h6 class="block nowday"></h6>
                        <span class="block nowdate"></span>
                        <div class="weather weatherapp mt-15"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->  
    <!-- Row -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default card-view panel-refresh">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Audience location</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <a href="#" class="pull-left inline-block full-screen mr-15">
                            <i class="zmdi zmdi-fullscreen"></i>
                        </a>
                        <div class="pull-left inline-block dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="world_map_marker_1" style="height: 385px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-default card-view panel-refresh">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Gender Split</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <div class="pull-left inline-block dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="e_chart_5" class="" style="height:260px;"></div>
                        <hr class="light-grey-hr row mt-10 mb-15"/>
                        <div class="label-chatrs">
                            <div class="">
                                <span class="clabels clabels-lg inline-block bg-green mr-10 pull-left"></span>
                                <span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-16 weight-500 mb-5"><span class="counter-anim">30</span>%</span><span class="block txt-grey">Male</span></span>
                                <i class="big-rpsn-icon zmdi zmdi-male-alt pull-right txt-success"></i>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <hr class="light-grey-hr row mt-10 mb-15"/>
                        <div class="label-chatrs">
                            <div class="">
                                <span class="clabels clabels-lg inline-block bg-light-green mr-10 pull-left"></span>
                                <span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-16 weight-500 mb-5"><span class="counter-anim">70</span>%</span><span class="block txt-grey">Female</span></span>
                                <i class="big-rpsn-icon zmdi zmdi-female pull-right txt-light-green"></i>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">browser stats</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block mr-15">
                            <i class="zmdi zmdi-download"></i>
                        </a>
                        <a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
                            <i class="zmdi zmdi-close"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body row">
                            <div class="table-wrap sm-data-box-2">
                            <div class="table-responsive">
                                <table  class="table  top-countries mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="../img/country/01-flag.png" alt="country">	
                                                <span class="country-name txt-dark pl-15">Aland</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-warning transparent-badge weight-500">57%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../img/country/02-flag.png" alt="country">	
                                                <span class="country-name txt-dark pl-15">Angola</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-danger transparent-badge weight-500">17%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../img/country/03-flag.png" alt="country">
                                                <span class="country-name txt-dark pl-15">Anguilla</span>
                                            </td>
                                            
                                            <td class="text-right">
                                                <span class="badge badge-info transparent-badge weight-500">27%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../img/country/04-flag.png" alt="country">
                                                <span class="country-name txt-dark pl-15">Bahrain</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-danger transparent-badge weight-500">17%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../img/country/05-flag.png"  alt="country">
                                                <span class="country-name txt-dark pl-15">Australia</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-primary transparent-badge weight-500">51%</span>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <img src="../img/country/06-flag.png" alt="country">	
                                                <span class="country-name txt-dark pl-15">Austria</span>
                                            </td>
                                            
                                            <td class="text-right">
                                                <span class="badge badge-warning transparent-badge weight-500">10%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="../img/country/07-flag.png" alt="country">
                                                <span class="country-name txt-dark pl-15">Belgium</span>
                                            </td>
                                            <td class="text-right">
                                                <span class="badge badge-success transparent-badge weight-500">27%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="txt-dark">
                                                Other	
                                            </td>
                                            
                                            <td class="text-right">
                                                <span class="badge badge-warning transparent-badge weight-500">10%</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>--}}
    <!-- /Row -->

<!-- modal -->
@foreach($terlambat as $late)
<div class="modal fade" id="show{{$late->iddepartment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Details Terlambat</h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="dtable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Nama</th>    
                                <th class="text-center">Department</th>    
                                <th class="text-center">Jumlah</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailsterlambat as $details)
                            @if($details->id_department==$late->iddepartment)
                            <tr>
                                <td class="">{{ $details->bulan }}</td>
                                <td class="">{{ $details->nama }}</td>
                                <td class="">{{ $late->department }}</td>
                                <td class="text-center">{{ $details->jumlahtelat }}</td>
                                
                            </tr>
                            @endif   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($kelahiran as $lahir)
<div class="modal fade" id="showlahir{{$lahir->iddepartment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Details Kelahiran</h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="dtable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Nama</th>    
                                <th class="text-center">Department</th>    
                                <th class="text-center">Keterangan</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailskelahiran as $dkelahiran)
                            @if($dkelahiran->id_department==$lahir->iddepartment)
                            <tr>
                                <td class="">{{ $dkelahiran->bulan }}</td>
                                <td class="">{{ $dkelahiran->nama }}</td>
                                <td class="">{{ $lahir->department }}</td>
                                <td class="text-center">{{ $dkelahiran->keterangan }}</td>
                                
                            </tr>
                            @endif   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($dukacita as $dcita)
<div class="modal fade" id="showdukacita{{$dcita->iddepartment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Details Dukacita</h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="dtable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Nama</th>    
                                <th class="text-center">Department</th>    
                                <th class="text-center">Keterangan</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailsdukacita as $details_dukacita)
                            @if($details_dukacita->id_department==$dcita->iddepartment)
                            <tr>
                                <td class="">{{ $details_dukacita->bulan }}</td>
                                <td class="">{{ $details_dukacita->nama }}</td>
                                <td class="">{{ $dcita->department }}</td>
                                <td class="text-center">{{ $details_dukacita->keterangan }}</td>
                                
                            </tr>
                            @endif   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endforeach

<!-- end modal -->
@endsection

@push('script')
<script>
var total =  <?php echo json_encode($ytdmtdTotal) ?>;
var totalMpp =  <?php echo json_encode($ytdmtdTotalMpp) ?>;
var ytdmtd =  <?php echo json_encode($ytdmtd) ?>;
var ytdPermanent =  <?php echo json_encode($ytdmtdPermanent) ?>;
var ytdContract =  <?php echo json_encode($ytdmtdContract) ?>;
var ytdJobsupply =  <?php echo json_encode($ytdmtdJobsupply) ?>;
var bulanytd =  <?php echo json_encode($bulanytdmtd) ?>;

Highcharts.chart('totalchart', {
        title: {
            text: 'MPP & Real Employee'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanytd
        },
        yAxis: {
            title: {
            enabled: false
            }
        },
        legend: {
            verticalAlign: 'bottom'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                enabled: true
            },
            },
            column:{
                animation: {
                duration: 3000
            }
            }
        },
        series: [{
            type: 'column',
            name: 'MPP Total Employee',
            data: totalMpp,
            point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('mppreal') }}";
                }
            }},
        },{
            type: 'column',
            name: 'Real Total Employee',
            data: total,
            point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('mppreal') }}";
                }
            }},
        
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
Highcharts.chart('allYtdMtd', {
        title: {
            text: 'YTD & MTD Employee'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanytd
        },
        yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
       verticalAlign: 'bottom'
    },
    credits: {
        enabled: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            },
            animation: {
            duration: 3000
            }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('mppreal') }}";
                    }
                }
            }
        }
    },
        series: [{
            type: 'column',
            name: 'Permanent',
            data: ytdPermanent,
            
        },{
            type: 'column',
            name: 'Contract',
            data: ytdContract,
            
        },{
            type: 'column',
            name: 'Job Supply',
            data: ytdJobsupply,
            
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
var internal =  <?php echo json_encode($internalTraining) ?>;
var external =  <?php echo json_encode($externalTraining) ?>;
var inhouse =  <?php echo json_encode($inhouseTraining) ?>;
var online =  <?php echo json_encode($OnlineTraining) ?>;
var offline =  <?php echo json_encode($OfflineTraining) ?>;
var blended =  <?php echo json_encode($BlendedTraining) ?>;
var daftar =  <?php echo json_encode($pendaftaranTraining) ?>;
var snack =  <?php echo json_encode($snackTraining) ?>;
var plan =  <?php echo json_encode($PlanTraining) ?>;
var unplan =  <?php echo json_encode($UnplanTraining) ?>;
var tahunx =  <?php echo json_encode($bulantraining) ?>;

const chart = Highcharts.chart('training', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Type Training',
    },
    xAxis: {
        categories: tahunx
    },
    legend: {
        verticalAlign: 'bottom'
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        }, 
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        } 
        },
    plotOptions: {
        column: {
            stacking: false,
            dataLabels: {
                enabled: true
            }
    }
    },
    credits: {
        enabled: false
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    
    series: [{
        name: 'Internal',
        data: internal,
        point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('realization') }}";
                }
        }},
    }, {
        name: 'External',
        data: external,
        point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('realization') }}";
                }
        }},
    }, {
        name: 'In House',
        data: inhouse,
        point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('realization') }}";
                }
        }},
    }]
});
document.getElementById('plain1').addEventListener('click', () => {
    chart.update({
        plotOptions: {
        column: {
            stacking: false,
            dataLabels: {
                enabled: true
            }
        }
        },
    });
});
document.getElementById('plain2').addEventListener('click', () => {
    chart.update({
        plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
        },
    });
});
const pl = Highcharts.chart('pelaksanaan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pelaksanaan Training',
    },
    xAxis: {
        categories: tahunx
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    credits: {
        enabled: false
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            },
            layout: 'horizontal',
        }
    },
    series: [{
        name: 'Online',
        data: online,
        point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('realization') }}";
                }
        }},
    }, {
        name: 'Offline',
        data: offline,
        point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('realization') }}";
                }
        }},
    }, {
        name: 'Blended',
        data: blended,
        point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('realization') }}";
                }
        }},
    }]
});
document.getElementById('pelaksanaan1').addEventListener('click', () => {
    pl.update({
        plotOptions: {
        column: {
            stacking: false,
            dataLabels: {
                enabled: true
            }
        }
        },
    });
});
document.getElementById('pelaksanaan2').addEventListener('click', () => {
    pl.update({
        plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
        },
    });
});
Highcharts.chart('biaya', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cost Training',
    },
    xAxis: {
        categories: tahunx
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        labels: {
        formatter: function() {
          return 'Rp' + this.axis.defaultLabelFormatter.call(this);
        }
        },
        stackLabels: {
            enabled: true,
            formatter: function() {
                if(this.total>1000){
                    return 'Rp' + Highcharts.numberFormat(this.total/1000,0)+'K' 
                }else{
                    return 'Rp' + Highcharts.numberFormat(this.total,0)
                }
            
            },
            tooltip: {
            valuePrefix: 'Rp'
            },
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none',
                
            }
            
        }
    },
    legend: {
        
            verticalAlign: 'bottom'
    },
    credits: {
        enabled: false
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: Rp{point.stackTotal}',
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(this.y/1000,0) +'K'
                },
            },
            
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('realization') }}";
                    }
                }
            }
        }

    },
    series: [{
        name: 'Pendaftaran',
        data: daftar,
        tooltip: {
        valuePrefix: 'Rp'
        }
    }, {
        name: 'Snack',
        data: snack,
        tooltip: {
        valuePrefix: 'Rp'
        },
    }]
});
Highcharts.chart('plan_unplantraining', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Plan & Unplan Training',
    },
    xAxis: {
        categories: tahunx
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: false,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    credits: {
        enabled: false
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: false,
            dataLabels: {
                enabled: true
            }
    }
    },
    series: [{
        name: 'Plan',
        data: plan,
        
    }, {
        name: 'Unplan',
        data: unplan,
        
    }]
});
    var productivity =  <?php echo json_encode($productiv) ?>;
    var bulan =  <?php echo json_encode($bulanProd) ?>;
    var bulanCost =  <?php echo json_encode($bulanCost) ?>;
    var costActual =  <?php echo json_encode($costActual) ?>;
    var actual =  <?php echo json_encode($actual) ?>;
    var topten =  <?php echo json_encode($dataPoints) ?>;
    // first.addEventListener('click', () => {  
    Highcharts.chart('productChart', {
        title: {
            text: 'Productivity (Kg/Man)'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
        xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                enabled: false,
            }
        },
        legend: {
        verticalAlign: 'bottom'
        },
        credits: {
            enabled: false
        },
    
        plotOptions: {
            column: {
                stacking: 'normal',
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    rotation: 270,
                    style: {
                    fontWeight: 'bold',
                    fontSize: 8,
                    }
                },
                layout: 'horizontal',

            },
            series: {
                point: {
                    events: {
                        click: function() {
                            // code to redirect to another page here
                            window.location.href = "{{ route('productivity') }}";
                        }
                    }
                }
            }
        },
        series: [{
            type: 'column',
            name: 'Productivity',
            data: productivity,

        }],
        responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
        }
    });
    Highcharts.chart('outputChart', {
        title: {
            text: 'Output'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
        xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                enabled: false,
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        credits: {
            enabled: false
        },
    
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                enabled: true
                },
            },
        },
        series: [{
            type: 'column',
            name: 'Output Actual',
            data: actual,
            point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('productivity') }}";
                }
            }}

        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    Highcharts.chart('costMillionChart', {
        title: {
            text: 'Human Cost Actual'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanCost
        },
        yAxis: {
            title: {
                text: 'Million'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            // series: {
            //     allowPointSelect: true,
            //     dataLabels: {
            //     enabled: true
            //     },
            //     rotation: 270,
            //     align: 'middle',
            // },
            column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                rotation: 270,
                // align: 'left',
            },
            layout: 'horizontal',
            }
        },
        credits: {
            enabled: false
        },
    
        series: [{
            type: 'column',
            name: 'Cost Actual',
            data: costActual,
            point: {
            events: {
                click: function() {
                    // code to redirect to another page here
                    window.location.href = "{{ route('productivity') }}";
                }
            }}

        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    Highcharts.chart('toptenchart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Top 10 KCS Inventory'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                size:'75%',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:<br/> {point.percentage:.1f} %',
                    style: {
                        fontWeight: 'bold',
                        fontSize: 8,  
                    }
                }
            },
            series: {
            point: {
                    events: {
                        click: function() {
                            // code to redirect to another page here
                            window.location.href = "{{ route('kcs') }}";
                        }
                    }
                }
            }
        },
        credits: {
            enabled: false
        },
    
        series: [{
            name: 'Total Cost',
            colorByPoint: true,
            data: topten
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    var bulaninven =  <?php echo json_encode($bulaninventory) ?>;
    var inventory =  <?php echo json_encode($inventory) ?>;
    var savingkch =  <?php echo json_encode($targetsavingkch) ?>;
    var hasilinven =  <?php echo json_encode($result) ?>;
    var panah =  <?php echo json_encode($panah) ?>;
    Highcharts.chart('kchinventorychart', {
        title: {
            text: 'KCH INVENTORY'
        },
        xAxis: {
            categories: bulaninven
        },
        yAxis: {
            min: 0,
            title: {
                enabled: false
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'black',
                    textOutline: 'none'
                }
            }
        },
        legend: {
            verticalAlign: 'bottom'
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}'
        },
        credits: {
            enabled: false
        },
    
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    useHTML: true,
                    formatter: function() {
                    // var icon = panah[this.point.index];
                    return Highcharts.numberFormat(hasilinven[this.point.index]*100,0) + '% <br/>'+
                    '<i class="fa ' + panah[this.point.index] + '" style="font-size: 20px;"></i> '
                    // return this.y + ' (' + hasilinven[this.point.index] + ')';
                    },
                },
            },
            line: {
                dataLabels: {
                    enabled: false
                }
            },
            series: {
                point: {
                    events: {
                        click: function() {
                            // code to redirect to another page here
                            window.location.href = "{{ route('kch') }}";
                        }
                    }
                }
            }
        },
        series: [{
            type: 'column', 
            name: 'Inventory KCH',
            data: inventory
        },{
            type: 'line', 
            name: 'Target Saving',
            data: savingkch
        }]
    });
    var bulaninvenkcs =  <?php echo json_encode($bulaninventorykcs) ?>;
    var inventorykcs =  <?php echo json_encode($kcsinventory) ?>;
    var savingkcs =  <?php echo json_encode($targetsavingkcs) ?>;
    var hasilinvenkcs =  <?php echo json_encode($resultkcs) ?>;
    var panahkcs =  <?php echo json_encode($panahkcs) ?>;
    Highcharts.chart('kcsinventorychart', {
        title: {
            text: 'KCS INVENTORY'
        },
        xAxis: {
            categories: bulaninvenkcs
        },
        yAxis: {
            min: 0,
            title: {
                enabled: false
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'black',
                    textOutline: 'none'
                }
            }
        },
        legend: {
            verticalAlign: 'bottom'
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}'
        },
        credits: {
            enabled: false
        },
    
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    useHTML: true,
                    formatter: function() {
                    // var icon = panah[this.point.index];
                    return Highcharts.numberFormat(hasilinvenkcs[this.point.index]*100,0) + '% <br/>'+
                    '<i class="fa ' + panahkcs[this.point.index] + '" style="font-size: 20px;"></i> '
                    // return this.y + ' (' + hasilinven[this.point.index] + ')';
                    },
                },
            },
            line: {
                dataLabels: {
                    enabled: false
                }
            },
            series: {
            point: {
                    events: {
                        click: function() {
                            // code to redirect to another page here
                            window.location.href = "{{ route('kcs') }}";
                        }
                    }
                }
            }
        },
        series: [{
            type: 'column', 
            name: 'Inventory KCS',
            data: inventorykcs
        },{
            type: 'line', 
            name: 'Target Saving',
            data: savingkcs
        }]
    });
    var bulanfsn =  <?php echo json_encode($bulanFsn) ?>;
    var fast =  <?php echo json_encode($fastmov) ?>;
    var slow =  <?php echo json_encode($slowmov) ?>;
    var nonmov =  <?php echo json_encode($nonmov) ?>;
    var deadstock =  <?php echo json_encode($deadstock) ?>;
const kfsn = Highcharts.chart('fsnchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'FSN',
    },
    xAxis: {
        categories: bulanfsn
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    credits: {
        enabled: false
    },
    
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            },
            layout: 'horizontal',
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Fast Moving',
        data: fast
    }, {
        name: 'Slow Moving',
        data: slow
    }, {
        name: 'Non Moving',
        data: nonmov
    }, {
        name: 'Dead Stock',
        data: deadstock
    }]
});
document.getElementById('fsn1').addEventListener('click', () => {
    kfsn.update({
        plotOptions: {
        column: {
            stacking: false,
            dataLabels: {
                enabled: true
            }
        }
        },
    });
});
document.getElementById('fsn2').addEventListener('click', () => {
    kfsn.update({
        plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
        },
    });
});
var bulancode =  <?php echo json_encode($monthcode) ?>;
var itemcode =  <?php echo json_encode($jmlcode) ?>;
Highcharts.chart('codechart', {
    title: {
        text: 'Total Item Code'
    },
    xAxis: {
    categories: bulancode
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    plotOptions: {
        column: {
            allowPointSelect: true,
            dataLabels: {
            enabled: true
        }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    credits: {
        enabled: false
    },
    
    series: [{
        type: 'column',
        name: 'Total Item Code',
        data: itemcode
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var bulanreuse =  <?php echo json_encode($bulanreceiptusage) ?>;
var receiptcost =  <?php echo json_encode($costreceipt) ?>;
var usagecost =  <?php echo json_encode($costusage) ?>;
var usageitem =  <?php echo json_encode($itemusage) ?>;
var receiptitem =  <?php echo json_encode($itemreceipt) ?>;

Highcharts.chart('rucostchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Receipt & Issued',
    },
    xAxis: {
        categories: bulanreuse
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: false,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>'
    },
    credits: {
        enabled: false
    },
    
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(this.y,0)
                },
                // rotation: 270,
                // align: 'middle',
                style: {
                fontWeight: 'bold',
                fontSize: 8,
                
            }
            },
            layout: 'horizontal',
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Usage',
        data: usagecost
    }, {
        name: 'Receipt',
        data: receiptcost
    }]
});
Highcharts.chart('ruitemchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Item Code Receipt & Issued',
    },
    xAxis: {
        categories: bulanreuse
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: false,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    credits: {
        enabled: false
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            },
            layout: 'horizontal',
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Item Code Usage',
        data: usageitem
    }, {
        name: 'Item Code Receipt',
        data: receiptitem
    
    }]
});
    var bulanfsnkch =  <?php echo json_encode($bulanfsnkch) ?>;
    var fastkch =  <?php echo json_encode($fastmovkch) ?>;
    var slowkch =  <?php echo json_encode($slowmovkch) ?>;
    var nonmovkch =  <?php echo json_encode($nonmovkch) ?>;
    var deadstockkch =  <?php echo json_encode($deadstockkch) ?>;
    var toptenkch =  <?php echo json_encode($datatopten) ?>;

Highcharts.chart('fsnkchchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'FSN',
    },
    xAxis: {
        categories: bulanfsnkch
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    legend: {
        verticalAlign: 'bottom'
    },
    credits: {
        enabled: false
    },
    
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            },
            layout: 'horizontal',
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Fast Moving',
        data: fastkch
    }, {
        name: 'Slow Moving',
        data: slowkch
    }, {
        name: 'Non Moving',
        data: nonmovkch
    }, {
        name: 'Dead Stock',
        data: deadstockkch
    }]
});
Highcharts.chart('toptenkchchart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Top 10 KCH Inventory'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        credits: {
            enabled: false
        },
    
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                size:'75%',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:<br/> {point.percentage:.1f} %',
                    style: {
                        fontWeight: 'bold',
                        fontSize: 8,  
                    }
                }
            },
            series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
        },
        series: [{
            name: 'Total Cost',
            colorByPoint: true,
            data: toptenkch
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
var bulancodekch =  <?php echo json_encode($monthcodekch) ?>;
var itemcodekch =  <?php echo json_encode($jmlcodekch) ?>;
Highcharts.chart('codekchchart', {
    title: {
        text: 'Total Item Code'
    },
    xAxis: {
    categories: bulancodekch
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    plotOptions: {
        column: {
            allowPointSelect: true,
            dataLabels: {
            enabled: true
        }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        type: 'column',
        name: 'Total Item Code',
        data: itemcodekch
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var kchbulanreuse =  <?php echo json_encode($bulanreceiptusagekch) ?>;
var receiptcostkch =  <?php echo json_encode($costreceiptkch) ?>;
var usagecostkch =  <?php echo json_encode($costusagekch) ?>;
var usageitemkch =  <?php echo json_encode($itemusagekch) ?>;
var receiptitemkch =  <?php echo json_encode($itemreceiptkch) ?>;

Highcharts.chart('kchcostchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Receipt & Issued',
    },
    xAxis: {
        categories: kchbulanreuse
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: false,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                formatter: function() {
                return 'Rp' + Highcharts.numberFormat(this.y,0)
                },
                // rotation: 270,
                // align: 'middle',
                style: {
                fontWeight: 'bold',
                fontSize: 7,
                
            }
            },
            layout: 'horizontal',
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Usage',
        data: usagecostkch
    }, {
        name: 'Receipt',
        data: receiptcostkch
    }]
});
Highcharts.chart('kchitemchart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Item Code Receipt & Issued',
    },
    xAxis: {
        categories: kchbulanreuse
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: false,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray',
                textOutline: 'none'
            }
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            },
            layout: 'horizontal',
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Item Code Usage',
        data: usageitemkch
    }, {
        name: 'Item Code Receipt',
        data: receiptitemkch
    
    }]
});
var treceipt =  <?php echo json_encode($dataTopReceipt) ?>;
var tissued =  <?php echo json_encode($dataTopIssued) ?>;
Highcharts.chart('topreceiptchart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Top 10 Receipt'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            size:'75%',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>:<br/> {point.percentage:.1f} %',
                style: {
                    fontWeight: 'bold',
                    fontSize: 8,  
                }
            }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    credits: {
        enabled: false
    },
    
    series: [{
        name: 'Total Cost',
        colorByPoint: true,
        data: treceipt
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
Highcharts.chart('topissuedchart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Top 10 Issued'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    credits: {
        enabled: false
    },
    
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            size:'75%',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>:<br/> {point.percentage:.1f} %',
                style: {
                    fontWeight: 'bold',
                    fontSize: 8,  
                }
            }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Total Cost',
        colorByPoint: true,
        data: tissued
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var treceiptkch =  <?php echo json_encode($kchdataTopReceipt) ?>;
var tissuedkch =  <?php echo json_encode($kchdataTopIssued) ?>;
Highcharts.chart('kchtopreceiptchart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Top 10 Receipt'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    credits: {
        enabled: false
    },
    
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            size:'75%',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>:<br/> {point.percentage:.1f} %',
                style: {
                    fontWeight: 'bold',
                    fontSize: 8,  
                }
            }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Total Cost',
        colorByPoint: true,
        data: treceiptkch
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
Highcharts.chart('kchtopissuedchart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Top 10 Issued'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    credits: {
        enabled: false
    },
    
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            size:'75%',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>:<br/> {point.percentage:.1f} %',
                style: {
                    fontWeight: 'bold',
                    fontSize: 8,  
                }
            }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        name: 'Total Cost',
        colorByPoint: true,
        data: tissuedkch
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var kcsdept =  <?php echo json_encode($kcsdepartment) ?>;
var deptname =  <?php echo json_encode($kcsdepartmentname) ?>;
var kcsdeptlastyear =  <?php echo json_encode($kcsdepartmentlastyear) ?>;
var bulanini =  <?php echo json_encode($nowbulan) ?>;
var bulantahunlalu =  <?php echo json_encode($bulanlast) ?>;
Highcharts.chart('kcsdepartmentchart', {
    title: {
        text: 'KCS Department'
    },
    xAxis: {
    categories: deptname
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    plotOptions: {
        column: {
            allowPointSelect: true,
            dataLabels: {
            enabled: true
        }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    series: [{
        type: 'column',
        name: bulanini,
        data: kcsdept
    },{
        type: 'column',
        name: bulantahunlalu,
        data: kcsdeptlastyear
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var kcscentercost =  <?php echo json_encode($kcscostcenter) ?>;
var kcscostcentername =  <?php echo json_encode($kcscostcentername) ?>;
var kcscostcenterlastyear =  <?php echo json_encode($kcscostcenterlastyear) ?>;
Highcharts.chart('kcscostcenterchart', {
    title: {
        text: 'KCS Cost Center'
    },
    xAxis: {
    categories: kcscostcentername
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    plotOptions: {
        column: {
            allowPointSelect: true,
            dataLabels: {
            enabled: true
        }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kcs') }}";
                    }
                }
            }
        }
    },
    series: [{
        type: 'column',
        name: bulanini,
        data: kcscentercost
    },{
        type: 'column',
        name: bulantahunlalu,
        data: kcscostcenterlastyear
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var kchcost =  <?php echo json_encode($kchdepartment) ?>;
var kchname =  <?php echo json_encode($kchdepartmentname) ?>;
var kchcostlastyear =  <?php echo json_encode($kchdepartmentlastyear) ?>;

Highcharts.chart('kchdepartmentchart', {
    title: {
        text: 'KCH Department'
    },
    xAxis: {
    categories: kchname
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    plotOptions: {
        column: {
            allowPointSelect: true,
            dataLabels: {
            enabled: true
        }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        type: 'column',
        name: bulanini,
        data: kchcost
    },{
        type: 'column',
        name: bulantahunlalu,
        data: kchcostlastyear
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var kchcentercost =  <?php echo json_encode($kchcostcenter) ?>;
var kchcostcentername =  <?php echo json_encode($kchcostcentername) ?>;
var kchcostcenterlastyear =  <?php echo json_encode($kchcostcenterlastyear) ?>;
Highcharts.chart('kchcostcenterchart', {
    title: {
        text: 'KCH Cost Center'
    },
    xAxis: {
    categories: kchcostcentername
    },
    yAxis: {
        title: {
        enabled: false
        }
    },
    credits: {
        enabled: false
    },
    
    legend: {
        verticalAlign: 'bottom'
    },
    plotOptions: {
        column: {
            allowPointSelect: true,
            dataLabels: {
            enabled: true
        }
        },
        series: {
            point: {
                events: {
                    click: function() {
                        // code to redirect to another page here
                        window.location.href = "{{ route('kch') }}";
                    }
                }
            }
        }
    },
    series: [{
        type: 'column',
        name: bulanini,
        data: kchcentercost
    },{
        type: 'column',
        name: bulantahunlalu,
        data: kchcostcenterlastyear
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});
var namadept =  <?php echo json_encode($namadept) ?>;
var bkelahiran =  <?php echo json_encode($jmlkelahiran) ?>;
var bdukacita =  <?php echo json_encode($jmldukacita) ?>;
var terlambatdata =  <?php echo json_encode($jmltelat) ?>;
var jmlovertime =  <?php echo json_encode($jmlovertime) ?>;
Highcharts.chart('beritakaryawan', {
        title: {
            text: 'Berita Karyawan '
        },
         xAxis: {
            categories: namadept
        },
        yAxis: {
            title: {
            enabled: false
            }
        },
        legend: {
            verticalAlign: 'bottom'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                enabled: true
            },
            },
            column:{
                animation: {
                duration: 3000
            }
            }
        },
        series: [{
            type: 'column',
            name: 'Terlambat',
            data: terlambatdata,
        },{
            type: 'column',
            name: 'Kelahiran',
            data: bkelahiran,
        },{
            type: 'column',
            name: 'Dukacita',
            data: bdukacita,
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
Highcharts.chart('overtimekaryawan', {
        title: {
            text: 'Overtime Karyawan '
        },
         xAxis: {
            categories: namadept
        },
        yAxis: {
            title: {
            enabled: false
            }
        },
        legend: {
            verticalAlign: 'bottom'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                enabled: true
            },
            },
            column:{
                animation: {
                duration: 3000
            }
            }
        },
        series: [{
            type: 'column',
            name: 'Overtime',
            data: jmlovertime,
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
var getoKaryawan =  <?php echo json_encode($getoKaryawan) ?>;
var bulanGeto =  <?php echo json_encode($bulanGeto) ?>;
Highcharts.chart('geto', {
        title: {
            text: 'Data Karyawan GETO'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanGeto
        },
        yAxis: {
            labels: {
            format: '{value}%'
            },
            title: {
            enabled: false
            }
        },
        
        legend: {
            
            verticalAlign: 'bottom'
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}%'
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                    return Highcharts.numberFormat(this.y,2)+'%' 
                    },
                }
            },
            
        },
        
        series: [{
            type: 'column',
            name: 'GETO Permanent',
            data: getoKaryawan,
            
        
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
var bulan =  <?php echo json_encode($xvar) ?>;
var insales =  <?php echo json_encode($in) ?>;
var outsales =  <?php echo json_encode($out) ?>;
var hrcost =  <?php echo json_encode($cost) ?>;
var headcount =  <?php echo json_encode($count) ?>;
Highcharts.chart('salesChart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Sales',
    },
    xAxis: {
        categories: bulan
    },
    yAxis: {
        min: 0,
        title: {
            enabled: false
        },
        stackLabels: {
            enabled: true
        }
        
    },
    legend: {
            verticalAlign: 'bottom'
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
    },
    plotOptions: {
        line: {
            // stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'Sales IN',
        data: insales
    }, {
        name: 'Sales OUT',
        data: outsales
    }, {
        name: 'HR Cost',
        data: hrcost
    }, {
        name: 'Head Count',
        data: headcount
    }]
});
</script>
@endpush