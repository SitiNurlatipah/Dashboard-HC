@extends('layouts.master')

@section('title', 'Management Employee')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h5 class="panel-title txt-dark">Grafik Management Employee</h5>
                </div>
                <div class="clearfix"></div>
                
            </div>
            <div class="panel-wrapper collapse in">
            
                <div id="grafik"></div>
            </div>	
        </div>
    </div>
@endsection

@push('script')
<script type="text/javascript">
    var employees =  <?php echo json_encode($jumlah_employee) ?>;
    var bulan =  <?php echo json_encode($bulan) ?>;
    
    Highcharts.chart('grafik', {
        title: {
            text: 'Data Karyawan'
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
            name: 'Jumlah Employee',
            data: employees
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