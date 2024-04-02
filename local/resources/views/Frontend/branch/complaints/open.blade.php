@extends('layouts.branch')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	  @include('frontend.branch.complaints.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Open Complaints</h3></div>
	  
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
		<td>{{ ucfirst($datarow->priority) }}</td>
		<td>{{ $datarow->complaint_type }}</td>
		<td>{{ $datarow->complaint_sub_type }}</td>
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->customerid }}</td>
		<td>{{ $datarow->name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->call_from }}</td>
		<td align="center">
			{{ ucfirst($datarow->status) }} <br>
			<label class="badge badge-danger" onclick="changeAssignStatus('{{$datarow->id}}','assignnow')" style="cursor: pointer;">Schedule Now <i class="fas fa-external-link-alt"></i></label>
		</td>

		</tr>
    @endforeach
	</table>
	{{ $data->links() }}
	</div>
		
	<div class="modal fade" tabindex="-1" role="dialog" id="asignModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Expected Complaint Completion Time</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        {{ Form::open(array('route' => 'complaints.complaintstatusupdate','class' => 'form-horizontal')) }}
                        <input type="hidden" name="id" id="complaint_id" value="">
                        <div class="row">
                            <?php $schedule_time_hours = range(0, 10); ?>
                            <div class="form-group col-md-3"> {!! Form::label('schedule_time_hours', 'Hours') !!}
                                {!! Form::select('schedule_time_hours', $schedule_time_hours, 2,array('class' => 'form-control') ) !!}
                            </div>
                            <?php $schedule_time_minutes = range(0, 59); ?>
                            <div class="form-group col-md-3"> {!! Form::label('schedule_time_minutes', 'Minutes') !!}
                                {!! Form::select('schedule_time_minutes', $schedule_time_minutes, null,array('class' => 'form-control') ) !!}
                            </div>
                        </div>
                        {{ Form::token() }}
                        <input value="Change to In Progress" class="btn btn-success pull-right float-right" type="submit">
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" tabindex="-1" role="dialog" id="franchiseModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Franchise Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body" id="franchise_data">
                        &nbsp;
                    </div>
                </div>
            </div>
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
                if (data == 'true') {
                    location.reload(true);
                }

            }
        });
    }

    function changeAssignStatus(id, value) {
        $('#complaint_id').val(id);
        $('#asignModal').modal('show');
    }


    $(document).ready(function () {

        $('.franchisedetails').click(function () {
            var franchise_id = $(this).attr('data-franchise');
            $.ajax({
                url: "{{url('/admin/franchises/getdetails')}}/" + franchise_id,
                type: "GET",
                success: function (data) {
                    $('#franchise_data').html(data);
                    $('#franchiseModal').modal('show');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

    });

</script>
    
@stop
