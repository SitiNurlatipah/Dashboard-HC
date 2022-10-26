@extends('layouts.master')

@section('title', 'Avg Leadtime')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Average Leadtime Recruitment</h6>
                </div>
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Average Lead Time Recruitment</span></li>
                    </ol>
                <!-- /Breadcrumb -->
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
                
            <div  class="tab-struct custom-tab-1 mt-0">
                <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                    <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Average Recruitment</a></li>
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
                <form action="{{ route('avg.filter') }}" method="POST" class="form-inline">
                    @csrf
                            <div class="form-group row col-sm-11">
                                <label for="date" class="col-form-label text-right col-sm-1 pt-3">Dari</label>
                                <input type='date' class="form-control input-sm col-sm-3 mr-10 ml-0" name="startDate" placeholder="Dari tanggal">
                                <label class="col-form-label text-right col-sm-1">Sampai</label>
                                <input type='date' class="form-control input-sm col-sm-3 mr-20" name="endDate" value="Sampai tanggal">
                                <button class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">filter</span></button>
                                <a type="submit" class="btn btn-warning btn-anim btn-xs" value="Submit" href="{{ route('avg') }}"><i class="fa fa-undo"></i><span class="btn-text">reset</span></a>
                            </div>
                        
                        </form>
                <div class="col-sm-1 ml-30">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-avg" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                </div>
            </div>
            </div>
            </div>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="avgTable" class="table table-hover  display mb-30 text-center" >
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Permanen</th>
                                            <th class="text-center">Std Permanen</th>
                                            <th class="text-center">Permanen 1</th>
                                            <th class="text-center">Permanen 2</th>
                                            <th class="text-center">Permanen 3</th>
                                            <th class="text-center">Permanen 4</th>
                                            <th class="text-center">Permanen 5</th>
                                            <th class="text-center">Contract</th>
                                            <th class="text-center">Std Contract</th>
                                            <th class="text-center">Job Supply</th>
                                            <th class="text-center">Std Job Supply</th>
                                            <th class="text-center">Internship</th>
                                            <th class="text-center">Std Internship</th>            
                                            <th class="text-center">Action</th>            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    $i=1; foreach($avg_recruitments as $avg): 
                                    $permanen=$avg->intPermanent1+$avg->intPermanent2+$avg->intPermanent3+$avg->intPermanent4+$avg->intPermanent5;
                                    ?>
                                        <tr>
                                        <td>{{date('F Y', strtotime($avg->dateBulanAvg))}}</td>
                                        <td>{{$permanen}}</td>
                                        <td>{{ $avg->intStdPermanent }}</td>
                                        <td>{{ $avg->intPermanent1 }}</td>
                                        <td>{{ $avg->intPermanent2}}</td>
                                        <td>{{ $avg->intPermanent3 }}</td>
                                        <td>{{ $avg->intPermanent4 }}</td>
                                        <td>{{ $avg->intPermanent5 }}</td>
                                        <td>{{ $avg->intContract }}</td>
                                        <td>{{ $avg->intStdContract }}</td>
                                        <td>{{ $avg->intJobSupply }}</td>
                                        <td>{{ $avg->intStdJobSupply }}</td>
                                        <td>{{ $avg->intInternship }}</td>
                                        <td>{{ $avg->intStdInternship }}</td>
                                        
                                        <td>
                                        <form action="{{route('avg.delete',$avg->idAvg)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$avg->idAvg}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                                    <div id="chartPermanent" class="" style="height:367px;"></div>
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
                                    <div id="chartContract" class="" style="height:367px;"></div>
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
                                    <div id="chartJobsupply" class="" style="height:367px;"></div>
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
                                    <div id="chartInternship" class="" style="height:367px;"></div>
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
<!-- </div> -->
<div class="modal fade" id="add-avg" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('avg.post') }}" method="POST">
                @csrf
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="intPermanen" class="control-label mb-5">Standar Permanen</label>
                            <input type="number" class="form-control" id="intStdPermanent" name="intStdPermanent">
                        </div>
                        <div class="col-sm-4">
                            <label for="intPermanen" class="control-label mb-5">Permanen 1</label>
                            <input type="number" class="form-control" id="intPermanent1" name="intPermanent1">
                        </div>
                        <div class="col-sm-4">
                            <label for="intPermanen" class="control-label mb-5">Permanen 2</label>
                            <input type="number" class="form-control" id="intPermanent2" name="intPermanent2">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="intPermanen" class="control-label mb-5">Permanen 3</label>
                            <input type="number" class="form-control" id="intPermanent3" name="intPermanent3">
                        </div>
                        <div class="col-sm-4">
                            <label for="intPermanen" class="control-label mb-5">Permanen 4</label>
                            <input type="number" class="form-control" id="intPermanent4" name="intPermanent4">
                        </div>
                        <div class="col-sm-4">
                            <label for="intPermanen" class="control-label mb-5">Permanen 5</label>
                            <input type="number" class="form-control" id="intPermanent5" name="intPermanent5">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="intContract" class="control-label mb-5">Contract</label>
                            <input type="number" class="form-control" id="intContract" name="intContract">
                        </div>
                        <div class="col-sm-6">
                            <label for="intContract" class="control-label mb-5">Standar Contract</label>
                            <input type="number" class="form-control" id="intStdContract" name="intStdContract">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="intContract" class="control-label mb-5">Job Supply</label>
                            <input type="number" class="form-control" id="intJobSupply" name="intJobSupply">
                        </div>
                        <div class="col-sm-6">
                            <label for="intContract" class="control-label mb-5">Standar Job Supply</label>
                            <input type="number" class="form-control" id="intStdJobSupply" name="intStdJobSupply">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="intContract" class="control-label mb-5">Internship</label>
                            <input type="number" class="form-control" id="intInternship" name="intInternship">
                        </div>
                        <div class="col-sm-6">
                            <label for="intContract" class="control-label mb-5">Standar Internship</label>
                            <input type="number" class="form-control" id="intStdInternship" name="intStdInternship">
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-5">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateBulanAvg" name="dateBulanAvg">
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
@foreach($avg_recruitments as $avg)
    <div class="modal fade" id="update{{$avg->idAvg}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Avg Leadtime Recruitment</h5>
                </div>
                <div class="modal-body">
                <form action="/leadtime/{{$avg->idAvg}}" method="POST">
                @csrf 
                @method('put') 
                <div class="row form-group">      
                    <div class="col-sm-4">
                        <label for="intPermanen" class="control-label mb-5">Standar Permanen</label>
                        <input type="number" class="form-control" id="intPermanent" name="intStdPermanent" value="{{$avg->intStdPermanent}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intPermanen" class="control-label mb-5">Permanen 1</label>
                        <input type="number" class="form-control" id="intPermanent" name="intPermanent1" value="{{$avg->intPermanent1}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intPermanen" class="control-label mb-5">Permanen 2</label>
                        <input type="number" class="form-control" id="intPermanent" name="intPermanent2" value="{{$avg->intPermanent2}}">
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-sm-4">
                        <label for="intPermanen" class="control-label mb-5">Permanen 3</label>
                        <input type="number" class="form-control" id="intPermanent" name="intPermanent3" value="{{$avg->intPermanent3}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intPermanen" class="control-label mb-5">Permanen 4</label>
                        <input type="number" class="form-control" id="intPermanent" name="intPermanent4" value="{{$avg->intPermanent4}}">
                    </div>
                    <div class="col-sm-4">
                        <label for="intPermanen" class="control-label mb-5">Permanen 5</label>
                        <input type="number" class="form-control" id="intPermanent" name="intPermanent5" value="{{$avg->intPermanent5}}">
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-sm-6">
                        <label for="intContract" class="control-label mb-5">Contract</label>
                        <input type="number" class="form-control" id="intContract" name="intContract" value="{{$avg->intContract}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intContract" class="control-label mb-5">Standar Contract</label>
                        <input type="number" class="form-control" id="intStdContract" name="intStdContract" value="{{$avg->intStdContract}}">
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-sm-6">
                        <label for="intContract" class="control-label mb-5">Job Supply</label>
                        <input type="number" class="form-control" id="intJobSupply" name="intJobSupply" value="{{$avg->intJobSupply}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intContract" class="control-label mb-5">Standar Job Supply</label>
                        <input type="number" class="form-control" id="intStdJobSupply" name="intStdJobSupply" value="{{$avg->intStdJobSupply}}">
                    </div>
                </div>
                <div class="row form-group"> 
                    <div class="col-sm-6">
                        <label for="intContract" class="control-label mb-5">Internship</label>
                        <input type="number" class="form-control" id="intInternship" name="intInternship" value="{{$avg->intInternship}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intContract" class="control-label mb-5">Standar Internship</label>
                        <input type="number" class="form-control" id="intStdInternship" name="intStdInternship" value="{{$avg->intStdInternship}}">
                    </div>
                </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-5">Bulan</label>
                        <input type="date" class="form-control" id="dateBulanAvg" name="dateBulanAvg" value="{{$avg->dateBulanAvg}}">
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

