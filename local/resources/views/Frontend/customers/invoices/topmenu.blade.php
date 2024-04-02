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

    $accounts_items = array('payment-types','purchase-order','add-purchase-order','inward-cash-flow','outward-cash-flow','gst','balance-sheet'); 
  ?>  
<ul class="nav nav-tabs pl-0">
<?php if(in_array("payment-types", $permissionsdata)){ ?>     
<li class="nav-item">
<a class="nav-link <?php if(Request::segment(2) == 'accounts' && Request::segment(3) == 'paymenttype'){echo 'active';} ?>" href="{{url('admin/accounts/paymenttype')}}">Payment Types</a>
    </li>
    <?php } ?>
          <?php if(in_array("purchase-order", $permissionsdata)){ ?>  
	<li class="nav-item">
  <a class="nav-link <?php if(Request::segment(2) == 'accounts' && Request::segment(3) == 'purchase-order'){echo 'active';} ?>" href="{{url('admin/accounts/purchase-order')}}">Purchase Order</a>
    </li>
	<li class="nav-item">
  <a class="nav-link <?php if(Request::segment(3) == 'purchase-order' && Request::segment(4) == 'create'){echo 'active';} ?>" href="{{url('admin/accounts/purchase-order/create')}}"> Add Purchase Order</a>
    </li>
	<li class="nav-item">
  <a class="nav-link <?php if(Request::segment(2) == 'accounts' && Request::segment(3) == 'inward'){echo 'active';} ?>" href="{{url('admin/accounts/inward')}}">Inward Cash Flow</a>
    </li>
	<li class="nav-item">
  <a class="nav-link <?php if(Request::segment(2) == 'accounts' && Request::segment(3) == 'outward'){echo 'active';} ?>" href="{{url('admin/accounts/outward')}}">Outward Cash Flow</a>  
    </li>
  <li class="nav-item">
  <a class="nav-link <?php if(Request::segment(2) == 'accounts' && Request::segment(3) == 'gst'){echo 'active';} ?>" href="{{url('admin/accounts/gst')}}">GST</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(Request::segment(2) == 'accounts' && Request::segment(3) == 'balancesheet'){echo 'active';} ?>" href="{{url('admin/accounts/balancesheet')}}">Balance Sheet</a>
    </li>
  </ul>
</nav>