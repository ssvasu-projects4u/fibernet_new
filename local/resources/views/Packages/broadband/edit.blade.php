@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit Broadband Package</h3></div>
	  
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

	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
	  
	  
	  {!! Form::model($broadbandpackagedetails, array('route' => array('broadband-packages.update', $broadbandpackagedetails->id),'method'=>'put')) !!}
	      
			
			<div class="row">
	    	<div class="col-md-6">
	    		<div class="row">
					<div class="form-group col-md-12"> {!! Form::label('package_name', 'Package Name') !!}
		        {!! Form::text('package_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Package Name')) !!} </div>
		    	</div>
				<div class="row">
					<div class="form-group col-md-6"> {!! Form::label('download_speed', 'Download Speed(kbps)') !!}
        {!! Form::text('download_speed',null, array('class' => 'form-control','placeholder'=>'Enter Download Speed')) !!} </div>

         <div class="form-group col-md-6"> {!! Form::label('upload_speed', 'Upload  Speed(kbps)') !!}
        {!! Form::text('upload_speed',null, array('class' => 'form-control','placeholder'=>'Enter Upload Speed')) !!} </div>

				</div>	

				<div class="row">
					<?php $package_types = array('base plan'=>'Base Plan','fall back plan'=>'Fall Back Plan','data addon plan'=>'Data Addon Plan'); ?>
		<div class="form-group col-md-6"> {!! Form::label('package_type', 'Package Type') !!}
        {!! Form::select('package_type', $package_types, null,array('class' => 'form-control') ) !!} </div>

        <?php $package_data_types = array('unlimited'=>'Unlimited','fup'=>'FUP'); ?>
		<div class="form-group col-md-6"> {!! Form::label('package_data_type', 'Package Data Type') !!}
        {!! Form::select('package_data_type', $package_data_types, null,array('class' => 'form-control') ) !!} </div>

				</div>
				<div class="fup_container d-none">
				<div class="row">
					<div class="form-group col-md-6"> {!! Form::label('fup_limit', 'FUP Limit (MB)') !!}
        {!! Form::text('fup_limit',null, array('class' => 'form-control','placeholder'=>'Enter FUP Limit (MB)')) !!} </div>

        <?php $fup_calculation_types = array(1=>'Total (Download+Upload)',2=>'Only Download'); ?>
		<div class="form-group col-md-6"> {!! Form::label('fup_calculation_type', 'FUP Caculate Type') !!}
        {!! Form::select('fup_calculation_type', $fup_calculation_types, null,array('class' => 'form-control','placeholder'=>'- Select FUP Caculate Type -') ) !!} </div>

				</div>	
				<div class="row">
					<div class="form-group col-md-12"> {!! Form::label('fallback_plan', 'Fallback Plan') !!}
			        {!! Form::select('fallback_plan', $items, null,array('class' => 'form-control','placeholder'=>'- Select Fallback Plan -') ) !!} </div>
				</div>	
				<div class="row">
					<?php $carry_remaining_data = array('on'=>'On','off'=>'Off'); ?>
		<div class="form-group col-md-6"> {!! Form::label('carry_remaining_data', 'Carry Remaning Data') !!}
        {!! Form::select('carry_remaining_data', $carry_remaining_data, null,array('class' => 'form-control') ) !!} </div>

        <?php $split_fup = array('daily'=>'Daily','monthly'=>'Monthly','as per plan duration'=>'As Per Sub Plan Duration'); ?>
		<div class="form-group col-md-6"> {!! Form::label('split_fup', 'Split FUP') !!}
        {!! Form::select('split_fup', $split_fup, null,array('class' => 'form-control','placeholder'=>'- Select Split FUP -') ) !!} </div>

				</div>	
				</div>	
				<div class="row">
					<?php $limit_online_time = array('on'=>'On','off'=>'Off'); ?>
		<div class="form-group col-md-6"> {!! Form::label('limit_online_time', 'Limit Online Time') !!}
        {!! Form::select('limit_online_time', $limit_online_time, null,array('class' => 'form-control') ) !!} </div>

			
        <div class="form-group col-md-6"> {!! Form::label('online_time_perday', 'Online Time Per Day') !!}
        {!! Form::text('online_time_perday',null, array('class' => 'form-control','placeholder'=>'Enter Online Time Per Day')) !!} </div>

        


				</div>	
				



	    	</div>
	    	<div class="col-md-6">
	    		<div class="row">
	    			<?php $billing_type = array('prepaid'=>'Prepaid','postpaid'=>'Postpaid'); ?>
		<div class="form-group col-md-6"> {!! Form::label('billing_type', 'Billing Type') !!}
        {!! Form::select('billing_type', $billing_type, null,array('class' => 'form-control','placeholder'=>'Select Billing Type') ) !!} </div>

        <?php $billing_mode = array('leased line'=>'Leased Line','broadband prepaid'=>'Broadband Prepaid','broadband postpaid'=>'Broadband Postpaid'); ?>
		
		<div class="form-group col-md-6"> {!! Form::label('billing_mode', 'Billing Mode') !!}
        {!! Form::select('billing_mode', $billing_mode, null,array('class' => 'form-control') ) !!} </div>

	    		</div>
	    		<div class="row">
	    			<?php $statuses = array('Y'=>'Active','N'=>'Inactive'); ?>
					<div class="form-group col-md-6"> {!! Form::label('status', 'Status') !!}
			        {!! Form::select('status', $statuses, null,array('class' => 'form-control') ) !!} </div>

			        <?php $self_care_portal = array('active'=>'Active','inactive'=>'Inactive'); ?>
					<div class="form-group col-md-6"> {!! Form::label('self_care_portal', 'Self Care Portal') !!}
			        {!! Form::select('self_care_portal', $self_care_portal, null,array('class' => 'form-control') ) !!} </div>

			        
	    		</div>
	    		<div class="row">
	    			<?php $service_tax = array('active'=>'Yes','inactive'=>'No'); ?>
					<div class="form-group col-md-6"> {!! Form::label('service_tax', 'Service Tax') !!}
			        {!! Form::select('service_tax', $service_tax, null,array('class' => 'form-control') ) !!} </div>

			        <?php $service_tax_type = array('inclusive'=>'Inclusive','exclusive'=>'Exclusive'); ?>
					<div class="form-group col-md-6"> {!! Form::label('service_tax_type', 'Service Tax Type') !!}
			        {!! Form::select('service_tax_type', $service_tax_type, null,array('class' => 'form-control','placeholder'=>'- Select Service Tax Type -') ) !!} </div>

			        
	    		</div>
	    		<div class="row expiry_date_burst">
	    			<?php $expiry_date_change_mode = array(1=>'Reset Expiry Date',2=>'Prolog Expiry Date',3=>'Prolog and Reset Expiry Date'); ?>
					<div class="form-group col-md-6"> {!! Form::label('expiry_date_change_mode', 'Expiry Date Change Mode ') !!}
			        {!! Form::select('expiry_date_change_mode', $expiry_date_change_mode, null,array('class' => 'form-control','placeholder'=>'- Select Expiry Date Change Mode -') ) !!} </div>

			        <?php $enable_brust = array('no'=>'No', 'yes'=>'Yes'); ?>
					<div class="form-group col-md-6"> {!! Form::label('enable_brust', 'Enable Burst') !!}
			        {!! Form::select('enable_brust', $enable_brust, null,array('class' => 'form-control') ) !!} </div>

	    		</div>	

	    		<div class="burst_container d-none">
	    		<div class="row">
	    			<div class="form-group col-md-6"> {!! Form::label('brust_upload', 'Burst Upload(kbps)') !!}
        {!! Form::text('brust_upload',null, array('class' => 'form-control','placeholder'=>'Enter Burst Upload(kbps)')) !!} </div>
        <div class="form-group col-md-6"> {!! Form::label('brust_download', 'Burst Download(kbps)') !!}
        {!! Form::text('brust_download',null, array('class' => 'form-control','placeholder'=>'Enter Burst Download(kbps)')) !!} </div>

	    		</div>	
	    		<div class="row">
	    			<div class="form-group col-md-6"> {!! Form::label('burst_threshold_upload', 'Threshold Upload(kbps)
') !!}
        {!! Form::text('burst_threshold_upload',null, array('class' => 'form-control','placeholder'=>'Enter Burst Threshold Upload(kbps)')) !!} </div>
        <div class="form-group col-md-6"> {!! Form::label('brust_threshold_download', 'Download(kbps)') !!}
        {!! Form::text('brust_threshold_download',null, array('class' => 'form-control','placeholder'=>'Enter Burst Threshold Download(kbps)
')) !!} </div>

	    		</div>	

	    		<div class="row">
	    			<div class="form-group col-md-6"> {!! Form::label('brust_upload_time', 'Upload Time(sec) ') !!}
        {!! Form::text('brust_upload_time',null, array('class' => 'form-control','placeholder'=>'Enter Burst Upload Time(Seconds)')) !!} </div>
        <div class="form-group col-md-6"> {!! Form::label('brust_download_time', 'Download Time(sec)') !!}
        {!! Form::text('brust_download_time',null, array('class' => 'form-control','placeholder'=>'Enter Burst Download Time(Seconds)')) !!} </div>

	    		</div>	

	    		<div class="row">

				<div class="form-group col-md-12"> {!! Form::label('priority', 'Priority') !!}
        {!! Form::text('priority',null, array('class' => 'form-control','placeholder'=>'Enter Priority')) !!} </div>

	    		</div>	
				</div>

	    	</div>
	    </div>	
	    <div class="row">
			
        	<div class="form-group col-md-12"> {!! Form::label('your_comments', 'Your Comment') !!}
        {!! Form::textarea('your_comments',null, array('class' => 'form-control','rows'=>2)) !!} </div>


	    </div>
	    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 

<div class="pull-right mt-5 mb-1" align="right"><a href="{{url('admin/broadband-sub-packages/'.$broadbandpackagedetails->id.'/create')}}" class="btn btn-danger btn-sm">Add Sub Plan</a>
</div>
      <h5 class="bg-primary text-white  px-2 pt-1 pb-1">Package Sub Plans</h5>

	    <div class="row" id="package_subplans">
	    <div class="form-group col-md-12">
										

													
										<div class="table-responsive">
										<table class="table" id="dynamic_field" style="font-size: 12px;width: 100%">
											<thead>
												<tr class="table-primary">
													<th>Sub Plan Name</th>
													<th width="75">Price</th>
													<th width="75">GST</th>				
													<th width="75">Total</th>
													<th width="100">Unit Type</th>
													<th width="75">Time Unit</th>
													<th width="175">Distributor Share</th>
													<th width="175">Franchise Share</th>
													<th>Status</th>
													<th> </th>	
												</tr>
											</thead> 

											<tbody>
												@if(count($broadbandsubplans)>0)
												@foreach($broadbandsubplans as $index=>$broadband)	
												<tr>  
													<td> <a href="{{url('admin/broadband-sub-packages/edit/'.$broadband->id)}}">{{$broadband->sub_plan_name}}</a></td>

													<td> {{$broadband->price}}</td>

													<td> {{$broadband->gst}}</td>

													<td> {{$broadband->total}} </td>

													<td class="unit_type">
														{{$broadband->unit_type}}
													</td>
													<td> 
														{{$broadband->time_unit}}
														</td>


													<td>{{$broadband->distributor_share}}  </td>

													<td> {{$broadband->franchise_share}}</td>

													
													<td class="status">
														<?php if($broadband->status == 'Y'){echo "<span class='badge badge-success'>Active</span>";}
														else if($broadband->status == 'N'){echo "<span class='badge badge-secondary'>Inactive</span>";}else{
															echo "<span class='badge badge-secondary'>".$broadband->status."</span>";
														} 
														?>
														
													</td>
													 
												</tr>  
												@endforeach
												@else
												<tr>  
													<td colspan="10">
													    No Records Dound
													</td>
												</tr>	
												@endif

											</tbody>
										</table>
									</div>
										

									</div>
</div>
		
		 
       
	  

	</div>
  </div> 

  <script>

		$(document).ready(function(){ 

			$('#package_type').change(function(ev){
				if($(this).val() == "fall back plan"){
					$(".expiry_date_burst").removeClass('d-none');
				}else if($(this).val() == "data addon plan"){
					$(".expiry_date_burst").addClass('d-none');
				
				}else{
					$(".expiry_date_burst").removeClass('d-none');
				}
			});

			$('#enable_brust').change(function(ev){
				if($(this).val() == "yes"){
					$(".burst_container").removeClass('d-none');
				}else{
					$(".burst_container ").addClass('d-none');
				}
			});

			

			$('#package_data_type').change(function(ev){
				if($(this).val() == "FUP"){
					$(".fup_container").removeClass('d-none');
				}else{
					$(".fup_container").addClass('d-none');
				}
			});
			
			
			//Select Values
			var package_type = $('#package_type').val();
			$('#package_type').val(package_type).trigger('change');
			
			var enable_brust = $('#enable_brust').val();
			$('#enable_brust').val(enable_brust).trigger('change');
			
			var package_data_type = $('#package_data_type').val();
			$('#package_data_type').val(package_data_type).trigger('change');
			


			$('.total_gst').keyup(function(ev){
				var total = $('#price').val() * 1;
				var gst = $('#gst').val() / 100;
				var gstprice = (total*gst);
				var total_price = total+ gstprice;
				var divobj = document.getElementById('total_amount');
				divobj.value = total_price;
			});
			 
		}); 
	</script>
@stop
