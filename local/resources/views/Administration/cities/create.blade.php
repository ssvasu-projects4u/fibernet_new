@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('administration.topmenu')
	
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Create City</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['city.store'],'method'=>'post'])!!}
	      @csrf
		  <div class="form-group col-md-3"> {!! Form::label('state', 'State*') !!}
          {!! Form::select('state', $states, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select State --') ) !!} </div>
			<div class="form-group"> {!! Form::label('name', 'City Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter City Name')) !!} </div>
      
      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
		  
@stop
