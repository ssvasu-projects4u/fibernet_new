@extends('layouts.admin')

@section('content')

	<style>
           .ui-corner-all
        {
            -moz-border-radius: 4px 4px 4px 4px;
        }
       
        .ui-widget
        {
            font-family: Verdana,Arial,sans-serif;
            font-size: 15px;
        }
        .ui-menu
        {
            display: block;
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 2px;
        }
        .ui-autocomplete
        {
             overflow-x: hidden;
              max-height: 200px;
              width:1px;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;
            _width: 160px;
            padding: 4px 0;
            margin: 2px 0 0 0;
            list-style: none;
            background-color: #fff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        }
        .ui-menu .ui-menu-item
        {
            clear: left;
            float: left;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .ui-menu .ui-menu-item a
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            cursor: pointer;
            background-color: #ffffff;
        }
        .ui-menu .ui-menu-item a:hover
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            color: White;
            cursor: pointer;
            background-color: #006699;
        }
        .ui-widget-content a
        {
            color: #222222;
        }
    </style>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('complaints.topmenu')
	<div class="card-header py-3">
	  	<h3 class="m-0 font-weight-bold text-primary">Add Complaint</h3>
	</div>
	
	
	<div class="card-body" style="padding:10px 15px;">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  <div class="row">
	  <div class="col-md-12 mb-2">
	  <form class="form-inline">
		 <select name="type" class="form-control" id="customer_type">
			<option value="customer_id" selected>Customer Id</option>
			<option value="customer_email">Customer Email</option>
			<option value="customer_mobile">Customer Mobile</option>
			<option value="customer_address">Customer Address</option>
			<option value="customer_stbno">Customer STBNO</option>
		</select>
		<div class="input-group">
		<input type="text" id="idtitle" size="75" name="search_string" class="form-control input-lg search-input ui-autocomplete-input" placeholder="Customer Search for Autofill" required="" autocomplete="off">
		</div>

		</form>
		</div></div>
		
		
	  {!! Form::open(['route' =>['complaints.store'],'method'=>'post'])!!}
	      @csrf
			<div class="row">
			
			<div class="form-group col-md-3"> {!! Form::label('name', 'Customer Name') !!}
			{!! Form::text('name',null, array('class' => 'form-control','required'=>'required','id'=>'name','placeholder'=>'Enter Customer Name')) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('customerid', 'Customer Id') !!}
			{!! Form::text('customerid',null, array('class' => 'form-control','id'=>'customerid','required'=>'required','placeholder'=>'Enter Customer Id')) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('email', 'Email') !!}
			{!! Form::text('email',null, array('class' => 'form-control','required'=>'required','id'=>'email','placeholder'=>'Enter Email')) !!} </div>
			
			
			<div class="form-group col-md-3"> {!! Form::label('mobile_number', 'Mobile') !!}
			{!! Form::text('mobile_number',null, array('class' => 'form-control','id'=>'mobile_number','required'=>'required','placeholder'=>'Enter Mobile')) !!} </div>
			
			</div>
			<div class="row">
			
			
			<?php $priority_types = array('low'=>'Low','medium'=>'Medium','high'=>'High');?>
			<div class="form-group col-md-3"> {!! Form::label('priority', 'Priority') !!}
			{!! Form::select('priority', $priority_types, null,array('class' => 'form-control') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('complaint_type', 'Connection Type') !!}
			{!! Form::text('complaint_type',null, array('class' => 'form-control','id'=>'complaint_type','required'=>'required','placeholder'=>'Enter Connection Type')) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('complaint_sub_type', 'Complaint Type') !!}
			{!! Form::select('complaint_sub_type', [], null,array('class' => 'form-control','placeholder'=>' --Select Complaint Type-- ') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('call_from', 'Call From(name/phone/address)') !!}
			{!! Form::text('call_from',null, array('class' => 'form-control','placeholder'=>'Enter Call From')) !!} </div>
			
			</div>
			<div class="row">
			<div class="form-group col-md-12"> {!! Form::label('description', 'Description') !!}
			{!! Form::textarea('description',null, array('class' => 'form-control','rows'=>3,'placeholder'=>'Enter Description')) !!} </div>
			</div>
			
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 

	</div>
  </div>
<script src="{{asset('assets/js/autocomplete/jquery.js')}}"></script> 
<script src="{{asset('assets/js/autocomplete/jquery-ui.min.js')}}"></script>
<script>		
$(document).ready(function() {
	//autocomplete	
	var src = "{{ route('search.customer.front.json') }}";
	$("#idtitle").autocomplete({
		source: function(request, response) {
		$.ajax({
			url: src,
			dataType: "json",
			data: {
				term: request.term,
				type:  $('#customer_type').val(),
			},
			success: function(data) {
				console.log(data);
				response(data);
			}
		});
		},
		min_length: 3,
		select: function(event, ui) {
//			console.log(ui);
			$('#idtitle').val(ui.item.value);            
			$('#mobile_number').val(ui.item.mobile);
			$('#customerid').val(ui.item.id);
			$('#name').val(ui.item.name);
			$('#email').val(ui.item.email);
			$('#complaint_type').val(ui.item.connection_type);

			var complaint_type = ui.item.connection_type;
			if(complaint_type == '' || complaint_type <=0){
				$('#complaint_sub_type').html("<option value=''>-- Select Complaint Type --</option>");
				return;
			}
			$.ajax({
				url:"{{url('admin/complaint-types/getcomplaintsubtypes')}}/"+complaint_type,
				type: "GET",
				success:function(data) {
				   $('#complaint_sub_type').html(data);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert(errorThrown);
				}
			});
			
		},
		messages: {
		noResults: '',
		results: function() {}
		}
	});

	$('#customer_type').on('change', function() {
		$("#idtitle").val('');		
	});	
});
</script>
		  
@stop
