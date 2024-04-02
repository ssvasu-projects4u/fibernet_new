@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.fibermenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Add Stock</h4></div>
	  <div class="float-right"><a class="btn btn-primary" href="{{ url('/admin/inventory/stocks/download-sample-csv') }}">Download Sample CSV</a></div>
	  
	</div>
	
	
	<div class="card-body">
		@if($errors->any())
		<div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['stocks.store'],'method'=>'post','files'=>'true'])!!}
	      @csrf
		  <div class="row">	
		  <div class="form-group col-md-3"> {!! Form::label('product', 'Product') !!}
		{!! Form::select('product', $products, null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Product --') ) !!} </div>
		  
		  <div class="form-group col-md-3"> {!! Form::label('vendor', 'Vendor/Supplier') !!}
		<select id="vendor" name="vendor" class="form-control" required>
			<option value="">-- Select Vendor/Supplier-- </option>	
			@if(isset($vendors_suppliers) && count($vendors_suppliers)>0)
			@foreach($vendors_suppliers as $key=>$data)
				<optgroup label="{{ucfirst($key)}}s">
					@foreach($data as $vendorsupplier)
						<option value="{{$vendorsupplier['id']}}">{{$vendorsupplier['name']}}</option>
					@endforeach
				</optgroup>
			@endforeach
			@endif
		</select>

		</div>
		
		<!--
		<div class="form-group col-md-3"> {!! Form::label('category', 'Category') !!}
						        {!! Form::select('category', $categories, null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Category --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('sub_category', 'Sub Category') !!}
		{!! Form::select('sub_category', [], null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Sub Category --') ) !!} </div>
		
		-->


		<?php $stock_types = array('new'=>'New','refubrished'=>'Refubrished'); ?>
		<div class="form-group col-md-3"> {!! Form::label('type', 'Stock Type') !!}
		{!! Form::select('type', $stock_types, null,array('class' => 'form-control') ) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('import_file', 'Upload Products Information(.csv)') !!}
        {!! Form::file('import_file',null, array('required'=>'required','class' => 'form-control')) !!} </div>
		  
		
		  
		  
		<div class="form-group col-md-12"> {!! Form::label('description', 'Notes') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Notes')) !!} </div>
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
