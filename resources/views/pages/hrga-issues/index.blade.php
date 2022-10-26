@extends('layouts.master')

@section('title', 'HRGA issues')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">HRGA Issues</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
            <div class="col card-header text-right mt-5">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#add" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
            </div>  
            <div class="panel-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="coba" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                               
                                <th class="text-center">Nama Kegiatan</th>
                                <th class="text-center">Tempat</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Action</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hrga_issues as $i)
                            <tr>
                                
                                <td>{{ $i->namaKegiatan }}</td>
                                <td>{{ $i->tempat }}</td>
                                <td>{{ $i->tanggal }}</td>
                                <td>
                                <a href="#" class="btn btn-default btn-icon-anim btn-square btn-sm" data-toggle="modal" data-target="#editModal{{$i->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                <button href="#" class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                </td>
                            </tr>
                                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="coba" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                            <thead>
                            <tr>
                               
                                
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Action</th>    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rata as $i)
                            <tr>
                                
                                <td>{{ $i->training_id }}</td>
                                <td>{{ number_format($i->rata2,0) }}</td>
                                
                            </tr>
                                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label mb-5">Multiple select boxes</label>
                        <select class="selectpicker" multiple data-style="form-control btn-default btn-outline" data-live-search="true" name="user_id[]">
                        <option value="">a</option>
                        <option value="">c</option>
                        <option value="">d</option>
                        <option value="">b</option>
                        </select>
                            {{-- <select class="selectpicker form-control" multiple data-style="form-control btn-default btn-outline" data-live-search="true" name="user_id[]" id="user_id[]">
                                @foreach($users as $user)
                                <option value="{{$user->txtNik}}">{{$user->txtEmployeeName}}</option>
                                @endforeach
                            </select> --}}
                            
                            
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- modal add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form id="addForm">      
            <div class="modal-body">
            
            @csrf
                <div class="form-group">
                    <label for="namaKegiatan" class="control-label mb-10">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan" required>
                </div>
                <div class="form-group">
                    <label for="tempat" class="control-label mb-10">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" required>
                </div>
                <div class="form-group">
                    <label for="tanggal" class="control-label mb-10">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
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
<!-- end modal add -->
<!-- Modal edit -->
@foreach($hrga_issues as $i)
<div class="modal fade" id="editModal{{$i->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form id="editForm">      
            <div class="modal-body">
            @csrf
            @method('put')
            <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="namaKegiatan" class="control-label mb-10">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan" value="{{$i->namaKegiatan}}" required>
                </div>
                <div class="form-group">
                    <label for="tempat" class="control-label mb-10">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{$i->tempat}}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal" class="control-label mb-10">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$i->tanggal}}" required>
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
@endforeach
<!-- end modal edit -->
@endsection
@push('script')
<script>
$('.selectpicker').selectpicker();

    $(document).ready(function(){
        $('#namaKegiatan').on('change',function(e){
            var namaKegiatan=$('#namaKegiatan').val();
            var tempat=$('#tempat').val();
            var tanggal=$('#tanggal').val();
            // console.log(namaKegiatan,tempat,tanggal);
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{route('hrga.post')}}",
                data: {
                    namaKegiatan:namaKegiatan,
                    tempat:tempat,
                    tanggal:tanggal
                }
                success:function(response){
                    console.log(response)
                    $('#add').modal('hide')
                    alert("Data Saved");
                    // location.reload();
                },
                error: function(error){
                    console.log(error)
                    alert("Data Not Saved");
                }
            });
        });
        $('#editForm').on('submit',function(e){
            e.preventDefault();
            var id=$('#id').val();
            $.ajax({
                type: "PUT",
                url: "/hrga/"+id,
                data: $('#editForm').serialize(),
                success:function(response){
                    console.log(response)
                    $('#editModal{{$i->id}}').modal('hide')
                    alert("Data Updated");
                    location.reload();
                },
                error: function(error){
                    console.log(error)
                    alert("Data Not Saved");
                }
            });
        });
    });
    
</script>


@endpush