@extends('layouts.customer')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Dashboard</h3>
    </div>
	  
	</div>
  <div class="card-header pt-1 pb-1">
    <div class="row">
      <div class="col-md-6"><h4>Welcome <strong>{{$customerdetails->name}}!</h4></strong>
      </div>
       <div class="col-md-6" align="right"> 
        <b>Last Logged In :</b> <?php 
        $last_login = Auth::user()->last_login;
        echo date("d F Y h:i:s a",strtotime($last_login)); ?>
      </div>
    </div>
      </div>
	
	
	<div class="card-body px-0" >
	  
    @if (session('success_message'))
	<div class="container">
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('success_message') !!}</p>
		</div>
	</div>
	@endif

	@if (session('error_message'))
	<div class="container">
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('error_message') !!}</p>
		</div>
	</div>
	@endif

        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-2">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Account Details</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body mx-0 px-0 pt-0 pb-0">
                  <table class="table table-bordered " cellspacing="0" style="font-size: 12px;">
      <tbody>
      <tr>
    <th>Customer Id</th>
    <td>SLJ{{ sprintf('%08d', $customerdetails->id) }} </td>
  </tr>
    <tr>
    <th>Full Name</th>
    <td>{{$customerdetails->name}}  </td>
  </tr>
	<tr>
    <th>Mobile</th>
    <td>{{$customerdetails->mobile}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$customerdetails->email}}</td>
  </tr>   
        <tr>
      <th>Address</th>
      <td>{{$customerdetails->billing_address}}</td>
    </tr>
    <tr>
      <th>Landmark</th>
      <td>{{$customerdetails->landmark}}</td>
    </tr>
    
    
