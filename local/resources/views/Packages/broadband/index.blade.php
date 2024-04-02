@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Broadband Packages</h3></div>
	  
	</div>
	
	
	<div class="card-body  table-responsive" style="padding:5px;font-size: 12px;">
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
      
	  <table class="table table-bordered  table-striped">
	  <tr class="table-warning">
		<th>Actions</th> 
		<th>Package Name</th>
		<th>Sub Plans</th>	
		<th>Download Speed</th>
		<th>Upload Speed</th>
		<th>Status</th>	
	  </tr>
	@foreach ($data as $datarow)
        <tr>
        <td><div class="btn-group text-right">
			<button type="button" class="btn btn-primary br2 btn-sm fs12 " data-toggle="dropdown" aria-expanded="false">
				<i class="fas fa-bars"></i>
			</button>
      @canany([
        "edit-broadband-package",
        "broadband-package-delete",
        "edit-broadband-sub-plans"
      ])
			<ul class="dropdown-menu" role="menu">
				@can("edit-broadband-package")
				<li> 
					<a href="{{url('admin/broadband-packages/edit/'.$datarow->id)}}" class="dropdown-item"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>
				</li>
        @endcan
				@can("edit-broadband-sub-plans")
        <li> 
					<a href="{{url('admin/broadband-packages/edit/'.$datarow->id.'#package_subplans')}}" class="dropdown-item"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Broadband Sub Plans</a>
				</li>
				<li class="divider"><hr class="py-0 my-0 mb-4"></li>
        @endcan
				@can("broadband-package-delete")
        <li> 
					<a href="{{url('admin/broadband-packages/delete/'.$datarow->id)}}" class="dropdown-item" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
				</li>
        @endcan
			</ul>
      @endcanany
		</div>
    </td>

		<td>@can("edit-broadband-package")<a href="{{url('admin/broadband-packages/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>@endcan{{ $datarow->package_name }}</td>
		<td>@can("view-broadband-sub-plans")<a href="{{url('admin/broadband-packages/edit/'.$datarow->id.'#package_subplans')}}"><i class="fa fa-eye" aria-hidden="true"></i> View Sub Plans</a>@endcan</td>
		<td>{{ $datarow->download_speed }}</td>
		<td>{{ $datarow->upload_speed }}</td>
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
