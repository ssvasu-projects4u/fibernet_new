@extends('layouts.franchise')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('frontend.franchise.customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Add Technial Details</h3></div>
	  
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
	  
	  
	  {!! Form::model($customerdetails, array('route' => array('customers.addtechnical', $customerdetails->id),'method'=>'put')) !!}
	       @csrf
	      

	      <div class="row">
					<div class="form-group col-md-3"> {!! Form::label('olt', 'OLT') !!}
						        {!! Form::select('olt', $olt, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT --') ) !!} </div>
									
							<div class="form-group col-md-3"> {!! Form::label('dp', 'DP') !!}
				        {!! Form::select('dp', $dp, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select DP --') ) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('fh', 'FH') !!}
        {!! Form::select('fh', $fh, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select FH --') ) !!} </div>

         				
						<div class="form-group col-md-3"> {!! Form::label('fh_color', 'FH Color') !!}
				        {!! Form::text('fh_color',null, array('class' => 'form-control','placeholder'=>'Enter FH Color')) !!} </div>

						
				        <div class="form-group col-md-3"> {!! Form::label('fiber_length', 'Fiber Length (in Meters)') !!}
				        {!! Form::text('fiber_length',null, array('class' => 'form-control','placeholder'=>'Enter Fiber Length (in Meters)')) !!} </div>
						
						<?php if($customerdetails->connection_type == 'cable'){ ?>
				        <div class="form-group col-md-3"> {!! Form::label('stb_num', 'STB Number') !!}
				        {!! Form::text('stb_num',null, array('class' => 'form-control','placeholder'=>'Enter STB Number')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_model', 'STB Model') !!}
				        {!! Form::text('stb_model',null, array('class' => 'form-control','placeholder'=>'Enter STB Model')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_company', 'STB Company') !!}
				        {!! Form::text('stb_company',null, array('class' => 'form-control','placeholder'=>'Enter STB Company')) !!} </div>
						<?php }else{ ?>
						<div class="form-group col-md-3"> {!! Form::label('stb_num', 'ONT Number') !!}
				        {!! Form::text('stb_num',null, array('class' => 'form-control','placeholder'=>'Enter ONT Number')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_model', 'ONT Model') !!}
				        {!! Form::text('stb_model',null, array('class' => 'form-control','placeholder'=>'Enter ONT Model')) !!} </div>

				        <div class="form-group col-md-3"> {!! Form::label('stb_company', 'ONT Company') !!}
				        {!! Form::text('stb_company',null, array('class' => 'form-control','placeholder'=>'Enter ONT Company')) !!} </div>
						<?php } ?>


				        
        				<div class="form-group col-md-6"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map1','placeholder'=>'Enter Latitude & Longitude')) !!} 
		<a class="btn btn-sm btn-warning getMap" map_num="1">Get</a>	
		</div>
        			

					</div>	
						

		
		
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
	<script>
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
		$('#map'+map_num).val(position.coords.latitude+","+ position.coords.longitude);
	}
	
	$(document).ready(function() {
		$('#fh').on('change', function() {
            var fh = $(this).val();
			if(fh == '' || fh <=0){
            	$('#fh_color').val("");
				return;
            }
			$.ajax({
                url: "{{url('/admin/fh/fhcolors')}}/"+fh,
                type: "GET",
                success:function(data) {
                   $('#fh_color').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
		
		
	});
	
	
	
	</script> 
@stop
