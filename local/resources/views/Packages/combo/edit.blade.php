@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit Combo Package</h3></div>
	  
	</div>
	
	
	<div class="card-body" id="<?php echo rand(10000,1000000); ?>">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  
	  {!! Form::model($combopackagedetails, array('route' => array('combo-packages.update', $combopackagedetails->id),'method'=>'put')) !!}
	      @csrf
						
		<div class="row">
			<div class="form-group col-md-4"> {!! Form::label('package_name', 'Package Name') !!}
		        {!! Form::text('package_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Package Name')) !!} </div>
			<div class="form-group col-md-4"> {!! Form::label('broadband_package', 'Broadband Package') !!}
	{!! Form::select('broadband_package', $packages, null,array('class' => 'form-control','placeholder'=>'-- Select Broadband Package --') ) !!} </div>
				
			<div class="form-group col-md-4">
				<?php $connection_types = array('cable'=>'Cable','iptv'=>'IPTV'); ?>
				<div class="form-group col-md-12"> {!! Form::label('connection_type', 'Cable / IPTV') !!}
				{!! Form::select('connection_type', $connection_types, null,array('class' => 'form-control') ) !!} </div>
			</div>
			<div class="form-group col-md-12">
						<div class="iptv_container col-md-12" style="display: none">
        					<label for="iptv"><strong>IPTV</strong></label> 	
        				</div>
						
						<?php
							$listiptvpackages = array();
							$listiptvallacart = array();
							$listiptvbase = array();
							$listiptvlocal = array();
							
							if(!empty($combopackagedetails->iptv_packages)){
								$listiptvpackages = explode(",",$combopackagedetails->iptv_packages);
							}

							if(!empty($combopackagedetails->iptv_allacart)){
								$listiptvallacart = explode(",",$combopackagedetails->iptv_allacart);
							}
							
							if(!empty($combopackagedetails->iptv_base)){
								$listiptvbase = explode(",",$combopackagedetails->iptv_base);
							}
							
							if(!empty($combopackagedetails->iptv_local)){
								$listiptvlocal = explode(",",$combopackagedetails->iptv_local);
							}
							
							$selectediptvdata = array_merge($listiptvpackages,$listiptvallacart,$listiptvbase,$listiptvlocal);
							//print_r($iptvdatabytype['packages']); 
							//print_r($listiptvpackages); exit;
							//exit;
						?>
						
						<div class="row">
						<div class="iptv_container col-md-6" style="display: none">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#iptvbase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvlocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvpackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">

								<div class="tab-pane container pl-1 pr-1" id="iptvpackages" >
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
								
								<div class="tab-pane container active pl-1 pr-1" id="iptvbase">
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
												<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_allacart" value="{{$package['id']}}" name="iptvallacart[]">&nbsp;{{$package['name']}} </label>
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
											<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="iptvallacart[]" checked>&nbsp;{{$package['name']}}</label>
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
						
						if(!empty($combopackagedetails->cable_packages)){
							$listcablepackages = explode(",",$combopackagedetails->cable_packages);
						}

						if(!empty($combopackagedetails->cable_allacart)){
							$listcableallacart = explode(",",$combopackagedetails->cable_allacart);
						}
						
						if(!empty($combopackagedetails->cable_base)){
							$listcablebase = explode(",",$combopackagedetails->cable_base);
						}
						
						if(!empty($combopackagedetails->cable_local)){
							$listcablelocal = explode(",",$combopackagedetails->cable_local);
						}
						
						$selectedcabledata = array_merge($listcablepackages,$listcableallacart,$listcablebase,$listcablelocal);
						?>
						
						<div class="cable_container col-md-12 pt-2">
        					<label for="cable"><strong>Cable</strong></label> 	
        				</div>	
						<div class="row">
						<div class="cable_container col-md-6">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cablebase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablelocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablepackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cableallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">

							<div class="tab-pane container pl-1 pr-1" id="cablepackages" >
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
								
								<div class="tab-pane container pl-1 pr-1 active" id="cablebase">
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
							
					<div class="row">
			
        	<div class="form-group col-md-12"> {!! Form::label('your_comments', 'Your Comment') !!}
        {!! Form::textarea('your_comments',null, array('class' => 'form-control','rows'=>1)) !!} </div>


	    </div>
			
		{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
		
		
		
		<div class="pull-right mt-5 mb-1" align="right"><a href="{{url('admin/combo-sub-packages/'.$combopackagedetails->id.'/create')}}" class="btn btn-danger btn-sm">Add Sub Plan</a>
</div>
      <h5 class="bg-primary text-white  px-2 pt-1 pb-1">Combo Package Sub Plans</h5>

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
												@if(count($combosubplans)>0)
												@foreach($combosubplans as $index=>$combo)	
												<tr>  
													<td> <a href="{{url('admin/combo-sub-packages/edit/'.$combo->id)}}">{{$combo->sub_plan_name}}</a></td>

													<td> {{$combo->price}}</td>

													<td> {{$combo->gst}}</td>

													<td> {{$combo->total}} </td>

													<td class="unit_type">
														{{$combo->unit_type}}
													</td>
													<td> 
														{{$combo->time_unit}}
														</td>


													<td>{{$combo->distributor_share}}  </td>

													<td> {{$combo->franchise_share}}</td>

													
													<td class="status">
														<?php if($combo->status == 'Y'){echo "<span class='badge badge-success'>Active</span>";}
														else if($combo->status == 'N'){echo "<span class='badge badge-secondary'>Inactive</span>";}else{
															echo "<span class='badge badge-secondary'>".$combo->status."</span>";
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

  <script type="text/javascript">
	$(document).ready(function() {
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
				$(".cable_container").show();
				$(".iptv_container").hide();
			}else if(connection_type == 'iptv'){
				$(".cable_container").hide();
				$(".iptv_container").show();
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
		
		
		
	    $(".cable_container").show();
		$(".iptv_container").hide();
		
        $('#connection_type').val('{{$combopackagedetails->connection_type}}').trigger('change');
        
		
			 
	}); 
</script>
  
@stop