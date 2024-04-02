@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit Product Category</h4></div>
	  
	</div>
	
	
	<div class="card-body">
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($details, array('route' => array('product-categories.update', $details->id),'method'=>'put')) !!}
      @csrf
	  
	  <div class="row">	
		  <div class="form-group col-md-3"> {!! Form::label('name', 'Category Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Category Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('parent', 'Parent Category') !!}
						        {!! Form::select('parent', $categories, null,array('class' => 'form-control','placeholder'=>'-- Select Parent Category --') ) !!} </div>
		
		<?php $statuses = array('Y'=>'Active','N'=>'In Active'); ?>
		<div class="form-group col-md-2"> {!! Form::label('status', 'Status') !!}
		{!! Form::select('status', $statuses, null,array('class' => 'form-control') ) !!} </div>
		  
		<div class="form-group col-md-4"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Description')) !!} </div>
		  </div>
	 
	  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!} 
		{!! Form::close() !!} 
	  
	</div>
  </div>
 	
  @if($details->parent == 0 && count($subcategories)>0)
  <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Sub Categories</h3></div>
	</div>
	
	
	<div class="card-body" style="padding:5px;">
	  <table class="table table-bordered">
	  <tr class="table-warning">
	  	<th width="25">Actions</th>
		<th>Category Name</th>
		<th>Description</th>
		<th>Status</th>
	  </tr>
	@foreach ($subcategories as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                <ul class="dropdown-menu dropdown-default" role="menu">
                    <li><a class="dropdown-item" href="{{url('admin/inventory/product-categories/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/inventory/product-categories/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                </ul>
            </div>
		</td>
		<td><a href="{{url('admin/inventory/product-categories/edit/'.$datarow->id)}}">{{ $datarow->name }}</a></td>
		<td>{{ $datarow->description }}</td>
		<td>
			@if($datarow->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($datarow->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($datarow->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		</td>
		
		</tr>
    @endforeach
	</table>
{{ $subcategories->links() }}
	</div>
  </div>
  @endif	
		  
@stop
