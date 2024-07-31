
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
        
  <link href="{{asset('assets/css/multiselect.css')}}" rel="stylesheet">
          
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/bootstrap-multiselect.css')}}" rel="stylesheet">
   
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
 

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
            #map {
                height: 100%;
            }
        </style>
        @if(Request::segment(4) == 'general-info')
        <link href="{{asset('assets/css/general-info.css')}}" rel="stylesheet">
        @endif
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
        
         <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
         <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
          <script src="{{ asset('assets/js/bootstrap-multiselect.js')}}"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!--<script src="{{ asset('assets/vendor/jquery/jquery-1.11.3.min.js')}}"></script>

        <script src="{{ asset('assets/vendor/bootstrap/bootstrap.3.3.5min.js')}}"></script>-->
        <script src="{{ asset('assets/vendor/jquery.validate.min.js')}}"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/map_js_file.js')}}"></script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}">
        </script><!--&callback=initMap-->

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php
              $user = Auth::user();
              $roles = $user->getRoleNames();
              $dashboard_url = url('admin/dashboard');
            ?>
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ $dashboard_url }}" style="background-color:#fff;">
                    <div class="sidebar-brand-text mx-3">
                        <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid rounded">
                        <br><span class="badge badge-success"><small><?php echo $roles[0]; ?></small></span>
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?php if (Request::segment(2) == 'dashboard') {
                echo 'active';
                  } ?>">
                    <a class="nav-link" href="{{ $dashboard_url }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>



@can("feasibility-check")
                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?php if (Request::segment(2) == 'feasability-check') {
                   echo 'active';
                } ?>">
                    <a class="nav-link" href="{{url('admin/feasability-check')}}">
                        <i class="fas fa-fw fa-map-marker"></i>
                        <span>Feasability Check</span></a>
                </li>

@endcan

                <!-- Nav Item - Pages Collapse Menu -->
@canany([
    'state','city', 'departments', 'designations', 'distributors', 'subdistributors', 'branches', 'franchises', 'employees'
])
<?php
  $administration_items = array('state','city', 'departments', 'designations', 'distributors', 'subdistributors', 'branches', 'franchises', 'employees');
?>

                    <li class="nav-item <?php if (in_array(Request::segment(2), $administration_items)) {
                        echo 'active';
                    } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministration" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Administration </span>
                        </a>
                        <div id="collapseAdministration" class="collapse <?php if (in_array(Request::segment(2), $administration_items)) {
                       // echo 'show';
                    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                    @can("departments")
                      <a class="collapse-item <?php if (Request::segment(2) == 'departments') {
                          echo 'active';
                      } ?>" href="{{url('admin/departments')}}">Departments</a>
                    @endcan
                    @can("designations")
                    <a class="collapse-item <?php if (Request::segment(2) == 'designations') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/designations')}}">Designations</a>
                    @endcan
                    @can("employees")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'employees') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/employees')}}">Employees</a>

                              <hr class="py-0 my-0">
                    @endcan
                    @can("state")
                    <a class="collapse-item <?php if (Request::segment(2) == 'state') {
                        echo 'active';
                    } ?>" href="{{url('admin/state')}}">State</a>
                    @endcan
                    @can("city")
                    <a class="collapse-item <?php if (Request::segment(2) == 'city') {
                        echo 'active';
                    } ?>" href="{{url('admin/city')}}">City</a>
                    @endcan
                    @can("distributors")
                      <a class="collapse-item <?php if (Request::segment(2) == 'distributors') {
                            echo 'active';
                        } ?>" href="{{url('admin/distributors')}}">Distributors</a>
                    @endcan
					 @can("subdistributors")
                      <a class="collapse-item <?php if (Request::segment(2) == 'subdistributors') {
                            echo 'active';
                        } ?>" href="{{url('admin/subdistributors')}}">Sub Distributors</a>
                    @endcan
                    @can("branches")
                        <a class="collapse-item <?php if (Request::segment(2) == 'branches') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/branches')}}">Branches</a>
                    @endcan
                    @can("franchises")
                        <a class="collapse-item <?php if (Request::segment(2) == 'franchises') {
                                echo 'active';
                            } ?>" href="{{url('admin/franchises')}}">Franchises</a>
                    @endcan
                    </div>
                </div>
            </li>
            @endcanany


@canany(
  [
    'connection-types', 
    'combo-plans', 
    'combo-packages', 
    'broadband-plans', 
    'broadband-packages', 
    'iptv-base', 
    'iptv-packages', 
    'iptv-allacart', 
    'iptv-local', 
    'cable-base', 
    'cable-packages', 
    'cable-allacart', 
    'cable-local',
  ]
)
                            <?php
                            $packages_items = array('connection-types', 'combo-sub-packages', 'combo-packages', 'broadband-sub-packages', 'broadband-packages', 'iptv', 'cable-packages');
                                ?>
                    <li class="nav-item <?php if (in_array(Request::segment(2), $packages_items)) {
                                    echo 'active';
                                } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePackages" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Packages</span>
                        </a>
                        <div id="collapsePackages" class="collapse <?php if (in_array(Request::segment(2), $packages_items)) {
                                    //echo 'show';
                                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">


  @can("connection-types")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'connection-types') {
                                echo 'active';
                            } ?>" href="{{url('admin/connection-types')}}">Connection Types</a><hr class="py-0 my-0">
  @endcan

                                <h6 class="collapse-header active">Combo</h6><hr class="py-0 my-0">



  @can("combo-plans")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'combo-sub-packages') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/combo-sub-packages')}}">Combo Plans</a>

  @endcan
  @can("combo-packages")


                                    <a class="collapse-item <?php if (Request::segment(2) == 'combo-packages') {
                                echo 'active';
                            } ?>" href="{{url('admin/combo-packages')}}">Combo Packages</a>

  @endcan


                                <hr class="py-0 my-0"><h6 class="collapse-header active">Broadband</h6><hr class="py-0 my-0">

  @can("broadband-plans")
                                   <a class="collapse-item <?php if (Request::segment(2) == 'broadband-sub-packages') {
                                echo 'active';
                            } ?>" href="{{url('admin/broadband-sub-packages')}}">Broadband Plans</a>

  @endcan
  @can("broadband-packages")
          
                                    <a class="collapse-item <?php if (Request::segment(2) == 'broadband-packages') {
                    echo 'active';
                } ?>" href="{{url('admin/broadband-packages')}}">Broadband Packages</a>



                                <hr class="py-0 my-0"><h6 class="collapse-header active">IPTV</h6><hr class="py-0 my-0">
                
