@extends('layouts.master')

@section('title', 'KCH | HRGA')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">HRGA KCH</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div  class="tab-struct vertical-tab custom-tab-1 mt-0">
						<ul role="tablist" class="nav nav-tabs ver-nav-tab" id="myTabs_8">
                            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Value Inventory 1</a></li>
                            <!-- <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Value Inventory 2</a></li> -->
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">Jumlah Item Code</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_17" role="tab" href="#profile_17" aria-expanded="false">Top 10</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_18" role="tab" href="#profile_18" aria-expanded="false">Receipt & Issued</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_19" role="tab" href="#fsn" aria-expanded="false">FSN</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_20" role="tab" href="#topri" aria-expanded="false">Top Receipt Issued</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_20" role="tab" href="#depart" aria-expanded="false">Issued Department</a></li>
                            <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_20" role="tab" href="#costcenter" aria-expanded="false">Issued Cost Center</a></li>
                            
                        </ul>
            
            <div class="tab-content" id="myTabContent_7">
                <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#addinventory" data-whatever="@mdo"><span class="btn-text">Add Data</span></button>
                            <button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#addtarget" data-whatever="@mdo"><span class="btn-text">Set Target</span></button>
                        </div>
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Value KCh Inventory</th>
                                        <th class="text-center">Target Reduce 5%</th>
                                        <th class="text-center">Presentase</th>
                                        <th class="text-center">Value Saving Cost</th>
                                        <th class="text-center">Target Saving</th>
                                        <th class="text-center">Presentase</th>
                                        <th class="text-center">M to M</th>
                                        <th class="text-center">AVG Inventory</th>
                                        <th class="text-center">AVG Saving Cost</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($kch_inventory as $key => $inventory)
                                <?php
                                $persen=($inventory->kchvalue_inventory-$inventory->kchtargetsaving)/$inventory->kchtargetsaving;
                                $saving=($inventory->kchvalue_inventory-$inventory->kchtargetsaving);
                                $persensaving=($inventory->kchvaluetargetsaving-$saving)/$inventory->kchvaluetargetsaving;
                                $j = $key == 0 ? 0 :$key-1;
                                $mtom=($inventory->kchvalue_inventory-$kch_inventory[$j]->kchvalue_inventory)/$kch_inventory[$j]->kchvalue_inventory;
                                $total = $inventory->sum('kchvalue_inventory');
                                $count = $inventory->count();
                                $tsaving = ($inventory->kchtargetsaving)*$count;
                                $avginventory = $total / $count;
                                $avgsaving = ($total-$tsaving)/$count;
                                // $c+=$saving;
                                // $avgsaving = $totalsaving / $count;
                                // dd($tsaving);
                                ?>
                                
                                    <tr>
                                        <td>{{date('F Y', strtotime($inventory->bulan))}}</td>
                                        <td>Rp{{number_format($inventory->kchvalue_inventory,2,',','.')}}</td>
                                        <td>Rp{{number_format($inventory->kchtargetsaving,2,',','.')}}</td>
                                        <td>{{number_format($persen*100,0)}}%</td>
                                        <td>Rp{{number_format($saving,2,',','.')}}</td>
                                        <td>Rp{{number_format($inventory->kchvaluetargetsaving,2,',','.')}}</td>
                                        <td>{{number_format($persensaving*100,0)}}%</td>
                                        <td>{{number_format($mtom*100,0)}}%</td>
                                        <td>Rp{{number_format($avginventory,2,',','.')}}</td>
                                        <td>Rp{{number_format($avgsaving,2,',','.')}}</td>
                                        <td>
                                            <form action="{{route('kchinventory.delete',$inventory->idkchinventory)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#editinventory{{$inventory->idkchinventory}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                {{--<div  id="profile_15" class="tab-pane fade" role="tabpanel">

                </div>--}}
                <div  id="profile_16" class="tab-pane fade" role="tabpanel">
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addcode" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                        <div class="pull-right mr-10">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                        
                    </div>
                    
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">Jumlah Item Code</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kch_code as $code)
                                    <tr>
                                        <td>{{date('F Y', strtotime($code->bulan))}}</td>
                                        <td>{{$code->jmlitemcode}}</td>
                                        <td>
                                            <form action="{{route('kchcode.delete',$code->idkchjmlcode)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#editcode{{$code->idkchjmlcode}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="profile_17" class="tab-pane fade" role="tabpanel">
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addtopten" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="mppTable" class="table table-striped table-hover font-11 table-bordered display mb-30 text-center" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Item Code</th>
                                        <th class="text-center">Item Description</th>
                                        <th class="text-center">On Hand</th>
                                        <th class="text-center">Primary Uom</th>
                                        <th class="text-center">Item Cost</th>
                                        <th class="text-center">Total Cost</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($kch_topten as $topten)
                                <?php
                                $total=$topten->onhand*$topten->itemcost;
                                ?>
                                    <tr>
                                        <td>{{date('F Y', strtotime($topten->bulan))}}</td>
                                        <td>{{$topten->kchitem}}</td>
                                        <td>{{$topten->itemdescription}}</td>
                                        <td>{{$topten->onhand}}</td>
                                        <td>{{$topten->uom}}</td>
                                        <td>Rp{{number_format($topten->itemcost,2,',','.')}}</td>
                                        <td>Rp{{number_format($total,2,',','.')}}</td>
                                        <td>
                                            <form action="{{route('kchtopten.delete',$topten->idkchtopten)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#edittopten{{$topten->idkchtopten}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="profile_18" class="tab-pane fade" role="tabpanel">
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addreceipt" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Periode</th>
                                        <th class="text-center">PO Receipt</th>
                                        <th class="text-center">Usage</th>
                                        <th class="text-center">Total Item Po Receipt</th>
                                        <th class="text-center">Total Item Usage</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($kch_receipt as $receipt)
                                    <tr>
                                        <td>{{date('F Y', strtotime($receipt->bulan))}}</td>
                                        <td>Rp{{number_format($receipt->po_receipt,2,',','.')}}</td>
                                        <td>Rp{{number_format($receipt->usage,2,',','.')}}</td>
                                        <td>{{$receipt->itemreceipt}}</td>
                                        <td>{{$receipt->itemusage}}</td>
                                        
                                        <td>
                                            <form action="{{route('kchreceipt.delete',$receipt->idkchreceiptissue)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#editreceipt{{$receipt->idkchreceiptissue}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="fsn" class="tab-pane fade" role="tabpanel">
                    <!-- <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addfsn" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button> -->
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addfsn" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                            <thead>
                                    <tr>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Fast Moving</th>
                                        <th class="text-center">Slow Moving</th>
                                        <th class="text-center">Non Moving</th>
                                        <th class="text-center">Dead Stock</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($kch_fsn as $fsn)
                                <?php
                                $total=$fsn->fastmoving+$fsn->slowmoving+$fsn->nonmoving+$fsn->deadstock;
                                ?>
                                    <tr>
                                    <td>{{date('F Y', strtotime($fsn->bulan))}}</td>
                                    <td>{{$fsn->fastmoving}}</td>
                                    <td>{{$fsn->slowmoving}}</td>
                                    <td>{{$fsn->nonmoving}}</td>
                                    <td>{{$fsn->deadstock}}</td>
                                    <td>{{$total}}</td>
                                    
                                    <td>
                                        <form action="{{route('kchfsn.delete',$fsn->idkchfsn)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#editfsn{{$fsn->idkchfsn}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="topri" class="tab-pane fade" role="tabpanel">
                    <div class="row">
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="col-sm-6">
                        <h5 class="text-center">Top Receipt</h5>
                        <p>
                        <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addtopreceipt" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">PO Receipt</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kch_toptenreceipt as $toptenreceipt)
                                        <tr>
                                            <td>{{date('F Y', strtotime($toptenreceipt->bulan))}}</td>
                                            <td>{{$toptenreceipt->description}}</td>
                                            <td>Rp{{number_format($toptenreceipt->costreceipt,2,',','.')}}</td>
                                            <td>
                                                <form action="{{route('kchtopreceipt.delete',$toptenreceipt->idkchtoptenreceipt)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#edittopreceipt{{$toptenreceipt->idkchtoptenreceipt}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                        <div class="col-sm-6">
                        <h5 class="text-center">Top Issued</h5>
                        <p>
                        <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addtopissued" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                            <div class="table-responsive">
                                <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Bulan</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Issued</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kch_toptenissued as $toptenissued)
                                        <tr>
                                            <td>{{date('F Y', strtotime($toptenissued->bulan))}}</td>
                                            <td>{{$toptenissued->description}}</td>
                                            <td>Rp{{number_format($toptenissued->costissued,2,',','.')}}</td>
                                            <td>
                                                <form action="{{route('kchtopissued.delete',$toptenissued->idkchtoptenissued)}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#edittopissued{{$toptenissued->idkchtoptenissued}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="depart" class="tab-pane fade" role="tabpanel">
                    <!-- <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#adddepartment" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button> -->
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#adddepartment" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Issued</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($kch_department as $department)
                                    <tr>
                                        <td>{{date('F Y', strtotime($department->bulan))}}</td>
                                        <td>{{$department->department}}</td>
                                        <td>Rp{{number_format($department->cost,2,',','.')}}</td>
                                        <td>
                                            <form action="{{route('kchdepartment.delete',$department->idkchdepartment)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#editdepartment{{$department->idkchdepartment}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
                <div  id="costcenter" class="tab-pane fade" role="tabpanel">
                    <!-- <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addcostcenterissued" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button> -->
                    <div class="row">
                        <div class="pull-left ml-30">
                            <button class="btn btn-primary btn-anim btn-xs mb-10"  data-toggle="modal" data-target="#addcostcenterissued" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                        </div>
                        <div class="pull-right mr-10 ml-30">
                            <form action="{{ route('kch.filter') }}" method="POST" id="filter-form" class="form-inline">
                                @csrf
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Filter Bulan</label>
                                    <input type='month' id="start_date" name="bulan" class="form-control" value="{{Request::input('bulan')}}"/>
                                </div>
                                <button type="submit" class="btn btn-success btn-anim btn-xs"><i class="icon-rocket"></i><span class="btn-text">Filter</span></button>
                                <a class="btn btn-warning btn-anim btn-xs" href="{{ route('kch') }}"><i class="fa fa-undo"></i><span class="btn-text">Reset</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="" class="table table-hover table-striped table-bordered display text-center font-11" width="99%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-center">Cost Center</th>
                                        <th class="text-center">Issued</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach($kch_costcenter as $costcenter)
                                    <tr>
                                        <td>{{date('F Y', strtotime($costcenter->bulan))}}</td>
                                        <td>{{$costcenter->costcenter}}</td>
                                        <td>Rp{{number_format($costcenter->cost,2,',','.')}}</td>
                                        <td>
                                            <form action="{{route('kchccissued.delete',$costcenter->idkchcostcenter)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#editcostcenter{{$costcenter->idkchcostcenter}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
        </div>	
    </div>
