@extends('layouts.customer')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
		<div class="float-left"><h3 class="m-0 font-weight-bold text-primary">My Complaints</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;">
	  <div class="table-responsive">
	  <table class="table table-bordered table-condensed  table-striped" style="font-size:12px;">
	  <tr class="table-warning">
		<th>Ticket No</th>
		<th>Complaint Time</th>
		<th>Expected Close Time</th>
		<th>Priority</th>
		<th>Connection</th>
		<th>Complaint Type</th>
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
	</div>
	
	
	
	</div>
  </div>
  
@stop
