<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];//exit;
    $layout='layouts.admin';
    if($roles[0]=='branch' || $roles[0]=='franchise'){
        //echo $roles[0];exit;
        $layout='layouts.'.$roles[0];    
    }
 ?> 
@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	  @include('technical.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">OLT</h3></div>
	  
	</div>
	
	
	
	<div class="card-body table-responsive" style="padding:5px;">
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


	  <table class="table table-bordered table-condensed  table-striped" style="width:100%;">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>City</th>
		<th>Distributor</th>
		<th>Branch</th>
		<th>OLT Serial No</th>
		<th>OLT Port</th>
		<th>OLT IP Address</th>
		<th>Company</th>
		<th>Created Date</th>

	  </tr>
	@foreach ($data as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

        @canany(
          [
            "edit-olt",
            "manage-ports",
            "delete-olt"
          ]
        )
          <ul class="dropdown-menu dropdown-default" role="menu">
              @can("edit-olt")
              <li><a class="dropdown-item" href="{{url('admin/olt/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
              @endcan
              @can("manage-ports")
              <li><a class="dropdown-item" href="{{url('admin/olt/ports/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Manage Ports</a></li>
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              @endcan
              @can("delete-olt")
                <li><a class="dropdown-item" href="{{url('admin/olt/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
              @endcan
            </ul>
          @endcanany
            </div>
		</td>
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->distributor_name }}</td>
		<td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->olt_serial_number }}</td>
		<td>{{ $datarow->olt_port }}</td>
		<td>{{ $datarow->olt_ip_address }}</td>
		<td>{{ $datarow->company_name }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
