@extends('layouts.master')

@section('title', 'MppVsReal')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Mpp Vs Realization</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <div  class="tab-struct custom-tab-1 mt-0">
                <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">MPP Vs Real</a></li>
                    <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Grafik</a></li>
                    
                </ul>
            @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
            @endif
            <div class="tab-content" id="myTabContent_7">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                
                <div  class="pills-struct mt-5">
                    <ul role="tablist" class="nav nav-pills btn-sm" id="myTabs_6">
                        <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_6" href="#tab2019">2019</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#tab2020" aria-expanded="false">2020</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#tab2021" aria-expanded="false">2021</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_6" role="tab" href="#tab2022" aria-expanded="false">2022</a></li>
                        <div class="col card-header text-right">
                            <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-mppreal" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                    </ul>                    
                    
                    <div class="tab-content" id="myTabContent_6">
                        <div  id="tab2019" class="tab-pane fade active in" role="tabpanel">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="mpprealTable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                                        <thead>
                                        <tr>
                                                <th rowspan="2" class="text-center">Bulan</th>
                                                <th colspan="4" class="text-center">Employee Type</th>
                                                <th colspan="2" class="text-center">Adjusment MTD</th>
                                                <th rowspan="2" class="text-center">MTD Adjusment</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Permanen</th>
                                                <th class="text-center">Contract</th>
                                                <th class="text-center">Job Supply</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Add</th>
                                                <th class="text-center">Reduce</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        $i=1; foreach($mppall as $mppreal): ?>
                                            <tr>
                                            <td>{{$mppreal->dateBulan->format('F Y')}}</td>
                                            <td>{{ $mppreal->intMppPermanent }}</td>
                                            <td>{{ $mppreal->intMppContract }}</td>
                                            <td>{{ $mppreal->intMppJobSupply }}</td>
                                            <td>{{ $mppreal->intMppTotal }}</td>
                                            <td>{{ $mppreal->intAdd }}</td>
                                            <td>{{ $mppreal->intReduce }}</td>
                                            <td>{{ $mppreal->txtMtdAdjusment }}</td>
                                            <td>
                                            <form action="{{route('mppreal.delete',$mppreal->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$mppreal->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        <div  id="tab2020" class="tab-pane fade" role="tabpanel">
                        <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tbl2020" class="table table-hover font-11 table-bordered display mb-30 text-center" width="100%" >
                                        <thead>
                                        <tr>
                                                <th rowspan="2" class="text-center">Bulan</th>
                                                <th colspan="4" class="text-center">Employee Type</th>
                                                <th colspan="2" class="text-center">Adjusment MTD</th>
                                                <th rowspan="2" class="text-center">MTD Adjusment</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Permanen</th>
                                                <th class="text-center">Contract</th>
                                                <th class="text-center">Job Supply</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Add</th>
                                                <th class="text-center">Reduce</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        $i=1; foreach($tabel2020 as $mpp2020): ?>
                                            <tr>
                                            <td>{{  $mpp2020->dateBulan->format('F Y')}}</td>
                                            <td>{{ $mpp2020->intMppPermanent }}</td>
                                            <td>{{ $mpp2020->intMppContract }}</td>
                                            <td>{{ $mpp2020->intMppJobSupply }}</td>
                                            <td>{{ $mpp2020->intMppTotal }}</td>
                                            <td>{{ $mpp2020->intAdd }}</td>
                                            <td>{{ $mpp2020->intReduce }}</td>
                                            <td>{{ $mpp2020->txtMtdAdjusment }}</td>
                                            <td>
                                            <form action="{{route('mppreal.delete',$mpp2020->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$mpp2020->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        <div  id="tab2021" class="tab-pane fade" role="tabpanel">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tbl2021" class="table table-hover font-11 table-bordered display mb-30 text-center" width="100%" >
                                        <thead>
                                        <tr>
                                                <th rowspan="2" class="text-center">Bulan</th>
                                                <th colspan="4" class="text-center">Employee Type</th>
                                                <th colspan="2" class="text-center">Adjusment MTD</th>
                                                <th rowspan="2" class="text-center">MTD Adjusment</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Permanen</th>
                                                <th class="text-center">Contract</th>
                                                <th class="text-center">Job Supply</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Add</th>
                                                <th class="text-center">Reduce</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        $i=1; foreach($tabel2021 as $mpp2021): ?>
                                            <tr>
                                            <td>{{  $mpp2021->dateBulan->format('F Y')}}</td>
                                            <td>{{ $mpp2021->intMppPermanent }}</td>
                                            <td>{{ $mpp2021->intMppContract }}</td>
                                            <td>{{ $mpp2021->intMppJobSupply }}</td>
                                            <td>{{ $mpp2021->intMppTotal }}</td>
                                            <td>{{ $mpp2021->intAdd }}</td>
                                            <td>{{ $mpp2021->intReduce }}</td>
                                            <td>{{ $mpp2021->txtMtdAdjusment }}</td>
                                            <td>
                                            <form action="{{route('mppreal.delete',$mpp2021->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$mpp2021->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        <div  id="tab2022" class="tab-pane fade" role="tabpanel">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tbl2022" class="table table-hover table-bordered display mb-30 text-center font-11" width="100%" >
                                        <thead>
                                        <tr>
                                                <th rowspan="2" class="text-center">Bulan</th>
                                                <th colspan="4" class="text-center">Employee Type</th>
                                                <th colspan="2" class="text-center">Adjusment MTD</th>
                                                <th rowspan="2" class="text-center">MTD Adjusment</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Permanen</th>
                                                <th class="text-center">Contract</th>
                                                <th class="text-center">Job Supply</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Add</th>
                                                <th class="text-center">Reduce</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        $i=1; foreach($tabel2022 as $mpp2022): ?>
                                            <tr>
                                            <td>{{  $mpp2022->dateBulan->format('F Y')}}</td>
                                            <td>{{ $mpp2022->intMppPermanent }}</td>
                                            <td>{{ $mpp2022->intMppContract }}</td>
                                            <td>{{ $mpp2022->intMppJobSupply }}</td>
                                            <td>{{ $mpp2022->intMppTotal }}</td>
                                            <td>{{ $mpp2022->intAdd }}</td>
                                            <td>{{ $mpp2022->intReduce }}</td>
                                            <td>{{ $mpp2022->txtMtdAdjusment }}</td>
                                            <td>
                                            <form action="{{route('mppreal.delete',$mpp2022->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$mpp2022->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
            
        </div>
        <div  id="profile_15" class="tab-pane fade" role="tabpanel">
            <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Productivity Total</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="chart" class="" style="height:367px;"></div>
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
                                    <h6 class="panel-title txt-dark">Productivity Total</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="coba" class="" style="height:367px;"></div>
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
<!-- /Row -->
<div class="modal fade" id="add-mppreal" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('mppreal.post') }}" method="POST">
                @csrf 
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="intTotal" class="control-label mb-10">Total</label>
                                <input type="number" class="form-control" id="intMppTotal" name="intMppTotal">
                            </div>
                            <div class="col-sm-3">
                                <label for="intPermanen" class="control-label mb-10">Permanen</label>
                                <input type="number" class="form-control" id="intMppPermanent" name="intMppPermanent">
                            </div>
                            <div class="col-sm-3">
                                <label for="intContract" class="control-label mb-10">Contract</label>
                                <input type="number" class="form-control" id="intMppContract" name="intMppContract">
                            </div>
                            <div class="col-sm-3">
                                <label for="intContract" class="control-label mb-10">Job Supply</label>
                                <input type="number" class="form-control" id="intMppJobSupply" name="intMppJobSupply">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="intContract" class="control-label mb-10">Add</label>
                                <input type="number" class="form-control" id="intAdd" name="intAdd">
                            </div>
                            <div class="col-sm-6">
                                <label for="intContract" class="control-label mb-10">Reduce</label>
                                <input type="number" class="form-control" id="intReduce" name="intReduce">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">MTD Adjusment</label>
                            <input type="text" class="form-control" id="txtMtdAdjusment" name="txtMtdAdjusment">
                        </div>
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Bulan</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan">
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
@foreach($mppall as $mppreal)
    <div class="modal fade" id="update{{$mppreal->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
                </div>
                <div class="modal-body">
                <form action="/mppvsreal/{{$mppreal->id}}" method="POST">
                @csrf 
                @method('put')       
                    <div class="form-group">
                        <label for="intMppTotal" class="control-label mb-10">Total</label>
                        <input type="number" class="form-control" id="intMppTotal" name="intMppTotal" value="{{$mppreal->intMppTotal}}">
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="intMppPermanent" class="control-label mb-10">Permanen</label>
                            <input type="number" class="form-control" id="intMppPermanent" name="intMppPermanent" value="{{$mppreal->intMppPermanent}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="intMppContract" class="control-label mb-10">Contract</label>
                            <input type="number" class="form-control" id="intMppContract" name="intMppContract" value="{{$mppreal->intMppContract}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="intMppJobSupply" class="control-label mb-10">Job Supply</label>
                            <input type="number" class="form-control" id="intMppJobSupply" name="intMppJobSupply" value="{{$mppreal->intMppJobSupply}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="intAdd" class="control-label mb-10">Add</label>
                            <input type="number" class="form-control" id="intAdd" name="intAdd" value="{{$mppreal->intAdd}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="intReduce" class="control-label mb-10">Reduce</label>
                            <input type="number" class="form-control" id="intReduce" name="intReduce" value="{{$mppreal->intReduce}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtMtdAdjusment" class="control-label mb-10">Mtd Adjusment</label>
                        <input type="text" class="form-control" id="txtMtdAdjusment" name="txtMtdAdjusment" value="{{$mppreal->txtMtdAdjusment}}">
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$mppreal->dateBulan}}">
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