@endcan
@can("iptv-base")


            <a class="collapse-item <?php if (Request::segment(2) == 'iptv' && Request::segment(3) == 'base') {
                    echo 'active';
                } ?>" href="{{url('admin/iptv/base')}}"> Base (FTA) </a>

@endcan
@can("iptv-packages")


                                    <a class="collapse-item <?php if (Request::segment(2) == 'iptv' && Request::segment(3) == 'packages') {
            echo 'active';
        } ?>" href="{{url('admin/iptv/packages')}}">Packages</a>


@endcan
@can("iptv-allacart")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'iptv' && Request::segment(3) == 'allacart') {
                                echo 'active';
                            } ?>" href="{{url('admin/iptv/allacart')}}">Allacart</a>


@endcan
@can("iptv-local")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'iptv' && Request::segment(3) == 'local') {
                                echo 'active';
                            } ?>" href="{{url('admin/iptv/local')}}">Local</a>


                                <hr class="py-0 my-0"><h6 class="collapse-header active">Cable</h6><hr class="py-0 my-0">

@endcan
@can("cable-base")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'cable-packages' && Request::segment(3) == 'base') {
                                echo 'active';
                            } ?>" href="{{url('admin/cable-packages/base')}}"> Base (FTA) </a>

@endcan
@can("cable-packages")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'cable-packages' && Request::segment(3) == 'packages') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/cable-packages/packages')}}">Packages</a>


@endcan
@can("cable-allacart")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'cable-packages' && Request::segment(3) == 'allacart') {
                                echo 'active';
                            } ?>" href="{{url('admin/cable-packages/allacart')}}">Allacart</a>
@endcan
@can("cable-local")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'cable-packages' && Request::segment(3) == 'local') {
                                echo 'active';
                            } ?>" href="{{url('admin/cable-packages/local')}}">Local</a>
@endcan

                            </div>
                        </div>
                    </li>
@endcanany
@canany(
  [
    'ippool',
    'NAS',
    'NAS Graph',
    'QoS Management',
    'Package Dynamic Rates',
    'activate-customers',
    'active-customers',
    'expired-customers',
    'disconnection-customers',
    'renewal-history',
    'customer-renewal-invoices'
  ]
)
   

                    <li class="nav-item <?php if (in_array(Request::segment(1), ['IPpool'])) {
        echo 'active';
    } ?>">
                           </a>
                        <?php $user = \Auth::user();
      $roles = $user->getRoleNames();
      
      if($roles[0]=='superadmin')
      {
          ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseControlPanel" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Control Panel</span>
                        </a>
                        
                        <div id="collapseControlPanel" class="collapse <?php if (in_array(Request::segment(2), ['customers'])) {
       // echo 'show';
    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">


@can("ippool")
                                
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/customers/ippool')}}">IP Pool</a>
                
                
@endcan
@can("add-technical")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'technical') {
                            echo 'active';
                        } ?>" href="{{url('admin/customers/add-nas')}}">NAS</a>

@endcan
@can("scheduled-customers")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'schedule') {
                    echo 'active';
                } ?>" href="{{url('admin/customers/nasgraph')}}">NAS Graph</a>

@endcan
@can("activate-customers")

<a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'activation') {
            echo 'active';
        } ?>" href="{{url('admin/customers/qos')}}">QoS Management</a>

@endcan
@can("active-customers")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'active') {
                                echo 'active';
                            } ?>" href="{{url('admin/customers/package-dynamic-rate')}}">Package Dynamic Rates</a>
                               

@endcan
@can("expired-customers")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'expired') {
                                echo 'active';
                            } ?>" href="{{url('admin/customers/live-logs')}}">Live Logs</a>
                             
                             @endcan

                            </div>
                        </div>
                        <?php } ?>
                    </li>



