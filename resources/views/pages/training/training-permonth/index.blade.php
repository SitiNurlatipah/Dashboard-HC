@extends('layouts.master')

@section('title', 'Training Total Permonth')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Training Report</h6>
                </div>
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Training Total Per Month</span></li>
                </ol>
                <!-- /Breadcrumb -->
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="plain1" class="btn btn-primary autocompare">Column</button>
                        <button id="plain2" class="btn btn-primary autocompare">Stacked</button>
                        </div>
                        <div id="training" class="" style="height:367px;"></div>
                    </div>
                </div>
                <hr>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <button id="pelaksanaan1" class="btn btn-primary autocompare">Column</button>
                        <button id="pelaksanaan2" class="btn btn-primary autocompare">Stacked</button>
                        </div>
                        <div id="pelaksanaan" class="" style="height:367px;"></div>
                    </div>
                </div>
                <hr>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="biaya" class="" style="height:367px;"></div>
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
var internal =  <?php echo json_encode($internalTraining) ?>;
var external =  <?php echo json_encode($externalTraining) ?>;
var inhouse =  <?php echo json_encode($inhouseTraining) ?>;
var online =  <?php echo json_encode($OnlineTraining) ?>;
var offline =  <?php echo json_encode($OfflineTraining) ?>;
var blended =  <?php echo json_encode($BlendedTraining) ?>;
var daftar =  <?php echo json_encode($pendaftaranTraining) ?>;
var snack =  <?php echo json_encode($snackTraining) ?>;
var tahunx =  <?php echo json_encode($bulan) ?>;
var intrai =  <?php echo json_encode($internalBulan) ?>;
var extrai =  <?php echo json_encode($externalBulan) ?>;
var housetrai =  <?php echo json_encode($inhouseBulan) ?>;
var bulan =  <?php echo json_encode($month) ?>;
var type =  <?php echo json_encode($ty) ?>;
var intraitahun =  <?php echo json_encode($internalTahun) ?>;
var extraitahun =  <?php echo json_encode($externalTahun) ?>;
var housetraitahun =  <?php echo json_encode($inhouseTahun) ?>;
var tahun =  <?php echo json_encode($year) ?>;
// Highcharts.chart('chart', {
//         title: {
//             text: 'Per Training'
//         },
//         subtitle: {
//             text: 'PT. Kalbe Morinaga Indonesia'
//         },
//          xAxis: {
//             categories: tahun
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
//             name: 'Internal',
//             data: internal
//         },{
//             type: 'column',
//             name: 'External',
//             data: external
//         },{
//             type: 'column',
//             name: 'In House',
//             data: inhouse
        
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
// });
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
        layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
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
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    
    series: [{
        name: 'Internal',
        data: internal
    }, {
        name: 'External',
        data: external
    }, {
        name: 'In House',
        data: inhouse
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
        name: 'Online',
        data: online
    }, {
        name: 'Offline',
        data: offline
    }, {
        name: 'Blended',
        data: blended
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
            return 'Rp' + Highcharts.numberFormat(this.total,0) 
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
        layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: Rp{point.stackTotal}',
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
        }
    }]
});


</script>
@endpush