@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('administration.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit State</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($statedetails, array('route' => array('state.update', $statedetails->id),'method'=>'put')) !!}
      @csrf
	  <div class="form-group"> {!! Form::label('name', 'State Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter State Name')) !!} </div>
      
          
		  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
			 
		  
      </form>
	  

	</div>
  </div>
	
		  
@stop
