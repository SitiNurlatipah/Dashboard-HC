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
            <div class="row">
			<div class="col-sm-12">
            <div class="form-horizontal form-group">
            <form action="{{ route('hrga.filter') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group row col-sm-11">
                        <label for="date" class="col-form-label text-right col-sm-2 pt-3">Filter Tahun</label>
                        <input type="text" class="form-control input-sm col-sm-3" name="year">
                        <button  type="submit" class="btn btn-success btn-anim btn-xs ml-10"><i class="icon-rocket"></i><span class="btn-text">filter</span></button>
                        <a class="btn btn-warning btn-anim btn-xs" href="{{ route('hrga') }}"><i class="fa fa-undo"></i><span class="btn-text">reset</span></a>
                    </div>
                        
                </form>
                </div>
                </div>
                </div>
                <div class="panel-body">
                <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="mpprealTable" class="table table-hover font-11 table-bordered display mb-30 text-center" >
                                        <thead>
                                        <tr>
                                                <th rowspan="2" class="text-center">Bulan</th>
                                                <th colspan="4" class="text-center">Employee Type</th>
                                                <th colspan="2" class="text-center">Adjusment MTD</th>
                                                <th rowspan="2" class="text-center">MTD Adjusment</th>
                                                <th rowspan="2" class="text-center">Action</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Permanen</th>
                                                <th class="text-center">Contract</th>
                                                <th class="text-center">Job Supply</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Add</th>
                                                <th class="text-center">Reduce</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        $i=1; foreach($mpp as $mppreal): ?>
                                            <tr>
                                            <td>{{$mppreal->dateBulan->format('F Y')}}</td>
                                            <td>{{ $mppreal->intMppPermanent }}</td>
                                            <td>{{ $mppreal->intMppContract }}</td>
                                            <td>{{ $mppreal->intMppJobSupply }}</td>
                                            <td>{{ $mppreal->intMppTotal }}</td>
                                            <td>{{ $mppreal->intAdd }}</td>
                                            <td>{{ $mppreal->intReduce }}</td>
                                            <td>{{ $mppreal->txtMtdAdjusment }}</td>
                                            <td>
                                            <form action="{{route('mppreal.delete',$mppreal->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <a class="btn btn-default btn-icon-anim btn-square btn-sm"  data-toggle="modal" data-target="#update{{$mppreal->id}}" data-whatever="@mdo"><i class="fa fa-pencil"></i></a>
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
            </div>
        </div>	
    </div>
</div>
@endsection