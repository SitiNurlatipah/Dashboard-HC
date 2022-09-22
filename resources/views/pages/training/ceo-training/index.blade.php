@extends('layouts.master')

@section('title', 'Ceo Training')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">CEO Training</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                        <div class="form-group mb-0">
                            <label class="control-label col-sm-3">Date Range Pick</label>
                            <div class="col-sm-4">
                                <input class="form-control input-daterange-datepicker" type="text" name="dateFilter" value="01/01/2016 - 01/31/2016"/>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
$('input[name="dateFilter"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
</script>
@endpush