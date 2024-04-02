@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-3">
	  <p class="px-0 pb-0 mb-0"><strong>Package :</strong> {{$broadbandpackagedetails->package_name}}</p>	
	  <h3 class="m-0 font-weight-bold text-primary">Create Sub Plan</h3>
	  
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
	  
	  
	  
	  {!! Form::open(['route' =>['broadband-sub-packages.store',$package],'method'=>'post'])!!}
	      @csrf
		<div class="row">
	    	<div class="form-group col-md-4"> {!! Form::label('package', 'Package') !!}
			    {!! Form::select('package', $items, $package,array('class' => 'form-control','placeholder'=>'- Select Package -') ) !!} 
			</div>
			<div class="form-group col-md-8"> {!! Form::label('sub_plan_name', 'Sub Plan Name') !!}
		        {!! Form::text('sub_plan_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Sub Plan Name')) !!} 
		    </div> 

		    <div class="form-group col-md-4"> {!! Form::label('price', 'Price') !!}
		        {!! Form::text('price',null, array('class' => 'form-control','required'=>'required total_gst','placeholder'=>'Enter Price')) !!} 
		    </div> 

		    <div class="form-group col-md-4"> {!! Form::label('gst', 'GST') !!}
		        {!! Form::text('gst',null, array('class' => 'form-control','required'=>'required total_gst','placeholder'=>'Enter GST')) !!} 
		    </div> 

		    <div class="form-group col-md-4"> {!! Form::label('total_amount', 'Total Amount') !!}
		        {!! Form::text('total_amount',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Amount')) !!} 
		    </div>  

		    <?php $unit_types = array('day'=>'Day(s)','month'=>'Month(s)'); ?>
		    <div class="form-group col-md-4"> {!! Form::label('unit_type', 'Unit Type') !!}
		        {!! Form::select('unit_type',$unit_types,null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Unit Type')) !!} 
		    </div> 

		    <div class="form-group col-md-4"> {!! Form::label('myFrame', 'Time Unit') !!}
		        {!! Form::text('myFrame',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Time Unit')) !!} 
		    </div>  

		    <?php $status_types = array('Y'=>'Active','N'=>'Inactive'); ?>
		    <div class="form-group col-md-4"> {!! Form::label('status', 'Status') !!}
		        {!! Form::select('status',$status_types,null, array('class' => 'form-control')) !!} 
		    </div> 
			
			<?php $packages_selection = array('both'=>'Both for New & Renew Customers','new'=>'Only for New Customers','renew'=>'Only for Renew Customers'); ?>
		    <div class="form-group col-md-4"> {!! Form::label('package_selection', 'Package Selection') !!}
		        {!! Form::select('package_selection',$packages_selection,null, array('class' => 'form-control')) !!} 
		    </div>

		    <div class="form-group col-md-4"> {!! Form::label('distributor_share', 'Distributor Share') !!}
		        {!! Form::text('distributor_share',0, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Distributor Share')) !!} 
		    </div>  

		    <div class="form-group col-md-4"> {!! Form::label('franchise_share', 'Franchise Share') !!}
		        {!! Form::text('franchise_share',0, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Franchise Share')) !!} 
		    </div>    

		    <div class="form-group col-md-12"> {!! Form::label('short_description', 'Short Description') !!}
        {!! Form::textarea('short_description',null, array('class' => 'form-control','rows'=>2)) !!} </div>
 	
	    </div>	
	    	


	    

			
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	
	<script>
		$(document).ready(function(){ 

			$('#price,#gst').keyup(function(ev){
				var total = $('#price').val() * 1;
				var gst = $('#gst').val() / 100;
				var gstprice = (total*gst);
				var total_price = total+ gstprice;
				
				var divobj = document.getElementById('total_amount');
				divobj.value = total_price;
			}); 
		}); 
	</script>
		  
@stop
