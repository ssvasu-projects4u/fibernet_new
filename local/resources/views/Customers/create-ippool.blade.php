@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	  <!-- @include('administration::topmenu') -->
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create IPPOOL</h3></div>
	  
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
	  
	  
	  {!! Form::open(['route' =>['customers.ippoolstore'],'method'=>'post','id'=>'create_form'])!!}
	      @csrf
			
			<div class="row">
			
			<div class="form-group col-md-3"> {!! Form::label('city', 'City*') !!}
        {!! Form::select('city',  null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor*') !!}
        {!! Form::select('distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch*') !!}
        {!! Form::select('branch', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>

			<div class="form-group col-md-3"> {!! Form::label('franchise_name', 'Franchise Name*') !!}
        {!! Form::text('franchise_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Franchise Name')) !!} </div>
        <div class="form-group col-md-3"> {!! Form::label('area_description', 'Area Description') !!}
        {!! Form::text('area_description',null, array('class' => 'form-control','placeholder'=>'Enter Area Description')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('name', 'Contact Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Contact Name')) !!} </div>
			
		
		<div class="form-group col-md-3"> {!! Form::label('email', 'Email*') !!}
        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>
        <input type="hidden" name="dp" id="dp" required="required">
        <div class="form-group col-md-3">
            <label for="password" class="col-form-label text-md-right">{{ __('Password*') }}</label>

            <div class="col-md-61">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
		
		<div class="form-group col-md-3"> {!! Form::label('mobile', 'Mobile*') !!}
        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Mobile')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('landline', 'Landline') !!}
        {!! Form::text('landline',null, array('class' => 'form-control','placeholder'=>'Enter Landline')) !!} </div>
		<div class="form-group col-md-3"> {!! Form::label('aadhar', 'Aadhar Number') !!}
        {!! Form::text('aadhar',null, array('class' => 'form-control','placeholder'=>'Enter Aadhar Number')) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('agreement_address', 'Agreement Address') !!}
        {!! Form::text('agreement_address',null, array('class' => 'form-control','placeholder'=>'Enter Agreement Address')) !!} </div>
        	<div class="form-group col-md-3"> {!! Form::label('vlan', 'VLAN*') !!}
        {!! Form::text('vlan',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter VLAN')) !!} </div>
		
		
		</div>
		
        <div class="row">
		<div class="col-md-12"><br><h5>Bank Details</h5><hr></div>
		</div>
		<div class="row">
		<div class="form-group col-md-4"> {!! Form::label('bank_holder_name', 'Account Holder Name*') !!}
        {!! Form::text('bank_holder_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Account Holder Name')) !!} </div>

		<div class="form-group col-md-4"> {!! Form::label('bank_account', ' Account Number*') !!}
        {!! Form::text('bank_account',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Account Number')) !!} </div>
		
    </div>
    <div class="row">

		<div class="form-group col-md-4"> {!! Form::label('bank_name', 'Bank Name*') !!}
        {!! Form::text('bank_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Bank Name')) !!} </div>
		
		<div class="form-group col-md-4"> {!! Form::label('bank_branch_name', 'Bank Branch Name*') !!}
        {!! Form::text('bank_branch_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Bank Branch Name')) !!} </div>
		
		<div class="form-group col-md-4"> {!! Form::label('ifsc_code', 'IFSC Code*') !!}
        {!! Form::text('ifsc_code',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter IFSC Code')) !!} </div>
		
		</div>
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=>'create_form_btn', 'disabled'=>'true']) !!}
       {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!} 
	  

	</div>
  </div>

<script type="text/javascript">
        
	$(document).ready(function() {
        
       
            
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city === '' || city <=0){
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

        //$('#city').val({{old('city')}}).trigger('change');
        
    });
</script>

  <script type="text/javascript">
	$(document).ready(function() {
        $('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
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

        //$('#city').val({{old('city')}}).trigger('change');
        
    });
</script>


@stop