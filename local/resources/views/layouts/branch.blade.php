<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SLJ Fiber Works') }} - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        #content .container-fluid {
            padding: 0 0.5rem;
        }

        .sidebar .nav-item .nav-link {
            padding: 0.5rem;
        }

        .toptabs li a.nav-link {
            font-size: 16px;
            margin: 5px 0 0 0;
            padding: .5rem .75rem;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #e74a3b;
            border-color: #dddfeb #dddfeb #fff;
        }

        table.table td, table.table th {
            padding: .4rem;
        }

        .nav-tabs .nav-item {
            margin-bottom: -2px;
        }

        .bottom-submenu {
            background-color: #e74a3b
        }

        .bottom-submenu .nav-item .nav-link {
            color: #e3e3e3;
            font-size: 12px;
        }

        .bottom-submenu .nav-item .nav-link {
            color: #f8f9fc;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px;
            padding: 0px 4px;
            background-color: #4e73df;
        }

        .bottom-submenu .nav-item.active .nav-link {
            text-decoration: underline;
            color: #fff;
        }

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

        form .form-group label {
            color: #808094;
            font-weight: bold;
        }

    </style>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/map_js_file.js')}}"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}">
    </script>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <?php
    //$roles = Auth::user()->getRoleNames();
    $user = Auth::user();
    $roles = $user->getRoleNames();
    $permissions = $user->getPermissionsViaRoles();

    $permissionsdata = array();
    foreach ($permissions as $permission) {
        $permissionsdata[] = $permission->name;
    }

    ?>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/')}}"
           style="background-color:#fff;">
            <div class="sidebar-brand-text mx-3">
                <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid rounded">
                <br><span class="badge badge-success"><small><?php $roles = Auth::user()->getRoleNames();
                        echo $roles[0]; ?></small></span>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('branch/dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url('branch/profile')}}">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>My Profile</span></a>
        </li>


        <?php $customers_items = array('customers'); ?>
        <li class="nav-item <?php if (in_array(Request::segment(2), $customers_items)) {
            echo 'active';
        } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Customers</span>
            </a>
            <div id="collapseCustomers" class="collapse <?php if (in_array(Request::segment(2), $customers_items)) {
                echo 'show';
            } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  @can("add-customer-application")
                        <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'create') {
                            echo 'active';
                        } ?>" href="{{url('admin/customers/create')}}">Add Customer Application</a>
                  @endcan
                  @can("add-customer-application")
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == '') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers')}}">All Customers</a>
                  @endcan
                    
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'new') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/new')}}">New Customers</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'technical') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/technical')}}">Add Technical</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'schedule') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/schedule')}}">Scheduled Customers</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'activation') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/activation')}}">Activate Customers</a>
                  <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'smartboxusers') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/smartboxusers')}}">Smartbox Added Users</a>
                
				
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'active') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/active')}}">Active Customers</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'expired') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/expired')}}">Expired Customers</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'customers' && Request::segment(3) == 'closed') {
                        echo 'active';
                    } ?>" href="{{url('branch/customers/closed')}}">Disconnections</a>
                
                </div>
            </div>
        </li>


        <?php $complaints_items = array('complaints'); ?>
        <li class="nav-item <?php if (in_array(Request::segment(2), $complaints_items)) {
            echo 'active';
        } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComplaints"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Complaints</span>
            </a>
            <div id="collapseComplaints" class="collapse <?php if (in_array(Request::segment(2), $complaints_items)) {
                echo 'show';
            } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
               
                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == '') {
                        echo 'active';
                    } ?>" href="{{url('branch/complaints')}}">All Complaints</a>
               
                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'open') {
                        echo 'active';
                    } ?>" href="{{url('branch/complaints/open')}}">Open Complaints</a>
               
                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'inprogress') {
                        echo 'active';
                    } ?>" href="{{url('branch/complaints/inprogress')}}">In Progress Complaints</a>
               
                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'resolved') {
                        echo 'active';
                    } ?>" href="{{url('branch/complaints/resolved')}}">Resolved Complaints</a>
               
                    <a class="collapse-item <?php if (Request::segment(2) == 'complaints' && Request::segment(3) == 'closed') {
                        echo 'active';
                    } ?>" href="{{url('branch/complaints/closed')}}">Closed Complaints</a>
               
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-credit-card"></i>
                <span>Balance</span></a>
        </li>



@canany(
  [
    'olt',
    'edfa',
    'fiber-laying',
    'dpd',
    'dp',
    'fh'
  ]
)
        <?php
            $technical_items = array('olt', 'edfa', 'fiber-laying', 'dpd', 'dp', 'fh');
            ?>

            <li class="nav-item <?php if (in_array(Request::segment(2), $technical_items)) {
                echo 'active';
            } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Technical</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if (in_array(Request::segment(2), $technical_items)) {
                    echo 'show';
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
          
        <?php $customers_items = array('reports'); ?>
        <li class="nav-item <?php if (in_array(Request::segment(2), $customers_items)) {
            echo 'active';
        } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayments"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Accounts</span>
            </a>
            <div id="collapsePayments" class="collapse <?php if (in_array(Request::segment(2), $customers_items)) {
                echo 'show';
            } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                
                    
                    <a class="collapse-item <?php if (Request::segment(2) == 'reports' && Request::segment(3) == 'newb') {
                        echo 'active';
                    } ?>" href="{{url('admin/reports/newb')}}">Branch Deposits</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'reports' && Request::segment(3) == 'cuspay') {
                        echo 'active';
                    } ?>" href="{{url('admin/reports/cuspay')}}">Customer Payments</a>
                
                    <a class="collapse-item <?php if (Request::segment(2) == 'reports' && Request::segment(3) == 'bledger') {
                        echo 'active';
                    } ?>" href="{{url('admin/reports/bledger')}}">Ledger</a>
                
                    
                </div>
            </div>
        </li>




    @canany([
      'deposit-reports',
      'online-payments'
    ])
                <li class="nav-item <?php if (in_array(Request::segment(2), array('reports'))) {
    echo 'active';
} ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Reports</span>
                    </a>
                    <div id="collapseReports" class="collapse <?php if (in_array(Request::segment(2), array('reports'))) {
    echo 'show';
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




        <!-- Divider -->


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
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
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
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/')}}">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i
                                    class="fas fa-external-link-alt"></i>&nbsp;Back to Site</span>

                        </a>
                    </li>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fa fa-bars"></i>&nbsp;Hi, {{ Auth::user()->name }}</span>
                            <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ url('branch/dashboard')}}">
                                <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ url('branch/profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                            </a>

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
                    <span>Copyright &copy; SLJ Fiber Networks <?php echo date('Y'); ?></span>
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


<!-- Bootstrap core JavaScript-->

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>
<!-- Modal -->
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
        $(document).on('click', '.getMap', function () {
            map_num = $(this).attr('map_num');
            initMap();
            $('#getMapModel').modal('show');
            getCurrentLocation();
        });
    });
</script>
</body>

</html>
