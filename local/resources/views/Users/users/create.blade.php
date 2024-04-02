@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('users.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Create User</h4></div>
	</div>
	
	<div class="card-body">
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['users.store'],'method'=>'post'])!!}
	      @csrf
			<div class="row">

			<div class="form-group col-md-6"> {!! Form::label('name', 'Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Name')) !!} </div>
      
      <div class="form-group col-md-6"> {!! Form::label('email', 'Email*') !!}
        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>


        <div class="form-group col-md-6">
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

        <div class="form-group col-md-6">
            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

            <div class="col-md-61">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password" required autocomplete="new-password">
            </div>
        </div>
      
      <div class="form-group col-md-6"> {!! Form::label('role', 'Role*') !!}
        {!! Form::select('role', $roles, null,array('class' => 'form-control','required'=>'required','placeholder'=>'--Select Role --') ) !!} </div>

        
         <?php $user_statuses = array('Y'=>'Active','N'=>'In Active'); ?>	
		<div class="form-group  col-md-6"> {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', $user_statuses, null,array('class' => 'form-control') ) !!} </div>

      

      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	
	</div>
  </div>	  
@stop