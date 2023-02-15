@extends('layouts.master')

@section('title', 'Balance Scorecard')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Balance Scorecard</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in"> 
            <div class="panel-body">
            <div  class="tab-struct custom-tab-1 mt-0">
                    <ul role="tablist" class="nav nav-tabs" id="myTabs_7">
                        <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_15" href="#home_15">Financial</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_15" role="tab" href="#profile_15" aria-expanded="false">Internal Business Process</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_16" role="tab" href="#profile_16" aria-expanded="false">Customer</a></li>
                        <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_17" role="tab" href="#profile_17" aria-expanded="false">Learn & Growth</a></li>
                    </ul>
            
            <div class="tab-content" id="myTabContent_7">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addfinancial" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover font-11 table-bordered displayz mb-30" width="99%" >
                            <thead>
                            <tr>
                                <th rowspan="2" class="text-center">References</th>
                                <th rowspan="2" class="text-center">KPI</th>
                                <th rowspan="2" class="text-center">KPI Type</th>
                                <th colspan="2" class="text-center">MTD</th>    
                                <th colspan="2" class="text-center">YTD</th>    
                                <th colspan="3" class="text-center">MTD</th>    
                                <th colspan="3" class="text-center">YTD</th>    
                            </tr>
                            <tr>
                                <th class="text-center">value</th>
                                <th class="text-center">value</th>
                                <th class="text-center">value</th>
                                <th class="text-center">value</th>
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                            </tr>
                            @foreach($balancescorecard as $balance)
                            <?php
                                $actualmtd1=$balance->netsales_mtd/$balance->hrcost_mtd;
                                $actualmtd2=$balance->netsales_mtd/$balance->employee_mtd;
                                $actualmtd3=$balance->gp_mtd/$balance->hrcost_mtd;
                                $actualmtd4=$balance->gp_mtd/$balance->employee_mtd;
                                $actualmtd5=$balance->op_mtd/$balance->hrcost_mtd;
                                $actualmtd6=$balance->op_mtd/$balance->employee_mtd;
                                $actualytd1=$balance->netsales_ytd/$balance->hrcost_ytd;
                                $actualytd2=$balance->netsales_ytd/$balance->employee_ytd;
                                $actualytd3=$balance->gp_ytd/$balance->hrcost_ytd;
                                $actualytd4=$balance->gp_ytd/$balance->employee_ytd;
                                $actualytd5=$balance->op_ytd/$balance->hrcost_ytd;
                                $actualytd6=$balance->op_ytd/$balance->employee_ytd;
                                $targetmtd1=$balance->netsales_mtdtarget/$balance->hrcost_mtdtarget;
                                $targetmtd2=$balance->netsales_mtdtarget/$balance->employee_mtdtarget;
                                $targetmtd3=$balance->gp_mtdtarget/$balance->hrcost_mtdtarget;
                                $targetmtd4=$balance->gp_mtdtarget/$balance->employee_mtdtarget;
                                $targetmtd5=$balance->op_mtdtarget/$balance->hrcost_mtdtarget;
                                $targetmtd6=$balance->op_mtdtarget/$balance->employee_mtdtarget;
                                $targetytd1=$balance->netsales_ytdtarget/$balance->hrcost_ytdtarget;
                                $targetytd2=$balance->netsales_ytdtarget/$balance->employee_ytdtarget;
                                $targetytd3=$balance->gp_ytdtarget/$balance->hrcost_ytdtarget;
                                $targetytd4=$balance->gp_ytdtarget/$balance->employee_ytdtarget;
                                $targetytd5=$balance->op_ytdtarget/$balance->hrcost_ytdtarget;
                                $targetytd6=$balance->op_ytdtarget/$balance->employee_ytdtarget;
                                $hasilmtd1=($actualmtd1/$targetmtd1)*100;
                                $hasilmtd2=($actualmtd2/$targetmtd2)*100;
                                $hasilmtd3=($actualmtd3/$targetmtd3)*100;
                                $hasilmtd4=($actualmtd4/$targetmtd4)*100;
                                $hasilmtd5=($actualmtd5/$targetmtd5)*100;
                                $hasilmtd6=($actualmtd6/$targetmtd6)*100;
                                $hasilytd1=($actualytd1/$targetytd1)*100;
                                $hasilytd2=($actualytd2/$targetytd2)*100;
                                $hasilytd3=($actualytd3/$targetytd3)*100;
                                $hasilytd4=($actualytd4/$targetytd4)*100;
                                $hasilytd5=($actualytd5/$targetytd5)*100;
                                $hasilytd6=($actualytd6/$targetytd6)*100;
                            ?>
                            <tr>
                                <td colspan="11" class="text-center">{{date('F Y', strtotime($balance->bulan))}}</td>
                                <td colspan="2" class="text-center">
                                    <form action="{{route('financial.delete',$balance->idfinancial)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updatefinancial{{$balance->idfinancial}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                    @csrf 
                                    @method("delete")
                                        <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            </thead>
                            
                            
                            <tbody>
                            
                            <tr>
                                <td>F1</td>
                                <td>Net sales / HR Cost</td>
                                <td>{{$balance->kpitype}}</td>
                                <td>{{number_format($balance->netsales_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->hrcost_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->netsales_ytd,0,',','.')}}</td>
                                <td>{{number_format($balance->hrcost_ytd,0,',','.')}}</td>
                                <td>{{number_format($actualmtd1,2,',','.')}}</td>
                                <td>{{number_format($targetmtd1,2,',','.')}}</td>
                                <td>
                                    @if($hasilmtd1>=110)
                                    <span class="label label-blue">{{number_format($hasilmtd1,0)}}%</span>
                                    @elseif (($hasilmtd1<110)&&($hasilmtd1>=105))
                                    <span class="label label-ijotua">{{number_format($hasilmtd1,0)}}%</span>
                                    @elseif (($hasilmtd1<105)&&($hasilmtd1>=100))
                                    <span class="label label-success">{{number_format($hasilmtd1,0)}}%</span>
                                    @elseif (($hasilmtd1<100)&&($hasilmtd1>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd1,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd1,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd1,2,',','.')}}</td>
                                <td>{{number_format($targetytd1,2,',','.')}}</td>
                                <td>
                                    @if($hasilytd1>=110)
                                    <span class="label label-blue">{{number_format($hasilytd1,0)}}%</span>
                                    @elseif (($hasilytd1<110)&&($hasilytd1>=105))
                                    <span class="label label-ijotua">{{number_format($hasilytd1,0)}}%</span>
                                    @elseif (($hasilytd1<105)&&($hasilytd1>=100))
                                    <span class="label label-success">{{number_format($hasilytd1,0)}}%</span>
                                    @elseif (($hasilytd1<100)&&($hasilytd1>=95))
                                    <span class="label label-warning">{{number_format($hasilytd1,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilytd1,0)}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>F2</td>
                                <td>Net sales / # of employee</td>
                                <td>{{$balance->kpitype}}</td>
                                <td>{{number_format($balance->netsales_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->employee_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->netsales_ytd,0,',','.')}}</td>
                                <td>{{number_format($balance->employee_ytd,0,',','.')}}</td>
                                <td>{{number_format($actualmtd2,2,',','.')}}</td>
                                <td>{{number_format($targetmtd2,2,',','.')}}</td>
                                <td>
                                    @if($hasilmtd1>=110)
                                    <span class="label label-blue">{{number_format($hasilmtd2,0)}}%</span>
                                    @elseif (($hasilmtd2<110)&&($hasilmtd2>=105))
                                    <span class="label label-ijotua">{{number_format($hasilmtd2,0)}}%</span>
                                    @elseif (($hasilmtd2<105)&&($hasilmtd2>=100))
                                    <span class="label label-success">{{number_format($hasilmtd2,0)}}%</span>
                                    @elseif (($hasilmtd2<100)&&($hasilmtd2>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd2,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd2,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd2,2,',','.')}}</td>
                                <td>{{number_format($targetytd2,2,',','.')}}</td>
                                <td>
                                    @if($hasilytd2>=110)
                                    <span class="label label-blue">{{number_format($hasilytd2,0)}}%</span>
                                    @elseif (($hasilytd2<110)&&($hasilytd2>=105))
                                    <span class="label label-ijotua">{{number_format($hasilytd2,0)}}%</span>
                                    @elseif (($hasilytd2<105)&&($hasilytd2>=100))
                                    <span class="label label-success">{{number_format($hasilytd2,0)}}%</span>
                                    @elseif (($hasilytd2<100)&&($hasilytd2>=95))
                                    <span class="label label-warning">{{number_format($hasilytd2,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilytd2,0)}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>F3</td>
                                <td>GP / HR Cost</td>
                                <td>{{$balance->kpitype}}</td>
                                <td>{{number_format($balance->gp_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->hrcost_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->gp_ytd,0,',','.')}}</td>
                                <td>{{number_format($balance->hrcost_ytd,0,',','.')}}</td>
                                <td>{{number_format($actualmtd3,2,',','.')}}</td>
                                <td>{{number_format($targetmtd3,2,',','.')}}</td>
                                <td>
                                    @if($hasilmtd3>=110)
                                    <span class="label label-blue">{{number_format($hasilmtd3,0)}}%</span>
                                    @elseif (($hasilmtd3<110)&&($hasilmtd3>=105))
                                    <span class="label label-ijotua">{{number_format($hasilmtd3,0)}}%</span>
                                    @elseif (($hasilmtd3<105)&&($hasilmtd3>=100))
                                    <span class="label label-success">{{number_format($hasilmtd3,0)}}%</span>
                                    @elseif (($hasilmtd3<100)&&($hasilmtd3>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd3,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd3,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd3,2,',','.')}}</td>
                                <td>{{number_format($targetytd3,2,',','.')}}</td>
                                <td>
                                    @if($hasilytd3>=110)
                                    <span class="label label-blue">{{number_format($hasilytd3,0)}}%</span>
                                    @elseif (($hasilytd3<110)&&($hasilytd3>=105))
                                    <span class="label label-ijotua">{{number_format($hasilytd3,0)}}%</span>
                                    @elseif (($hasilytd3<105)&&($hasilytd3>=100))
                                    <span class="label label-success">{{number_format($hasilytd3,0)}}%</span>
                                    @elseif (($hasilytd3<100)&&($hasilytd3>=95))
                                    <span class="label label-warning">{{number_format($hasilytd3,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilytd3,0)}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>F4</td>
                                <td>GP / # of employee</td>
                                <td>{{$balance->kpitype}}</td>
                                <td>{{number_format($balance->gp_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->employee_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->gp_ytd,0,',','.')}}</td>
                                <td>{{number_format($balance->employee_ytd,0,',','.')}}</td>
                                <td>{{number_format($actualmtd4,2,',','.')}}</td>
                                <td>{{number_format($targetmtd4,2,',','.')}}</td>
                                <td>
                                    @if($hasilmtd4>=110)
                                    <span class="label label-blue">{{number_format($hasilmtd4,0)}}%</span>
                                    @elseif (($hasilmtd4<110)&&($hasilmtd4>=105))
                                    <span class="label label-ijotua">{{number_format($hasilmtd4,0)}}%</span>
                                    @elseif (($hasilmtd4<105)&&($hasilmtd4>=100))
                                    <span class="label label-success">{{number_format($hasilmtd4,0)}}%</span>
                                    @elseif (($hasilmtd4<100)&&($hasilmtd4>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd4,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd4,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd4,2,',','.')}}</td>
                                <td>{{number_format($targetytd4,2,',','.')}}</td>
                                <td>
                                    @if($hasilytd4>=110)
                                    <span class="label label-blue">{{number_format($hasilytd4,0)}}%</span>
                                    @elseif (($hasilytd4<110)&&($hasilytd4>=105))
                                    <span class="label label-ijotua">{{number_format($hasilytd4,0)}}%</span>
                                    @elseif (($hasilytd4<105)&&($hasilytd4>=100))
                                    <span class="label label-success">{{number_format($hasilytd4,0)}}%</span>
                                    @elseif (($hasilytd4<100)&&($hasilytd4>=95))
                                    <span class="label label-warning">{{number_format($hasilytd4,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilytd4,0)}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>F5</td>
                                <td>OP / HR Cost</td>
                                <td>{{$balance->kpitype}}</td>
                                <td>{{number_format($balance->op_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->hrcost_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->op_ytd,0,',','.')}}</td>
                                <td>{{number_format($balance->hrcost_ytd,0,',','.')}}</td>
                                <td>{{number_format($actualmtd5,2,',','.')}}</td>
                                <td>{{number_format($targetmtd5,2,',','.')}}</td>
                                <td>
                                    @if($hasilmtd5>=110)
                                    <span class="label label-blue">{{number_format($hasilmtd5,0)}}%</span>
                                    @elseif (($hasilmtd5<110)&&($hasilmtd5>=105))
                                    <span class="label label-ijotua">{{number_format($hasilmtd5,0)}}%</span>
                                    @elseif (($hasilmtd5<105)&&($hasilmtd5>=100))
                                    <span class="label label-success">{{number_format($hasilmtd5,0)}}%</span>
                                    @elseif (($hasilmtd5<100)&&($hasilmtd5>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd5,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd5,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd5,2,',','.')}}</td>
                                <td>{{number_format($targetytd5,2,',','.')}}</td>
                                <td>
                                    @if($hasilytd5>=110)
                                    <span class="label label-blue">{{number_format($hasilytd5,0)}}%</span>
                                    @elseif (($hasilytd5<110)&&($hasilytd5>=105))
                                    <span class="label label-ijotua">{{number_format($hasilytd5,0)}}%</span>
                                    @elseif (($hasilytd5<105)&&($hasilytd5>=100))
                                    <span class="label label-success">{{number_format($hasilytd5,0)}}%</span>
                                    @elseif (($hasilytd5<100)&&($hasilytd5>=95))
                                    <span class="label label-warning">{{number_format($hasilytd5,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilytd5,0)}}%</span>
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <td>F6</td>
                                <td>OP / # of employee</td>
                                <td>{{$balance->kpitype}}</td>
                                <td>{{number_format($balance->op_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->employee_mtd,0,',','.')}}</td>
                                <td>{{number_format($balance->op_ytd,0,',','.')}}</td>
                                <td>{{number_format($balance->op_ytd,0,',','.')}}</td>
                                <td>{{number_format($actualmtd6,2,',','.')}}</td>
                                <td>{{number_format($targetmtd6,2,',','.')}}</td>
                                <td>
                                    @if($hasilmtd6>=110)
                                    <span class="label label-blue">{{number_format($hasilmtd6,0)}}%</span>
                                    @elseif (($hasilmtd6<110)&&($hasilmtd6>=105))
                                    <span class="label label-ijotua">{{number_format($hasilmtd6,0)}}%</span>
                                    @elseif (($hasilmtd6<105)&&($hasilmtd6>=100))
                                    <span class="label label-success">{{number_format($hasilmtd6,0)}}%</span>
                                    @elseif (($hasilmtd6<100)&&($hasilmtd6>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd6,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd6,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd6,2,',','.')}}</td>
                                <td>{{number_format($targetytd6,2,',','.')}}</td>
                                <td>
                                    @if($hasilytd6>=110)
                                    <span class="label label-blue">{{number_format($hasilytd6,0)}}%</span>
                                    @elseif (($hasilytd6<110)&&($hasilytd6>=105))
                                    <span class="label label-ijotua">{{number_format($hasilytd6,0)}}%</span>
                                    @elseif (($hasilytd6<105)&&($hasilytd6>=100))
                                    <span class="label label-success">{{number_format($hasilytd6,0)}}%</span>
                                    @elseif (($hasilytd6<100)&&($hasilytd6>=95))
                                    <span class="label label-warning">{{number_format($hasilytd6,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilytd6,0)}}%</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addbusiness" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="coba" class="table table-hover font-11 table-bordered displayz mb-30 text-center" width="99%">
                            <thead>
                            
                            <tr>
                                <th rowspan="2" class="text-center">References</th>
                                <th rowspan="2" class="text-center">KPI</th>
                                <th rowspan="2" class="text-center">KPI Type</th>
                                   
                                <th colspan="3" class="text-center">MTD</th>    
                                <th colspan="3" class="text-center">YTD</th>    
                            </tr>
                            <tr>
                                
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                            </tr>
                            @foreach($bscbusiness as $business)
                            <tr>
                                <td colspan="7" class="text-center">{{date('F Y', strtotime($business->bulan))}}</td>
                                <td colspan="2" class="text-center">
                                    <form action="{{route('business.delete',$business->idbussiness)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updatebusines{{$business->idbussiness}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                    @csrf 
                                    @method("delete")
                                        <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>B1</td>
                                <td>Proper Award</td>
                                <td>{{$business->kpitype1}}</td>
                                <td>{{$business->mtdactual1}}</td>
                                <td>{{$business->mtdtarget1}}</td>
                                <td>
                                    @if($business->kpitype1=='Maximizing')
                                        @if($business->mtdach1>=110)
                                        <span class="label label-blue">{{$business->mtdach1}}%</span>
                                        @elseif (($business->mtdach1<110)&&($business->mtdach1>=105))
                                        <span class="label label-ijotua">{{$business->mtdach1}}%</span>
                                        @elseif (($business->mtdach1<105)&&($business->mtdach1>=100))
                                        <span class="label label-success">{{$business->mtdach1}}%</span>
                                        @elseif (($business->mtdach1<100)&&($business->mtdach1>=95))
                                        <span class="label label-warning">{{$business->mtdach1}}%</span>
                                        @else
                                        <span class="label label-danger">{{$business->mtdach1}}%</span>
                                        @endif
                                    @elseif($business->kpitype1=='Minimizing')
                                        @if($business->mtdach1>105)
                                        <span class="label label-danger">{{$business->mtdach1}}%</span>
                                        @elseif (($business->mtdach1<=105)&&($business->mtdach1>100))
                                        <span class="label label-warning">{{$business->mtdach1}}%</span>
                                        @elseif (($business->mtdach1<=100)&&($business->mtdach1>95))
                                        <span class="label label-success">{{$business->mtdach1}}%</span>
                                        @elseif (($business->mtdach1<=95)&&($business->mtdach1>90))
                                        <span class="label label-ijotua">{{$business->mtdach1}}%</span>
                                        @else
                                        <span class="label label-blue">{{$business->mtdach1}}%</span>
                                        @endif
                                    @else
                                    {{$business->mtdach1}}
                                    @endif
                                </td>
                                <td>{{$business->ytdactual1}}</td>
                                <td>{{$business->ytdtarget1}}</td>
                                <td>
                                    @if($business->kpitype1=='Maximizing')
                                        @if($business->ytdach1>=110)
                                        <span class="label label-blue">{{$business->ytdach1}}%</span>
                                        @elseif (($business->ytdach1<110)&&($business->ytdach1>=105))
                                        <span class="label label-ijotua">{{$business->ytdach1}}%</span>
                                        @elseif (($business->ytdach1<105)&&($business->ytdach1>=100))
                                        <span class="label label-success">{{$business->ytdach1}}%</span>
                                        @elseif (($business->ytdach1<100)&&($business->ytdach1>=95))
                                        <span class="label label-warning">{{$business->ytdach1}}%</span>
                                        @else
                                        <span class="label label-danger">{{$business->ytdach1}}%</span>
                                        @endif
                                    @elseif($business->kpitype1=='Minimizing')
                                        @if($business->ytdach1>105)
                                        <span class="label label-danger">{{$business->ytdach1}}%</span>
                                        @elseif (($business->ytdach1<=105)&&($business->ytdach1>100))
                                        <span class="label label-warning">{{$business->ytdach1}}%</span>
                                        @elseif (($business->ytdach1<=100)&&($business->ytdach1>95))
                                        <span class="label label-success">{{$business->ytdach1}}%</span>
                                        @elseif (($business->ytdach1<=95)&&($business->ytdach1>90))
                                        <span class="label label-ijotua">{{$business->ytdach1}}%</span>
                                        @else
                                        <span class="label label-blue">{{$business->ytdach1}}%</span>
                                        @endif
                                        @elseif($business->ytdach1==null)
                                        <span></span>
                                        @else
                                        {{$business->ytdach1}}
                                        @endif
                                </td>  
                            </tr>
                            <tr>
                                <td>B2</td>
                                <td>Matrix score (Audit 9001, unannounce FSSC, Audit ISO 45001, Audit corporate, GM5P Audit, CPPOB, PMR)</td>
                                <td>{{$business->kpitype2}}</td>
                                <td>{{$business->mtdactual2}}</td>
                                <td>{{$business->mtdtarget2}}</td>
                                <td>
                                    @if($business->kpitype2=='Maximizing')
                                        @if($business->mtdach2>=110)
                                        <span class="label label-blue">{{$business->mtdach2}}%</span>
                                        @elseif (($business->mtdach2<110)&&($business->mtdach2>=105))
                                        <span class="label label-ijotua">{{$business->mtdach2}}%</span>
                                        @elseif (($business->mtdach2<105)&&($business->mtdach2>=100))
                                        <span class="label label-success">{{$business->mtdach2}}%</span>
                                        @elseif (($business->mtdach2<100)&&($business->mtdach2>=95))
                                        <span class="label label-warning">{{$business->mtdach2}}%</span>
                                        @else
                                        <span class="label label-danger"></span>
                                        @endif
                                    @elseif($business->kpitype2=='Minimizing')
                                        @if($business->mtdach2>105)
                                        <span class="label label-danger">{{$business->mtdach2}}%</span>
                                        @elseif (($business->mtdach2<=105)&&($business->mtdach2>100))
                                        <span class="label label-warning">{{$business->mtdach2}}%</span>
                                        @elseif (($business->mtdach2<=100)&&($business->mtdach2>95))
                                        <span class="label label-success">{{$business->mtdach2}}%</span>
                                        @elseif (($business->mtdach2<=95)&&($business->mtdach2>90))
                                        <span class="label label-ijotua">{{$business->mtdach2}}%</span>
                                        @else
                                        <span class="label label-blue">{{$business->mtdach2}}</span>
                                        @endif
                                    @elseif($business->mtdach2==null)
                                    <span></span>
                                    @else
                                    {{$business->mtdach2}}
                                    @endif
                                </td>
                                <td>{{$business->ytdactual2}}</td>
                                <td>{{$business->ytdtarget2}}</td>
                                <td>
                                @if($business->kpitype2=='Maximizing')
                                        @if($business->ytdach2>=110)
                                        <span class="label label-blue">{{$business->ytdach2}}%</span>
                                        @elseif (($business->ytdach2<110)&&($business->ytdach2>=105))
                                        <span class="label label-ijotua">{{$business->ytdach2}}%</span>
                                        @elseif (($business->ytdach2<105)&&($business->ytdach2>=100))
                                        <span class="label label-success">{{$business->ytdach2}}%</span>
                                        @elseif (($business->ytdach2<100)&&($business->ytdach2>=95))
                                        <span class="label label-warning">{{$business->ytdach2}}%</span>
                                        @else
                                        <span class="label label-danger">{{$business->ytdach2}}%</span>
                                        @endif
                                    @elseif($business->kpitype2=='Minimizing')
                                        @if($business->ytdach2>105)
                                        <span class="label label-danger">{{$business->ytdach2}}%</span>
                                        @elseif (($business->ytdach2<=105)&&($business->ytdach2>100))
                                        <span class="label label-warning">{{$business->ytdach2}}%</span>
                                        @elseif (($business->ytdach2<=100)&&($business->ytdach2>95))
                                        <span class="label label-success">{{$business->ytdach2}}%</span>
                                        @elseif (($business->ytdach2<=95)&&($business->ytdach2>90))
                                        <span class="label label-ijotua">{{$business->ytdach2}}%</span>
                                        @else
                                        <span class="label label-blue">{{$business->ytdach2}}%</span>
                                        @endif
                                    @elseif($business->ytdach2==null)
                                    <span></span>
                                    @else
                                    {{$business->ytdach2}}
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div  id="profile_16" class="tab-pane fade" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addcustomer" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover font-11 table-bordered displayz mb-30 text-center" width="99%" >
                            <thead>
                            
                            <tr>
                                <th rowspan="2" class="text-center">References</th>
                                <th rowspan="2" class="text-center">KPI</th>
                                <th rowspan="2" class="text-center">KPI Type</th>
                                  
                                <th colspan="3" class="text-center">MTD</th>    
                                <th colspan="3" class="text-center">YTD</th>    
                            </tr>
                            <tr>
                                
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                            </tr>
                            @foreach($bsccustomer as $customer)
                            <tr>
                                <td colspan="7" class="text-center">{{date('F Y', strtotime($customer->c_bulan))}}</td>
                                <td colspan="2" class="text-center">
                                    <form action="{{route('customer.delete',$customer->idcustomer)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updatecustomer{{$customer->idcustomer}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                    @csrf 
                                    @method("delete")
                                        <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>C1</td>
                                <td>Covid-19 prevention activity implementation & Booster 100% for employee</td>
                                <td>{{$customer->c_kpitype1}}</td>
                                <td>{{$customer->c_mtdactual1}}</td>
                                <td>{{$customer->c_mtdtarget1}}</td>
                                <td>
                                
                                    @if($customer->c_mtdach1>=110)
                                    <span class="label label-blue">{{$customer->c_mtdach1}}%</span>
                                    @elseif (($customer->c_mtdach1<110)&&($customer->c_mtdach1>=105))
                                    <span class="label label-ijotua">{{$customer->c_mtdach1}}%</span>
                                    @elseif (($customer->c_mtdach1<105)&&($customer->c_mtdach1>=100))
                                    <span class="label label-success">{{$customer->c_mtdach1}}%</span>
                                    @elseif (($customer->c_mtdach1<100)&&($customer->c_mtdach1>=95))
                                    <span class="label label-warning">{{$customer->c_mtdach1}}%</span>
                                    @elseif($customer->c_mtdach1==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$customer->c_mtdach1}}%</span>
                                    @endif
                                
                                </td>
                                <td>{{$customer->c_ytdactual1}}</td>
                                <td>{{$customer->c_ytdtarget1}}</td>
                                <td>
                                    @if($customer->c_ytdach1>=110)
                                    <span class="label label-blue">{{$customer->c_ytdach1}}%</span>
                                    @elseif (($customer->c_ytdach1<110)&&($customer->c_ytdach1>=105))
                                    <span class="label label-ijotua">{{$customer->c_ytdach1}}%</span>
                                    @elseif (($customer->c_ytdach1<105)&&($customer->c_ytdach1>=100))
                                    <span class="label label-success">{{$customer->c_ytdach1}}%</span>
                                    @elseif (($customer->c_ytdach1<100)&&($customer->c_ytdach1>=95))
                                    <span class="label label-warning">{{$customer->c_ytdach1}}%</span>
                                    @elseif($customer->c_ytdach1==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$customer->c_ytdach1}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>C2</td>
                                <td>Support SDGS (6. Clean water and sanitation)</td>
                                <td>{{$customer->c_kpitype2}}</td>
                                <td>{{$customer->c_mtdactual2}}</td>
                                
                                <td>{{$customer->c_mtdtarget2}}</td>
                                <td>
                                    @if($customer->c_mtdach2>=110)
                                    <span class="label label-blue">{{$customer->c_mtdach2}}%</span>
                                    @elseif (($customer->c_mtdach2<110)&&($customer->c_mtdach2>=105))
                                    <span class="label label-ijotua">{{$customer->c_mtdach2}}%</span>
                                    @elseif (($customer->c_mtdach2<105)&&($customer->c_mtdach2>=100))
                                    <span class="label label-success">{{$customer->c_mtdach2}}%</span>
                                    @elseif (($customer->c_mtdach2<100)&&($customer->c_mtdach2>=95))
                                    <span class="label label-warning">{{$customer->c_mtdach2}}%</span>
                                    @elseif($customer->c_mtdach2==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$customer->c_mtdach2}}%</span>
                                    @endif
                                </td>
                                <td>{{$customer->c_ytdactual2}}</td>
                                <td>{{$customer->c_ytdtarget2}}</td>
                                <td>
                                    @if($customer->c_ytdach2>=110)
                                    <span class="label label-blue">{{$customer->c_ytdach2}}%</span>
                                    @elseif (($customer->c_ytdach2<110)&&($customer->c_ytdach2>=105))
                                    <span class="label label-ijotua">{{$customer->c_ytdach2}}%</span>
                                    @elseif (($customer->c_ytdach2<105)&&($customer->c_ytdach2>=100))
                                    <span class="label label-success">{{$customer->c_ytdach2}}%</span>
                                    @elseif (($customer->c_ytdach2<100)&&($customer->c_ytdach2>=95))
                                    <span class="label label-warning">{{$customer->c_ytdach2}}%</span>
                                    @elseif($customer->c_ytdach2==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$customer->c_ytdach2}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>C3</td>
                                <td>IR-ER(Matrix)</td>
                                <td>{{$customer->c_kpitype3}}</td>
                                <td>{{$customer->c_mtdactual3}}</td>
                                
                                <td>{{$customer->c_mtdtarget3}}</td>
                                <td>
                                    @if($customer->c_mtdach3>=110)
                                    <span class="label label-blue">{{$customer->c_mtdach3}}%</span>
                                    @elseif (($customer->c_mtdach3<110)&&($customer->c_mtdach3>=105))
                                    <span class="label label-ijotua">{{$customer->c_mtdach3}}%</span>
                                    @elseif (($customer->c_mtdach3<105)&&($customer->c_mtdach3>=100))
                                    <span class="label label-success">{{$customer->c_mtdach3}}%</span>
                                    @elseif (($customer->c_mtdach3<100)&&($customer->c_mtdach3>=95))
                                    <span class="label label-warning">{{$customer->c_mtdach3}}%</span>
                                    @elseif($customer->c_mtdach3==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$customer->c_mtdach3}}%</span>
                                    @endif
                                </td>
                                <td>{{$customer->c_ytdactual3}}</td>
                                <td>{{$customer->c_ytdtarget3}}</td>
                                <td>
                                    @if($customer->c_ytdach3>=110)
                                    <span class="label label-blue">{{$customer->c_ytdach3}}%</span>
                                    @elseif (($customer->c_ytdach3<110)&&($customer->c_ytdach3>=105))
                                    <span class="label label-ijotua">{{$customer->c_ytdach3}}%</span>
                                    @elseif (($customer->c_ytdach3<105)&&($customer->c_ytdach3>=100))
                                    <span class="label label-success">{{$customer->c_ytdach3}}%</span>
                                    @elseif (($customer->c_ytdach3<100)&&($customer->c_ytdach3>=95))
                                    <span class="label label-warning">{{$customer->c_ytdach3}}%</span>
                                    @elseif($customer->c_ytdach3==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$customer->c_ytdach3}}%</span>
                                    @endif
                                    
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div  id="profile_17" class="tab-pane fade" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addlearn" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover font-11 table-bordered displayz mb-30 text-center" width="99%">
                            <thead>
                            
                            <tr>
                                <th rowspan="2" class="text-center">References</th>
                                <th rowspan="2" class="text-center">KPI</th>
                                <th rowspan="2" class="text-center">KPI Type</th>
                               
                                <th colspan="3" class="text-center">MTD</th>    
                                <th colspan="3" class="text-center">YTD</th>    
                            </tr>
                            <tr>
                                
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                                <th class="text-center">actual</th>
                                <th class="text-center">target</th>
                                <th class="text-center">ach</th>
                            </tr>
                            @foreach($bsclearn as $learn)
                            <tr>
                                <td colspan="7" class="text-center">{{date('F Y', strtotime($learn->l_bulan))}}</td>
                                <td colspan="2" class="text-center">
                                    <form action="{{route('learn.delete',$learn->idlearngrowth)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#updatelearn{{$learn->idlearngrowth}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
                                    @csrf 
                                    @method("delete")
                                        <button type="submit"  class="btn btn-info btn-icon-anim btn-square btn-sm delete" ><i class="icon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>L1</td>
                                <td>Talent management (Readiness) dalam Matrix Talent Management</td>
                                <td>{{$learn->l_kpitype1}}</td>
                                <td>{{$learn->l_mtdactual1}}</td>
                                <td>{{$learn->l_mtdtarget1}}</td>
                                <td>
                                    @if($learn->l_mtdach1>=110)
                                    <span class="label label-blue">{{$learn->l_mtdach1}}%</span>
                                    @elseif (($learn->l_mtdach1<110)&&($learn->l_mtdach1>=105))
                                    <span class="label label-ijotua">{{$learn->l_mtdach1}}%</span>
                                    @elseif (($learn->l_mtdach1<105)&&($learn->l_mtdach1>=100))
                                    <span class="label label-success">{{$learn->l_mtdach1}}%</span>
                                    @elseif (($learn->l_mtdach1<100)&&($learn->l_mtdach1>=95))
                                    <span class="label label-warning">{{$learn->l_mtdach1}}%</span>
                                    @elseif($learn->l_mtdach1==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$learn->l_mtdach1}}%</span>
                                    @endif
                                </td>
                                <td>{{$learn->l_ytdactual1}}</td>
                                <td>{{$learn->l_ytdtarget1}}</td>
                                <td>
                                    @if($learn->l_ytdach1>=110)
                                    <span class="label label-blue">{{$learn->l_ytdach1}}%</span>
                                    @elseif (($learn->l_ytdach1<110)&&($learn->l_ytdach1>=105))
                                    <span class="label label-ijotua">{{$learn->l_ytdach1}}%</span>
                                    @elseif (($learn->l_ytdach1<105)&&($learn->l_ytdach1>=100))
                                    <span class="label label-success">{{$learn->l_ytdach1}}%</span>
                                    @elseif (($learn->l_ytdach1<100)&&($learn->l_ytdach1>=95))
                                    <span class="label label-warning">{{$learn->l_ytdach1}}%</span>
                                    @elseif($learn->l_ytdach1==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$learn->l_ytdach1}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>L2</td>
                                <td>Support 4.0</td>
                                <td>{{$learn->l_kpitype2}}</td>
                                <td>{{$learn->l_mtdactual2}}</td>
                                <td>{{$learn->l_mtdtarget2}}</td>
                                <td>
                                    @if($learn->l_mtdach2>=110)
                                    <span class="label label-blue">{{$learn->l_mtdach2}}%</span>
                                    @elseif (($learn->l_mtdach2<110)&&($learn->l_mtdach2>=105))
                                    <span class="label label-ijotua">{{$learn->l_mtdach2}}%</span>
                                    @elseif (($learn->l_mtdach2<105)&&($learn->l_mtdach2>=100))
                                    <span class="label label-success">{{$learn->l_mtdach2}}%</span>
                                    @elseif (($learn->l_mtdach2<100)&&($learn->l_mtdach2>=95))
                                    <span class="label label-warning">{{$learn->l_mtdach2}}%</span>
                                    @elseif($learn->l_mtdach2==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$learn->l_mtdach2}}%</span>
                                    @endif
                                </td>
                                <td>{{$learn->l_ytdactual2}}</td>
                                <td>{{$learn->l_ytdtarget2}}</td>
                                <td>
                                    @if($learn->l_ytdach2>=110)
                                    <span class="label label-blue">{{$learn->l_ytdach2}}%</span>
                                    @elseif (($learn->l_ytdach2<110)&&($learn->l_ytdach2>=105))
                                    <span class="label label-ijotua">{{$learn->l_ytdach2}}%</span>
                                    @elseif (($learn->l_ytdach2<105)&&($learn->l_ytdach2>=100))
                                    <span class="label label-success">{{$learn->l_ytdach2}}%</span>
                                    @elseif (($learn->l_ytdach2<100)&&($learn->l_ytdach2>=95))
                                    <span class="label label-warning">{{$learn->l_ytdach2}}%</span>
                                    @elseif($learn->l_ytdach2==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$learn->l_ytdach2}}%</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>L3</td>
                                <td>TPM Pillar :(Brain Group) Steps & projects implemented, reviewed, monitored</td>
                                <td>{{$learn->l_kpitype1}}</td>
                                <td>{{$learn->l_mtdactual3}}</td>
                                <td>{{$learn->l_mtdtarget3}}</td>
                                <td>
                                    @if($learn->l_mtdach3>=110)
                                    <span class="label label-blue">{{$learn->l_mtdach3}}%</span>
                                    @elseif (($learn->l_mtdach3<110)&&($learn->l_mtdach3>=105))
                                    <span class="label label-ijotua">{{$learn->l_mtdach3}}%</span>
                                    @elseif (($learn->l_mtdach3<105)&&($learn->l_mtdach3>=100))
                                    <span class="label label-success">{{$learn->l_mtdach3}}%</span>
                                    @elseif (($learn->l_mtdach3<100)&&($learn->l_mtdach3>=95))
                                    <span class="label label-warning">{{$learn->l_mtdach3}}%</span>
                                    @elseif($learn->l_mtdach3==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$learn->l_mtdach3}}%</span>
                                    @endif
                                </td>
                                <td>{{$learn->l_ytdactual3}}</td>
                                <td>{{$learn->l_ytdtarget3}}</td>
                                <td>
                                    @if($learn->l_ytdach3>=110)
                                    <span class="label label-blue">{{$learn->l_ytdach3}}%</span>
                                    @elseif (($learn->l_ytdach3<110)&&($learn->l_ytdach3>=105))
                                    <span class="label label-ijotua">{{$learn->l_ytdach3}}%</span>
                                    @elseif (($learn->l_ytdach3<105)&&($learn->l_ytdach3>=100))
                                    <span class="label label-success">{{$learn->l_ytdach3}}%</span>
                                    @elseif (($learn->l_ytdach3<100)&&($learn->l_ytdach3>=95))
                                    <span class="label label-warning">{{$learn->l_ytdach3}}%</span>
                                    @elseif($learn->l_ytdach3==null)
                                    <span></span>
                                    @else
                                    <span class="label label-danger">{{$learn->l_ytdach3}}%</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
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
<div class="modal fade" id="addfinancial" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('financial.post') }}" method="POST">
                @csrf 
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="bulan" required>
                    </div>
                    <div class="form-group">
                            <label for="txtTrainingType" class="control-label mb-5">Tipe</label>
                            <select name="kpitype" class="form-control">
                            <option value="Maximizing">Maximizing</option>
                            <option value="Minimizing">Minimizing</option>
                            <option value="Stabilizing">Stabilizing</option>
                            </select>                        
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">Net Sales</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="netsales_mtd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="netsales_ytd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="netsales_mtdtarget" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="netsales_ytdtarget" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font mb-5 judul" align="center">HR Cost</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="hrcost_mtd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="hrcost_ytd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="hrcost_mtdtarget" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="hrcost_ytdtarget" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">Employee</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="employee_mtd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="employee_ytd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="employee_mtdtarget" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="employee_ytdtarget" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">GP</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="gp_mtd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="gp_ytd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="gp_mtdtarget" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="gp_ytdtarget" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">OP</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label mb-0">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="op_mtd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="op_ytd" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="op_mtdtarget" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="op_ytdtarget" required>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="addbusiness" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('business.post') }}" method="POST">
                @csrf 
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="bulan" required>
                </div>
                <div class="table-wrap">
                <div class="table-responsive">
                <table class="table table-hover font-11 table-bordered mb-30 text-center">
                    <thead> 
                        <tr>
                            <th rowspan="2" class="text-center">References</th>
                            <th rowspan="2" class="text-center">KPI</th>
                            <th rowspan="2" class="text-center">KPI Type</th>
                              
                            <th colspan="3" class="text-center">MTD</th>    
                            <th colspan="3" class="text-center">YTD</th>    
                        </tr>
                        <tr>
                            
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>B1</td>
                            <td>Proper Award</td>
                            <td>
                                <select name="kpitype1">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="mtdactual1"></textarea></td>
                            <td><textarea rows="2" name="mtdtarget1"></textarea></td>
                            <td><textarea rows="2" name="mtdach1"></textarea></td>
                            <td><textarea rows="2" name="ytdactual1"></textarea></td>
                            <td><textarea rows="2" name="ytdtarget1"></textarea></td>
                            <td><textarea rows="2" name="ytdach1"></textarea></td>
                        </tr>
                        <tr>
                            <td>B2</td>
                            <td>Matrix score(Audit 9001, unannounce FSSC, Audit ISO 45001, Audit corporate, GM5P Audit, CPPOB, PMR)</td>
                            <td>
                                <select name="kpitype2">
                                <option value="Minimizing">Minimizing</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="mtdactual2"></textarea></td>
                            <td><textarea rows="2" name="mtdtarget2"></textarea></td>
                            <td><textarea rows="2" name="mtdach2"></textarea></td>
                            <td><textarea rows="2" name="ytdactual2"></textarea></td>
                            <td><textarea rows="2" name="ytdtarget2"></textarea></td>
                            <td><textarea rows="2" name="ytdach2"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('customer.post') }}" method="POST">
                @csrf 
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="c_bulan" required>
                </div>
                <div class="table-wrap">
                <div class="table-responsive">
                <table class="table table-hover font-11 table-bordered mb-30 text-center">
                    <thead> 
                        <tr>
                            <th rowspan="2" class="text-center">References</th>
                            <th rowspan="2" class="text-center">KPI</th>
                            <th rowspan="2" class="text-center">KPI Type</th>
                              
                            <th colspan="3" class="text-center">MTD</th>    
                            <th colspan="3" class="text-center">YTD</th>    
                        </tr>
                        <tr>
                            
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>C1</td>
                            <td>Covid-19 prevention activity implementation & Booster 100% for employee</td>
                                <td>
                                <select name="c_kpitype1">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="c_mtdactual1"></textarea></td>
                            <td><textarea rows="2" name="c_mtdtarget1"></textarea></td>
                            <td><textarea rows="2" name="c_mtdach1"></textarea></td>
                            <td><textarea rows="2" name="c_ytdactual1"></textarea></td>
                            <td><textarea rows="2" name="c_ytdtarget1"></textarea></td>
                            <td><textarea rows="2" name="c_ytdach1"></textarea></td>
                        </tr>
                        <tr>
                            <td>C2</td>
                            <td>Support SDGS (6. Clean water and sanitation)</td>
                            <td>
                                <select name="c_kpitype2">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="c_mtdactual2"></textarea></td>
                            <td><textarea rows="2" name="c_mtdtarget2"></textarea></td>
                            <td><textarea rows="2" name="c_mtdach2"></textarea></td>
                            <td><textarea rows="2" name="c_ytdactual2"></textarea></td>
                            <td><textarea rows="2" name="c_ytdtarget2"></textarea></td>
                            <td><textarea rows="2" name="c_ytdach2"></textarea></td>
                        </tr>
                        <tr>
                            <td>C3</td>
                            <td>IR-ER(Matrix)</td>
                            <td>
                                <select name="c_kpitype3">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="c_mtdactual3"></textarea></td>
                            <td><textarea rows="2" name="c_mtdtarget3"></textarea></td>
                            <td><textarea rows="2" name="c_mtdach3"></textarea></td>
                            <td><textarea rows="2" name="c_ytdactual3"></textarea></td>
                            <td><textarea rows="2" name="c_ytdtarget3"></textarea></td>
                            <td><textarea rows="2" name="c_ytdach3"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<div class="modal fade" id="addlearn" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="{{ route('learn.post') }}" method="POST">
                @csrf 
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="l_bulan" required>
                </div>
                <div class="table-wrap">
                <div class="table-responsive">
                <table class="table table-hover font-11 table-bordered mb-30 text-center">
                    <thead> 
                        <tr>
                            <th rowspan="2" class="text-center">References</th>
                            <th rowspan="2" class="text-center">KPI</th>
                            <th rowspan="2" class="text-center">KPI Type</th>
                              
                            <th colspan="3" class="text-center">MTD</th>    
                            <th colspan="3" class="text-center">YTD</th>    
                        </tr>
                        <tr>
                            
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>L1</td>
                            <td>Talent management (Readiness) dalam Matrix Talent Management</td>
                                <td>
                                <select name="l_kpitype1">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="l_mtdactual1"></textarea></td>
                            <td><textarea rows="2" name="l_mtdtarget1"></textarea></td>
                            <td><textarea rows="2" name="l_mtdach1"></textarea></td>
                            <td><textarea rows="2" name="l_ytdactual1"></textarea></td>
                            <td><textarea rows="2" name="l_ytdtarget1"></textarea></td>
                            <td><textarea rows="2" name="l_ytdach1"></textarea></td>
                        </tr>
                        <tr>
                            <td>L2</td>
                            <td>Support 4.0</td>
                            <td>
                                <select name="l_kpitype2">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="l_mtdactual2"></textarea></td>
                            <td><textarea rows="2" name="l_mtdtarget2"></textarea></td>
                            <td><textarea rows="2" name="l_mtdach2"></textarea></td>
                            <td><textarea rows="2" name="l_ytdactual2"></textarea></td>
                            <td><textarea rows="2" name="l_ytdtarget2"></textarea></td>
                            <td><textarea rows="2" name="l_ytdach2"></textarea></td>
                        </tr>
                        <tr>
                            <td>L3</td>
                            <td>TPM Pillar :(Brain Group) Steps & projects implemented, reviewed, monitored</td>
                            <td>
                                <select name="l_kpitype3">
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="l_mtdactual3"></textarea></td>
                            <td><textarea rows="2" name="l_mtdtarget3"></textarea></td>
                            <td><textarea rows="2" name="l_mtdach3"></textarea></td>
                            <td><textarea rows="2" name="l_ytdactual3"></textarea></td>
                            <td><textarea rows="2" name="l_ytdtarget3"></textarea></td>
                            <td><textarea rows="2" name="l_ytdach3"></textarea></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Add</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
