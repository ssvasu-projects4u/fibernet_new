@extends('layouts.popup')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
		<div class="modal-header">
			<div class="card-header">
				<div class="float-left">
					<h3 class="m-0 font-weight-bold text-primary">Payment Pickup</h3>
				</div>
			</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Payment Pickup</h3>
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
      {!! Form::model($data, ['method' => 'POST','route' => ['in.payment-pickup-store', $data->id]]) !!}
          @csrf

          <div class="row">

                    <?php $department = array();?>
                    <div class="form-group col-md-3"> {!! Form::label('Select department', 'Select Department') !!}
                    {!! Form::select('department', $department, null,array('class' => 'form-control') ) !!} @if ($errors->has('department'))
                        <span class="help-block">
                                <strong>{{ $errors->first('department') }}</strong>
                            </span> @endif</div>

                    <?php $user = array();?>
                    <div class="form-group col-md-3"> {!! Form::label('Select User', 'Select User') !!}
                    {!! Form::select('user', $user, null,array('class' => 'form-control') ) !!} @if ($errors->has('user'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('user') }}</strong>
                                            </span> @endif</div>
<?php if ($data->from_date) { ?>
            <div class="form-group col-md-3"> {!! Form::label('from_date', 'From Date') !!}
            {!! Form::text('from_date',date('Y-m-d'), array('class' => 'form-control datepicker','required'=>'required','id'=>'from_date','placeholder'=>'yyyy-mm-dd', 'readonly'=> true)) !!} @if ($errors->has('from_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('from_date') }}</strong>
                            </span> @endif</div>
<?php } ?>
                <div class="form-group col-md-3 col"> {!! Form::label('note', 'Note') !!}
              {!! Form::textarea('note',null, array('class' => 'form-control','rows'=>3, 'placeholder'=>'Enter Note')) !!} @if ($errors->has('note'))
                        <span class="help-block">
                                <strong>{{ $errors->first('note') }}</strong>
                            </span> @endif</div>
                            <?php $payment_pickup_types = [
                              'cash'=>'Cash',
                              'cheque'=>'Cheque',
                              'payu' => 'Pay U',
                              'kotak' => 'Kotak'
                            ]; ?>
                            <div class="form-group col-md-3"> {!! Form::label('payment_pickup_type', 'Payment Pickup Type') !!}
                            {!! Form::select('payment_pickup_type', $payment_pickup_types, null,array('class' => 'form-control','required'=>'required','placeholder'=>'select payment pickup type') ) !!} @if ($errors->has('ptype'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('payment_pickup_type') }}</strong>
                                            </span> @endif</div>

            <div class="form-group col-md-3 cheque-details"> {!! Form::label('cheque_no', 'Cheque No *') !!}
                {!! Form::text('cheque_no',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Cheque No')) !!} </div>

                <div class="form-group col-md-3 cheque-details"> {!! Form::label('issuing_bank_name', 'Issuing Bank Name *') !!}
                {!! Form::text('issuing_bank_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Issuing Bank Name')) !!} </div>

                <div class="form-group col-md-3 cheque-details">
                                {!! Form::label('issuing_date', 'Issuing Date *') !!}
                                {!! Form::date('issuing_date',
                                        date('Y-m-d'), 
                                        array('class' => 'form-control datepicker',
                                        'required' => 'required',
                                        'id' => 'issuing_date',
                                        'placeholder' => 'yyyy-mm-dd')
                                    ) !!} @if ($errors->has('issuing_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('issuing_date') }}</strong>
                                    </span> @endif
                                </div>

                <div class="form-group col-md-3 cheque-details"> {!! Form::label('branch', 'Branch *') !!}
                {!! Form::text('branch',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Branch')) !!} </div>
                <div class="form-group col-md-3 "> {!! Form::label('amount', 'Amount per month') !!}
                  {!! Form::text('amount',null, array('class' => 'form-control','id'=>'amount','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Amount', 'readonly' => true)) !!} @if ($errors->has('amount'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('amount') }}</strong>
                                  </span> @endif</div>

                                  <div class="form-group col-md-3 ">
                                {!! Form::label('paid date', 'Paid Date *') !!}
                                {!! Form::date('paid_date',
                                        date('Y-m-d'),
                                        array('class' => 'form-control datepicker',
                                        'required' => 'required',
                                        'id' => 'paid-date',
                                        'placeholder' => 'yyyy-mm-dd')
                                    ) !!} @if ($errors->has('paid_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('paid_date') }}</strong>
                                    </span> @endif
                                </div>

            <div class="form-group col-md-3 "> {!! Form::label('paid amount', 'Paid Amount') !!}
                {!! Form::text('paid_amount',null, array('class' => 'form-control','id'=>'paid-amount','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Paid amount')) !!} @if ($errors->has('paid_amount'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('paid_amount') }}</strong>
                                </span> @endif</div> 

                  <div class="form-group col-md-3 "> {!! Form::label('cgst_value', 'CGST (%)') !!}
                  {!! Form::text('cgst_value',null, array('class' => 'form-control','id'=>'cgst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %', 'readonly' => true)) !!} @if ($errors->has('gst_value'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('cgst_value') }}</strong>
                                  </span> @endif</div>

                  <div class="form-group col-md-3"> {!! Form::label('cgst_amount', 'CGST Amount') !!}
                  {!! Form::text('cgst_amount',null, array('class' => 'form-control','id'=>'cgst_amount','readonly'=>'readonly','required'=>'required', 'readonly'=> true)) !!} @if ($errors->has('cgst_amount'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('cgst_amount') }}</strong>
                                  </span> @endif</div>

                  <div class="form-group col-md-3 "> {!! Form::label('sgst_value', 'SGST (%)') !!}
                  {!! Form::text('sgst_value',null, array('class' => 'form-control','id'=>'sgst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %', 'readonly' => true)) !!} @if ($errors->has('sgst_value'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('gst_value') }}</strong>
                                  </span> @endif</div>
                  <div class="form-group col-md-3"> {!! Form::label('sgst_amount', 'SGST Amount') !!}
                  {!! Form::text('sgst_amount',null, array('class' => 'form-control','id'=>'sgst_amount','readonly'=>'readonly','required'=>'required', 'readonly'=> true)) !!} @if ($errors->has('sgst_amount'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('sgst_amount') }}</strong>
                                  </span> @endif</div>

                  <!-- <div class="form-group col-md-3 "> {!! Form::label('gst_value', 'GST (%)') !!}
                  {!! Form::text('gst_value',null, array('class' => 'form-control','id'=>'gst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %', 'readonly' => true)) !!} @if ($errors->has('gst_value'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('gst_value') }}</strong>
                                  </span> @endif</div>
                  <div class="form-group col-md-3"> {!! Form::label('gst_amount', 'GST Amount') !!}
                  {!! Form::text('gst_amount',null, array('class' => 'form-control','id'=>'gst_amount','readonly'=>'readonly','required'=>'required', 'readonly'=> true)) !!} @if ($errors->has('gst_amount'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('gst_amount') }}</strong>
                                  </span> @endif</div> -->

                  <div class="form-group col-md-3"> {!! Form::label('total_amount', 'Total Amount') !!}
                  {!! Form::text('total_amount',null, array('class' => 'form-control','id'=>'total_amount','readonly'=>'readonly','required'=>'required')) !!} @if ($errors->has('total_amount'))
                              <span class="help-block">
                                      <strong>{{ $errors->first('total_amount') }}</strong>
                                  </span> @endif</div>

              <div class="form-group col-md-3"> {!! Form::label('balance', 'Balance') !!}
                    {!! Form::text('balance',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('balance'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('balance') }}</strong>
                                        </span> @endif</div>

        </div>
        <div class="row justify-content-center">
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
        </div>
    </div>
  </div>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <script type="text/javascript">
  //   var j = jQuery.noConflict(true);
	// j(function() {
  //   	j("#issuing_date").datepicker({ dateFormat: "yy-mm-dd" });
	// });
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }

$(document).ready(function() {
  $(".cheque-details").hide();
  $('#paid-amount').on('change', function() {
            var paying_amount = $(this).val();
            if ( (parseFloat(paying_amount) > $('#total_amount').val()) == true) {
                alert("paid amount should be less than or equal to total amount");
                $(this).val("");
                return;
            }
            var balance = $('#total_amount').val() - parseFloat(paying_amount);
            $("#balance").val(balance.toFixed(2));
        });


  $('#payment_pickup_type').on('change', function() {
  if ( this.value == 'cheque' )
  {
      $(".cheque-details").show();
      $("#cheque_no").attr("disabled", false);
      $("#issuing_bank_name").attr("disabled", false);
      $("#issuing_date").attr("disabled", false);
      $("#branch").attr("disabled", false);

  }
  else
  {
      $("#cheque_no").val("");
      $("#issuing_bank_name").val("");
      $("#issuing_date").val("");
      $("#branch").val("");
      $(".cheque-details").hide();
      $("#cheque_no").attr("disabled", true);
      $("#issuing_bank_name").attr("disabled", true);
      $("#issuing_date").attr("disabled", true);
      $("#branch").attr("disabled", true);
  }
  });
});
</script>
@stop