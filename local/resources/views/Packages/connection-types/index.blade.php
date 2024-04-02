@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('packages.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Connection Types</h3></div>
	  
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
		<th>Connection Type</th>
		<th>Installation Amount</th>	
		<th>Gateway ONT <br>Security Deposit </th>
		<th>Setup Box Amount</th>
		<th>Rental Amount</th>
		<th>ONT & Android Box Amount</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
        <td><div class="btn-group text-right">
			<button type="button" class="btn btn-primary br2 btn-sm fs12 " data-toggle="dropdown" aria-expanded="false">
				<i class="fas fa-bars"></i>
			</button>


      @canany(
        [
          "edit-connection-type",
          "delete-connection-type"
        ]
      )
			<ul class="dropdown-menu" role="menu">

        @can("edit-connection-type")
          <li>
            <a href="{{url('admin/connection-types/edit/'.$datarow->id)}}" class="dropdown-item"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a>
          </li>
        @endcan

        @can("delete-connection-type")
          <li class="divider"><hr class="py-0 my-0 mb-4"></li>
          <li> 
            <a href="{{url('admin/connection-types/delete/'.$datarow->id)}}" class="dropdown-item" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
          </li>
        @endcan

			</ul>
        @endcanany

		</div></td>
		
		<td>@can("edit-connection-type")<a href="{{url('admin/connection-types/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>@endcan {{ $datarow->title }}</td>
		<td>{{ $datarow->installation_amount }}</td>
		<td>{{ $datarow->olt_security_deposit }}</td>
		<td>{{ $datarow->setupbox_amount }}</td>
		<td>{{ $datarow->rental_amount }}</td>
		<td>{{ $datarow->ont_security_deposit }}</td>
		
		
		</tr>
    @endforeach
	</table>
{{ $data->links() }}

	</div>
  </div>
	
		  
@stop
