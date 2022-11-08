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
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Mpp Vs Realization</span></li>
                </ol>
                <!-- /Breadcrumb -->
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
                
            <div  class="tab-struct custom-tab-1 mt-0">
                <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Realisasi</a></li>
                    <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_16" aria-expanded="false">MPP</a></li>
                    <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Grafik</a></li>
                    
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
                <div class="form-horizontal form-group">
                <form action="{{ route('mppreal.filter') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group row col-sm-11">
                        <label for="date" class="col-form-label text-right col-sm-2 pt-3">Masukan Tahun</label>
                        <input type="text" class="form-control input-sm col-sm-3" name="year" placeholder="ex:2020,2021,2022,etc...">
                        <button  type="submit" class="btn btn-success btn-anim btn-xs ml-10"><i class="icon-rocket"></i><span class="btn-text">filter</span></button>
                        <a class="btn btn-warning btn-anim btn-xs" href="{{ route('mppreal') }}"><i class="fa fa-undo"></i><span class="btn-text">reset</span></a>
                    </div>        
                </form>
                </div>
                <div class="col-sm-1 ml-30 text-right">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-mppreal" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                </div>
                </div>
                </div>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="mpprealTable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                    <th rowspan="2" class="text-center">Bulan</th>
                                    <th colspan="4" class="text-center">Employee Type</th>
                                    <th colspan="2" class="text-center">Adjustment MTD</th>
                                    <th rowspan="2" class="text-center">MTD Adjustment</th>
                                    <th rowspan="2" class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Permanent</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">Job Supply</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Add</th>
                                    <th class="text-center">Reduce</th>
                                    
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1; foreach($real as $mppreal): ?>
                                <tr>
                                <td>{{ \Carbon\Carbon::parse($mppreal->dateBulan)->format('F Y')}}</td>
                                <td>{{ $mppreal->realPermanent }}</td>
                                <td>{{ $mppreal->realContract }}</td>
                                <td>{{ $mppreal->realJobSupply }}</td>
                                <td>{{ $mppreal->realTotal }}</td>
                                <td>{{ $mppreal->intAdd }}</td>
                                <td>{{ $mppreal->intReduce }}</td>
                                <td>{{ $mppreal->txtMtdAdjusment }}</td>
                                <td>
                                <form action="{{route('mppreal.delete',$mppreal->idReal)}}" method="POST">
                                @csrf
                                @method('put')
                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$mppreal->idReal}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
        <div  id="profile_16" class="tab-pane fade" role="tabpanel">
            <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addmpp" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="mppTable" class="table table-striped table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Permanent</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">Job Supply</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $i=1; foreach($mpp_employee as $index=>$mpp): ?>
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$mpp->tahun}}</td>
                                <td>{{ $mpp->mppPermanent }}</td>
                                <td>{{ $mpp->mppContract }}</td>
                                <td>{{ $mpp->mppJobsupply }}</td>
                                <td>{{ $mpp->mppTotal }}</td>
                                <td>
                                <form action="" method="POST">
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
        <div  id="profile_15" class="tab-pane fade" role="tabpanel">
            <div class="col-lg-12 col-md-6 col-sm-7 col-xs-12">
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
                                    <div id="totalchart" class="" style="height:367px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="col-lg-12 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">MPP VS REALIZATION</h6>
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
<div class="modal fade" id="addmpp" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('mpp.post') }}" method="POST">
                @csrf 
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="mppTotal" class="control-label mb-10">Total</label>
                                <input type="number" class="form-control" id="mppTotal" name="mppTotal" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="mppPermanent" class="control-label mb-10">Permanen</label>
                                <input type="number" class="form-control" id="mppPermanent" name="mppPermanent" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="mppContract" class="control-label mb-10">Contract</label>
                                <input type="number" class="form-control" id="mppContract" name="mppContract" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="mppJobsupply" class="control-label mb-10">Job Supply</label>
                                <input type="number" class="form-control" id="mppJobsupply" name="mppJobsupply" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" required>
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
                        <div class="form-group">
                            <label class="control-label mb-5">Tahun</label>
                                <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih tahun" data-live-search="false" name="mpp_tahun" id="mpp_tahun">
                                    @foreach($mpp_employee as $mpp)
                                    <option value="{{$mpp->id}}">{{$mpp->tahun}}</option>
                                    @endforeach
                                </select>        
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label for="intTotal" class="control-label mb-10">Total</label>
                                <input type="number" class="form-control" id="realTotal" name="realTotal" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="intPermanen" class="control-label mb-10">Permanen</label>
                                <input type="number" class="form-control" id="realPermanent" name="realPermanent" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="intContract" class="control-label mb-10">Contract</label>
                                <input type="number" class="form-control" id="realContract" name="realContract" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="intContract" class="control-label mb-10">Job Supply</label>
                                <input type="number" class="form-control" id="realJobSupply" name="realJobSupply" required>
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
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan" required>
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
@foreach($real as $mppreal)
    <div class="modal fade" id="update{{$mppreal->idReal}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
                </div>
                <div class="modal-body">
                <form action="/mppvsreal/{{$mppreal->idReal}}" method="POST">
                @csrf 
                @method('put')
                    <div class="form-group">
                        <label class="control-label mb-5">Tahun</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="false" name="mpp_tahun" id="mpp_tahun">
                            <option value="{{$mppreal->mpp_tahun}}">{{$mppreal->tahun}}</option>
                            @foreach($mpp_employee as $mpp)
                            <option value="{{$mpp->id}}">{{$mpp->tahun}}</option>
                            @endforeach
                        </select>        
                    </div>       
                    <div class="form-group">
                        <label for="realTotal" class="control-label mb-10">Total</label>
                        <input type="number" class="form-control" id="realTotal" name="realTotal" value="{{$mppreal->realTotal}}">
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="realPermanent" class="control-label mb-10">Permanent</label>
                            <input type="number" class="form-control" id="realPermanent" name="realPermanent" value="{{$mppreal->realPermanent}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="realContract" class="control-label mb-10">Contract</label>
                            <input type="number" class="form-control" id="realContract" name="realContract" value="{{$mppreal->realContract}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="realJobSupply" class="control-label mb-10">Job Supply</label>
                            <input type="number" class="form-control" id="realJobSupply" name="realJobSupply" value="{{$mppreal->realJobSupply}}">
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
                        <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$mppreal->dateBulan}}" required>
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
$('#mppTable').dataTable( {
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
var permanenMpp =  <?php echo json_encode($permanenMpp) ?>;
var contractMpp =  <?php echo json_encode($contractMpp) ?>;
var jobsupplyMpp =  <?php echo json_encode($jobsupplyMpp) ?>;
var totalMpp =  <?php echo json_encode($totalMpp) ?>;
var bulan =  <?php echo json_encode($bulan) ?>;
    Highcharts.chart('coba', {
    chart: {
        type: 'column'
    },
    title: {
            text: 'Realization Employee'
        },
    subtitle: {
        text: 'PT. Kalbe Morinaga Indonesia'
    },
    xAxis: {
        categories: bulan
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Employee'
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
        name: 'Permanent',
        data: permanen
    }, {
        name: 'Contract',
        data: contract
    }, {
        name: 'Job Supply',
        data: jobsupply
    }]
});
Highcharts.chart('totalchart', {
        title: {
            text: 'MPP VS Real Employee'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Employee'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                enabled: true
            }
            }
        },
        series: [{
            type: 'column',
            name: 'MPP Total Employee',
            data: totalMpp
        },{
            type: 'column',
            name: 'Real Total Employee',
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
</script>
@endpush