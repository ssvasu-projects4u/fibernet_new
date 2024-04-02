@extends('layouts.admin')

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

    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">My Profile</h4></div>
	</div>
	
	
	<div class="card-body">
	  
	  {!! Form::model($userdetails, array('route' => array('admin.profile'),'method'=>'put')) !!}
      @csrf
	  <div class="row">
	  <div class="form-group col-md-4"> {!! Form::label('name', 'Name') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Name')) !!} </div>

        <div class="form-group col-md-4"> {!! Form::label('email', 'Email') !!}
        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>
      </div>
       <div class="row">
	  <div class="form-group col-md-12" align="right">   
		  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		</div>
		</div>  
		{!! Form::close() !!} 
	</div>
  </div>


  <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Change Password</h4></div>
	</div>
  <div class="card-body">
	 
	  
	  {!! Form::model($userdetails, array('route' => array('admin.changepassword'),'method'=>'put')) !!}
      @csrf
	  <div class="row">
	  <div class="form-group col-md-4">
            <label for="oldpassword" class="col-form-label text-md-right">{{ __('Old Password') }}</label>

            
                <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required placeholder="Enter Old Password">

                @error('oldpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
        </div>
	  <div class="form-group col-md-4">
            <label for="password" class="col-form-label text-md-right">{{ __('New Password') }}</label>

            
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
        </div>

        <div class="form-group col-md-4">
            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password" required autocomplete="new-password">
            
        </div>
      </div>
      <div class="row">
	  <div class="form-group col-md-12" align="right">
	  	 {!! Form::submit('Submit', ['class' => 'btn btn-success pull-right']) !!} 
	  </div>
	  </div>	
 
		{!! Form::close() !!} 
	</div>
	</div>
		  
@stop
