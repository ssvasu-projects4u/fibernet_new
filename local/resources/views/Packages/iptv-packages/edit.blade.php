@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-2">
	   @include('packages.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">IPTV - Edit Package</h3></div>
	  
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
	  
	  
	  {!! Form::model($iptvpackagesdetails, array('route' => array('iptv-package-packages.update', $iptvpackagesdetails->id),'method'=>'put')) !!}
	  
	  <?php 
	  	$existedchannels = array();
	  	if(isset($iptvpackagesdetails->channels_description)){
	  		$existedchannels = explode(",",$iptvpackagesdetails->channels_description);
	  	}
	  ?>

			
			<div class="row">
	    	
	    			<div class="form-group col-md-3"> {!! Form::label('package_name', 'Package Name*') !!}
		        {!! Form::text('package_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Package Name')) !!} </div>

		        <div class="form-group col-md-3"> {!! Form::label('price', 'Price*') !!}
        {!! Form::text('price',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Price')) !!} </div>
		    	
        <div class="form-group col-md-3"> {!! Form::label('gst', 'GST(%)*') !!}
        {!! Form::text('gst',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter GST')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('total_amount', 'Total Amount*') !!}
        {!! Form::text('total_amount',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Total Amount')) !!} </div>

         <div class="form-group col-md-3"> {!! Form::label('franchise_share', 'Franchise Share') !!}
        {!! Form::text('franchise_share',null, array('class' => 'form-control','placeholder'=>'Enter Franchise Share')) !!} </div>


        <div class="form-group col-md-12"> 
        	{!! Form::label('channels', 'Channels') !!}
			<div class="row" style="height: 200px;overflow: scroll;border: 1px solid #ccc">
        	@foreach($items as $item)
        	<div class="col-md-3">
				<label class="radio-inline mr10" style="font-size: 11px;"> <input  class="checkbx" name="channels[]" type="checkbox" value="{{$item['name']}}" <?php if(in_array($item['name'],$existedchannels)){echo "checked";} ?>> {{$item['name']}} </label>
			</div>
			@endforeach
			</div>
         </div>
	
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
