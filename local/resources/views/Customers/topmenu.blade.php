<?php
$groupcustomers = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select(DB::raw('count(*) as count'),'slj_customers.current_status as status')
                ->groupBy('slj_customers.current_status')
                ->get();

//$groupcustomers = \App\Customers::select(DB::raw('count(*) as count'),'status')->groupBy('status')->get();
//echo "<pre>";print_r($groupcustomers);  exit;

$groupwisecustomers = array();
$totalcustomers = 0;
foreach($groupcustomers as $group){
  $status = $group->status;
  $groupwisecustomers[$status] = $group->count;
  $totalcustomers = $totalcustomers + $group->count;
}

?>

<nav class="navbar navbar-expand-sm bg-light navbar-light py-0 pl-0">
 
 @canany(
  [
    "add-customer-application",
    "new-customers",
    "add-technical",
    "scheduled-customers",
    "activate-customers",
    "active-customers",
    "expired-customers",
    "disconnection-customers",
    "all-customers"
  ]
 )
  <ul class="nav nav-tabs" style="font-size:12px;">

  @can("add-customer-application")
   <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'create'){echo 'active';} ?>" href="{{url('admin/customers/create')}}">Add Customer</a>
    </li>
  @endcan

  @can("new-customers")

	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'new'){echo 'active';} ?>" href="{{url('admin/customers/new')}}">New Customers&nbsp;<span class="badge badge-info">
        <?php 
		if(isset($groupwisecustomers['new']) && ($groupwisecustomers['new'] > 0)){
          echo $groupwisecustomers['new'];
        }else{
          echo "0";
        }
        ?>
      </span></a>
    </li>

  @endcan
  @can("add-technical")

	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'technical'){echo 'active';} ?>" href="{{url('admin/customers/technical')}}">Add Technical&nbsp;<span class="badge badge-primary">
        <?php 
        if(isset($groupwisecustomers['technical']) && ($groupwisecustomers['technical'] > 0)){
          echo $groupwisecustomers['technical'];
        }else{
          echo "0";
        }
        ?>
      </span></a>
    </li>
  @endcan
  @can("scheduled-customers")
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'schedule'){echo 'active';} ?>" href="{{url('admin/customers/schedule')}}">Scheduled&nbsp;<span class="badge badge-info">
        <?php 
        if(isset($groupwisecustomers['scheduled']) && ($groupwisecustomers['scheduled'] > 0)){
          echo $groupwisecustomers['scheduled'];
        }else{
          echo "0";
        }
        ?>
      </span></a>
    </li>
  @endcan
  @can("activate-customers")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'activation'){echo 'active';} ?>" href="{{url('admin/customers/activation')}}">Activate Customers&nbsp;<span class="badge badge-warning">
        <?php 
        if(isset($groupwisecustomers['activation']) && ($groupwisecustomers['activation'] > 0)){
          echo $groupwisecustomers['activation'];
        }else{
          echo "0";
        }
        ?>
      </span></a>
    </li>
  @endcan
  @can("active-customers")
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'active'){echo 'active';} ?>" href="{{url('admin/customers/active')}}">Active&nbsp;<span class="badge badge-info">
        <?php 
        $total_active = 0;
		if(isset($groupwisecustomers['active']) && ($groupwisecustomers['active'] > 0)){
           $total_active+= $groupwisecustomers['active'];
        }
		if(isset($groupwisecustomers['activated']) && ($groupwisecustomers['activated'] > 0)){
           $total_active+= $groupwisecustomers['activated'];
        }
		echo $total_active;
        ?>
      </span></a>
    </li>
  @endcan
  @can("expired-customers")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'expired'){echo 'active';} ?>" href="{{url('admin/customers/expired')}}">Expired&nbsp;<span class="badge badge-warning">
        <?php 
        if(isset($groupwisecustomers['expired']) && ($groupwisecustomers['expired'] > 0)){
          echo $groupwisecustomers['expired'];
        }else{
          echo "0";
        }
        ?>
      </span></a>
    </li>
  @endcan
  @can("disconnection-customers")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && Request::segment(3) == 'closed'){echo 'active';} ?>" href="{{url('admin/customers/closed')}}">Disconnections&nbsp;<span class="badge badge-secondary">
        <?php 
        if(isset($groupwisecustomers['closed']) && ($groupwisecustomers['closed'] > 0)){
          echo $groupwisecustomers['closed'];
        }else{
          echo "0";
        }
        ?>
      </span></a>
    </li>
  @endcan
  @can("all-customers")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'customers' && (Request::segment(3) == null)){echo 'active';} ?>" href="{{url('admin/customers')}}">All Customers&nbsp;<span class="badge badge-success">{{$totalcustomers}}</span></a>
    </li>
   @endcan
  </ul>
@endcanany
</nav>