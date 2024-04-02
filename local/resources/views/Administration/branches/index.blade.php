@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	    <?php
	    $user = Auth::user();
              $roles = $user->getRoleNames();
              ?>
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Branches</h3></div>
	  
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
		<th>Branch Name</th>
		<th>Office Address</th>
		<th>Mobile</th>
		<th>City</th>
		<th>Distributor</th>
		<th>Sub Distributor</th>
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
        @canany([
          'edit-branch',
          'delete-branch', 
          'change-password-branch', 
          'branch-deposit',
          'branch-deposit',
        ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can('edit-branch')
						<li><a class="dropdown-item" href="{{url('admin/branches/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can('delete-branch')
						<li><a class="dropdown-item" href="{{url('admin/branches/delete/'.$datarow->id)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can('change-password-branch')
						<li><a class="dropdown-item change_pwd" userId="{{$datarow->user_id}}" pageName="branches" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Change Password</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can('branch-deposit')
	          <li><a class="dropdown-item deposit_form"  rId="{{$datarow->id}}" pageName="branches" record_balance="{{$datarow->available_balance}}" record_name="{{$datarow->branch_name}}" popupHeader="Branch Deposit" href="javascript:void(0);"><i class="fas fa-rupee-sign" aria-hidden="true"></i> Branch Deposit</a></li>
	          	<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          
          @endcan
          @can('branch-deposit')
						<li><a class="dropdown-item ledger-from" rId="{{$datarow->id}}"  pageName="branches" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Ledger</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
                  @can('branch-deposit')
						<li><a class="dropdown-item utility-form" href="{{url('admin/branches/branchutility/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Utilities</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
    
        </ul>
        @endcanany
      </div>
      </td>	
      <td>@can("edit-branch")<a href="{{url('admin/branches/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>@endcan {{ $datarow->branch_name }}</td>
      <td>{{ $datarow->office_address }}</td>
      <td>{{ $datarow->mobile }}</td>
      <td>{{ $datarow->city_name }}</td>
      <td>{{ $datarow->distributor_name }}</td>
	   <td>{{ $datarow->subdistributor_name }}</td>
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
    	   @foreach (explode(',', $datarow1->branch) as $datarow)
    <tr>
      <td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        @canany([
          'edit-branch',
          'delete-branch', 
          'change-password-branch', 
          'branch-deposit',
          'ledger'
        ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can('edit-branch')
						<li><a class="dropdown-item" href="{{url('admin/branches/edit/'.$datarow1)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can('delete-branch')
						<li><a class="dropdown-item" href="{{url('admin/branches/delete/'.$datarow11)}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can('change-password-branch')
						<li><a class="dropdown-item change_pwd" userId="{{$datarow1}}" pageName="branches" href="javascript:void(0);"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Change Password</a></li>
						<li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can('branch-deposit')
	          <li><a class="dropdown-item deposit_form" rId="{{$datarow1}}" pageName="branches" record_balance="{{$datarow->available_balance}}" record_name="{{$datarow->branch_name}}" popupHeader="Branch Deposit" href="javascript:void(0);"><i class="fas fa-rupee-sign" aria-hidden="true"></i> Branch Deposit</a></li>
          @endcan

        </ul>
        @endcanany
      </div>
      </td>	
       @php $branchdet = DB::table('slj_branches')->where('id', $datarow)->first();
        $city = DB::table('slj_cities')->where('id', $branchdet->city)->first();
		 $distdet = DB::table('slj_distributors')->select('distributor_name')->where('id', $branchdet->distributor_id)->first();
		 $subdistdet = DB::table('slj_subdistributors')->select('subdistributor_name')->where('id', $branchdet->subdistributor_id)->first();
	     $userinfo=DB::table('users')->select('mobile','status')->where('id', $branchdet->user_id)->first();
		 @endphp
		 @endphp
      <td>@can("edit-branch")<a href="{{url('admin/branches/edit/'.$datarow1)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>@endcan {{ $branchdet->branch_name }}</td>
      <td>{{ $branchdet->office_address }}</td>
      <td>{{ $userinfo->mobile }}</td>
      <td>{{ $city->name }}</td>
      <td>{{ $distdet->distributor_name }}</td>
	   <td>{{ $subdistdet->subdistributor_name }}</td>
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
