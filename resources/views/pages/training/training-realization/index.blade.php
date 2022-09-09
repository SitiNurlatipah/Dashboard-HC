@extends('layouts.master')

@section('title', 'Training Realization')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Training Realization</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
            @endif
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-realisasi" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data</span></button>

                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="realizationTable" class="table table-hover display  pb-30 text-center" >
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">No</th>
                                        <th rowspan="2" class="text-center">Online/Ofline</th>
                                        <th rowspan="2" class="text-center">Media</th>
                                        <th rowspan="2" class="text-center">Training Name</th>
                                        <th rowspan="2" class="text-center">Trainee</th>
                                        <th rowspan="2" class="text-center">Form Usulan</th>
                                        <th rowspan="2" class="text-center">Implementation Date</th>
                                        <th rowspan="2" class="text-center">Training Type</th>
                                        <th rowspan="2" class="text-center">Status</th>
                                        <th rowspan="2" class="text-center">Total Participants</th>
                                        <th rowspan="2" class="text-center">Training cost</th>
                                        <th colspan="3" class="text-center">Duration</th>
                                        <th rowspan="2" class="text-center">Sum Of Session</th>
                                        <th rowspan="2" class="text-center">Training Hour</th>
                                        <th rowspan="2" class="text-center">Trainer/Facilitator</th>
                                        <th rowspan="2" class="text-center">Reason</th>
                                        <th rowspan="2" class="text-center">Action</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Start</th>
                                        <th class="text-center">End</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <?php
                                $i=1; foreach($training_realizations as $realisasi): ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$realisasi->txtPelaksanaan}}</td>
                                        <td>{{$realisasi->txtMedia}}</td>
                                        <td>{{$realisasi->txtTrainingName}}</td>
                                        <td>{{$realisasi->txtTrainee}}</td>
                                        <td>{{$realisasi->txtFormUsulan}}</td>
                                        <td>{{$realisasi->dateTanggal}}</td>
                                        <td>{{$realisasi->txtTrainingType}}</td>
                                        <td>{{$realisasi->txtStatus}}</td>
                                        <td>{{$realisasi->intTotalParticipant}}</td>
                                        <td>Rp{{number_format($realisasi->intTotalCost,0,',','.')}}</td>
                                        <td>{{$realisasi->timeDurationStart}}</td>
                                        <td>{{$realisasi->timeDurationEnd}}</td>
                                        <td>{{$realisasi->timeDurationTotal}}</td>
                                        <td>{{$realisasi->intSumOfSession}}</td>
                                        <td>{{$realisasi->timeTrainingHour}}</td>
                                        <td>{{$realisasi->txtTrainer}}</td>
                                        <td>{{$realisasi->txtReason}}</td>
                                        <td>
                                        <form action="{{route('realization.delete',$realisasi->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$realisasi->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
            </div>
        </div>	
    </div>
</div>

<div class="modal fade" id="add-realisasi" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('realization.post') }}" method="POST">
                @csrf 
                        
                        <div class="form-group">
                            <label for="txtPelaksanaan" class="control-label mb-10">Online/Offline</label>
                            <select name="txtPelaksanaan" class="form-control">
                            <option value="">--Pilih Pelaksanaan Training--</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                            <option value="Blended">Blended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtMedia" class="control-label mb-10">Media</label>
                            <input type="text" class="form-control" name="txtMedia">
                        </div>
                        <div class="form-group">
                            <label for="intTrainingName" class="control-label mb-10">Nama Training</label>
                            <input type="text" class="form-control" name="txtTrainingName">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainee" class="control-label mb-10">Trainee</label>
                            <input type="text" class="form-control" name="txtTrainee">
                        </div>
                        <div class="form-group">
                            <label for="txtFormUsulan" class="control-label mb-10">Form Usulan</label>
                            <input type="text" class="form-control"  name="txtFormUsulan">
                        </div>
                        <div class="form-group">
                            <label for="dateTanggal" class="control-label mb-10">Tanggal Implementasi</label>
                            <input type="date" class="form-control" name="dateTanggal">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainingType" class="control-label mb-10">Tipe</label>
                            <select name="txtTrainingType" class="form-control">
                            <option value="">--Pilih Tipe Training--</option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                            <option value="In House">In House</option>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="txtStatus" class="control-label mb-10">Status</label>
                            <select name="txtStatus" class="form-control">
                            <option value="">--Pilih Status--</option>
                            <option value="Sesuai RPT">Sesuai RPT</option>
                            <option value="Tidak Sesuai RPT">Tidak Sesuai RPT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="intTotalParticipants" class="control-label mb-10">Totap Participants</label>
                            <input type="number" class="form-control" name="intTotalParticipant">
                        </div>
                        <div class="form-group">
                            <label for="intTotalCost" class="control-label mb-10">Total Cost</label>
                            <input type="number" class="form-control" name="intTotalCost">
                        </div>
                        <div class="form-group">
                            <label for="timeDurationStart" class="control-label mb-10">Jam Mulai</label>
                            <input type="time" class="form-control" name="timeDurationStart">
                        </div>
                        <div class="form-group">
                            <label for="timeDurationEnd" class="control-label mb-10">Jam Selesai</label>
                            <input type="time" class="form-control" name="timeDurationEnd">
                        </div>
                        <div class="form-group">
                            <label for="timeDurationTotal" class="control-label mb-10">Total Jam</label>
                            <input type="time" class="form-control" name="timeDurationTotal">
                        </div>
                        <div class="form-group">
                            <label for="intSumOfSession" class="control-label mb-10">Sum Of Session</label>
                            <input type="text" class="form-control" name="intSumOfSession">
                        </div>
                        <div class="form-group">
                            <label for="timeTrainingHour" class="control-label mb-10">Training Hour</label>
                            <input type="time" class="form-control"  name="timeTrainingHour">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainer" class="control-label mb-10">Trainer</label>
                            <input type="text" class="form-control"  name="txtTrainer">
                        </div>
                        <div class="form-group">
                            <label for="txtReason" class="control-label mb-10">Reason</label>
                            <input type="text" class="form-control"  name="txtReason">
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                </form>
            </div>       
        </div>
    </div>
    </div>
