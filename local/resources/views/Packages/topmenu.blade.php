<div class="card-header my-0 py-0 pl-0">
<nav class="toptabs navbar navbar-expand-sm bg-light navbar-light py-0  pl-0">

  <ul class="nav nav-tabs my-0 pl-0">

@canany([
  "connection-types",
  "create-connection-type"
])
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'connection-types'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/connection-types')}}">Connection Types</a>
    <div class="dropdown-menu">
      @can("create-connection-type")
        <a class="dropdown-item" href="{{url('admin/connection-types/create')}}">Create Connection Type</a>
      @endcan
      @can("connection-types")
        <a class="dropdown-item" href="{{url('admin/connection-types')}}">List Connection Types</a>
      @endcan
    </div>
  </li>
@endcanany

@canany([
  "broadband-packages",
  "create-broadband-package",
  "broadband-sub-plans",
])
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'broadband-packages' || Request::segment(2) == 'broadband-sub-packages'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/broadband-packages')}}">Broadband</a>

    <div class="dropdown-menu">

      @can("create-broadband-package")
        <a class="dropdown-item" href="{{url('admin/broadband-packages/create')}}">Create Broadband Package</a>
      @endcan

      @can("broadband-packages")
        <a class="dropdown-item" href="{{url('admin/broadband-packages')}}">List Broadband Packages</a>
      @endcan

      @can("broadband-sub-plans")
        <a class="dropdown-item" href="{{url('admin/broadband-sub-packages')}}">List Broadband Sub Plans</a>
      @endcan

    </div>

  </li>
@endcanany

@canany([
  "iptv-base",
  "iptv-local",
  "iptv-allacart",
  "iptv-packages",
])
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'iptv'){echo 'active';} ?>" data-toggle="dropdown" href="#"> IPTV </a>
    <div class="dropdown-menu">
        @can("iptv-base")
          <a class="dropdown-item" href="{{url('admin/iptv/base')}}"> Base (FTA) </a>
        @endcan
        @can("iptv-local")
          <a class="dropdown-item" href="{{url('admin/iptv/local')}}"> Local</a>
        @endcan
        @can("iptv-allacart")
          <a class="dropdown-item" href="{{url('admin/iptv/allacart')}}"> Allacart</a>
        @endcan
        @can("iptv-packages")
          <a class="dropdown-item" href="{{url('admin/iptv/packages')}}">Packages</a>
        @endcan
    </div>
  </li>
@endcanany

@canany([
  "cable-packages",
  "cable-base",
  "cable-local",
  "cable-allacart",
])
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'cable-packages'){echo 'active';} ?>" data-toggle="dropdown" href="#"> Cable </a>
    <div class="dropdown-menu">
      @can("cable-base")
        <a class="dropdown-item" href="{{url('admin/cable-packages/base')}}"> Base (FTA) </a>
      @endcan
      @can("cable-local")
        <a class="dropdown-item" href="{{url('admin/cable-packages/local')}}"> Local</a>
      @endcan
      @can("cable-allacart")
        <a class="dropdown-item" href="{{url('admin/cable-packages/allacart')}}"> Allacart</a>
      @endcan
      @can("cable-packages")
        <a class="dropdown-item" href="{{url('admin/cable-packages/packages')}}">Cable Packages</a>
      @endcan
    </div>
  </li>
@endcanany

@canany([
  "combo-packages",
  "create-combo-package",
  "combo-sub-plans",
])
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'combo-packages'){echo 'active';} ?>" data-toggle="dropdown" href="#">Combo</a>
    <div class="dropdown-menu">
      @can("create-combo-package")
        <a class="dropdown-item" href="{{url('/admin/combo-packages/create')}}">Create Combo Package</a>
      @endcan
      @can("combo-packages")
        <a class="dropdown-item" href="{{url('/admin/combo-packages')}}">List Combo  Packages</a>
      @endcan
      @can("combo-sub-plans")
        <a class="dropdown-item" href="{{url('admin/combo-sub-packages')}}">List Combo Sub Plans</a>
      @endcan
    </div>
  </li>
@endcanany
  </ul>

</nav>
</div>

<div class="card-header bottom-submenu my-0 py-0 pl-0 pt-0 pr-2">
<nav class="navbar py-0">
<ul class="nav">

