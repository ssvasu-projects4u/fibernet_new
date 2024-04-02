@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Employees</h3></div>
	  
	</div>

	<?php
		if(isset($_GET['city'])){$city_id = $_GET['city'];}else{$city_id = null;}
		if(isset($_GET['status'])){$status = $_GET['status'];}else{$status = null;}
		if(isset($_GET['department'])){$department = $_GET['department'];}else{$department = null;}
		if(isset($_GET['designation'])){$designation = $_GET['designation'];}else{$designation = null;}
		if(isset($_GET['role'])){$role = $_GET['role'];}else{$role = null;}
    ?>

	<div class="card-body">
	<form method="GET" accept-charset="UTF-8">
		<div class="row">
				<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
					{!! Form::select('city', $cities, $city_id,array('class' => 'form-control','placeholder'=>'-- Select City --') ) !!} </div>

				<?php $user_statuses = array('Y'=>'Active','N'=>'In Active'); ?>
        <div class="form-group  col-md-3"> {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', $user_statuses,$status,array('class' => 'form-control') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('department', 'Department') !!}
        {!! Form::select('department', $departments, $department,array('class' => 'form-control','placeholder'=>'-- Select Department --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('designation', 'Designation') !!}
        {!! Form::select('designation', $designations ,  $designation,array('class' => 'form-control','placeholder'=>'-- Select Designation --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('role', 'Role') !!}
        {!! Form::select('role', $roles,  $role,array('class' => 'form-control','placeholder'=>'-- Select Role --') ) !!} </div>
        </div>

			{!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
		</form>

	
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
		<table class="table table-bordered table-compact">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>SL.No</th>
		<th>City</th>
		<th>Photo</th>
		<th>Employee ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>		
		<th>Mobile</th>
		<th>Department</th>
		<th>Designation</th>
		<th>Role</th>		
		<th>Address</th>
		<th>Status</th>
	  </tr>
	@foreach ($data as $key => $datarow)
        <tr>
		<td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        @canany([
          "view-employee",
          "edit-employee",
          "delete-employee"
        ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can("view-employe")
						<li><a class="dropdown-item" href="{{url('admin/employees/show/'.$datarow->id)}}"><i class="fa fa-eye " aria-hidden="true"></i> show</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can("edit-employee")
						<li><a class="dropdown-item" href="{{url('admin/employees/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can("delete-employee")
	          <li><a class="dropdown-item" href="{{url('admin/employees/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
          @endcan
        </ul>
        @endcanany
      </div>
		</td>
		<td>{{ $key+1 }}</td>
		<td>{{ $datarow->city }}</td>
		<?php
			$path = asset('public/uploads/default-image.png');

			$src = asset('public/uploads/employees/'.$datarow->employee_photo);
			if($datarow->employee_photo !=''){
				$path = $src;
			}
		?>
		<td align="center"><img src="{{asset($path)}}" width="50"></td>
		<td>{{ $datarow->employee_id }}</td>
		<td><a>{{ $datarow->first_name }}</a></td>
		<td><a>{{ $datarow->last_name }}</a></td>
		<td><a>{!! str_replace("e-", "", $datarow->email) !!}</a></td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->department }}</td>
		<td>{{ $datarow->designation }}</td>
		<td>{{ $datarow->role }}</td>
		<td>{{ $datarow->address }}</td>
		<td>
			@if($datarow->status == 'Y')
			<span class="badge badge-success">Active</span>
        @can("update-employee-status")
			   <label class="badge badge-danger" onclick="changeAssignStatus('{{$datarow->id}}','assignnow')" style="cursor: pointer;">Update Status<i class="fas fa-external-link-alt"></i></label>
        @endcan
			@elseif($datarow->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($datarow->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		</td>
		</tr>
    @endforeach
	</table>
		</div>
		{{ $data->links() }}
	</div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="asignModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Resignation Details</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">

					{{ Form::open(['route' => 'employees.resign','class' => 'form-vertical', 'files'=>'true']) }}
					<input type="hidden" name="id" id="resign-id" value="">
					<div class="row">
						<div class="form-group col">
							{!! Form::label('resignation_date', 'Resign Date *') !!}
							{!! Form::date('resignation_date',
								date('Y-m-d'),
								array('class' => 'form-control datepicker',
								'required' => 'required',
								'id' => 'resign-date',
								'placeholder' => 'yyyy-mm-dd')
							) !!} @if ($errors->has('resignation_date'))
							<span class="help-block">
									<strong>{{ $errors->first('resignation_date') }}</strong>
							</span> @endif
						</div>
						<div class="form-group col">
							{!! Form::label('note', 'Note*') !!}
							{!! Form::textarea('note',null, array('class' => 'form-control','rows'=>2,
							'required'=>'required','placeholder'=>'Note')) !!}
						</div>
						</div>
						<div class="row">
						<div class="form-group col">
							{!! Form::label('resignation_letter', 'Resignation Letter') !!}
							{!! Form::file('resignation_letter',null, array('class' => 'form-control')) !!}
						</div>
						<div class="form-group col">
							<p></p>
							{{ Form::token() }}
							{!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
    $(document).ready(function() {
        $('#department').on('change', function() {
            var department = $(this).val();
            if(department == '' || department <=0){
                $('#designation').html("<option value=''>-- Select Designation --</option>");
                return;
            }
            $.ajax({
                url: "{{url('/admin/employees/department-designations')}}/"+department,
                type: "GET",
                success:function(data) {
                   $('#designation').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
    });
    function changeAssignStatus(id, value) {
        $('#resign-id').val(id);
        $('#asignModal').modal('show');
    }
</script>
@stop
