<?php 
    //$roles = Auth::user()->getRoleNames(); 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    $permissions = $user->getPermissionsViaRoles();

    $permissionsdata = array();
    foreach($permissions as $permission){
        $permissionsdata[] =  $permission->name;   
    }
    //print_r($permissionsdata);
    //$complaints_permissions = array('complaint-types','add-complaint','all-complaints','open-complaints','in-progress-complaints','resolved-complaints','closed-complaints');     
?> 

@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Departments</h3></div>
	  
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
	  	<th width="25">Actions</th>
		<th>Department Name</th>
		<th>Status</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
            <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
              @canany(
                [
                  "edit-department",
                  "delete-department"
                ]
              )
              <ul class="dropdown-menu dropdown-default" role="menu">
                @can("edit-department")
                  <li><a class="dropdown-item" href="{{url('admin/departments/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                @endcan
                @can("delete-department")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  <li><a class="dropdown-item" href="{{url('admin/departments/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                @endcan
              </ul>
              @endcanany
            </div> 
		</td>
		<td>@can("edit-department")<a href="{{url('admin/departments/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>@endcan {{ $datarow->department }}</td>
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
