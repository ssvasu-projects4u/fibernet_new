@extends('layouts.admin')

@section('content')

<style>
.min200{min-width: 200px !important;}
.min250{min-width: 250px !important;}
.min300{min-width: 300px !important;}
table.table th{min-width: 100px;}
</style>

    <!-- Page Heading -->
    <div class="card shadow mb-2">
	   @include('customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">New Customers</h3></div>
	  
	</div>
	
	<?php 
		if(isset($_GET['city'])){$city_id = $_GET['city'];}else{$city_id = null;}
		if(isset($_GET['distributor'])){$distributor_id = $_GET['distributor'];}else{$distributor_id = null;}
		if(isset($_GET['branch'])){$branch_id = $_GET['branch'];}else{$branch_id = null;}
		if(isset($_GET['franchise'])){$franchise_id = $_GET['franchise'];}else{$franchise_id = null;}
	?>
	
	<div class="card-body">
	     <?php
	    $user = Auth::user();
	    	$user_id = Auth::user()->id;
	    
              $roles = $user->getRoleNames();
              if($roles[0]=='superadmin')
              {
                  ?>
	<form method="GET" accept-charset="UTF-8">
	      			<div class="row">
					
					<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, $city_id,array('class' => 'form-control','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', $distributors, $distributor_id,array('class' => 'form-control','placeholder'=>'-- Select Distributor --') ) !!} </div>
		 <div class="form-group col-md-3"> {!! Form::label('subdistributor', 'sub Distributor') !!}
        {!! Form::select('subdistributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>	
			
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', $branches, $branch_id,array('class' => 'form-control','placeholder'=>'-- Select Branch --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
        {!! Form::select('franchise', $franchises, $franchise_id,array('class' => 'form-control','placeholder'=>'-- Select Franchise --') ) !!} </div>
					</div>
					
			{!! Form::submit('Search', ['class' => 'btn btn-success']) !!} 
		</form>
		<?php } else {
		$user_id = Auth::user()->id;
		?>
			<form method="GET" accept-charset="UTF-8">
	      			<div class="row">
					
					<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
			
  @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$citygroup = array();
			    	 
          
            if(!empty($userdetails1->city)){
                
								$citygroup = explode(",",$userdetails1->city);
						
								
							
            }
            $size=count($citygroup);
            echo $size;
            if($size==1)
            {
            ?>
               @foreach($citygroup as $p)
            @php $user = DB::table('slj_cities')->where('id', $p)->first(); @endphp;
        <input type="text" value="{{$user->name }}" name="city2" id="city2" class="form-control" readonly>
          <input type="hidden" value="{{ $p }}" name="city" id="city" class="form-control" required>
            
                @endforeach
            
            <?php
            }
            else
            {
            ?>
            <select name="city" id="city" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($citygroup as $p)
            @php $user = DB::table('slj_cities')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}" selected>{{$user->name}}</option>
                @endforeach
            </select>
            <?php } ?>	</div>		<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
         @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$distgroup = array();
		 
     
            if(!empty($userdetails1->distributor)){
			$distgroup = explode(",",$userdetails1->distributor);
						
								
							
            }
            ?>
            <select name="distributor" id="distributor" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($distgroup as $p)
            @php $user = DB::table('slj_distributors')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}">{{$user->distributor_name}}</option>
                @endforeach
            </select>
        </div>
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
                                      @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$branchesgroup = array();
			    	 
          
            if(!empty($userdetails1->branch)){
                
								$branchesgroup = explode(",",$userdetails1->branch);
						
								
							
            }
                ?>
            
            <select name="branch" id="branch" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($branchesgroup as $p)
            @php $user = DB::table('slj_branches')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}">{{$user->branch_name}}</option>
                @endforeach
            </select>

        </div>
		
	
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
                                  @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$franchgroup = array();
			    	 
          
            if(!empty($userdetails1->franch)){
                
								$franchgroup = explode(",",$userdetails1->franch);
						
								
							
            }
            ?>
            
            <select name="franchise" id="franchise" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($franchgroup as $p)
            @php $user = DB::table('slj_franchises')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}">{{$user->franchise_name}}</option>
                @endforeach
            </select>

        </div>


    

	</div>
					
			{!! Form::submit('Search', ['class' => 'btn btn-success']) !!} 
		</form>
		<?php }
	
		?>
	
	
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
	  <?php if($roles[0]=='superadmin')
	  {?>
	 @if(count($data)>0)
	@foreach ($data as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                @canany(
                  [
                    "edit-new-customer",
                  ]
                )
                <ul class="dropdown-menu dropdown-default" role="menu">
                  @can("edit-new-customer")
                    <li><a class="dropdown-item" href="{{url('admin/customers/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                  @endcan
                    <!--<li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/customers/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>-->
                </ul>
                @endcanany
            </div>
		</td>
			 @php $paymentmode = DB::table('slj_txns')->where('customer_id', $datarow->id)->first(); @endphp
		
		<?php if($datarow->current_status == 'failed'){ ?>
        <td><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/'.$paymentmode->payment_mode.'')}}" title='customer paid' class="btn btn-success btn-sm">Payment History</a></td>
		<?php }if($datarow->current_status == 'new'){ ?>
		<td>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/Payment Gateway')}}" title='proceed to pay online' class="btn btn-primary btn-sm">Pay Online</a></p>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/Cash')}}" title='proceed to pay by cash' class="btn btn-primary btn-sm">Pay by Cash</a></p>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/Cheque')}}" title='proceed to pay by cheque' class="btn btn-primary btn-sm">Pay by Cheque</a></p>
		
		
		</td>
		<?php } else { ?>
		<td></td>
		
		
		<?php
		}
			$path = asset('uploads/default-image.png');
			
			$src = asset('public/uploads/customers/photos/'.$datarow->customer_pic);
			if($datarow->customer_pic !=''){
				$path = $src;
			}	
		?>
		<td><img src="{{asset($path)}}" width="50"></td>
		  @php $cus = DB::table('users')->where('id', $datarow->user_id)->first(); @endphp
		  
    <td>{{ $cus->name }}</td>
		<td>{{ $cus->mobile }}</td>
		<td>@can("customer-detail-in-new-customer")<a href="{{url('admin/customers/view/general-info/'.$datarow->id.'/view-general-info')}}" > <i class="fa fa-eye" aria-hidden="true"></i> </a> @endcan{{ $cus->email }} </td>
	
		<td>
		    
		  @php $cus = DB::table('slj_connection_types')->where('id', $datarow->connection_type)->first(); @endphp
		{{ $cus->title }}
		</td>
		<td><?php if(!empty($datarow->created_at)){echo date("d-m-Y",strtotime($datarow->created_at));} ?></td>

		</tr>
    @endforeach
    @else
	<tr>
		<td colspan="11">No Records Found</td>
	</tr>	
    @endif
	  <?php
	 } else { 
	  
        
	 $v=1;  $w="new";
	$k="activation"
	?>
	  @php $data1 = DB::table('slj_customers')->where('eid', $user_id)->where('current_status','=',$w)->get(); @endphp
    @if(count($data1)>0)
	@foreach ($data1 as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                @canany(
                  [
                    "edit-new-customer",
                  ]
                )
                <ul class="dropdown-menu dropdown-default" role="menu">
                  @can("edit-new-customer")
                    <li><a class="dropdown-item" href="{{url('admin/customers/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                  @endcan
                    <!--<li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/customers/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>-->
                </ul>
                @endcanany
            </div>
		</td>
			 @php $paymentmode = DB::table('slj_txns')->where('customer_id', $datarow->id)->first(); @endphp
		
		<?php if($datarow->current_status == 'failed'){ ?>
        <td><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/'.$paymentmode->payment_mode.'')}}" title='customer paid' class="btn btn-success btn-sm">Payment History</a></td>
		<?php }if($datarow->current_status == 'new'){ ?>
		<td>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/Payment Gateway')}}" title='proceed to pay online' class="btn btn-primary btn-sm">Pay Online</a></p>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/Cash')}}" title='proceed to pay by cash' class="btn btn-primary btn-sm">Pay by Cash</a></p>
		<p><a href="{{url('admin/customers/process-payment/'.$datarow->id.'/Cheque')}}" title='proceed to pay by cheque' class="btn btn-primary btn-sm">Pay by Cheque</a></p>
		
		
		</td>
		<?php } else { ?>
		<td></td>
		
		
		<?php
		}
			$path = asset('uploads/default-image.png');
			
			$src = asset('public/uploads/customers/photos/'.$datarow->customer_pic);
			if($datarow->customer_pic !=''){
				$path = $src;
			}	
		?>
		<td><img src="{{asset($path)}}" width="50"></td>
		  @php $cus = DB::table('users')->where('id', $datarow->user_id)->first(); @endphp
		  
    <td>{{ $cus->name }}</td>
		<td>{{ $cus->mobile }}</td>
		<td>@can("customer-detail-in-new-customer")<a href="{{url('admin/customers/view/general-info/'.$datarow->id.'/view-general-info')}}" > <i class="fa fa-eye" aria-hidden="true"></i> </a> @endcan{{ $cus->email }} </td>
	
		<td>{{ $datarow->connection_type }}</td>
		<td><?php if(!empty($datarow->created_at)){echo date("d-m-Y",strtotime($datarow->created_at));} ?></td>

		</tr>
    @endforeach
    @else
	<tr>
		<td colspan="11">No Records Found</td>
	</tr>	
    @endif
    <?php } ?>
	</table>
{{ $data->links() }}
	</div>
  </div>
  
  
  <script type="text/javascript">
	$(document).ready(function() {
  $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/"+city,
                type: "GET",
                success:function(data) {
                   $('#distributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
		
		
		/*$('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });*/
		
		 $('#distributor').on('change', function() {
            var distributor = $(this).val();  
				
            if(distributor == '' || distributor <=0){
            	$('#subdistributor').html("<option value=''>-- Select Sub Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/subdistributors')}}/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#subdistributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); 
		
		 $('#subdistributor').on('change', function() {
            var subdistributor = $(this).val();  
				
            if(subdistributor == '' || subdistributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/branches')}}/"+subdistributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); 

        $('#branch').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
            if(branch == '' || branch <=0){
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                   $('#franchise').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
   });
  
  </script>
	
		  
@stop
