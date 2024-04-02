@extends('layouts.franchise')

@section('content')

<style>
.min200{min-width: 200px !important;}
.min250{min-width: 250px !important;}
.min300{min-width: 300px !important;}
table.table th{min-width: 100px;}
</style>    

    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Payment History</h3></div>
	  
	</div>
	
	
	<div class="card-body table-responsive" style="padding:5px;font-size: 12px;">
	  @if (session('success_message'))
	<div class="container">
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('success_message') !!}</p>
		</div>
	</div>
	@endif

	@if (session('error_message'))
	<div class="container">
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('error_message') !!}</p>
		</div>
	</div>
	@endif
	  
	  <table class="table table-bordered table-condensed  table-striped" style="width:100%;">
	  <tr class="table-warning">
		<th>Transaction ID</th>
        <th>Amount</th>
		<th>Source</th>
		<th>Payment Type</th>
		<th>Status</th>
		<th>Created</th>
	  </tr>
	@if(count($data)>0)
	@foreach ($data as $datarow)
        <tr>
        <td>{{ $datarow->txnid }}</td>
		<td>{{ $datarow->amount }}</td>
		<td>{{ $datarow->payment_source }}</td>
		<td>{{ $datarow->payment_type }}</td>
		<td>{{ $datarow->status }}</td>
		<td><?php if(!empty($datarow->created_at)){echo date("d-m-Y",strtotime($datarow->created_at));} ?></td>
		</tr>
    @endforeach
    @else
	<tr>
		<td colspan="11">No Records Found</td>
	</tr>	
    @endif
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
