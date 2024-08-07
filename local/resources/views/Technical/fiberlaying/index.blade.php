<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];//exit;
    $layout='layouts.admin';
    if($roles[0]=='branch' || $roles[0]=='franchise'){
        //echo $roles[0];exit;
        $layout='layouts.'.$roles[0];    
    }
 ?> 
@extends($layout)
 
@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('technical.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Fiber Laying</h3></div>
	  
	</div>

	<?php 
		if(isset($_GET['city'])){$city_id = $_GET['city'];}else{$city_id = null;}
		if(isset($_GET['distributor'])){$distributor_id = $_GET['distributor'];}else{$distributor_id = null;}
		if(isset($_GET['subdistributor'])){$subdistributor_id = $_GET['subdistributor'];}else{$subdistributor_id = null;}
		if(isset($_GET['branch'])){$branch_id = $_GET['branch'];}else{$branch_id = null;}
		if(isset($_GET['franchise'])){$franchise_id = $_GET['franchise'];}else{$franchise_id = null;}
		if(isset($_GET['fiber_related_to'])){$fiber_related_to = $_GET['fiber_related_to'];}else{$fiber_related_to = null;}

    ?>
	
	<div class="card-body">
	<form method="GET" accept-charset="UTF-8">
	      			<div class="row">
		<?php if (in_array($role , ["superadmin"])) { ?>
					<div class="form-group col-md-3">
					{!! Form::label('city', 'City') !!}
				   {!! Form::select('city', $cities, $city_id,array('class' => 'form-control','placeholder'=>'-- Select City --') ) !!}
					</div>
			<div class="form-group col-md-3">
			 {!! Form::label('distributor', 'Distributor') !!}
             {!! Form::select('distributor', $distributors, $distributor_id,array('class' => 'form-control','placeholder'=>'-- Select Distributor --') ) !!} 
			 </div>
			 <div class="form-group col-md-3">
			 {!! Form::label('subdistributor', 'Sub Distributor') !!}
             {!! Form::select('subdistributor', $subdistributors, $subdistributor_id,array('class' => 'form-control','placeholder'=>'-- Select Sub Distributor --') ) !!} 
			 </div>
			<div class="form-group col-md-3">
			{!! Form::label('branch', 'Branch') !!}
           {!! Form::select('branch', $branches, $branch_id,array('class' => 'form-control','placeholder'=>'-- Select Branch --') ) !!}
		   </div>
		<?php } ?>

		<?php if (in_array($role, ["superadmin", "branch"])) { ?>
		<div class="form-group col-md-3">
		  {!! Form::label('franchise', 'Franchise') !!}
          {!! Form::select('franchise', $franchises, $franchise_id,array('class' => 'form-control','placeholder'=>'-- Select Franchise --') ) !!}
		</div>
		<?php } ?>
        <?php if(isset($_GET['fiber_to'])){$fiber_related_to=$_GET['fiber_to'];
         $fiber_to_items = array($fiber_related_to => $fiber_related_to, 'dpd'=>'DPD','dp'=>'DP','fh'=>'FH', 'main_line' => 'Main Line'); 
        }
		else	
			$fiber_to_items = array('' => '-- Select fiber related to --', 'dpd'=>'DPD','dp'=>'DP','fh'=>'FH', 'main_line' => 'Main Line'); ?>
			<div class="form-group col-md-3"> {!! Form::label('fiber_to', 'Fiber Related To') !!}
		
			{!! Form::select('fiber_to', $fiber_to_items, null,array('class' => 'form-control') ) !!} 
			</div>
			</div>
			{!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
		</form>
	
	
	</div>
	
	</div>

	
	<div class="card-body" style="padding:5px;">



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
	
	  <table class="table table-bordered">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>City</th>
		<th>Distributor</th>
		<th>subDistributor</th>
		<th>Branch</th>
		<th>Franchise</th>
		<th>Fiber Name</th>
		<th>Fiber To</th>
		<th>Fiber Laying Fiber Distance</th>
		<th>Company</th>
		<th>Fiber Code</th>
		<th>Fiber Core</th>
		<th>Created Date</th>
	  </tr>
	     <?php
	    $user = Auth::user();
              $roles = $user->getRoleNames();
              if($roles[0]=='superadmin' || $roles[0]=='Area Tech Incharge')
              {
                  ?>

	@foreach ($data as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

        @canany(
          [
            "edit-fiber-laying",
            "delete-fiber-laying",
            "view-fiber-laying",
          ]
        )
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("view-fiber-laying")
              <li><a class="dropdown-item" href="{{url('admin/fiber-laying/show/'.$datarow->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a></li>
            @endcan
            @can("edit-fiber-laying")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/fiber-laying/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-fiber-laying")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/fiber-laying/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            @endcan
          </ul>
          @endcanany
      </div>
		</td>
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->distributor_name }}</td>
		<td>{{ $datarow->subdistributor_name }}</td>
		<td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->fiber_name }}</td>
		<td>{{ ucwords(str_replace("_", " ", $datarow->fiber_to)) }}</td>
		<td><?php echo $datarow->fiber_laying_fiber_distance ? str_replace(".00","", $datarow->fiber_laying_fiber_distance) : "" ?></td>
		<td>{{ $datarow->fiber_company_name }}</td>
		<td>{{ $datarow->fiber_code }}</td>
		<td>{{ $datarow->fiber_core }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
    <?php } else { $user_id = Auth::user()->id;  
   	if(isset($_GET['fiber_related_to'])){$fiber_related_to = $_GET['fiber_related_to'];
    ?>
@php $data1 = DB::table('slj_fiber_laying')->where('user_id', $user_id)->where('fiber_to',$fiber_related_to)->get(); @endphp
<?php } else { ?>
    @php $data1 = DB::table('slj_fiber_laying')->where('user_id', $user_id)->get(); @endphp
    <?php } ?>
  
	@foreach ($data1 as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

        @canany(
          [
            "edit-fiber-laying",
            "delete-fiber-laying",
            "view-fiber-laying",
          ]
        )
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("view-fiber-laying")
              <li><a class="dropdown-item" href="{{url('admin/fiber-laying/show/'.$datarow->id)}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</a></li>
            @endcan
            @can("edit-fiber-laying")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/fiber-laying/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-fiber-laying")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/fiber-laying/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            @endcan
          </ul>
          @endcanany
      </div>
		</td>
	
            @php $user = DB::table('slj_cities')->where('id', $datarow->city)->first(); @endphp
            	<td>{{ $user->name }}</td>

  @php $user = DB::table('slj_distributors')->where('id', $datarow->distributor)->first(); @endphp
		<td>{{ $user->distributor_name }}</td>
	@php $user = DB::table('slj_subdistributors')->where('id', $datarow->subdistributor)->first(); @endphp
		<td>{{ $user->subdistributor_name }}</td>
		  @php $user = DB::table('slj_branches')->where('id', $datarow->branch)->first(); @endphp
		<td>{{ $user->branch_name }}</td>
	  @php $user = DB::table('slj_franchises')->where('id', $datarow->franchise)->first(); @endphp		
		<td>{{ $user->franchise_name }}</td>
		<td>{{ $datarow->fiber_name }}</td>
		<td>{{ ucwords(str_replace("_", " ", $datarow->fiber_to)) }}</td>
		<td><?php echo $datarow->fiber_laying_fiber_distance ? str_replace(".00","", $datarow->fiber_laying_fiber_distance) : "" ?></td>
		<td>{{ $datarow->fiber_company_name }}</td>
		<td>{{ $datarow->fiber_code }}</td>
		<td>{{ $datarow->fiber_core }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
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
				$('#subdistributor').html("<option value=''>-- Select Sub Distributor --</option>");
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
		
	/*	$('#distributor').on('change', function() {
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
        }); */

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
