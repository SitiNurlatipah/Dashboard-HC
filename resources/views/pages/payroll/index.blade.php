@extends('layouts.master')

@section('title', 'Payroll')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Payroll</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in"> 
            <div class="panel-body">
            <div  class="tab-struct custom-tab-1 mt-0">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                        <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Topten Overtime</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Berita</a></li>
                        <!-- <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">Customer</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_17" role="tab" href="#profile_17" aria-expanded="false">Learn & Growth</a></li> -->
                    </ul>
            
            <div class="tab-content" id="myTabContent_7">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                <!-- <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addovertime" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button> -->
                <div class="row">
                    <div class="pull-left ml-30">
                        <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addovertime" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                    </div>
                    <div class="pull-right mr-10 ml-30">
                        <form action="{{ route('payroll.filter') }}" method="POST" id="filter-form" class="form-inline">
                            @csrf
                            <div class="form-group mr-15">
                                <label class="control-label mr-10 text-left">Filter Bulan</label>
                                <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                            </div>
                            <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                            <a class="btn btn-warning btn-anim btn-xs" href="{{ route('payroll') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                        </form>
                    </div>
                </div>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <div class="row col-sm-12">
                        <!-- <div class=" mb-5">
                        <h6 class="panel-title txt-dark text-center">{{ \Carbon\Carbon::now()->format('F Y') }}</h6>
                        </div> -->
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="100%" >
                                    <thead class="bg-success">
                                        <tr>
                                            <th colspan="6" class="text-center">HC</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        
                                        @if($overtime->id_department==1)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td class="text-center">{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @endif
                                        
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-warning">
                                        <tr>
                                            <th colspan="6" class="text-center">BDA</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==7)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @endif
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-twitter">
                                        <tr>
                                            <th colspan="6" class="text-center">PRD</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==2)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row col-sm-12">
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-grey">
                                        <tr>
                                            <th colspan="6" class="text-center">ENG</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==6)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-beige">
                                        <tr>
                                            <th colspan="6" class="text-center">MDP</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==8)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-seagreen">
                                        <tr>
                                            <th colspan="6" class="text-center">IOS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==5)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="row col-sm-12">
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-dark-green">
                                        <tr>
                                            <th colspan="6" class="text-center">QA</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==4)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                <thead class="bg-info">
                                        <tr>
                                            <th colspan="6" class="text-center">WHS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Overtime Weight Hour</th>
                                            <th class="text-center">Action</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($otdepartment as $overtime)
                                        @if($overtime->id_department==3)
                                        
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{date('F Y', strtotime($overtime->bulan))}}</td>
                                            <td>{{$overtime->nik}}</td>
                                            <td>{{$overtime->nama}}</td>
                                            <td>{{$overtime->otweighthour}}</td>
                                            <td class="text-center">
                                                <form action="{{route('payroll.delete',$overtime->idtop_ot)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateovertime{{$overtime->idtop_ot}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                                @csrf 
                                                @method("delete")
                                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                <div class="row">
                    <div class="pull-right mr-10 ml-30 mb-5">
                        <form action="{{ route('payroll.filter') }}" method="POST" id="filter-form" class="form-inline">
                            @csrf
                            <div class="form-group mr-15">
                                <label class="control-label mr-10 text-left">Filter Bulan</label>
                                <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                            </div>
                            <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                            <a class="btn btn-warning btn-anim btn-xs" href="{{ route('payroll') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                        </form>
                    </div>
                </div>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <div class="row col-sm-12">
                            <div class="col-sm-4">
                            <button class="btn btn-default btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addlate" data-whatever="@mdo"><i class="fa fa-plus"></i><span class="btn-text">Tambah Terlambat</span></button>
                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                    <thead class="bg-dark-green">
                                        <tr>
                                            <th colspan="6" class="text-center">TERLAMBAT</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Department</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($terlambat as $late)
                                        <tr>
                                            <td>{{date('F Y', strtotime($late->bulan))}}</td>
                                            <td>{{$late->department}}</td>
                                            <td>{{$late->telat}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#show{{$late->iddepartment}}" data-whatever="@mdo"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-default btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addkelahiran" data-whatever="@mdo"><i class="fa fa-plus"></i><span class="btn-text">Tambah Kelahiran</span></button>

                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                <thead class="bg-info">
                                        <tr>
                                            <th colspan="6" class="text-center">KELAHIRAN</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Department</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kelahiran as $lahir)
                                        <tr>
                                            <td>{{date('F Y', strtotime($lahir->bulan))}}</td>
                                            <td>{{$lahir->department}}</td>
                                            <td>{{$lahir->jmlkelahiran}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#showlahir{{$lahir->iddepartment}}" data-whatever="@mdo"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-default btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#adddukacita" data-whatever="@mdo"><i class="fa fa-plus"></i><span class="btn-text">Tambah Dukacita</span></button>

                                <table id="" class="table table-hover font-11 table-bordered displayz mb-5" width="99%" >
                                <thead class="bg-beige">
                                        <tr>
                                            <th colspan="6" class="text-center">DUKACITA</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Department</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dukacita as $dcita)
                                        <tr>
                                            <td>{{date('F Y', strtotime($dcita->bulan))}}</td>
                                            <td>{{$dcita->department}}</td>
                                            <td>{{$dcita->jmldukacita}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#showdukacita{{$dcita->iddepartment}}" data-whatever="@mdo"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            


            </div>
            </div>
            <!-- end tab -->
                </div>
            </div>
        </div>	
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addovertime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('payroll.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Department</label>
                    <select name="id_department" id="id_department" class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih Department..." data-live-search="true" required="true">
                        @foreach($department as $dept)
                        <option value="{{ $dept->iddepartment }}">{{ $dept->department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
                </div>
                    <div class="row form-group ">
                        <div class="col-sm-4">
                            <label for="dateBulan" class="control-label">NIK</label>
                            <input type="text" class="form-control" id="" name="nik[]" required> 
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="control-label">Nama</label>
                            <input type="text" class="form-control" id="" name="nama[]" required>
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="control-label">Overtime Hour</label>
                            <input type="text" class="form-control" id="" name="otweighthour[]" required>
                        </div>
                    </div>
                    <button type="button" class="add-form btn btn-primary btn-xs">Add Field</button>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>  
            
        </form>
    </div>       
    </div>       
</div>
<div class="modal fade" id="addkelahiran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Kelahiran</h5>
        </div> 
        <form action="{{ route('payrollKelahiran.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
                </div>
                <div class="form-group">
                    <label for="dateBulan" class="control-label">Department</label>
                    <select name="id_department" id="id_department" class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih Department..." data-live-search="true" required="true">
                        @foreach($department as $dept)
                        <option value="{{ $dept->iddepartment }}">{{ $dept->department }}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="" name="nama[]" required>
                    </div>
                    <div class="col-sm-8">
                        <label for="" class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="" name="keterangan[]" required>
                    </div>
                </div>
                <button type="button" class="pull-left ml-10 mt-10 add-kelahiran btn btn-primary btn-xs">Add Field</button>
            </div>
                
               
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>  
            
        </form>
    </div>       
    </div>       
</div>
<div class="modal fade" id="adddukacita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Dukacita</h5>
        </div> 
        <form action="{{ route('payrollDukacita.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
                </div>
                <div class="form-group">
                    <label for="dateBulan" class="control-label">Department</label>
                    <select name="id_department" id="id_department" class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih Department..." data-live-search="true" required="true">
                        @foreach($department as $dept)
                        <option value="{{ $dept->iddepartment }}">{{ $dept->department }}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="" name="nama[]" required>
                    </div>
                    <div class="col-sm-8">
                        <label for="" class="control-label">Keterangan</label>
                        <input type="text" class="form-control" id="" name="keterangan[]" required>
                    </div>
                </div>
                <button type="button" class="pull-left ml-10 mt-10 add-dukacita btn btn-primary btn-xs">Add Field</button>
            </div>
                
               
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>  
            
        </form>
    </div>       
    </div>       
</div>
<div class="modal fade" id="addlate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Terlambat</h5>
        </div> 
        <form action="{{ route('payrollLate.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
                </div>
                <div class="form-group">
                    <label for="dateBulan" class="control-label">Department</label>
                    <select name="id_department" id="id_department" class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Pilih Department..." data-live-search="true" required="true">
                        @foreach($department as $dept)
                        <option value="{{ $dept->iddepartment }}">{{ $dept->department }}</option>
                        @endforeach
                    </select> 
                </div>
                <div class="row form-group">
                    <div class="col-sm-8">
                        <label for="" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="" name="nama[]" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Jumlah</label>
                        <input type="text" class="form-control" id="" name="jumlah[]" required>
                    </div>
                </div>
                <button type="button" class="pull-left ml-10 mt-10 add-terlambat btn btn-primary btn-xs">Add Field</button>
            </div>
                
               
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>  
            
        </form>
    </div>       
    </div>       
</div>
@foreach($terlambat as $late)
<div class="modal fade" id="show{{$late->iddepartment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Details Terlambat</h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="dtable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Nama</th>    
                                <th class="text-center">Department</th>    
                                <th class="text-center">Jumlah</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailsterlambat as $details)
                            @if($details->id_department==$late->iddepartment)
                            <tr>
                                <td class="">{{ $details->bulan }}</td>
                                <td class="">{{ $details->nama }}</td>
                                <td class="">{{ $late->department }}</td>
                                <td class="text-center">{{ $details->jumlahtelat }}</td>
                                
                            </tr>
                            @endif   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($kelahiran as $lahir)
<div class="modal fade" id="showlahir{{$lahir->iddepartment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Details Kelahiran</h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="dtable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Nama</th>    
                                <th class="text-center">Department</th>    
                                <th class="text-center">Keterangan</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailskelahiran as $dkelahiran)
                            @if($dkelahiran->id_department==$lahir->iddepartment)
                            <tr>
                                <td class="">{{ $dkelahiran->bulan }}</td>
                                <td class="">{{ $dkelahiran->nama }}</td>
                                <td class="">{{ $lahir->department }}</td>
                                <td class="text-center">{{ $dkelahiran->keterangan }}</td>
                                
                            </tr>
                            @endif   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($dukacita as $dcita)
<div class="modal fade" id="showdukacita{{$dcita->iddepartment}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Details Dukacita</h5>
                </div>
                <div class="modal-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="dtable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Nama</th>    
                                <th class="text-center">Department</th>    
                                <th class="text-center">Keterangan</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($detailsdukacita as $details_dukacita)
                            @if($details_dukacita->id_department==$dcita->iddepartment)
                            <tr>
                                <td class="">{{ $details_dukacita->bulan }}</td>
                                <td class="">{{ $details_dukacita->nama }}</td>
                                <td class="">{{ $dcita->department }}</td>
                                <td class="text-center">{{ $details_dukacita->keterangan }}</td>
                                
                            </tr>
                            @endif   
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </div>
</div>
@endforeach
<!-- end add modal -->
<!-- edit modal -->
@foreach($otdepartment as $overtime)
<div class="modal fade" id="updateovertime{{$overtime->idtop_ot}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update</h5>
                </div>
                <div class="modal-body">
                <form action="/payroll/{{$overtime->idtop_ot}}" method="POST">
                @csrf 
                @method('put')
                    <div class="form-group">
                        <label for="" class="control-label mb-10">Department</label>
                        <select name="id_department" id="id_department" class="selectpicker form-control" data-style="form-control btn-default btn-outline"  data-live-search="true" required="true">
                            <option value="{{ $overtime->id_department }}">{{ $overtime->department }}</option>
                            @foreach($department as $dept)
                            <option value="{{ $dept->iddepartment }}">{{ $dept->department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label mb-10">Bulan</label>
                        <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($overtime->bulan)->format('Y-m')}}">
                    </div>
                    <!-- <div class="after-add-more"> -->
                    <div class="row form-group ">
                        <div class="col-sm-4">
                            <label for="dateBulan" class="control-label">NIK</label>
                            <input type="text" class="form-control" id="" name="nik" value="{{ $overtime->nik }}"> 
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="control-label">Nama</label>
                            <input type="text" class="form-control" id="" name="nama" value="{{ $overtime->nama }}">
                        </div>
                        <div class="col-sm-4">
                            <label for="" class="control-label">Overtime Hour</label>
                            <input type="text" class="form-control" id="" name="otweighthour" value="{{ $overtime->otweighthour }}">
                        </div>
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
<!-- end edit modal -->
@endsection
@push('script')
<script type="text/javascript">

// $('.displayz').dataTable( {
//     lengthChange: false
// } );
$(document).ready(function() {
	// "use strict";
    // $('.displayz').DataTable({ 
    //     "lengthChange": false,
    //     paging: false,
    //     searching: false
    // });
    // $(".add-more").click(function(){ 
    //       var html = $(".copy").html();
    //       $(".after-add-more").after(html);
    // });
    var formCount = 0;

    $(".add-form").click(function() {
        formCount++;
        var form = `
        <div class="row form-group ">
            <div class="col-sm-4">
                <label for="dateBulan" class="control-label">NIK</label>
                <input type="text" class="form-control" id="" name="nik[]" required> 
            </div>
            <div class="col-sm-4">
                <label for="" class="control-label">Nama</label>
                <input type="text" class="form-control" id="" name="nama[]" required>
            </div>
            <div class="col-sm-4">
                <label for="" class="control-label">Overtime Hour</label>
                <input type="text" class="form-control" id="" name="otweighthour[]" required>
            </div>
        </div>
        `;
        $(this).before(form);
    });
    $(".add-terlambat").click(function() {
        formCount++;
        var form = `
            <div class="row form-group">
                
                <div class="col-sm-8">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="" name="nama[]" required>
                </div>
                <div class="col-sm-4">
                    <label for="" class="control-label">Jumlah</label>
                    <input type="text" class="form-control" id="" name="jumlah[]" required>
                </div>
            </div>
        `;
        $(this).before(form);
    });
    $(".add-dukacita").click(function() {
        formCount++;
        var form = `
            <div class="row form-group">
                <div class="col-sm-4">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="" name="nama[]" required>
                </div>
                <div class="col-sm-8">
                    <label for="" class="control-label">Keterangan</label>
                    <input type="text" class="form-control" id="" name="keterangan[]" required>
                </div>
            </div>
        `;
        $(this).before(form);
    });
    $(".add-kelahiran").click(function() {
        formCount++;
        var form = `
            <div class="row form-group">
                <div class="col-sm-4">
                    <label for="" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="" name="nama[]" required>
                </div>
                <div class="col-sm-8">
                    <label for="" class="control-label">Keterangan</label>
                    <input type="text" class="form-control" id="" name="keterangan[]" required>
                </div>
            </div>
        `;
        $(this).before(form);
    });
    
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
    // $(document).ready(function() {
      
    // });
// alert-dismissable
</script>
@endpush