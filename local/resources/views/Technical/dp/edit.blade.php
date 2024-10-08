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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit DP</h3></div>
	  
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
	  
	  
	  
	  {!! Form::model($dpdetails, array('route' => array('dp.update', $dpdetails->id),'method'=>'put')) !!}
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
			<div class="form-group col-md-3"> {!! Form::label('fibercolor', 'Fiber Color') !!}
        {!! Form::select('fibercolor', $fiber_color, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
	
			<div class="form-group col-md-3"> {!! Form::label('required_material', 'Enclosure Serial Number') !!}
    <!--    {!! Form::select('enclosure',$dpenclosure, null, array('class' => 'form-control','required'=>'required') ) !!}  -->
        <select class="form-control" name="enclosure" id="enclosure">
            @foreach($dpenclosure as $de)
            <option value="{{ $de->enclosure_serialno }}">{{ $de->enclosure_serialno }}</option>
            @endforeach
             @foreach($enclosuredata as $de)
            <option value="{{ $de->serial_no }}">{{ $de->serial_no }}</option>
            @endforeach
            
        </select>
        </div>
	
		
		<div class="form-group col-md-3"> {!! Form::label('olt_id', 'OLT Id') !!}
        {!! Form::select('olt_id', $olt_items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT ID --') ) !!} </div>
		
       
        
          
		<div class="form-group col-md-3"> {!! Form::label('olt_port_num', 'OLT Port Number') !!}
        {!! Form::select('olt_port_num', $olt_port_numbers, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
		<div class="form-group col-md-3"> {!! Form::label('generate_dp', 'Generate DP ID.') !!}
        {!! Form::text('generate_dp',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Generate DP')) !!} </div>
		
		
		
		<?php $splitters = array("4"=>"1:4","8"=>"1:8"); 
		
		?>	
		
		<div class="form-group col-md-3"> {!! Form::label('splitter', 'Splitter') !!}
        {!! Form::select('splitter', $splitterd, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter --') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('splitter_serialno', 'Splitter Serial Number') !!}
        {!! Form::select('splitter_serialno', $splitterserial, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
	
		
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
				$('#subdistributor').html("<option value=''>-- Select Sub Distributor --</option>");
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
                   // alert(errorThrown);
                }
            });
        });
		
		
		$('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
				$('#subdistributor').html("<option value=''>-- Select Sub Distributor --</option>");
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
                   $('#subdistributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   // alert(errorThrown);
                }
            });
        });
		
		$('#subdistributor').on('change', function() {
            var subdistributor = $(this).val();
            var city = $("#city").val();
            if(subdistributor == '' || subdistributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+subdistributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   // alert(errorThrown);
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
                   // alert(errorThrown);
                }
            });
        });
		
		
		$('#franchise').on('change', function() {
            var franchise = $(this).val();
			if(franchise == '' || franchise <=0){
            	$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
            	return;
            }
			$.ajax({
                url: "{{url('/admin/fiber-laying/franchise-fibers')}}/"+franchise+"/dp",
                type: "GET",
                success:function(data) {
                   $('#fiber').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   // alert(errorThrown);
                }
            });
			
			$.ajax({
                url: "{{url('/admin/olt/franchise-olts')}}/"+franchise,
                type: "GET",
                success:function(data) {
                   $('#olt_id').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
			
			
			
        });
		
		$('#olt_id').on('change', function() {
            var olt_id = $("#olt_id").val();
			var olt_port_num = $("#olt_port_num").val();
            var franchise = $("#franchise").val();
			
            if(olt_id > 0){
                $.ajax({
                    url: "{{url('/admin/olt/olt-ports')}}/"+olt_id+"/"+franchise,
                    type: "GET",
                        success:function(data) {
                           
                            $('#olt_port_num').html(data);
                        },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                       // alert(errorThrown);
                    }
                });
            }

			if(olt_id != '' && olt_port_num !=''){
				$("#generate_dp").val(olt_id+'/'+olt_port_num);
			}else{
				$("#generate_dp").val('');
			}	
		});
		
		$('#olt_port_num').on('change', function() {
            var olt_id = $("#olt_id").val();
			var olt_port_num = $("#olt_port_num").val();
			
			if(olt_id != '' && olt_port_num !=''){
				$("#generate_dp").val(olt_id+'/'+olt_port_num);
			}else{
				$("#generate_dp").val('');
			}	
		});
		
		
		
        //$('#city').val({{old('city')}}).trigger('change');
        
    });
</script>  
@stop
