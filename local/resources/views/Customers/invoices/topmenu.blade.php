<nav class="navbar navbar-expand-sm bg-light navbar-light py-0 pt-0 pl-0">
<?php 
    //$roles = Auth::user()->getRoleNames(); 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    $permissions = $user->getPermissionsViaRoles();

    $permissionsdata = array();
    foreach($permissions as $permission){
        $permissionsdata[] =  $permission->name;   
    }
    //print_r($permissionsdata);

    $renew_user_items = array('renew-user'); 
  ?> 
<ul class="nav nav-tabs pl-0">
<?php if(in_array("renew-user", $permissionsdata)){ ?>
  <li class="nav-item">
    <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == ''){echo 'active';} ?>" href="{{url('admin/customers/renewal-unpaid-invoices')}}">UnPaid Invoices</a>
  </li>
<li class="nav-item">
<a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == ''){echo 'active';} ?>" href="{{url('admin/customers/renewal-paid-invoices')}}">Paid Invoices</a>
    </li>
    <?php } ?>
  <?php if(in_array("renew-user", $permissionsdata)){ ?>
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'purchase-order'){echo 'active';} ?>" href="{{url('admin/customers/renew-user-invoices/cheque-invoices')}}">Cheque Invoices</a>
      </li>
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(3) == 'purchase-order' && Request::segment(4) == 'create'){echo 'active';} ?>" href="{{url('admin/customers/renew-user-invoices/cheque-bounce-invoices')}}">Cheque Bounce Invoices</a>
      </li>
    <li class="nav-item">
    <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'inward'){echo 'active';} ?>" href="{{url('admin/customers/renew-user-invoices/all-cancelled')}}">Cancelled Invoices</a>
      </li>
    <li class="nav-item">
    <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'outward'){echo 'active';} ?>" href="{{url('admin/customers/renew-user-invoices/all-deleted')}}">Deleted Invoices</a>  
      </li>
    <?php } ?>
  </ul>
</nav>