@extends('layouts.branch')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Dashboard</h3></div>
          <div class="float-right"><a href="{{url('branch/add-payment')}}"><button class='btn btn-primary'>Add Payment</button></a></div>
	</div>
	
	
	<div class="card-body" >
	  @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success_message') }}
            @php
                Session::forget('success_message');
            @endphp
        </div>

        @endif

        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers (Active)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$activecnt}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Balance</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.{{$totalPaidAmount}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Expired Customers</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">45%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Complaints(pending)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">65</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
		  
		  <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-12 mb-12">
		  <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('frontend.branch.complaints.topmenu')
	<div class="card-header py-2">
		<div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Recent Complaints</h3></div>
	  
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
	  <div class="table-responsive">
	  <table class="table table-bordered table-condensed  table-striped" style="font-size:12px;">
	  <tr class="table-warning">
		<th>Ticket No</th>
		<th>Complaint Time</th>
		<th>Expected Close Time</th>
		<th>Priority</th>
		<th>Connection</th>
		<th>Complaint Type</th>
		<th>Franchise</th>
		<th>Customer Id</th>
		<th>Customer Name</th>
		<th>Mobile</th>
		<th>Call From</th>
		<th>Status</th>
	  </tr>
	@foreach ($complaints as $datarow)
        <tr>
		<td><span class="badge badge-primary px-2 pt-2 pb-2">{{ $datarow->complaint_slno }}</span></td>
		<td>{{ date("d-M-Y h:i:s a",strtotime($datarow->created_at)) }}</td>
		<td>{{ !empty($datarow->expected_resolved_by)?date("d-M-Y h:i:s a",strtotime($datarow->expected_resolved_by)):"" }}</td>
		<td>{{ ucfirst($datarow->priority) }}</td>
		<td>{{ $datarow->complaint_type }}</td>
		<td>{{ $datarow->complaint_sub_type }}</td>
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->customerid }}</td>
		<td>{{ $datarow->name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->call_from }}</td>
		<td>
			<?php 
				$badgestatus = "secondary";
				if($datarow->status == 'open'){$badgestatus = "danger";} 
				else if($datarow->status == 'in progress'){$badgestatus = "primary";} 
				else if($datarow->status == 'resolved'){$badgestatus = "warning";} 
				else if($datarow->status == 'closed'){$badgestatus = "success";} 
			?>
			
			<span class="badge badge-{{$badgestatus}} px-1 pt-1 pb-1">{{ucfirst($datarow->status)}}</span>
		</td>
		</tr>
    @endforeach
	</table>
	</div>
	
	
	
	</div>
  </div>
  </div>
  </div>

          <!-- Content Row -->

          

          

        </div>

	  
	</div>
  </div>
	
		  
@stop