@if(Request::segment(2) == 'broadband-packages')
  @can("create-broadband-package")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/broadband-packages/create')}}">Create Broadband Package</a></li>
  @endcan
  @can("broadband-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/broadband-packages')}}"> Broadband Packages</a></li>
    <li class="nav-item py-1 text-white"> | </li>
  @endcan

  @if(Request::segment(2) == 'broadband-packages' && Request::segment(3) == 'edit')
    @can("create-broadband-sub-plan")
      <li class="nav-item"><a class="nav-link active" href="{{url('admin/broadband-sub-packages/'.Request::segment(4).'/create')}}">Create Sub Plan</a></li>
    @endcan
    @can("create-broadband-package")
      <li class="nav-item"><a class="nav-link active" href="{{url('admin/broadband-packages/edit/'.Request::segment(4).'#package_subplans')}}">Current Package Sub Plans</a></li>
    @endcan
  @endif

  <li class="nav-item"><a class="nav-link" href="{{url('admin/broadband-sub-packages')}}">Broadband Sub Plans</a></li>

@endif

@if(Request::segment(2) == 'broadband-sub-packages')
  @can("broadband-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/broadband-packages')}}"> Broadband Packages</a></li>
    <li class="nav-item py-1 text-white"> | </li>
  @endcan
  @can("broadband-sub-plans")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/broadband-sub-packages')}}">Broadband Sub Plans</a></li>
  @endcan
@endif


@if(Request::segment(2) == 'combo-packages')
  @can("create-combo-package")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/combo-packages/create')}}">Create Combo Package</a></li>
  @endcan
  @can("combo-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/combo-packages')}}"> Combo Packages</a></li>
    <li class="nav-item py-1 text-white"> | </li>
  @endcan
  @if(Request::segment(2) == 'combo-packages' && Request::segment(3) == 'edit')
    @can("create-combo-sub-plans")
      <li class="nav-item"><a class="nav-link active" href="{{url('admin/combo-sub-packages/'.Request::segment(4).'/create')}}">Create Sub Plan</a></li>
    @endcan
    @can("combo-current-package-sub-plans")
      <li class="nav-item"><a class="nav-link active" href="{{url('admin/combo-packages/edit/'.Request::segment(4).'#package_subplans')}}">Current Package Sub Plans</a></li>
    @endcan
  @endif
  @can("combo-sub-plans")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/combo-sub-packages')}}">Combo Sub Plans</a></li>
  @endcan

@endif

@if(Request::segment(2) == 'combo-sub-packages')
  @can("combo-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/combo-packages')}}"> Combo Packages</a></li>
    <li class="nav-item py-1 text-white"> | </li>
  @endcan
  @can("combo-sub-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/combo-sub-packages')}}">Combo Sub Plans</a></li>
  @endcan
@endif


@if(Request::segment(2) == 'iptv' && Request::segment(3) == 'base')
  @can("iptv-base-create")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/iptv/base/create')}}">Create Base(FTA)</a></li>
  @endcan
  @can("iptv-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("iptv-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/local')}}">List Local</a></li>
  @endcan
  @can("iptv-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/allacart')}}">List Allacart</a></li>
  @endcan
  @can("iptv-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/packages')}}">List Packages</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'iptv' && Request::segment(3) == 'packages')
  @can("iptv-package-create")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/iptv/packages/create')}}">Create Package</a></li>
  @endcan
  @can("iptv-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/packages')}}">List Packages</a></li>
  @endcan
  @can("iptv-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("iptv-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/local')}}">List Local</a></li>
  @endcan
  @can("iptv-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/allacart')}}">List Allacart</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'iptv' && Request::segment(3) == 'local')
  @can("iptv-local-create")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/local/create')}}">Create Local</a></li>
  @endcan
  @can("iptv-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/local')}}">List Local</a></li>
  @endcan
  @can("iptv-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("iptv-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/allacart')}}">List Allacart</a></li>
  @endcan
  @can("iptv-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/packages')}}">List Packages</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'iptv' && Request::segment(3) == 'allacart')
  @can("iptv-allacart-create")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/iptv/allacart/create')}}">Create Allacart</a></li>
  @endcan
  @can("iptv-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/allacart')}}">List Allacart</a></li>
  @endcan
  @can("iptv-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("iptv-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/local')}}">List Local</a></li>
  @endcan
  @can("iptv-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/iptv/packages')}}">List Packages</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'cable-packages' && Request::segment(3) == 'base')
  @can("cable-base-create")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/cable-packages/base/create')}}">Create Cable Base(FTA)</a></li>
  @endcan
  @can("cable-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("cable-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/allacart')}}">List Allacart</a></li>
  @endcan
  @can("cable-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/local')}}">List Local</a></li>
  @endcan
  @can("cable-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/packages')}}">List Packages</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'cable-packages' && Request::segment(3) == 'packages')
  @can("cable-package-create")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/cable-packages/packages/create')}}">Create Cable Package</a></li>
  @endcan
  @can("cable-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/packages')}}">List Cable Packages</a></li>
  @endcan
  @can("cable-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/allacart')}}">List Allacart</a></li>
  @endcan
  @can("cable-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("cable-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/local')}}">List Local</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'cable-packages' && Request::segment(3) == 'local')
  @can("cable-local-create")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/local/create')}}">Create Cable Local</a></li>
  @endcan
  @can("cable-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/local')}}">List Cable Local</a></li>
  @endcan
  @can("cable-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/allacart')}}">List Allacart</a></li>
  @endcan
  @can("cable-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("cable-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/packages')}}">List Packages</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'cable-packages' && Request::segment(3) == 'allacart')
  @can("cable-allacart-create")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/cable-packages/allacart/create')}}">Create Allacart</a></li>
  @endcan
  @can("cable-allacart")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/allacart')}}">List Allacart</a></li>
  @endcan
  @can("cable-base")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/base')}}">List Base(FTA)</a></li>
  @endcan
  @can("cable-local")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/local')}}">List Local</a></li>
  @endcan
  @can("cable-packages")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/cable-packages/packages')}}">List Packages</a></li>
  @endcan
@endif

</ul>
</nav>
</div>