<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];//exit;
    $layout='layouts.admin';
    if($roles[0]=='branch' || $roles[0]=='franchise'){
        //echo $roles[0];exit;
        $layout='layouts.'.$roles[0];    
    }
 ?> 
@extends($layout)

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Fiber Readings & Polls</h3></div>
	  
	</div>
	<div class="card-header py-0">
	  <nav class="navbar navbar-expand-sm bg-light navbar-light py-0">
 
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/fiber-laying/edit/'.$fiberladdetails->id)}}">Edit Fiber Laying</a>
    </li>
	<li class="nav-item">
      <a class="nav-link active" href="{{url('admin/fiber-laying/polls-readings/'.$fiberladdetails->id)}}">Fiber Readings & Poles</a>
    </li>
	
	
  </ul>
</nav>
	</div>
	
	
	<div class="card-body pl-2 pr-2 pt-2">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($fiberladdetails, array('route' => array('fiber-polls-readings.update', $fiberladdetails->id),'method'=>'put')) !!}
	      @csrf
	  <div class="card shadow mb-2">
	  <div class="card-header py-0 pt-2 pr-2 font-weight-bold text-warning"><h5>Fiber Readings</h5></div>
	<div class="card-body">
	  
			
			<div class="row">
			
			
		
		
		
		<div class="col-md-2"> {!! Form::label('fiber_starting_reading', 'Start Reading') !!}
        {!! Form::text('fiber_starting_reading',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Start Reading')) !!} </div>
		<div class="col-md-3"> {!! Form::label('fiber_starting_long_lat', 'Start Lat & Long') !!}
        {!! Form::text('fiber_starting_long_lat',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Start Latitude & Longitude')) !!} <a class="btn badge badge-warning" onclick="getLocation('fiber_starting_long_lat')">Get</a></div>
		
		<div class="col-md-2"> {!! Form::label('fiber_ending_reading', 'End Reading') !!}
        {!! Form::text('fiber_ending_reading',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Ending Reading')) !!} </div>
		
		<div class="col-md-3"> {!! Form::label('ending_long_lat', 'End Lat & Long') !!}
        {!! Form::text('ending_long_lat',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter End Latitude & Longitude')) !!} <a class="btn badge badge-warning" onclick="getLocation('ending_long_lat')">Get</a></div>
		
		<div class="col-md-2">{!! Form::submit('Update', ['class' => ' mt-4']) !!}</div>
		</div>
		
		
       
     
	  </div>
	  </div>
	   {!! Form::close() !!} 
	   
	    
	  <div class="card shadow">
	<div class="card-header py-0 pt-2 pr-2 font-weight-bold text-warning"><h5>Add Pole</h5></div>
	<div class="card-body">
	  
			{!! Form::open(['route' =>array('fiber-polls-readings.store', $fiberladdetails->id),'method'=>'post'])!!}
	      @csrf
			<div class="row">
			
			
		
		<div class="form-group col-md-4"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Latitude & Longitude')) !!} <a class="btn badge badge-warning" onclick="getLocation('long_lat')">Get</a></div>
		
		<div class="form-group col-md-2"> {!! Form::label('loop_meters', 'Loop Meters') !!}
        {!! Form::text('loop_meters',0, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Loop Meters')) !!} </div>
		
		<div class="form-group col-md-4"> {!! Form::label('pole_note', 'Short Note / Description') !!}
        {!! Form::text('pole_note',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Description/Short Note')) !!} </div>
		
		
		<div class="form-group col-md-2"><br> <button type="submit" id="add" name="add" class=" ph15"> Add Pole </button></div>
		
		
		</div>
		
		{!! Form::close() !!} 
		
			
		
		
		
       
     
	  </div>
	  
	  </div>
	  <br>
	  <table class="table table-bordered" width="100%" id="dynamic_field">
			<thead>
				<tr class="table-warning">
					<th style="width:200px">Poll Series</th>
					<th style="width:350px">Lat & Long</th>
					<th style="width:200px">Loop Meters</th>
					<th style="width:200px">Description</th>
					<th style="width:100px">Actions</th>
				</tr>
			</thead>
			<tbody>
				@if(count($poles)>0)
					@foreach($poles as $index=>$pole)
					<tr>
						<td>Poll {{$index+1}}</td>
						<td>{{$pole->long_lat}}</td>
						<td>{{$pole->loop_meters}}</td>
						<td>{{$pole->pole_note}}</td>
						<td><span><a href="#" title='delete'>edit</a></span></td>
					</tr>
					@endforeach	
				@else
					<tr>
						<td colspan="5">No Records Found</td>	
					</tr>
				@endif
			</tbody>
		</table>
	   

	</div>
  </div>
	
	<script>
	var x = document.getElementById("demo");
	function getLocation(latlngcontainer) {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				document.getElementById(latlngcontainer).value =  position.coords.latitude+","+ position.coords.longitude;
				}, 
				function(error) {}
			);
		}else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}
</script>  
@stop
