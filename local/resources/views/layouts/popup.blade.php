<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SLJ Fiber Works">
  <meta name="author" content="SLJ Fiber Works">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SLJ Fiber Works') }} - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" />


  <style>
  #content .container-fluid{padding:0 0.5rem; }
  .sidebar .nav-item .nav-link{padding:0.5rem;}
  .toptabs li a.nav-link{font-size:16px;margin:5px 0 0 0;padding:.5rem .75rem;}
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{    
  	color: #fff;
    background-color: #e74a3b;
    border-color: #dddfeb #dddfeb #fff;
	}
	table.table td,table.table th{padding: .4rem;}
	.nav-tabs .nav-item{margin-bottom: -2px;}
	.bottom-submenu{background-color: #e74a3b}
	.bottom-submenu .nav-item .nav-link {
        color: #f8f9fc;
        font-size: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 5px;
        padding: 0px 4px;
        background-color: #4e73df;
    }
	.bottom-submenu .nav-item.active .nav-link{text-decoration: underline;color:#fff;}

  ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #ccc;
    font-size: 12px;
  }

  :-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #ccc;
    font-size: 12px;
  }

  ::-ms-input-placeholder { /* Microsoft Edge */
    color: #ccc;
    font-size: 12px;
  }

  form .form-group label{color: #808094;font-weight: bold;}
  .sidebar .nav-item .collapse .collapse-inner .collapse-item, .sidebar .nav-item .collapsing .collapse-inner .collapse-item{padding: .25rem 1rem;}
  .sidebar .nav-item .collapse .collapse-inner .collapse-header, .sidebar .nav-item .collapsing .collapse-inner .collapse-header{font-size:0.8rem;}
.error { 
	border: 1px solid #ff0000 !important; 
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: .35rem;
    -webkit-transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
}
label.error {
	display: none !important;
}
 
  </style>
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
   <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!--<script src="{{ asset('assets/vendor/jquery/jquery-1.11.3.min.js')}}"></script>
   
  <script src="{{ asset('assets/vendor/bootstrap/bootstrap.3.3.5min.js')}}"></script>-->
  <script src="{{ asset('assets/vendor/jquery.validate.min.js')}}"></script>
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
</head>

<body id="page-top">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->
</body>

</html>