<!-- end add data -->
@foreach($training_realizations as $realisasi)
    <div class="modal fade" id="update{{$realisasi->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
                </div>
                <div class="modal-body">
                <form action="/realization/{{$realisasi->id}}" method="POST">
                @csrf 
                @method('put')
                        <div class="form-group">
                            <label for="txtPelaksanaan" class="control-label mb-10">Online/Offline</label>
                            <select name="txtPelaksanaan" class="form-control">
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                            <option value="Blended">Blended</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtMedia" class="control-label mb-10">Media</label>
                            <input type="text" class="form-control" name="txtMedia" value="{{$realisasi->txtMedia}}">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainingName" class="control-label mb-10">Nama Training</label>
                            <input type="text" class="form-control" name="txtTrainingName" value="{{$realisasi->txtTrainingName}}">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainee" class="control-label mb-10">Trainee</label>
                            <input type="text" class="form-control" name="txtTrainee" value="{{$realisasi->txtTrainee}}">
                        </div>
                        <div class="form-group">
                            <label for="txtFormUsulan" class="control-label mb-10">Form Usulan</label>
                            <input type="text" class="form-control"  name="txtFormUsulan" value="{{$realisasi->txtFormUsulan}}">
                        </div>
                        <div class="form-group">
                            <label for="dateTanggal" class="control-label mb-10">Tanggal Implementasi</label>
                            <input type="date" class="form-control" name="dateTanggal" value="{{$realisasi->dateTanggal}}">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainingType" class="control-label mb-10">Tipe</label>
                            <select name="txtTrainingType" class="form-control">
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                            <option value="In House">In House</option>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="txtStatus" class="control-label mb-10">Status</label>
                            <select name="txtStatus" class="form-control">
                            <option value="Sesuai RPT">Sesuai RPT</option>
                            <option value="Tidak Sesuai RPT">Tidak Sesuai RPT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="intTotalParticipants" class="control-label mb-10">Totap Participants</label>
                            <input type="number" class="form-control" name="intTotalParticipant" value="{{$realisasi->intTotalParticipant}}">
                        </div>
                        <div class="form-group">
                            <label for="intTotalCost" class="control-label mb-10">Total Cost</label>
                            <input type="number" class="form-control" name="intTotalCost" value="{{$realisasi->intTotalCost}}">
                        </div>
                        <div class="form-group">
                            <label for="timeDurationStart" class="control-label mb-10">Jam Mulai</label>
                            <input type="time" class="form-control" name="timeDurationStart" value="{{$realisasi->timeDurationStart}}">
                        </div>
                        <div class="form-group">
                            <label for="timeDurationEnd" class="control-label mb-10">Jam Selesai</label>
                            <input type="time" class="form-control" name="timeDurationEnd" value="{{$realisasi->timeDurationEnd}}">
                        </div>
                        <div class="form-group">
                            <label for="timeDurationTotal" class="control-label mb-10">Total Jam</label>
                            <input type="time" class="form-control" name="timeDurationTotal" value="{{$realisasi->timeDurationTotal}}">
                        </div>
                        <div class="form-group">
                            <label for="intSumOfSession" class="control-label mb-10">Sum Of Session</label>
                            <input type="number" class="form-control" name="intSumOfSession" value="{{$realisasi->intSumOfSession}}">
                        </div>
                        <div class="form-group">
                            <label for="timeTrainingHour" class="control-label mb-10">Training Hour</label>
                            <input type="time" class="form-control"  name="timeTrainingHour" value="{{$realisasi->timeTrainingHour}}">
                        </div>
                        <div class="form-group">
                            <label for="txtTrainer" class="control-label mb-10">Trainer</label>
                            <input type="text" class="form-control"  name="txtTrainer" value="{{$realisasi->txtTrainer}}">
                        </div>
                        <div class="form-group">
                            <label for="txtReason" class="control-label mb-10">Reason</label>
                            <input type="text" class="form-control"  name="txtReason" value="{{$realisasi->txtReason}}">
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
$('#realizationTable').dataTable( {
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
</script>
@endpush