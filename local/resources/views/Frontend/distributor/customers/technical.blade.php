@extends('layouts.distributor')

@section('content')

<style>
.min200{min-width: 200px !important;}
.min250{min-width: 250px !important;}
.min300{min-width: 300px !important;}
table.table th{min-width: 100px;}
</style>    

    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('frontend.distributor.customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Add Technical</h3></div>
	  
	</div>
	
	
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
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('error_message') !!}</p>
		</div>
	</div>
	@endif
	  
	  <table class="table table-bordered table-condensed  table-striped" style="width:100%;">
	  <tr class="table-warning">
		<th>Photo</th>
		<th>Full Name</th>
		<th>Mobile</th>
		<th>Email</th>
		<th>Adddress</th>
		<!-- <th>Branch</th>
		<th>Franchise</th> -->
		<th>Type</th>
		<th>Created</th>
	  </tr>
	@if(count($data)>0)
	@foreach ($data as $datarow)
        <tr>
        	
        <?php
			$path = asset('uploads/default-image.png');
			
			$src = asset('uploads/customers/'.$datarow->customer_pic);
			if($datarow->customer_pic !=''){
				$path = $src;
			}	
		?>
		<td><img src="{{asset($path)}}" width="50"></td>
		<td><a href="{{url('distributor/customers/view/general-info/'.$datarow->id)}}" >{{ $datarow->name }}</a></td>
		<td>{{ $datarow->mobile }}</td>
		<td>{{ $datarow->email }}</td>
		<td>{{ $datarow->installation_address }}</td>
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
