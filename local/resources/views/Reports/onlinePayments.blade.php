@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   <!--@include('inventory.topmenu')-->
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Online Payments</h3></div>
	  
	</div>

	
	<div class="card-body" style="padding:5px;">
	  @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif
        
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
<div class="table-responsive">
	  <table class="table table-striped table-bordered dt-responsive nowrap">
	  <tr class="table-warning">
		<th>ID</th>
		<th>Sl.no</th>
		<th>Payment Status</th>
		<th>Attempt type</th>
		<th>Gateway</th>
		<th>Order No</th>
		<th>Invoice No</th>
		<th>Transaction ID</th>
		<th>User Name</th>
		<th>Customer Name</th>
		<th>Franchise Name</th>
		<th>Branch</th>
		<th>Mobile</th>
		<th>Package Name</th>
		<th>Sub package</th>
		<th>Duration</th>
		<th>Invoice amount</th>
		<th>Paid amount</th>
		<th>Bank transaction id</th>
		<th>Bank name</th>
		<th>Created at</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
		<td>{{ $datarow->id }}</td>
		<td>{{ $datarow->serial_number }}</td>
		<td>{{ $datarow->payment_status }}</td>
		<td>{{ $datarow->attempt_type }}</td>
		<td>{{ $datarow->gateway }}</td>
		<td>{{ $datarow->order_number }}</td>
		<td>{{ $datarow->invoice_number }}</td>
		<td>{{ $datarow->transaction_id }}</td>
		<td>{{ $datarow->user_name }}</td>
		<td>{{ $datarow->customer_name }}</td>
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->branch }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->package_name }}</td>
		<td>{{ $datarow->sub_package }}</td>
		<td>{{ $datarow->duration }}</td>
		<td>{{ $datarow->invoice_amount }}</td>
		<td>{{ $datarow->paid_amount }}</td>
		<td>{{ $datarow->bank_transaction_id }}</td>
		<td>{{ $datarow->bank_name }}</td>
		<td>{{ $datarow->created_at }}</td>
		</tr>
    @endforeach
	</table>
</div>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