@foreach($tabel2020 as $mpp2020)
<div class="modal fade" id="update{{$mpp2020->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
            </div>
            <div class="modal-body">
            <form action="/mppvsreal/{{$mpp2020->id}}" method="POST">
            @csrf 
            @method('put')       
                <div class="form-group">
                    <label for="intMppTotal" class="control-label mb-10">Total</label>
                    <input type="number" class="form-control" id="intMppTotal" name="intMppTotal" value="{{$mpp2020->intMppTotal}}">
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="intMppPermanent" class="control-label mb-10">Permanen</label>
                        <input type="number" class="form-control" id="intMppPermanent" name="intMppPermanent" value="{{$mpp2020->intMppPermanent}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intMppContract" class="control-label mb-10">Contract</label>
                        <input type="number" class="form-control" id="intMppContract" name="intMppContract" value="{{$mpp2020->intMppContract}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intMppJobSupply" class="control-label mb-10">Job Supply</label>
                        <input type="number" class="form-control" id="intMppJobSupply" name="intMppJobSupply" value="{{$mpp2020->intMppJobSupply}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intAdd" class="control-label mb-10">Add</label>
                        <input type="number" class="form-control" id="intAdd" name="intAdd" value="{{$mpp2020->intAdd}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intReduce" class="control-label mb-10">Reduce</label>
                        <input type="number" class="form-control" id="intReduce" name="intReduce" value="{{$mpp2020->intReduce}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtMtdAdjusment" class="control-label mb-10">Mtd Adjusment</label>
                    <input type="text" class="form-control" id="txtMtdAdjusment" name="txtMtdAdjusment" value="{{$mpp2020->txtMtdAdjusment}}">
                </div>
                <div class="form-group">
                    <label for="dateBulan" class="control-label mb-10">Bulan</label>
                    <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$mpp2020->dateBulan}}">
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
@foreach($tabel2021 as $mpp2021)
<div class="modal fade" id="update{{$mpp2021->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
            </div>
            <div class="modal-body">
            <form action="/mppvsreal/{{$mpp2021->id}}" method="POST">
            @csrf 
            @method('put')       
                <div class="form-group">
                    <label for="intMppTotal" class="control-label mb-10">Total</label>
                    <input type="number" class="form-control" id="intMppTotal" name="intMppTotal" value="{{$mpp2021->intMppTotal}}">
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="intMppPermanent" class="control-label mb-10">Permanen</label>
                        <input type="number" class="form-control" id="intMppPermanent" name="intMppPermanent" value="{{$mpp2021->intMppPermanent}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intMppContract" class="control-label mb-10">Contract</label>
                        <input type="number" class="form-control" id="intMppContract" name="intMppContract" value="{{$mpp2021->intMppContract}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intMppJobSupply" class="control-label mb-10">Job Supply</label>
                        <input type="number" class="form-control" id="intMppJobSupply" name="intMppJobSupply" value="{{$mpp2021->intMppJobSupply}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intAdd" class="control-label mb-10">Add</label>
                        <input type="number" class="form-control" id="intAdd" name="intAdd" value="{{$mpp2021->intAdd}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intReduce" class="control-label mb-10">Reduce</label>
                        <input type="number" class="form-control" id="intReduce" name="intReduce" value="{{$mpp2021->intReduce}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtMtdAdjusment" class="control-label mb-10">Mtd Adjusment</label>
                    <input type="text" class="form-control" id="txtMtdAdjusment" name="txtMtdAdjusment" value="{{$mpp2021->txtMtdAdjusment}}">
                </div>
                <div class="form-group">
                    <label for="dateBulan" class="control-label mb-10">Bulan</label>
                    <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$mpp2021->dateBulan}}">
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
@foreach($tabel2022 as $mpp2022)
<div class="modal fade" id="update{{$mpp2022->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
            </div>
            <div class="modal-body">
            <form action="/mppvsreal/{{$mpp2022->id}}" method="POST">
            @csrf 
            @method('put')       
                <div class="form-group">
                    <label for="intMppTotal" class="control-label mb-10">Total</label>
                    <input type="number" class="form-control" id="intMppTotal" name="intMppTotal" value="{{$mpp2022->intMppTotal}}">
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="intMppPermanent" class="control-label mb-10">Permanen</label>
                        <input type="number" class="form-control" id="intMppPermanent" name="intMppPermanent" value="{{$mpp2022->intMppPermanent}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intMppContract" class="control-label mb-10">Contract</label>
                        <input type="number" class="form-control" id="intMppContract" name="intMppContract" value="{{$mpp2022->intMppContract}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intMppJobSupply" class="control-label mb-10">Job Supply</label>
                        <input type="number" class="form-control" id="intMppJobSupply" name="intMppJobSupply" value="{{$mpp2022->intMppJobSupply}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intAdd" class="control-label mb-10">Add</label>
                        <input type="number" class="form-control" id="intAdd" name="intAdd" value="{{$mpp2022->intAdd}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intReduce" class="control-label mb-10">Reduce</label>
                        <input type="number" class="form-control" id="intReduce" name="intReduce" value="{{$mpp2022->intReduce}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtMtdAdjusment" class="control-label mb-10">Mtd Adjusment</label>
                    <input type="text" class="form-control" id="txtMtdAdjusment" name="txtMtdAdjusment" value="{{$mpp2022->txtMtdAdjusment}}">
                </div>
                <div class="form-group">
                    <label for="dateBulan" class="control-label mb-10">Bulan</label>
                    <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$mpp2022->dateBulan}}">
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

    @endsection


