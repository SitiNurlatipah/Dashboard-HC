@extends('layouts.master')

@section('title', 'Management Employee')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Management Employee</h6>
                    </div>
                    <div class="clearfix"></div>
                    @if(session()->has('message'))
                    <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
                    @endif
                </div>
                <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div  class="tab-struct custom-tab-2 mt-5">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_15">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">ALL</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">GETO</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">TO</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_17" role="tab" href="#profile_17" aria-expanded="false">Grafik</a></li>
                            
                        </ul>
                <div class="tab-content" id="myTabContent_15">
                <div  id="profile_17" class="tab-pane fade" role="tabpanel">
                <div id="employee"></div>
                <div id="geto"></div>
                <div id="to"></div>
                
                </div>

                    <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                    <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-employee" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data Employee</span></button>
                    <form action="{{ route('employee.filter') }}" method="POST" class="form-inline mb-30 mt-30">
                    @csrf
                            <div class="form-group row">  
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                <input type='date' class="form-control" name="start_date">
                                <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                <input type='date' class="form-control" name="end_date">
                                <button type="submit" class="btn btn-primary pa-5 btn-sm" value="Submit"><i class="zmdi zmdi-search"></i></button>
                                <a class="btn btn-primary pa-5 btn-sm" href="{{ route('employee') }}"><i class="fa fa-undo"></i></a>
                            </div>
                        
                        </form>
                        <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tbl_employee" class="table table-hover display pb-30 text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th class="text-center">Tanggal Input</th>
                                        <th class="text-center">Bulan Input</th>
                                        <th class="text-center">Permanen</th>
                                        <th class="text-center">Outsource</th>
                                        <th class="text-center">Contract</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1; foreach($employees as $dataEmployee): ?>
                                
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $dataEmployee->dateTglInput->format('d/m/Y') }}</td>
                                        <td>{{ $dataEmployee->dateTglInput->format('F Y') }}</td>
                                        <td>{{ $dataEmployee->intKaryawan }}</td>
                                        <td>{{ $dataEmployee->intOutsource }}</td>
                                        <td>{{ $dataEmployee->intContract }}</td>
                                        <td>{{ $dataEmployee->intJumlahEmployee }}</td>
                                        <td>
                                        <form action="{{route('employee.delete', $dataEmployee->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateEmployee{{$dataEmployee->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                        <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-geto" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data Geto</span></button>
                        
                        <form action="{{ route('employee.filter') }}" method="POST" class="form-inline mb-30 mt-30">
                        @csrf  
                        <div class="form-group row">  
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                <input type='date' class="form-control" name="start_date">
                                <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                <input type='date' class="form-control" name="end_date">
                            <button type="submit" class="btn btn-primary pa-5" value="Submit"><i class="zmdi zmdi-search"></i></button>
                            <a class="btn btn-primary pa-5 btn-sm" href="{{ route('employee') }}"><i class="fa fa-undo"></i></a>

                            </form>
                        </div>
                        
                        </form>   
                        <div class="table-wrap">
                        <div class="table-responsive">
                        <table id="tbl_user" class="table table-hover display pb-30 text-center">
                            <thead>
                                <tr>
                                    <th colspan="5" class="text-center">Jumlah</th>
                                    <th colspan="2" class="text-center">Presentase</th>
                                </tr>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Permanen</th>
                                    <th class="text-center">Outsource</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">%Permanen</th>
                                    <th class="text-center">%Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                $i=1; $j=0; foreach($getos as $geto):
                                $persentaseKaryawanGeto=($geto->intGetoKaryawan/$employees[$j]->intKaryawan)*100;
                                $persentaseTotalGeto=($geto->intTotal/$employees[$j]->intJumlahEmployee)*100; 
                                ?>
                                
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $geto->dateTglInput->format('F Y') }}</td>
                                        <td>{{ $geto->intGetoKaryawan }}</td>
                                        <td>{{ $geto->intGetoOutsource }}</td>
                                        <td>{{ $geto->intGetoKontark }}</td>
                                        <td>{{ $geto->intTotal }}</td>
                                        <td>{{number_format($persentaseKaryawanGeto,2)}}%</td>
                                        <td>{{number_format($persentaseTotalGeto,2)}}%</td>
                                        <td>
                                        <form action="{{route('geto.delete',$geto->id)}}" method="POST">
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateGeto{{$geto->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-to" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data TO</span></button>

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
                        
                        </form>
                        <div class="table-wrap">
                        <div class="table-responsive">
                        <table id="tbl_user" class="table table-hover display pb-30 text-center">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center">Jumlah</th>
                                <th colspan="3" class="text-center">Presentase</th>
                            </tr>
                            <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Permanen</th>
                                    <th class="text-center">Outsource</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">PKWTT+PKWT</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">%Permanen</th>
                                    <th class="text-center">%Contract</th>
                                    <th class="text-center">%Total</th>
                                    <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i=1;$j=0; 
                            foreach($tos as $to): 
                            $pkwtt = $to->intToKaryawan + $to->intToKontrak;
                            $persentaseKaryawan=($to->intToKaryawan/$employees[$j]->intKaryawan)*100;
                            $persentseTotalTo=($to->intTotal/$employees[$j]->intJumlahEmployee)*100;
                            $persentseKontrakTo=($to->intToKontrak/$employees[$j]->intContract)*100; ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ $to->dateTglInput->format('F Y') }}</td>
                                        <td>{{ $to->intToKaryawan }}</td>
                                        <td>{{ $to->intToOutsource }}</td>
                                        <td>{{ $to->intToKontrak }}</td>
                                        <td>{{$pkwtt}}</td>
                                        <td>{{ $to->intTotal }}</td>
                                        <td>{{number_format($persentaseKaryawan,2)}}</td>
                                        <td>{{number_format($persentseKontrakTo,2)}}%</td>
                                        <td>{{number_format($persentseTotalTo,2)}}%</td>
                                        <td>
                                        <form action="{{route('to.delete',$to->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateTo{{$to->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        </div>
                        

                                        
                                        </div>
                                    </div>	
                                </div>
                                </div>
                                </div>
                                </div>
                                
                            
    <!-- /Row -->
    <!-- modal add data employee -->
    <div class="modal fade" id="add-employee" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data Employee</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('employee.post') }}" method="POST">
                @csrf 
                        
                        <div class="form-group">
                            <label for="intJumlahEmployee" class="control-label mb-10">Jumlah Employee</label>
                            <input type="number" class="form-control" id="intJumlahEmployee" name="intJumlahEmployee">
                        </div>
                        <div class="form-group">
                            <label for="intKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intKaryawan" name="intKaryawan">
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intContract" name="intContract">
                        </div>
                        <div class="form-group">
                            <label for="intOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intOutsource" name="intOutsource">
                        </div>
                        
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateTglInput" name="dateTglInput">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data Employee</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
    </div>
    <!-- end modal add employee -->
    
    <!-- modal update data employee -->
    @foreach($employees as $dataEmployee)
    <div class="modal fade" id="updateEmployee{{$dataEmployee->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data Employee</h5>
                </div>
                <div class="modal-body">
                <form action="/employee/{{$dataEmployee->id}}" method="POST">
                @csrf 
                @method('put')       
                        <div class="form-group">
                            <label for="intJumlahEmployee" class="control-label mb-10">Jumlah Employee</label>
                            <input type="number" class="form-control" id="intJumlahEmployee" name="intJumlahEmployee" value="{{$dataEmployee->intJumlahEmployee}}">
                        </div>
                        <div class="form-group">
                            <label for="intKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intKaryawan" name="intKaryawan" value="{{$dataEmployee->intKaryawan}}">
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intContract" name="intContract" value="{{$dataEmployee->intContract}}">
                        </div>
                        <div class="form-group">
                            <label for="intOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intOutsource" name="intOutsource" value="{{$dataEmployee->intOutsource}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateTglInput" name="dateTglInput" value="{{$dataEmployee->dateTglInput}}">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data Employee</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
    </div>
    @endforeach
    <!-- end modal update employee -->

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
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intGetoKaryawan" name="intGetoKaryawan">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKontark" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intGetoKontark" name="intGetoKontark">
                        </div>
                        <div class="form-group">
                            <label for="intGetoOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intGetoOutsource" name="intGetoOutsource">
                        </div>
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateTglInput" name="dateTglInput">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data Geto Employee</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
    </div>
    <!-- end modal add geto -->

    <!-- modal update data geto employee -->
    @foreach($getos as $geto)
    <div class="modal fade" id="updateGeto{{$geto->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data GETO Employee</h5>
                </div>
                <div class="modal-body">
                <form action="/employee/geto/{{$geto->id}}" method="POST">
                @csrf 
                @method('put')
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal" value="{{$geto->intTotal}}">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKaryawan" class="control-label mb-10">Karyawan</label>
                            <input type="number" class="form-control" id="intGetoKaryawan" name="intGetoKaryawan" value="{{$geto->intGetoKaryawan}}">
                        </div>
                        <div class="form-group">
                            <label for="intGetoKontark" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intGetoKontark" name="intGetoKontark" value="{{$geto->intGetoKontark}}">
                        </div>
                        <div class="form-group">
                            <label for="intGetoOutsource" class="control-label mb-10">Outsource</label>
                            <input type="number" class="form-control" id="intGetoOutsource" name="intGetoOutsource" value="{{$geto->intGetoOutsource}}">
                        </div>
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateTglInput" name="dateTglInput" value="{{$geto->dateTglInput}}">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data Geto Employee</button>
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
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateTglInput" name="dateTglInput">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data TO Employee</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
    </div>
    <!-- end modal add to -->

    <!-- modal update to employee -->
    @foreach($tos as $to)
    <div class="modal fade" id="updateTo{{$to->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data TO</h5>
                </div>
                <div class="modal-body">
                <form action="/employee/to/{{$to->id}}" method="POST">
                @csrf 
                @method('put')
                        
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
                        <div class="form-group">
                            <label for="dateTglInput" class="control-label mb-10">Tanggal Input</label>
                            <input type="date" class="form-control" id="dateTglInput" name="dateTglInput" value="{{$to->dateTglInput}}">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data TO Employee</button>
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
  
    var employees =  <?php echo json_encode($jumlah_employee) ?>;
    var karyawan =  <?php echo json_encode($karyawan) ?>;
    var kontrak =  <?php echo json_encode($kontrak) ?>;
    var outsource =  <?php echo json_encode($outsource) ?>;
    var bulan =  <?php echo json_encode($bulan) ?>;
    var geto =  <?php echo json_encode($total_geto) ?>;
    var getoKaryawan =  <?php echo json_encode($getoKaryawan) ?>;
    var getoKontrak =  <?php echo json_encode($getoKontrak) ?>;
    var getoOutsource =  <?php echo json_encode($getoOutsource) ?>;
    var bulanGeto =  <?php echo json_encode($bulanGeto) ?>;
    var to =  <?php echo json_encode($total_to) ?>;
    var bulanTo =  <?php echo json_encode($bulanTo) ?>;
    var toOutsource =  <?php echo json_encode($toOutsource) ?>;
    var toKontrak =  <?php echo json_encode($toKontrak) ?>;
    var toKaryawan =  <?php echo json_encode($toKaryawan) ?>;
    Highcharts.chart('employee', {
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
            type: 'column',
            name: 'Jumlah Employee',
            data: employees
        },{
            type: 'column',
            name: 'Jumlah Karyawan',
            data: karyawan
        },{
            type: 'column',
            name: 'Jumlah Outsource',
            data: outsource
        },{
            type: 'column',
            name: 'Jumlah Kontrak',
            data: kontrak

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
            name: 'Jumlah Employee GETO',
            data: geto
        },{
            type: 'column',
            name: 'Jumlah GETO Karyawan',
            data: getoKaryawan
        },{
            type: 'column',
            name: 'Jumlah GETO Kontrak',
            data: getoKontrak
        },{
            type: 'column',
            name: 'Jumlah GETO Outsource',
            data: getoOutsource

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
                text: 'Jumlah Employee TO'
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
            name: 'Jumlah Employee TO',
            data: to,
           
        },{
            type: 'column',
            name: 'Jumlah TO Outsource',
            data: toOutsource,
        },{
            type: 'column',
            name: 'Jumlah TO Kontrak',
            data: toKontrak,
        },{
            type: 'column',
            name: 'Jumlah TO Karyawan',
            data: toKaryawan,
        
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