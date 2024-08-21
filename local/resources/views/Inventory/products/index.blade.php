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
     <!-- <th>Units</th>
    <th>Description</th> -->
    <th>Category</th>
    <th>Sub Category</th>
  
    @can("view-product-stock-item")
      <th>Availability</th>
    @endcan
   
	  </tr>
	  <?php
	    $user =Auth::user();
              $id = \Auth::user()->id;
              $roles = $user->getRoleNames();
              //echo "Inventory Manager";
        $dp=array();
  	   if($roles[0]=="superadmin" || $roles[0]=="Inventory Manager")
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
		@php
		  $stockcount= DB::table('slj_stock_products')
    ->select(DB::raw("count(slj_stock_products.product) as count_total"))->where('slj_stock_products.product',$datarow->id)
    ->first();
    	  $stockavailable= DB::table('slj_stock_products')
    ->select(DB::raw("count(slj_stock_products.product) as count_available"))->where('slj_stock_products.product',$datarow->id)->where('slj_stock_products.status', '=', 'available')
    ->first();
    	  $stocktransfered= DB::table('slj_stock_products')
    ->select(DB::raw("count(slj_stock_products.product) as count_transfered"))->where('slj_stock_products.product',$datarow->id)->where('slj_stock_products.status', '=', 'transferred')
    ->first();
    @endphp
		<td>{{ $stockcount->count_total }}</td>
    <td>{{ ucfirst($stockavailable->count_available) }}</td>
    <td><a href="{{url('admin/inventory/products/customer/'.$datarow->id)}}">{{ ucfirst($stocktransfered->count_transfered) }}</a></td>
  <!-- <td>{{ $datarow->unit }}</td>
   <td{{ $datarow->description }}></td>  -->
   @foreach($categories as $category)
   @if($datarow->category == $category->id)
   <td>{{ ucfirst($category->name) }}</td>
   @endif
   @if($datarow->sub_category == $category->id)
   <td>{{ ucfirst($category->name) }}</td>
   @endif
   @endforeach
  </tr>
  
  <!--
   $stockinfo= DB::table('slj_stock_products')
    ->select(DB::raw('SUM(product) as total_products','product'))->whereIn('id',$dp)
    ->groupBy('product')
    ->get();
  
  -->
    @endforeach
  
    
    
    <?php  } 
    else 
    {
    $count=0;
     $dupid="";
      $totproducts=0;
        $dp=array();
	foreach ($data as $d)
	{
	 $dp[]= $d->stock_ids;
	 //echo $d->stock_ids;
	}
    $value=array();
$valuesarray=array();
$user_id = Auth::user()->id;
    ?>

    	
   
    
    	  
              
        @php	   
        $kk="available";
    	  $stockid = DB::table('slj_stock_products')->where('current_user_id', $user_id)->where('employee_status',$kk)->get();
	       
         
		 @endphp
		 
		 <?php
    	   foreach($stockid as $productcode)
    	   {
                $productid1 = DB::table('slj_products')->where('id', $productcode->product)->get();
                foreach($productid1 as $productid)
                {
            if( !in_array($productid->name,$valuesarray,true))
    	        {
    	            array_push($valuesarray, $productid->name);
    	      
    	   ?>
		 
		 
    	  @php
    	 
   $stockinfo= DB::table('slj_stock_products')
    ->select(DB::raw('SUM(product) as total_products'),'product')->wherein('product',$dp)
    ->groupBy('product')
    ->get();
    
     $stockcount= DB::table('slj_stock_products')
    ->select(DB::raw("count(slj_stock_products.product) as count_total"),'product')->where('product',$productid->id)
    ->groupBy('product')
    ->first();
    
     $stockavaialble= DB::table('slj_stock_products')
    ->select(DB::raw("sum(case when slj_stock_products.employee_status='available' then 1 else 0 end) as count_available"),'product')->where('product',$productid->id)
    ->groupBy('product')
    ->get();
    
     $stocktransfered= DB::table('slj_stock_products')
    ->select(DB::raw("sum(case when slj_stock_products.employee_status='transfered' then 1 else 0 end) as count_transfered"),'product')->where('product',$productid->id)
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
                    <li><a class="dropdown-item" href="{{url('admin/inventory/products/edit/'.$productid->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  @endcan
                  @can("delete-product")
                    <li><a class="dropdown-item" href="{{url('admin/inventory/products/delete/'.$productid->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                  @endcan
                </ul>
              @endcanany
            </div>
		</td>
			 
	<!--
	<a href="{{url('admin/inventory/products/edit/'.$productid->id)}}">{{ $productid->name }}</a>
	-->
		<td>{{ $productid->name }}</td>
	
    
            

		<td>
		    
		 
		    {{ $stockcount->count_total }}
		  
		    
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
    <a href="{{url('admin/inventory/products/customer/')}}">{{ $s->count_transfered }}</a>
       @endif
		    	@endforeach
   
    </td>
    <?php
     $produnits= DB::table('slj_products')->where('sku',$productid->unit)->first();
     ?>
   <!-- <td>{{ ucfirst($productid->unit) }}</td>
    <td>{{ ucfirst($productid->description) }}</td> -->
    @foreach($categories as $category)
   @if($productid->category == $category->id)
   <td>{{ ucfirst($category->name) }}</td>
   @endif
   @if($productid->sub_category == $category->id)
   <td>{{ ucfirst($category->name) }}</td>
   @endif
   @endforeach
    @can("view-product-stock-item")
  		<td><a href="{{url('admin/inventory/products/view/')}}" class="btn btn-sm btn-success">View Stock Items</a> </td>
    @endcan
   
  </tr>
    <?php
    
               } }}           
    	      
     } ?>
    
       
  
	</table>

	</div>
  </div>
	
		  
@stop
