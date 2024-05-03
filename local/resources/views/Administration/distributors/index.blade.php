@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Distributors</h3></div>
	  
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
		<th>Distributor Name</th>
		<!--<th>Sub Distributor Name</th>-->
		<th>City</th>
		<th>Office Address</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Status</th>
	  </tr>
	   <?php

    $user =Auth::user();
              $id = \Auth::user()->id;
              $roles = $user->getRoleNames();
    
  	   if($roles[0]=="superadmin")
          {
              ?>
	@foreach ($data as $datarow)
        <tr>
        <td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

        @canany(
          [
            "edit-distributor",
            "delete-distributor",
            "change-password-distributor"
          ]
        )
        <ul class="dropdown-menu dropdown-default" role="menu">
					@can("edit-distributor")
						<li><a class="dropdown-item" href="{{url('admin/distributors/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
          @endcan
          @can("delete-distributor")
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
						<li><a class="dropdown-item" href="{{url('admin/distributors/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
          @endcan
          @can("change-password-distributor")
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
	          <li><a class="dropdown-item change_pwd" userId="{{$datarow->user_id}}" pageName="distributors" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Change Password</a></li>
          @endcan
          @can('edit-distributor')
          <li class="divider"><hr class="py-0 my-0 mb-4"></li>
						<li>
						    <a class="dropdown-item" href="{{url('admin/distributors/distutility/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Utilites</a>
						    
						   
						    
						    </li>
					
          @endcan
        
        </ul>
        @endcanany
      </div>
		</td>	
		<td>@can("edit-distributor") <a href="{{url('admin/distributors/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>@endcan {{ $datarow->distributor_name }}</td>
		<!--<td>{{ $datarow->subdistributor_name }}</td>-->
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->office_address }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->email }}</td>
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
    <?php } else { ?>
    	@foreach ($data as $datarow1)
    	 @foreach (explode(',', $datarow1->distributor) as $datarow)
        <tr>
        <td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

        @canany(
          [
            "edit-distributor",
            "delete-distributor",
            "change-password-distributor"
          ]
        )
        <ul class="dropdown-menu dropdown-default" role="menu">
					@can("edit-distributor")
						<li><a class="dropdown-item" href="{{url('admin/distributors/edit/'.$datarow)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
          @endcan
          @can("delete-distributor")
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
						<li><a class="dropdown-item" href="{{url('admin/distributors/delete/'.$datarow)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
          @endcan
          @can("change-password-distributor")
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
	          <li><a class="dropdown-item change_pwd" userId="{{$datarow->user_id}}" pageName="distributors" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Change Password</a></li>
          @endcan
        </ul>
        @endcanany
      </div>
		</td>	
		 @php $distdet = DB::table('slj_distributors')->where('id', $datarow)->first();
         $city = DB::table('slj_cities')->where('id', $distdet->city)->first();
         $userdet = DB::table('users')->select('email','mobile','status')->where('id', $distdet->user_id)->first();
		
		
		 @endphp
		<td>@can("edit-distributor") <a href="{{url('admin/distributors/edit/'.$datarow)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>@endcan {{ $distdet->distributor_name }}</td>
		<!--<td>{{ $distdet->subdistributor_name }}</td>-->
		<td>{{ $city->name }}</td>
		<td>{{ $distdet->office_address }}</td>
		<td>{{ $userdet->mobile }}</td>
		<td>{{ $userdet->email }}</td>
		<td>
			@if($userdet->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($userdet->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($userdet->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		</td>
		</tr>
    @endforeach
     @endforeach
     <?php } ?>
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
