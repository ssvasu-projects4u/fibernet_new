@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Page Heading -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Add Purchase Order</h3>
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
      {!! Form::model($purchaseOrder, ['method' => 'PUT','route' => ['po.update', $purchaseOrder->id]]) !!}
          @csrf
            <div class="row">
                <?php $flow_types = array('inward'=>'Inward Cash Flow','outward'=>'Outward Cash Flow');?>
                <div class="form-group col-md-3"> {!! Form::label('payment_flow_type', 'Payment Flow Type') !!}
                    {!! Form::select('payment_flow_type', $flow_types, null,array('class' => 'form-control','required'=>'required','placeholder'=>'select type') ) !!}
                </div>

            <div class="form-group col-md-3"> {!! Form::label('ptype', 'Payment Type') !!}
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

                <?php $invoiceType = array('monthly'=> 'Monthly','quarterly'=>'Quarterly', 'half_yearly' => 'Half-Yearly', 'yearly'=> 'Yearly');?>
                <div class="form-group col-md-3"> {!! Form::label('invoice_type', 'Invoice Type') !!}
                {!! Form::select('invoice_type', $invoiceType, null,array('class' => 'form-control', 'required'=>'required','placeholder'=>'select Invoice type') ) !!} @if ($errors->has('invoice_type'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('invoice_type') }}</strong>
                                </span> @endif</div>
                

            <div class="form-group col-md-3"> {!! Form::label('from_date', 'From Date') !!}
            {!! Form::text('from_date',null, array('class' => 'form-control datepicker','required'=>'required','id'=>'from_date','placeholder'=>'yyyy-mm-dd', 'autocomplete' => 'off')) !!} @if ($errors->has('from_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('from_date') }}</strong>
                            </span> @endif</div>
            
            <div class="form-group col-md-3"> {!! Form::label('end_date', 'End Date') !!}
            {!! Form::text('end_date',null, array('class' => 'form-control datepicker','required'=>'required','id'=>'end_date','placeholder'=>'yyyy-mm-dd',  'autocomplete' => 'off')) !!} @if ($errors->has('end_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span> @endif</div>

            <div class="form-group col-md-3"> {!! Form::label('amount', 'Amount per month(30 days)') !!}
            {!! Form::text('amount',null, array('class' => 'form-control','id'=>'amount','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Amount')) !!} @if ($errors->has('amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('cgst_value', 'CGST (%)') !!}
            {!! Form::text('cgst_value',null, array('class' => 'form-control','id'=>'cgst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %')) !!} @if ($errors->has('cgst_value'))
                        <span class="help-block">
                                <strong>{{ $errors->first('cgst_value') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('cgst_amount', 'CGST Amount') !!}
            {!! Form::text('cgst_amount',null, array('class' => 'form-control','id'=>'cgst_amount','readonly'=>'readonly','required'=>'required')) !!} @if ($errors->has('cgst_amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('cgst_amount') }}</strong>
                            </span> @endif</div>

                            <div class="form-group col-md-3"> {!! Form::label('sgst_value', 'SGST (%)') !!}
            {!! Form::text('sgst_value',null, array('class' => 'form-control','id'=>'sgst_value','required'=>'required','onkeypress'=>'return isNumber(event)','placeholder'=>'Enter Gst %')) !!} @if ($errors->has('sgst_value'))
                        <span class="help-block">
                                <strong>{{ $errors->first('sgst_value') }}</strong>
                            </span> @endif</div>
            <div class="form-group col-md-3"> {!! Form::label('sgst_amount', 'SGST Amount') !!}
            {!! Form::text('sgst_amount',null, array('class' => 'form-control','id'=>'sgst_amount','readonly'=>'readonly','required'=>'required')) !!} @if ($errors->has('sgst_amount'))
                        <span class="help-block">
                                <strong>{{ $errors->first('sgst_amount') }}</strong>
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
            j("#end_date").datepicker({ dateFormat: "yy-mm-dd"
            //    minDate: 0
             });
            j("#from_date").datepicker({
                minDate: '0',
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                onSelect: function(dateStr) {
                        var invoice_type = $('#invoice_type').find(":selected").val();
                        if (invoice_type == "") {
                            j('#from_date').val("");
                            return alert("Please select invoice type");
                        } else {
                            var dt2 = j('#end_date');
                            var arr = dateStr.split("-");
                            var date = new Date(arr[0]+"-"+arr[1]+"-"+arr[2]);
                            var d = date.getDate();
                            var m = date.getMonth();
                            var y = date.getFullYear();

                            switch (invoice_type) {
                                case "monthly": var minDate = new Date(y, m, d+30);
                                break;
                                case "quarterly": var minDate = new Date(y, m, d+90);
                                break;
                                case "half_yearly": var minDate = new Date(y, m, d + 180);
                                break;
                                case "yearly": var minDate = new Date(y, m, d + 360);
                                break;
                            }

                        dt2.datepicker('setDate', minDate);
                        dt2.datepicker({'minDate': minDate});
                    }
            }});
       });
   </script>
   <script>
        $(document).ready(function() {
            $('#gst_value,#amount').keyup(function(ev){
                var end_date = $('#end_date').val();
                var from_date = $('#from_date').val();
                if (end_date == "" ||from_date == "" )  {
                    alert("from date and end date is required");
                }                
            var invoice_type = $('#invoice_type').find(":selected").val();
                if (invoice_type == "") {
                    return alert("Please select invoice type");
                } else {
                    // switch (invoice_type) {
                    //     case "monthly": var multiply = 1;
                    //     break;
                    //     case "quarterly": var multiply = 3;
                    //     break;
                    //     case "half_yearly": var multiply = 6;
                    //     break;
                    //     case "yearly": var multiply = 12;
                    //     break;
                    // }
                var total = (($('#amount').val() * 1) / 30) * days;
                var sgst = $('#sgst_value').val() / 100;
                var cgst = $('#cgst_value').val() / 100;

                var sgstprice = (total*sgst);
                var cgstprice = (total*cgst);

                var total_amount = total + sgstprice + cgstprice;
                total_amount = Math.round(total_amount * 100) / 100;
                $('#cgst_amount').val(parseFloat(cgstprice).toFixed(2));
                $('#sgst_amount').val(parseFloat(sgstprice).toFixed(2));

                $('#total_amount').val(parseFloat(total_amount).toFixed(2));
            }});

            $("#invoice_type").change(function() {
              $("#amount").val("");
              $("#cgst_value").val("");
              $("#cgst_amount").val("");
              $("#sgst_value").val("");
              $("#sgst_amount").val("");
              $("#total_amount").val("");
              $('#end_date').val("");
              $('#from_date').val("");
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
