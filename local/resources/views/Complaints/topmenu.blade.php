<?php
$groupcomplaints = \App\Complaints::select(DB::raw('count(*) as count'),'slj_complaints.status as status')
                ->groupBy('slj_complaints.status')
                ->get();

$groupwisecomplaints = array();
$totalcomplaints = 0;
foreach($groupcomplaints as $group){
  $status = $group->status;
  $groupwisecomplaints[$status] = $group->count;
  $totalcomplaints = $totalcomplaints + $group->count;
}

$deletedCount = \App\Complaints::where("deleted", 1)->count();

?>
<nav class="navbar navbar-expand-sm bg-light navbar-light py-0 pt-0 pl-0">
 
@canany(
  [
    "complaint-types",
    "create-complaint-type",
    "deleted-complaints",
    "closed-complaints",
    "resolved-complaints",
    "in-progress-complaints",
    "open-complaints",
    "all-complaints",
    "add-complaint",
  ]
)
  <ul class="nav nav-tabs pl-0">
  

  @canany([
    "complaint-types",
    "create-complaint-type"
  ])
  <li class="nav-item dropdown">
    @can("complaint-types")
      <a class="nav-link dropdown-toggle <?php if(Request::segment(2) == 'complaint-types'){echo 'active';} ?>" data-toggle="dropdown" href="{{url('admin/complaint-types')}}">Complaint Types</a>
    @endcan
    <div class="dropdown-menu">
      @can("create-complaint-type")
        <a class="dropdown-item" href="{{url('admin/complaint-types/create')}}">Create Complaint Type</a>
      @endcan
      @can("complaint-types")
        <a class="dropdown-item" href="{{url('admin/complaint-types')}}">List Complaint Types</a>
      @endcan
    </div>
  </li>
  @endcanany

  @can("add-complaint")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'create'){echo 'active';} ?>" href="{{url('admin/complaints/create')}}">Add Complaint</a>
    </li>
  @endcan  

  @can("all-complaints")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && empty(Request::segment(3))){echo 'active';} ?>" href="{{url('admin/complaints')}}">All Complaints&nbsp;<span class="badge badge-info">
        {{$totalcomplaints}}
      </span></a>
    </li>
  @endcan
  
@can("open-complaints")
  <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'open'){echo 'active';} ?>" href="{{url('admin/complaints/open')}}">Open&nbsp;<span class="badge badge-primary">
	  <?php 
		if(isset($groupwisecomplaints['open']) && ($groupwisecomplaints['open'] > 0)){
          echo $groupwisecomplaints['open'];
        }else{
          echo "0";
        }
        ?>
	  </span></a>
    </li>
  @endcan


@can("in-progress-complaints")
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'inprogress'){echo 'active';} ?>" href="{{url('admin/complaints/inprogress')}}">In Progress&nbsp;<span class="badge badge-warning">
	  <?php 
		if(isset($groupwisecomplaints['in progress']) && ($groupwisecomplaints['in progress'] > 0)){
          echo $groupwisecomplaints['in progress'];
        }else{
          echo "0";
        }
        ?>
	  </span></a>
    </li>
@endcan

@can("resolved-complaints")
	<li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'resolved'){echo 'active';} ?>" href="{{url('admin/complaints/resolved')}}">Resolved&nbsp;<span class="badge badge-success">
	  <?php 
		if(isset($groupwisecomplaints['resolved']) && ($groupwisecomplaints['resolved'] > 0)){
          echo $groupwisecomplaints['resolved'];
        }else{
          echo "0";
        }
        ?>
	  </span></a>
    </li>
@endcan

@can("closed-complaints")
  <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'closed'){echo 'active';} ?>" href="{{url('admin/complaints/closed')}}">Closed&nbsp;<span class="badge badge-secondary">
	  <?php 
		if(isset($groupwisecomplaints['closed']) && ($groupwisecomplaints['closed'] > 0)){
          echo $groupwisecomplaints['closed'];
        }else{
          echo "0";
        }
        ?></span></a>
    </li>
@endcan

@can("deleted-complaints")
    <li class="nav-item">
      <a class="nav-link <?php if(Request::segment(2) == 'complaints' && Request::segment(3) == 'deleted'){echo 'active';} ?>" href="{{url('admin/complaints/deleted')}}">Deleted&nbsp;<span class="badge badge-secondary">
    <?php
		if(isset($deletedCount) && ($deletedCount > 0)){
          echo $deletedCount;
        }else{
          echo "0";
        }
        ?></span></a>
    </li>
@endcan

  </ul>
@endcanany

</nav>