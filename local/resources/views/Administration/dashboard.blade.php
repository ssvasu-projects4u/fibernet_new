@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <?php
    $user =Auth::user();
              $id = \Auth::user()->id;
              $roles = $user->getRoleNames();
    
    ?>
    <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Dashboard</h3></div>
	  
	</div>
	
	
	<div class="card-body" >
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif

        <div class="container-fluid">
		
		 <?php
			//Customers
			$groupwisecustomers = array();
			$totalcustomers = 0;
			foreach($groupcustomers as $group){
			  $status = $group->status;
			  $groupwisecustomers[$status] = $group->count;
			  $totalcustomers = $totalcustomers + $group->count;
			}
			
			//Complaints
			$groupwisecomplaints = array();
			$totalcomplaints = 0;
			foreach($groupcomplaints as $group){
			  $status = $group->status;
			  $groupwisecomplaints[$status] = $group->count;
			  $totalcomplaints = $totalcomplaints + $group->count;
			}
			 
          if($roles[0]=="superadmin")
          {
		?>	
          
		  <div class="row mb-2">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cities</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{url('admin/city')}}">{{$cities}}</a></div>
                    </div>
				          	<div class="col-auto">
                      <i class="fas fa-city fa-2x text-gray-300"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Distributors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{url('admin/distributors')}}">{{$distributors}}</a></div>
                    </div>
			          		<div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Branches</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="{{url('admin/branches')}}">{{$branches}}</a></div>
                        </div>
						
                        
                      </div>
                    </div>
				          	<div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Franchises</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{url('admin/franchises')}}">{{$franchises}}</a></div>
                    </div>
					          <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
			</div>
			<?php } ?>
			<!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-3 col-lg-3">
              <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body px-2 pt-0 pb-0">
                  <table class="table" style="font-size:12px;">
				  <tbody>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers')}}">All</a></th>
					  <td><a href="{{url('admin/customers')}}"><span class="badge badge-secondary">{{$totalcustomers}}</span></a></td>
					  <td><a href="{{url('admin/customers')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers/new')}}">New</a></th>
					  <td><a href="{{url('admin/customers/new')}}"><span class="badge badge-secondary">{{isset($groupwisecustomers['new'])?$groupwisecustomers['new']:0}}</span></a></td>
					  <td><a href="{{url('admin/customers/new')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers/technical')}}">Technical</a></th>
					  <td><a href="{{url('admin/customers/technical')}}"><span class="badge badge-secondary">{{isset($groupwisecustomers['technical'])?$groupwisecustomers['technical']:0}}</span></a></td>
					  <td><a href="{{url('admin/customers/technical')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers/schedule')}}">Scheduled</th>
					  <td><a href="{{url('admin/customers/schedule')}}"><span class="badge badge-secondary">{{isset($groupwisecustomers['scheduled'])?$groupwisecustomers['scheduled']:0}}</span></a></td>
					  <td><a href="{{url('admin/customers/schedule')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers/activation')}}">Activation</th>
					  <td><a href="{{url('admin/customers/activation')}}"><span class="badge badge-secondary">{{isset($groupwisecustomers['activation'])?$groupwisecustomers['activation']:0}}</span></a></td>
					  <td><a href="{{url('admin/customers/activation')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers/active')}}">Activated</th>
					  <td><a href="{{url('admin/customers/active')}}"><span class="badge badge-secondary">
					  <?php 
						$activated = 0;
						if(isset($groupwisecustomers['activated'])){
						  $activated+= $groupwisecustomers['activated'];
						}
						if(isset($groupwisecustomers['active'])){
						  $activated+= $groupwisecustomers['active'];
						}
						?>
					    {{$activated}}</span></a></td>
						<td><a href="{{url('admin/customers/active')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/customers/expired')}}">Expired</th>
					  <td><a href="{{url('admin/customers/expired')}}"><span class="badge badge-secondary">{{isset($groupwisecustomers['expired'])?$groupwisecustomers['expired']:0}}</span></a></td>
					  <td><a href="{{url('admin/customers/expired')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Disconnections</a></th>
					  <td><a href="#"><span class="badge badge-secondary">{{isset($groupwisecustomers['disconnect'])?$groupwisecustomers['disconnect']:0}}</span></a></td>
					  <td><a href="#">view</a></td>
					</tr>
					</tbody>	
				</table>	
				  
				</div>
              </div>
			  <div class="card shadow mt-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Complaints</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body px-2 pt-0 pb-0">
                  <table class="table" style="font-size:12px;">
				  <tbody>
					<tr>
					  <th scope="row"><a href="{{url('admin/complaints')}}">All</a></th>
					  <td><a href="{{url('admin/complaints')}}"><span class="badge badge-secondary">{{$totalcomplaints}}</span></a></td>
					  <td><a href="{{url('admin/complaints')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/complaints/open')}}">Open</a></th>
					  <td><a href="{{url('admin/complaints/open')}}"><span class="badge badge-secondary">{{isset($groupwisecomplaints['open'])?$groupwisecomplaints['open']:0}}</span></a></td>
					  <td><a href="{{url('admin/complaints/open')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/complaints/inprogress')}}">In Progress</a></th>
					  <td><a href="{{url('admin/complaints/inprogress')}}"><span class="badge badge-secondary">{{isset($groupwisecomplaints['in progress'])?$groupwisecomplaints['in progress']:0}}</span></a></td>
					  <td><a href="{{url('admin/complaints/inprogress')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/complaints/resolved')}}">Resolved</a></th>
					  <td><a href="{{url('admin/complaints/resolved')}}"><span class="badge badge-secondary">{{isset($groupwisecomplaints['resolved'])?$groupwisecomplaints['resolved']:0}}</span></a></td>
					  <td><a href="{{url('admin/complaints/resolved')}}">view</a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/complaints/closed')}}">Closed</th>
					  <td><a href="{{url('admin/complaints/closed')}}"><span class="badge badge-secondary">{{isset($groupwisecomplaints['closed'])?$groupwisecomplaints['closed']:0}}</span></a></td>
					  <td><a href="{{url('admin/complaints/closed')}}">view</a></td>
					</tr>
					</tbody>	
				</table>	
				  
				</div>
              </div>
            </div>
            <?php 
            if($roles[0]=="superadmin")
          {
              ?>
			<div class="col-xl-3 col-lg-3">
              <div class="card shadow mb-2">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Collections</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body px-2 pt-0 pb-0">
                  <table class="table" style="font-size:12px;">
				  <tbody>
					<tr>
					  <th scope="row"><a href="#">Today</a></th>
					  <td><a href="{{url('admin/customers')}}"><span class="badge badge-secondary">{{$totalcustomers}}</span></a></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 24 Hours</a></th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 3 Days</a></th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 7 Days</th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 10 Days</th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 15 Days</th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 30 Days</th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					<tr>
					  <th scope="row"><a href="#">Last 60 Days</th>
					  <td><span class="badge badge-secondary">0</span></td>
					</tr>
					</tbody>	
				</table>	
				  
				</div>
              </div>
			  <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Payments - this month</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body px-2 pt-0 pb-0">
                  <table class="table" style="font-size:12px;">
				  <tbody>
					<tr>
					  <th scope="row"><a href="{{url('admin/payments/inward')}}">All</a></th>
					  <td><b>Rs.25000</b></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/payments/inward')}}">Online</a></th>
					  <td><b>Rs.15000</b></td>
					</tr>
					<tr>
					  <th scope="row"><a href="{{url('admin/payments/inward')}}">Offline</a></th>
					  <td><b>Rs.10000</b></td>
					</tr>
					</tbody>	
				</table>	
				  
				</div>
              </div>
            </div>
			<div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customers Trend</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body px-2 pt-0 pb-0">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
        				</div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
	</div>
  </div>
  
  <!-- Page level plugins -->
  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/js/demo/chart-area-demo.js')}}"></script>
	
		  
@stop
