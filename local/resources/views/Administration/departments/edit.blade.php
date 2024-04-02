@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit Department</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($departmentdetails, array('route' => array('departments.update', $departmentdetails->id),'method'=>'put')) !!}
      @csrf
	  <div class="form-group"> {!! Form::label('department', 'Department Name*') !!}
        {!! Form::text('department',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Department Name')) !!} </div>
      
          
		  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
			 
		  
      </form>
	  

	</div>
  </div>
	
		  
@stop
