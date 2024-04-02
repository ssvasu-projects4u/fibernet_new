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
        @include('customers.customer-details-navigation')
        @include('customers.customer-details-basic-info')
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
    <style>
        ol.breadcrumbs {
            list-style-type: none;
        }

        li.breadcrumb-item {
            display: inline;
        }
    </style>
@stop
