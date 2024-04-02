@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create Designation</h3></div>
	  
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
	  
	  {!! Form::open(['route' =>['designations.store'],'method'=>'post'])!!}
	      @csrf
			<div class="row">
			<div class="form-group col-md-6"> {!! Form::label('designation', 'Designation Name*') !!}
        {!! Form::text('designation',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Designation')) !!} </div>
		<div class="form-group col-md-6"> {!! Form::label('department', 'Department*') !!}
        {!! Form::select('department', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Department --') ) !!} </div>
		</div>
      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
		  
@stop
