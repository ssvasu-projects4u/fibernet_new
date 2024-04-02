@extends('layouts.distributor')

@section('content')
    <div class="row">
    	<div class="col-md-12">
			@if($errors->any())
				<div class="alert alert-danger"> @foreach($errors->all() as $error)
				<p>{{ $error }}</p>
				@endforeach </div>
			@endif

			@if(Session::has('error'))
				<div class="alert alert-danger alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> {{ Session::get('error') }}
				@php
				Session::forget('error');
				@endphp
				</div>
			@endif

			@if(Session::has('success'))
				<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success!</strong> {{ Session::get('success') }}
				@php
				Session::forget('success');
				@endphp
				</div>
			@endif
    	</div>	
    </div>	

    <div class="row">
    	<div class="col-md-12">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">My Profile</h4></div>
	</div>
	
	
	<div class="card-body">
	  
	  {!! Form::model($userdetails, array('route' => array('customer.profile'),'method'=>'put')) !!}
      @csrf
	  
	  <div class="row">
    	
	  <div class="col-md-4 form-group"> {!! Form::label('first_name', 'First Name') !!}
        {!! Form::text('first_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter First Name')) !!} </div>
		
		<div class="col-md-4 form-group"> {!! Form::label('last_name', 'Last Name') !!}
        {!! Form::text('last_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Last Name')) !!} </div>
	
        <div class="col-md-4 form-group"> {!! Form::label('email', 'Email') !!}
        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>
      
      </div> 
	  <div class="row">
	  <div class="col-md-12 form-group">   
		  {!! Form::submit('Update', ['class' => 'btn btn-success float-right']) !!} 
		</div>
		</div>
		
		{!! Form::close() !!} 
</div>
  </div>
</div>
<div class="col-md-12">


  <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Change Password</h4></div>
	</div>
  <div class="card-body">
  	
	  
		  {!! Form::model($userdetails, array('route' => array('customer.changepassword'),'method'=>'put')) !!}
      @csrf
	  <div class="row">
	  <div class="col-md-4 form-group">
            <label for="oldpassword" class="col-form-label text-md-right">{{ __('Old Password') }}</label>

            <div class="col-md-61">
                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required placeholder="Enter Old Password">

                @error('oldpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
	  <div class="col-md-4 form-group">
            <label for="password" class="col-form-label text-md-right">{{ __('New Password') }}</label>

            <div class="col-md-61">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4 form-group">
            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-61">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password" required autocomplete="new-password">
            </div>
        </div>
		
		</div>
      
      <div class="row">
	  <div class="col-md-12 form-group" >
	  	 {!! Form::submit('Submit', ['class' => 'btn btn-success float-right']) !!} 
	  </div>
	  </div>
	  
 
		{!! Form::close() !!} 
	</div>
	</div>
</div></div>
		  
@stop
