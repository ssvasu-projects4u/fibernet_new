@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Cable - Create Allacart</h3></div>
	  
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
	  
	  
	  
	  {!! Form::open(['route' =>['cable-allacart-packages.store'],'method'=>'post'])!!}
	      @csrf
			

	    <div class="row">
	    	
	    			<div class="form-group col-md-3"> {!! Form::label('package_name', 'Channel Name*') !!}
		        {!! Form::text('package_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Channel Name')) !!} </div>

		        <div class="form-group col-md-3"> {!! Form::label('price', 'Price*') !!}
        {!! Form::text('price',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Price')) !!} </div>
		    	
        <div class="form-group col-md-3"> {!! Form::label('gst', 'GST(%)*') !!}
        {!! Form::text('gst',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter GST')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('total_amount', 'Total Amount*') !!}
        {!! Form::text('total_amount',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Amount')) !!} </div>

        
         <div class="form-group col-md-3"> {!! Form::label('franchise_share', 'Franchise Share') !!}
        {!! Form::text('franchise_share',0, array('class' => 'form-control','placeholder'=>'Enter Franchise Share')) !!} </div>

		        <div class="form-group col-md-12"> {!! Form::label('channels_description', 'Channel Description') !!}
        {!! Form::textarea('channels_description',null, array('class' => 'form-control','rows'=>2)) !!} </div>

		        


		

			
	    </div>	
	    	
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>

  <script type="text/javascript">
	$('#gst,#price').keyup(function(ev){
		var total = $('#price').val() * 1;
		var gst = $('#gst').val() / 100;
		var gstprice = (total*gst);
		var total_amount = total + gstprice;
		total_amount = Math.round(total_amount * 100) / 100;
		$('#total_amount').val(total_amount);
	});
  </script>
	
		  
@stop