@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('users.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit User</h4></div>
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($userdetails, array('route' => array('users.update', $userdetails->id),'method'=>'put')) !!}
      @csrf
	  <div class="row">
	  <div class="form-group col-md-6"> {!! Form::label('name', 'Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Name')) !!} </div>

        <div class="form-group col-md-6"> {!! Form::label('email', 'Email*') !!}
        {!! Form::text('email',str_replace("e-", "", $userdetails->email) , array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>

        <div class="form-group col-md-6"> {!! Form::label('role', 'Role') !!}
        
        <select class="form-control" required="required" id="role" name="role">
        	@foreach($roles as $id=>$role)
        	<option value="{{$id}}" <?php if(in_array($role, $userroles)){echo "selected";} ?>>{{$role}}</option>
     		@endforeach
       	</select>
        	
        </div>

        <?php $user_statuses = array('Y'=>'Active','N'=>'In Active'	); ?>	
		<div class="form-group  col-md-6"> {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', $user_statuses, null,array('class' => 'form-control') ) !!} </div>
      </div>

        

         
          
		  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
			 
		  
      
	  

	</div>
  </div>
	
		  
@stop
