@extends('layouts.master')

@section('title', 'Data Trend Total Employee')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Data Trend Total Employee</h6>
                </div>
                <div class="clearfix"></div>
                
            </div>
            
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <div  class="tab-struct custom-tab-2 mt-5">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_15">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Data Total Employee</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Grafik</a></li>
                            
                        </ul>
            @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
            @endif
            <div class="tab-content" id="myTabContent_15">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
            <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-employee" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data Total Employee</span></button>
            <form action="{{ route('total.filter') }}" method="POST" class="form-inline mb-30 mt-30">
                    @csrf
                            <div class="form-group row">  
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                <input type='date' class="form-control" name="startDate">
                                <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                <input type='date' class="form-control" name="endDate">
                                <button type="submit" class="btn btn-primary pa-5 btn-sm" value="Submit"><i class="zmdi zmdi-search"></i></button>
                                <a class="btn btn-primary pa-5 btn-sm" href="{{ route('total') }}"><i class="fa fa-undo"></i></a>
                            </div>
                        
            </form>    
            <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="datable_1" class="table table-hover display  pb-30 text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Permanent</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">Job Supply</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; foreach($data_total_employee as $totalEmployee): ?>
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $totalEmployee->dateBulan->format('F Y') }}</td>
                                <td>{{ $totalEmployee->intPermanen }}</td>
                                <td>{{ $totalEmployee->intContract }}</td>
                                <td>{{ $totalEmployee->intJobSupply }}</td>
                                <td>{{ $totalEmployee->intTotal }}</td>
                                <td>
                                <form action="{{route('total.delete',$totalEmployee->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateTotal{{$totalEmployee->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
            <div id="totalvspermanen"></div>
            <div id="total"></div>
            <div id="permanen"></div>

            </div>
            </div>
            </div>
            </div>
        </div>	
    </div>
</div>
<!-- add data total -->
<div class="modal fade" id="add-employee" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data Employee</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('total.post') }}" method="POST">
                @csrf 
                        
                        <div class="form-group">
                            <label for="intJumlahEmployee" class="control-label mb-10">Total Employee</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal">
                        </div>
                        <div class="form-group">
                            <label for="intKaryawan" class="control-label mb-10">Permanen</label>
                            <input type="number" class="form-control" id="intPermanen" name="intPermanen">
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">Contract</label>
                            <input type="number" class="form-control" id="intContract" name="intContract">
                        </div>
                        <div class="form-group">
                            <label for="intOutsource" class="control-label mb-10">Job Supply</label>
                            <input type="number" class="form-control" id="intJobSupply" name="intJobSupply">
                        </div>
                        
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Bulan</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data Total Employee</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
    </div>
<!-- end add data -->
@foreach($data_total_employee as $totalEmployee)
    <div class="modal fade" id="updateTotal{{$totalEmployee->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data Employee</h5>
                </div>
                <div class="modal-body">
                <form action="/totalemployee/{{$totalEmployee->id}}" method="POST">
                @csrf 
                @method('put')       
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total Employee</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal" value="{{$totalEmployee->intTotal}}">
                        </div>
                        <div class="form-group">
                            <label for="intPermanen" class="control-label mb-10">Permanen</label>
                            <input type="number" class="form-control" id="intPermanen" name="intPermanen" value="{{$totalEmployee->intPermanen}}">
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intContract" name="intContract" value="{{$totalEmployee->intContract}}">
                        </div>
                        <div class="form-group">
                            <label for="intJobSupply" class="control-label mb-10">Job Supply</label>
                            <input type="number" class="form-control" id="intJobSupply" name="intJobSupply" value="{{$totalEmployee->intJobSupply}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$totalEmployee->dateBulan}}">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data Total Employee</button>
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
    var total =  <?php echo json_encode($total) ?>;
    var permanent =  <?php echo json_encode($permanent) ?>;
    var contract =  <?php echo json_encode($contract) ?>;
    var jobsupply =  <?php echo json_encode($jobsupply) ?>;
    var bulan =  <?php echo json_encode($bulan) ?>;

      Highcharts.chart('totalvspermanen', {
        title: {
            text: 'Total VS Permanent Employee'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Jumlah Employee'
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
            
            name: 'Total Employee',
            data: total
        },{
           
            name: 'Permanent',
            data: permanent

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
    Highcharts.chart('total', {
    title: {
        text: 'Total Employee'
    },
    subtitle: {
        text: 'PT. Kalbe Morinaga Indonesia'
    },
        xAxis: {
        categories: bulan
    },
    yAxis: {
        title: {
            text: 'Jumlah Employee'
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

    Highcharts.chart('permanen', {
    title: {
        text: 'Permanent Employee'
    },
    subtitle: {
        text: 'PT. Kalbe Morinaga Indonesia'
    },
        xAxis: {
        categories: bulan
    },
    yAxis: {
        title: {
            text: 'Jumlah Employee'
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
        data: permanent

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