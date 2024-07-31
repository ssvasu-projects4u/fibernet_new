<div class="card-header my-0 py-0 pl-0">
<nav class="toptabs navbar navbar-expand-sm bg-light navbar-light py-0  pl-0">

@canany(
  [
    "departments",
    "create-department",
    "designations",
    "create-designation",
    "employees",
    "create-employee",
    "state",
    "create-state",
    "city",
    "create-city",
    "distributors",
    "create-distributor",
	"subdistributors",
    "create-subdistributor",
    "branches",
    "create-branch",
    "franchises",
    "create-franchise"
  ]
)

<ul class="nav nav-tabs my-0 pl-0">
  @canany(
    [
      "departments",
      "create-department"
    ]
  )
  <li class="nav-item dropdown">
    @can("departments")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'departments'){echo 'active';} ?>" data-toggle="dropdown" href="#">Departments</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-department")
        <a class="dropdown-item" href="{{url('admin/departments/create')}}">Create Department</a>
      @endcan
      @can("departments")
        <a class="dropdown-item" href="{{url('admin/departments')}}">List Departments</a>
      @endcan
    </div>
  </li>
  @endcanany


  @canany(
    [
      "designations",
      "create-designation"
    ]
  )
  <li class="nav-item dropdown">
    @can("designations")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'designations'){echo 'active';} ?>" data-toggle="dropdown" href="#">Designations</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-designation")
        <a class="dropdown-item" href="{{url('admin/designations/create')}}">Create Designation</a>
      @endcan
      @can("designations")
        <a class="dropdown-item" href="{{url('admin/designations')}}">List Designations</a>
      @endcan
    </div>
  </li>
  @endcanany

  @canany(
    [
      "employees",
      "create-employee"
    ]
  )
  <li class="nav-item dropdown">
    @can("employees")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'employees'){echo 'active';} ?>" data-toggle="dropdown" href="#">Employees</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-employee")
        <a class="dropdown-item" href="{{url('admin/employees/create')}}">Create Employee</a>
      @endcan
      @can("employees")
      <a class="dropdown-item" href="{{url('admin/employees')}}">List Employees</a>
      @endcan
    </div>
  </li>
  @endcanany

  @canany(
    [
      "state",
      "create-state",
    ]
  )
    <li class="nav-item dropdown">
      @can("state")
        <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'state'){echo 'active';} ?>" data-toggle="dropdown" href="#">State</a>
      @endcan 
      <div class="dropdown-menu">
        @can("create-state")
          <a class="dropdown-item" href="{{url('admin/state/create')}}">Create State</a>
        @endcan
        @can("state")
          <a class="dropdown-item" href="{{url('admin/state')}}">List States</a>
        @endcan
      </div>
    </li>
  @endcanany

  @canany(
    [
      "city",
      "create-city",
    ]
  )
    <li class="nav-item dropdown">
      @can("city")
        <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'city'){echo 'active';} ?>" data-toggle="dropdown" href="#">City</a>
      @endcan 
      <div class="dropdown-menu">
        @can("create-city")
          <a class="dropdown-item" href="{{url('admin/city/create')}}">Create City</a>
        @endcan
        @can("city")
          <a class="dropdown-item" href="{{url('admin/city')}}">List Cities</a>
        @endcan
      </div>
    </li>
  @endcanany
  
  @canany([
    "distributors",
    "create-distributor"
  ])
    <li class="nav-item dropdown">
      @can("distributors")
        <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'distributors'){echo 'active';} ?>" data-toggle="dropdown" href="#">Distributors</a>
      @endcan
      <div class="dropdown-menu">
        @can("create-distributor")
          <a class="dropdown-item" href="{{url('admin/distributors/create')}}">Create Distributor</a>
        @endcan
        @can("distributors")
        <a class="dropdown-item" href="{{url('admin/distributors')}}">List Distributors</a>
        @endcan
      </div>
    </li>
  @endcanany
  
  
    @canany([
    "subdistributors",
    "create-subdistributor"
  ])
    <li class="nav-item dropdown">
      @can("subdistributors")
        <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'subdistributors'){echo 'active';} ?>" data-toggle="dropdown" href="#">Sub Distributors</a>
      @endcan
      <div class="dropdown-menu">
      
          <a class="dropdown-item" href="{{url('admin/subdistributors/create')}}">Create SubDistributor</a>
        
        @can("subdistributors")
        <a class="dropdown-item" href="{{url('admin/subdistributors')}}">List SubDistributors</a>
        @endcan
      </div>
    </li>
  @endcanany

  @canany([
    "branches",
    "create-branch"
  ])
    <li class="nav-item dropdown">
      @can("branches")
        <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'branches'){echo 'active';} ?>" data-toggle="dropdown" href="#">Branches</a>
      @endcan
      <div class="dropdown-menu">
        @can("create-branch")
          <a class="dropdown-item" href="{{url('admin/branches/create')}}">Create Branch</a>
        @endcan
        @can("branches")
        <a class="dropdown-item" href="{{url('admin/branches')}}">List Branches</a>
        @endcan
      </div>
    </li>
  @endcanany

    @canany(
      [
        "franchises",
        "create-franchise"
      ]
    )
    <li class="nav-item dropdown">
      @can("franchises")
        <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'franchises'){echo 'active';} ?>" data-toggle="dropdown" href="#">Franchises</a>
      @endcan    
      <div class="dropdown-menu">
        @can("create-franchise")
          <a class="dropdown-item" href="{{url('admin/franchises/create')}}">Create Franchise</a>
        @endcan
        @can("franchises")
          <a class="dropdown-item" href="{{url('admin/franchises')}}">List Franchises</a>
        @endcan  
      </div>
    </li>
  @endcanany

  </ul>
@endcanany

</nav>
</div>

<div class="card-header bottom-submenu my-0 py-0 pl-0 pt-0 pr-2">
<nav class="navbar py-0">
<ul class="nav">

@if(Request::segment(2) == 'state')
  @can("create-state")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/state/create')}}">Create State</a></li>
  @endcan
  @can("state")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/state')}}">List States</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'city')
  @can("create-city")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/city/create')}}">Create City</a></li>
  @endcan
  @can("city")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/city')}}">List Cities</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'departments')
  @can("create-department")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/departments/create')}}">Create Department</a></li>
  @endcan
  @can("departments")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/departments')}}">List Departments</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'designations')
  @can("create-designation")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/designations/create')}}">Create Designation</a></li>
  @endcan
  @can("designations")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/designations')}}">List Designations</a></li>
  @endcan

@endif

@if(Request::segment(2) == 'distributors')
  @can("create-distributor")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/distributors/create')}}">Create Distributor</a></li>
  @endcan
  @can("distributors")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/distributors')}}">List Distributors</a> </li>
  @endcan
@endif

@if(Request::segment(2) == 'branches')
  @can("create-branch")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/branches/create')}}">Create Branch</a></li>
  @endcan
  @can("branches")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/branches')}}">List Branches</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'franchises')
  @can("create-franchise")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/franchises/create')}}">Create Franchise</a></li>
  @endcan
  @can("franchises")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/franchises')}}">List Franchises</a>   </li> 
  @endcan
@endif

@if(Request::segment(2) == 'employees')
  @can("create-employee")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/employees/create')}}">Create Employee</a></li>
  @endcan
  @can("employees")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/employees')}}">List Employees</a></li>
  @endcan
@endif
</ul>
</nav>
</div>