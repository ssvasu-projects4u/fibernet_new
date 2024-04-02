@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit Vendor/Supplier</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($vendor, array('route' => array('vendors.update', $vendor->id),'method'=>'put','files'=>'true')) !!}
      @csrf
	  <div class="row">

    <div class="form-group col-md-3"> {!! Form::label('company_name', 'Company Name*') !!}
        {!! Form::text('company_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Company Name')) !!} </div>
      
			<div class="form-group col-md-3"> {!! Form::label('contact_name', 'Contact Name*') !!}
        {!! Form::text('contact_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Contact Name')) !!} </div>

        
        <div class="form-group col-md-3"> {!! Form::label('mobile', 'Mobile Number*') !!}
        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Mobile Number')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('landline', 'Landline') !!}
        {!! Form::text('landline',null, array('class' => 'form-control','placeholder'=>'Enter Landline')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('email', 'Email') !!}
        {!! Form::text('email',null, array('class' => 'form-control','placeholder'=>'Enter Email')) !!} </div>
        
        <?php $user_types = array('vendor'=>'Vendor','supplier'=>'Supplier'); ?>  
        <div class="form-group  col-md-3"> {!! Form::label('type', 'Type') !!}
        {!! Form::select('type', $user_types, null,array('class' => 'form-control') ) !!} </div>
        
        <?php $user_statuses = array('Y'=>'Active','N'=>'In Active'); ?>  
        <div class="form-group  col-md-3"> {!! Form::label('status', 'Status') !!}
        
        {!! Form::select('status', $user_statuses, null,array('class' => 'form-control') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('photo', 'Photo') !!}
        {!! Form::file('photo',null, array('class' => 'form-control')) !!} 
        @if($vendor->photo != '')
			<img src="{{ url('/uploads/vendors-suppliers/'.$vendor->photo)}}" height="50">
			@endif </div>

        <div class="form-group col-md-6"> {!! Form::label('address', 'Address*') !!}
        {!! Form::textarea('address',null, array('class' => 'form-control','rows'=>2, 'required'=>'required','placeholder'=>'Enter Address')) !!} </div>

        <div class="form-group col-md-6"> {!! Form::label('notes', 'Notes') !!}
        {!! Form::textarea('notes',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Notes')) !!} </div>
        
       </div>   
		{!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
	
  </div>	  
@stop