@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Products</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;">
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif
	  <table class="table table-bordered">
	      
	  <tr class="table-warning">
	  	<th width="25">Actions</th>
		<th>Product Name</th>
		<th>TOTAL</th>
			<th>AVAIALABLE</th>
				<th>TRANSFERED</th>
    <th>Units</th>
    <th>Description</th>
    @can("view-product-stock-item")
      <th>Availability</th>
    @endcan
    <th>Status</th>
	  </tr>
	  <?php
	    $user =Auth::user();
              $id = \Auth::user()->id;
              $roles = $user->getRoleNames();
    
  	   if($roles[0]=="superadmin")
          {
              ?>
	@foreach ($data as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
              @canany(
                [
                  "edit-product",
                  "delete-product"
                ]
              )
                <ul class="dropdown-menu dropdown-default" role="menu">
                  @can("edit-product")
                    <li><a class="dropdown-item" href="{{url('admin/inventory/products/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  @endcan
                  @can("delete-product")
                    <li><a class="dropdown-item" href="{{url('admin/inventory/products/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                  @endcan
                </ul>
              @endcanany
            </div>
		</td>
		<td><a href="{{url('admin/inventory/products/edit/'.$datarow->id)}}">{{ $datarow->name }}</a></td>
		<td>{{ $datarow->sku }}</td>
    <td>{{ ucfirst($datarow->unit) }}</td>
    <td>{{ ucfirst($datarow->description) }}</td>
    @can("view-product-stock-item")
  		<td><a href="{{url('admin/inventory/products/view/'.$datarow->id)}}" class="btn btn-sm btn-success">View Stock Items</a> </td>
    @endcan
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
  
  <!--
   $stockinfo= DB::table('slj_stock_products')
    ->select(DB::raw('SUM(product) as total_products','product'))->whereIn('id',$dp)
    ->groupBy('product')
    ->get();
  
  -->
    @endforeach
  
    
    
    <?php  } else {
    $count=0;
     $dupid="";
      $totproducts=0;
        $dp=array();
	foreach ($data as $d)
	{
	 $dp[]= $d->stock_ids;
	}
    $value=array();
$valuesarray=array();
    ?>

    	
   
    	@foreach ($data as $datarow1)
    	   
    	 @foreach (explode(',', $datarow1->stock_ids) as $datarow)
    	  
              
        @php	   
    	  $stockid = DB::table('slj_stock_products')->select('product')->where('id', $datarow)->first();
		  $productid = DB::table('slj_products')->select('id','name','unit','description','status')->where('id', $stockid->product)->distinct('name')->first();
            
         
		 @endphp
		 <?php
    	   
             if( !in_array($productid->name,$valuesarray,true))
    	        {
    	            array_push($valuesarray, $productid->name);
    	       
    	 
    	   ?>
		 
		 
    	  @php
    	 
   $stockinfo= DB::table('slj_stock_products')
    ->select(DB::raw('SUM(product) as total_products'),'product')->wherein('id',$dp)
    ->groupBy('product')
    ->get();
    
     $stockcount= DB::table('slj_stock_products')
    ->select(DB::raw("count(slj_stock_products.id) as count_total"),'product')->wherein('id',$dp)
    ->groupBy('product')
    ->get();
    
     $stockavaialble= DB::table('slj_stock_products')
    ->select(DB::raw("sum(case when slj_stock_products.employee_status='available' then 1 else 0 end) as count_available"),'product')->wherein('id',$dp)
    ->groupBy('product')
    ->get();
    
     $stocktransfered= DB::table('slj_stock_products')
    ->select(DB::raw("sum(case when slj_stock_products.employee_status='transferred' then 1 else 0 end) as count_transfered"),'product')->wherein('id',$dp)
    ->groupBy('product')
    ->get();
    @endphp

 
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
              @canany(
                [
                  "edit-product",
                  "delete-product"
                ]
              )
                <ul class="dropdown-menu dropdown-default" role="menu">
                  @can("edit-product")
                    <li><a class="dropdown-item" href="{{url('admin/inventory/products/edit/'.$datarow)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  @endcan
                  @can("delete-product")
                    <li><a class="dropdown-item" href="{{url('admin/inventory/products/delete/'.$datarow)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                  @endcan
                </ul>
              @endcanany
            </div>
		</td>
			 
	
		<td><a href="{{url('admin/inventory/products/edit/'.$stockid->product)}}">{{ $productid->name }}</a></td>
		
    
            

		<td>
		     @foreach($stockcount as $s)
		      @if($s->product==$productid->id)
		    {{ $s->count_total }}
		      @endif
		    	@endforeach
		    </td>
	
    <td>
         @foreach($stockavaialble as $s)
           @if($s->product==$productid->id)
        {{ ucfirst($s->count_available) }}
        @endif
		    	@endforeach
    
    </td>
    <td>
     @foreach($stocktransfered as $s)
           @if($s->product==$productid->id)
        {{ ucfirst($s->count_transfered) }}
        @endif
		    	@endforeach
    
    </td>
    <td>{{ ucfirst($productid->unit) }}</td>
    <td>{{ ucfirst($productid->description) }}</td>
    @can("view-product-stock-item")
  		<td><a href="{{url('admin/inventory/products/view/'.$stockid->product)}}" class="btn btn-sm btn-success">View Stock Items</a> </td>
    @endcan
    <td>
			@if($productid->status == 'Y')
			<span class="badge badge-success">Active</span>
			@elseif($productid->status == 'N')
			<span class="badge badge-warning">Inactive</span>
			@elseif($productid->status == 'D')
			<span class="badge badge-secondary">Deleted</span>
			@endif
		</td>  
  </tr>
    <?php  }
    $count++; ?>
    @endforeach
       @endforeach
  <?php }  ?>
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
