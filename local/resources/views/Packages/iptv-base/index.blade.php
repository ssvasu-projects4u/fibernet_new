@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">IPTV - List Base(FTA)</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;">
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
	  <table class="table table-bordered">
	  <tr class="table-warning">
	  	<th>Actions</th>
		<th>Package Name</th>
		<th>Channels Description</th>
		<th>Price</th>
		<th>GST(%)</th>
		<th>Total</th>
		<th>Distributor Share</th>
		<th>Franchise Share</th>
		<th>Status</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
		<td align="center">
			<div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        @canany([
          "iptv-base-edit",
          "iptv-base-delete"
        ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can("iptv-base-edit")
            <li><a class="dropdown-item" href="{{url('admin/iptv/base/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            <li class="divider"><hr class="py-0 my-0 mb-4"></li>
          @endcan
          @can("iptv-base-delete")
            <li><a class="dropdown-item" href="{{url('admin/iptv/base/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>                    
          @endcan
        </ul>
        @endcan
      </div>
		</td>
		<td>@can("iptv-base-edit")<a href="{{url('admin/iptv/base/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>@endcan {{ $datarow->package_name }} </td>
		<td>{{ $datarow->channels_description }}</td>
		<td>{{ $datarow->price }}</td>
		<td>{{ $datarow->gst }}</td>
		<td>{{ $datarow->total_amount }}</td>
		<td>{{ $datarow->distributor_share }}</td>
		<td>{{ $datarow->franchise_share }}</td>
		<td>
			@if($datarow->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($datarow->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($datarow->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		</td>
		</tr>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
