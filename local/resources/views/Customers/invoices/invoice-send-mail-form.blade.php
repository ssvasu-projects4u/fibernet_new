@extends('layouts.popup')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
		<div class="modal-header">
			<div class="card-header">
				<div class="float-left">
					<h3 class="m-0 font-weight-bold text-primary">Send Email</h3>
				</div>
			</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">

	<!-- <div class="card-body table-responsive" style="padding:5px;"> -->
	  <!-- @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Pay Invoice</h3>
    </div> -->

    <div class="card-body" style="padding:10px 15px;">
        @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    @if($errors->any())
  <div class="alert alert-danger"> @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach </div>
  @endif
  <div class="row justify-content-center">

  {!! Form::model($invoiceId, ['method' => 'POST','route' => ['in.send-mail-action', $invoiceId]]) !!}
          @csrf
<div >
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', $value = null, $attributes = [
                    'class' => 'form-control',
                        'required'=>'required',
                        'id'=>'email',
                        'placeholder'=>'xyz@slj.com',
                ]) !!}  @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif</div>
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                                          {!! Form::close() !!}
                                          </div>
            </div>
        </div> 
    </div>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
@stop