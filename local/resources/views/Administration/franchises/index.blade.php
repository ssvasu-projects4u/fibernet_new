@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Franchises</h3></div>
	  
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
	  <table class="table table-bordered">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>Franchise Id</th>
		<th>Franchise Name</th>
		<th>Mobile</th>
		<th>City</th>
		<th>Branch</th>
		<th>VLAN</th>
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
            "edit-franchise",
            "delete-franchise",
            "change-password-franchise",
            "franchise-deposit",
            "franch-ledger"
          ]
        )
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-franchise")
              <li><a class="dropdown-item" href="{{url('admin/franchises/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-franchise")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/franchises/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
            @endcan
            @can("change-password-franchise")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item change_pwd" userId="{{$datarow->user_id}}" pageName="franchises" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Change Password</a></li>
            @endcan
            @can("franchise-deposit")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item deposit_form" rId="{{$datarow->id}}" record_balance="{{$datarow->available_balance}}" record_name="{{$datarow->franchise_name}}" pageName="franchises" popupHeader="Franchise Deposit" href="javascript:void(0);"><i class="fas fa-rupee-sign" aria-hidden="true"></i> Franchise Deposit</a></li>
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
            @endcan
            @can('franchise-deposit')
						<li><a class="dropdown-item franchledger-form" rId="{{$datarow->id}}"  pageName="franches" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Ledger</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          
          </ul>
        @endcanany
      </div>
		</td>
	
		<td>{{ $datarow->franchise_id  }}</td>
		<td>@can("edit-franchise") <a href="{{url('admin/franchises/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a> @endcan {{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->vlan }} </td>
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
    <?php } 
    else
    
      {
      
?>
  
    	@foreach ($data as $datarow1)
	          @foreach (explode(',', $datarow1->franch) as $datarow)
        <tr>
		<td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

        @canany(
          [
            "edit-franchise",
            "delete-franchise",
            "change-password-franchise",
            "franchise-deposit"
          ]
        )
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-franchise")
              <li><a class="dropdown-item" href="{{url('admin/franchises/edit/'.$datarow)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-franchise")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/franchises/delete/'.$datarow)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
            @endcan
            @can("change-password-franchise")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item change_pwd" userId="{{$datarow}}" pageName="franchises" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Change Password</a></li>
            @endcan
            @can("franchise-deposit")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item deposit_form" rId="{{$datarow}}" record_balance="{{$datarow->available_balance}}" record_name="{{$datarow->franchise_name}}" pageName="franchises" popupHeader="Franchise Deposit" href="javascript:void(0);"><i class="fas fa-rupee-sign" aria-hidden="true"></i> Franchise Deposit</a></li>
            @endcan
          </ul>
        @endcanany
      </div>
		</td>
		 @php $franchid = DB::table('slj_franchises')->where('id', $datarow)->first();

		 $franchname = DB::table('slj_franchises')->select('franchise_name')->where('id', $datarow)->first();
		 $branch=DB::table('slj_branches')->select('branch_name')->where('id', $franchid->branch)->first();
		 $userinfo=DB::table('users')->select('mobile','status')->where('id', $franchid->user_id)->first();
		 @endphp
		
		<td>{{ $franchid->id }}</td>
		<td>@can("edit-franchise") <a href="{{url('admin/franchises/edit/'.$datarow)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a> @endcan {{ $franchname->franchise_name }} </td>
		<td>{{ $userinfo->mobile }}</td>
		<td>{{ $datarow1->cityname}}</td>
		<td>{{ $branch->branch_name }} </td>
		<td>{{ $franchid->vlan }} </td>
		<td>
			@if($userinfo->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($userinfo->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($userinfo->status == 'D')
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
