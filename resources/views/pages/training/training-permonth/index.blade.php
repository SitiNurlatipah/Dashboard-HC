@extends('layouts.master')

@section('title', 'Training Total Permonth')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Training Total Permonth</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissable mt-10 pb-5 pt-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
            </div>
            @endif
            
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <div  class="tab-struct custom-tab-1 mt-0">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Training Per Month</a></li>
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
                <form action="{{ route('training.filter') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group row col-sm-11">
                        <label for="date" class="col-form-label text-right col-sm-2 pt-3">Masukan Tahun</label>
                        <input type="text" class="form-control input-sm col-sm-3" name="year" placeholder="ex:2020,2021,2022,etc...">
                        <button  type="submit" class="btn btn-success btn-anim btn-xs ml-10"><i class="icon-rocket"></i><span class="btn-text">filter</span></button>
                        <a class="btn btn-warning btn-anim btn-xs" href="{{ route('training') }}"><i class="fa fa-undo"></i><span class="btn-text">reset</span></a>
                    </div>        
                </form>
                </div>
                <div class="col-sm-1 ml-30">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                </div>
                </div>
                </div>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="t_permonth" class="table table-hover table-bordered displayx text-center mt-10" >
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Internal</th>
                                        <th class="text-center">External</th>
                                        <th class="text-center">In House</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <?php
                                $i=1; foreach($trainingTotals as $total):
                                $all=$total->intInternal+$total->intExternal+$total->intInHouse; 
                                ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$total->dateBulan->format('F Y')}}</td>
                                        <td>{{$total->intInternal}}</td>
                                        <td>{{$total->intExternal}}</td>
                                        <td>{{$total->intInHouse}}</td>
                                        <td>{{$all}}</td>
                                        <td>
                                        <form action="{{route('training.delete',$total->idTrainingTotalPerMonth)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$total->idTrainingTotalPerMonth}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                        @csrf 
                                        @method("delete")
                                            <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                        </form>
                                        </td>
                                    </tr>
                                        
                                <?php endforeach; ?>
                                <tbody>
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
                                <div id="chart" class="" style="height:367px;"></div>
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
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('training.post') }}" method="POST">
                @csrf 
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Tanggal Input</label>
                        <input type="date" class="form-control" id="dateBulan" name="dateBulan" required>
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Training Internal</label>
                        <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Training External</label>
                        <input type="number" class="form-control" id="dateBulan" name="intExternal" required>
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Training In House</label>
                        <input type="number" class="form-control" id="dateBulan" name="intInHouse" required>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<!-- end add data -->
@foreach($trainingTotals as $total)
    <div class="modal fade" id="update{{$total->idTrainingTotalPerMonth}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data</h5>
                </div>
                <div class="modal-body">
                <form action="/training/{{$total->idTrainingTotalPerMonth}}" method="POST">
                @csrf 
                @method('put')       
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Tanggal Input</label>
                        <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$total->dateBulan}}" required>
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Training Internal</label>
                        <input type="number" class="form-control" id="dateBulan" name="intInternal" value="{{$total->intInternal}}">
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Training External</label>
                        <input type="number" class="form-control" id="dateBulan" name="intExternal" value="{{$total->intExternal}}">
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Training In House</label>
                        <input type="number" class="form-control" id="dateBulan" name="intInHouse" value="{{$total->intInHouse}}">
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
$('#t_permonth').dataTable( {
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
var internal =  <?php echo json_encode($internal) ?>;
var external =  <?php echo json_encode($external) ?>;
var inhouse =  <?php echo json_encode($inhouse) ?>;
var tahun =  <?php echo json_encode($tahun) ?>;
Highcharts.chart('chart', {
        title: {
            text: 'MPP VS Realization'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: tahun
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
            name: 'Internal',
            data: internal
        },{
            type: 'column',
            name: 'External',
            data: external
        },{
            type: 'column',
            name: 'In House',
            data: inhouse
        
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