@push('script')
<script type="text/javascript">
$('#mpprealTable').dataTable( {
    paging: true,
    searching: true
} );
$('#tbl2022').dataTable( {
    paging: true,
    searching: true
} );
$('#tbl2021').dataTable( {
    paging: true,
    searching: true
} );
$('#tbl2020').dataTable( {
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
var permanen =  <?php echo json_encode($permanen) ?>;
var contract =  <?php echo json_encode($contract) ?>;
var jobsupply =  <?php echo json_encode($jobsupply) ?>;
var total =  <?php echo json_encode($total) ?>;
var bulan =  <?php echo json_encode($bulan) ?>;
Highcharts.chart('chart', {
        title: {
            text: 'MPP VS Realization'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            type: 'column',
            name: 'Permanent',
            data: permanen
        },{
            type: 'column',
            name: 'Contract',
            data: contract
        },{
            type: 'column',
            name: 'Job Supply',
            data: jobsupply
        },{
            type: 'column',
            name: 'Total Employee',
            data: total
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
    Highcharts.chart('coba', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total Employee',
        align: 'left'
    },
    xAxis: {
        categories: bulan
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Count trophies'
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
        layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
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
            }
        }
    },
    series: [{
        name: 'Permanen',
        data: permanen
    }, {
        name: 'Contract',
        data: contract
    }, {
        name: 'Job',
        data: jobsupply
    }]
});
</script>
@endpush