<!-- end add modal -->
<!-- edit modal -->
@foreach($balancescorecard as $balance)
<div class="modal fade" id="updatefinancial{{$balance->idfinancial}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="/balacescorecard/{{$balance->idfinancial}}" method="POST">
                @csrf
                @method('put') 
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="bulan" value="{{$balance->bulan}}" required>
                    </div>
                    <div class="form-group">
                            <label for="txtTrainingType" class="control-label mb-5">Tipe</label>
                            <select name="kpitype" class="form-control">
                            <option value="Maximizing">Maximizing</option>
                            <option value="Minimizing">Minimizing</option>
                            <option value="Stabilizing">Stabilizing</option>
                            </select>                        
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">Net Sales</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="netsales_mtd" value="{{$balance->netsales_mtd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="netsales_ytd" value="{{$balance->netsales_ytd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="netsales_mtdtarget" value="{{$balance->netsales_mtdtarget}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="netsales_ytdtarget" value="{{$balance->netsales_ytdtarget}}" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font mb-5 judul" align="center">HR Cost</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="hrcost_mtd" value="{{$balance->hrcost_mtd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="hrcost_ytd" value="{{$balance->hrcost_ytd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="hrcost_mtdtarget" value="{{$balance->hrcost_mtdtarget}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="hrcost_ytdtarget" value="{{$balance->hrcost_ytdtarget}}" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">Employee</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="employee_mtd" value="{{$balance->employee_mtd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="employee_ytd" value="{{$balance->employee_ytd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="employee_mtdtarget" value="{{$balance->employee_mtdtarget}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="employee_ytdtarget" value="{{$balance->employee_ytdtarget}}" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">GP</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="gp_mtd" value="{{$balance->gp_mtd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="gp_ytd" value="{{$balance->gp_ytd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="gp_mtdtarget" value="{{$balance->gp_mtdtarget}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="gp_ytdtarget" value="{{$balance->gp_ytdtarget}}" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font judul" align="center">OP</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="" class="control-label mb-0">Actual Mtd</label>
                            <input type="text" class="form-control" id="" name="op_mtd" value="{{$balance->op_mtd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Actual Ytd</label>
                            <input type="text" class="form-control" id="" name="op_ytd" value="{{$balance->op_ytd}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Mtd</label>
                            <input type="text" class="form-control" id="" name="op_mtdtarget" value="{{$balance->op_mtdtarget}}" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="" class="control-label">Target Ytd</label>
                            <input type="text" class="form-control" id="" name="op_ytdtarget" value="{{$balance->op_ytdtarget}}" required>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($bscbusiness as $business)
<div class="modal fade" id="updatebusines{{$business->idbussiness}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="/balacescorecard/business/{{$business->idbussiness}}" method="POST">
                @csrf 
                @method('put')
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="bulan" value="{{$business->bulan}}" required>
                </div>
                <div class="table-wrap">
                <div class="table-responsive">
                <table class="table table-hover font-11 table-bordered mb-30 text-center" width="99%">
                    <thead> 
                        <tr>
                            <th rowspan="2" class="text-center">References</th>
                            <th rowspan="2" class="text-center">KPI</th>
                            <th rowspan="2" class="text-center">KPI Type</th>
                              
                            <th colspan="3" class="text-center">MTD</th>    
                            <th colspan="3" class="text-center">YTD</th>    
                        </tr>
                        <tr>
                            
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>B1</td>
                            <td>Proper Award</td>
                            <td>
                                <select name="kpitype1">
                                <option value="{{$business->kpitype1}}">{{$business->kpitype1}}</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="mtdactual1">{{$business->mtdactual1}}</textarea></td>
                            <td><textarea rows="2" name="mtdtarget1">{{$business->mtdtarget1}}</textarea></td>
                            <td><textarea rows="2" name="mtdach1">{{$business->mtdach1}}</textarea></td>
                            <td><textarea rows="2" name="ytdactual1">{{$business->ytdactual1}}</textarea></td>
                            <td><textarea rows="2" name="ytdtarget1">{{$business->ytdtarget1}}</textarea></td>
                            <td><textarea rows="2" name="ytdach1">{{$business->ytdach1}}</textarea></td>
                        </tr>
                        <tr>
                            <td>B2</td>
                            <td>Matrix score(Audit 9001, unannounce FSSC, Audit ISO 45001, Audit corporate, GM5P Audit, CPPOB, PMR)</td>
                            <td>
                                <select name="kpitype2">
                                <option value="{{$business->kpitype2}}">{{$business->kpitype2}}</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="mtdactual2">{{$business->mtdactual2}}</textarea></td>
                            <td><textarea rows="2" name="mtdtarget2">{{$business->mtdtarget2}}</textarea></td>
                            <td><textarea rows="2" name="mtdach2">{{$business->mtdach2}}</textarea></td>
                            <td><textarea rows="2" name="ytdactual2">{{$business->ytdactual2}}</textarea></td>
                            <td><textarea rows="2" name="ytdtarget2">{{$business->ytdtarget2}}</textarea></td>
                            <td><textarea rows="2" name="ytdach2">{{$business->ytdach2}}</textarea></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($bsccustomer as $customer)
<div class="modal fade" id="updatecustomer{{$customer->idcustomer}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="/balacescorecard/customer/{{$customer->idcustomer}}" method="POST">
                @csrf 
                @method('put')
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="c_bulan" value="{{$customer->c_bulan}}" required>
                </div>
                <div class="table-wrap">
                <div class="table-responsive">
                <table class="table table-hover font-11 table-bordered mb-30 text-center">
                    <thead> 
                        <tr>
                            <th rowspan="2" class="text-center">References</th>
                            <th rowspan="2" class="text-center">KPI</th>
                            <th rowspan="2" class="text-center">KPI Type</th>
                              
                            <th colspan="3" class="text-center">MTD</th>    
                            <th colspan="3" class="text-center">YTD</th>    
                        </tr>
                        <tr>
                            
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>C1</td>
                            <td>Covid-19 prevention activity implementation & Booster 100% for employee</td>
                            <td>
                                <select name="c_kpitype1">
                                <option value="{{$customer->c_kpitype1}}">{{$customer->c_kpitype1}}</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="c_mtdactual1">{{$customer->c_mtdactual1}}</textarea></td>
                            <td><textarea rows="2" name="c_mtdtarget1">{{$customer->c_mtdtarget1}}</textarea></td>
                            <td><textarea rows="2" name="c_mtdach1">{{$customer->c_mtdach1}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdactual1">{{$customer->c_ytdactual1}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdtarget1">{{$customer->c_ytdtarget1}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdach1">{{$customer->c_ytdach1}}</textarea></td>
                        </tr>
                        <tr>
                            <td>C2</td>
                            <td>Support SDGS (6. Clean water and sanitation)</td>
                            <td>
                                <select name="c_kpitype2">
                                <option value="{{$customer->c_kpitype2}}">{{$customer->c_kpitype2}}</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="c_mtdactual2">{{$customer->c_mtdactual2}}</textarea></td>
                            <td><textarea rows="2" name="c_mtdtarget2">{{$customer->c_mtdtarget2}}</textarea></td>
                            <td><textarea rows="2" name="c_mtdach2">{{$customer->c_mtdach2}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdactual2">{{$customer->c_ytdactual2}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdtarget2">{{$customer->c_ytdtarget2}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdach2">{{$customer->c_ytdach2}}</textarea></td>
                        </tr>
                        <tr>
                            <td>C3</td>
                            <td>IR-ER(Matrix)</td>
                            <td>
                                <select name="c_kpitype3">
                                <option value="{{$customer->c_kpitype3}}">{{$customer->c_kpitype3}}</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="c_mtdactual3">{{$customer->c_mtdactual3}}</textarea></td>
                            <td><textarea rows="2" name="c_mtdtarget3">{{$customer->c_mtdtarget3}}</textarea></td>
                            <td><textarea rows="2" name="c_mtdach3">{{$customer->c_mtdach3}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdactual3">{{$customer->c_ytdactual3}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdtarget3">{{$customer->c_ytdtarget3}}</textarea></td>
                            <td><textarea rows="2" name="c_ytdach3">{{$customer->c_ytdach3}}</textarea></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Save</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
@endforeach
@foreach($bsclearn as $learn)
<div class="modal fade" id="updatelearn{{$learn->idlearngrowth}}" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="add-userLabel1">Tambah Data</h5>
                </div>
                <div class="modal-body">
                <form action="/balacescorecard/learngrowth/{{$learn->idlearngrowth}}" method="POST">
                @csrf 
                @method('put')
                <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="l_bulan" value="{{$learn->l_bulan}}" required>
                </div>
                <div class="table-wrap">
                <div class="table-responsive">
                <table class="table table-hover font-11 table-bordered mb-30 text-center">
                    <thead> 
                        <tr>
                            <th rowspan="2" class="text-center">References</th>
                            <th rowspan="2" class="text-center">KPI</th>
                            <th rowspan="2" class="text-center">KPI Type</th>
                              
                            <th colspan="3" class="text-center">MTD</th>    
                            <th colspan="3" class="text-center">YTD</th>    
                        </tr>
                        <tr>
                            
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                            <th class="text-center">actual</th>
                            <th class="text-center">target</th>
                            <th class="text-center">ach</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>L1</td>
                            <td>Talent management (Readiness) dalam Matrix Talent Management</td>
                            <td>
                                <select name="l_kpitype1">
                                <option value="{{$learn->l_kpitype1}}">{{$learn->l_kpitype1}}</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="l_mtdactual1">{{$learn->l_mtdactual1}}</textarea></td>
                            <td><textarea rows="2" name="l_mtdtarget1">{{$learn->l_mtdtarget1}}</textarea></td>
                            <td><textarea rows="2" name="l_mtdach1">{{$learn->l_mtdach1}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdactual1">{{$learn->l_ytdactual1}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdtarget1">{{$learn->l_ytdtarget1}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdach1">{{$learn->l_ytdach1}}</textarea></td>
                        </tr>
                        <tr>
                            <td>L2</td>
                            <td>Support 4.0</td>
                            <td>
                                <select name="l_kpitype2">
                                <option value="{{$learn->l_kpitype2}}">{{$learn->l_kpitype2}}</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="l_mtdactual2">{{$learn->l_mtdactual2}}</textarea></td>
                            <td><textarea rows="2" name="l_mtdtarget2">{{$learn->l_mtdtarget2}}</textarea></td>
                            <td><textarea rows="2" name="l_mtdach2">{{$learn->l_mtdach2}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdactual2">{{$learn->l_ytdactual2}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdtarget2">{{$learn->l_ytdtarget2}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdach2">{{$learn->l_ytdach2}}</textarea></td>
                        </tr>
                        <tr>
                            <td>L3</td>
                            <td>TPM Pillar :(Brain Group) Steps & projects implemented, reviewed, monitored</td>
                            <td>
                                <select name="l_kpitype3">
                                <option value="{{$learn->l_kpitype3}}">{{$learn->l_kpitype3}}</option>
                                <option value="Minimizing">Minimizing</option>
                                <option value="Maximizing">Maximizing</option>
                                <option value="Stabilizing">Stabilizing</option>
                                </select>
                            </td>
                            <td><textarea rows="2" name="l_mtdactual3">{{$learn->l_mtdactual3}}</textarea></td>
                            <td><textarea rows="2" name="l_mtdtarget3">{{$learn->l_mtdtarget3}}</textarea></td>
                            <td><textarea rows="2" name="l_mtdach3">{{$learn->l_mtdach3}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdactual3">{{$learn->l_ytdactual3}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdtarget3">{{$learn->l_ytdtarget3}}</textarea></td>
                            <td><textarea rows="2" name="l_ytdach3">{{$learn->l_ytdach3}}</textarea></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-xs">Save</button>
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

$('.displayz').dataTable( {
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

$(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-dismissable").alert('close');
});

// alert-dismissable
</script>
@endpush