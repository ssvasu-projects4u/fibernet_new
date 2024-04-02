@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('users.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Permissions</h3></div>
	  
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
	  <table class="table table-bordered table-condensed">
	  <tr class="table-warning">
		<th width="25">Actions</th>
		<th>Display Name</th>
		<th>Category</th>
		<th>Sub Category</th>
		<th>Is Sub Category</th>		
		<th>Status</th>	
	  </tr>
	@foreach ($data as $datarow)
        <tr>
		<td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        @canany([
          "edit-permission",
          "delete-permission"
        ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can("edit-permission")
            <li><a class="dropdown-item" href="{{url('admin/permissions/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            <li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can("delete-permission")
            <li><a class="dropdown-item" href="{{url('admin/permissions/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
          @endcan
        </ul>
        @endcanany
      </div>
		</td>
		<td>{{ $datarow->display_name }}</td>
		<td>{{ $datarow->category }}</td>
		<td>{{ $datarow->sub_category }}</td>
		<td>{!! $datarow->is_sub_category == 1 ?  'TRUE':  'FALSE' !!}</td>
    <td>
			@if($datarow->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($datarow->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($datarow->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		</td>
		</tr>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>	  
@stop