@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Expired Customers</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;font-size: 12px;">
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
		
		<div class="table-responsive">
	  <table class="table table-bordered table-condensed  table-striped">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>Customer Id</th>
		<th>Photo</th>
		<th>Full Name</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Address</th>
		<th>City</th>
		<!--<th>Branch</th>
		<th>Franchise</th> -->
		<th>Type</th>
		<th>Created On</th>
		<th>Last Renewal On</th>
		<th>Expired on</th>
	  </tr>
	@if(count($data)>0)
	@foreach ($data as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
          @canany(
            [
              "customer-detail-in-expired-customer",
              "renew-expired-customer"
            ]
          )
            <ul class="dropdown-menu dropdown-default" role="menu">
              @can("customer-detail-in-expired-customer")
                <li><a class="dropdown-item" href="{{url('admin/customers/view/general-info/expired-customers/'.$datarow->id.'/view-general-info')}}"><i class="fa fa-eye" aria-hidden="true"></i> Customer Details</a></li>
              @endcan
              @can("renew-expired-customer")
              <li class=""><a href="{{ url('/admin/customers/view/general-info/expired-customers/'.$datarow->id.'/renew') }}"
                  class="dropdown-item">
                  <i class="fa fa-refresh" aria-hidden="true"></i> Renew User</a>
                </a>
              </li>
              @endcan            
            </ul>
          @endcanany
			</div>
		</td>
		<td>SLJ{{ sprintf('%08d', $datarow->id) }}</td>
		
		<?php
			$path = asset('uploads/default-image.png');
			
			$src = asset('uploads/customers/'.$datarow->customer_pic);
			if($datarow->customer_pic !=''){
				$path = $src;
			}	
		?>
		<td align="center"><img src="{{asset($path)}}" width="50">
		</td>
		<td>{{ $datarow->name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->email }}</td>
		<td>{{ $datarow->installation_address }}</td>
		<td>{{ $datarow->city_name }}</td>
		<!-- <td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->franchise_name }}</td> -->
		<td>{{ $datarow->connection_type }}</td>
		<td><?php if(!empty($datarow->created_at)){echo date("d-m-Y",strtotime($datarow->created_at));} ?></td>
		<td></td>
		<td><?php if(!empty($datarow->expiry_date)){echo date("d-m-Y",strtotime($datarow->expiry_date));} ?></td>
		</tr>
    @endforeach
    @else
	<tr>
		<td colspan="11">No Records Found</td>
	</tr>	
    @endif
	</table>
	</div>
{{ $data->links() }}
	</div>
  </div>
	
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

@stop
