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
@extends($layout)

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">DP</h3></div>
	  
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
		<th>City</th>
		<th>Distributor</th>
		<th>Sub Distributor</th>
		<th>Branch</th>
		<th>Franchise</th>
		<th>Fiber Name</th>
		<th>OLT Id</th>
		<th>OLT Port Num</th>
		<th>Splitter</th>
		<th>Generate DP</th>
		<th>Created Date</th>
		
	  </tr>
	    <?php
	    $user = Auth::user();
              $roles = $user->getRoleNames();
              if($roles[0]=='superadmin' || $roles[0]=='Area Tech Incharge')
              {
                  ?>
	@foreach ($data as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>


          @canany([
            "edit-dp",
            "delete-dp"
          ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-dp")
              <li><a class="dropdown-item" href="{{url('admin/dp/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-dp")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/dp/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            @endcan
          </ul>
          @endcanany
      </div>
		</td>
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->distributor_name }}</td>
		<td>{{ $datarow->subdistributor_name }}</td>
		<td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->fiber_name }}</td>
		<td>{{ $datarow->olt_id }}</td>
		<td>{{ $datarow->olt_port_num }}</td>
		<td>{{ $datarow->splitter }}</td>
		<td>{{ $datarow->generate_dp }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
    <?php } else { 	$user_id = Auth::user()->id; 
    $data1=array();
    ?>
    			
  @php $data1 = DB::table('slj_dp')->where('user_id', $user_id)->get(); @endphp
    	@foreach ($data1 as $datarow)
    
    
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>


          @canany([
            "edit-dp",
            "delete-dp"
          ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-dp")
              <li><a class="dropdown-item" href="{{url('admin/dp/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-dp")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/dp/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            @endcan
          </ul>
          @endcanany
      </div>
		</td>
	
            @php $user = DB::table('slj_cities')->where('id', $datarow->city)->first(); @endphp
            	<td>{{ $user->name }}</td>

  @php $user = DB::table('slj_distributors')->where('id', $datarow->distributor)->first(); @endphp
		<td>{{ $user->distributor_name }}</td>
		@php $user = DB::table('slj_subdistributors')->where('id', $datarow->subdistributor)->first(); @endphp
		<td>{{ $user->subdistributor_name }}</td>
		  @php $user = DB::table('slj_branches')->where('id', $datarow->branch)->first(); @endphp
		<td>{{ $user->branch_name }}</td>
	  @php $user = DB::table('slj_franchises')->where('id', $datarow->franchise)->first(); @endphp		
		<td>{{ $user->franchise_name }}</td>
	  @php $user = DB::table('slj_fiber_laying')->where('id', $datarow->fiber)->first(); @endphp		
		<td>{{ $user->fiber_name }}</td>
		<td>{{ $datarow->olt_id }}</td>
		<td>{{ $datarow->olt_port_num }}</td>
		<td>{{ $datarow->splitter }}</td>
		<td>{{ $datarow->generate_dp }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
    <?php } ?>
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
