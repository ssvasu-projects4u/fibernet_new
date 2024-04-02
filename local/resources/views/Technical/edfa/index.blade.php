@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">EDFA</h3></div>

	</div>


	<div class="card-body" style="padding:5px;">
	  <table class="table table-bordered">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>City</th>
		<th>Distributor</th>
		<th>Branch</th>
		<th>EDFA Serial No</th>
		<th>EDFA Ports</th>
		<th>Company</th>
		<th>Model</th>
		<th>Created Date</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

          @canany([
            "edit-edfa",
            "delete-edfa"
          ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-edfa")
              <li><a class="dropdown-item" href="{{url('admin/edfa/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-edfa")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/edfa/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            @endcan
          </ul>
          @endcanany
            </div>
		</td>
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->distributor_name }}</td>
		<td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->edfa_serial_number }}</td>
		<td>{{ $datarow->edfa_ports }}</td>
		<td>{{ $datarow->edfa_company }}</td>
		<td>{{ $datarow->edfa_model }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
