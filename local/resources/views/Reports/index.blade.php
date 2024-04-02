@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   <!--@include('inventory.topmenu')-->
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Deposit Reports</h3></div>
	  
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
	  <table class="table table-bordered table-compact">
	  <tr class="table-warning">
		<th>Name</th>
		<th>Deposit Amount</th>
		<th>Deposit Type</th>
		<th>Date</th>
		<th>Deposited From</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
		
		<td>{{ $datarow->name }}</td>	
		<td>{{ $datarow->deposit_amount }}</td>
                <td>{{ $datarow->deposit_type }}</td>
		<td>{{ $datarow->deposit_date }}</td>
		<td>
			@if($datarow->deposit_for == 1)
			<span class="badge badge-success">Franchise</span>
			@elseif($datarow->deposit_for == 2)
			<span class="badge badge-warning">Branch</span>
			@endif
		</td>
		</tr>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
