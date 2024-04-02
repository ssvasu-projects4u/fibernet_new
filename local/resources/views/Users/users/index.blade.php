@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('users.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Users</h3></div>
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
	  <table class="table table-bordered table-compact">
	  <tr class="table-warning">
		<th width="25">Actions</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Role</th>
		<th>Status</th>

	  </tr>
	@foreach ($data as $datarow)
	@if($datarow->status == 'Y' || $datarow->status == 'N')
        <tr>
		<td align="center">
		    @if($datarow->status == 'Y' || $datarow->status == 'N')	
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        @canany([
          "edit-user",
          "delete-user",
        ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-user")
              <li><a class="dropdown-item" href="{{url('admin/users/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
            @endcan
            @can("delete-user")
              <li><a class="dropdown-item" href="{{url('admin/users/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
            @endcan
          </ul>
        @endcanany
      </div>
      @endif
		</td>
	<td>
		@if($datarow->status == 'Y' || $datarow->status == 'N')	
			{{ $datarow->name }}
		@endif
		</td>
		<td>
		@if($datarow->status == 'Y' || $datarow->status == 'N')		
		{!! str_replace("e-", "", $datarow->email) !!}
		@endif
		</td>
		<td>
		@if($datarow->status == 'Y' || $datarow->status == 'N')	
		{{ $datarow->mobile }}
		@endif
		</td>		
		<td>
		@if($datarow->status == 'Y' || $datarow->status == 'N')	
			{{ $datarow->role }}
		@endif
		</td>
		<td>
		@if($datarow->status == 'Y' || $datarow->status == 'N')	
			@if($datarow->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($datarow->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($datarow->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		@endif
		</td>
		
		</tr>
		@endif
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
