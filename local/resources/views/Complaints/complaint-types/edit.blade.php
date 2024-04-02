@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('complaints.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit Complaint Type</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($complainttypedetails, array('route' => array('complaint-types.update', $complainttypedetails->id),'method'=>'put')) !!}
      @csrf

	  <div class="row">
			<div class="form-group col-md-6"> {!! Form::label('title', 'Complaint Type*') !!}
        {!! Form::text('title',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Complaint Type')) !!} </div>
		<div class="form-group col-md-6"> {!! Form::label('connection_type', 'Connection Type*') !!}
        {!! Form::select('connection_type', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Connection Type --') ) !!} </div>
		<div class="form-group col-md-12"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2)) !!} </div>
		
		</div>
	  
		  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
			 
		  
      </form>
	  

	</div>
  </div>
	
		  
@stop