@endcanany
@canany(["competator", "followup","proepsect","intrested"])

                <li class="nav-item <?php if (in_array(Request::segment(2), array('customers'))) {
                        echo 'active';
                    } ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselead" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Lead Management</span>
                    </a>
                    <div id="collapselead" class="collapse <?php if (in_array(Request::segment(2), array('reports'))) {
                        //echo 'show';
                    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          @can("proepsect")
                                <a class="collapse-item" href="{{url('admin/customers/proepsect')}}">Prospect</a>
                          @endcan
                          @can("followup")
                                <a class="collapse-item" href="{{url('admin/customers/followup')}}">Followup</a>
                          @endcan
                          @can("intrested")
                          
                                   <a class="collapse-item" href="{{url('admin/customers/intrested')}}">Interested</a>
                          @endcan
                        @can("notinterested")
                                <a class="collapse-item" href="{{url('admin/customers/notinterested')}}">Not-Intrested</a>
                          @endcan
                         
                         @can("competator")
                                <a class="collapse-item" href="{{url('admin/customers/competator')}}">Competator</a>
                          @endcan

                          
                        </div>
                    </div>
                </li>
                @endcanany
               


@canany(
  [
    'add-customer-application',
    'all-customers',
    'new-customers',
    'add-technical',
    'scheduled-customers',
    'activate-customers',
    'active-customers',
    'expired-customers',
    'disconnection-customers',
    'renewal-history',
    'customer-renewal-invoices'
  ]
)

                    <li class="nav-item <?php if (in_array(Request::segment(2), ['customers'])) {
        echo 'active';
    } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Customers</span>
                        </a>
                        <div id="collapseCustomers" class="collapse <?php if (in_array(Request::segment(2), ['customers'])) {
       // echo 'show';
    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

@can("add-customer-application")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'create') {
                                echo 'active';
                            } ?>" href="{{url('admin/customers/create')}}">Add Customer Application</a>

@endcan
@can("all-customers")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == '') {
                                echo 'active';
                            } ?>" href="{{url('admin/customers')}}">All Customers</a>

@endcan
@can("new-customers")
                                
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'new') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/customers/new')}}">New Customers</a>
                
                
@endcan
@can("add-technical")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'technical') {
                            echo 'active';
                        } ?>" href="{{url('admin/customers/technical')}}">Add Technical</a>

@endcan
@can("scheduled-customers")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'schedule') {
                    echo 'active';
                } ?>" href="{{url('admin/customers/schedule')}}">Scheduled Customers</a>

@endcan
@can("activate-customers")

<a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'activation') {
            echo 'active';
        } ?>" href="{{url('admin/customers/activation')}}">Activate Customers</a>

@endcan
@can("active-customers")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'active') {
                                echo 'active';
                            } ?>" href="{{url('admin/customers/active')}}">Active Customers</a>
                               

@endcan
@can("expired-customers")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'expired') {
                                echo 'active';
                            } ?>" href="{{url('admin/customers/expired')}}">Expired Customers</a>
                             
                             @endcan
@can("disconnection-customers")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'closed') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/customers/closed')}}">Disconnections</a>

@endcan
@can("renewal-history")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'renewal-history') {
                                            echo 'active';
                                        } ?>" href="{{url('admin/customers/renewal-history')}}">Renewal History</a>

@endcan
@can("customer-renewal-invoices")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'renewal-unpaid-invoices') {
                                            echo 'active';
                                        } ?>" href="{{url('admin/customers/renewal-unpaid-invoices')}}">Renewal Invoices</a>
                              @endcan
                            </div>
                        </div>
                    </li>



@endcanany


@canany(
  [
    'complaint-types',
    'add-complaint',
    'complaints',
    'open-complaints',
    'in-progress-complaints',
    'resolved-complaints',
    'closed-complaints'
  ]
)

                <?php
                $complaints_items = array('complaint-types', 'complaints');
                    ?>

                    <li class="nav-item <?php if (in_array(Request::segment(2), $complaints_items)) {
                    echo 'active';
                } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComplaints" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Complaints</span>
                        </a>
                        <div id="collapseComplaints" class="collapse <?php if (in_array(Request::segment(2), $complaints_items)) {
                   // echo 'show';
                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">


@can("complaint-types")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'complaint-types') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/complaint-types')}}">Complaint Types</a><hr class="py-0 my-0">

@endcan

<h6 class="collapse-header active">Complaints</h6><hr class="py-0 my-0">


@can("add-complaint")

       <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'create') {
            echo 'active';
        } ?>" href="{{url('admin/complaints/create')}}">Add Complaint</a>


@endcan
@can("complaints")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == '') {
                                echo 'active';
                            } ?>" href="{{url('admin/complaints')}}">All Complaints</a>


@endcan
@can("open-complaints")

<a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'open') {
            echo 'active';
        } ?>" href="{{url('admin/complaints/open')}}">Open Complaints</a>


@endcan
@can("in-progress-complaints")
                            <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'inprogress') {
                                echo 'active';
                            } ?>" href="{{url('admin/complaints/inprogress')}}">In Progress Complaints</a>


@endcan
@can("resolved-complaints")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'resolved') {
                                echo 'active';
                            } ?>" href="{{url('admin/complaints/resolved')}}">Resolved Complaints</a>

@endcan
@can("closed-complaints")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'closed') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/complaints/closed')}}">Closed Complaints</a>


@endcan
@can("deleted-complaints")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'deleted') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/complaints/deleted')}}">Deleted Complaints</a>
@endcan

                            </div>
                        </div>
                    </li>
                            @endcanany





