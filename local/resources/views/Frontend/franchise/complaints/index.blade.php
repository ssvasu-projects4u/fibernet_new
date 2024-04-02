@extends('layouts.franchise')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('frontend.franchise.complaints.topmenu')
	<div class="card-header py-2">
		<div class="float-left"><h3 class="m-0 font-weight-bold text-primary">All Complaints</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;">
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
	  <table class="table table-bordered table-condensed  table-striped" style="font-size:12px;">
	  <tr class="table-warning">
		<th>Ticket No</th>
		<th>Complaint Time</th>
		<th>Expected Close Time</th>
		<th>Priority</th>
		<th>Connection</th>
		<th>Complaint Type</th>
		<th>Customer Id</th>
		<th>Customer Name</th>
		<th>Mobile</th>
		<th>Call From</th>
		<th>Status</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
		<td><span class="badge badge-primary px-2 pt-2 pb-2">{{ $datarow->complaint_slno }}</span></td>
		<td>{{ date("d-M-Y h:i:s a",strtotime($datarow->created_at)) }}</td>
		<td>{{ !empty($datarow->expected_resolved_by)?date("d-M-Y h:i:s a",strtotime($datarow->expected_resolved_by)):"" }}</td>
		<td>{{ ucfirst($datarow->priority) }}</td>
		<td>{{ $datarow->complaint_type }}</td>
		<td>{{ $datarow->complaint_sub_type }}</td>
		<td>{{ $datarow->customerid }}</td>
		<td>{{ $datarow->name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->call_from }}</td>
		<td>
			<?php
				$badgestatus = "secondary";
				if($datarow->status == 'open'){$badgestatus = "danger";} 
				else if($datarow->status == 'in progress'){$badgestatus = "primary";} 
				else if($datarow->status == 'resolved'){$badgestatus = "warning";} 
				else if($datarow->status == 'closed'){$badgestatus = "success";} 
			?>

			<span class="badge badge-{{$badgestatus}} px-1 pt-1 pb-1">{{ucfirst($datarow->status)}}</span>
		</td>
		</tr>
    @endforeach
	</table>
	{{ $data->links() }}
	</div>

	</div>
  </div>
  
@stop
