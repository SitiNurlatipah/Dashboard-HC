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
                    </div>
                    <div class="panel-wrapper collapse in">
                    <div class="panel-body">
									<div  class="tab-struct custom-tab-2 mt-5">
										<ul role="tablist" class="nav nav-tabs" id="myTabs_15">
											<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">ALL</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">GETO</a></li>
											<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">TO</a></li>
											
										</ul>
                                        
            
                    
                    <div class="tab-content" id="myTabContent_15">
							<div  id="home_15" class="tab-pane fade active in" role="tabpanel">
								<form class="form-inline mb-30 mt-30">
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                
                                    <input type='date' class="form-control" />
                                    <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                    <input type='date' class="form-control" />
                                    
                                </form>
                                </form>
                                <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="tbl_user" class="table table-hover display pb-30 text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Permanen</th>
                                                <th class="text-center">Outsource</th>
                                                <th class="text-center">Contract</th>
                                                <th class="text-center">Total P+C</th>
                                                <th class="text-center">Total P+O+C</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            </div>
                            <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                            <form class="form-inline mb-30 mt-30">
                            <label class="control-label mr-10 text-left">Dari tanggal</label>
                                
                                <input type='date' class="form-control" />
                                <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                <input type='date' class="form-control" />
                                
                            </form>
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
                                                <th>No</th>
                                                <th>Permanen</th>
                                                <th>Outsource</th>
                                                <th>Contract</th>
                                                <th>Total</th>
                                                <th>%Permanen</th>
                                                <th>%Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

							</div>
                            <div  id="profile_16" class="tab-pane fade" role="tabpanel">
                            <form class="form-inline mb-30 mt-30">
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                
                                    <input type='date' class="form-control" />
                                    <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                    <input type='date' class="form-control" />
                                    
                                </form>
                            <div class="table-wrap">
                            <div class="table-responsive">
                            <table id="tbl_user" class="table table-hover display pb-30">
                            <thead>
                            <tr>
                                <th colspan="6" class="text-center">Jumlah</th>
                                <th colspan="3" class="text-center">Presentase</th>
                            </tr>
                            <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Permanen</th>
                                    <th class="text-center">Outsource</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">PKWTT+PKWT</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">%Permanen</th>
                                    <th class="text-center">%Contract</th>
                                    <th class="text-center">%Total</th>
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

@endpush