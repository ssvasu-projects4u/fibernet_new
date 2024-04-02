@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Edit Invoice</h3>
    </div>

    <div class="card-body" style="padding:10px 15px;">
      @if(Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
        
        @if($errors->any())
      <div class="alert alert-danger"> @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach </div>
      @endif
      {!! Form::model($invoice, ['method' => 'PUT','route' => ['io.update', $invoice->id]]) !!}
          @csrf
            <div class="row">

            <div class="form-group col-md-3"> {!! Form::label('ptype', 'Payment Type') !!}
                <?php $paymenttype = []; ?>
            {!! Form::select('ptype', $paymenttype, null,array('class' => 'form-control','required'=>'required','placeholder'=>'select payment type') ) !!} @if ($errors->has('ptype'))
                        <span class="help-block">
                                <strong>{{ $errors->first('ptype') }}</strong>
                            </span> @endif</div>

            <?php $types = array('prepaid'=>'Prepaid','postpaid'=>'Postpaid');?>
            <div class="form-group col-md-3"> {!! Form::label('type', 'Type') !!}
            {!! Form::select('type', $types, null,array('class' => 'form-control') ) !!} @if ($errors->has('type'))
                        <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span> @endif</div>

            <div class="form-group col-md-3"> {!! Form::label('from_date', 'From Date') !!}
            {!! Form::text('from_date',null, array('class' => 'form-control datepicker','required'=>'required','id'=>'from_date','placeholder'=>'yyyy-mm-dd')) !!} @if ($errors->has('from_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('from_date') }}</strong>
                            </span> @endif</div>
            
            <div class="form-group col-md-3"> {!! Form::label('end_date', 'End Date') !!}
            {!! Form::text('end_date',null, array('class' => 'form-control datepicker','required'=>'required','id'=>'end_date','placeholder'=>'yyyy-mm-dd')) !!} @if ($errors->has('end_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span> @endif</div>

            <div class="form-group col-md-3"> {!! Form::label('amount', 'Amount') !!}
            {!! Form::text('amount',null, array('class' => 'form-control','id'=>'amount','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Amount')) !!} @if ($errors->has('amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('gst_value', 'GST (%)') !!}
            {!! Form::text('gst_value',null, array('class' => 'form-control','id'=>'gst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %')) !!} @if ($errors->has('gst_value'))
                        <span class="help-block">
                                <strong>{{ $errors->first('gst_value') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('gst_amount', 'GST Amount') !!}
            {!! Form::text('gst_amount',null, array('class' => 'form-control','id'=>'gst_amount','readonly'=>'readonly','required'=>'required')) !!} @if ($errors->has('gst_amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('gst_amount') }}</strong>
                            </span> @endif</div>

            <div class="form-group col-md-3"> {!! Form::label('total_amount', 'Total Amount') !!}
            {!! Form::text('total_amount',null, array('class' => 'form-control','id'=>'total_amount','readonly'=>'readonly','required'=>'required')) !!} @if ($errors->has('total_amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('total_amount') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('name', 'Name') !!}
            {!! Form::text('name',null, array('class' => 'form-control','id'=>'name','required'=>'required','placeholder'=>'Enter Name')) !!} @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif</div>
            
            <div class="form-group col-md-3"> {!! Form::label('email', 'Email') !!}
            {!! Form::email('email',null, array('class' => 'form-control','required'=>'required','id'=>'email','placeholder'=>'Enter Email')) !!} @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif</div>
        
            <div class="form-group col-md-3"> {!! Form::label('phone', 'Mobile') !!}
            {!! Form::text('phone',null, array('class' => 'form-control','id'=>'phone','required'=>'required','placeholder'=>'Enter Mobile')) !!} @if ($errors->has('phone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('gst_number', 'GST Number') !!}
            {!! Form::text('gst_number',null, array('class' => 'form-control','id'=>'gst_number','required'=>'required','placeholder'=>'Enter Gst Number')) !!} @if ($errors->has('gst_number'))
                        <span class="help-block">
                                <strong>{{ $errors->first('gst_number') }}</strong>
                            </span> @endif</div>
            

                <div class="form-group col-md-3"> {!! Form::label('address', 'Address') !!}
        {!! Form::textarea('address',null, array('class' => 'form-control','rows'=>3,'required'=>'required','placeholder'=>'Enter Address')) !!} @if ($errors->has('address'))
                        <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span> @endif</div>
            
                   <?php $status = array('1'=>'Active','0'=>'InActive');?>
            <div class="form-group col-md-3"> {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', $status, null,array('class' => 'form-control') ) !!} @if ($errors->has('status'))
                        <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span> @endif</div>
            
            </div>
            
        
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
            
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    var j = jQuery.noConflict();
       j(function() {
               j(".datepicker").datepicker({ dateFormat: "yy-mm-dd" });
       });
   </script>
   <script>
        $(document).ready(function() {
    $('#gst_value,#amount').keyup(function(ev){
        var total = $('#amount').val() * 1;
        var gst = $('#gst_value').val() / 100;
        var gstprice = (total*gst);
        var total_amount = total + gstprice;
        total_amount = Math.round(total_amount * 100) / 100;
        $('#gst_amount').val(gstprice);
        $('#total_amount').val(total_amount);
    });

                
        });
        function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    </script>         
@stop
