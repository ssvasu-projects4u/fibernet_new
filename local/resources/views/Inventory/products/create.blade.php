@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Create Product</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  
	  
		
		@if($errors->any())
		<div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['products.store'],'method'=>'post'])!!}
	      @csrf
		  <div class="row">	
		  <div class="form-group col-md-3"> {!! Form::label('name', 'Product Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Product Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('category', 'Category') !!}
						        {!! Form::select('category', $categories, null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Category --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('sub_category', 'Sub Category') !!}
		{!! Form::select('sub_category', [], null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Sub Category --') ) !!} </div>
		
        
		        <input type="hidden" id="company_name" name="company_name">
		         <input type="hidden" id="model_number" name="model_number">
		          <input type="hidden" id="serial_number" name="serial_number">
		
        <!-- Added above three files Durga for Product Add stock purpose -->
		
	
		
		<?php $units = array('nos'=>'Nos','mtrs'=>'Mtrs','grms'=>'Grms','kgs'=>'Kgs','ltr'=>'Ltr','mltr'=>'Mltr','pcs'=>'Pcs','ton'=>'Ton','sqft'=>'Sqft','yrds'=>'Yrds'); ?>
		<div class="form-group col-md-3"> {!! Form::label('unit', 'Unit') !!}
		{!! Form::select('unit', $units, null,array('class' => 'form-control','placeholder'=>'-- Select Unit') ) !!} </div>
		 
		 <div class="form-group col-md-3"> {!! Form::label('product_photo', 'Product Photo') !!} {!! Form::file('product_photo',null, array('class' => 'form-control')) !!} 
		 </div>
  

		<div class="form-group col-md-3"> {!! Form::label('sku', 'SKU*') !!}
        {!! Form::text('sku',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter SKU')) !!} </div>
		
		<?php $statuses = array('Y'=>'Active','N'=>'In Active'); ?>
		<div class="form-group col-md-3"> {!! Form::label('status', 'Status') !!}
		{!! Form::select('status', $statuses, null,array('class' => 'form-control') ) !!} </div>
		  
		<div class="form-group col-md-6"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Description')) !!} </div>
		  </div>
		  
        
      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>
	<script type="text/javascript">
  	$('#category').on('change', function() {
            var category_id = $(this).val();
			if(category_id == '' || category_id <=0){
            	$('#sub_category').html("<option value=''>-- Select Sub Category --</option>");
				return;
            }
			$.ajax({
                url: "{{url('/admin/inventory/product-categories/subcategories')}}/"+category_id,
                type: "GET",
                success:function(data) {
                   $('#sub_category').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

	</script>
		  
@stop
