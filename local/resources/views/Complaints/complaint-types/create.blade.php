@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('complaints.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create Complaint Type</h3></div>
	  
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
	  
	  {!! Form::open(['route' =>['complaint-types.store'],'method'=>'post'])!!}
	      @csrf
			<div class="row">
			<div class="form-group col-md-6"> {!! Form::label('title', 'Complaint Type*') !!}
        {!! Form::text('title',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Complaint Type')) !!} </div>
		<div class="form-group col-md-6"> {!! Form::label('connection_type', 'Connection Type*') !!}
        {!! Form::select('connection_type', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Connection Type --') ) !!} </div>
		<div class="form-group col-md-12"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2)) !!} </div>
		
		</div>
      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
		  
@stop
