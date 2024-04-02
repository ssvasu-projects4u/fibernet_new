<?php
 // $cgstAmount = 0;
 // $sgstAmount = 0;
  $additional_charge = 0;
  $discount = 0;
 // $invoiceAmount = $package_amount + $cgstAmount + $sgstAmount;
  $invoiceAmount = $package_amount;
  $final_payable = $invoiceAmount;

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
                            <div class="float-left">Renew User</div>
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
                                                {!! Form::model($data, array('route' => array('customers.renewaluser.store', $viewtype, $data->customer_id),'method'=>'post', 'id' => 'renew_submit_form')) !!}
                                        	       @csrf
                                                    <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                                        <tbody>
                                                        <tr>
                                                            <td><span>{{ Form::label('renew_cycle', 'Renewal Cycle *')}}</span></td>
                                                            <td>
                                                                <span>
                                                                    {{ Form::radio('renew_cycle', 'immediate', true, [
                                                                        "id" => "renew-cycle-immediate"
                                                                    ]) }}
                                                                    {{ Form::label('immediate', 'Immediate') }}
                                                                </span>
                                                                <span>
                                                                    {{ Form::radio('renew_cycle', 'schedule', false, [
                                                                        "id" => "renew-cycle-schedule"
                                                                    ]) }}
                                                                    {{ Form::label('schedule', 'Schedule') }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="schedule-date">
                                                            <td><span>{{ Form::label('scheduled_datetime', 'Schedule Date *')}}</span></td>
                                                            <td>{{ Form::input('dateTime-local', 'scheduled_datetime', NULL, ['id' => 'scheduled_datetime', 'class' => 'form-control', 'required'=>'required']) }}</td>
                                                        </tr>
                                                        <tr class="schedule-date">
                                                            <td><span>{{ Form::label('generate_invoice', 'Generate Invoice *')}}</span></td>
                                                            <td>{!! Form::select('generate_invoice', [
                                                               '' => 'Select Invoice Generate Option',
                                                               'immediate' => 'Immediate',
                                                               'while-schedule-time' => 'While Schedule Time'
                                                            ], null, ['class' => 'form-control','required'=>'required']) !!}</td>
                                                        </tr>

                                             <?php   if ($data->account_type == "broadband" ) { ?>
                                                        <tr>
                                                            <td><span>{{ Form::label('package', 'Package *')}}</span></td>
                                                            <td>
                                                            <?php
                                                                $dropdownPackage = [];
                                                                $selectedPackage = null;
                                                                    $dropdownPackage = $packages;
                                                                    $selectedPackage = $data->bpackage_id;
                                                            ?>
                                                            {!! Form::select('package', $dropdownPackage, $selectedPackage, ['class' => 'form-control',  'required' => 'required']) !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>{{ Form::label('sub_package', 'Sub Package *')}}</span></td>
                                                            <td>
                                                                <?php
                                                                    $dropdownSubPackage = [];
                                                                    $selectedSubPackage = null;

                                                                    if ($data->account_type == "broadband" ) {
                                                                        $dropdownSubPackage = $subpackages;
                                                                        $selectedSubPackage = $data->sbpackage_id;
                                                                    }
                                                                ?>
                                                            {!! Form::select('sub_package', $dropdownSubPackage, $selectedSubPackage, ['class' => 'form-control',
                                                             'required' => 'required'
                                                            ]) !!}</td>
                                                        </tr>
                                                    <?php } ?>
 
                                             <?php   if ($data->account_type == "combo" ) { ?>
                                                        <tr>
                                                            <td><span>{{ Form::label('combo_package', 'Combo Package *')}}</span></td>
                                                            <td>
                                                            <?php
                                                                $dropdownPackage = [];
                                                                $selectedPackage = null;
                                                                    $dropdownPackage = $combopackages;
                                                                    $selectedPackage = $data->copackage_id;
                                                            ?>
                                                            {!! Form::select('combo_package', $dropdownPackage, $selectedPackage, ['class' => 'form-control',  'required' => 'required']) !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>{{ Form::label('combo_sub_package', 'Combo Sub Package *')}}</span></td>
                                                            <td>
                                                                <?php
                                                                    $dropdownSubPackage = [];
                                                                    $selectedSubPackage = null;

                                                                    $dropdownSubPackage = $combosubpackages;
                                                                    $selectedSubPackage = $data->scopackage_id;

                                                                ?>
                                                            {!! Form::select('combo_sub_package', $dropdownSubPackage, $selectedSubPackage, ['class' => 'form-control',
                                                             'required' => 'required'
                                                            ]) !!}</td>
                                                        </tr>
                                                    <?php } ?>


                                             <?php   if ($data->account_type == "cable" ) { ?>
                                                        <tr>
                                                            <td><span>{{ Form::label('Cable Tv', 'Cable Tv packages *')}}</span></td>
                                                            <td>

                                    <div class="cable_container col-md-12" >
                                        <label for="cable"><strong>Cable</strong></label> 	
                                    </div>	
                                    <div class="row">
                                    <div class="cable_container col-md-6" >

                                        <ul class="nav nav-tabs" style="font-size: 12px;">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cablebase">Base</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablelocal">Local</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablepackages"> Packages </a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cableallacart">Allacart</a></li>
                                        </ul><br>

                                        <div class="tab-content" style="font-size: 12px;">
                                            <div class="tab-pane container active pl-1 pr-1" id="cablebase">
                                                <div class="vertical-menu" id="select1">
                                                    @if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
                                                        @foreach($cabledatabytype['base'] as $package)
                                                            <div class="lab_base">
                                                                <label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="cablebase[]">&nbsp;{{$package['name']}}</label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        <div class="tab-pane container pl-1 pr-1" id="cablelocal">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
											@foreach($cabledatabytype['local'] as $package)
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="cablelocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
							
							
							<div class="tab-pane container pl-1 pr-1" id="cablepackages" >
								<div class="vertical-menu" id="select1">
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
										@foreach($cabledatabytype['packages'] as $package)
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package" value="{{$package['id']}}" name="cablepackage[]">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
							
							<div class="tab-pane container fade pl-1 pr-1" id="cableallacart">
								<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
									@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
										@foreach($cabledatabytype['allacart'] as $package)
											<div class="lab_allacart">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="cableallacart[]">&nbsp;{{$package['name']}} </label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
						</div>
						</div>

						<div class="col-md-6 border cable_container" >
							<label>Selected</label>
							<hr class="py-0 my-0 mb-2">
							
							<input type="hidden" name="counter" id="counter" value="0" >
							<div class="vertical-menu" id="selected_channel_packages" style="font-size: 12px;height: 250px; overflow-y: scroll;">															

							</div>

						</div>
						</div>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>


                                             <?php   if ($data->account_type == "iptv" ) { ?>
                                                        <tr>
                                                            {{--  <td><span>{{ Form::label('iptv', 'IPTV *')}}</span></td>  --}}
                                                            <td colspan="2">
						<div class="iptv_container col-md-12">
        					<label for="iptv"><strong>IPTV</strong></label> 	
        				</div>
						
						<div class="row">
						<div class="iptv_container col-md-6">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#iptvbase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvlocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvpackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">

								<div class="tab-pane container active pl-1 pr-1" id="iptvbase" >
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['base']) && count($iptvdatabytype['base'])>0)
											@foreach($iptvdatabytype['base'] as $package)
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_base" value="{{$package['id']}}" name="iptvbase[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>

								<div class="tab-pane container pl-1 pr-1" id="iptvlocal">
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['local']) && count($iptvdatabytype['local'])>0)
											@foreach($iptvdatabytype['local'] as $package)
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_local" value="{{$package['id']}}" name="iptvlocal[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								<div class="tab-pane container pl-1 pr-1" id="iptvpackages">
									<div class="vertical-menu" id="select1">
										@if(isset($iptvdatabytype['packages']) && count($iptvdatabytype['packages'])>0)
											@foreach($iptvdatabytype['packages'] as $package)
												<div class="lab_package">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_package" value="{{$package['id']}}" name="iptvpackage[]">&nbsp;{{$package['name']}}</label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								
								<div class="tab-pane container fade pl-1 pr-1" id="iptvallacart">
									<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
										@if(isset($iptvdatabytype['allacart']) && count($iptvdatabytype['allacart'])>0)
											@foreach($iptvdatabytype['allacart'] as $package)
												<div class="lab_allacart">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_allacart" value="{{$package['id']}}" name="iptvallacart[]">&nbsp;{{$package['name']}} </label>
												</div>
											@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 border iptv_container">
							<label>Selected</label>
							<hr class="py-0 my-0 mb-2">
							
							<input type="hidden" name="iptvcounter" id="iptvcounter" value="0" >
							<div class="vertical-menu" id="selected_iptv_packages" style="font-size: 12px;height: 250px; overflow-y: scroll;">															
							&nbsp;
							</div>

						</div>
						</div>

                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                                                                                                <tr>
                                                            <td><span>{{ Form::label('enable_discount', 'Enable Discount')}}</span></td>
                                                            <td class="td-center">
                                                            <!-- <div class="custom-control custom-switch"> -->
                                                            {{ Form::checkbox('enable_discount',1,false, array('id'=>'enable-discount')) }}
                                                               <!-- {{ Form::checkbox('enable_discount',null,null, array('id'=>'enable-discount', 'class'=> 'custom-control-input')) }} -->
                                                            <!-- </div> -->
                                                            </td>
                                                        </tr>
                                                        <tr class="discount-class">
                                                            <td><span>{!! Form::label('discount_amount', 'Discount Amount *') !!}</span>
                                                            {!! Form::number('discount_amount',null,['class' => 'form-control','step'=>'any', 'required'=>'required','placeholder'=>'Discount Amount']) !!}
                                                            </td>
                                                            <td><span>{!! Form::label('discount_reason', 'Discount Reason *') !!}</span>
                                                            {!! Form::textarea('discount_reason',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Discount Reason', 'rows' => 2, 'cols' => 40)) !!}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>{{ Form::label('enable_additional_charges', 'Enable Additional Charges')}}</span></td>
                                                            <td  class="td-center">
                                                               {{ Form::checkbox('enable_additional_charges',1,false, array('id'=>'enable-additional-charges')) }}
                                                            </td>
                                                        </tr>
                                                        <tr class="additional-charges-class">
                                                            <td><span>{!! Form::label('additional_charges_amount', 'Additional Amount *') !!}</span>
                                                            {!! Form::number('additional_charges_amount',null,['class' => 'form-control','step'=>'any', 'required'=>'required','placeholder'=>'Additional Amount']) !!}
                                                            </td>
                                                            <td><span>{!! Form::label('additional_charges_reason', 'Additional Reason *') !!}</span>
                                                            {!! Form::textarea('additional_charges_reason',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Additional Reason', 'rows' => 2, 'cols' => 40)) !!}
                                                            </td>
                                                        </tr>
                                                        {{--  <tr >
                                                            <td><span>{!! Form::label('cgst', 'CGST in % *') !!}</span>
                                                            {!! Form::number('cgst',null,['class' => 'form-control','step'=>'any','placeholder'=>'CGST in %']) !!}
                                                            </td>
                                                            <td class="td-50px-width"><span>{!! Form::label('sgst', 'SGST in %*') !!}</span>
                                                            {!! Form::number('sgst',null,['class' => 'form-control','step'=>'any','placeholder'=>'SGST in %']) !!}
                                                            </td>
                                                        </tr>  --}}
                                                        <tr>
                                                            <td><span>{{ Form::label('invoice_comment', 'Invoice Comment')}}</span></td>
                                                            <td>{!! Form::textarea('invoice_comment',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                    {{ Form::hidden('connection_type', $data->account_type, 
                                                        [
                                                            'id' => 'connection_type'
                                                        ]
                                                    ) }}

                                                    {{ Form::hidden('package_amount', $package_amount, [
                                                            'id' => 'package_amount'
                                                        ]) }}
                                                    {{ Form::hidden('invoice_amount', $invoiceAmount,
                                                        [
                                                            'id' => 'invoice_amount'
                                                        ]
                                                    ) }}
                                                    {{--  {{ Form::hidden('cgst_amount',  NULL, [
                                                            'id' => 'cgst_amount'
                                                        ]) }}  --}}
                                                    {{--  {{ Form::hidden('sgst_amount',  NULL, [
                                                            'id' => 'sgst_amount'
                                                        ]) }}  --}}
                                                    {{ Form::hidden('final_payable', $final_payable,
                                                        [
                                                            'id' => 'final_payable'
                                                        ]
                                                    ) }}

                                                    {!! Form::submit('Renew', [
                                                        'class' => 'btn btn-success', 
                                                        'id'=> 'renew_submit'
                                                    ]) !!}                                                            
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
            $("#scheduled_datetime").removeAttr("required");
            $("#generate_invoice").removeAttr("required");
            $("tr.schedule-date").hide();
            $("tr.discount-class").hide();
            $("tr.additional-charges-class").hide();

            $("#discount_reason").removeAttr("required");
            $("#discount_amount").removeAttr("required");
            $("#additional_charges_amount").removeAttr("required");
            $("#additional_charges_reason").removeAttr("required");

            $('input:radio[name="renew_cycle"]').change(function() {
                console.log("test");
                if ($(this).is(':checked') && $(this).val() == 'schedule') {
                    $("#scheduled_datetime").prop('required',true);
                    $("#generate_invoice").prop('required',true);
                    $("tr.schedule-date").show();
                } else if ($(this).is(':checked') && $(this).val() == 'immediate') {
                    $("#scheduled_datetime").removeAttr("required");
                    $("#generate_invoice").removeAttr("required");
                    $("tr.schedule-date").hide();
                }
            });

            $('#enable-discount').change(function() {
                if (this.checked) {
                    $("#discount_amount").prop('required',true);
                    $("#discount_reason").prop('required',true);
                    $("tr.discount-class").show();
                } else {
                    $("#discount_reason").removeAttr("required");
                    $("#discount_amount").removeAttr("required");

                    discount_amount = 0;
                    var package_amount = $('#package_amount').val();
                    package_amount = parseFloat(package_amount);
                    var additional_charges_amount = $('#additional_charges_amount').val();
                    additional_charges_amount = additional_charges_amount  == "" ? 0 : parseFloat(additional_charges_amount);
                    var invoice_amount = (package_amount + additional_charges_amount) - discount_amount;
                    var final_pay = invoice_amount;

                    $('#invoice-amount').text(invoice_amount.toFixed(2));
                    $('#invoice-final-payable').text(final_pay);
                    $('#invoice-discount-price').text(discount_amount.toFixed(2));

                    $('#invoice_amount').val(invoice_amount.toFixed(2));
                    $('#final_payable').val(final_pay.toFixed(2));

                    $("tr.discount-class").hide();
                }
            });

            $('#enable-additional-charges').change(function() {
                if (this.checked) {
                    $("#additional_charges_amount").prop('required',true);
                    $("#additional_charges_reason").prop('required',true);
                    $("tr.additional-charges-class").show();
                } else {
                    $("#additional_charges_amount").removeAttr("required");
                    $("#additional_charges_reason").removeAttr("required");

                    additional_charges_amount = 0;

                    var discount_amount = $(this).val();
                    discount_amount = discount_amount  == "" ? 0 : parseFloat(discount_amount);

                    var package_amount = $('#package_amount').val();
                    package_amount = parseFloat(package_amount);

                    var invoice_amount = (package_amount + additional_charges_amount ) - discount_amount;
                    var final_pay = invoice_amount;

                    $('#invoice-amount').text(invoice_amount.toFixed(2));
                    $('#invoice-final-payable').text(final_pay.toFixed(2));
                    $('#invoice-discount-price').text(discount_amount.toFixed(2));

                    $('#invoice_amount').val(invoice_amount.toFixed(2));
                    $('#final_payable').val(final_pay.toFixed(2));

                    $("tr.additional-charges-class").hide();
                }
            });

            $("#discount_amount").change(function(){
                var discount_amount = $(this).val();
                discount_amount = discount_amount == "" ? 0 : parseFloat(discount_amount);

                var package_amount = $('#package_amount').val();
                package_amount = parseFloat(package_amount);
                var additional_charges_amount = $('#additional_charges_amount').val();
                additional_charges_amount = additional_charges_amount == "" ? 0 : parseFloat(additional_charges_amount);

                var invoice_amount = (package_amount + additional_charges_amount) - discount_amount;
                var final_pay = invoice_amount;
                console.log(invoice_amount);
                console.log(final_pay);

                $('#invoice-amount').text(invoice_amount.toFixed(2));
                $('#invoice-final-payable').text(final_pay.toFixed(2));
                $('#invoice-discount-price').text(discount_amount.toFixed(2));

                $('#invoice_amount').val(invoice_amount.toFixed(2));
                $('#final_payable').val(final_pay.toFixed(2));

            });

            $("#additional_charges_amount").change(function() {
                var additional_charges_amount = $(this).val();
                additional_charges_amount = additional_charges_amount  == "" ? 0 : parseFloat(additional_charges_amount);

                var package_amount = $('#package_amount').val();
                package_amount = parseFloat(package_amount);
                var discount_amount = $('#discount_amount').val();
                discount_amount = discount_amount  == "" ? 0 : parseFloat(discount_amount);

                var invoice_amount = (package_amount + additional_charges_amount) - discount_amount;
                var final_pay = invoice_amount;
                $("#invoice-additional-price").text(additional_charges_amount.toFixed(2));

                $('#invoice-amount').text(invoice_amount.toFixed(2));
                $('#invoice-final-payable').text(final_pay.toFixed(2));

                $('#invoice_amount').val(invoice_amount.toFixed(2));
                $('#final_payable').val(final_pay.toFixed(2));
            });

            $('#package').on('change', function() {
                var package = $(this).val();
                if(package == '' || package <=0){
                    $('#sub_package').html("<option value=''>-- Select Sub Package --</option>");
                    return;
                }
                $.ajax({
                    url: "{{url('/admin/customers/package-subpackages')}}/"+package,
                    type: "GET",
                    success:function(data) {
                        $('#sub_package').html(data);
                        var balancereset = 0.00;
                        var subpackage_options = $('#sub_package option').length;
                        if (subpackage_options > 1) {
                          $('#sub_package').prop('required',true);
                        }
                        else {
                          $('#sub_package').removeAttr("required");
                        }
                        $("#package_amount").val(balancereset);
                        $("#invoice-package-price").text(balancereset);

                        $("#invoice-additional-price").text(balancereset);

                        $('#invoice-amount').text(balancereset);
                        $('#invoice-final-payable').text(balancereset);

                        $('#invoice_amount').val(balancereset);
                        $('#final_payable').val(balancereset);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            $('#combo_package').on('change', function() {
                var package = $(this).val();
                if(package == '' || package <=0){
                    $('#combo_sub_package').html("<option value=''>-- Select Combo Sub Package --</option>");
                    return;
                }
                $.ajax({
                    url: "{{url('/admin/customers/package-combo-subpackages')}}/"+package,
                    type: "GET",
                    success:function(data) {
                        $('#combo_sub_package').html(data);
                        var balancereset = 0.00;
                        var subpackage_options = $('#combo_sub_package option').length;
                        if (subpackage_options > 1) {
                        $('#combo_sub_package').prop('required',true);
                        }
                        else {
                        $('#combo_sub_package').removeAttr("required");
                        }
                        $("#package_amount").val(balancereset);
                        $("#invoice-package-price").text(balancereset);

                        $("#invoice-additional-price").text(balancereset);

                        $('#invoice-amount').text(balancereset);
                        $('#invoice-final-payable').text(balancereset);

                        $('#invoice_amount').val(balancereset);
                        $('#final_payable').val(balancereset);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            $('#combo_sub_package').on('change', function() {
                var subpackage = $(this).val();
                var package = $("#combo_package").val();
                var connection_type = $("#connection_type").val();
                var url = '';
                if (connection_type == "combo") {
                url = "{{url('/combo-subpackages-price')}}/"+package+"/"+subpackage;
                }
                $.ajax({
                    url: url,
                    type: "GET",
                    success:function(data) {
                        var package_amount = data;
                        package_amount = parseFloat(package_amount);
                        console.log("package_amount" + package_amount);

                        var discount_amount = $('#discount_amount').val();
                        discount_amount = discount_amount == "" ? 0 : parseFloat(discount_amount);
                        console.log("discount_amount" + discount_amount);

                        var additional_charges_amount = $('#additional_charges_amount').val();
                        additional_charges_amount = additional_charges_amount  == "" ? 0 : parseFloat(additional_charges_amount);

                        var invoice_amount = (package_amount + additional_charges_amount ) - discount_amount;

                        var final_pay = invoice_amount;

                        $("#package_amount").val(package_amount.toFixed(2));
                        $("#invoice-package-price").text(package_amount.toFixed(2));

                        $("#invoice-additional-price").text(additional_charges_amount.toFixed(2));

                        $('#invoice-amount').text(invoice_amount.toFixed(2));
                        $('#invoice-final-payable').text(final_pay.toFixed(2));

                        $('#invoice_amount').val(invoice_amount.toFixed(2));
                        $('#final_payable').val(final_pay.toFixed(2));

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            $('#sub_package').on('change', function() {
                var subpackage = $(this).val();
                var package = $("#package").val();
                var connection_type = $("#connection_type").val();
                var url = '';
                if (connection_type == "broadband") {
                url = "{{url('/broadband-subpackages-price')}}/"+package+"/"+subpackage;
                }
                $.ajax({
                    url: url,
                    type: "GET",
                    success:function(data) {
                        var package_amount = data;
                        package_amount = parseFloat(package_amount);
                        console.log("package_amount" + package_amount);

                        var discount_amount = $('#discount_amount').val();
                        discount_amount = discount_amount == "" ? 0 : parseFloat(discount_amount);
                        console.log("discount_amount" + discount_amount);

                        var additional_charges_amount = $('#additional_charges_amount').val();
                        additional_charges_amount = additional_charges_amount  == "" ? 0 : parseFloat(additional_charges_amount);

                        var invoice_amount = (package_amount + additional_charges_amount ) - discount_amount;

                        var final_pay = invoice_amount;

                        $("#package_amount").val(package_amount.toFixed(2));
                        $("#invoice-package-price").text(package_amount.toFixed(2));

                        $("#invoice-additional-price").text(additional_charges_amount.toFixed(2));

                        $('#invoice-amount').text(invoice_amount.toFixed(2));
                        $('#invoice-final-payable').text(final_pay.toFixed(2));

                        $('#invoice_amount').val(invoice_amount.toFixed(2));
                        $('#final_payable').val(final_pay.toFixed(2));

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });


        $('body').on('change','#cablepackages .input_cable_package',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });

        $('body').on('change','#cableallacart .input_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		$('body').on('change','#cablelocal .input_cable_local',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });
		
		$('body').on('change','#cablebase .input_cable_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        }
	    });


	    $('body').on('change','#selected_channel_packages .input_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#cableallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
	        
	    });

	    $('body').on('change','#selected_channel_packages .input_cable_package',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablepackages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });

		 $('body').on('change','#selected_channel_packages .input_cable_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablelocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });

		$('body').on('change','#selected_channel_packages .input_cable_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablebase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
	        
	    });
		
		$('body').on('change','#iptvpackages .input_iptv_package',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
                calculateIPTVcharges();
	        }
	    });

        $('body').on('change','#iptvallacart .input_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
                calculateIPTVcharges();
	        }
	    });
		
		
		$('body').on('change','#iptvlocal .input_iptv_local',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
                calculateIPTVcharges();
	        }
	    });

        $('body').on('change','#iptvbase .input_iptv_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
                calculateIPTVcharges();
	        }
	    });

	    $('body').on('change','#selected_iptv_packages .input_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#iptvallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
                calculateIPTVcharges();
	    });

	    $('body').on('change','#selected_iptv_packages .input_iptv_package',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvpackages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
            calculateIPTVcharges();
	    });
		
		
		$('body').on('change','#selected_iptv_packages .input_iptv_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvbase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
            calculateIPTVcharges();
	    });
		
		$('body').on('change','#selected_iptv_packages .input_iptv_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvlocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
            calculateIPTVcharges();
	    });


            $( "#renew_submit" ).submit(function( event ) {
                var connection_type = $('#connection_type').val();
alert(connection_type);
                if(connection_type == 'cable'){
                    if($('#selected_channel_packages .input_cable_base').length <= 0){
                        alert('You Must Select Base Plan');
                        return false;
                    }	
                }

                if(connection_type == 'iptv'){
                    if($('#selected_iptv_packages .input_iptv_base').length <= 0){
                        alert('You Must Select Base Plan');
                        return false;
                    }	
                }			
            });	

        });
        function calculateIPTVcharges() {
            var balancereset = 0.00;

            $("#package_amount").val(balancereset);
            $("#invoice-package-price").text(balancereset);

            $("#invoice-additional-price").text(balancereset);

            $('#invoice-amount').text(balancereset);
            $('#invoice-final-payable').text(balancereset);

            $('#invoice_amount').val(balancereset);
            $('#final_payable').val(balancereset);

            var iptv_local = $("input:checkbox[class=input_iptv_local]:checked");
            var input_iptv_local = iptv_local.map(function() {
                return this.value;
            })
            .get().join(', ');

            var iptv_base = $("input:checkbox[class=input_iptv_base]:checked");
            var input_iptv_base = iptv_base.map(function() {
                return this.value;
            })
            .get().join(', ');

            var iptv_package = $("input:checkbox[class=input_iptv_package]:checked");
            var input_iptv_package = iptv_package.map(function() {
                return this.value;
            })
            .get().join(', ');

            var allacart = $("input:checkbox[class=input_allacart]:checked");
            var input_allacart = allacart.map(function() {
                return this.value;
            })
            .get().join(', ');

            var url = "{{url('/iptv-subpackages-price')}}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "input_iptv_package": input_iptv_package,
                    "input_allacart": input_allacart,
                    "input_iptv_base": input_iptv_base,
                    "input_iptv_local": input_iptv_local
                },
                success:function(data) {
                    var package_amount = data;
                    package_amount = parseFloat(package_amount);
                    var discountamount = $('#discount_amount').val();
                    discount_amount = (discountamount == "") ? 0 : parseFloat(discountamount)

                    var additional_charges_amount = $('#additional_charges_amount').val();
                    additional_charges_amount = (additional_charges_amount  == "") ? 0 : parseFloat(additional_charges_amount);

                    var invoice_amount = (package_amount + additional_charges_amount ) - discount_amount;

                    var final_pay = invoice_amount;

                    $("#package_amount").val(package_amount.toFixed(2));
                    $("#invoice-package-price").text(package_amount.toFixed(2));

                    $("#invoice-additional-price").text(additional_charges_amount.toFixed(2));

                    $('#invoice-amount').text(invoice_amount.toFixed(2));
                    $('#invoice-final-payable').text(final_pay.toFixed(2));

                    $('#invoice_amount').val(invoice_amount.toFixed(2));
                    $('#final_payable').val(final_pay.toFixed(2));

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    </script>
    <style>
        ol.breadcrumbs {
            list-style-type: none;
        }
        li.breadcrumb-item {
            display: inline;
        }
        .td-center {
            text-align: center !important;
        }
        .td-50px-width {
            width: 300px;
        }
    </style>
@stop
