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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
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
	.bottom-submenu .nav-item .nav-link{color:#e3e3e3;font-size: 12px;}
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

  </style>
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/')}}" style="background-color:#fff;">
        <div class="sidebar-brand-text mx-3">
			<img src="{{ asset('assets/img/logo.png')}}" class="img-fluid rounded">
			<br><span class="badge badge-success"><small><?php $roles = Auth::user()->getRoleNames(); echo $roles[0]; ?></small></span>
		</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('distributor/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('distributor/profile')}}">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>My Profile</span></a>
      </li>
      <?php $customers_items = array('customers'); ?>	
	  <li class="nav-item <?php if(in_array(Request::segment(2), $customers_items)){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Customers</span>
        </a>
        <div id="collapseCustomers" class="collapse <?php if(in_array(Request::segment(2), $customers_items)){echo 'show';} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == ''){echo 'active';} ?>" href="{{url('distributor/customers')}}">All Customers</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'new'){echo 'active';} ?>" href="{{url('distributor/customers/new')}}">New Customers</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'technical'){echo 'active';} ?>" href="{{url('distributor/customers/technical')}}">Add Technical</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'schedule'){echo 'active';} ?>" href="{{url('distributor/customers/schedule')}}">Scheduled Customers</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'activation'){echo 'active';} ?>" href="{{url('distributor/customers/activation')}}">Activate Customers</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'active'){echo 'active';} ?>" href="{{url('distributor/customers/active')}}">Active Customers</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'expired'){echo 'active';} ?>" href="{{url('distributor/customers/expired')}}">Expired Customers</a>
		  <a class="collapse-item <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'closed'){echo 'active';} ?>" href="{{url('distributor/customers/closed')}}">Disconnections</a>
		  </div>
        </div>
      </li>
      
      <?php $complaints_items = array('complaints'); ?>	
	  <li class="nav-item <?php if(in_array(Request::segment(2), $complaints_items)){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComplaints" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Complaints</span>
        </a>
        <div id="collapseComplaints" class="collapse <?php if(in_array(Request::segment(2), $complaints_items)){echo 'show';} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == ''){echo 'active';} ?>" href="{{url('distributor/complaints')}}">All Complaints</a>
			<a class="collapse-item <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'open'){echo 'active';} ?>" href="{{url('distributor/complaints/open')}}">Open Complaints</a>
			<a class="collapse-item <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'inprogress'){echo 'active';} ?>" href="{{url('distributor/complaints/inprogress')}}">In Progress Complaints</a>
			<a class="collapse-item <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'resolved'){echo 'active';} ?>" href="{{url('distributor/complaints/resolved')}}">Resolved Complaints</a>
			<a class="collapse-item <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'closed'){echo 'active';} ?>" href="{{url('distributor/complaints/closed')}}">Closed Complaints</a>
          </div>
        </div>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="far fa-credit-card"></i>
          <span>Revenue Share</span></a>
      </li>
       
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
            <li class="nav-item dropdown">
              <a class="nav-link" href="{{ url('/')}}">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-external-link-alt"></i>&nbsp;Back to Site</span>
                
              </a>
            </li>  
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fa fa-bars"></i>&nbsp;Hi, {{ Auth::user()->name }}</span>
                <i class="fas fa-user-circle fa-2x"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ url('distributor/dashboard')}}">
                <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Dashboard
                </a>
                <a class="dropdown-item" href="{{ url('distributor/profile') }}">
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

</body>

</html>
