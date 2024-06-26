@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	  <!-- @include('administration.topmenu') -->
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create IPpool</h3></div>
	  
	</div>
	
	
	<div class="card-body">
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  
	  {!! Form::open(['route' =>['customers.ippoolstore'],'method'=>'post','id'=>'create_form'])!!}
	      @csrf
			
				<div class="row">
			
			<div class="form-group col-md-3"> {!! Form::label('city', 'City*') !!}
        {!! Form::select('city', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor*') !!}
        {!! Form::select('distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
		
		  <div class="form-group col-md-3"> {!! Form::label('subdistributor', 'sub Distributor') !!}
        {!! Form::select('subdistributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch*') !!}
        {!! Form::select('branch', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>

			<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise Name*') !!}
        {!! Form::select('franchise',[],null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Franchise Name')) !!} </div>
        <div class="form-group col-md-3"> {!! Form::label('pool_name', 'Name') !!}
        {!! Form::text('pool_name',null, array('class' => 'form-control','placeholder'=>'')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('ip_from', 'IP Address From') !!}
        {!! Form::text('ip_from',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter IP Address From')) !!} </div>
			
		
		<div class="form-group col-md-3"> {!! Form::label('ip_to', 'IP Address To') !!}
        {!! Form::text('ip_to',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter IP Address To')) !!} </div>
        
       	</div>
		
		
        <div class="row">
	<div class="form-group col-md-6"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Description')) !!} </div>
        <input type="hidden" value="y" name="status" id="status">
		</div>
   
       {!! Form::submit('Submit', ['name'=>'submit1','class' => 'btn btn-success', 'id'=>'create_form_btn', 'disabled'=>'true']) !!}
       {!! Form::reset('Reset', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!} 
	  

	</div>
  </div>

<script type="text/javascript">
        
	$(document).ready(function() {
        
       
            
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city === '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
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

        //$('#city').val({{old('city')}}).trigger('change');
        
    });
</script>

  <script type="text/javascript">
	$(document).ready(function() {
        /*$('#distributor').on('change', function() {
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
        });*/
		 $('#distributor').on('change', function() {
            var distributor = $(this).val();  
				
            if(distributor == '' || distributor <=0){
            	$('#subdistributor').html("<option value=''>-- Select Sub Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/subdistributors')}}/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#subdistributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); 
		
		 $('#subdistributor').on('change', function() {
            var subdistributor = $(this).val();  
				
            if(subdistributor == '' || subdistributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/branches')}}/"+subdistributor,
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
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                   $('#franchise').html(data);
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