@endsection
@push('script')
<script type="text/javascript">
$('#avgTable').dataTable( {
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
var rataPermanent =  <?php echo json_encode($rataPermanent) ?>;
var rataContract =  <?php echo json_encode($rataContract) ?>;
var rataJobSupply =  <?php echo json_encode($rataJobSupply) ?>;
var rataInternship =  <?php echo json_encode($rataInternship) ?>;
var tahun =  <?php echo json_encode($tahun) ?>;
Highcharts.chart('chartPermanent', {
        title: {
            text: 'AVERAGE LEAD TIME RECRUITMENT PERMANENT'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: tahun
        },
        yAxis: {
            title: {
                text: 'Rata-rata'
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
            data: rataPermanent
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
Highcharts.chart('chartContract', {
        title: {
            text: 'AVERAGE LEAD TIME RECRUITMENT CONTRACT'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: tahun
        },
        yAxis: {
            title: {
                text: 'Rata-rata'
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
            name: 'Contract',
            data: rataContract
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
Highcharts.chart('chartJobsupply', {
        title: {
            text: 'AVERAGE LEAD TIME RECRUITMENT JOB SUPPLY'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: tahun
        },
        yAxis: {
            title: {
                text: 'Rata-rata'
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
            name: 'Job Supply',
            data: rataJobSupply
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
Highcharts.chart('chartInternship', {
        title: {
            text: 'AVERAGE LEAD TIME RECRUITMENT INTERNSHIP'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: tahun
        },
        yAxis: {
            title: {
                text: 'Rata-rata'
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
            name: 'Internship',
            data: rataInternship
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