@extends('layouts.customer')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Change Package</h3></div>
	  
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
	  
	  
	  
	  {!! Form::open(['route' =>['customer.change-package'],'id'=>'customer_submit','method'=>'post','files'=>'true'])!!}
	      @csrf
					
		<div class="row">
			<div class="col-md-12">
				<?php //$connection_types = array('broadband'=>'Broadband','cable'=>'Cable','iptv'=>'IPTV','combo'=>'Combo'); ?>
				<div class="form-group col-md-12"> {!! Form::label('connection_type', 'Connection Type') !!}
				{!! Form::select('connection_type', $connection_types, 'broadband',array('class' => 'form-control') ) !!} </div>
				
									
					
			
			</div>
			<div class="col-md-12">
						<div class="form-group broadband_container col-md-12"> {!! Form::label('package', 'Broadband Package') !!}
	{!! Form::select('package', $packages, null,array('class' => 'form-control','placeholder'=>'-- Select Broadband Package --') ) !!} </div>
				<div class="form-group broadband_container col-md-12"> {!! Form::label('sub_package', 'Broadband Sub Package') !!}
{!! Form::select('sub_package', [], null,array('class' => 'form-control','placeholder'=>'-- Select Broadband Sub Package --') ) !!} </div>
						
						<div class="form-group combo_container col-md-12" style="display: none"> {!! Form::label('combo_package', 'Combo Package') !!}
	{!! Form::select('combo_package', $combopackages, null,array('class' => 'form-control','placeholder'=>'-- Select Combo Package --') ) !!} </div>
				<div class="form-group combo_container col-md-12" style="display: none"> {!! Form::label('combo_sub_package', 'Combo Sub Package') !!}
{!! Form::select('combo_sub_package', [], null,array('class' => 'form-control','placeholder'=>'-- Select Combo Sub Package --') ) !!} </div>
						
						
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
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablepackages"> Packages </a></li>
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
							
							
							<div class="tab-pane container pl-1 pr-1" id="cablepackages" >
								<div class="vertical-menu" id="select1">
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
										@foreach($cabledatabytype['packages'] as $package)
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package" value="{{$package['id']}}" name="cablepackage[]">&nbsp;{{$package['name']}}</label>
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
							
							
							
							
					
		<div align="right" class="mt-2">	
			{!! Form::submit('Change Package', ['class' => 'btn btn-success']) !!} 
		</div>
		{!! Form::close() !!} 
	</div>
  </div>

  <script type="text/javascript">
	$(document).ready(function() {
        $('.row_setup_box_amount').hide();
		$('.row_androidbox_security_deposit').hide();
		$('.row_secure_deposite_amount').show();
				
		 

        $('#package').on('change', function() {
            var package = $(this).val();
            if(package == '' || package <=0){
            	$('#sub_package').html("<option value=''>-- Select Sub Package --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/customer/package-subpackages')}}/"+package,
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
                url: "{{url('/customer/package-combo-subpackages')}}/"+package,
                type: "GET",
                success:function(data) {
                   $('#combo_sub_package').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });


        $('#connection_type').on('change', function() {
        	var connection_type = $(this).val();
			//alert(connection_type);
			
			if(connection_type == 'cable'){
				$(".broadband_container").hide();
        		$(".cable_container").show();
				$(".iptv_container").hide();
				$(".combo_container").hide();
				
				$('.row_androidbox_security_deposit').hide();
				$('.row_setup_box_amount').show();
				$('.row_secure_deposite_amount').hide();
        	}else if(connection_type == 'iptv'){
				$(".broadband_container").hide();
        		$(".cable_container").hide();
				$(".iptv_container").show();
				$(".combo_container").hide();
				
				$('.row_androidbox_security_deposit').show();
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
			}else if(connection_type == 'combo'){
				$(".broadband_container").hide();
        		$(".cable_container").hide();
				$(".iptv_container").hide();
				$(".combo_container").show();
				
				$('.row_androidbox_security_deposit').show();
				$('.row_setup_box_amount').hide();
				$('.row_secure_deposite_amount').show();
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
		
		

	    $(".broadband_container").show();
        $(".cable_container").hide();
		$(".iptv_container").hide();
		$(".combo_container").hide();		
    });
</script>
  
@stop
