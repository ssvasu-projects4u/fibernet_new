@extends('layouts.franchise')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('frontend.franchise.customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Activate User<small> - {{$customerdetails->name}}</small></h3></div>
	  
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
	  
	  
	  {!! Form::model($customerdetails, array('route' => array('customers.useractivate', $customerdetails->id),'method'=>'put')) !!}
	       @csrf
	      

	    
	    <div class="row">    
	         <?php $renew_cycles = array('immediate'=>'Immediate','schedule'=>'Schedule'); ?>
		<div class="form-group col-md-4"> {!! Form::label('renewal_cycle', 'Renew Cycle') !!}
        {!! Form::select('renewal_cycle', $renew_cycles, 'immediate',array('class' => 'form-control','required'=>'required') ) !!} </div>

			
	    	<?php $generate_invoice = array('immediate'=>'Immediate','schedule'=>'While Schedule Time'); ?>
		<div class="form-group col-md-4" style="display: none;"> {!! Form::label('invoice_generate_option', 'Generate Invoice') !!}
        {!! Form::select('invoice_generate_option', $generate_invoice, null,array('class' => 'form-control','placeholder'=>'- Select Invoice Generate Option -') ) !!} </div>
        <div class="form-group col-md-4" style="display: none;"> {!! Form::label('schedule_date', 'Schedule Date') !!}
        {!! Form::date('schedule_date', null,array('class' => 'form-control','placeholder'=>'- Schedule Date -','type'=>'date') ) !!} </div>

	    </div>	
	    <div class="row">			
	       <div class="form-group col-md-4"> {!! Form::label('password', 'Password') !!}
	        <input class="form-control" required="required" placeholder="Enter Password" name="password" type="password" id="password">
	         </div>

	    
	    
	    </div>    
		<div class="form-group col-md-12" align="right">
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
      </div>


      <hr>
	  

	</div>
  </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#invoice_generate_option").parent().hide();
	    $("#schedule_date").parent().hide();
		$('#renewal_cycle').on('change', function() {
    	var renewal_cycle = $(this).val();
			if(renewal_cycle == 'schedule'){
				$("#invoice_generate_option").parent().show();
				$("#schedule_date").parent().show();
			}else{
				$("#invoice_generate_option").parent().hide();
				$("#schedule_date").parent().hide();
			}
		});
	});
	</script>	
@stop
