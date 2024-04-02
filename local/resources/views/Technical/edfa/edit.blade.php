@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit EDFA</h3></div>
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

	  {!! Form::model($edfadetails, array('route' => array('edfa.update', $edfadetails->id),'method'=>'put')) !!}
	      @csrf
			
			<div class="row">
			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>

            <div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', $branches, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
			
		<div class="form-group col-md-3"> {!! Form::label('edfa_serial_number', 'EDFA Serial Number') !!}
        {!! Form::text('edfa_serial_number',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Serial Number')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('edfa_ports', 'EDFA Ports') !!}
        {!! Form::text('edfa_ports',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Ports')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('edfa_company', 'EDFA Company') !!}
        {!! Form::text('edfa_company',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Company')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('edfa_model', 'EDFA Model') !!}
        {!! Form::text('edfa_model',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Model')) !!} </div>
		</div>

		<input type="hidden" id="role" name="role" value="{{$role}}" >
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	

	<script type="text/javascript">
	$(document).ready(function() {
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				$('#distributor').html("<option value=''>-- Select Distributor --</option>");
            	return;
            }
            if ($("#role").val() == "franchise" || $("#role").val() == "branch") {
                $.ajax({
                    url: "{{url('/admin/franchises/citybranches')}}/"+city,
                    type: "GET",
                    success:function(data) {
                        $('#branch').html(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            } else {
                $.ajax({
                    url: "{{url('/admin/branches/citydistributors')}}/"+city,
                    type: "GET",
                    success:function(data) {
                        $('#branch').html("<option value=''>-- Select Branch --</option>");
                        $('#distributor').html(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
        });

		$('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });        
    });
</script>
		  
@stop
