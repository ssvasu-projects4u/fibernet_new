@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Transfer Stock</h3></div>
	  
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
	  
		<th>Product Name</th>
		<th>Company Name</th>
			<th>Model</th>
		    <th>Serial Number</th>
            <th>Transfer to</th>
    
	  </tr>
	 
    	@foreach ($stocktransferdata as $datarow)
    	   
    	
		 
		 
    
        <tr>
        
			 @php
	 $productdata= DB::table('slj_products')
             ->where('id',$datarow->product)->first();
         @endphp
		<td><a href="{{url('admin/inventory/products/edit/'.$datarow->product)}}">
		    
		    
		    {{ $productdata->name }}</a></td>
		
    
            

		<td>
		   {{ $datarow->manufacturer }}
		    </td>
	
    <td>
        
       
      {{ $datarow->identification }}
    </td>
    <td>
      {{ $datarow->serial_no }}
    
    </td>
    <?php
     $user = \Auth::user();
      $roles = $user->getRoleNames();
      
      if($roles[0]!='superadmin')
      {
      ?>
    @php
     $stockcount= DB::table('slj_customers')
        ->where('id',$datarow->customer_id)->first();
    $custmdata= DB::table('users')
              ->where('id',$stockcount->user_id)->first();
        
    
    @endphp
    
        <td>{{ $custmdata->name }}</td>
        <?php
        }
        else
        {
            $user= DB::table('users')
        ->where('id',$datarow->current_user_id)->first();
            
            ?>
           <td>{{ $user->name }}</td>
    <?php    } ?>
   
  </tr>
 
       @endforeach

	</table>

	</div>
  </div>
	
		  
@stop
