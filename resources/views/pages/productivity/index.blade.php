@extends('layouts.master')

@section('title', 'Productivity')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Data Trend Total Employee</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <div  class="tab-struct custom-tab-1 mt-0">
                        <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Productivity</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Human Cost</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">Growth All</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_17" role="tab" href="#profile_17" aria-expanded="false">Grafik</a></li>
                            
                        </ul>
            @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
            @endif
           
            <div class="tab-content" id="myTabContent_7">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
            <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-productivity" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data Total Employee</span></button>
            <form action="" method="POST" class="form-inline mb-30 mt-30">
                    @csrf
                            <div class="form-group row">  
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                <input type='date' class="form-control" name="startDate">
                                <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                <input type='date' class="form-control" name="endDate">
                                <button type="submit" class="btn btn-primary pa-5 btn-sm" value="Submit"><i class="zmdi zmdi-search"></i></button>
                                <a class="btn btn-primary pa-5 btn-sm" href=""><i class="fa fa-undo"></i></a>
                            </div>
                        
            </form>    
            <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="power" class="table table-hover display  pb-30 text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Man Power(Permanent)</th>
                                    <th class="text-center">Man Power(Contract)</th>
                                    <th class="text-center">Man Power Total</th>
                                    <th class="text-center">Output Plan(Tonnage)</th>
                                    <th class="text-center">Output Actual(Tonnage)</th>
                                    <th class="text-center">Output Actual(Kg)</th>
                                    <th class="text-center">Productivity Permanen(Kg/Man)</th>
                                    <th class="text-center">Productivity Permanen & Contract(Kg/Man)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; 
                            foreach($productivity_manpowers as $productivity): 
                            $productivityKg=($productivity->intOutputActual*1000);
                            $productivityPermanen=(($productivity->intOutputActual/$productivity->intPermanen)*1000);
                            $productivityTotal=(($productivity->intOutputActual/$productivity->intTotal)*1000);
                            ?>
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $productivity->dateBulan->format ('F Y')}}</td>
                                <td>{{ $productivity->intPermanen }}</td>
                                <td>{{ $productivity->intContract }}</td>
                                <td>{{ $productivity->intTotal }}</td>
                                <td>{{ $productivity->intOutputPlan }}</td>
                                <td>{{ $productivity->intOutputActual }}</td>
                                <td>{{ number_format($productivityKg,0) }}</td>
                                <td>{{ number_format($productivityPermanen,0) }}</td>
                                <td>{{ number_format($productivityTotal,0) }}</td>
                                <td>
                                <form action="{{route('productivity.delete',$productivity->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateManpower{{$productivity->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                @csrf 
                                @method("delete")
                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
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
            <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-humancost" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data Total Employee</span></button>
            <form action="" method="POST" class="form-inline mb-30 mt-30">
                    @csrf
                            <div class="form-group row">  
                                <label class="control-label mr-10 text-left">Dari tanggal</label>
                                <input type='date' class="form-control" name="startDate">
                                <label class="control-label mr-10 text-left">Sampai tanggal</label>
                                <input type='date' class="form-control" name="endDate">
                                <button type="submit" class="btn btn-primary pa-5 btn-sm" value="Submit"><i class="zmdi zmdi-search"></i></button>
                                <a class="btn btn-primary pa-5 btn-sm" href=""><i class="fa fa-undo"></i></a>
                            </div>
                        
            </form>    
            <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="cost" class="table table-hover display  pb-30 text-center" >
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Human Cost - Plan</th>
                                    <th class="text-center">Human Cost - Actual</th>
                                    <th class="text-center">Human Cost - Actual in Million</th>
                                    <th class="text-center">Output Plan (Tonnage)</th>
                                    <th class="text-center">Output Actual(Tonnage)</th>
                                    <th class="text-center">Productivity - Plan</th>
                                    <th class="text-center">Productivity - Actual</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1; $j=0;
                            foreach($productivity_humancosts as $humancost): 
                            $costMilion=($humancost->intCostActual/1000000);
                            $productivityPlan=$humancost->intCostPlan/($humancost->intOutputPlan*1000);
                            $productivityActual=$humancost->intCostActual/($humancost->intOutputActual*1000);
                            
                            ?>
                            

                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $humancost->dateBulan->format ('F Y')}}</td>
                                <td>Rp{{ number_format($humancost->intCostPlan,0,',','.') }}</td>
                                <td>Rp{{ number_format($humancost->intCostActual,0,',','.') }}</td>
                                <td>Rp{{ number_format($costMilion,0,',','.') }}M</td>
                                <td>{{ $humancost->intOutputPlan}}</td>
                                <td>{{ $humancost->intOutputActual }}</td>
                                <td>{{ number_format($productivityPlan,0) }}</td>
                                <td>{{ number_format($productivityActual,0) }}</td>
                                <td>
                                <form action="{{route('humancost.delete',$humancost->id)}}" method="POST">
                                @csrf
                                @method('put')
                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updateHumancost{{$humancost->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                @csrf 
                                @method("delete")
                                    <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
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
            <button class="btn btn-primary btn-lable-wrap left-label btn-sm"  data-toggle="modal" data-target="#add-growth" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Data</span></button>        
            <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_3" class="table table-hover display mb-30 text-center" >
                                <thead> 
                                    <tr>
                                        
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Man Power Permanent</th>
                                        <th class="text-center">Man Power Contract</th>
                                        <th class="text-center">Man Power All</th>
                                        <th class="text-center">Growth Man Power</th>
                                        <th class="text-center">Output</th>
                                        <th class="text-center">Growth Output</th>
                                        <th class="text-center">Productivity</th>
                                        <th class="text-center">Growth Productivity</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                
                                foreach($productivity_growths as $growth):
                                    $j=1;
                                    $j++;
                                    // $productivityaAll=(($growth->intOutputActual/$growth->intTotal)*1000);
                                    $growthManpower=($growth->intTotal-$productivity_growths[$j-1]->intTotal)/$productivity_growths[$j-1]->intTotal;
                                    $growthOutput=($growth->intOutputActual-$productivity_growths[$j-1]->intOutputActual)/$productivity_growths[$j-1]->intOutputActual;
                                    // dd($j);
                                    // $growthProductivity=($growth->productivityAll-$productivity_growths[$j-1]->productivityAll)/$productivity_growths[$j-1]->productivityAll;
                                    
                                    
                                
                                    ?>
                                    <tr>
                                        
                                        <td>{{ $growth->dateBulanGrowth->format('F Y') }}</td>
                                        <td>{{ $growth->intPermanen }}</td>
                                        <td>{{ $growth->intContract }}</td>
                                        <td>{{ $growth->intTotal }}</td>
                                        <td>{{number_format($growthManpower*100,2)}}%</td>
                                        <td>{{ $growth->intOutputActual }}</td>
                                        <td>{{$growthOutput}}</td>
                                        <td>{{ $growth->dateBulan }}</td>
                                        <td></td>
                                        <td>
                                        <form action="{{route('growth.delete',$growth->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                        @csrf 
                                        @method("delete")
                                            <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
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
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Productivity Total</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="productChart" class="" style="height:367px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Man Power Total</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="powerChart" class="" style="height:367px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Output Actual</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="outputChart" class="" style="height:367px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Human Cost</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="costChart" class="" style="height:367px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Human Cost Million</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="costMillionChart" class="" style="height:367px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh relative">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">Growth</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <div id="growChart" class="" style="height:367px;"></div>
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
<!-- add data total -->
<div class="modal fade" id="add-productivity" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Productivity Man Power</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('productivity.post') }}" method="POST">
                @csrf 
                        
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal">
                        </div>
                        <div class="form-group">
                            <label for="intPermanen" class="control-label mb-10">Permanen</label>
                            <input type="number" class="form-control" id="intPermanen" name="intPermanen">
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">Contract</label>
                            <input type="number" class="form-control" id="intContract" name="intContract">
                        </div>
                        <div class="form-group">
                            <label for="intOutputPlan" class="control-label mb-10">Output Plan</label>
                            <input type="text" class="form-control" id="intOutputPlan" name="intOutputPlan">
                        </div>
                        <div class="form-group">
                            <label for="intOutputActual" class="control-label mb-10">Output Actual</label>
                            <input type="text" class="form-control" id="intOutputActual" name="intOutputActual">
                        </div>
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Bulan</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan">
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
@foreach($productivity_manpowers as $productivity)
    <div class="modal fade" id="updateManpower{{$productivity->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
                </div>
                <div class="modal-body">
                <form action="/productivity/{{$productivity->id}}" method="POST">
                @csrf 
                @method('put')       
                        <div class="form-group">
                            <label for="intTotal" class="control-label mb-10">Total</label>
                            <input type="number" class="form-control" id="intTotal" name="intTotal" value="{{$productivity->intTotal}}">
                        </div>
                        <div class="form-group">
                            <label for="intPermanen" class="control-label mb-10">Permanen</label>
                            <input type="number" class="form-control" id="intPermanen" name="intPermanen" value="{{$productivity->intPermanen}}">
                        </div>
                        <div class="form-group">
                            <label for="intContract" class="control-label mb-10">Kontrak</label>
                            <input type="number" class="form-control" id="intContract" name="intContract" value="{{$productivity->intContract}}">
                        </div>
                        <div class="form-group">
                            <label for="intJobSupply" class="control-label mb-10">Output Plan</label>
                            <input type="text" class="form-control" id="intOutputPlan" name="intOutputPlan" value="{{$productivity->intOutputPlan}}">
                        </div>
                        <div class="form-group">
                            <label for="intJobSupply" class="control-label mb-10">Output Actual</label>
                            <input type="text" class="form-control" id="intOutputActual" name="intOutputActual" value="{{$productivity->intOutputActual}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Bulan</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$productivity->dateBulan}}">
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
<div class="modal fade" id="add-humancost" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Productivity Man Power</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('humancost.post') }}" method="POST">
                @csrf 
                        
                        <div class="form-group">
                            <label for="intCostPlan" class="control-label mb-10">Cost Plan</label>
                            <input type="text" class="form-control" id="intCostPlan" name="intCostPlan">
                        </div>
                        <div class="form-group">
                            <label for="intCostActual" class="control-label mb-10">Cost Actual</label>
                            <input type="text" class="form-control" id="intCostActual" name="intCostActual">
                        </div>
                        <div class="form-group">
                            <label for="intCostActual" class="control-label mb-10">Output Plan</label>
                            <input type="text" class="form-control" id="intOutputPlan" name="intOutputPlan">
                        </div>
                        <div class="form-group">
                            <label for="intCostActual" class="control-label mb-10">Output Actual</label>
                            <input type="text" class="form-control" id="intOutputActual" name="intOutputActual">
                        </div>
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Bulan</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan">
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
@foreach($productivity_humancosts as $humancost)
    <div class="modal fade" id="updateHumancost{{$humancost->id}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Update Data Productivity</h5>
                </div>
                <div class="modal-body">
                <form action="/productivity/humancost/{{$humancost->id}}" method="POST">
                @csrf 
                @method('put')       
                        <div class="form-group">
                            <label for="intCostPlan" class="control-label mb-10">Human Cost Plan</label>
                            <input type="number" class="form-control" id="intCostPlan" name="intCostPlan" value="{{$humancost->intCostPlan}}">
                        </div>
                        <div class="form-group">
                            <label for="intCostPlan" class="control-label mb-10">Human Cost Actual</label>
                            <input type="number" class="form-control" id="intCostPlan" name="intCostActual" value="{{$humancost->intCostActual}}">
                        </div>
                        <div class="form-group">
                            <label for="intCostPlan" class="control-label mb-10">Output Plan</label>
                            <input type="number" class="form-control" id="intOutputPlan" name="intOutputPlan" value="{{$humancost->intOutputPlan}}">
                        </div>
                        <div class="form-group">
                            <label for="intCostPlan" class="control-label mb-10">Output Actual</label>
                            <input type="number" class="form-control" id="intOutputActual" name="intOutputActual" value="{{$humancost->intOutputActual}}">
                        </div>
                        <div class="form-group">
                            <label for="dateBulan" class="control-label mb-10">Bulan</label>
                            <input type="date" class="form-control" id="dateBulan" name="dateBulan" value="{{$humancost->dateBulan}}">
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

