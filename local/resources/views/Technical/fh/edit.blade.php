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
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit FH</h3></div>
	  
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
	  
	  
	  
	  {!! Form::model($fhdetails, array('route' => array('fh.update', $fhdetails->id),'method'=>'put')) !!}
	      @csrf
			
			<div class="row">
			<?php if($roles[0]!='branch' && $roles[0]!='franchise'){ ?>
			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', $branches, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
		
		<?php } if( $roles[0]=='branch' || $roles[0]=='superadmin' ){ ?>
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
        {!! Form::select('franchise', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
		<?php } ?>
		<div class="form-group col-md-3"> {!! Form::label('fiber', 'Fiber') !!}
        {!! Form::select('fiber', $franchisefibers, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber --') ) !!} </div>
		
			
		<?php //$fiber_colors = array('blue'=>'Blue','orange'=>'Orange','green'=>'Green','brown'=>'Brown','slate'=>'Slate','white'=>'White','red'=>'Red','black'=>'Black','yellow'=>'Yellow','violet'=>'Violet','rose'=>'Rose','aqua'=>'Aqua'); 
		
		
		
		
		?>
		<div class="form-group col-md-3"> {!! Form::label('fiber_color', 'Fiber Color') !!}
        {!! Form::select('fiber_color', $fiber_colors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber Color --') ) !!} </div>	
		
		<div class="form-group col-md-3"> {!! Form::label('olt_id', 'OLT Id') !!}
        {!! Form::select('olt_id', $olt_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('dp_num', 'DP ID') !!}
        {!! Form::select('dp_num', $dp_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
        
        <?php //$splitters = array(); ?>	
		<div class="form-group col-md-3"> {!! Form::label('splitter_core', 'Splitter Core') !!}
        {!! Form::select('splitter_core', $splitter_core_colors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter Core --') ) !!} </div>
		
        <div class="form-group col-md-3"> {!! Form::label('generate_fh_id', 'Generate FH Id') !!}
        {!! Form::text('generate_fh_id',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Generate FH Id')) !!} </div>
        
        <?php $splitters = array("1:8"=>"1:8","1:16"=>"1:16"); ?>	
		<div class="form-group col-md-3"> {!! Form::label('splitter', 'Splitter') !!}
        {!! Form::select('splitter', $splitters, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter --') ) !!} </div>
		    <div class="form-group col-md-3"> {!! Form::label('termination_box', 'Termination Box') !!}
        {!! Form::select('termination_box', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Termination Box --') ) !!} </div>
	


		<div class="form-group col-md-3"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map2','required'=>'required','placeholder'=>'Enter Latitude & Longitude')) !!} 
        <a class="btn btn-sm btn-warning getMap" map_num='2'>Get</a></div>
		
		
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
		if($('#map'+map_num).val()===null || $('#map'+map_num).val()===''){
                    
                $('#map'+map_num).val(position.coords.latitude+","+ position.coords.longitude);
            }
	}
	
	
	$(document).ready(function() {
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
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
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+distributor,
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
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
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
		
		
		$('#franchise').on('change', function() {
            var franchise = $(this).val();
			if(franchise == '' || franchise <=0){
            	$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
				$('#dp_num').html("<option value=''>-- Select DP --</option>");
            	return;
            }
			$.ajax({
                url: "{{url('/admin/fiber-laying/franchise-fibers')}}/"+franchise+"/fh",
                type: "GET",
                success:function(data) {
                   $('#fiber').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
			
			$.ajax({
                url: "{{url('/admin/olt/franchise-olts')}}/"+franchise,
                type: "GET",
                success:function(data) {
                   $('#olt_id').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
			
			$.ajax({
                url: "{{url('/admin/dp/franchise-dps')}}/"+franchise,
                type: "GET",
                success:function(data) {
                   $('#dp_num').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
			
			
			
        });
		
		$('#fiber').on('change', function() {
            var fiber = $(this).val();
			if(fiber == '' || fiber <=0){
            	$('#fiber_color').html("<option value=''>-- Select Fiber Color --</option>");
				return;
            }
			$.ajax({
                url: "{{url('/admin/fiber-laying/fiber-fibercolors')}}/"+fiber,
                type: "GET",
                success:function(data) {
                   $('#fiber_color').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
		
		
		
		
		
        //$('#city').val({{old('city')}}).trigger('change');
        
    });
</script>  
@stop
