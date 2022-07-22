@extends('layouts.master')

@section('title', 'Management User')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Management User</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <button class="btn btn-sm btn-primary btn-lable-wrap left-label"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add User</span></button>
                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user" data-whatever="@mdo">Add User</button> --}}
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tbl_user" class="table table-hover display pb-30">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Active</th>
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
        <!-- /Row -->
        
        <div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="add-userLabel1">New message</h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="txtfullname" class="control-label mb-10">Name</label>
                                <input type="text" class="form-control" id="txtfullname" name="txtfullname">
                            </div>
                            <div class="form-group">
                                <label for="txtusername" class="control-label mb-10">Username</label>
                                <input type="text" class="form-control" id="txtusername" name="txtusername">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label mb-10">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="bitActive" class="control-label mb-10">Active</label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </div>
@endsection


@push('script')
<script type="text/javascript">
                var dtJson = $('#tbl_user').DataTable({
                    
                    autoWidth: false,
                    serverSide: true,
                    processing: true,
                    // aSorting: [
                    //     [0, "desc"]
                    // ],
                    searching: true,
                    displayLength: 10,
                    lengthMenu: [10, 25, 50, 100],
                    language: {
                        paginate: {
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    },
                    columns: [
                        {
                            data: 'DT_RowIndex', name: 'DT_RowIndex'
                        },
                        {
                            data: 'txtfullname'
                        },
                        {
                            data: 'txtusername'
                        },
                        {
                            data: 'password'
                        },
                        {
                            data: 'bitActive'
                        },
                        {
                            data: 'action'
                        }
                    ],
                });
        
</script>


@endpush