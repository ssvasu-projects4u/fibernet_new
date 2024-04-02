@extends('layouts.admin')
@section('content')


    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Payment Details</h3></div>
	  
	</div>

	<div class="card-body">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  
		<div class="row">
		<div class="col-md-6">
	    
		
	   <table class="table">
			<tr>
				<th>Name </th><td>{{$customerdetails->name}}</td>
			</tr>
			<tr>
				<th>Email</th><td>{{$customerdetails->email}}</td>
			</tr>
			<tr>
				<th>Mobile</th><td>{{$customerdetails->mobile}}</td>
			</tr>
	@php 
				$packagedetails = \App\BroadbandSubPackages::find($customerdetails->sub_package);
				@endphp
			<tr>
			    <?php
			    if(empty($packagedetails))
			    $packagedetails->total=0;
			    
			    ?>
			    @php
			   $grandtotal= ($packagedetails->total)+($customerdetails->installation_amount)+($customerdetails->secure_deposite_amount);
			   $grandtotal=$grandtotal-($customerdetails->discount_amount);
			    @endphp
				<th>Total Amount</th><td>Rs.{{ $grandtotal }}</td>
			</tr>
			<tr>
				<th>Paid Date</th><td>{{date("d-M-Y h:i:s a", strtotime($customerdetails->created_at))}}</td>
			</tr>
			<tr>
				<th>Transaction Id</th><td>{{$newtransactiondetails->txnid}}</td>
			</tr>
			<tr>
				<th>Status</th><td><span class="badge badge-success">{{$newtransactiondetails->status}}</span></td>
			</tr>
			<tr>
				<th style="border-bottom:none">&nbsp;</th><th style="border-bottom:none"><a class="btn btn-danger" href="{{ url('admin/customers/new')}}">Back to New Customers</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-primary" href="{{ url('admin/customers/add-technical/'.$customerdetails->id)}}">Proceed to Add Technical</a></td>
			</tr>
			
		</table>
</div>
		</div>
		 
	</div>
  </div>
@stop
