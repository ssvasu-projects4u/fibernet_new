@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">PaymentTypes</h3></div>
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
	  @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif
	  
	  @if(isset($paymenttype->id))
		{!! Form::model($paymenttype, ['method' => 'PUT','route' => ['paymenttype.update', $paymenttype->id]]) !!}
		@else
		{!! Form::open(['route' =>['paymenttype.store'],'method'=>'post'])!!}
		@endif
		@csrf
			
	      <div class="row">
	      	<div class="form-group col-md-6"> {!! Form::label('name', 'Payment Type Name') !!}

	      		{!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Payment Type Name')) !!}
	      	</div>
	      	<?php $flow_types = array('inward'=>'Inward Cash Flow','outward'=>'Outward Cash Flow');?>
	      	<div class="form-group col-md-4"> {!! Form::label('payment_flow_type', 'Payment Flow Type') !!}
	      		{!! Form::select('payment_flow_type', $flow_types, null,array('class' => 'form-control','required'=>'required','placeholder'=>'select type') ) !!}
	      	</div>
	      </div>
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	</div>
		<hr>
	<div class="card-body" style="padding:20px;">
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
	  <table class="table table-bordered col-md-6">
	  <tr class="table-warning">
		<th>Name</th>
		<th>Payment Flow</th>
		<th>Action</th>
	  </tr>
    @if(!empty($data))
	@foreach ($data as $datarow)
    <tr>
		<td>{{ $datarow->name }}</td>
		<td>{{ strtoupper($datarow->payment_flow_type) }}</td>
		<td><a href="{{url('admin/accounts/paymenttype/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a> &nbsp;|&nbsp; <a href="{{url('admin/accounts/paymenttype/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td>

		</tr>
    @endforeach
    @endif
	</table>
	@if(!empty($data))
{{ $data->links() }}
@endif
	</div>
  </div>	  
@stop
