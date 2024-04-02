@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
	
	
	
	<div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Transfer Stock</h4></div>
	</div>
	
	
	<div class="card-body">
		@if($errors->any())
		<div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  <div class="row">	
	  <div class="col-md-6">	
	  

	  <div class="card shadow mb-4">
	
	<div class="card-header py-2">
	  <div class="float-left"><h5 class="m-0 font-weight-bold text-primary">Add Stock</h5></div>
	</div>
	
	
	<div class="card-body">

	{!! Form::open(['route' =>['stocks.transfer.submit'],'method'=>'post'])!!}
	      @csrf
		  <div class="row">	
		  
		  <?php $types = array('serial_no'=>'Serial No','identification'=>'Identification','manufacturer'=>'Manufacturer','brand'=>'Brand'); ?>
		<div class="form-group col-md-6"> {!! Form::label('type', 'Type') !!}
		{!! Form::select('type', $types, null,array('class' => 'form-control') ) !!} </div>

		<div class="form-group col-md-6"> {!! Form::label('keyword', 'Enter Keyword') !!}
		{!! Form::text('keyword',null, array('required'=>'required','class' => 'form-control')) !!} </div>
		<div class="form-group col-md-12"> {!! Form::submit('Search & Add', ['style'=>'margin-left:10px;', 'name'=>'addnsearch','class' => 'btn btn-sm btn-primary float-right']) !!}  {!! Form::submit('Search', [ 'name'=>'search-add','class' => 'btn btn-sm btn-primary float-right']) !!} </div>
		  
		</div>
	  {!! Form::close() !!} 
	  	  
		@if(isset($results))
		{!! Form::open(['route' =>['stocks.addmultipletransfer-stock.submit'],'method'=>'post'])!!}
		<h3>Search Results</h3>
		<table class="table table-bordered">
		<tr><th>&nbsp;</th><th>Product</th><th>Serial No</th><th>Status</th></tr>	
		@foreach($results as $stock)
		<tr><td><?php if($stock->status == 'available'){ ?><input type="checkbox" name="stock_item[]" value="{{ $stock->id }}"><?php }else{ echo "N/A";} ?></td><td>{{ $stock->name }}</td><td>{{ $stock->serial_no }}</td><td>{{ $stock->status }}</td></tr>
		@endforeach
		</table>
		<div class="form-group col-md-12"> {!! Form::submit('Add Stock', [ 'name'=>'add-multiple','class' => 'btn btn-sm btn-primary float-left']) !!}</div>
		{!! Form::close() !!} 
	  @endif

	</div>
	  </div>
	 
	 
	 
	  

	  </div>
	  <div class="col-md-6">	
	  

	  <div class="card shadow mb-4">
	
	<div class="card-header py-2">
	  <div class="float-left"><h5 class="m-0 font-weight-bold text-primary">Transfer Stock Items</h5></div>
	</div>
	
	
	<div class="card-body">

	{!! Form::open(['route' =>['stocks.transferstock.submit'],'method'=>'post'])!!}
	      @csrf
		  <div class="row">	
		  
		  <?php $types = array('warehouse'=>'Warehouse','distributor'=>'Distributor','branch'=>'Branch','franchise'=>'Franchise','employee'=>'Employee'); ?>
		<div class="form-group col-md-6"> {!! Form::label('usertype', 'Type') !!}
		{!! Form::select('usertype', $types, null,array('class' => 'form-control') ) !!} </div>

		<div class="form-group col-md-6"> {!! Form::label('user', 'To') !!}
		{!! Form::select('user', $users, null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- select user --') ) !!} </div>
		</div>
		
		<h3>Added Items({{count($added_items)}})</h3>
		<table class="table table-bordered">
		<tr><th>Product</th><th>Serial No</th><th>Identification</th><th>Actions</th></tr>
	  	@if(isset($added_items))
		@foreach($added_items as $stock)
		<tr><td><input type="hidden" name="stock_item[]" value="{{ $stock->id }}">{{ $stock->name }}</td><td>{{ $stock->serial_no }}</td><td>{{ $stock->identification }}</td><td><a href="{{ url('/admin/inventory/stocks/remove-transfer-stock/'.$stock->id) }}" class='btn btn-danger btn-sm'>Remove</a></td></tr>
		@endforeach
		
		@else
		<tr><td colspan="4" align="center"> No Items Found </td></tr>
		@endif
	  </table>

	  {!! Form::submit('Transfer', ['class' => 'btn btn-sm btn-primary float-right']) !!}
	  {!! Form::close() !!} 

	</div>
	  </div>
	 
	  

	  </div>	  
	</div>
	 
  </div>
    </div>
	
	<script type="text/javascript">
	$(document).ready(function() {
        $('#usertype').on('change', function() {
            var type = $(this).val();
            if(type == '' || type <=0){
            	$('#user').html("<option value=''>-- Select User --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/users/roleusers')}}/"+type,
                type: "GET",
                success:function(data) {
                   $('#user').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        //$('#type').val({{old('type')}}).trigger('change');
        
    });
</script>
		  
@stop
