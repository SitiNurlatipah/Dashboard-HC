@extends('layouts.master')

@section('title', 'Sales')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">SALES</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in"> 
            <div class="panel-body">
                <div  class="tab-struct custom-tab-1 mt-0">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                        <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">MTD</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">YTD</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">Grafik</a></li>
                    </ul>
            {{--@if(session()->has('message'))
            <div class="alert alert-success alert-dismissable mt-10 pb-5 pt-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
            </div>
            @endif--}}
            <div class="tab-content" id="myTabContent_7">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addmtd" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="sales" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan/Tahun</th>
                                <th class="text-center">Sales In</th>
                                <th class="text-center">Sales Out</th>
                                <th class="text-center">HR Cost</th>    
                                <th class="text-center">Head Count</th>    
                                <th class="text-center">Action</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salesMtd as $sales)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($sales->bulan)->format('F Y')}}</td>
                                <td>{{number_format($sales->salesIn,0)}}</td>
                                <td>{{number_format($sales->salesOut,0)}}</td>
                                <td>{{number_format($sales->hrCost,0)}}</td>
                                <td>{{number_format($sales->headCount,0)}}</td>
                                <td>
                                    <form action="{{route('sales.delete',$sales->idMtd)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#mtdup{{$sales->idMtd}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
            <div  id="profile_15" class="tab-pane" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addytd" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="sales" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Sales In</th>
                                <th class="text-center">Sales Out</th>
                                <th class="text-center">HR Cost</th>    
                                <th class="text-center">Head Count</th>    
                                <th class="text-center">Action</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salesYtd as $ytd)
                            <tr>
                                <td>{{$ytd->tahun}}</td>
                                <td>{{number_format($ytd->salesInYtd,0)}}</td>
                                <td>{{number_format($ytd->salesOutYtd,0)}}</td>
                                <td>{{number_format($ytd->hrCostYtd,0)}}</td>
                                <td>{{number_format($ytd->headCountYtd,0)}}</td>
                                <td>
                                    <form action="{{route('salesytd.delete',$ytd->idYtd)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateYtd{{$ytd->idYtd}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="profile_16" class="tab-pane" role="tabpanel">
                    <div id="salesChart"></div>
                </div>
                </div>
            </div>
        </div>	
        </div>	
    </div>
</div>
</div>
<!-- modal add -->
<div class="modal fade" id="addmtd" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Productivity Man Power</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('sales.post') }}" method="POST">
                @csrf 
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales IN</label>
                        <input type="number" class="form-control" id="salesIn" name="salesIn" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales OUT</label>
                        <input type="number" class="form-control" id="salesIn" name="salesOut" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">HR Cost</label>
                        <input type="number" class="form-control" id="salesIn" name="hrCost" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Head Count</label>
                        <input type="number" class="form-control" id="salesIn" name="headCount" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="salesIn" name="bulan" required>
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
<div class="modal fade" id="addytd" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Productivity Man Power</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('salesytd.post') }}" method="POST">
                @csrf 
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales IN</label>
                        <input type="number" class="form-control" id="salesInYtd" name="salesInYtd" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales OUT</label>
                        <input type="number" class="form-control" id="salesOutYtd" name="salesOutYtd" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">HR Cost</label>
                        <input type="number" class="form-control" id="hrCostYtd" name="hrCostYtd" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Head Count</label>
                        <input type="number" class="form-control" id="headCountYtd" name="headCountYtd" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Tahun</label>
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
<!-- end modal add -->
<!-- edit modal -->
@foreach($salesYtd as $ytd)
<div class="modal fade" id="updateYtd{{$ytd->idYtd}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Productivity Man Power</h5>
                </div>
                <div class="modal-body">
                <form action="/sales/ytd/{{$ytd->idYtd}}" method="POST">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales IN</label>
                        <input type="number" class="form-control" id="salesIn" name="salesInYtd" value="{{$ytd->salesInYtd}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales OUT</label>
                        <input type="number" class="form-control" id="salesIn" name="salesOutYtd" value="{{$ytd->salesOutYtd}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">HR Cost</label>
                        <input type="number" class="form-control" id="salesIn" name="hrCostYtd" value="{{$ytd->hrCostYtd}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Head Count</label>
                        <input type="number" class="form-control" id="salesIn" name="headCountYtd" value="{{$ytd->headCountYtd}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Bulan</label>
                        <input type="text" class="form-control" id="salesIn" name="tahun" value="{{$ytd->tahun}}" required>
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
@foreach($salesMtd as $sales)
<div class="modal fade" id="mtdup{{$sales->idMtd}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Productivity Man Power</h5>
                </div>
                <div class="modal-body">
                <form action="/sales/{{$sales->idMtd}}" method="POST">
                @csrf
                @method('put')
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales IN</label>
                        <input type="number" class="form-control" id="salesIn" name="salesIn" value="{{$sales->salesIn}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Sales OUT</label>
                        <input type="number" class="form-control" id="salesIn" name="salesOut" value="{{$sales->salesOut}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">HR Cost</label>
                        <input type="number" class="form-control" id="salesIn" name="hrCost" value="{{$sales->hrCost}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Head Count</label>
                        <input type="number" class="form-control" id="salesIn" name="headCount" value="{{$sales->headCount}}" required>
                    </div>
                    <div class="form-group">
                        <label for="intContract" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="salesIn" name="bulan" value="{{$sales->bulan}}" required>
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
<!-- end edit modal -->
@endsection
@push('script')
<script type="text/javascript">
$('.display').dataTable( {
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
        layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
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
$(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissable").alert('close');
});
</script>
@endpush