</div>
<!-- modal add -->
<div class="modal fade" id="addtopten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchtopten.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="intTotal" class="control-label mb-10">Item</label>
                    <input type="text" class="form-control" id="kchitem" name="kchitem">
                </div>
                <div class="form-group">
                    <label for="intTotal" class="control-label mb-10">Item Description</label>
                    <input type="text" class="form-control" id="itemdescription" name="itemdescription">
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label for="" class="control-label mb-10">On Hand</label>
                        <input type="number" class="form-control" id="onhand" name="onhand">   
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="control-label mb-10">Primary Uom</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" title="Uom" data-live-search="true" name="uom" required="true">
                            <option value="PCS">PAR</option>
                            <option value="PCS">PCS</option>
                            <option value="PCK">PCK</option>
                        </select>    
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label mb-10">Cost</label>
                        <input type="text" class="form-control" id="itemcost" name="itemcost">   
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="addcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchcode.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="intTotal" class="control-label mb-10">Jumlah Item Code</label>
                    <input type="number" class="form-control" id="jmlitemcode" name="jmlitemcode">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="addreceipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchreceipt.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10">PO Receipt</label>
                        <input type="number" class="form-control" id="po_receipt" name="po_receipt">
                    </div>
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10"> Total Item PO Receipt</label>
                        <input type="number" class="form-control" id="itemreceipt" name="itemreceipt">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10">Usage</label>
                        <input type="number" class="form-control" id="usage" name="usage">
                    </div>
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10">Total Item Usage</label>
                        <input type="number" class="form-control" id="itemusage" name="itemusage">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="addtarget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchtarget.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Tahun</label>
                    <input type="text" class="form-control" id="tahun" name="tahun">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Target Saving 5%</label>
                    <input type="text" class="form-control" id="kchtargetsaving" name="kchtargetsaving">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Value Target Saving</label>
                    <input type="text" class="form-control" id="kchvaluetargetsaving" name="kchvaluetargetsaving">
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
<div class="modal fade" id="addinventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchinventory.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Tahun</label>
                    <select class="selectpicker form-control" name="idkchtarget" data-style="form-control btn-default btn-outline" title="Pilih Tahun Target..." data-live-search="true" required="true">
                        @foreach($kch_target as $target)
                        <option value="{{ $target->idkchtargetsaving }}">{{ $target->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Value KCh Inventory</label>
                    <input type="text" class="form-control" id="kchvalue_inventory" name="kchvalue_inventory">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="addfsn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchfsn.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Fast Moving</label>
                    <input type="number" class="form-control" id="fastmoving" name="fastmoving">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Slow Moving</label>
                    <input type="number" class="form-control" id="slowmoving" name="slowmoving">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Non Moving</label>
                    <input type="number" class="form-control" id="nonmoving" name="nonmoving">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Dead Stock</label>
                    <input type="number" class="form-control" id="deadstock" name="deadstock">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="addtopreceipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchtopreceipt.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">PO Receipt</label>
                    <input type="text" class="form-control" id="costreceipt" name="costreceipt">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="addtopissued" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchtopissued.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="form-group">
                    <label for="" class="control-label mb-10">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Issued</label>
                    <input type="text" class="form-control" id="costissued" name="costissued">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
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
<div class="modal fade" id="adddepartment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchdepartment.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="alert alert-warning alert-kecil alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="zmdi zmdi-alert-circle-o pr-15 pull-left"></i><p class="pull-left">Jika department tidak ada issued, harap isi dengan 0.</p>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="BDA">BDA</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="BDA">BDA</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="ENG">ENG</option>
                            <option value="HC">HC</option>
                            <option value="BDA">BDA</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="IOS">IOS</option>
                            <option value="BDA">BDA</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="MNF">MNF</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="BDA">BDA</option>
                            <option value="IOS">IOS</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="MDP">MDP</option>
                            <option value="BDA">BDA</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="PRD">PRD</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="BDA">BDA</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="QA">QA</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="QA">QA</option>
                            <option value="BDA">BDA</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="WHS">WHS</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label">Department</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="department[]" required="true">
                            <option value="WHS">WHS</option>
                            <option value="HC">HC</option>
                            <option value="ENG">ENG</option>
                            <option value="BDA">BDA</option>
                            <option value="IOS">IOS</option>
                            <option value="MNF">MNF</option>
                            <option value="MDP">MDP</option>
                            <option value="PRD">PRD</option>
                            <option value="QA">QA</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
            </div>
            <!-- <div class="txt-dark ml-10 mt-0">
                <p>*Jika department tidak ada cost, harap isi dengan 0</p>
            </div>   -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Add</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
<div class="modal fade" id="addcostcenterissued" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
        </div> 
        <form action="{{ route('kchccissued.post') }}" method="POST">      
            <div class="modal-body">
            @csrf
                <div class="alert alert-warning alert-kecil alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="zmdi zmdi-alert-circle-o pr-15 pull-left"></i><p class="pull-left">Jika department tidak ada issued, harap isi dengan 0.</p>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan">
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="POWD">POWD</option>
                            <option value="ENGI">ENGI</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="MIXI">MIXI</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="DRSC">DRSC</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="DUMP">DUMP</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="WECN">WECN</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="WESC">WESC</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="DRYI">DRYI</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="GAFA">GAFA</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="GAHR">GAHR</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="GADC">GADC</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="GAIT">GAIT</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="MNFR">MNFR</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="MADP">MADP</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="QASS">QASS</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="IOSD">IOSD</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="QCLA">QCLA</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCIL">QCIL</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="QCIL">QCIL</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="WARE">WARE</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="dateBulan" class="control-label"></label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="costcenter[]" required="true">
                            <option value="WARE">WARE</option>
                            <option value="ENGI">ENGI</option>
                            <option value="POWD">POWD</option>
                            <option value="MIXI">MIXI</option>
                            <option value="DRSC">DRSC</option>
                            <option value="DUMP">DUMP</option>
                            <option value="WECN">WECN</option>
                            <option value="WESC">WESC</option>
                            <option value="DRYI">DRYI</option>
                            <option value="GAFA">GAFA</option>
                            <option value="GAHR">GAHR</option>
                            <option value="GADC">GADC</option>
                            <option value="GAIT">GAIT</option>
                            <option value="MNFR">MNFR</option>
                            <option value="MADP">MADP</option>
                            <option value="QASS">QASS</option>
                            <option value="IOSD">IOSD</option>
                            <option value="QCLA">QCLA</option>
                            <option value="QCIL">QCIL</option>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost[]" required>
                    </div>
                </div>    
                <!-- <div class="txt-dark ml-10 mt-0">
                    <p>*Jika cost center tidak ada issued, harap isi dengan 0</p>
                </div>  -->
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
@foreach($kch_fsn as $fsn)
<div class="modal fade" id="editfsn{{$fsn->idkchfsn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/fsn/{{$fsn->idkchfsn}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Fast Moving</label>
                    <input type="number" class="form-control" id="fastmoving" name="fastmoving" value="{{$fsn->fastmoving}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Slow Moving</label>
                    <input type="number" class="form-control" id="slowmoving" name="slowmoving" value="{{$fsn->slowmoving}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Non Moving</label>
                    <input type="number" class="form-control" id="nonmoving" name="nonmoving" value="{{$fsn->nonmoving}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Dead Stock</label>
                    <input type="number" class="form-control" id="deadstock" name="deadstock" value="{{$fsn->deadstock}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" name="bulan" value="{{\Carbon\Carbon::parse($fsn->bulan)->format('Y-m')}}">
                </div>
                
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_topten as $topten)
<div class="modal fade" id="edittopten{{$topten->idkchtopten}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/{{$topten->idkchtopten}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
            <div class="form-group">
                    <label for="intTotal" class="control-label mb-10">Item</label>
                    <input type="text" class="form-control" id="" name="kchitem" value="{{$topten->kchitem}}">
                </div>
                <div class="form-group">
                    <label for="intTotal" class="control-label mb-10">Item Description</label>
                    <input type="text" class="form-control" id="" name="itemdescription" value="{{$topten->itemdescription}}">
                </div>
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label for="" class="control-label mb-10">On Hand</label>
                        <input type="number" class="form-control" id="" name="onhand" value="{{$topten->onhand}}">   
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="control-label mb-10">Primary department[]</label>
                        <select class="selectpicker form-control" data-style="form-control btn-default btn-outline" data-live-search="true" name="uom" required="true">
                            <option value="{{$topten->uom}}">{{$topten->uom}}</option>
                            <option value="PCS">PAR</option>
                            <option value="PCS">PCS</option>
                            <option value="PCK">PCK</option>
                        </select>    
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="control-label mb-10">Cost</label>
                        <input type="text" class="form-control" id="itemcost" name="itemcost" value="{{$topten->itemcost}}">   
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($topten->bulan)->format('Y-m')}}">
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_code as $code)
<div class="modal fade" id="editcode{{$code->idkchjmlcode}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/code/{{$code->idkchjmlcode}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Jumlah Item Code</label>
                    <input type="number" class="form-control" id="jmlitemcode" name="jmlitemcode" value="{{$code->jmlitemcode}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($code->bulan)->format('Y-m')}}">
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_receipt as $receipt)
<div class="modal fade" id="editreceipt{{$receipt->idkchreceiptissue}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/receiptissue/{{$receipt->idkchreceiptissue}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10">PO Receipt</label>
                        <input type="number" class="form-control" id="po_receipt" name="po_receipt" value="{{$receipt->po_receipt}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10"> Total Item PO Receipt</label>
                        <input type="number" class="form-control" id="itemreceipt" name="itemreceipt" value="{{$receipt->itemreceipt}}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10">Usage</label>
                        <input type="number" class="form-control" id="usage" name="usage" value="{{$receipt->usage}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="intTotal" class="control-label mb-10">Total Item Usage</label>
                        <input type="number" class="form-control" id="itemusage" name="itemusage" value="{{$receipt->itemusage}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($receipt->bulan)->format('Y-m')}}">
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_inventory as $inventory)
<div class="modal fade" id="editinventory{{$inventory->idkchinventory}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/inventory/{{$inventory->idkchinventory}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Tahun</label>
                    <select class="selectpicker form-control" name="idkchtarget" data-style="form-control btn-default btn-outline" title="" data-live-search="true" required="true">
                        <option value="{{$inventory->idkchtarget}}">{{$inventory->tahun}}</option>
                        @foreach($kch_target as $target)
                        <option value="{{ $target->idkchtargetsaving }}">{{ $target->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Value KCH Inventory</label>
                    <input type="text" class="form-control" id="kchvalue_inventory" name="kchvalue_inventory" value="{{$inventory->kchvalue_inventory}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($inventory->bulan)->format('Y-m')}}">
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_toptenreceipt as $toptenreceipt)
<div class="modal fade" id="edittopreceipt{{$toptenreceipt->idkchtoptenreceipt}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/topreceipt/{{$toptenreceipt->idkchtoptenreceipt}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$toptenreceipt->description}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Issued</label>
                    <input type="text" class="form-control" id="costissued" name="costreceipt" value="{{$toptenreceipt->costreceipt}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($toptenreceipt->bulan)->format('Y-m')}}">
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_toptenissued as $toptenissued)
<div class="modal fade" id="edittopissued{{$toptenissued->idkchtoptenissued}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/topissued/{{$toptenissued->idkchtoptenissued}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$toptenissued->description}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Issued</label>
                    <input type="text" class="form-control" id="costissued" name="costissued" value="{{$toptenissued->costissued}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="bulan" name="bulan" value="{{\Carbon\Carbon::parse($toptenissued->bulan)->format('Y-m')}}">
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_department as $department)
<div class="modal fade" id="editdepartment{{$department->idkchdepartment}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/department/{{$department->idkchdepartment}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="description" name="bulan" value="{{\Carbon\Carbon::parse($department->bulan)->format('Y-m')}}">
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="dateBulan" class="control-label">Department</label>
                        <input type="text" class="form-control" id="" name="department" value="{{$department->department}}">
                    </div>
                    <div class="col-sm-8">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost" value="{{$department->cost}}" required>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </form>
    </div>       
    </div>       
