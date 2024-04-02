@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit OLT</h3></div>
	  
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
	  
	  
	  
	  {!! Form::model($oltdetails, array('route' => array('olt.update', $oltdetails->id),'method'=>'put')) !!}
	      @csrf
			
			<div class="row">
			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', $branches, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('olt_serial_number', 'OLT Serial Number') !!}
        {!! Form::text('olt_serial_number',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter OLT Serial Number')) !!} </div>
		
        <?php $olt_ports = array(8=>8,16=>16,32=>32); ?>
        <div class="form-group col-md-3"> {!! Form::label('olt_port', 'OLT Ports') !!}
			{!! Form::select('olt_port', $olt_ports, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT Ports --') ) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('company_name', 'Company Name') !!}
        {!! Form::text('company_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Company Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('olt_ip_address', 'OLT IP Address') !!}
        {!! Form::text('olt_ip_address',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter OLT IP Address')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('username', 'Username') !!}
        {!! Form::text('username',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Username')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('password', 'Password') !!}
        {!! Form::text('password',null, array('type'=>'password','class' => 'form-control','required'=>'required','placeholder'=>'Enter Password')) !!} </div>
		

        <div class="form-group col-md-3"> {!! Form::label('vlan', 'VLAN') !!}
        {!! Form::text('vlan',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter VLAN')) !!} </div>
		
		
		
		
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
				$('#franchise_id').html("<option value=''>-- Select Franchise --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/"+city,
                type: "GET",
                success:function(data) {
                   $('#distributor').html(data);
                   $('#branch').html("<option value=''>-- Select Branch --</option>");
				   $('#franchise_id').html("<option value=''>-- Select Franchise --</option>");
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
				$('#franchise_id').html("<option value=''>-- Select Franchise --</option>");
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

		
		$('#branch').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
            if(branch == '' || branch <=0){
            	$('#franchise_id').html("<option value=''>-- Select Franchise --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                   $('#franchise_id').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        
		
        //$('#city').val({{old('city')}}).trigger('change');
        
    });
</script>
	
		  
@stop
