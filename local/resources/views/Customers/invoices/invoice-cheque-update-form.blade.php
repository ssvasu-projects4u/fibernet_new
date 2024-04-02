@extends('layouts.popup')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
		<div class="modal-header">
			<div class="card-header">
				<div class="float-left">
					<h3 class="m-0 font-weight-bold text-primary">Cheque Update</h3>
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
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

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


  {!! Form::model($invoiceId, ['method' => 'POST','route' => ['in.check-update-store', $invoiceId]]) !!}
          @csrf
          <div class="row">

        <div class="form-group col-md-3">
            {{ Form::radio('cheque_update', 'cheque_cleared', ['required' => 'required']) }} Cheque Cleared
        </div>
        <div class="form-group col-md-3">
            {{ Form::radio('cheque_update', 'cheque_bounced', ['required' => 'required']) }} Cheque Bounced
        </div>

        <!-- <div>
            @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('cheque_update') }}</strong>
                        </span> @endif</div> -->
                <div class="form-group col-md-3>
                        <div class="row justify-content-center">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                     </div><div>

                     </div><!-- /input-group -->
                                          {!! Form::close() !!}


</div>
   </div> </div>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
@stop