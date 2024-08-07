<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];exit;
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
	   @include('customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit Customer</h3></div>
	  
	</div>
	
	
	
	<div class="card-body">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif

		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	 {!! Form::model($customerdetails, array('route' => array('customers.update', $customerdetails->id),'method'=>'put','files'=>'true')) !!}
	        @csrf

		   <h5 class="bg-primary text-white px-2 pt-1 pb-1">Basic Information</h5>
					<div class="row">
					<?php if($roles[0]=='superadmin'){ ?>
					<div class="form-group col-md-3"> {!! Form::label('state', 'State *') !!}
						        {!! Form::select('state', $states, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select State --') ) !!} </div>
					<div class="form-group col-md-3"> {!! Form::label('city', 'City *') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor *') !!}
        {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
			
		<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor *') !!}
        {!! Form::select('subdistributor', $subdistributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch *') !!}
        {!! Form::select('branch', $branches, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
		
		<?php } if($roles[0]=='branch' || $roles[0]=='superadmin'){ ?>                      
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise *') !!}
        {!! Form::select('franchise', $franchises, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
                                        <?php } ?>
					</div>

					<div class="row">
						<div class="form-group col-md-3"> {!! Form::label('first_name', 'First Name *') !!}
				        {!! Form::text('first_name',$customerdetails->first_name, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter First Name')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('last_name', 'Last Name *') !!}
				        {!! Form::text('last_name',$customerdetails->last_name, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Last Name')) !!} </div>
						
						 <div class="form-group col-md-3"> {!! Form::label('date_of_birth', 'Date of Birth *') !!}
				        {!! Form::text('date_of_birth',$customerdetails->date_of_birth, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Date of Birth')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('f_name_c_name', 'Father/Company Name *') !!}
				        {!! Form::text('f_name_c_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Father Name or Company Name')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('email', 'Email *') !!}
				        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('mobile', 'Register Mobile *') !!}
				        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Register Mobile')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('alt_mobile_num', 'Alternate Mobile No') !!}
				        {!! Form::text('alt_mobile_num',null, array('class' => 'form-control','placeholder'=>'Enter Alternate Mobile No')) !!} </div>
        

				        
				        <div class="form-group col-md-3"> {!! Form::label('gstin', 'GSTIN') !!}
				        {!! Form::text('gstin',null, array('class' => 'form-control','placeholder'=>'Enter GSTIN')) !!} </div>
					
					
					
					</div>
					
					<hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Location Information</h5>
		<div class="row">
			<div class="form-group col-md-6"> {!! Form::label('billing_address', 'Billing Address *') !!}
	        {!! Form::textarea('billing_address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Billing Address')) !!} 
			</div>
	        <div class="form-group col-md-6"> {!! Form::label('installation_address', 'Installation Address *') !!}
	        {!! Form::textarea('installation_address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Installation Address')) !!} 
			
			
			</div>

			<div class="form-group col-md-6"> {!! Form::label('landmark', 'Landmark') !!}
	        {!! Form::text('landmark',null, array('class' => 'form-control','placeholder'=>'Enter Landmark')) !!} </div>
	        <div class="form-group col-md-3"> {!! Form::label('pincode', 'Pincode') !!}
	        {!! Form::text('pincode',null, array('class' => 'form-control','placeholder'=>'Enter Pincode')) !!} </div>
		</div>	
		   
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Package & Prices</h5>
		
		<div class="row">
			<div class="col-md-4">
				<?php $connection_types = array('broadband'=>'Broadband','cable'=>'Cable','iptv'=>'IPTV','combo'=>'Combo'); ?>
				<div class="form-group col-md-12"> {!! Form::label('connection_type', 'Connection Type') !!}
				{!! Form::select('connection_type', $connection_types, null,array('class' => 'form-control') ) !!} </div>
				
				<div class="form-group col-md-12"> {!! Form::label('installation_amount', 'Installation Amount') !!}
	        {!! Form::text('installation_amount',null, array('class' => 'form-control','placeholder'=>'Enter Installation Amount')) !!} </div>
	        <div class="form-group col-md-12 row_secure_deposite_amount"> {!! Form::label('secure_deposite_amount', 'ONT Security Deposit') !!}
	        {!! Form::text('secure_deposite_amount',null, array('class' => 'form-control','placeholder'=>'Enter ONT Security Deposit')) !!} </div>
	        <div class="form-group col-md-12 row_setup_box_amount"> {!! Form::label('setup_box_amount', 'Setup Box Amount') !!}
	        {!! Form::text('setup_box_amount',null, array('class' => 'form-control','placeholder'=>'Enter Setup Box Amount')) !!} </div>

			<!-- <div class="form-group col-md-12">
			{!! Form::label('discount_amount', 'Discount Amount') !!}
	        {!! Form::text('discount_amount',null, array('class' => 'form-control','placeholder'=>'Enter Discount Amount')) !!}
			</div> -->
			</div>

			<div class="col-md-8">
				<div class="form-group broadband_container col-md-12"> {!! Form::label('package', 'Package') !!}
	{!! Form::select('package', $packages, null,array('class' => 'form-control','placeholder'=>'-- Select Package --') ) !!} </div>
				<div class="form-group broadband_container col-md-12"> {!! Form::label('sub_package', 'Sub Package') !!}
{!! Form::select('sub_package', $subpackages, null,array('class' => 'form-control','placeholder'=>'-- Select Sub Package --') ) !!} </div>

				<div class="form-group combo_container col-md-12" style="display: none"> {!! Form::label('combo_package', 'Combo Package') !!}
	{!! Form::select('combo_package', $combopackages, null,array('class' => 'form-control','placeholder'=>'-- Select Combo Package --') ) !!} </div>
				<div class="form-group combo_container col-md-12" style="display: none"> {!! Form::label('combo_sub_package', 'Combo Sub Package') !!}
{!! Form::select('combo_sub_package', $combosubpackages, null,array('class' => 'form-control','placeholder'=>'-- Select Combo Sub Package --') ) !!} </div>


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
						<div class="iptv_container col-md-12" style="display: none">
        					<label for="iptv"><strong>IPTV</strong></label> 	
        				</div>
						
						<div class="row">
						<div class="iptv_container col-md-6" style="display: none">

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

						<div class="col-md-6 border iptv_container" style="display: none">
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
						
						<div class="cable_container col-md-12 pt-2" style="display: none">
        					<label for="cable"><strong>Cable</strong></label> 	
        				</div>	
						<div class="row">
						<div class="cable_container col-md-6" style="display: none">

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

						<div class="col-md-6 border cable_container" style="display: none">
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
											<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="allacart[]" checked>&nbsp;{{$package['name']}}</label>
										</div>
									<?php } ?>
									@endforeach	
								@endif
								
									
							</div>

						</div>
						</div>
			
			</div>
			
        				

							</div>   
		   
	      
	      	
						

			
		
		
					
		
		<?php if($customerdetails->technical_details_status == 'Y'){ ?>
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Technical Information</h5>
		<div class="row">
					<div class="form-group col-md-3"> {!! Form::label('olt', 'OLT') !!}
						        {!! Form::select('olt', $olt, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT --') ) !!} </div>
									
							<div class="form-group col-md-3"> {!! Form::label('dp', 'DP') !!}
				        {!! Form::select('dp', $dp, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select DP --') ) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('fh', 'FH') !!}
        {!! Form::select('fh', $fh, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select FH --') ) !!} </div>

         <div class="form-group col-md-3"> {!! Form::label('fh_color', 'FH Color') !!}
				        {!! Form::text('fh_color',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter FH Color')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('fiber_length', 'Fiber Length in Meters') !!}
				        {!! Form::text('fiber_length',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Length in Meters')) !!} </div>
						
						<?php if($customerdetails->connection_type == 'cable'){ ?>						
				        <div class="form-group col-md-3"> {!! Form::label('stb_num', 'STB Number') !!}
				        {!! Form::text('stb_num',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter STB Number')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_model', 'STB Model') !!}
				        {!! Form::text('stb_model',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter STB Model')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_company', 'STB Company') !!}
				        {!! Form::text('stb_company',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter STB Company')) !!} </div>
						<?php }else{ ?>
						<div class="form-group col-md-3"> {!! Form::label('stb_num', 'ONT Number') !!}
				        {!! Form::text('stb_num',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter ONT Number')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_model', 'ONT Model') !!}
				        {!! Form::text('stb_model',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter ONT Model')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_company', 'ONT Company') !!}
				        {!! Form::text('stb_company',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter ONT Company')) !!} </div>
						
						<?php } ?>

        				<div class="form-group col-md-6"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map2','placeholder'=>'Enter Latitude & Longitude')) !!} 
		<a class="btn btn-sm btn-warning getMap" map_num="2">Get</a>	
		</div>
        			

					</div>	
		<?php } ?>
		
		


		<hr class="pt-0 pb-0 mb-1 mt-0">
		<div class="row">
			<div class="form-group col-md-4"> {!! Form::label('address_proof', 'Address Proof') !!}
	        {!! Form::file('address_proof',null, array('class' => 'form-control','required'=>'required')) !!} </div>
	        <div class="form-group col-md-4"> {!! Form::label('identity_proof', 'Identity Proof') !!}
	        {!! Form::file('identity_proof',null, array('class' => 'form-control','required'=>'required')) !!} </div>
	        <div class="form-group col-md-4"> {!! Form::label('customer_pic', 'Customer Photo') !!}
	        {!! Form::file('customer_pic',null, array('class' => 'form-control','required'=>'required')) !!} </div>
		</div>
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
	<script type="text/javascript">
	$(document).ready(function() {
        $('.row_setup_box_amount').hide();
		$('.row_secure_deposite_amount').hide();
		
	 $('#city').on('change', function() {
            var city = $(this).val();
            if(city === '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/"+city,
                type: "GET",
                success:function(data) {
                   $('#distributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
		
		 $('#distributor').on('change', function() {
            var distributor = $(this).val();  
				
            if(distributor == '' || distributor <=0){
            	$('#subdistributor').html("<option value=''>-- Select Sub Distributor --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/subdistributors')}}/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#subdistributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); 
		
		 $('#subdistributor').on('change', function() {
            var subdistributor = $(this).val();  
				
            if(subdistributor == '' || subdistributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/branches')}}/"+subdistributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); 
        $('#branch').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
            if(branch == '' || branch <=0){
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                   $('#franchise').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $('#package').on('change', function() {
            var package = $(this).val();
            if(package == '' || package <=0){
            	$('#sub_package').html("<option value=''>-- Select Sub Package --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/customers/package-subpackages')}}/"+package,
                type: "GET",
                success:function(data) {
                   $('#sub_package').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });


        $('#connection_type').on('change', function() {
        	var connection_type = $(this).val();
        	if(connection_type == 'cable'){
				$(".broadband_container").hide();
        		$(".cable_container").show();
				$(".iptv_container").hide();
				$(".combo_container").hide();
				
				$('.row_setup_box_amount').show();
				$('.row_secure_deposite_amount').hide();
        	}else if(connection_type == 'iptv'){
				$(".broadband_container").hide();
        		$(".cable_container").hide();
				$(".iptv_container").show();
				$(".combo_container").hide();
				
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
			}else if(connection_type == 'combo'){
				$(".broadband_container").hide();
        		$(".cable_container").hide();
				$(".iptv_container").hide();
				$(".combo_container").show();
				
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
        	}else{
        		$(".broadband_container").show();
        		$(".cable_container").hide();
				$(".iptv_container").hide();
				$(".combo_container").hide();
				
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
        	}

		});

        $('body').on('change','#cablepackages .input_cable_package',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });

        $('body').on('change','#cableallacart .input_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		$('body').on('change','#cablelocal .input_cable_local',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		$('body').on('change','#cablebase .input_cable_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });


	    $('body').on('change','#selected_channel_packages .input_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#cableallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        
	    });

	    $('body').on('change','#selected_channel_packages .input_cable_package',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablepackages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });
		
		 $('body').on('change','#selected_channel_packages .input_cable_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablelocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });
		
		$('body').on('change','#selected_channel_packages .input_cable_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablebase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });
		
		
		
		
		$('body').on('change','#iptvpackages .input_iptv_package',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });

        $('body').on('change','#iptvallacart .input_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		
		$('body').on('change','#iptvlocal .input_iptv_local',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });

        $('body').on('change','#iptvbase .input_iptv_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		
		


	    $('body').on('change','#selected_iptv_packages .input_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#iptvallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	    });

	    $('body').on('change','#selected_iptv_packages .input_iptv_package',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvpackages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	    });
		
		
		$('body').on('change','#selected_iptv_packages .input_iptv_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvbase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	    });
		
		$('body').on('change','#selected_iptv_packages .input_iptv_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvlocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	    });

	    $(".broadband_container").show();
        $(".cable_container").hide();
		$(".iptv_container").hide();
		$(".combo_container").hide();
		
        $('#connection_type').val("{{$customerdetails->connection_type}}").trigger('change');
        
    });

	var x = document.getElementById("demo");

	function getCurrentLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) 
	{
		if($('#map'+map_num).val()==null)  {
                $('#map'+map_num).val(position.coords.latitude+","+ position.coords.longitude);
            }
	}
</script>  
@stop
