<?php
$user = Auth::user();
$roles = $user->getRoleNames();
//echo $roles[0];exit;
$layout = 'layouts.admin';
if ($roles[0] == 'branch' || $roles[0] == 'franchise') {
    //echo $roles[0];exit;
    $layout = 'layouts.' . $roles[0];
}
$title = $edittype;
$title = ucfirst(str_replace("-", " ", $edittype));
?>
@extends('layouts.popup')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow">
        <div class="modal-header">
            <h3 class="m-0 font-weight-bold text-primary">{{ $title }}</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row justify-content-center">
                <div class="card-body">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger"> @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach </div>
                    @endif

                    {!! Form::model($customerdetails, array('route' => array('customers.updateEdittype', $edittype, $customerdetails->id),'method'=>'put','files'=>'true', 'id'=> $edittype)) !!}
                    @csrf

                    <?php if ($edittype == 'basic-information') { ?>

                    <div class="row">

                        <div class="form-group col-md-4"> {!! Form::label('mobile', 'Register Mobile *') !!}
                            {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Register Mobile')) !!} </div>

                        <div class="form-group col-md-4"> {!! Form::label('alt_mobile_num', 'Alternate Mobile No') !!}
                            {!! Form::text('alt_mobile_num',null, array('class' => 'form-control','placeholder'=>'Enter Alternate Mobile No')) !!} </div>
                    </div>
                    <?php } ?>
                    <?php if ($edittype == 'location-information') { ?>
                    <hr class="pt-0 pb-0 mb-1 mt-0">

                    <div class="row">
                        <div class="form-group col-md-6"> {!! Form::label('billing_address', 'Billing Address *') !!}
                            {!! Form::textarea('billing_address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Billing Address')) !!}
                        </div>
                        <div
                            class="form-group col-md-6"> {!! Form::label('installation_address', 'Installation Address *') !!}
                            {!! Form::textarea('installation_address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Installation Address')) !!}
                        </div>

                        <div class="form-group col-md-6"> {!! Form::label('landmark', 'Landmark') !!}
                            {!! Form::text('landmark',null, array('class' => 'form-control','placeholder'=>'Enter Landmark')) !!} </div>
                        <div class="form-group col-md-3"> {!! Form::label('pincode', 'Pincode') !!}
                            {!! Form::text('pincode',null, array('class' => 'form-control','placeholder'=>'Enter Pincode')) !!} </div>
                    </div>
                    <?php } ?>
                    <?php if ($edittype == 'upload-documents') { ?>

                    <div class="row">
                        <div class="form-group col-md-4"> {!! Form::label('address_proof', 'Address Proof') !!}
                            {!! Form::file('address_proof',null, array('class' => 'form-control','required'=>'required')) !!} </div>
                        <div class="form-group col-md-4"> {!! Form::label('identity_proof', 'Identity Proof') !!}
                            {!! Form::file('identity_proof',null, array('class' => 'form-control','required'=>'required')) !!} </div>
                        <div class="form-group col-md-4"> {!! Form::label('customer_pic', 'Customer Photo') !!}
                            {!! Form::file('customer_pic',null, array('class' => 'form-control','required'=>'required')) !!} </div>
                    </div>
                    <?php } ?>
                    <?php if ($edittype == 'change-password') { ?>


                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="password" class="col-form-label text-md-right">{{ __('New Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="Enter Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="password-confirm"
                                   class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" placeholder="Enter Confirm Password" required
                                   autocomplete="new-password">
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($edittype == 'package-and-prices-change') { ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('expires_date', 'Expiry Date *') !!}
                                {!! Form::date('expiry_date',
                                    $customerdetails["expiry_date"],
                                    array('class' => 'form-control datepicker',
                                    'required' => 'required',
                                    'id' => 'expiry-date',
                                    'placeholder' => 'yyyy-mm-dd')
                                ) !!} @if ($errors->has('expiry_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('expiry_date') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                    <?php } ?>
                    <p></p>
                    <div class="text-center">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=> 'edit_form_btn']) !!}
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#edit_form_btn').attr('disabled', true);
            $('#upload-documents').on('keyup blur click', function () {
                var isForm = $(this).validate({
                    rules: {
                        customer_pic: {
                            required: true,
                        },
                        address_proof: {
                            required: true,
                        },
                        identity_proof: {
                            required: true,
                        },
                    }
                }).checkForm();
                if (isForm) {
                    $('#edit_form_btn').attr('disabled', false);
                } else {
                    $('#edit_form_btn').attr('disabled', true);
                }
            });
        });

        $(document).ready(function () {
            $('#edit_form_btn').attr('disabled', true);
            $('#location-information').on('keyup blur click', function () {
                var isForm = $(this).validate({
                    rules: {
                        billing_address: {
                            required: true,
                        },
                        installation_address: {
                            required: true,
                        },
                    }
                }).checkForm();
                if (isForm) {
                    $('#edit_form_btn').attr('disabled', false);
                } else {
                    $('#edit_form_btn').attr('disabled', true);
                }
            });
        });

        $(document).ready(function () {
            $('#edit_form_btn').attr('disabled', true);
            $('#change-password').on('keyup blur click', function () {
                var isForm = $(this).validate({
                    rules: {
                        password: {
                            required: true,
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        },
                    }
                }).checkForm();

                if (isForm) {
                    $('#edit_form_btn').attr('disabled', false);
                } else {
                    $('#edit_form_btn').attr('disabled', true);
                }
            });
        });

        $(document).ready(function () {
            $('#edit_form_btn').attr('disabled', true);
            $('#basic-information').on('keyup blur click', function () {
                var isForm = $(this).validate({
                    rules: {
                        mobile: {"required": true},
                    }
                }).checkForm();
                if (isForm) {
                    $('#edit_form_btn').attr('disabled', false);
                } else {
                    $('#edit_form_btn').attr('disabled', true);
                }
            });
        });

        $(document).ready(function () {
            $('#edit_form_btn').attr('disabled', true);
            $('#package-and-prices-change').on('keyup blur click', function () {
                var isForm = $(this).validate({
                    rules: {
                        mobile: {"required": true},
                    }
                }).checkForm();
                if (isForm) {
                    $('#edit_form_btn').attr('disabled', false);
                } else {
                    $('#edit_form_btn').attr('disabled', true);
                }
            });
        });

    </script>
@stop
