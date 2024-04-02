@extends('layouts.admin')

@section('content')

<style>
.min200{min-width: 200px !important;}
.min250{min-width: 250px !important;}
.min300{min-width: 300px !important;}
table.table th{min-width: 100px;}
</style>    

    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('customers.topmenu')
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
		<th>Actions</th>
		<th>Add</th>
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
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                @canany([
                  "edit-add-technical",
                ])
                <ul class="dropdown-menu dropdown-default" role="menu">
                  @can("edit-add-technical")
                    <li><a class="dropdown-item" href="{{url('admin/customers/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                  @endcan
                    <!--<li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/customers/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>-->
                </ul>
                @endcanany
            </div>
		</td>
        <td>@can("add-technical")<a href="{{url('admin/customers/add-technical/'.$datarow->id)}}" title='add technical' class="btn btn-primary btn-sm">Add&nbsp;Technical</a>@endcan</td>
        <?php

			$path = asset('public/uploads/default-image.png');
			
			$src = asset('public/uploads/customers/photos/'.$datarow->customer_pic);
			if($datarow->customer_pic !='') {
				$path = $src;
			}
		?>
		<td><img src="{{asset($path)}}" width="50"></td>
		<td>{{ $datarow->name }}</td>
		<td>{{ $datarow->mobile }}</td>
		<td>@can("customer-detail-in-add-technical")@endcan {{ $datarow->email }}</td>
	<!--	<td>@can("customer-detail-in-add-technical") <a href="{{url('admin/customers/view/general-info/'.$datarow->id.'/view-general-info')}}" ><i class="fa fa-eye" aria-hidden="true"> </a>@endcan {{ $datarow->email }}</td> -->
	
		<td>{{ $datarow->installation_address }}</td>
		<!-- <td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->franchise_name }}</td> -->
	  
	  @php
	   	 $contype = DB::table('slj_connection_types')->where('id', $datarow->connection_type)->first();
				
	  @endphp
	   
	   		  		    
		<td>
		    <?php if(!empty($contype->title))
		    { 
		    echo $contype->title;
		    }
		    ?>
		    </td>
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