@canany(
  [
    'olt',
    'edfa',
    'newfiber',
    'fiber-laying',
    'dpd',
    'dp',
    'fh'
  ]
)
<?php
$technical_items = array( 
    'olt',
    'edfa',
    'newfiber',
    'fiber-laying',
    'dpd',
    'dp',
    'fh');
    ?>
                    <li class="nav-item <?php if (in_array(Request::segment(2), $technical_items)) {
                    echo 'active';
                } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Technical</span>
                        </a>
                        <div id="collapseTwo" class="collapse <?php if (in_array(Request::segment(2), $technical_items)) {
                   // echo 'show';
                } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">


                          @can("olt")

                                    <a class="collapse-item <?php if (Request::segment(2) == 'olt') {
                                echo 'active';
                            } ?>" href="{{url('admin/olt')}}">OLT</a>

                          @endcan
                          @can("edfa")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'edfa') {
                                echo 'active';
                            } ?>" href="{{url('admin/edfa')}}">EDFA</a> 

                          @endcan
                         
                          @can("fiber-laying")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'fiber-laying') {
                                echo 'active';
                            } ?>" href="{{url('admin/fiber-laying')}}">Fiber Laying</a>

                          @endcan
                           
                          @can("dpd")
                 <a class="collapse-item <?php if (Request::segment(2) == 'dpd') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/dpd')}}">DPD</a>

                          @endcan
                          @can("dp")
                        <a class="collapse-item <?php if (Request::segment(2) == 'dp') {
                                echo 'active';
                            } ?>" href="{{url('admin/dp')}}">DP</a>


                          @endcan
                          @can("fh")
                              <a class="collapse-item <?php if (Request::segment(2) == 'fh') {
                                        echo 'active';
                                    } ?>" href="{{url('admin/fh')}}">FH</a>

                          @endcan

                            </div>
                        </div>
                    </li>
@endcanany




                @canany([
                  "payment-types",
                  "bank-accounts",
                  "purchase-order",
                  "add-purchase-order",
                  "inward-cash-flow",
                  "outward-cash-flow",
                  "gst",
                  "balance-sheet",
                  "cheque-invoices",
                  "cheque-bounce-invoices",
                  "all-cancelled",
                  "all-cancelled1"
                ])

                    <li class="nav-item <?php if (in_array(Request::segment(2), ['accounts'])) {
                        echo 'active';
                    } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccounts" aria-expanded="true" aria-controls="collapseAccounts">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Accounts</span>
                        </a>
                        <div id="collapseAccounts" class="collapse <?php if (in_array(Request::segment(2), ['accounts'])) {
       // echo 'show';
    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded"  style="font-size:12px;">

          @can("bank-accounts")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(3) == 'bank-accounts') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/bank-accounts')}}">Bank Account</a>
          @endcan
          @can("payment-types")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(3) == 'paymenttype') {
            echo 'active';
            } ?>" href="{{url('admin/accounts/paymenttype')}}">Payment Types</a>
          @endcan



        @canany(["purchase-order", "add-purchase-order"])

          <!-- PO menu start  -->
          <hr class="py-0 my-0">
          <h6 class="collapse-header active">PO</h6><hr class="py-0 my-0">
          <hr class="py-0 my-0">
          @can("purchase-order")
                <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(3) == 'purchase-order') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/purchase-order')}}">Purchase Order</a>
          @endcan
          @can("add-purchase-order")
            <a class="collapse-item <?php if (Request::segment(3) == 'purchase-order' && Request::segment(4) == 'create') {
              echo 'active';
            } ?>" href="{{url('admin/accounts/purchase-order/create')}}"> Add Purchase Order</a>
          @endcan
        @endcanany
          @canany([
          "generate-invoices",
          "unpaid-invoices",
          "paid-invoices",
          "cheque-invoices",
          "cheque-bounce-invoices",
          "all-cancelled",
          "all-deleted"
        ])
          <!-- invoices menu start  -->
          <hr class="py-0 my-0">
          <h6 class="collapse-header active">Invoices</h6><hr class="py-0 my-0">
          <hr class="py-0 my-0">

          @can("generate-invoices")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'generate-invoices') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/generate-invoices')}}">Generate Invoices</a>
          @endcan
          @can("unpaid-invoices")
              <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'unpaid-invoices') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/unpaid-invoices')}}">Unpaid Invoices</a>
          @endcan
          @can("paid-invoices")
              <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'paid-invoices') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/paid-invoices')}}">Paid Invoices</a>
          @endcan
          @can("cheque-invoices")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'cheque-invoices') {
              echo 'active';
          } ?>" href="{{url('admin/accounts/invoices/cheque-invoices')}}">Cheque Invoices</a>
          @endcan
          @can("cheque-bounce-invoices")
              <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'cheque-bounce-invoices') {
              echo 'active';
          } ?>" href="{{url('admin/accounts/invoices/cheque-bounce-invoices')}}">Cheque Bounce Invoices</a>
          @endcan

          @can("all-cancelled")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-cancelled') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/all-cancelled')}}">Cancelled Invoices</a>
          @endcan
           @can("all-cancelled1")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-cancelled1') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/all-cancelled1')}}">Cancelled Invoices</a>
          @endcan
          @can("all-deleted")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-deleted') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/all-deleted')}}">Deleted Invoices</a>
          @endcan
           <!-- inwardpayments menu start  -->
          <hr class="py-0 my-0">
          <h6 class="collapse-header active">InWard Payments</h6><hr class="py-0 my-0">
          <hr class="py-0 my-0">
           @can("all-deleted")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-deleted') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/branch-payments')}}">Branch Payments</a>
          @endcan
            @can("all-deleted")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-deleted') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/franchise-payments')}}">Franchise Payments</a>
          @endcan
            @can("all-deleted")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-deleted') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/customer-payments')}}">Customer Payments</a>
          @endcan
           @can("all-deleted")
            <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(4) == 'all-deleted') {
                echo 'active';
            } ?>" href="{{url('admin/accounts/invoices/other-payments')}}">Other Payments</a>
          @endcan
           
           
        @endcanany


        @canany([
          "inward-cash-flow",
          "outward-cash-flow",
          "credits", 
          "gst", 
          "balance-sheet"
          ])

        <!-- invoices menu end  -->
           <hr class="py-0 my-0">
        <h6 class="collapse-header active">Accounts</h6><hr class="py-0 my-0">
   <hr class="py-0 my-0">
          @can("inward-cash-flow")
            <a class="collapse-item <?php if (count(Request::segments()) == 3 && Request::segment(2) == 'accounts' && Request::segment(3) == 'inward') {
                      echo 'active';
                  } ?>" href="{{url('admin/accounts/inward')}}">Inward Cash Flow</a>
          @endcan
          @can("credits")
                <a class="collapse-item <?php if (count(Request::segments()) == 4 && Request::segment(2) == 'accounts' && Request::segment(4) == 'credits') {
                      echo 'active';
                  } ?>" href="{{url('admin/accounts/inward/credits')}}">  -- Credits</a>
          @endcan
          @can("outward-cash-flow")
                <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(3) == 'outward') {
                      echo 'active';
                  } ?>" href="{{url('admin/accounts/outward')}}">Outward Cash Flow</a>
          @endcan
          @can("gst")
                <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(3) == 'gst') {
                      echo 'active';
                  } ?>" href="{{url('admin/accounts/gst')}}">GST</a>
          @endcan
          @can("balance-sheet")
                <a class="collapse-item <?php if (Request::segment(2) == 'accounts' && Request::segment(3) == 'balancesheet') {
                      echo 'active';
                  } ?>" href="{{url('admin/accounts/balancesheet')}}">Balance Sheet</a>
          @endcan
        @endcanany
          </div>
            </div>
        </li>
      @endcanany


                @canany([
                  "users",
                  "roles",
                  "permissions",
                ])
