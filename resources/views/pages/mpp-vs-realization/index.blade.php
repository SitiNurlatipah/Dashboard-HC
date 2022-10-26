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
                    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">MPP Vs Real</a></li>
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
        <div  id="profile_15" class="tab-pane fade" role="tabpanel">
            <!-- <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
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
                    </div> -->
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
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
                                <input type="number" class="form-control" id="intMppTotal" name="intMppTotal" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="intPermanen" class="control-label mb-10">Permanen</label>
                                <input type="number" class="form-control" id="intMppPermanent" name="intMppPermanent" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="intContract" class="control-label mb-10">Contract</label>
                                <input type="number" class="form-control" id="intMppContract" name="intMppContract" required>
                            </div>
                            <div class="col-sm-3">
                                <label for="intContract" class="control-label mb-10">Job Supply</label>
                                <input type="number" class="form-control" id="intMppJobSupply" name="intMppJobSupply" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <label for="intContract" class="control-label mb-10">Add</label>
                                <input type="number" class="form-control" id="intAdd" name="intAdd" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="intContract" class="control-label mb-10">Reduce</label>
                                <input type="number" class="form-control" id="intReduce" name="intReduce" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">MTD Adjusment</label>
                            <input type="text" class="form-control" id="txtMtdAdjusment" name="txtMtdAdjusment" required>
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
                        <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$mppreal->dateBulan->format('d/m/Y')}}" required>
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
// Highcharts.chart('chart', {
//         title: {
//             text: 'MPP VS Realization'
//         },
//         subtitle: {
//             text: 'PT. Kalbe Morinaga Indonesia'
//         },
//          xAxis: {
//             categories: bulan
//         },
//         yAxis: {
//             title: {
//                 text: 'Jumlah'
//             }
//         },
//         legend: {
//             layout: 'vertical',
//             align: 'right',
//             verticalAlign: 'middle'
//         },
//         plotOptions: {
//             series: {
//                 allowPointSelect: true
//             }
//         },
//         series: [{
//             type: 'column',
//             name: 'Permanent',
//             data: permanen
//         },{
//             type: 'column',
//             name: 'Contract',
//             data: contract
//         },{
//             type: 'column',
//             name: 'Job Supply',
//             data: jobsupply
//         },{
//             type: 'column',
//             name: 'Total Employee',
//             data: total
//         }],
//         responsive: {
//             rules: [{
//                 condition: {
//                     maxWidth: 500
//                 },
//                 chartOptions: {
//                     legend: {
//                         layout: 'horizontal',
//                         align: 'center',
//                         verticalAlign: 'bottom'
//                     }
//                 }
//             }]
//         }
//     });
    Highcharts.chart('coba', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total',
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
</script>
@endpush