</div>
@endforeach
@foreach($kch_costcenter as $costcenter)
<div class="modal fade" id="editcostcenter{{$costcenter->idkchcostcenter}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 class="modal-title" id="add-userLabel1">Edit Data</h5>
        </div> 
        <form action="/hrgakch/costcenter/{{$costcenter->idkchcostcenter}}" method="POST">      
            <div class="modal-body">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="" class="control-label mb-10">Bulan</label>
                    <input type="month" class="form-control" id="description" name="bulan" value="{{\Carbon\Carbon::parse($costcenter->bulan)->format('Y-m')}}">
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <label for="dateBulan" class="control-label">Cost Center</label>
                        <input type="text" class="form-control" id="" name="costcenter" value="{{$costcenter->costcenter}}">
                    </div>
                    <div class="col-sm-8">
                        <label for="" class="control-label">Cost</label>
                        <input type="text" class="form-control" id="" name="cost" value="{{$costcenter->cost}}" required>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
$(document).ready(function() {
    $("#add-form-btn").click(function() {
        $("#dynamic-form-container").append(`
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name[]" id="name" placeholder="Enter name">
            </div>

        `);
        $("#dynamic-form").append(`
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email[]" id="email" placeholder="Enter email">
            </div>
        `);
    });
});
$('.display').dataTable( {
    paging: true,
    searching: true,
    ordering: false
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