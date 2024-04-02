@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('users.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Create Permission</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['permissions.store'],'method'=>'post'])!!}
		  @csrf
		  <div class="form-group"> {!! Form::label('display_name', 'Permission Label(Ex: List Users)*') !!}
        {!! Form::text('display_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Permission Label','onchange'=>"slugify(this.value)")) !!} </div>
			<div class="form-group"> {!! Form::label('name', 'Permission Name(Ex: list-users)*') !!}
        {!! Form::text('name',null, array('id'=>'permission_name','class' => 'form-control','required'=>'required','placeholder'=>'Enter Permission Name')) !!} </div>

		<?php $categories = array(
			'' => '-- Select Category --',
			'Administration'=>'Administration',
			'Technical'=>'Technical',
			'Packages'=>'Packages',
			'Control Panel'=>'Control Panel',
		    'Lead Management'=>'Lead Management',
			'Users'=>'Users',
			'Customers'=>'Customers',
			'Complaints'=>'Complaints',
			'Accounts'=>'Accounts',
			'Feasibility Check'=>'Feasibility Check',
			'Reports'=>'Reports',
			'Inventory Management'=>'Inventory Management',
			'Miscellaneous'=>'Miscellaneous'
		); ?>
		<div class="form-group"> {!! Form::label('category', 'Category*') !!}
        {!! Form::select('category', $categories, '-- Select Category --',array('class' => 'form-control', 'required' => 'required') ) !!} </div>

		<div class="form-group" id="sub-category-wrapper"> {!! Form::label('sub_category', 'Sub Category *') !!}
        {!! Form::select('sub_category', [], '-- Select Sub Category --',array('class' => 'form-control', 'required' => 'required', 'id' => "sub-category") ) !!} </div>

		<div class="form-group">
			{{ Form::checkbox('is_sub_category', TRUE, false, ["id" => "is-sub-category"]) }}
			{!! Form::label('Sub Category', 'Sub Category') !!}
		</div>

       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
       {!! Form::close() !!}

	</div>
  </div>

  <script>
  	function slugify(text)
	{
		var val = text.toString().toLowerCase()
		.replace(/\s+/g, '-')           // Replace spaces with -
		.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		.replace(/\-\-+/g, '-')         // Replace multiple - with single -
		.replace(/^-+/, '')             // Trim - from start of text
		.replace(/-+$/, '');            // Trim - from end of text

		document.getElementById('permission_name').value = val;
	}
	$('#category').on('change', function() {
		var selectedCategory = $(this).val();
		if(selectedCategory == '' || selectedCategory <=0){
			$('#sub-category').html("<option value=''>-- Select Sub Category --</option>");
			return;
		}
		$.ajax({
			url: "{{url('/admin/permissions/get-sub-category')}}/"+selectedCategory,
			type: "GET",
			success:function(data) {
				$('#sub-category').html(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$('#is-sub-category').click(function(){
	var attr = $('#sub-category').attr('required');
        if (attr == null){
           // your code here.
		$("#sub-category").prop('required',true);
        } else {
			$('#sub-category').removeAttr('required');
        }

        $("#sub-category-wrapper").toggle();
    });
  </script>
@stop
