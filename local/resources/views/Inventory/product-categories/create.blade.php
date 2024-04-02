@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Create Product Category</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
		<div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['product-categories.store'],'method'=>'post'])!!}
	      @csrf
		  <div class="row">	
		  <div class="form-group col-md-3"> {!! Form::label('name', 'Category Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Category Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('parent', 'Parent Category') !!}
						        {!! Form::select('parent', $categories, null,array('class' => 'form-control','placeholder'=>'-- Select Parent Category --') ) !!} </div>
		
		<?php $statuses = array('Y'=>'Active','N'=>'In Active'); ?>
		<div class="form-group col-md-2"> {!! Form::label('status', 'Status') !!}
		{!! Form::select('status', $statuses, null,array('class' => 'form-control') ) !!} </div>
		  
		<div class="form-group col-md-4"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Description')) !!} </div>
		  </div>
		  
        
      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
		  
@stop
