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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit DPD</h3></div>
	  
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
	  
	  
	  
	  {!! Form::model($dpddetails, array('route' => array('dpd.update', $dpddetails->id),'method'=>'put')) !!}
	      @csrf
			
			<div class="row">
			<?php if($roles[0]!='branch' && $roles[0]!='franchise'){ ?>
			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor') !!}
        {!! Form::select('subdistributor', $subdistributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', $branches, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
		
        <div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
        {!! Form::select('franchise', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>

		<?php } if( $roles[0]=='branch' || $roles[0]=='superadmin' ){ ?>
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
        {!! Form::select('franchise', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
		<?php } ?>
		<div class="form-group col-md-3"> {!! Form::label('fiber', 'Fiber') !!}
        {!! Form::select('fiber', $franchisefibers, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber --') ) !!} </div>
        
        <div class="form-group col-md-3"> {!! Form::label('Enclosure', 'Enclosure') !!}
        {!! Form::select('Enclosure', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Enclosure --') ) !!} </div>
	
			
		<div class="form-group col-md-3"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map2','required'=>'required','placeholder'=>'Enter Latitude & Longitude')) !!} 
        <a class="btn btn-sm btn-warning getMap" map_num='2'>Get</a></div>
		
		
		</div>
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	<script type="text/javascript">
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
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/"+city,
                type: "GET",
                success:function(data) {
                   $('#distributor').html(data);
                   $('#branch').html("<option value=''>-- Select Branch --</option>");
				   $('#franchise').html("<option value=''>-- Select Franchise --</option>");
				   $('#fiber').html("<option value=''>-- Select Fiber --</option>");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
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
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
        });

		
		$('#branch').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
            if(branch == '' || branch <=0){
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                   $('#franchise').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
        });
		
		$('#franchise').on('change', function() {
            var franchise = $(this).val();
			if(franchise == '' || franchise <=0){
            	$('#fiber').html("<option value=''>-- Select Fiber --</option>");
            	return;
            }
			$.ajax({
                url: "{{url('/admin/fiber-laying/franchise-fibers')}}/"+franchise+"/dpd",
                type: "GET",
                success:function(data) {
                   $('#fiber').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
        });
		
		
		$('.fiber_color').change(function() {
			var colors = 0;
			$('.fiber_color').each(function(){
				if($(this).is(':checked')){
					colors = colors + 1;
				}	
			});	
			
			if(colors > $('#fiber_core').val()){
				$(this).prop("checked", 0);
				alert('Reached Maximum Limit. Fiber Core Limit is '+$('#fiber_core').val());
				return false;
			}	
			//alert(colors);  
		});
        

        
		
        //$('#city').val({{old('city')}}).trigger('change');
        
    });

</script>
		  
@stop
