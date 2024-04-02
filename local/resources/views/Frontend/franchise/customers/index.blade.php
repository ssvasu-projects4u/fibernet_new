@extends('layouts.franchise')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('frontend.franchise.customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">All Customers</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;font-size: 12px;">
		
		@if (session('success_message'))
	<div class="container">
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('success_message') !!}</p>
		</div>
	</div>
	@endif

	@if (session('error_message'))
	<div class="container">
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('error_message') !!}</p>
		</div>
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
      <th>Created</th>
      <th>Technical on</th>
      <th>Scheduled on</th>
      <th>Activated on</th>
      <th>Expires on</th>
	  </tr>
	@if(count($data)>0)
	@foreach ($data as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                <ul class="dropdown-menu dropdown-default" role="menu">
                    <?php if($datarow->current_status == "activated"){?>
					<li><a class="dropdown-item" href="{{url('admin/customers/renew/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Renew User</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-0"></li>
					<?php } ?>
					<li><a class="dropdown-item" href="{{url('admin/customers/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <!--<li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/customers/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>-->
                </ul>
            </div>
		</td>
		<td>{{ sprintf('%08d', $datarow->id) }}</td>
		
		<?php
			$path = asset('uploads/default-image.png');
			
			$src = asset('uploads/customers/'.$datarow->customer_pic);
			if($datarow->customer_pic !=''){
				$path = $src;
			}	
		?>
		<td align="center"><img src="{{asset($path)}}" width="50"><br>
		
		<?php 
				if($datarow->current_status == "technical"){echo "<span class='badge badge-primary'>In Technical</span>";}
				elseif($datarow->current_status == "active"){echo "<span class='badge badge-success'>Active</span>";}
				elseif($datarow->current_status == "activation"){echo "<span class='badge badge-warning'>In Activation</span>";}
                elseif($datarow->current_status == "activated"){echo "<span class='badge badge-success'>Activated</span>";}
				elseif($datarow->current_status == "new"){echo "<span class='badge badge-danger'>New</span>";}
				elseif($datarow->current_status == "scheduled"){echo "<span class='badge badge-info'>Scheduled</span>";}
				else{echo "<span class='badge badge-secondary'>".$datarow->current_status."</span>";}

			?>
		
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
		<td><?php if(!empty($datarow->technical_details_c_date)){echo date("d-m-Y",strtotime($datarow->technical_details_c_date));} ?></td>
		<td><?php if(!empty($datarow->schedule_date)){echo date("d-m-Y",strtotime($datarow->schedule_date));} ?></td>
		<td><?php if(!empty($datarow->active_updated_date)){echo date("d-m-Y",strtotime($datarow->active_updated_date));} ?></td>
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
	
		  
@stop