<?php
 $users_items = array('users', 'roles', 'permissions');
   ?>                
                    <li class="nav-item <?php if (in_array(Request::segment(2), $users_items)) {
        echo 'active';
    } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseACL" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>User Management</span>
                        </a>
                        <div id="collapseACL" class="collapse <?php if (in_array(Request::segment(2), $users_items)) {
       // echo 'show';
    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
      @can("users")
                                    <a class="collapse-item <?php if (Request::segment(2) == 'users') {
            echo 'active';
        } ?>" href="{{url('admin/users')}}">Users</a>
      @endcan
      @can("roles")
      <a class="collapse-item <?php if (Request::segment(2) == 'roles') {
            echo 'active';
        } ?>" href="{{url('admin/roles')}}">Roles</a>
      @endcan
      @can("permissions")

      <a class="collapse-item <?php if (Request::segment(2) == 'permissions') {
            echo 'active';
        } ?>" href="{{url('admin/permissions')}}">Permissions</a>
      @endcan
                            </div>
                        </div>
                    </li>
@endcanany







                @canany([
                  "vendors-suppliers",
                  "product-categories",
                  "products",
                  "fiber-laying",
                  "add-fiberproduct",
                  "fiber",
                  "add-stock",
                  "manage-stocks",
                  "transfer-stocks",
                  "stock-upload-history"
                ])
                <?php $inventory_items = array('inventory'); ?>
                <li class="nav-item <?php if (in_array(Request::segment(2), $inventory_items)) {
    echo 'active';
} ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventory" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Inventory Management</span>
                    </a>
                    <div id="collapseInventory" class="collapse <?php if (in_array(Request::segment(2), $inventory_items)) {
   // echo 'show';
} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          @can("vendors-suppliers")
                            <a class="collapse-item" href="{{url('admin/inventory/vendors-suppliers')}}">Vendors & Suppliers</a>
                          @endcan
                          @can("product-categories")
                            <a class="collapse-item" href="{{url('admin/inventory/product-categories')}}">Product Categories</a>
                          @endcan
                          @can("products")
                            <a class="collapse-item" href="{{url('admin/inventory/products')}}">Products</a>
                          @endcan
                        <?php $user = \Auth::user();
      $roles = $user->getRoleNames();
      ?>

                          
                          @can("add-fiberproduct")
                            <a class="collapse-item" href="{{url('admin/inventory/stocks/add-fiberproduct')}}">Add Fiber Product</a>
                          @endcan
                             @can("fiber")
                            <a class="collapse-item" href="{{url('admin/inventory/stocks/fiber')}}">Fiber Stock</a>
                          @endcan
                       
                          @can("add-stock")
                            <a class="collapse-item" href="{{url('admin/inventory/stocks/add-stock')}}">Add Stock</a>
                          @endcan
                          
                          @can("manage-stocks")
                            <a class="collapse-item" href="{{url('admin/inventory/stocks')}}">Manage Stocks</a>
                          @endcan
                          @can("transfer-stocks")
                            <a class="collapse-item" href="{{url('admin/inventory/stocks/transfer')}}">Transfer Stocks</a>
                          @endcan
                          @can("stock-upload-history")
                            <a class="collapse-item" href="{{url('admin/inventory/stocks/stock-upload-history')}}">Stock Upload History</a>
                          @endcan
                        </div>
                    </div>
                </li>
                @endcan
                @canany(["deposit-reports", "online-payments"])

                <li class="nav-item <?php if (in_array(Request::segment(2), array('reports'))) {
                        echo 'active';
                    } ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Reports</span>
                    </a>
                    <div id="collapseReports" class="collapse <?php if (in_array(Request::segment(2), array('reports'))) {
                        //echo 'show';
                    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          @can("deposit-reports")
                                <a class="collapse-item" href="{{url('admin/reports/deposit-reports')}}">Deposit Reports</a>
                          @endcan
                          @can("online-payments")
                                <a class="collapse-item" href="{{url('admin/reports/online-payments')}}">Online Payments</a>
                          @endcan
                          
                        </div>
                    </div>
                </li>
                @endcanany
                <?php
                 if($roles[0]=='superadmin')
      {
     ?>
   @canany(["deposit-reports", "online-payments"])

                <li class="nav-item <?php if (in_array(Request::segment(2), array('reports'))) {
                        echo 'active';
                    } ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports2" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Logs</span>
                    </a>
                    <div id="collapseReports2" class="collapse <?php if (in_array(Request::segment(2), array('reports'))) {
                        //echo 'show';
                    } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          @can("deposit-reports")
                                <a class="collapse-item" href="{{url('admin/reports/logs')}}">Logs</a>
                          @endcan

                        </div>
                    </div>
                </li>
                @endcanany