</tbody></table>
                </div>
              </div>
              
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Connection Details </h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body mx-0 px-0 pt-0">
                   <table class="table table-bordered" cellspacing="0" style="font-size: 12px;">
					<tbody>
        			  <tr>
						<th width="30%">Connection Type</th>
						<td>{{ucfirst($customerdetails->connection_type)}}</td>
					  </tr>
					  <?php if($customerdetails->connection_type == 'iptv'){ ?>
					  <tr>
						<th>Package/Channels</th>
						<td>
						<?php
							$listiptvpackages = array();
							$listiptvallacart = array();
							$listiptvbase = array();
							$listiptvlocal = array();
							
							if(!empty($customerdetails->iptv_packages)){
								$listiptvpackages = explode(",",$customerdetails->iptv_packages);
							}

							if(!empty($customerdetails->iptv_allacart)){
								$listiptvallacart = explode(",",$customerdetails->iptv_allacart);
							}
							
							if(!empty($customerdetails->iptv_base)){
								$listiptvbase = explode(",",$customerdetails->iptv_base);
							}
							
							if(!empty($customerdetails->iptv_local)){
								$listiptvlocal = explode(",",$customerdetails->iptv_local);
							}
							
							$selectediptvdata = array_merge($listiptvpackages,$listiptvallacart,$listiptvbase,$listiptvlocal);
						?>
						
						<button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#myModal">
						 View Details
						</button>
						
						<div class="container">
						<div class="modal" id="myModal">
						  <div class="modal-dialog">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">IPTV</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
									
						<div class="row">
						<div class="iptv_container col-md-8">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#iptvpackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvlocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvbase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">

								<div class="tab-pane container active pl-1 pr-1" id="iptvpackages" >
								<div class="vertical-menu" id="select1">
									@if(isset($iptvdatabytype['packages']) && count($iptvdatabytype['packages'])>0)
										@foreach($iptvdatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listiptvpackages)){continue;} ?>
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_package" value="{{$package['id']}}" name="iptvpackage[]">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
							
							<div class="tab-pane container pl-1 pr-1" id="iptvlocal">
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['local']) && count($iptvdatabytype['local'])>0)
											@foreach($iptvdatabytype['local'] as $package)
										<?php if(in_array($package['id'],$listiptvlocal)){continue;} ?>
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_local" value="{{$package['id']}}" name="iptvlocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								<div class="tab-pane container pl-1 pr-1" id="iptvbase">
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['base']) && count($iptvdatabytype['base'])>0)
											@foreach($iptvdatabytype['base'] as $package)
											<?php if(in_array($package['id'],$listiptvbase)){continue;} ?>
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_base" value="{{$package['id']}}" name="iptvbase[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>


							<div class="tab-pane container fade pl-1 pr-1" id="iptvallacart">
								<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
									@if(isset($iptvdatabytype['allacart']) && count($iptvdatabytype['allacart'])>0)
										@foreach($iptvdatabytype['allacart'] as $package)
										<?php if(in_array($package['id'],$listiptvallacart)){continue;} ?>
											<div class="lab_allacart">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="allacart[]">&nbsp;{{$package['name']}} </label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
								
								
							</div>
						</div>

						<div class="col-md-4 border iptv_container">
							<label>Selected</label>
							<hr class="py-0 my-0 mb-2">
							
							<input type="hidden" name="iptvcounter" id="iptvcounter" value="0" >
							<div class="vertical-menu" id="selected_iptv_packages" style="font-size: 12px;height: 250px; overflow-y: scroll;">															
							
							@if(isset($iptvdatabytype['packages']) && count($iptvdatabytype['packages'])>0)
									@foreach($iptvdatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listiptvpackages)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_package" value="{{$package['id']}}" name="iptvpackage[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
								@if(isset($iptvdatabytype['base']) && count($iptvdatabytype['base'])>0)
									@foreach($iptvdatabytype['base'] as $package)
										<?php if(in_array($package['id'],$listiptvbase)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_base" value="{{$package['id']}}" name="iptvbase[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
								@if(isset($iptvdatabytype['local']) && count($iptvdatabytype['local'])>0)
									@foreach($iptvdatabytype['local'] as $package)
										<?php if(in_array($package['id'],$listiptvlocal)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_local" value="{{$package['id']}}" name="iptvlocal[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
								@if(isset($iptvdatabytype['allacart']) && count($iptvdatabytype['allacart'])>0)
									@foreach($iptvdatabytype['allacart'] as $package)
										<?php if(in_array($package['id'],$listiptvallacart)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="allacart[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
							
							
							</div>

						</div>
						</div>
							  </div>

							  <!-- Modal footer -->
							  <div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							  </div>

							</div>
						  </div>
						</div>
						</div>
						</td>
					  </tr>
					  <?php } elseif($customerdetails->connection_type == 'cable'){?>
					  <tr>
						<th>Package/Channels</th>
						<td>
						<?php
							$listcablepackages = array();
							$listcableallacart = array();
							$listcablebase = array();
							$listcablelocal = array();
							
							if(!empty($customerdetails->cable_packages)){
								$listcablepackages = explode(",",$customerdetails->cable_packages);
							}

							if(!empty($customerdetails->cable_allacart)){
								$listcableallacart = explode(",",$customerdetails->cable_allacart);
							}
							
							if(!empty($customerdetails->cable_base)){
								$listcablebase = explode(",",$customerdetails->cable_base);
							}
							
							if(!empty($customerdetails->cable_local)){
								$listcablelocal = explode(",",$customerdetails->cable_local);
							}
							
							$selectedcabledata = array_merge($listcablepackages,$listcableallacart,$listcablebase,$listcablelocal);
						?>
						
						<button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#myModal">
						 View Details
						</button>
						
						<div class="container">
						<div class="modal" id="myModal">
						  <div class="modal-dialog modal-lg">
							<div class="modal-content">

							  <!-- Modal Header -->
							  <div class="modal-header">
								<h4 class="modal-title">Cable</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
									
						<div class="row">
						<div class="cable_container col-md-8">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cablepackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablelocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablebase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cableallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">
								<div class="tab-pane container active pl-1 pr-1" id="cablepackages" >
								<div class="vertical-menu" id="select1">
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
										@foreach($cabledatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listcablepackages)){continue;} ?>
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package" value="{{$package['id']}}" name="cablepackage[]">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
							
							<div class="tab-pane container pl-1 pr-1" id="cablelocal">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
											@foreach($cabledatabytype['local'] as $package)
										<?php if(in_array($package['id'],$listcablelocal)){continue;} ?>
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="cablelocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								<div class="tab-pane container pl-1 pr-1" id="cablebase">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
											@foreach($cabledatabytype['base'] as $package)
											<?php if(in_array($package['id'],$listcablebase)){continue;} ?>
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="cablebase[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>


							<div class="tab-pane container fade pl-1 pr-1" id="cableallacart">
								<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
									@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
										@foreach($cabledatabytype['allacart'] as $package)
										<?php if(in_array($package['id'],$listcableallacart)){continue;} ?>
											<div class="lab_allacart">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="allacart[]">&nbsp;{{$package['name']}} </label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
								
								
								
							</div>
						</div>

						<div class="col-md-4 border cable_container">
							<label>Selected</label>
							<hr class="py-0 my-0 mb-2">
							
							<input type="hidden" name="counter" id="counter" value="0" >
							<div class="vertical-menu" id="selected_channel_packages" style="font-size: 12px;height: 250px; overflow-y: scroll;">															
							
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
									@foreach($cabledatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listcablepackages)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package" value="{{$package['id']}}" name="cablepackage[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
								@if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
									@foreach($cabledatabytype['base'] as $package)
										<?php if(in_array($package['id'],$listcablebase)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="cablebase[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
								@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
									@foreach($cabledatabytype['local'] as $package)
										<?php if(in_array($package['id'],$listcablelocal)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="cablelocal[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
								@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
									@foreach($cabledatabytype['allacart'] as $package)
										<?php if(in_array($package['id'],$listcableallacart)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_allacart" value="{{$package['id']}}" name="cableallacart[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
							
							
							</div>

						</div>
						</div>
							  </div>

							  <!-- Modal footer -->
							  <div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							  </div>

							</div>
						  </div>
						</div>
						</div>
						</td>
					  </tr>
					  <?php }elseif($customerdetails->connection_type == 'combo'){?>
					  
					  <tr>
						<th>Package</th>
						<td>{{ucfirst($package_details->package_name)}} <?php if(!empty($subpackage_details->sub_plan_name)){?> / {{ucfirst($subpackage_details->sub_plan_name)}}<?php } ?></td>
					  </tr>
					  <?php }elseif($customerdetails->connection_type == 'broadband'){?>
					  <tr>
						<th>Package</th>
						<td>{{ucfirst($package_details->package_name)}} <?php if(!empty($subpackage_details->sub_plan_name)){?> / {{ucfirst($subpackage_details->sub_plan_name)}}<?php } ?></td>
					  </tr>
					  <?php }?>
					  
					  <tr>
						<th>Expiry Date</th>
						<td>{{!empty($customerdetails->expiry_date)?date("d-m-Y",strtotime($customerdetails->expiry_date)):""}} </td>
					  </tr>
					  <tr>
						<th>Total Payable Amount</th>
						<td>Rs.{{$package_amount}}</td>
					  </tr>
					  <tr>
						<th>Status</th>
						<td><span class="badge badge-success">{{$customerdetails->current_status}}</span></td>
					  </tr>
					  <tr>
						<td colspan="2" align="center"><a href="{{url('customer/pay-online')}}" class="btn btn-sm btn-success">Online Pay Bill</a> </td>
					  </tr>
						</tbody>
					</table>
                </div>
              </div>
            </div>
            

            

            

            
          </div>

          <!-- Content Row -->

          

          

        </div>

	  
	</div>
  </div>
	
		  
@stop
