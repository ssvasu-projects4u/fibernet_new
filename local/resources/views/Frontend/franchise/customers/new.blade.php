@extends('layouts.franchise')

@section('content')

<style>
.min200{min-width: 200px !important;}
.min250{min-width: 250px !important;}
.min300{min-width: 300px !important;}
table.table th{min-width: 100px;}
</style>   

    <!-- Page Heading -->
    <div class="card shadow mb-2">
	   @include('frontend.franchise.customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">New Customers</h3></div>
	  
	</div>
	
	
	
	
	
	</div>
	
	
	<div class="card shadow mb-2">
	<div class="card-body table-responsive" style="padding:5px;font-size: 12px;">
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
		<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('error_message') !!}</p>
		</div>
	</div>
	@endif
	
	
	  
	  <table class="table table-bordered table-condensed  table-striped" style="width:100%;">
	  <tr class="table-warning">
              <th>Actions</th>
              <th>Payment</th>
		<th>Photo</th>
        <th>Full Name</th>
		<th>Mobile</th>
		<th>Email</th>
		<!--<th>Branch</th>
		<th>Franchise</th> -->
		<th>Type</th>
		<th>Created</th>
	  </tr>
	@if(count($data)>0)
	@foreach ($data as $datarow)
        <tr>
        	
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                <ul class="dropdown-menu dropdown-default" role="menu">
                    <li><a class="dropdown-item" href="{{url('admin/customers/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <!--<li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/customers/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>-->
                </ul>
            </div>
		</td>
		<?php if($datarow->current_status == 'paid'){ ?>
        <td><a href="{{url('admin/customers/process-payment/'.$datarow->id)}}" title='customer paid' class="btn btn-success btn-sm">Payment History</a></td>
		<?php }else{ ?>
		<td>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/payment_gateway')}}" title='proceed to pay online' class="btn btn-primary btn-sm">Pay Online</a></p>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/cash')}}" title='proceed to pay by cash' class="btn btn-primary btn-sm">Pay by Cash</a></p>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/cheque')}}" title='proceed to pay by cheque' class="btn btn-primary btn-sm">Pay by Cheque</a></p>
		
		
		</td>
		<?php } ?>
		<?php
			$path = asset('uploads/default-image.png');
			
			$src = asset('uploads/customers/'.$datarow->customer_pic);
			if($datarow->customer_pic !=''){
				$path = $src;
			}	
		?>
		<td><img src="{{asset($path)}}" width="50"></td>
        <td><a href="{{url('franchise/customers/view/general-info/'.$datarow->id)}}" >{{ $datarow->name }}</a></td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->email }}</td>
		<!-- <td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->franchise_name }}</td> -->
		<td>{{ $datarow->connection_type }}</td>
		<td><?php if(!empty($datarow->created_at)){echo date("d-m-Y",strtotime($datarow->created_at));} ?></td>
		
		</tr>
    @endforeach
    @else
	<tr>
		<td colspan="11">No Records Found</td>
	</tr>	
    @endif
	</table>
{{ $data->links() }}
	</div>
  </div>
 
	
		  
@stop