<?php } ?>







                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                     document.getElementById('left-logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>{{ __('Logout') }}
                    </a>

                    <form id="left-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                           <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
              
                            <div class="topbar-divider d-none d-sm-block"></div>

                            @if(Auth::check())
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                  @role('superadmin')
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fa fa-bars"></i>&nbsp;{{ Auth::user()->name }}</span>
                                    <i class="fas fa-user-circle fa-2x"></i>
                   
                                @else
                                <?php
                                    $user_id = Auth::user()->id;
                                    $path = asset('public/uploads/default-image.png');
                                
                                          $user1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); 
                                              $src = asset('public/uploads/employees/'.$user1->employee_photo);
                if($user1->employee_photo !='')
                {
                    $path = $src;
                }
                ?>    
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative;padding-left:50px">
                                     
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fa fa-bars"></i>&nbsp;{{ Auth::user()->name }}</span>
 <img class="fas fa-user-circle fa-2x" src="{{asset($path)}}" style="width:32px;height:32;border-radius:50%;">
                      
                                    <!--<i class="fas fa-user-circle fa-2x"></i> -->
                                @endrole

                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    @role('superadmin')
                                    <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        My Profile
                                    </a>
                                    @else
                                      <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        My Profile
                                    </a>
                                    @endrole

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endif

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        @yield('content')

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; <?php echo date('Y'); ?> SLJ Fiber Networks. All Rights Reserved. </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>








        <!-- Custom scripts for all pages-->
        <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>
        <!-- Modal -->
        <div id="changedPasswordModel" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Section: Block Content-->
                        {!! Form::open(['route' =>['franchises.change_password'],'method'=>'post','id'=>'change_password_form'])!!}
                        @csrf
                        <input type="hidden" name="userID" id="userID" value="" />
                        <input type="hidden" name="pageName" id="pageName" value="" />
						
					<!--	 <div class="form-group">
                           <label for="old_pass">old Password :</label>
							
                            <input class="form-control" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" id="oldpassword">
                        @error('oldpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

					   </div> -->
						
						

                        <div class="form-group">
                            <label for="new_pass">New Password :</label>
                            <input class="form-control" type="password" name="password" id="new_pass">
                        </div>

                        <div class="form-group">
                            <label for="confirm_pass">Confirm Password :</label>
                            <input class="form-control" type="password" name="password_confirm" id="confirm_pass">
                        </div>

                        <div class="modal-footer">
                            {!! Form::submit('Save', ['class' => 'btn btn-success', 'id'=>'change_paasword_btn', 'disabled'=>'true']) !!}
                            {!! Form::button('Cancel', ['class' => 'btn btn-danger','data-dismiss' => 'modal']) !!}
                        </div>

                        {!! Form::close() !!}
                        <!--Section: Block Content-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Start Ledger Modal -->
        
         <div id="ledgerModel" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                 <div class="modal-content"style="width: 750px;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="popupHeader">Ledger</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                         {!! Form::open(['route' =>['franchises.ledger'],'method'=>'post','id'=>'ledger_form'])!!}
                        @csrf
                      
                        <div class="row">
                            <?php
            $current_date = date('Y-m-d H:m:s a');
                        ?>
                            <div class="form-group col-md-4"> {!! Form::label('start_date', 'Starting Date*') !!}
                                {!! Form::text('start_date',null, array('class' => 'form-control ','id' => 'datepicker','required'=>'required')) !!} </div>
                            <div class="form-group col-md-4"> {!! Form::label('end_date', 'Ending Date*') !!}
                           {!! Form::text('end_date',null, array('class' => 'form-control ','id' => 'datepicker1','required'=>'required')) !!} </div>
         
                    <input type="hidden" value="" name="branchid" id="branchid">

                        </div>
                        
                        <div class="modal-footer">
                            <input type="submit" id="viewrec" name="viewrec" class="btn btn-success" value="View">
                            <input type="submit" id="viewdown" name="viewrec" class="btn btn-success" value="Download">
                            <!--
                            {!! Form::button('View', ['class' => 'btn btn-success','data-dismiss' => 'modal']) !!}
                             {!! Form::button('Download', ['class' => 'btn btn-success','data-dismiss' => 'modal']) !!}
                             -->
                        
                        </div>
  {!! Form::close() !!}
                    
                        <!--Section: Block Content
                       
                        -->
                    </div>
                </div>

            </div>
        </div>

        
        <!-- End Ledger Modal -->
        
        <!-- Start Ledger1 Modal -->
        
         <div id="ledgerModel1" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                 <div class="modal-content"style="width: 750px;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="popupHeader">Ledger</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                         {!! Form::open(['route' =>['franchises.franchledger'],'method'=>'post','id'=>'ledger_form'])!!}
                        @csrf
                      
                        <div class="row">

                        
                            <div class="form-group col-md-4"> {!! Form::label('start_date', 'Starting Date*') !!}
                                {!! Form::text('start_date',null, array('class' => 'form-control ','id' => 'datepicker2','required'=>'required')) !!} </div>
                            <div class="form-group col-md-4"> {!! Form::label('end_date', 'Ending Date*') !!}
                                {!! Form::text('end_date',null, array('class' => 'form-control ','id' => 'datepicker3','required'=>'required')) !!} </div>
                    <input type="hidden" value="" name="franchid" id="franchid">

                        </div>
                        
                        <div class="modal-footer">
                            <input type="submit" id="viewrec" name="viewrecord" class="btn btn-success" value="ViewLedger">
                            <input type="submit" id="viewdown" name="viewrecord" class="btn btn-success" value="Download-Ledger">
                            <!--
                            {!! Form::button('View', ['class' => 'btn btn-success','data-dismiss' => 'modal']) !!}
                             {!! Form::button('Download', ['class' => 'btn btn-success','data-dismiss' => 'modal']) !!}
                             -->
                        
                        </div>
  {!! Form::close() !!}
                    
                        <!--Section: Block Content
                       
                        -->
                    </div>
                </div>

            </div>
        </div>

        
        <!-- End Ledger1 Modal -->
      

        
        <!-- Deposite Modal -->
        <div id="depositeModel" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content"style="width: 750px;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="popupHeader">Deposite</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!--Section: Block Content-->
                        {!! Form::open(['route' =>['franchises.add_deposit'],'method'=>'post','id'=>'deposit_form'])!!}
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Reseller Balance"><span class="resellerName">Reseller</span> Balance</label>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">&#8377;<span id="balance">111</span></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Reseller" class="resellerName">Reseller</label>
                                <div class="h5 mb-0 font-weight-bold text-gray-800" id="franchise_branch_name">Reddypalem</div>
                                <input type="hidden" name="franchise_branch_id" id="franchise_branch_id" value="" />
                                <input type="hidden" name="name" id="franchise_branch_name_value" value="" />
                                <input type="hidden" name="pageName" id="deposit_pageName" value="" />
                                <input type="hidden" name="deposit_for" id="deposit_for" value="" />
                                
                                <input type="hidden" name="branch_id_deposit" id="branch_id_deposit" value="" />
                            
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-4"> {!! Form::label('deposit_amount', 'Deposit Amount*') !!}
                                {!! Form::text('deposit_amount',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Deposit Amount')) !!} </div>

                            <div class="form-group col-md-4"> {!! Form::label('deposit_type', 'Deposit Type*') !!}
                                {!! Form::select('deposit_type', array('Payment Gateway'=>'Payment Gateway','Cash'=>'Cash','Check'=>'Check'), null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Type --') ) !!} </div>

                            <div class="form-group col-md-4"> {!! Form::label('deposit_date', 'Date*') !!}
                                {!! Form::text('deposit_date',null, array('class' => 'form-control ','id' => 'datepicker5','required'=>'required')) !!} </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <div id="trans" style="display:none">
                                    <label for="Description">Transaction-ID</label>
                                    <input type="text" name="transid" id="transid" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="Description">Description</label>
                                <textarea class="form-control" name="deposit_desc" rows="5" id="comment"></textarea>
                                <span class="text-gray-600">Note: Please enter below 100 characters</span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            {!! Form::submit('Save', ['class' => 'btn btn-success', 'id'=>'deposit_form_btn', 'disabled'=>'true']) !!}
                            {!! Form::button('Cancel', ['class' => 'btn btn-danger','data-dismiss' => 'modal']) !!}
                        </div>

                        {!! Form::close() !!}
                        <!--Section: Block Content-->
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        
<script>
$(document).ready(function(){
   
        $('#deposit_type').on('change', function(){
        
            var optionValue =$(this).val(); 
            var branchid=$('#branch_id_deposit').val();
           // alert(optionValue);
            if(optionValue=='Payment Gateway')
            {
                $('#trans').show();
                //alert(branchid);
                $.ajax({
                type:'GET',
             url: "{{url('/admin/branches/transactions')}}/"+branchid+"/"+optionValue,
              
                success:function(html){
                    //alert(html);
                    $('#transid').val(html);
                     
                }
            }); 

            } 
            else
            {
                 $('#trans').hide();
            }
        });
});
</script>
        <div id="getMapModel" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Latitude & Longitude</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="map" style="height: 400px;">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Confirm Location</button>
                    </div>
                </div>

            </div>
        </div>
        <script type="text/javascript">
                               var map_num = 0;
                               var is_edit = 0;
                               $(document).ready(function () {
                                   var today = new Date();
                                   $("#datepicker").datetimepicker({
                                       autoclose: true,
                                        endDate: "today",
                                         maxDate: today,
                                        orientation: "top"
                                        
                                       
                                   });
                                   $("#datepicker1").datetimepicker({
                                        autoclose: true,
                                        endDate: "today",
                                         maxDate: today,
                                        orientation: "top"
                                        
                                   });
                                  $("#datepicker2").datetimepicker({
                                      autoclose: true,
                                        endDate: "today",
                                         maxDate: today,
                                        orientation: "top"
                                        
                                  });
                                  $("#datepicker3").datetimepicker({
                                      autoclose: true,
                                        endDate: "today",
                                         maxDate: today,
                                        orientation: "top"
                                        
                                  });
                                  $("#datepicker5").datetimepicker({
                                      autoclose: true,
                                        endDate: "today",
                                         maxDate: today,
                                        orientation: "top"
                                        
                                  });
                                  
                                   $('#create_form').on('keyup blur click', function () {
                                       var isForm = $(this).validate({
                                           rules: {
                                               city: {"required": true},
                                               distributor: {"required": true},
                                               branch: {"required": true},
                                               franchise_name: {"required": true},
                                               email: {
                                                   required: true,
                                                   email: true,
                                                   remote: {
                                                       url: "{{url('admin/franchises/emailchecking')}}",
                                                       type: "post",
                                                       data: {
                                                           email: function () {
                                                               return $("#email").val();
                                                           }
                                                       },
                                                       headers: {
                                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                       }
                                                   }
                                               },
                                               password: {
                                                   required: true,
                                                   minlength: 8
                                               },
                                               aadhar: {
                                                   required: true,
                                                   maxlength: 12
                                               }
                                           }
                                       }).checkForm();
                                       if (isForm) {
                                           $('#create_form_btn').attr('disabled', false);
                                       } else {
                                           $('#create_form_btn').attr('disabled', true);
                                       }
                                   });
                                       $(document).on('click', '.utility-branch', function () {
                                    var rid = $(this).attr('rId');
                                       $('#utilitybranch').val(rid);
                                      // alert('welcome');
                                       $('#BranchModel').modal('show');

                                   });

                                   $('#edit_form').on('keyup blur click', function () {
                                       var isForm = $(this).validate({
                                           rules: {
                                               city: {"required": true},
                                               distributor: {"required": true},
                                               branch: {"required": true},
                                               branch_name: {"required": true},

                                           }
                                       }).checkForm();
                                       if (isForm) {
                                           $('#edit_form_btn').attr('disabled', false);
                                       } else {
                                           $('#edit_form_btn').attr('disabled', true);
                                       }

                                   });

                                   //$('.getMap').on('click', function(){
                                   $(document).on('click', '.getMap', function () {

                                       map_num = $(this).attr('map_num');
                                       initMap();
                                       $('#getMapModel').modal('show');
                                       getCurrentLocation();
                                   });
                                   $('.change_pwd').on('click', function () {
                                       var uid = $(this).attr('userId');
                                       var pageName = $(this).attr('pageName');
                                       $('#userID').val(uid);
                                       $('#pageName').val(pageName);
                                       $('#changedPasswordModel').modal('show');
                                   });

                                   $('#change_password_form').on('keyup blur click', function () {
                                       var isForm = $(this).validate({
                                           rules: {
                                               password: {
                                                   minlength: 8
                                               },
                                               password_confirm: {
                                                   minlength: 8,
                                                   equalTo: "#new_pass"
                                               }
                                           }
                                       }).checkForm();
                                       if (isForm) {
                                           $('#change_paasword_btn').attr('disabled', false);
                                       } else {
                                           $('#change_paasword_btn').attr('disabled', true);
                                       }

                                   });

                                   $('.deposit_form').on('click', function () {
                                       var rid = $(this).attr('rId');
                                    
                                       var pageName = $(this).attr('pageName');
                                       var popupHeader = $(this).attr('popupHeader');
                                       var record_name = $(this).attr('record_name');
                                       var record_balance = $(this).attr('record_balance');
                                       if (pageName == 'branches') {
                                           $('.resellerName').text('Branch');
                                           $('#deposit_for').val(2);
                                       } else {
                                           $('.resellerName').text('Frachise');
                                           $('#deposit_for').val(1);
                                       }
                                       $('#franchise_branch_id').val(rid);
                                       $('#branch_id_deposit').val(rid);
                                       
                                       $('#franchise_branch_name_value').val(record_name);
                                       $('#franchise_branch_name').text(record_name);
                                       $('#deposit_pageName').val(pageName);
                                       $('#popupHeader').text(popupHeader);
                                       $('#balance').text(record_balance);
                                       $('#depositeModel').modal('show');

                                   });
                                   $('.ledger-from').on('click', function () {
                                        var rid = $(this).attr('rId');
                                       $('#branchid').val(rid);
                                       $('#ledgerModel').modal('show');

                                   });
                                   $('.franchledger-form').on('click', function () {
                                        var rid = $(this).attr('rId');
                                       $('#franchid').val(rid);
                                       $('#ledgerModel1').modal('show');

                                   });



                                   $('#deposit_form').on('keyup blur click', function () {
                                       var isForm = $(this).validate({
                                           rules: {

                                           }
                                       }).checkForm();
                                       if (isForm) {
                                           $('#deposit_form_btn').attr('disabled', false);
                                       } else {
                                           $('#deposit_form_btn').attr('disabled', true);
                                       }

                                   });



                               });
        </script>
        
        <script>
       $('.navbar-nav li a').on('click', function(e){
     $("ul", this).collapse('hide');
});



        </script>
    </body>

</html>
