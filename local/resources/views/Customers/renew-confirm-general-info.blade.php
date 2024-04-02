<?php
   
    $package_amount = $renew->package_amount;
    $additional_charge = $renew->additional_amount;
    $discount = $renew->discount_amount;
//    $cgstAmount = $renew->cgst_amount;
//    $sgstAmount = $renew->sgst_amount;

//    $cgst = $renew->cgst;
//    $sgst = $renew->sgst;

    $invoiceAmount = $renew->invoice_amount;
    $final_payable = $renew->final_payable;

?>
@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    @include('customers.customer-details-topmenu')

    <div class="card-body" style="padding: 0 !important;">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger"> @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach </div>
        @endif
    </div>
    <div class="row">
        @include('customers::customer-details-navigation')
        @include('customers::customer-details-basic-info')
    </div>

<!--  Renew User Pane-->
    <div class="row">
        <div class="col-md-2 mb-4" style="border-radius: 0;">
        </div>
        <div class="col">
           <div class="row">
                <div class="col-md-7">
                    <div class="card mb-4">
                        <div class="card-header py-2">
                            <div class="float-left">Renewal confiramtion</div>
                        </div>

                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                        @endif
                        <!-- Content Row -->
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col">
                                                {!! Form::model($data, array(
                                                    'route' => array(
                                                        'customers.renewaluser.confirm',
                                                        $renew->id,
                                                        $viewtype,
                                                        $data->customer_id
                                                    ), 'method'=>'post'
                                                )) !!}
                                        	      @csrf
                                                    <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                                        <tbody>
                                                        <tr>
                                                            <td><span>{{ Form::label('renewal_cycle', 'Renewal Cycle *')}}</span></td>
                                                            <td>
                                                                <span> {{ ucwords($renew->renew_cycle) }} </span>
                                                            </td>
                                                        </tr>
                                                        <?php if ($renew->renew_cycle == "schedule") {?>
                                                        <tr class="schedule-date">
                                                            <td><span>{{ Form::label('schedule_date', 'Schedule Date *')}}</span></td>
                                                            <td>{{ $renew->scheduled_datetime }}</td>
                                                        </tr>
                                                        <tr class="schedule-date">
                                                            <td><span>{{ Form::label('generate_invoice', 'Generate Invoice *')}}</span></td>
                                                            <td>{{ ucwords(str_replace("-", " ", $renew->generate_invoice)) }}</td>
                                                        </tr>
                                                        <?php } ?>

                                                        <?php if ($renew->connection_type == "broadband")  { ?>
                                                            <tr>
                                                                <td><span>{{ Form::label('package', 'Package *')}}</span></td>
                                                                <td>{{ $package->package_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span>{{ Form::label('sub_package', 'Sub Package *')}}</span></td>
                                                                <td>{{ $subpackage->sub_plan_name }}</td>
                                                            </tr>
                                                        <?php } ?>

                                                        <?php if ($renew->connection_type == "combo")  { ?>
                                                            <tr>
                                                                <td><span>{{ Form::label('package', 'Package *')}}</span></td>
                                                                <td>{{ $combopackage->package_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span>{{ Form::label('sub_package', 'Sub Package *')}}</span></td>
                                                                <td>{{ $combosubpackage->sub_plan_name }}</td>
                                                            </tr>
                                                        <?php } ?>

                                                        <?php if ($renew->connection_type == "iptv")  { ?>
                                                            <tr>
                                                                <td><span>Iptv *</span></td>
                                                                <td></td>
                                                            </tr>
                                                            <?php if ($renew->iptv_base != "") {
                                                                    $packages = explode(",", $renew->iptv_base);
                                                                    $iptv_bases = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                 ?>
                                                            <tr>
                                                                <td>ITPV Base</td>
                                                                <td>
                                                                    <?php foreach($iptv_bases as $iptv_base) { ?>
                                                                    <div>{{ $iptv_base->name }}</div>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if ($renew->iptv_packages != "") {
                                                                    $packages = explode(",", $renew->iptv_packages);
                                                                    $iptv_packages = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <tr>
                                                                <td>ITPV Packages</td>
                                                                <td>
                                                                   <?php foreach($iptv_packages as $iptv_package) { ?>
                                                                  <div>{{ $iptv_package->name }}</div>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if ($renew->iptv_local != "") {
                                                                    $packages = explode(",", $renew->iptv_local);
                                                                    $iptv_locals = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
                                                                ?>
                                                            <tr>
                                                                <td>ITPV Local</td>
                                                                <td>
                                                                <?php foreach($iptv_locals as $iptv_local) { ?>
                                                                  <div>{{ $iptv_local->name }}</div>
                                                                <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if ($renew->iptv_allacart != "") {
                                                                $packages = explode(",", $renew->iptv_allacart);
                                                                $iptv_allacarts = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <tr>
                                                                <td>ITPV Allacart</td>
                                                                <td>
                                                                 <?php foreach($iptv_allacarts as $iptv_allacart) { ?>
                                                                  <div>{{ $iptv_allacart->name }}</div>
                                                                 <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        <?php } ?>


                                                        <?php if ($renew->connection_type == "cable")  { ?>
                                                            <tr>
                                                                <td><span>Cable *</span></td>
                                                                <td></td>
                                                            </tr>
                                                            <?php if ($renew->cable_base != "") {
                                                                    $packages = explode(",", $renew->cable_base);
                                                                    $cable_bases = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                 ?>
                                                            <tr>
                                                                <td>Cable Base</td>
                                                                <td>
                                                                    <?php foreach($cable_bases as $cable_base) { ?>
                                                                    <div>{{ $cable_base->name }}</div>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if ($renew->cable_packages != "") {
                                                                    $packages = explode(",", $renew->cable_packages);
                                                                    $cable_packages = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <tr>
                                                                <td>Cable Packages</td>
                                                                <td>
                                                                   <?php foreach($cable_packages as $cable_package) { ?>
                                                                  <div>{{ $cable_package->name }}</div>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if ($renew->cable_local != "") {
                                                                    $packages = explode(",", $renew->cable_local);
                                                                    $cable_locals = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
                                                                ?>
                                                            <tr>
                                                                <td>Cable Local</td>
                                                                <td>
                                                                <?php foreach($cable_locals as $cable_local) { ?>
                                                                  <div>{{ $cable_local->name }}</div>
                                                                <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                            <?php if ($renew->cable_allacart != "") {
                                                                $packages = explode(",", $renew->cable_allacart);
                                                                $cable_allacarts = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <tr>
                                                                <td>Cable Allacart</td>
                                                                <td>
                                                                 <?php foreach($cable_allacarts as $cable_allacart) { ?>
                                                                  <div>{{ $cable_allacart->name }}</div>
                                                                 <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php } ?>
                                                        <?php } ?>
<tr>                                                    </tr>
                                                            <td><span style="color:#0F9F55">{{ Form::label('new_expiry_date', 'Bill From *')}}</span></td>
                                                            <td><span style="color:#0F9F55">
                                                                @if($renew->new_expiry_date != "")
                                                                
                                                                {{ date('d-m-Y H:i:s', strtotime($renew->new_expiry_date)) }}
                                                                @endif
                                                                    
                                                            </span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span style="color:#0F9F55">{{ Form::label('new_expiry_date', 'Bill To *')}}</span></td>
                                                            <td><span style="color:#0F9F55">{{ $renew->new_expiry_date != "" ?  date('d-m-Y H:i:s', strtotime($renew->new_expiry_date)) :  "" }}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>{{ Form::label('enable_discount', 'Enable Discount')}}</span></td>
                                                            <td>
                                                               {{ $renew->enable_discount == 1 ? 'Yes' : 'No' }}
                                                            </td>
                                                        </tr>
                                                        <?php if ($renew->enable_discount == 1) { ?>
                                                        <tr>
                                                            <td>Discount Reason</td>
                                                            <td>{{ $renew->discount_reason }}</td>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td><span>{{ Form::label('enable_additional_charges', 'Enable Additional Charges')}}</span></td>
                                                            <td>{{ $renew->enable_additional_charges == 1 ?  'Yes' : 'No'}}</td>
                                                        </tr>
                                                        <?php if ($renew->enable_additional_charges == 1) { ?>
                                                        <tr>
                                                            <td>Additional Reason</td>
                                                            <td>{{ $renew->additional_charges_reason }}</td>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td><span>{{ Form::label('payment', 'Payment *')}}</span></td>
                                                            <td>
                                                            <span>
                                                                    {{ Form::radio('payment', 'pay_now', false) }}
                                                                    {{ Form::label('payment', 'Pay Now')}}
                                                                </span>
                                                                <span>
                                                                    {{ Form::radio('payment', 'pay_later', true) }}
                                                                    {{ Form::label('payment', 'Pay Later') }}
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr class="pay-now">
                                                            <td><span>{{ Form::label('paid_amount', 'Paying Amount *')}}</span></td>
                                                            <td>{{$final_payable}}
                                                            </td>
                                                        </tr>

                                                        <tr  class="pay-now">
                                                            <td><span>{{ Form::label('payment_type', 'Payment Type *')}}</span></td>
                                                            <td>{!! Form::select('payment_type', [
                                                               '' => 'Select Payment Type',
                                                               'cash_payment' => 'Cash Payment',
                                                               'cheque_payment' => 'Cheque Payment',
                                                               'online' => 'Online'
                                                            ], '', ['class' => 'form-control', 'required'=>'required']) !!}</td>
                                                        </tr>

                                                        <tr class="pay-now">
                                                            <td><span>{{ Form::label('ref_no', 'Ref No')}}</span></td>
                                                            <td>{!! Form::text('ref_no', NULL, ['class' => 'form-control']) !!}</td>
                                                        </tr>

                                                        <tr class="pay-now-cheque">
                                                            <td><span>{{ Form::label('cheque_no', 'Cheque No *')}}</span></td>
                                                            <td>{!! Form::text('cheque_no', NULL, [
                                                              'class' => 'form-control',
                                                              'required'=>'required', 
                                                              'placeholder'=> 'Cheque No'
                                                            ]) !!}</td>
                                                        </tr>
 
                                                        <tr class="pay-now-cheque">
                                                            <td><span>{{ Form::label('bank_name', 'Bank Name *')}}</span></td>
                                                            <td>{!! Form::text('bank_name', NULL, [
                                                                'class' => 'form-control', 
                                                                'required'=>'required',
                                                                'placeholder'=> 'Bank Name'
                                                            ]) !!}</td>
                                                        </tr>

                                                        <tr class="pay-now-cheque">
                                                            <td><span>{{ Form::label('cheque_date', 'Cheque Date*')}}</span></td>
                                                            <td>{!! Form::date('cheque_date', null, array(
                                                                    'class' => 'form-control',
                                                                    'required'=>'required',
                                                                    'placeholder'=>'Cheque Date',
                                                                    'type'=>'date'
                                                                    )
                                                                ) !!}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><span>{{ Form::label('department', 'Department')}}</span></td>
                                                            <td>{!! Form::select('department', [
                                                               '' => 'Select Department',
                                                            ], $renew->department, ['class' => 'form-control']) !!}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><span>{{ Form::label('assigned_to', 'Assigned To')}}</span></td>
                                                            <td>{!! Form::select('assigned_to', [
                                                               '' => 'Select Assigned To',
                                                            ], $renew->assigned_to, ['class' => 'form-control']) !!}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><span>{{ Form::label('invoice_comment', 'Invoice Comment')}}</span></td>
                                                            <td>{!! Form::textarea('invoice_comment',$renew->invoice_comment,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}</td>
                                                        </tr>

                                                        <tr class="pay-now">
                                                            <td><span>{{ Form::label('bill_comment', 'Bill Comment')}}</span></td>
                                                            <td>{!! Form::textarea('bill_comment', $renew->bill_comment, [
                                                               'class'=>'form-control',
                                                               'rows' => 2,
                                                               'cols' => 40
                                                            ]) !!}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><span></span></td>
                                                            <td>
                                                                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                                                                {!! Form::submit('Confirm And Renew', ['class' => 'btn btn-success']) !!}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    @include('customers::renew-invoice-breakup')
                </div>
            </div>
        </div>   
    </div>

    <div id="basic-information" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div id="location-information" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div id="change-password" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div id="upload-documents" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div id="package-and-prices-change" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#payment_type").removeAttr("required");
            $("#cheque_no").removeAttr("required");
            $("#bank_name").removeAttr("required");
            $("#cheque_date").removeAttr("required");

            $(".pay-now").hide();
            $(".pay-now-cheque").hide();

            $('input:radio[name="payment"]').change(function() {
                if ($(this).is(':checked') && $(this).val() == 'pay_now') {
                    $("#payment_type").prop('required',true);
                    $(".pay-now").show();
                } else if ($(this).is(':checked') && $(this).val() == 'pay_later') {
                    $("#payment_type").removeAttr("required");
                    $("#cheque_no").removeAttr("required");
                    $("#bank_name").removeAttr("required");
                    $("#cheque_date").removeAttr("required");
                    $(".pay-now").hide();
                }
            });

            $("#payment_type").change(function() {
                if ($('option:selected', this).val() == "cheque_payment" ) {
                    $("#cheque_no").prop('required',true);
                    $("#bank_name").prop('required',true);
                    $("#cheque_date").prop('required',true);
                    $(".pay-now-cheque").show();
                }
                else {
                    $("#cheque_no").removeAttr("required");
                    $("#bank_name").removeAttr("required");
                    $("#cheque_date").removeAttr("required");
                    $(".pay-now-cheque").hide();
                }
            });
        });
    </script>
    <style>
        ol.breadcrumbs {
            list-style-type: none;
        }

        li.breadcrumb-item {
            display: inline;
        }
    </style>
@stop
