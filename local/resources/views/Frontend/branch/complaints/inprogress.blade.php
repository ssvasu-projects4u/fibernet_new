@extends('layouts.branch')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('frontend.branch.complaints.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">In Progress Complaints</h3></div>
	  
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
		<th>Franchise</th>
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
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->customerid }}</td>
		<td>{{ $datarow->name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->call_from }}</td>
		<td>
			<select name="status" onchange="changeStatus('{{$datarow->id}}',this.value)">
				<option value="in progress" {{$datarow->status == 'in progress'?'selected':''}}> In Progress</option>
				<option value="resolved" {{$datarow->status == 'resolved'?'selected':''}}> Resolved</option>
			</select>
			<input type="hidden" id="token" name="_token" value="<?php echo csrf_token(); ?>">
		</td>		
		</tr>
    @endforeach
	</table>
	{{ $data->links() }}
	</div>
		
	
	
                               

	</div>
  </div>
  <script>
    function changeStatus(id, value) {
        var enrol = $('#token').val();
        $.ajax({
            url: "{{route('complaints.statusupdate')}}",
            data: {
                val: value,
                id: id,
                _token: enrol
            },
            type: 'POST',

            success: function (data) {
                location.reload(true);
            }
        });
    }
</script>
     
@stop