<div class="modal fade" id="add-growth" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Growth Productivity</h5>
            </div>
            <div class="modal-body">
            <form action="{{ route('growth.post') }}" method="POST">
            @csrf 
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="dateBulanGrowth" name="dateBulanGrowth">
                    </div>
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Id Manpower</label>
                        <input type="number" class="form-control" id="manpower_id" name="manpower_id">
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
@endsection
@push('script')
<script type="text/javascript">
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
    var productivity =  <?php echo json_encode($productiv) ?>;
    var bulan =  <?php echo json_encode($bulan) ?>;
    var bulanCost =  <?php echo json_encode($bulanCost) ?>;
    var manpower =  <?php echo json_encode($manpower) ?>;
    var costActual =  <?php echo json_encode($costActual) ?>;
    var actual =  <?php echo json_encode($actual) ?>;
    var costProduct =  <?php echo json_encode($costProduct) ?>;
    var coba =  <?php echo json_encode($coba) ?>;
    // first.addEventListener('click', () => {  
    Highcharts.chart('productChart', {
        title: {
            text: 'Productivity (Kg/Man)'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Kilogram'
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
            name: 'productivity',
            data: productivity

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
    Highcharts.chart('powerChart', {
        title: {
            text: 'Man Power'
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
            name: 'Permanen & Contract',
            data: manpower

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
    Highcharts.chart('outputChart', {
        title: {
            text: 'Output (Kg)'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Kilogram'
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
            name: 'Output actual',
            data: actual

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
    
    // });
    // humancost.addEventListener('click', () => {  
    Highcharts.chart('costChart', {
        title: {
            text: 'Human Cost Productivity (Kg/Man)'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanCost
        },
        yAxis: {
            title: {
                text: 'Kilogram'
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
            name: 'Cos Product',
            data: costProduct

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
    Highcharts.chart('costMillionChart', {
        title: {
            text: 'Human Cost Actual (Million)'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulanCost
        },
        yAxis: {
            title: {
                text: 'Million'
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
            name: 'Cos Actual',
            data: costActual

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
    
    
    Highcharts.chart('growChart', {
        title: {
            text: 'Nyobain'
        },
        subtitle: {
            text: 'PT. Kalbe Morinaga Indonesia'
        },
         xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Kilogram'
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
            name: 'output',
            data: coba

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

    // });
    
    $('#power').dataTable( {
    paging: true,
    searching: true
    } );
    $('#cost').dataTable( {
        paging: true
    } );
    $('#datable_3').dataTable( {
        paging: true
    } );
</script>
@endpush