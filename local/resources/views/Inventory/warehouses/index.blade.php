@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Warehouses</h3></div>
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

        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif
	  <table class="table table-bordered">
	  <tr class="table-warning">
	  	<th>Actions</th>	
		<th>Warehouse Name</th>
		<th>City</th>
		<th>Address</th>
		<th>Description</th>
		<th>Status</th>	
	  </tr>
	@foreach ($data as $datarow)
        <tr>
        <td align="center">
			<div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
              @canany([
                "edit-warehouse",
                "delete-warehouse"
              ])
                <ul class="dropdown-menu dropdown-default" role="menu">
                  @can("edit-warehouse")                   
                    <li><a class="dropdown-item" href="{{url('admin/inventory/warehouse/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  @endcan
                  @can("delete-warehouse")
                    <li><a class="dropdown-item" href="{{url('admin/inventory/warehouse/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                  @endcan
                </ul>
              @endcanany
            </div>
		</td>	
		<td><a href="{{url('admin/inventory/warehouse/edit/'.$datarow->id)}}" title='edit'>{{ $datarow->warehouse_name }}</a></td>
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->address }}</td>
		<td>{{ $datarow->description }}</td>
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
