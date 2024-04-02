@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create EDFA</h3></div>
	  
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
	  
	  
	  
	  {!! Form::open(['route' =>['edfa.store'],'method'=>'post'])!!}
	      @csrf
			
			<div class="row">
			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        
            <div class="form-group col-md-3"> {!! Form::label('sub_distributor', 'Sub Distributor*') !!}
        {!! Form::select('sub_distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>

            {!! Form::select('branch', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
			
		<div class="form-group col-md-3"> {!! Form::label('edfa_serial_number', 'EDFA Serial Number') !!}
        {!! Form::text('edfa_serial_number',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Serial Number')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('edfa_ports', 'EDFA Ports') !!}
        <?php $ports = array(8=>"8",16=>"16",32=>"32"); ?>	
		{!! Form::select('edfa_ports', $ports, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select EDFA Port --') ) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('edfa_company', 'EDFA Company') !!}
        {!! Form::text('edfa_company',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Company')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('edfa_model', 'EDFA Model') !!}
        {!! Form::text('edfa_model',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter EDFA Model')) !!} </div>
		
		</div>

       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>


<script type="text/javascript">
	$(document).ready(function() {
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/"+city,
                type: "GET",
                success:function(data) {
                   $('#distributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
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

        $('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/subdistributors')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#sub_distributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        
    });
</script>
		  
@stop
