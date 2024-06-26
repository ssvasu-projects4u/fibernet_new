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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create Fiber Laying</h3></div>
	  
	</div>
	
	
	<div class="card-body">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	   <div class="alert alert-danger alert-dismissible fade show">
	 
	       @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  <?php
	  $user = Auth::user();
          $roles = $user->getRoleNames();
          if($roles[0]=='superadmin')
          {
              
    ?>
	  
	  {!! Form::open(['route' =>['fiber-laying.store'],'method'=>'post','id'=>'create-fiber-laying'])!!}
	      @csrf
			
			<div class="row">
                         
				<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor*') !!}
        {!! Form::select('subdistributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
                           
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
        {!! Form::select('franchise', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
		
		
                           
			
		
			<div class="form-group col-md-3"> {!! Form::label('fiber_name', 'Fiber Name') !!}
        {!! Form::text('fiber_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Name')) !!} </div>
			
			
		
		<div class="form-group col-md-3"> {!! Form::label('fiber_company_name1', 'Fiber Company Name') !!}
        {!! Form::select('fiber_company_name1',$fiber_company_names,null, array('class' => 'form-control','required'=>'required','placeholder'=>'select Fiber Company Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('fiber_code1', 'Fiber Drum Number(Code)') !!}
        {!! Form::select('fiber_code1', [],null, array('class' => 'form-control','required'=>'required')) !!} </div>
		<input type="hidden" name="fibercode_id" id="fibercode_id">
		<?php $fiber_to_items = array('dpd'=>'DPD','dp'=>'DP','fh'=>'FH', 'main_line' => 'Main Line'); ?>
		<div class="form-group col-md-3"> {!! Form::label('fiber_to', 'Fiber Related To') !!}
        {!! Form::select('fiber_to', $fiber_to_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
		
		<?php $fiber_core_items = array('2'=>'2','4'=>'4','6'=>'6','8'=>'8','12'=>'12','24'=>'24','48'=>'48'); ?>
		<div class="form-group col-md-6"> {!! Form::label('fiber_core', 'Fiber Core') !!}
        {!! Form::select('fiber_core', $fiber_core_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
		
		<div class="form-group col-md-6"> {!! Form::label('route_description', 'Route Description') !!}
        {!! Form::text('route_description',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Route Description')) !!} </div>
		
		
		<div class="form-group col-md-12"> {!! Form::label('fiber_color', 'Fiber Color') !!}
        <div class="row">
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input  class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="blue"> Blue </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="orange"> Orange </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="green"> Green </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="brown"> Brown </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="slate"> Slate </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="white"> White </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="red"> Red </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="black"> Black </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="yellow"> Yellow </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="violet"> Violet </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="rose"> Rose </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="aqua"> Aqua </label>	
									</div>	
									</div>
									</div>

									<div class="col-md-6 form-group"> {!! Form::label('fiber_starting_reading1', 'Fiber Start Reading') !!}
        {!! Form::select('fiber_starting_reading1',[],null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Start Reading')) !!} </div>
		<div class="col-md-6 form-group"> {!! Form::label('fiber_starting_long_lat', 'Fiber Start Lat & Long') !!}
        {!! Form::text('fiber_starting_long_lat',null, array('class' => 'form-control','id'=>'map1','required'=>'required','placeholder'=>'Enter Start Latitude & Longitude')) !!} <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="1">Get</a></div>
		
		
			
		
			<div class="col-md-12 form-group">{!! Form::label('poles_info', 'Enter and Add Poles Data Here') !!}
			<table class="table" width="100%" id="dynamic_field" style="border: 1px solid #ccc">
											<thead>
												<tr class="bg-dark text-white">
													<th style="width:200px">Pole Series</th>
													<th style="width:300px">Lat & Longitude</th>
													<th style="width:100px"> </th>
													<th style="width:200px">Loop? </th>
													<th style="width:200px">Loop(Meters)</th>
													<th style="width:200px">Actions</th>
												</tr>
											</thead>

											<tbody>
																			
													<tr> 
	<input type="hidden" value="" id="fiber_endreading_value" name="fiber_endreading_value">
				<input type="hidden" value="" id="fiber_startreading_value" name="fiber_startreading_value">
		
														<input type="hidden"  id="polescount" name="count" value="1" /> 

														<td> 
															<input type="text" id="pole_series" class="form-control name_list" name="pole_series[]" value="Pole 1" />

														</td>

														<td> <input type="text" id="map3" class="form-control name_list" name="pole_long_lat[]"/> </td>

														<td> <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num='3' id="long_lat3">Get</a> </td>

														<td> <input type="checkbox" class="pole_loop_adding" id="check0"  name="loop_on[]" value="1"> </td>

														<td>
															<div class="max_tickets0"> 
																<input type="text" class="form-control" name="loop_meters_num[]" id="checkbox0">
															</div>
														</td>

														<td><button type="button" id="add" name="add" class="btn btn-primary btn-sm ph15"> Add Pole </button></td>
													</tr>  
												
											</tbody>
										</table>
									</div>
									
									
									<div class="col-md-6 form-group"> {!! Form::label('1', 'Fiber End Reading1') !!}
        {!! Form::text('fiber_ending_reading1',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Ending Reading')) !!} </div>
		
		<div class="col-md-6 form-group"> 
                     {!! Form::label('ending_long_lat', 'Fiber End Lat & Long') !!}
            {!! Form::text('ending_long_lat',null, array('class' => 'form-control','id'=>'map11','required'=>'required','placeholder'=>'Enter End Latitude & Longitude')) !!} 
        
            <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="11">Get</a>
                </div>
		
		</div>
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  
<?php } else {
$user_id = Auth::user()->id;
	if(isset($_GET['fiber_code1'])){$fiber_codes = $_GET['fiber_code1'];}else{$fiber_codes = null;}

?>
<!-- Start employee code here -->

  {!! Form::open(['route' =>['fiber-laying.store'],'method'=>'post','id'=>'create-fiber-laying'])!!}
	      @csrf
			
			<div class="row">
                           
				<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
				  @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$citygroup = array();
			    	 
          
            if(!empty($userdetails1->city)){
                
								$citygroup = explode(",",$userdetails1->city);
						
								
							
            }
            $size=count($citygroup);
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
                <option value="">--Select City--</option>
                 @foreach($citygroup as $p)
            @php $user = DB::table('slj_cities')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}" selected>{{$user->name}}</option>
                @endforeach
            </select>
            <?php } ?>
						         </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor1', 'Distributor') !!}
			   @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$distgroup = array();
		 
     
            if(!empty($userdetails1->distributor)){
			$distgroup = explode(",",$userdetails1->distributor);
						
								$sd=count($distgroup);		
							
            }
            ?>
              <select name="distributor" id="distributor" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($distgroup as $p)
            @php $user = DB::table('slj_distributors')->where('id', $p)->first(); @endphp;
           <?php 
           if($sd>1)
           {
           ?>
            <option value="{{$p}}">{{$user->distributor_name}}</option>
            <?php } else { ?>
              <option value="{{$p}}" selected>{{$user->distributor_name}}</option>
            
            <?php } ?>
                @endforeach
            </select>
        </div>
		
		<div class="form-group col-md-3"> {!! Form::label('subdistributor1', 'Distributor') !!}
			   @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$distgroup = array();
		 
     
            if(!empty($userdetails1->subdistributor)){
			$distgroup = explode(",",$userdetails1->subdistributor);
						
								$sd=count($distgroup);		
							
            }
            ?>
              <select name="subdistributor" id="subdistributor" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($distgroup as $p)
            @php $user = DB::table('slj_subdistributors')->where('id', $p)->first(); @endphp;
           <?php 
           if($sd>1)
           {
           ?>
            <option value="{{$p}}">{{$user->subdistributor_name}}</option>
            <?php } else { ?>
              <option value="{{$p}}" selected>{{$user->subdistributor_name}}</option>
            
            <?php } ?>
                @endforeach
            </select>
        </div>
			
                            <div class="form-group col-md-3"> {!! Form::label('branch1', 'Branch') !!}
                              @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$branchesgroup = array();
			    	 
          
            if(!empty($userdetails1->branch)){
                
								$branchesgroup = explode(",",$userdetails1->branch);
						$sizeb=count($branchesgroup);
				
							
            }
                ?>
            
            <select name="branch" id="branch" class="form-control" required>
                  <?php
                if($sizeb<=1)
                {
                ?>
                 @foreach($branchesgroup as $p)
            @php $user = DB::table('slj_branches')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}">{{$user->branch_name}}</option>
                @endforeach
                <?php } else { ?>
                <option value="">--Select Branch--</option>
                 @foreach($branchesgroup as $p)
            @php $user = DB::table('slj_branches')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}">{{$user->branch_name}}</option>
                @endforeach
                <?php } ?>
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
		
		
                         
			
		
			<div class="form-group col-md-3"> {!! Form::label('fiber_name', 'Fiber Name') !!}
        {!! Form::text('fiber_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Name')) !!} </div>
			
			
		
		<div class="form-group col-md-3"> {!! Form::label('fiber_company_name1', 'Fiber Company Name') !!}
        {!! Form::select('fiber_company_name1',$fiber_company_names,null, array('class' => 'form-control','required'=>'required','placeholder'=>'select Fiber Company Name')) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('fiber_code1', 'Fiber Drum Number(Code)') !!}
        {!! Form::select('fiber_code1', [],null, array('class' => 'form-control','required'=>'required')) !!} </div>
    	<input type="hidden" name="fibercode_id" id="fibercode_id">
		<?php $fiber_to_items = array('dpd'=>'DPD','dp'=>'DP','fh'=>'FH', 'main_line' => 'Main Line'); ?>
		<div class="form-group col-md-3"> {!! Form::label('fiber_to', 'Fiber Related To') !!}
        {!! Form::select('fiber_to', $fiber_to_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>
		
    <!-- $fiber_core_items = array('2'=>'2','4'=>'4','6'=>'6','8'=>'8','12'=>'12','24'=>'24','48'=>'48'); -->
		<div class="form-group col-md-6"> {!! Form::label('fiber_core', 'Fiber Core') !!}
        {!! Form::select('fiber_core',[], null,array('class' => 'form-control','required'=>'required') ) !!} </div>
		
		<div class="form-group col-md-6"> {!! Form::label('route_description', 'Route Description') !!}
        {!! Form::text('route_description',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Route Description')) !!} </div>
		
		
		<div class="form-group col-md-12"> {!! Form::label('fiber_color', 'Fiber Color') !!}
        <div class="row">
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input  class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="blue"> Blue </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="orange"> Orange </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="green"> Green </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="brown"> Brown </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="slate"> Slate </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="white"> White </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="red"> Red </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="black"> Black </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="yellow"> Yellow </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="violet"> Violet </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="rose"> Rose </label>
									</div>
									<div class="col-md-2">
										<label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="aqua"> Aqua </label>	
									</div>	
									</div>
									</div>

									<div class="col-md-3 form-group"> {!! Form::label('fiber_starting_reading1', 'Fiber Start Reading') !!}
        {!! Form::select('fiber_starting_reading1',[],null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Start Reading')) !!} </div>
       
		<div class="col-md-6 form-group"> {!! Form::label('fiber_starting_long_lat', 'Fiber Start Lat & Long') !!}
        {!! Form::text('fiber_starting_long_lat',null, array('class' => 'form-control','id'=>'map1','required'=>'required','placeholder'=>'Enter Start Latitude & Longitude')) !!} <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="1">Get</a></div>
		
		
			<input type="hidden" value="" id="fiber_endreading_value" name="fiber_endreading_value">
				<input type="hidden" value="" id="fiber_startreading_value" name="fiber_startreading_value">
		
			<div class="col-md-12 form-group">{!! Form::label('poles_info', 'Enter and Add Poles Data Here') !!}
			<table class="table" width="100%" id="dynamic_field" style="border: 1px solid #ccc">
											<thead>
												<tr class="bg-dark text-white">
													<th style="width:200px">Pole Series</th>
													<th style="width:300px">Lat & Longitude</th>
													<th style="width:100px"> </th>
													<th style="width:200px">Loop? </th>
													<th style="width:200px">Loop(Meters)</th>
													<th style="width:200px">Actions</th>
												</tr>
											</thead>

											<tbody>
																			
													<tr> 

														<input type="hidden"  id="polescount" name="count" value="1" /> 

														<td> 
															<input type="text" id="pole_series" class="form-control name_list" name="pole_series[]" value="Pole 1" />

														</td>

														<td> <input type="text" id="map3" class="form-control name_list" name="pole_long_lat[]"/> </td>

														<td> <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num='3' id="long_lat3">Get</a> </td>

														<td> <input type="checkbox" class="pole_loop_adding" id="check0"  name="loop_on[]" value="1"> </td>

														<td>
															<div class="max_tickets0"> 
																<input type="text" class="form-control" name="loop_meters_num[]" id="checkbox0">
															</div>
														</td>

														<td><button type="button" id="add" name="add" class="btn btn-primary btn-sm ph15"> Add Pole </button></td>
													</tr>  
												
											</tbody>
										</table>
									</div>
					
						

							
									<div class="col-md-6 form-group"> {!! Form::label('fiber_ending_reading1', 'Fiber End Reading') !!}
        {!! Form::text('fiber_ending_reading1',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Ending Reading')) !!} </div>
		
		<div class="col-md-6 form-group"> 
                     {!! Form::label('ending_long_lat', 'Fiber End Lat & Long') !!}
            {!! Form::text('ending_long_lat',null, array('class' => 'form-control','id'=>'map11','required'=>'required','placeholder'=>'Enter End Latitude & Longitude')) !!} 
        
            <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="11">Get</a>
                </div>
		
		</div>
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 

<?php }?>
	</div>
  </div>
	<script>
	    	$('#fiber_company_name1').on('change', function() {
            var fiber_company_name = $(this).val();
           // alert(fiber_company_name);
            if(fiber_company_name == ''){
            	$('#fiber_code1').html("<option value=''>-- Select Drum Number --</option>");
			
            	return;
            }
            $.ajax({
                url: "{{url('/admin/inventory/stocks/drum_numbers')}}/"+fiber_company_name,
                type: "GET",
                success:function(data) {
                  // alert(data);
                   $('#fiber_code1').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
	</script>
	<script>
	    
	</script>
	
		<script type="text/javascript">
	var x = document.getElementById("demo");

	function getCurrentLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) 
	{       
		//document.getElementById("long_lat").value =  position.coords.latitude+","+ position.coords.longitude;
                $('#map'+map_num).val(position.coords.latitude+","+ position.coords.longitude);
	}

	
	$(document).ready(function(){ 

		var check = ".max_tickets" + 0;
		$(check).hide();
		var i=3;  
		$('#add').click(function(){
			count=$('#dynamic_field tr').length;  
			i++;  
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="pole_series" class="form-control name_list" name="pole_series[]" value="Pole '+count+'" /></td><td><input type="text" name="pole_long_lat[]" id="map'+i+'" class="form-control name_list" /></td><td><a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="'+i+'" name="get[]" id="long_lat'+i+'" >Get</a></td><td><input type="checkbox" class="pole_loop_adding" id="check'+i+'"  name="loop_on[]" value="1"></td><td><div class="max_tickets'+i+'"><input type="text" name="loop_meters_num[]" class="form-control"></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm ph15 btn_remove">Delete Pole</button></td></tr>');

			var polecount = $('#polescount');
			var poleValue = polecount.val();
			poleValue++;
			polecount.val(poleValue);


			var check = ".max_tickets" + i;
			$(check).hide();

		});  

	}); 

	$(document).on('click', '.btn_remove', function(){  
		var button_id = $(this).attr("id");   
		$('#row'+button_id+'').remove();  

		var polecount = $('#polescount');
		var poleValue = polecount.val();
		poleValue--;
		polecount.val(poleValue);

		var x = document.getElementsByClassName("polesnew");
		var i;

		for (i = 0; i < x.length; i++) {
			var val = i + 2;
			x[i].innerHTML = "Pole " + val;

		}

	});


	$(document).on('change', '[type=checkbox]', function (e) {
		var idNum = $(this).attr("id").replace(/\D/g,''); 
		var check = ".max_tickets" + idNum;

		if($(this).is(":checked")) {
			$(check).show();

		}else{
			$(check).hide();
		} 

	});





	$(document).on('click', '.getLocation', function(){  

		var idNum = $(this).attr("id").replace(/\D/g,''); 
		var check = "loc" + idNum;

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}


		function showPosition(position) 
		{
			document.getElementById(check).value = position.coords.latitude+","+position.coords.longitude;
		}

	});


	$(document).ready(function() {
        $('#city').on('change', function() {
            var city = $(this).val();
            //alert(city);
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
	});
	</script>
		<script>
		
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
              //alert(city);
            if(distributor == '' || distributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				$('#franchise').html("<option value=''>-- Select Franchise --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                    //alert(data);
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
		}); */
	</script>
	<script>
	
        $('#branch').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
           // alert(branch);
          //  alert(city);
            if(branch == '' || branch <=0){
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data) {
                    //alert(data);
                   $('#franchise').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
     
    </script>
		
		
   <script>  
            
            
            
            
            

	
		
		$('#fiber_core').change(function() {
			$('.fiber_color').each(function(){
				$(this).prop("checked", 0);	
			});		
		});	
			$('#fiber_core1').change(function() {
			$('.fiber_color').each(function(){
				$(this).prop("checked", 0);	
			});		
		});	
		
		$('.fiber_color').change(function() {
			var colors = 0;
			$('.fiber_color').each(function(){
				if($(this).is(':checked')){
					colors = colors + 1;
				}	
			});	
			
			if(colors > $('#fiber_core').val()){
				$(this).prop("checked", 0);
				alert('Reached Maximum Limit. Fiber Core Limit is '+$('#fiber_core').val());
				return false;
			}	
				if(colors > $('#fiber_core1').val()){
				$(this).prop("checked", 0);
				alert('Reached Maximum Limit. Fiber Core Limit is '+$('#fiber_core1').val());
				return false;
			}	
			//alert(colors);  
		});
		
		
        //$('#city').val({{old('city')}}).trigger('change');
       	$('#fiber_code1').change(function() {
			 var fiber_code = $(this).val();
			 $('#fibercode_id').val(fiber_code);
			 var dataval='';
			 if(fiber_code == ''){
            	
            	$('fiber_starting_reading1').val()="";
            	return;
            }
            $.ajax({
                url: "{{url('/admin/inventory/stocks/fiber_start')}}/"+fiber_code,
                type: "GET",
                success:function(data) {
                    dataval=1;
                    if(dataval==1)
                    {
                  passdata(data);  
                    }
                  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(errorThrown);
                    	$('fiber_starting_reading1').val()="";
            	return;
                    }
            });
                
            function passfail()
            {
                alert('failed');
            }
            function passdata(data)  
            {
                 
              $.ajax({
                url: "{{url('/admin/inventory/stocks/fiber_start')}}/"+fiber_code,
                type: "GET",
                success:function(data) {
                    //alert(data);
                   $('#fiber_starting_reading1').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    
                }
            });
             $.ajax({
                url: "{{url('/admin/inventory/stocks/fiber_start1')}}/"+fiber_code,
                type: "GET",
                success:function(data) {
                    //alert(data);
                   $('#fiber_endreading_value').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
              $.ajax({
                url: "{{url('/admin/inventory/stocks/fiber_start2')}}/"+fiber_code,
                type: "GET",
                success:function(data) {
                  // alert(data);
                   $('#fiber_startreading_value').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
              $.ajax({
                
                url: "{{url('/admin/inventory/stocks/fiber_core')}}/"+fiber_code,
                type: "GET",
                success:function(data) {
                 //   alert(data);
                   $('#fiber_core').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
            }
           
            
       	});

		 /*  $('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/subdistributors')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#sub_distributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); */
</script>


@stop
