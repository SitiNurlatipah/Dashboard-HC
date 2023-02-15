@extends('layouts.master')

@section('title', 'GETO & TO Employee')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">GETO & Turn Over</h6>
                </div>
                <!-- Breadcrumb -->
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>GETO & Turn Over</span></li>
                </ol>
                <!-- /Breadcrumb -->
                <div class="clearfix"></div>
                
                </div>
                <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <!-- Breadcrumb -->
                    
                    <!-- /Breadcrumb -->
                    <div  class="tab-struct custom-tab-1 mt-0">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                            <!-- <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">ALL</a></li> -->
                            <li role="presentation" class="active"><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">GETO</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">TO</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_17" role="tab" href="#profile_17" aria-expanded="false">Grafik</a></li>
                            
                        </ul>
            {{--@if(session()->has('message'))
            <div class="alert alert-success alert-dismissable mt-10 pb-5 pt-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
            </div>
            @endif--}}
        <div class="tab-content" id="myTabContent_7">
                    <div  id="profile_15" class="tab-pane fade active in" role="tabpanel">
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="form-horizontal form-group">
                        <form action="{{ route('employee.filter') }}" method="POST" class="form-inline">
                            @csrf
                                <div class="form-group row col-sm-11">
                                    <label for="date" class="col-form-label text-right col-sm-1 pt-3">Dari</label>
                                    <input type='date' class="form-control input-sm col-sm-3" name="start_date" value="{{Request::input('start_date')}}">
                                    <label class="col-form-label text-right col-sm-1">Sampai</label>
                                    <input type='date' class="form-control input-sm col-sm-3 mr-20" name="end_date" value="{{Request::input('end_date')}}">
                                    <button  type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">filter</span></button>
                                    <a class="btn btn-warning btn-anim btn-xs" href="{{ route('employee') }}"><i class="fa fa-undo"></i><span class="btn-text">reset</span></a>
                                </div>
                                
                        </form>
                        <div class="col-sm-1 ml-30">
                        <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-geto" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>    
                    </div>
                    </div>
                    </div>
                    
                    <!-- <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-geto" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data Geto</span></button>
                    
                    <form action="{{ route('employee.filter') }}" method="POST" class="form-inline mb-30 mt-30">
                    @csrf  
                    <div class="form-group row">  
                            <label class="control-label mr-10 text-left">Dari tanggal</label>
                            <input type='date' class="form-control" name="start_date">
                            <label class="control-label mr-10 text-left">Sampai tanggal</label>
                            <input type='date' class="form-control" name="end_date">
                        <button type="submit" class="btn btn-primary pa-5" value="Submit"><i class="zmdi zmdi-search"></i></button>
                        <a class="btn btn-primary pa-5 btn-sm" href="{{ route('employee') }}"><i class="fa fa-undo"></i></a>

                        
                    </div>
                    
                    </form>    -->
                    <div class="table-wrap">
                    <div class="table-responsive">
                    <table id="tblGeto" class="table table-hover table-bordered display mt-10 font-11 text-center" width="99%">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">Bulan</th>
                                <th colspan="4" class="text-center">Jumlah</th>
                                <th colspan="2" class="text-center">Presentase</th>
                                <th rowspan="2" class="text-center">Action</th>
                            </tr>
                            <tr>
                                
                                <th class="text-center">Permanent</th>
                                <th class="text-center">Outsource</th>
                                <th class="text-center">Contract</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Permanent</th>
                                <th class="text-center">Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            $i=1; $j=0; foreach($getos as $geto):
                            $persentaseKaryawanGeto=($geto->intGetoKaryawan/$geto->realTotal)*100;
                            $persentaseTotalGeto=($geto->intTotal/$geto->realTotal)*100; 
                            ?>
                            
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ date('F Y', strtotime($geto->dateBulan))}}</td>
                                    <td>{{ $geto->intGetoKaryawan }}</td>
                                    <td>{{ $geto->intGetoOutsource }}</td>
                                    <td>{{ $geto->intGetoKontrak }}</td>
                                    <td>{{ $geto->intTotal }}</td>
                                    <td>{{number_format($persentaseKaryawanGeto,2)}}%</td>
                                    <td>{{number_format($persentaseTotalGeto,2)}}%</td>
                                    <td>
                                    <form action="{{route('geto.delete',$geto->idGeto)}}" method="POST">
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateGeto{{$geto->idGeto}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                    @csrf 
                                    @method("delete")
                                        <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm show_confirm" ><i class="icon-trash"></i></button>
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
                    <div class="row">
                    <div class="col-sm-12">
                    <div class="form-horizontal form-group">
                        <form action="{{ route('employee.filter') }}" method="POST" class="form-inline">
                            @csrf
                                <div class="form-group row col-sm-11">
                                    <label for="date" class="col-form-label text-right col-sm-1 pt-3">Dari</label>
                                    <input type='date' class="form-control input-sm col-sm-3" name="start_date" value="{{Request::input('start_date')}}">
                                    <label class="col-form-label text-right col-sm-1">Sampai</label>
                                    <input type='date' class="form-control input-sm col-sm-3 mr-20" name="end_date" value="{{Request::input('end_date')}}">
                                    <button  type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">filter</span></button>
                                    <a class="btn btn-warning btn-anim btn-xs" href="{{ route('employee') }}"><i class="fa fa-undo"></i><span class="btn-text">reset</span></a>
                                </div>
                                
                                </form>
                        <div class="col-sm-1 ml-30">
                        <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-to" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>    
                    </div>
                    </div>
                    </div>
                    <!-- <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-to" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data TO</span></button>

                    <form action="{{ route('employee.filter') }}" method="POST" class="form-inline mb-30 mt-30">
                    @csrf
                        <div class="form-group row">  
                            <label class="control-label mr-10 text-left">Dari tanggal</label>
                            <input type='date' class="form-control" name="start_date">
                            <label class="control-label mr-10 text-left">Sampai tanggal</label>
                            <input type='date' class="form-control" name="end_date">
                        <button type="submit" class="btn btn-primary pa-5" value="Submit"><i class="zmdi zmdi-search"></i></button>
                        <a class="btn btn-primary pa-5 btn-sm" href="{{ route('employee') }}"><i class="fa fa-undo"></i></a>
                    </div>
                    
                    </form> -->
                    <div class="table-wrap">
                    <div class="table-responsive">
                    <table id="tblTo" class="table table-hover table-bordered font-11 mt-5 text-center" width="99%">                        
                        <thead>
                        <tr>
                            <th rowspan="2" class="text-center">No</th>
                            <th rowspan="2" class="text-center">Bulan</th>
                            <th colspan="5" class="text-center">Jumlah</th>
                            <th rowspan="2" class="text-center">Action</th>
                        </tr>
                        <tr>
                                
                                <th class="text-center">Permanent</th>
                                <th class="text-center">Outsource</th>
                                <th class="text-center">Contract</th>
                                <th class="text-center">PKWTT+PKWT</th>
                                <th class="text-center">Total</th>
                                
                                
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                        $i=1;
                        foreach($tos as $to): 
                        $pkwtt = $to->intToKaryawan + $to->intToKontrak;
                         ?>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ date('F Y', strtotime($to->dateBulan)) }}</td>
                                    <td>{{ $to->intToKaryawan }}</td>
                                    <td>{{ $to->intToOutsource }}</td>
                                    <td>{{ $to->intToKontrak }}</td>
                                    <td>{{$pkwtt}}</td>
                                    <td>{{ $to->intTotal }}</td>
                                    
                                    <td>
                                    <form action="{{route('to.delete',$to->idTo)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateTo{{$to->idTo}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                    @csrf 
                                    @method("delete")
                                        <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm show_confirm" ><i class="icon-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div  id="profile_17" class="tab-pane fade" role="tabpanel">
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
                            <div id="to" class="" style="height:367px;"></div>
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
    
    <!-- modal add data geto -->
    <div class="modal fade" id="add-geto" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data GETO Employee</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('geto.post') }}" method="POST">
                @csrf 
                        <div class="form-group">
                            <label for="realemployee" class="control-label mb-10">Bulan</label>
                            <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih Bulan..." data-live-search="true" name="realemployee" id="realemployee" required/>
                                @foreach($real as $r)
                                <option value="{{$r->idReal}}">{{\Carbon\Carbon::parse($r->dateBulan)->format('F Y')}}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intGetoKaryawan" name="intGetoKaryawan">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKontrak" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intGetoKontrak" name="intGetoKontrak">
                        </div>
                        <div class="form-group">
                            <label for="intGetoOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intGetoOutsource" name="intGetoOutsource">
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
    <!-- end modal add geto -->

    <!-- modal update data geto employee -->
    @foreach($getos as $geto)
    <div class="modal fade" id="updateGeto{{$geto->idGeto}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data GETO Employee</h5>
                </div>
                <div class="modal-body">
                <form action="/employee/geto/{{$geto->idGeto}}" method="POST">
                @csrf 
                @method('put')
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Bulan</label>
                            <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="realemployee" id="realemployee">
                                <option value="{{$geto->realemployee}}">{{\Carbon\Carbon::parse($geto->dateBulan)->format('F Y')}}</option>
                                @foreach($real as $r)
                                <option value="{{$r->idReal}}">{{\Carbon\Carbon::parse($r->dateBulan)->format('F Y')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal" value="{{$geto->intTotal}}">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intGetoKaryawan" name="intGetoKaryawan" value="{{$geto->intGetoKaryawan}}">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKontrak" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intGetoKontrak" name="intGetoKontrak" value="{{$geto->intGetoKontrak}}">
                        </div>
                        <div class="form-group">
                            <label for="intGetoOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intGetoOutsource" name="intGetoOutsource" value="{{$geto->intGetoOutsource}}">
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
    <!-- end modal update geto -->

    <!-- modal add to -->
    <div class="modal fade" id="add-to" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data TO</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('to.post') }}" method="POST">
                @csrf 
                        <div class="form-group">
                            <label for="realemployee" class="control-label mb-10">Bulan</label>
                            <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih Bulan..." data-live-search="true" name="realemployee_id" id="realemployee_id" required="true">
                                @foreach($real as $r)
                                <option value="{{$r->idReal}}">{{\Carbon\Carbon::parse($r->dateBulan)->format('F Y')}}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal">
                        </div>
                        <div class="form-group">
                            <label for="intToKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intToKaryawan" name="intToKaryawan">
                        </div>
                        <div class="form-group">
                            <label for="intToKontrak" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intToKontrak" name="intToKontrak">
                        </div>
                        <div class="form-group">
                            <label for="intToOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intToOutsource" name="intToOutsource">
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
    <!-- end modal add to -->

    <!-- modal update to employee -->
    @foreach($tos as $to)
    <div class="modal fade" id="updateTo{{$to->idTo}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data TO</h5>
                </div>
                <div class="modal-body">
                <form action="/employee/to/{{$to->idTo}}" method="POST">
                @csrf 
                @method('put')
                        <div class="form-group">
                            <label for="realemployee_id" class="control-label mb-10">Bulan</label>
                            <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="realemployee_id" id="realemployee_id">
                                <option value="{{$to->realemployee_id}}">{{\Carbon\Carbon::parse($to->dateBulan)->format('F Y')}}</option>
                                @foreach($real as $r)
                                <option value="{{$r->idReal}}">{{\Carbon\Carbon::parse($r->dateBulan)->format('F Y')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal" value="{{$to->intTotal}}">
                        </div>
                        <div class="form-group">
                            <label for="intToKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intToKaryawan" name="intToKaryawan" value="{{$to->intToKaryawan}}">
                        </div>
                        <div class="form-group">
                            <label for="intToKontrak" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intToKontrak" name="intToKontrak" value="{{$to->intToKontrak}}">
                        </div>
                        <div class="form-group">
                            <label for="intToOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intToOutsource" name="intToOutsource" value="{{$to->intToOutsource}}">
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
    <!-- end modal to employee -->
@endsection


@push('script')
<script type="text/javascript">
    $('#tblTo').dataTable( {
    paging: true,
    searching: true
    } );
    $('#tblGeto').dataTable( {
    paging: true,
    searching: true
    } );
    $('#tbl_employee').dataTable( {
    paging: true,
    searching: true
    } );
     $('.show_confirm').click(function(event) {
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
  
    
    var getoKaryawan =  <?php echo json_encode($getoKaryawan) ?>;
    var bulanGeto =  <?php echo json_encode($bulanGeto) ?>;
    var bulanTo =  <?php echo json_encode($bulanTo) ?>;
    var toOutsource =  <?php echo json_encode($toOutsource) ?>;
    var toKontrak =  <?php echo json_encode($toKontrak) ?>;
    
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
                    return Highcharts.numberFormat(this.y,0)+'%' 
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
// thirdBtn.addEventListener('click', () => {
Highcharts.chart('to', {
        title: {
            text: 'Data Karyawan TO'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanTo
        },
        yAxis: {
            title: {
            enabled: false
            }
        },
        
        plotOptions: {
            series: {
                allowPointSelect: true,
                dataLabels: {
                    enabled: true
                }
            },
            
        },
        
        series: [{
            
            type: 'column',
            name: 'TO Outsource',
            data: toOutsource,
        },{
            type: 'column',
            name: 'TO Contract',
            data: toKontrak,
        
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
$(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissable").alert('close');
});
</script>
@endpush