@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit Distributor</h3></div>
	  
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
	  
	  {!! Form::model($distributordetails, array('route' => array('distributors.update', $distributordetails->id),'method'=>'put','id'=>'edit_form')) !!}
	      @csrf
			
	      <div class="row">
		  
		  <div class="form-group col-md-3"> {!! Form::label('state', 'State*') !!}
		  {!! Form::select('state', $states, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select State --') ) !!} </div>

		  <div class="form-group col-md-3"> {!! Form::label('city', 'City*') !!}
        {!! Form::select('city', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
		
			<div class="form-group col-md-3"> {!! Form::label('distributor_name', 'Distributor Name*') !!}
        {!! Form::text('distributor_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Distributor Name')) !!} </div>
				

        <div class="form-group col-md-3"> {!! Form::label('area_description', 'Area Description') !!}
        {!! Form::text('area_description',null, array('class' => 'form-control','placeholder'=>'Enter Area Description')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('name', 'Contact Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Contact Name')) !!} </div>
			
		
		<div class="form-group col-md-3"> {!! Form::label('email', 'Email*') !!}
        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('office_address', 'Office Address*') !!}
        {!! Form::text('office_address',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Office Address')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('mobile', 'Mobile*') !!}
        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Mobile')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('rent', 'Rent') !!}
        {!! Form::text('rent',null, array('class' => 'form-control','placeholder'=>'Enter Rent')) !!} </div>
		
		
		
		<div class="form-group col-md-3"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map2','placeholder'=>'Enter Latitude & Longitude')) !!} 
		<a class="btn btn-sm btn-warning getMap" map_num='2'>Get</a>	
		</div>

	</div>
	<div class="row">
		<div class="col-md-12"><br><h5>Bank Details</h5><hr></div>
		</div>
		<div class="row">
		<div class="form-group col-md-3"> {!! Form::label('bank_holder_name', 'Account Holder Name') !!}
        {!! Form::text('bank_holder_name',null, array('class' => 'form-control','placeholder'=>'Enter Account Holder Name')) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('bank_account', ' Account Number') !!}
        {!! Form::text('bank_account',null, array('class' => 'form-control','placeholder'=>'Enter Account Number')) !!} </div>
		
    </div>
    <div class="row">

		<div class="form-group col-md-3"> {!! Form::label('bank_name', 'Bank Name') !!}
        {!! Form::text('bank_name',null, array('class' => 'form-control','placeholder'=>'Enter Bank Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('bank_branch_name', 'Bank Branch Name') !!}
        {!! Form::text('bank_branch_name',null, array('class' => 'form-control','placeholder'=>'Enter Bank Branch Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('ifsc_code', 'IFSC Code') !!}
        {!! Form::text('ifsc_code',null, array('class' => 'form-control','placeholder'=>'Enter IFSC Code')) !!} </div>
		
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
@stop
