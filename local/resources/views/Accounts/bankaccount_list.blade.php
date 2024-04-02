@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Bank Account</h3></div>
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

	  @if(isset($bankaccount->id))
		{!! Form::model($bankaccount, ['method' => 'PUT','route' => ['bank-account.update', $bankaccount->id]]) !!}
		@else
		{!! Form::open(['route' =>['bank-accounts.store'],'method'=>'post'])!!}
		@endif
		@csrf
			
	      <div class="row">
	      	<div class="form-group col-md-3"> {!! Form::label('name', 'Bank Name') !!}

	      		{!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Bank Name')) !!}
	      	</div>

			<div class="form-group col-md-3"> {!! Form::label('account_number', 'Account Number') !!}
				{!! Form::text('account_number',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Account Number')) !!}
			</div>

			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
	      		{!! Form::text('branch',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Branch Name')) !!}
	      	</div>

			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
	      		{!! Form::text('city',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter City Name')) !!}
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
		<th>Id</th>
		<th>Bank Name</th>
		<th>Account Number</th>
		<th>Branch</th>
		<th>City</th>
	  </tr>
    @if(!empty($data))
	@foreach ($data as $datarow)
    <tr>
		<td>{{ $datarow->id }}</td>
		<td>{{ strtoupper($datarow->name) }}</td>
		<td>{{ $datarow->account_number }}</td>
		<td>{{ strtoupper($datarow->branch) }}</td>
		<td>{{ strtoupper($datarow->city) }}</td>
		<!-- <td><a href="{{url('admin/accounts/bankaccount/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a> &nbsp;|&nbsp; <a href="{{url('admin/accounts/bankaccount/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a></td> -->
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
