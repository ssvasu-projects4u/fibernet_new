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
	
		<!-- <div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor*') !!}
        {!! Form::select('subdistributor', $subdistributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>-->
		
		 <div class="form-group col-md-3">
		 {!! Form::label('subdistributor', 'Sub Distributor*') !!}
		  <select class ="form-control" id="subdistributor" name="subdistributor" required>
		  <option value="" >-- Select Sub Distributor --</option>
            @foreach($subdistributors as $value => $label)
                <option value="{{ $value }}" {{ (old('dropdown', $branchdetails['subdistributor_id']) == $value) ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
		</div>
		
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

        
    });
</script>
@stop
