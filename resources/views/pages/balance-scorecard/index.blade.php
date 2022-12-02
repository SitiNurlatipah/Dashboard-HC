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
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissable mt-10 pb-5 pt-5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
            </div>
            @endif
            <div class="tab-content" id="myTabContent_7">
            <div  id="home_15" class="tab-pane fade active in" role="tabpanel">
                <button class="btn btn-primary btn-anim btn-xs"  data-toggle="modal" data-target="#addfinancial" data-whatever="@mdo"><i class="fa fa-pencil"></i><span class="btn-text">Add</span></button>
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover font-11 table-bordered displayz mb-30" width="100%" >
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
                            ?>
                            <tr>
                                <th colspan="13" class="text-center">{{date('F Y', strtotime($balance->bulan))}}</th>
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
                                    <span class="label label-default">{{number_format($hasilmtd1,0)}}%</span>
                                    @elseif (($hasilmtd1<110)&&($hasilmtd1>=105))
                                    <span class="label label-default">{{number_format($hasilmtd1,0)}}%</span>
                                    @elseif (($hasilmtd1<105)&&($hasilmtd1>=100))
                                    <span class="label label-success">{{number_format($hasilmtd1,0)}}%</span>
                                    @elseif (($hasilmtd1<100)&&($hasilmtd1>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd1,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd1,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd1,2,',','.')}}</td>
                                <td></td>
                                <td>c</td>
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
                                    <span class="label label-default">{{number_format($hasilmtd2,0)}}%</span>
                                    @elseif (($hasilmtd2<110)&&($hasilmtd2>=105))
                                    <span class="label label-default">{{number_format($hasilmtd2,0)}}%</span>
                                    @elseif (($hasilmtd2<105)&&($hasilmtd2>=100))
                                    <span class="label label-success">{{number_format($hasilmtd2,0)}}%</span>
                                    @elseif (($hasilmtd2<100)&&($hasilmtd2>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd2,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd2,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd2,2,',','.')}}</td>
                                <td></td>
                                <td>c</td>
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
                                    <span class="label label-default">{{number_format($hasilmtd3,0)}}%</span>
                                    @elseif (($hasilmtd3<110)&&($hasilmtd3>=105))
                                    <span class="label label-default">{{number_format($hasilmtd3,0)}}%</span>
                                    @elseif (($hasilmtd3<105)&&($hasilmtd3>=100))
                                    <span class="label label-success">{{number_format($hasilmtd3,0)}}%</span>
                                    @elseif (($hasilmtd3<100)&&($hasilmtd3>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd3,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd3,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd3,2,',','.')}}</td>
                                <td></td>
                                <td>c</td>
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
                                    <span class="label label-default">{{number_format($hasilmtd4,0)}}%</span>
                                    @elseif (($hasilmtd4<110)&&($hasilmtd4>=105))
                                    <span class="label label-default">{{number_format($hasilmtd4,0)}}%</span>
                                    @elseif (($hasilmtd4<105)&&($hasilmtd4>=100))
                                    <span class="label label-success">{{number_format($hasilmtd4,0)}}%</span>
                                    @elseif (($hasilmtd4<100)&&($hasilmtd4>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd4,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd4,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd4,2,',','.')}}</td>
                                <td></td>
                                <td>c</td>
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
                                    <span class="label label-default">{{number_format($hasilmtd5,0)}}%</span>
                                    @elseif (($hasilmtd5<110)&&($hasilmtd5>=105))
                                    <span class="label label-default">{{number_format($hasilmtd5,0)}}%</span>
                                    @elseif (($hasilmtd5<105)&&($hasilmtd5>=100))
                                    <span class="label label-success">{{number_format($hasilmtd5,0)}}%</span>
                                    @elseif (($hasilmtd5<100)&&($hasilmtd5>=95))
                                    <span class="label label-warning">{{number_format($hasilmtd5,0)}}%</span>
                                    @else
                                    <span class="label label-danger">{{number_format($hasilmtd5,0)}}%</span>
                                    @endif
                                </td>
                                <td>{{number_format($actualytd5,2,',','.')}}</td>
                                <td></td>
                                <td>c</td>
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
                                <td></td>
                                <td>c</td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div  id="profile_15" class="tab-pane fade" role="tabpanel">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="coba" class="table table-hover font-11 table-bordered displayz mb-30 text-center" width="100%">
                            <thead>
                            <tr>
                                <th colspan="13" class="text-center">x</th>
                            </tr>
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
                            </thead>
                            <tbody>
                            <tr>
                                <td>B1</td>
                                <td>Net sales / HR Cost</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            <tr>
                                <td>B2</td>
                                <td>Net sales / # of employee</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div  id="profile_16" class="tab-pane fade" role="tabpanel">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover font-11 table-bordered displayz mb-30 text-center" width="100%" >
                            <thead>
                            <tr>
                                <th colspan="13" class="text-center">x</th>
                            </tr>
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
                            </thead>
                            <tbody>
                            <tr>
                                <td>C1</td>
                                <td>Net sales / HR Cost</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            <tr>
                                <td>C2</td>
                                <td>Net sales / # of employee</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            <tr>
                                <td>C3</td>
                                <td>Net sales / # of employee</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div  id="profile_17" class="tab-pane fade" role="tabpanel">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="" class="table table-hover font-11 table-bordered displayz mb-30 text-center" width="100%">
                            <thead>
                            <tr>
                                <th colspan="13" class="text-center">x</th>
                            </tr>
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
                            </thead>
                            <tbody>
                            <tr>
                                <td>L1</td>
                                <td>Net sales / HR Cost</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            <tr>
                                <td>L2</td>
                                <td>Net sales / # of employee</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            <tr>
                                <td>L3</td>
                                <td>Net sales / # of employee</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                            </tr>
                            </tbody>
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
                <form action="" method="POST">
                @csrf 
                    <div class="form-group">
                        <label for="dateBulan" class="control-label mb-10">Bulan</label>
                        <input type="date" class="form-control" id="bulan" name="bulan" required>
                    </div>
                    <div class="form-group">
                            <label for="txtTrainingType" class="control-label mb-5">Tipe</label>
                            <select name="txtTrainingType" class="form-control">
                            <option value="Internal">Maximizing</option>
                            <option value="External">Minimizing</option>
                            <option value="In House">Stabilizing</option>
                            </select>                        
                    </div>
                    <h6 class="txt-dark capitalize-font" align="center">Net Sales</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font mb-5" align="center">HR Cost</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font" align="center">Employee</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font" align="center">GP</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                    </div>
                    <h6 class="txt-dark capitalize-font" align="center">------OP-----</h6>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label mb-0">Actual Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Actual Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Mtd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
                        </div>
                        <div class="col-sm-3">
                            <label for="dateBulan" class="control-label">Target Ytd</label>
                            <input type="number" class="form-control" id="dateBulan" name="intInternal" required>
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
@endsection
@push('script')
<script type="text/javascript">
$(document).ready(function () {
    $('table.displayz').DataTable();
    });
</script>
@endpush