@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit Branch</h3></div>
	  
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
	  
	  {!! Form::model($branchdetails, array('route' => array('branches.update', $branchdetails->id),'method'=>'put','id'=>'edit_form')) !!}
	      @csrf
			<div class="row">
			
		<div class="form-group col-md-3"> {!! Form::label('city', 'City*') !!}
        {!! Form::select('city', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor*') !!}
        {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
	
		 <div class="form-group col-md-3"> {!! Form::label('sub_distributor', 'Sub Distributor*') !!}
        {!! Form::select('sub_distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>
		
        <div class="form-group col-md-3"> {!! Form::label('branch_name', 'Branch Name*') !!}
        {!! Form::text('branch_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Branch Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('owner_name', 'Owner Name*') !!}
        {!! Form::text('owner_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Owner Name')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('email', 'Email*') !!}
        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>

        
		
		<div class="form-group col-md-3"> {!! Form::label('office_address', 'Office Address*') !!}
        {!! Form::text('office_address',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Office Address')) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('rent', 'Rent') !!}
        {!! Form::text('rent',null, array('class' => 'form-control','placeholder'=>'Enter Rent')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('mobile', 'Mobile*') !!}
        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Mobile')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map2','placeholder'=>'Enter Latitude & Longitude')) !!} 
		<a class="btn btn-sm btn-warning getMap" map_num='2'>Get</a>	
		</div>
		</div>
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=>'edit_form_btn', 'disabled'=>'true']) !!} 
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
</script> 
<script type="text/javascript">
	$(document).ready(function() {
         
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
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

        //$('#distributor').val({{old('city')}}).trigger('change');
        $('#distributor').val({{$branchdetails->distributor_id}});
        
    });
</script>
@stop
