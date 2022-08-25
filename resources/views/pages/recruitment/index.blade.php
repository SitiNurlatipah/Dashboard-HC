@extends('layouts.master')

@section('title', 'Recruitment')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Recruitment Progress</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    {{-- <button class="btn btn-primary btn-lable-wrap left-label"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Locater</span></button> --}}
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tbl_locater" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Locater</th>
                                        <th>Locater Name</th>
                                        <th>Active</th>
                                        <th>Insert By</th>
                                        <th>Update By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
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

@endsection


