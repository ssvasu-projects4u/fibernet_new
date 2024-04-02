<div class="card-header my-0 py-0 pl-0">
<nav class="toptabs navbar navbar-expand-sm bg-light navbar-light py-0  pl-0">

@canany(["users","roles","permissions"])
  <ul class="nav nav-tabs my-0 pl-0">
  
  @can("users")
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'users'){echo 'active';} ?>" data-toggle="dropdown" href="#">Users</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{url('admin/users')}}">List Users</a>
      </div>
    </li>
  @endcan

  @canany(["roles", "create-role"])
    <li class="nav-item dropdown">
      @can("roles")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'roles'){echo 'active';} ?>" data-toggle="dropdown" href="#">Roles</a>
      @endcan
      <div class="dropdown-menu">
        @can("create-role")
          <a class="dropdown-item" href="{{url('admin/roles/create')}}">Create Role</a>
        @endcan
        @can("roles")
          <a class="dropdown-item" href="{{url('admin/roles')}}">List Roles</a>
        @endcan
      </div>
    </li>
  @endcanany
  @canany(["permissions", "create-permission"])
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'permissions'){echo 'active';} ?>" data-toggle="dropdown" href="#">Permissions</a>
      <div class="dropdown-menu">
        @can("create-permission")
          <a class="dropdown-item" href="{{url('admin/permissions/create')}}">Create Permission</a>
        @endcan
        @can("permissions")
          <a class="dropdown-item" href="{{url('admin/permissions')}}">List Permissions</a>
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

@if(Request::segment(2) == 'users')
  @can("users")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/users')}}">List Users</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'roles')
  @can("create-role")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/roles/create')}}">Create Role</a></li>
  @endcan
  @can("roles")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/roles')}}">List Roles</a></li>
  @endcan
@endif

@if(Request::segment(2) == 'permissions')
  @can("create-permission")
    <li class="nav-item"><a class="nav-link active" href="{{url('admin/permissions/create')}}">Create Permission</a></li>
  @endcan
  @can("permissions")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/permissions')}}">List Permissions</a></li>
  @endcan
@endif


</ul>
</nav>
</div>