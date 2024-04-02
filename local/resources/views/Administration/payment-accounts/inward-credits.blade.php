@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Credits</h3></div>
	</div>

	<div class="card-body table-responsive" style="padding:5px;">
	    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif 
		@if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif

	  <table class="table table-bordered table-condensed  table-striped" style="width:100%;">
	  <tr class="table-warning">
		<!-- <th>Actions</th> -->
		<th>Serial No	</th>
		<th>Invoice Number</th>
		<th>Customer/Franchise/Branch Name</th>
		<th>Payment Type</th>
		<th>Date and Time</th>
		<th>Description</th>
		<th>Transaction ID/Receipt NO.</th>
		<th>Amount</th>
	  </tr>
	@foreach ($data as $key => $datarow)
        <tr>
		<td>{{ $datarow->id }}</td>
		<td><a  data-toggle="modal" data-target="#myModal" href="{{ url('admin/accounts/inward/credits/detail/' . $datarow->id . '/' . $datarow->payment_from) }}">{{ $datarow->invoice_number ? $datarow->invoice_number : '-'}}</a></td>
		<td>{{ $datarow->name ? $datarow->name : '-' }}</td>
		<td>{{ $datarow->inpayment_type ? $datarow->inpayment_type : '-' }}</td>
		<td>{{ $datarow->created_at ? date("d-m-y h:i a",strtotime($datarow->created_at)) : '-' }}</td>
		<td>{{ $datarow->payment_message ? $datarow->payment_message : '-' }}</td>
		<td>{{ $datarow->payment_gateway_txn_id ? $datarow->payment_gateway_txn_id : '-' }}</td>
		<td>{{ $datarow->amount }}</td>
		</tr>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
  <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		</div>
	</div>
</div>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{-- <style>
    .bs-example{
    	margin: 20px;
    }
</style> --}}

		  
@stop
