@extends('layouts.master')

@section('title', 'Data Trainee')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Data Trainee</h6>
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
                <div class="row">
			    <div class="col-sm-12">
                    <!-- Breadcrumb -->
                    <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active"><span>Data Trainee</span></li>
                    </ol>
                    <!-- /Breadcrumb -->
                
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add-trainee" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                </div>
                </div>

                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="traineeTable" class="table table-striped table-hover displayx table-bordered font-11 text-center mt-10" >
                                <thead bgcolor="#8ee8fa">
                                    <tr>
                                        <th rowspan="2" class="text-center">No</th>
                                        <th rowspan="2" class="text-center">Nama Peserta</th>
                                        <th rowspan="2" class="text-center">NIK</th>
                                        <th rowspan="2" class="text-center">Golongan</th>
                                        <th rowspan="2" class="text-center">Cost Center</th>
                                        <th rowspan="2" class="text-center">Judul Training</th>
                                        <th rowspan="2" class="text-center">Bulan</th>
                                        <th rowspan="2" class="text-center">Total Jam</th>
                                        <th rowspan="2" class="text-center">Post Test</th>
                                        <th colspan="8" class="text-center">Evaluasi</th>
                                        <th rowspan="2" class="text-center">Training Komentar</th>
                                        <th colspan="3" class="text-center">Assesment Training</th>
                                        <th rowspan="2" class="text-center">Action</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">1</th>
                                        <th class="text-center">2</th>
                                        <th class="text-center">3</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center">5</th>
                                        <th class="text-center">6</th>
                                        <th class="text-center">7</th>
                                        <th class="text-center">8</th>
                                        <th class="text-center">Before</th>
                                        <th class="text-center">Target</th>
                                        <th class="text-center">Actual</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($trainees as $trainee)
                                
                                
                                <tr>
                                    <td>{{$trainee->idTrainee}}</td>
                                    <td>{{$trainee->txtEmployeeName}}</td>
                                    <td>{{$trainee->txtNik}}</td>
                                    <td>{{$trainee->golongan}}</td>
                                    <td>{{$trainee->cost_center}}</td>
                                    <td>{{$trainee->txtTrainingName}}</td>
                                    <td>{{date('F Y', strtotime($trainee->dateTanggalMulai))}}</td>
                                    <td>{{date('h:i', strtotime($trainee->timeDurationTotal))}}</td>
                                    <td>{{$trainee->post_test}}</td>
                                    <td>{{$trainee->evaluasi_1}}</td>
                                    <td>{{$trainee->evaluasi_2}}</td>
                                    <td>{{$trainee->evaluasi_3}}</td>
                                    <td>{{$trainee->evaluasi_4}}</td>
                                    <td>{{$trainee->evaluasi_5}}</td>
                                    <td>{{$trainee->evaluasi_6}}</td>
                                    <td>{{$trainee->evaluasi_7}}</td>
                                    <td>{{$trainee->evaluasi_8}}</td>
                                    <td>{{$trainee->komentar}}</td>
                                    <td>{{$trainee->assesment_before}}</td>
                                    <td>{{$trainee->assesment_target}}</td>
                                    <td>{{$trainee->assesment_actual}}</td>
                                    <td>
                                        <form action="{{route('trainee.delete',$trainee->idTrainee)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$trainee->idTrainee}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
            </div>
        </div>	
</div>
<!-- modal add trainee -->
<div class="modal fade" id="add-trainee" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('trainee.post') }}" method="POST">
                @csrf 
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="dateTanggal" class="control-label mb-5">NIK</label>
                            <input type="text" class="form-control" name="user_id">
                        </div>
                        <div class="col-sm-6">
                            <label for="dateTanggal" class="control-label mb-5">Nama Training</label>
                            <select name="training_id" id="training_id" class="form-control">
                            <option disable selected>--Pilih Judul Training--</option>
                            @foreach($training_realizations as $realisasi)
                            <option value="{{ $realisasi->id }}">{{ $realisasi->txtTrainingName}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Form Evaluasi</h8>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_1" placeholder="1">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_2" placeholder="2">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_3" placeholder="3">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_4" placeholder="4">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_5" placeholder="5">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_6" placeholder="6">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_7" placeholder="7">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_8" placeholder="8">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Training Komentar</label>
                        <input type="text" class="form-control" name="komentar">
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Nilai Post Test</label>
                        <input type="text" class="form-control" name="post_test">
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Assesment Training</h8>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Before</label>
                            <input type="text" class="form-control" name="assesment_before">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Target</label>
                            <input type="text" class="form-control" name="assesment_target">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Actual</label>
                            <input type="text" class="form-control" name="assesment_actual">
                        </div>
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
<!-- end add modal -->
<!-- update modal -->
@foreach($trainees as $trainee)
    <div class="modal fade" id="update{{$trainee->idTrainee}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Trainee</h5>
                </div>
                <div class="modal-body">
                <form action="/training/trainee/{{$trainee->idTrainee}}" method="POST">
                @csrf 
                @method('put')
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="dateTanggal" class="control-label mb-5">NIK</label>
                            <input type="text" class="form-control" name="user_id" value="{{$trainee->user_id}}">
                        </div>
                        <div class="col-sm-6">
                            <label for="dateTanggal" class="control-label mb-5">Nama Training</label>
                            <select name="training_id" id="training_id" class="form-control">
                            <option value="{{$trainee->training_id}}">{{$trainee->txtTrainingName}}</option>
                            @foreach($training_realizations as $realisasi)
                            <option value="{{ $realisasi->id }}">{{ $realisasi->txtTrainingName}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Form Evaluasi</h8>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_1" placeholder="1" value="{{$trainee->evaluasi_1}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_2" placeholder="2" value="{{$trainee->evaluasi_2}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_3" placeholder="3" value="{{$trainee->evaluasi_3}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_4" placeholder="4" value="{{$trainee->evaluasi_5}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_5" placeholder="5" value="{{$trainee->evaluasi_5}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_6" placeholder="6" value="{{$trainee->evaluasi_6}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_7" placeholder="7" value="{{$trainee->evaluasi_7}}">
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="evaluasi_8" placeholder="8" value="{{$trainee->evaluasi_8}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Training Komentar</label>
                        <input type="text" class="form-control" name="komentar" value="{{$trainee->komentar}}">
                    </div>
                    <div class="form-group">
                        <label for="dateTanggal" class="control-label mb-5">Nilai Post Test</label>
                        <input type="text" class="form-control" name="post_test" value="{{$trainee->post_test}}">
                    </div>
                    <h8 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Assesment Training</h8>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Before</label>
                            <input type="text" class="form-control" name="assesment_before" value="{{$trainee->assesment_before}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Target</label>
                            <input type="text" class="form-control" name="assesment_target" value="{{$trainee->assesment_target}}">
                        </div>
                        <div class="col-sm-4">
                            <label for="dateTanggal" class="control-label mb-5">Actual</label>
                            <input type="text" class="form-control" name="assesment_actual" value="{{$trainee->assesment_actual}}">
                        </div>
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
@endforeach
<!-- end update modal -->
@endsection
@push('script')
<script type="text/javascript">
$('#traineeTable').dataTable( {
    paging: true,
    searching: true
} );
</script>
@endpush
             