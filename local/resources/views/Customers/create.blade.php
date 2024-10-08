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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Add Customer Application</h3></div>
	  
	</div>
	
	
	<div class="card-body">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> 
	  @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	    {!! Form::open(['route' =>['customers.store'],'id'=>'customer_submit','method'=>'post','files'=>'true'])!!}
	    
	      @csrf
					<h5 class="bg-primary text-white px-2 pt-1 pb-1">Basic Information</h5>
					<div class="row">
					    
					<?php 
					if($roles[0]=='superadmin'){
					if($roles[0]=='superadmin'){ ?>
					<div class="form-group col-md-3"> {!! Form::label('state', 'State *') !!}
						        {!! Form::select('state', $states, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select State --') ) !!} </div>
					<div class="form-group col-md-3"> {!! Form::label('city', 'City *') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor *') !!}
        {!! Form::select('distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor *') !!}
        {!! Form::select('subdistributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch *') !!}
        {!! Form::select('branch', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
                                        <?php } if($roles[0]=='branch' || $roles[0]=='superadmin'){ ?>                      
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise *') !!}
        {!! Form::select('franchise', $franchise_list, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
		<input type="hidden" name="operator_id" id = "operator_id" value="">
                                        <?php } } else { 
                                          $userid = Auth::user()->id;
                                        ?>
                                        
                                        
                                            <!-- added by durga start -->
                                         @php 
					 
					 $user = DB::table('slj_employees')->where('user_id', $userid)->first();
					   $cities = DB::table('slj_cities')->where('id',$user->city)->first(); 
					 
					 @endphp
			
				
					
            
            
                    <?php
                
			    	$distributorgroup = array();
                    $branchgroup=array();
                    $franchgroup=array();
                
								$distributorgroup = explode(",",$user->distributor);
									$branchgroup = explode(",",$user->branch);
										$franchgroup = explode(",",$user->franch);
							
				
							
				
           ?>
           <div class="form-group col-md-3">
          <input type="text" class="form-control" name="city1" id="city1" value="{{ $cities->name }}" readonly>
          <input type="hidden" name="city" id="city" value="{{ $cities->id }}">
          </div>
            <div class="form-group col-md-3">
              
           
            
               <select id="distributor1" name="distributor1" class="form-control">
                    @foreach($distributorgroup as $p)
                      @php $dname = DB::table('slj_distributors')->where('id',$p)->first(); @endphp
                   <option value="{{$p}}">{{ $dname->distributor_name }}</option>
                     @endforeach
               </select>
            <!--	<label class="radio-inline mr10"> <input type="checkbox" class="distbdata"  name="distributor[]" checked>&nbsp</label>-->
		
          
          
             </div>
              <div class="form-group col-md-3">
                  <select id="branches1" name="branches1" class="form-control">
             @foreach($branchgroup as $p)
         
              @php $bname = DB::table('slj_branches')->where('id',$p)->first(); @endphp
             <option value="{{$p}}">{{ $bname->branch_name }}</option>
                     @endforeach
                </select>   
               <!--      	<label class="radio-inline mr10"> <input type="checkbox" class="branchc" value="{{$p}}" name="branches[]" checked>&nbsp{{ $bname->branch_name }}</label> -->
		
           
            
            </div>
             <div class="form-group col-md-3">
                  <select id="franchises1" name="franchises1" class="form-control">
             @foreach($franchgroup as $p)
           
              @php $fname = DB::table('slj_franchises')->where('id',$p)->first(); @endphp
              
                  <option value="{{$p}}">{{ $fname->franchise_name }}</option>
             @endforeach

                  </select>
				
             
          
            
            </div>
        
        
                                            <!-- end by durga -->
                                       
                                        <?php }?>
                                        </div>	
					
					
					<div class="row">
						<div class="form-group col-md-3"> {!! Form::label('first_name', 'First Name *') !!}
				        {!! Form::text('first_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter First Name')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('last_name', 'Last Name *') !!}
				        {!! Form::text('last_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Last Name')) !!} </div>
	   
					
						<div class="form-group col-md-3" > {!! Form::label('date_of_birth', 'Date of Birth') !!}
						{!! Form::date('date_of_birth', null,array('class' => 'form-control','placeholder'=>'- Date of Birth -','type'=>'date') ) !!} </div>
					 
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
					 <div style="display:none;"  class="form-group col-md-3"> <span style="color:white">{!! Form::label('EmailVerify', 'EmailVerify') !!}</span>
				        <input type="text" value="1" name="dp" id="dp" required>     
				        
				        </div>
						<?php 

	$address_proof_type  = array(
		'1' => 'No Proof',
		'2' => 'Ration Card',
		'3' => 'Driving Licence',
		'4' => 'Aadhar Card',
		'5' => 'Voter ID',
		'6' => 'Address Proof',
	);

?>

						<div class="form-group col-md-3"> {!! Form::label('address_proof_type', 'Address proof Type *') !!}
						        {!! Form::select('address_proof_type', $address_proof_type, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select proof --') ) !!} </div>

				    <div class="form-group col-md-3"> {!! Form::label('address_proof_no', 'Addess Proof') !!}
				        {!! Form::text('address_proof_no',null, array('class' => 'form-control','placeholder'=>'Enter Proof No')) !!} </div>
					
					
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
				<?php //$connection_types = array('broadband'=>'Broadband','cable'=>'Cable','iptv'=>'IPTV','combo'=>'Combo'); ?>
				<div class="form-group col-md-12"> {!! Form::label('connection_type', 'Connection Type') !!}
				<!-- {!! Form::select('connection_type', $connection_types, 'broadband',array('class' => 'form-control') ) !!} 
				-->
				@php 
				$conn=\App\ConnectionType::select('id','title')->get();
				@endphp
				<select name="connection_type" id="connection_type" class="form-control">
				    <option>Select Connection Type</option>
				    @foreach($conn as $con)
				    <option value="{{ $con->id }}">{{ $con->title }}</option>
				    
				    @endforeach
				    
				</select>
				</div>
				
				<div class="form-group col-md-12"> {!! Form::label('installation_amount', 'Installation Amount') !!}
	        {!! Form::text('installation_amount',$connectiontypedetails->installation_amount, array('class' => 'form-control','readonly'=>'readonly')) !!} </div>
	        <div class="form-group col-md-12 row_secure_deposite_amount"> {!! Form::label('secure_deposite_amount', 'ONT Security Deposit') !!}
	        {!! Form::text('secure_deposite_amount',$connectiontypedetails->olt_security_deposit, array('class' => 'form-control','readonly'=>'readonly')) !!} </div>
	        <div class="form-group col-md-12 row_setup_box_amount"> {!! Form::label('setup_box_amount', 'Setup Box Amount') !!}
	        {!! Form::text('setup_box_amount',$connectiontypedetails->setupbox_amount, array('class' => 'form-control','readonly'=>'readonly')) !!} </div>
			
			<div class="form-group col-md-12 row_androidbox_security_deposit"> {!! Form::label('androidbox_security_deposit', 'Androidbox Security Deposit') !!}
	        {!! Form::text('androidbox_security_deposit',$connectiontypedetails->installation_amount, array('class' => 'form-control')) !!} </div>
			
			<!-- <div class="form-group col-md-12"> {!! Form::label('discount_amount', 'Discount Amount') !!}
	        {!! Form::text('discount_amount',null, array('class' => 'form-control','placeholder'=>'Enter Discount Amount')) !!} </div> -->
			
			</div>
			<div class="col-md-8">
						<div class="form-group broadband_container col-md-12"> {!! Form::label('package', 'Broadband Package') !!}
	{!! Form::select('package', $packages, null,array('class' => 'form-control','placeholder'=>'-- Select Broadband Package --') ) !!} </div>
				<div class="form-group broadband_container col-md-12"> {!! Form::label('sub_package', 'Broadband Sub Package') !!}
{!! Form::select('sub_package', [], null,array('class' => 'form-control','placeholder'=>'-- Select Broadband Sub Package --') ) !!} </div>
						



<div class="combo_container col-md-12" style="display: none">
        				{!! Form::label('combo_package', 'Combo Package') !!}
	{!! Form::select('combo_package', $combopackages, null,array('class' => 'form-control','placeholder'=>'-- Select Combo Package --') ) !!} </div>
				<div class="form-group combo_container col-md-12" style="display: none"> {!! Form::label('combo_sub_package', 'Combo Sub Package') !!}
{!! Form::select('combo_sub_package', [], null,array('class' => 'form-control','placeholder'=>'-- Select Combo Sub Package --') ) !!} 	
        				</div>	
						<div class="row">
						<div class="combo_container col-md-6" style="display: none">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#combobase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#combolocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#combopackage2"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#comboallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">
								<div class="tab-pane container active pl-1 pr-1" id="combobase">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
											@foreach($cabledatabytype['base'] as $package)
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="combobase[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
							<div class="tab-pane container pl-1 pr-1" id="combolocal">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
											@foreach($cabledatabytype['local'] as $package)
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="combolocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
							
							
							<div class="tab-pane container pl-1 pr-1" id="combopackage2" >
								<div class="vertical-menu" id="select1">
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
										@foreach($cabledatabytype['packages'] as $package)
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package1" value="{{$package['id']}}" name="combopackage[]">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
							
							<div class="tab-pane container fade pl-1 pr-1" id="comboallacart">
								<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
									@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
										@foreach($cabledatabytype['allacart'] as $package)
											<div class="lab_allacart">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="comboallacart[]">&nbsp;{{$package['name']}} </label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
						</div>
						</div>

						<div class="col-md-6 border combo_container" style="display: none">
							<label>Selected</label>
							<hr class="py-0 my-0 mb-2">
							
							<input type="hidden" name="counter" id="counter" value="0" >
							<div class="vertical-menu" id="selected_combo_packages" style="font-size: 12px;height: 250px; overflow-y: scroll;">															

							</div>

						</div>
						</div>
						
						<div class="iptv_container col-md-12" style="display: none">
        					<label for="iptv"><strong>IPTV</strong></label> 	
        				</div>
						
						<div class="row">
						<div class="iptv_container col-md-6" style="display: none">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#iptvbase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvlocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvpackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">

								<div class="tab-pane container active pl-1 pr-1" id="iptvbase" >
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['base']) && count($iptvdatabytype['base'])>0)
											@foreach($iptvdatabytype['base'] as $package)
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_base" value="{{$package['id']}}" name="iptvbase[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								<div class="tab-pane container pl-1 pr-1" id="iptvlocal">
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['local']) && count($iptvdatabytype['local'])>0)
											@foreach($iptvdatabytype['local'] as $package)
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_local" value="{{$package['id']}}" name="iptvlocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								<div class="tab-pane container pl-1 pr-1" id="iptvpackages">
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['packages']) && count($iptvdatabytype['packages'])>0)
											@foreach($iptvdatabytype['packages'] as $package)
												<div class="lab_package">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_package" value="{{$package['id']}}" name="iptvpackage[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								
								<div class="tab-pane container fade pl-1 pr-1" id="iptvallacart">
									<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
										@if(isset($iptvdatabytype['allacart']) && count($iptvdatabytype['allacart'])>0)
											@foreach($iptvdatabytype['allacart'] as $package)
												<div class="lab_allacart">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="iptvallacart[]">&nbsp;{{$package['name']}} </label>
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
							&nbsp;
							</div>

						</div>
						</div>
						
						<div class="cable_container col-md-12" style="display: none">
        					<label for="cable"><strong>Cable</strong></label> 	
        				</div>	
						<div class="row">
						<div class="cable_container col-md-6" style="display: none">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cablebase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablelocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablepackages3"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cableallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">
								<div class="tab-pane container active pl-1 pr-1" id="cablebase">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
											@foreach($cabledatabytype['base'] as $package)
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="cablebase[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
							<div class="tab-pane container pl-1 pr-1" id="cablelocal">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
											@foreach($cabledatabytype['local'] as $package)
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="cablelocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
							
							
							<div class="tab-pane container pl-1 pr-1" id="cablepackages3">
								<div class="vertical-menu" id="select1">
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
										@foreach($cabledatabytype['packages'] as $package)
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package2" value="{{$package['id']}}" name="cablepackage[]">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
							
							<div class="tab-pane container fade pl-1 pr-1" id="cableallacart">
								<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
									@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
										@foreach($cabledatabytype['allacart'] as $package)
											<div class="lab_allacart">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="cableallacart[]">&nbsp;{{$package['name']}} </label>
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

							</div>

						</div>
						</div>
			
			</div>
		</div>							
					
		<hr class="pt-0 pb-0 mb-1 mt-0">
		<div class="row">
			<div class="form-group col-md-4"> {!! Form::label('customer_pic', 'Customer Photo*') !!}
	       <!-- {!! Form::file('customer_pic',null, array('class' => 'form-control')) !!} -->
	        <input type="file" name="customer_pic" class=""form-control" id="" accept="image/*;capture=camera"/>
	        </div>
			<div class="form-group col-md-4"> {!! Form::label('address_proof', 'Address Proof*') !!}
	        {!! Form::file('address_proof',null, array('class' => 'form-control')) !!} </div>
	        <div class="form-group col-md-4"> {!! Form::label('identity_proof', 'Identity Proof*') !!}
	        {!! Form::file('identity_proof',null, array('class' => 'form-control')) !!} </div>
		</div>

		<hr class="pt-0 pb-0 mb-1 mt-0">
		<div class="row">
			<div class="form-group col-md-3"> {!! Form::label('payment_mode', 'Payment mode*') !!}
			<?php $payment_modes = [
				"Cash" => "Cash",
				"Cheque" => "Cheque",
				"Payment Gateway" => "Payment Gateway"
			]; ?>
			{!! Form::select('payment_mode',  $payment_modes, null, ['class' => 'form-control', 'required' => true, 'placeholder'=>'-- Select Payment Mode --']) !!}
			</div>
		</div>

		{!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=> 'create_form_btn']) !!} 
		{!! Form::close() !!} 
	</div>
  </div>
	
 
    `<script type="text/javascript">
	$(document).ready(function() {
	/*setInterval(function(){ 
    //code goes here that will be run every 5 seconds.    

	       var email = $('#email').val();
	      // alert(email);
        if(email!='')
        {
        //alert(email);
	 $.ajax({
                url: "{{url('admin/customers/emaildata')}}/"+email,
                type: "GET",
                success:function(data) {
                if(data==1)
                {
        
                  $('#dp').val(data);
                  }
                }
                
            });
            }
           
            }, 3000); */
            

    
           
        $('#customer_submit').on('keyup blur click', function () {
            var isForm = $(this).validate({
                rules: {
                    city: {"required": true},
                    distributor: {"required": true},
                    branch: {"required": true},
                    franchise: {"required": true},
                    first_name: {"required": true},
                    last_name: {"required": true},
                    f_name_c_name: {"required": true},
                    mobile: {"required": true},
                    dp:{required:true},
                    

                 /*   email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "{{url('admin/franchises/emailchecking')}}",
                            type: "post",
                            data: {
                                email: function () {
                                    return $("#email").val();
                                },
                                user_create_type: 'customer'
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        }
                    }, */
                    billing_address: {
                        required: true,
                    },
                    installation_address: {
                        required: true,
                    },
                    customer_pic: {
                        required: true,
                    },
                    address_proof: {
                        required: true,
                    },
                    identity_proof: {
                        required: true,
                    },
					payment_mode: {
                        required: true,
                    }
                }
            }).checkForm();
            if (isForm) {
                $('#create_form_btn').attr('disabled', false);
            } else {
                $('#create_form_btn').attr('disabled', true);
            }
            
              
            
        }); 

        $('.row_setup_box_amount').hide();
		$('.row_androidbox_security_deposit').hide();
		$('.row_secure_deposite_amount').show();
		/*  $('#email').change(function ()
		  {
                    var email = $('#email').val();
                   // alert(email);
                    $.ajax({
                url: "{{url('admin/customers/emailverify')}}/"+email,
                type: "GET",
                success:function(data) {
                  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
            }); */
          
           
           
           

        
				
		 $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
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
		
		$('#combo_package').on('change', function() {
            var package = $(this).val();
            if(package == '' || package <=0){
            	$('#sub_package').html("<option value=''>-- Select Combo Sub Package --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/customers/package-combo-subpackages')}}/"+package,
                type: "GET",
                success:function(data) {
                   $('#combo_sub_package').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });


      
        $('body').on('change','#cablepackages3 .input_cable_package2',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            //alert('welcome');
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

	    $('body').on('change','#selected_channel_packages .input_cable_package2',function() {
	        $(this).attr("checked", false);
	       var checkboxhtml = $(this).parent().parent().html();
            $("#cablepackages3 .vertical-menu").append("<div class='lab_package'>"+checkboxhtml+"</div>");
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
	       $('body').on('change','#combo_sub_package',function() {
	        var va=$(this).val();
	       
		    if(va!='') {
		    //alert(va);
	            var checkboxhtml = $(this).val();
	            $(this).attr("checked", true);
	             
	            $("#selected_combo_packages").append("<div class='lab_package'><input type='checkbox' checked>"+' '+""+checkboxhtml+"</div>");
	            
	        }
	    });
	    
	      $('body').on('change','#combo_package .input_cable_package',function() {
		    if($(this).is(":checked")) {
		   // alert($(this).val());
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_combo_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
	     $('body').on('change','#combopackage2 .input_cable_package1',function() {
		    if($(this).is(":checked")) {
		    //alert($(this).val());
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_combo_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });

        $('body').on('change','#comboallacart .input_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_combo_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		$('body').on('change','#combolocal .input_cable_local',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_combo_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		$('body').on('change','#combobase .input_cable_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_combo_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });


	    $('body').on('change','#selected_combo_packages .input_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#comboallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        
	    });

	    $('body').on('change','#selected_combo_packages .input_cable_package1',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#combopackage2").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });
		
		 $('body').on('change','#selected_combo_packages .input_cable_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#combolocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });
		
		$('body').on('change','#selected_combo_packages .input_cable_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#combobase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
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
		
		
		
		$( "#customer_submit" ).submit(function( event ) {
			var connection_type = $('#connection_type').val();

			if(connection_type == 'cable'){
				if($('#selected_channel_packages .input_cable_base').length <= 0){
					alert('You Must Select Base Plan');
					return false;
				}	
			}

			if(connection_type == 'iptv'){
				if($('#selected_iptv_packages .input_iptv_base').length <= 0){
					alert('You Must Select Base Plan');
					return false;
				}	
			}			
		});	

	    $(".broadband_container").show();
        $(".cable_container").hide();
		$(".iptv_container").hide();
		$(".combo_container").hide();

        //$('#connection_type').val('broadband').trigger('change');

    });
</script>

<script>
      $('body').on('change','.distbdata',function() {
	     
         
        $('input.distbdata').each(function (e)
          
        {
            
            
            var checked = [];
            var distributor;
           
            var city = $("#city").val();
          
            
           if($(this).is(":checked"))
             {
                 $('.branchclass').html("");
                // alert($(this).val());
            checked.push($(this).val());
           
	       for(var i=0;i<checked.length;i++)
        {
            distributor = checked[i];
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranchesextraedit')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
               
                  
                   $('.branchclass').append(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
             }
        });
      });
</script>
<script>
      $('body').on('change','.branchc',function() {	  
         
        $('input.branchc').each(function ()
            
        {
           
             var checked = [];
          var branch;
          var city = $("#city").val();
             
        
       
       
	       if($(this).is(":checked"))
             {
                $('.kkk').html("");
            checked.push($(this).val());
           
	       for(var i=0;i<checked.length;i++)
        {
            branch = checked[i];
           //alert(branch);
          
            $.ajax({
                url: "{{url('/admin/customers/branch-franchisesextraedit')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data1) {
                    console.log(data1);
                  
                   $('.kkk').append(data1);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
             }
             
        });
     });
  </script>
  <script>
      	$('#distributor1').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            
            if(distributor == '' || distributor <=0){
            	$('#branches1').html("<option value=''>-- Select Branch --</option>");
				$('#franchises1').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#branches1').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $('#branches1').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
            if(branch == '' || branch <=0){
            	$('#franchises1').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                   $('#franchises1').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

       
		
      
  </script>
<script>
  $('#connection_type').on('change', function() {
        var android_amt,olt_amt,setupbox_amt;
        	var connection_type = $(this).val();
		//	alert(connection_type);
		//	alert(connection_type);	
		$.ajax({
                url: "{{url('/admin/connection-types/details')}}/"+connection_type,
                type: "GET",
                success:function(data) {
                   console.log(data);
                  // alert(data);
                   olt_amt=data.olt_security_deposit;
                   setupbox_amt=data.setupbox_amount;
                  // alert(setupbox_amt);
                   android_amt=data.ont_security_deposit;
				   $('#installation_amount').val(data.installation_amount);
				   $('#secure_deposite_amount').val(data.olt_security_deposit);
				   $('#androidbox_security_deposit').val(data.ont_security_deposit);
				   $('#setup_box_amount').val(data.setupbox_amount);
				   
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   // alert('wrong');
                }
            });
			
			<!-- if(connection_type == 'cable'){ -->
			
			if(connection_type == 5){
			
				$(".broadband_container").hide();
        		$(".cable_container").show();
				$(".iptv_container").hide();
				$(".combo_container").hide();
				
				$('.row_androidbox_security_deposit').hide();
				$('.row_setup_box_amount').show();
				$('.row_secure_deposite_amount').hide();
        	}else if(connection_type == 6){
				$(".broadband_container").hide();
        		$(".cable_container").hide();
				$(".iptv_container").show();
				$(".combo_container").hide();
				
				$('.row_androidbox_security_deposit').show();
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
			}else if(connection_type == 7){
			var android_amt,setupbox_amt,olt_amt;
		
				   olt_amt=$('#secure_deposite_amount').val();
				  
				   android_amt=$('#androidbox_security_deposit').val();
				   setupbox_amt=$('#setup_box_amount').val();
				 
            	    $('.row_androidbox_security_deposit').hide();
				
				    	$('.row_setup_box_amount').show();
				if(olt_amt>0)
				    $('.row_secure_deposite_amount').show();
				else
			        $('.row_secure_deposite_amount').hide();	    
        
			
				$(".broadband_container").hide();
        		$(".cable_container").hide();
				$(".iptv_container").hide();
				$(".combo_container").show();
				}else{
        		$(".broadband_container").show();
        		$(".cable_container").hide();
				$(".iptv_container").hide();
				$(".combo_container").hide();
				
				$('.row_androidbox_security_deposit').hide();
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
        	}

		});
		$('#franchise').on('change', function() {
          
            var franchise_id = $(this).val();
           
            $.ajax({
                url: "{{url('/admin/customers/get_op_id')}}/"+franchise_id,
                type: "GET",
                success:function(data) {
                   $('#operator_id').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
</script>
 

  
@stop
