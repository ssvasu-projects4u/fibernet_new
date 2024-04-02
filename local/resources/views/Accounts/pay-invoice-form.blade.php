@extends('layouts.popup')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
		<div class="modal-header">
			<div class="card-header">
				<div class="float-left">
					<h3 class="m-0 font-weight-bold text-primary">Pay Invoice</h3>
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
  {!! Form::model($data, ['method' => 'POST','route' => ['in.pay-invoice-store', $data->id]]) !!}
          @csrf
            <div class="row">
                <div class="form-group col-md-3"> {!! Form::label('from_date', 'From Date') !!}
                    {!! Form::text('from_date',
                    $data->from_date ? date('Y-m-d', strtotime($data->from_date)) : date('Y-m-d'),
                    array('class' => 'form-control datepicker','required'=>'required','id'=>'from_date','placeholder'=>'yyyy-mm-dd', 'readonly' => 'true')) !!} @if ($errors->has('from_date'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span> @endif</div>

                <?php $paymenttypes = array('cash'=>'Cash', 'cheque'=>'Cheque', 'payu' => 'Pay U', 'kotak' => 'Kotak'); ?>
                <div class="form-group col-md-3"> {!! Form::label('ptype', 'Payment Type') !!}
                {!! Form::select('ptype', $paymenttypes, null,array('class' => 'form-control','required'=>'required','placeholder'=>'select payment type') ) !!} @if ($errors->has('ptype'))
                        <span class="help-block">
                                <strong>{{ $errors->first('ptype') }}</strong>
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
                                <?php $department  = array('technical'=>'Technical', 'customercare'=>'CustomerCare');?>
                                <div class="form-group col-md-3"> {!! Form::label('department', 'Department') !!} 
                                {!! Form::select('department', $department, null,array('class' => 'form-control') ) !!} @if ($errors->has('department'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('department') }}</strong>
                                                </span> @endif</div>

                                                <?php $assigned_to  = array('office'=>'Office', 'franchise'=>'Franchise');?>
                                <div class="form-group col-md-3"> {!! Form::label('assigned_to', 'Assigned to') !!}
                                    {!! Form::select('assigned_to', $assigned_to, null,array('class' => 'form-control') ) !!} @if ($errors->has('assigned_to'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('assigned_to') }}</strong>
                                                    </span> @endif</div>

                    <?php $types = array('prepaid'=>'Prepaid','postpaid'=>'Postpaid');?>
                    <div class="form-group col-md-3"> {!! Form::label('type', 'Type') !!}
                    {!! Form::select('type', $types, null,array('class' => 'form-control', 'readonly' => true) ) !!} @if ($errors->has('type'))
                        <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span> @endif</div>

                <!-- <div class="form-group col-md-3 "> {!! Form::label('reference number', 'Reference number') !!}
                    {!! Form::text('payment_gateway_txn_id',null, array('class' => 'form-control','id'=>'reference_number','placeholder'=>'Enter Reference number', 'readonly'=> true )) !!} @if ($errors->has('reference_number'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('reference_number') }}</strong>
                                    </span> @endif</div> -->

            <div class="form-group col-md-3"> {!! Form::label('end_date', 'End Date') !!}
            {!! Form::text('end_date',  $data->end_date ? date('Y-m-d', strtotime($data->end_date)) : date('Y-m-d'), array('class' => 'form-control datepicker','required'=>'required','id'=>'end_date','placeholder'=>'yyyy-mm-dd', 'readonly'=> true)) !!} @if ($errors->has('end_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span> @endif</div>


            <div class="form-group col-md-3 "> {!! Form::label('paid amount', 'Paid Amount') !!}
                {!! Form::text('paid_amount',null, array('class' => 'form-control','id'=>'paid-amount','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Paid amount', )) !!} @if ($errors->has('paid_amount'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('paid_amount') }}</strong>
                                </span> @endif</div> 

                                <div class="form-group col-md-3">
                                {!! Form::label('paid_date', 'Paid Date *') !!}
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
            <div class="form-group col-md-3 "> {!! Form::label('amount', 'Amount per month') !!}
            {!! Form::text('amount',null, array('class' => 'form-control','id'=>'amount','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Amount', 'readonly' => true)) !!} @if ($errors->has('amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span> @endif</div>

                            <div class="form-group col-md-3 "> {!! Form::label('cgst_value', 'CGST (%)') !!}
            {!! Form::text('cgst_value',null, array('class' => 'form-control','id'=>'cgst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter CGst %', 'readonly' => true)) !!} @if ($errors->has('cgst_value'))
                        <span class="help-block">
                                <strong>{{ $errors->first('cgst_value') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('cgst_amount', 'CGST Amount') !!}
            {!! Form::text('cgst_amount',null, array('class' => 'form-control','id'=>'cgst_amount','readonly'=>'readonly','required'=>'required', 'readonly'=> true)) !!} @if ($errors->has('cgst_amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('cgst_amount') }}</strong>
                            </span> @endif</div>

                            <div class="form-group col-md-3 "> {!! Form::label('sgst_value', 'SGST (%)') !!}
            {!! Form::text('sgst_value',null, array('class' => 'form-control','id'=>'sgst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %', 'readonly' => true)) !!} @if ($errors->has('gst_value'))
                        <span class="help-block">
                                <strong>{{ $errors->first('sgst_value') }}</strong>
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
            <div class="form-group col-md-3"> {!! Form::label('name', 'Name') !!}
            {!! Form::text('name',null, array('class' => 'form-control','id'=>'name','required'=>'required','placeholder'=>'Enter Name', 'readonly'=> true)) !!} @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif</div>

            <div class="form-group col-md-3"> {!! Form::label('email', 'Email') !!}
            {!! Form::email('email',null, array('class' => 'form-control','required'=>'required','id'=>'email','placeholder'=>'Enter Email', 'readonly' => true)) !!} @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif</div>
        
            <div class="form-group col-md-3"> {!! Form::label('phone', 'Mobile') !!}
            {!! Form::text('phone',null, array('class' => 'form-control','id'=>'phone','required'=>'required','placeholder'=>'Enter Mobile', 'readonly' => true)) !!} @if ($errors->has('phone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('gst_number', 'GST Number') !!}
            {!! Form::text('gst_number',null, array('class' => 'form-control','id'=>'gst_number','required'=>'required','placeholder'=>'Enter Gst Number', "readonly" => true)) !!} @if ($errors->has('gst_number'))
                        <span class="help-block">
                                <strong>{{ $errors->first('gst_number') }}</strong>
                            </span> @endif</div>

                            <div class="form-group col-md-3"> {!! Form::label('po_number', 'Order No') !!}
                                {!! Form::text('po_number',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('po_number'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('po_number') }}</strong>
                                                    </span> @endif</div>
                            

                <div class="form-group col-md-3"> {!! Form::label('note', 'Notes') !!}
        {!! Form::textarea('note',null, array('class' => 'form-control','rows'=>3,'placeholder'=>'')) !!} @if ($errors->has('note'))
                        <span class="help-block">
                                <strong>{{ $errors->first('note') }}</strong>
                            </span> @endif</div>
            


                    {{-- <div class="form-group col-md-3"> {!! Form::label('account_no', 'Account no') !!}
                        {!! Form::text('note',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('account_no'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('account_no') }}</strong>
                                            </span> @endif</div>

                            <div class="form-group col-md-3"> {!! Form::label('user_name', 'User name') !!}
                                {!! Form::text('user_name',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('user_name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('user_name') }}</strong>
                                                    </span> @endif</div>
        
 
                            <div class="form-group col-md-3"> {!! Form::label('package_name', 'Package name') !!}
                                {!! Form::text('package_name',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('package_name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('package_name') }}</strong>
                                                    </span> @endif</div>
        

                            <div class="form-group col-md-3"> {!! Form::label('sub_package_name', 'Sub package name') !!}
                                {!! Form::text('sub_package_name',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('sub_package_name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('sub_package_name') }}</strong>
                                                    </span> @endif</div>
        
                            <div class="form-group col-md-3"> {!! Form::label('package_price', 'Package price') !!}
                                {!! Form::text('package_price',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('package_price'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('package_price') }}</strong>
                                                    </span> @endif</div>

                                                    
                            <div class="form-group col-md-3"> {!! Form::label('discount', 'Discount') !!}
                                {!! Form::text('discount',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('discount'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('discount') }}</strong>
                                                    </span> @endif</div>

                                                    <div class="form-group col-md-3"> {!! Form::label('special_discount', 'Special discount') !!}
                                {!! Form::text('special_discount',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly'=> true)) !!} @if ($errors->has('special_discount'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('special_discount') }}</strong>
                                                    </span> @endif</div>

                                                    

                                                    <div class="form-group col-md-3"> {!! Form::label('additional_charges', 'Additional charges') !!}
                                {!! Form::text('additional_charges',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'',  'readonly' => true)) !!} @if ($errors->has('additional_charges'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('additional_charges') }}</strong>
                                                    </span> @endif</div>
        

                            <div class="form-group col-md-3"> {!! Form::label('total_amount', 'Total amount') !!}
                                {!! Form::text('total_amount',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'', 'readonly' => true)) !!} @if ($errors->has('total_amount'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('total_amount') }}</strong>
                                                    </span> @endif</div>

 --}}
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
   </div> </div>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <script type="text/javascript">
    // var j2 = jQuery.noConflict();
	// j2(function() {
    // 	j2("#issuing_date").datepicker({ dateFormat: "yy-mm-dd" });
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
        $('#ptype').on('change', function() {
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