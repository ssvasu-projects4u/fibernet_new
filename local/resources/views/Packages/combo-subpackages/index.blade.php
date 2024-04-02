@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Combo Sub Plans</h3></div>
	  
	</div>
	
	
	<div class="card-body table-responsive" style="padding:5px;font-size: 12px;">
	  @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif
        
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
      
	  <table class="table table-bordered table-condensed  table-striped" style="width:100%">
	  <tr class="table-warning">
		<th>Actions</th> 
		<th>Sub Plan Name</th>
		<th>Combo Package Name</th>
		<th>Unit Type</th>
		<th>Time Unit</th>		
		<th>Price</th>
		<th>GST</th>
		<th>Total(Rs.)</th>	
		<th>Distributor Share</th>	
		<th>Franchise Share</th>
		<th>Status</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
        <td><div class="btn-group text-right">
			<button type="button" class="btn btn-primary br2 btn-sm fs12" data-toggle="dropdown" aria-expanded="false">
				<i class="fas fa-bars"></i> 
			</button>
      @canany(
        [
          "edit-combo-sub-plan",
          "delete-combo-sub-plan"
        ]
      )
			<ul class="dropdown-menu" role="menu">
        @can("edit-combo-sub-plan")
          <li> 
            <a href="{{url('admin/combo-sub-packages/edit/'.$datarow->subpackageid)}}" class="dropdown-item"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>
          </li>
          <li class="divider"><hr class="py-0 my-0 mb-4"></li>
        @endcan
        @can("delete-combo-sub-plan")
          <li>
            <a href="{{url('admin/combo-sub-packages/delete/'.$datarow->subpackageid)}}" class="dropdown-item" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
          </li>
        @endcan
			</ul>
      @endcanany
		</div></td>
		<td>@can("edit-combo-sub-plan")<a href="{{url('admin/combo-sub-packages/edit/'.$datarow->subpackageid)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>@endcan {{ $datarow->sub_plan_name }}</td>
		<td>@can("edit-combo-package")<a href="{{url('admin/combo-packages/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>@endcan {{ $datarow->package_name }}</td>
		<td>{{ ucfirst($datarow->unit_type) }}</td>
		<td>{{ ucfirst($datarow->time_unit) }}</td>
		<td>{{ $datarow->price }}</td>
		<td>{{ $datarow->gst }}</td>
		<td>{{ $datarow->total }}</td>
		<td>{{ ucfirst($datarow->distributor_share) }}</td>
		<td>{{ ucfirst($datarow->franchise_share) }}</td>
		<td>
			<?php if($datarow->status == 'Y'){echo "<span class='badge badge-success'>Active</span>";}
				else if($datarow->status == 'N'){echo "<span class='badge badge-secondary'>Inactive</span>";}else{
					echo "<span class='badge badge-secondary'>".$datarow	->status."</span>";
				} 
				?></td>
		
		
		</tr>
    @endforeach
	</table>
{{ $data->links() }}

	</div>
  </div>
	
		  
@stop
