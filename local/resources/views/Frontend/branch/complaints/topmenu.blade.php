<?php
$groupcomplaints = \App\Complaints::leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftJoin('slj_branches','slj_customers.branch', '=', 'slj_branches.id')
				->select(DB::raw('count(*) as count'),'slj_complaints.status as status')
				->where('slj_branches.user_id', '=', \Auth::user()->id)
				->groupBy('slj_complaints.status')
				->get();

$groupwisecomplaints = array();
$totalcomplaints = 0;
foreach($groupcomplaints as $group){
  $status = $group->status;
  $groupwisecomplaints[$status] = $group->count;
  $totalcomplaints = $totalcomplaints + $group->count;
}
//echo "<pre>";print_r($groupwisecustomers);  exit;
?>
<nav class="navbar navbar-expand-sm bg-light navbar-light py-0 pt-0 pl-0">
 
  <ul class="nav nav-tabs pl-0">
   <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && empty(Request::segment(3))){echo 'active';} ?>" href="{{url('branch/complaints')}}">All Complaints&nbsp;<span class="badge badge-info">
	  {{$totalcomplaints}}
	  </span></a>
    </li>
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'open'){echo 'active';} ?>" href="{{url('branch/complaints/open')}}">Open&nbsp;<span class="badge badge-primary">
	  <?php 
		if(isset($groupwisecomplaints['open']) && ($groupwisecomplaints['open'] > 0)){
          echo $groupwisecomplaints['open'];
        }else{
          echo "0";
        }
        ?>
	  </span></a>
    </li>
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'inprogress'){echo 'active';} ?>" href="{{url('branch/complaints/inprogress')}}">In Progress&nbsp;<span class="badge badge-warning">
	  <?php 
		if(isset($groupwisecomplaints['in progress']) && ($groupwisecomplaints['in progress'] > 0)){
          echo $groupwisecomplaints['in progress'];
        }else{
          echo "0";
        }
        ?>
	  </span></a>
    </li>
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'resolved'){echo 'active';} ?>" href="{{url('branch/complaints/resolved')}}">Resolved&nbsp;<span class="badge badge-success">
	  <?php 
		if(isset($groupwisecomplaints['resolved']) && ($groupwisecomplaints['resolved'] > 0)){
          echo $groupwisecomplaints['resolved'];
        }else{
          echo "0";
        }
        ?>
	  </span></a>
    </li>
  <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'closed'){echo 'active';} ?>" href="{{url('branch/complaints/closed')}}">Closed&nbsp;<span class="badge badge-secondary">
	  <?php 
		if(isset($groupwisecomplaints['closed']) && ($groupwisecomplaints['closed'] > 0)){
          echo $groupwisecomplaints['closed'];
        }else{
          echo "0";
        }
        ?></span></a>
    </li>
  </ul>
</nav>