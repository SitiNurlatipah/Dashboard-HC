@extends('layouts.master')

@section('title', 'MppVsReal')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Mpp Vs Realization</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
            <div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Bulan</th>
														<th>Nama</th>
														<th>Office</th>
														<th>Age</th>
														<th>Start date</th>
														<th>Salary</th>
													</tr>
												</thead>
												
												<tbody>
                                                <?php
                                                $i=1; foreach($mpp_vs_realization as $mppreal): ?>
													<tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{ $mppreal->dateTglInput->format('d/m/Y') }}</td>
                                                    <td>{{ $mppreal->dateTglInput->format('F Y') }}</td>
                                                    <td>{{ $mppreal->intKaryawan }}</td>
                                                    <td>{{ $mppreal->intOutsource }}</td>
                                                    <td>{{ $mppreal->intContract }}</td>
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
<!-- /Row -->


@endsection


@push('script')

@endpush