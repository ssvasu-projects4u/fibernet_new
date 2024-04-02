@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
	
	<div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Feasability Check</h4></div>
	</div>
	
	<div class="card-body">
		@if($errors->any())
		<div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['feasability-check.submit'],'method'=>'post'])!!}
		  @csrf
		  <!-- Page Content -->
		 
	<!-- /.container -->
	<div class="row">
				<div class="col-md-6">
			<div class="form-group" style="padding:10px;border:2px solid #ccc;"> 
			
			<div class="row">
				<div class="col-md-12">
					<a class="btn btn-sm btn-warning" href="javascript::void()" onclick="getLocation()">Click to get current location</a> 
				</div>
			</div>

			<div class="row mb-2 mt-2">
				<div class="col-md-6">
				{!! Form::text('loc_latitude',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Latitude','id'=>'latitude')) !!} 
    			</div>
				<div class="col-md-6">	
				{!! Form::text('loc_longitude',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Longitude','id'=>'longitude')) !!} 	
				</div>
			</div>	
        
			<div class="row">
				<div class="col-md-12 pull-righta">
	   {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}  <a href="{{ url('admin/feasability-check')}}" class="btn btn-primary">Clear</a> 
				</div></div>
      {!! Form::close() !!} 
	  

	</div>
				</div>
				<div class="col-md-6">&nbsp;</div>


  </div>

	<div class="row">
	<div class="col-md-6">
		@if(isset($dp_results))
		<h3>Near by DP</h3>
		<table class="table table-bordered">
		<tr><th>DP Id</th><th>Distance</th><th>DP Ports Avalability</th></tr>	
		@foreach($dp_results as $dp)
		<tr><td><a href="javascript::void();" data-id='{{ $dp->id }}' class='dpuserinfo'>{{ $dp->generate_dp }}</a></td><td>{{  number_format((float)$dp->distance, 2, '.', '')*1000 }} mts</td><td><a href="javascript::void();" data-id='{{ $dp->id }}' class='dpuserinfo btn btn-success btn-sm'>Click here</a></td></tr>
		@endforeach
		</table>
	  @endif
		</div>	
	<div class="col-md-6">
		@if(isset($fh_results))
		<h3>Near by FH</h3>
		<table class="table table-bordered">
		<tr><th>FH Id</th><th>Distance</th><th>FH Ports Avalability</th></tr>	
		@foreach($fh_results as $fh)
		<tr><td><a href="javascript::void();" data-id='{{ $fh->id }}' class='fhuserinfo'>{{ $fh->generate_fh_id }}</a></td><td>{{  number_format((float)$fh->distance, 2, '.', '')*1000 }} mts</td><td><a  href="javascript::void();" data-id='{{ $fh->id }}' class='fhuserinfo btn btn-success btn-sm'>Click here</a></td></tr>
		@endforeach
		</table>
	  @endif
		</div>
		

	</div>




	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="dpModal" role="dialog">
		<div class="modal-dialog modal-lg">
		
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">DP Data</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					&nbsp;
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			
		</div>
	</div>

	<div class="modal fade" id="fhModal" role="dialog">
		<div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">FH Ports Availability</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					&nbsp;
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			
		</div>
	</div>

			<script type='text/javascript'>
            $(document).ready(function(){

                $('.dpuserinfo').click(function(){
                    
                    var dpid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: "{{url('/admin/dp/fhdata')}}/"+dpid,
                		type: "GET",
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#dpModal').modal('show'); 
                        }
                    });
				});
				
				$('.fhuserinfo').click(function(){
                    
                    var fhid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: "{{url('/admin/fh/ports-customers')}}/"+fhid,
                		type: "GET",
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#fhModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
	
	

  <script>
	var x = document.getElementById("location");

	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) 
	{
		document.getElementById("latitude").value =  position.coords.latitude;
		document.getElementById("longitude").value =  position.coords.longitude;
	}
</script>
@stop
