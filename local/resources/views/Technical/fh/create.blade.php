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
	<div class="card-header py-3">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Create FH</h3></div>
	 
	</div>
	
	
	<div class="card-body">
	  @if(Session::has('flash_message'))
			<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
 <?php
	    $user = Auth::user();
              $roles = $user->getRoleNames();
              if($roles[0]=='superadmin')
              {
                  ?>
	  
	  
	  {!! Form::open(['route' =>['fh.store'],'method'=>'post'])!!}
	      @csrf
			
			<div class="row">
			<?php if($roles[0]!='branch' && $roles[0]!='franchise'){ ?>
			<div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
						        {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
			<div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
        {!! Form::select('distributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor') !!}
        {!! Form::select('subdistributor', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>
			
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
        {!! Form::select('branch', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
		
		<?php } if( $roles[0]=='branch' || $roles[0]=='superadmin' ){ ?>
		<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
        {!! Form::select('franchise', $franchise, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>


                           <?php } ?>
		<div class="form-group col-md-3"> {!! Form::label('fiber', 'Fiber') !!}
        {!! Form::select('fiber', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('fiber_color', 'Fiber Color') !!}
        {!! Form::select('fiber_color', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber Color --') ) !!} </div>
			
		<div class="form-group col-md-3"> {!! Form::label('olt_id', 'OLT Id') !!}
        {!! Form::select('olt_id', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT ID --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('dp_num', 'DP Id') !!}
        {!! Form::select('dp_num', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select DP --') ) !!} </div>
		
		<?php $splitters = array(); ?>	
		<div class="form-group col-md-3"> {!! Form::label('splitter_core', 'DP Splitter Core') !!}
        {!! Form::select('splitter_core', $splitters, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter Core --') ) !!} </div>
        
        <div class="form-group col-md-3"> {!! Form::label('generate_fh_id', 'Generate FH Id') !!}
        {!! Form::text('generate_fh_id',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Generate FH Id')) !!} </div>
		
		<?php $splittersd = array("8"=>"1:8","16"=>"1:16"); ?>	
	
		<div class="form-group col-md-3"> {!! Form::label('splitter', 'Splitter Type') !!}
        {!! Form::select('splitter', $splittersd, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter --') ) !!} </div>
        
        <div class="form-group col-md-3"> {!! Form::label('splitter_serialno', 'Splitter Serial Number') !!}
        {!! Form::select('splitter_serialno', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter --') ) !!} </div>
		
		
		    <div class="form-group col-md-3"> {!! Form::label('termination_box', 'Termination Box ') !!}
        {!! Form::select('termination_box', $terminationbox, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Termination Box --') ) !!} </div>
		
		 <div class="form-group col-md-3"> {!! Form::label('termination_box_serial_no', 'Termination Box Serial No') !!}
		 <select name="termination_box_serial_no" id="termination_box_serial_no" class="form-control" required>
                <option value="">--Select Termination Box Serial No--</option>
                 @foreach($getdata as $p)
          
               <option value="{{$p}}" >{{$p}}</option>
                @endforeach
            </select>
			</div>
	
		<!--<div class="form-group col-md-3"> {!! Form::label('termination_box_serial_no', 'Termination Box Serial No') !!}
        {!! Form::select('termination_box_serial_no', $terminationbox, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Termination Box --') ) !!} </div>-->
	
		
		<div class="form-group col-md-3"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map1','required'=>'required','placeholder'=>'Enter Latitude & Longitude')) !!} 
        <a class="btn btn-sm btn-warning getMap" map_num='1'>Get</a></div>
		
		
		</div>
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!}
      <?php }  else { 	$user_id = Auth::user()->id;?>
	  
	  {!! Form::open(['route' =>['fh.store'],'method'=>'post'])!!}
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
		
		<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor') !!}
         @php $userdetails1 = DB::table('slj_employees')->where('user_id', $user_id)->first(); @endphp
                         <?php
			    	$sdistgroup = array();
		 
     
            if(!empty($userdetails1->subdistributor)){
			$sdistgroup = explode(",",$userdetails1->subdistributor);
						
				$ssd=count($sdistgroup);				
							
            }
            ?>
             <select name="subdistributor" id="subdistributor" class="form-control" required>
                <option value="">--Select Branch--</option>
                 @foreach($sdistgroup as $ps)
            @php $user = DB::table('slj_subdistributors')->where('id', $ps)->first(); @endphp;
           <?php 
           if($ssd>1)
           {
           ?>
            <option value="{{$ps}}">{{$user->subdistributor_name}}</option>
            <?php } else { ?>
              <option value="{{$ps}}" selected>{{$user->subdistributor_name}}</option>
            
            <?php } ?>
                @endforeach
            </select>
        </div>
			<div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
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
							$sizev=count($franchgroup);
								
							
            }
            ?>
            
            <select name="franchise" id="franchise" class="form-control" required>
                <?php
                if($sizev<=1)
                {
                    ?>
                 @foreach($franchgroup as $p)
            @php $user = DB::table('slj_franchises')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}" selected>{{$user->franchise_name}}</option>
                @endforeach
                ?>
                <?php } else { ?>
                <option value="">--Select Franchise--</option>
                 @foreach($franchgroup as $p)
            @php $user = DB::table('slj_franchises')->where('id', $p)->first(); @endphp;
               <option value="{{$p}}">{{$user->franchise_name}}</option>
                @endforeach
                <?php } ?>
            </select>

        </div>


                        
      
                                                       
                                                       
		<div class="form-group col-md-3"> {!! Form::label('fiber', 'Fiber') !!}
        {!! Form::select('fiber', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('fiber_color', 'Fiber Color') !!}
        {!! Form::select('fiber_color', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Fiber Color --') ) !!} </div>
			
		<div class="form-group col-md-3"> {!! Form::label('olt_id', 'OLT Id') !!}
        {!! Form::select('olt_id', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT ID --') ) !!} </div>
		
		<div class="form-group col-md-3"> {!! Form::label('dp_num', 'DP Id') !!}
        {!! Form::select('dp_num', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select DP --') ) !!} </div>
		
		<?php $splitters = array(); ?>	
		<div class="form-group col-md-3"> {!! Form::label('splitter_core', 'Splitter Core') !!}
        {!! Form::select('splitter_core', $splitters, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter Core --') ) !!} </div>
        
        <div class="form-group col-md-3"> {!! Form::label('generate_fh_id', 'Generate FH Id') !!}
        {!! Form::text('generate_fh_id',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Generate FH Id')) !!} </div>
		
	
		<div class="form-group col-md-3"> {!! Form::label('splitter', 'Splitter') !!}
        {!! Form::select('splitter', $splitters, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Splitter --') ) !!} </div>
		
          <div class="form-group col-md-3"> {!! Form::label('termination_box', 'Termination Box ') !!}
        {!! Form::select('termination_box', $terminationbox, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Termination Box --') ) !!} </div>
	
		<!--<div class="form-group col-md-3"> {!! Form::label('termination_box_serial_no', 'Termination Box Serial No') !!}
        {!! Form::select('termination_box_serial_no', $terminationbox, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Termination Box --') ) !!} </div>-->
		
		 <div class="form-group col-md-3"> {!! Form::label('termination_box_serial_no', 'Termination Box Serial No') !!}
		 <select name="termination_box_serial_no" id="termination_box_serial_no" class="form-control" required>
                <option value="">--Select Termination Box Serial No--</option>
                 @foreach($getdata as $p)
          
               <option value="{{$p}}" >{{$p}}</option>
                @endforeach
            </select>
			</div>
	
			
		
		
		<div class="form-group col-md-3"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
        {!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map1','required'=>'required','placeholder'=>'Enter Latitude & Longitude')) !!} 
        <a class="btn btn-sm btn-warning getMap" map_num='1'>Get</a></div>
		
		
		</div>
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!}
      <?php } ?>

	</div>
  </div>
	
		<script>
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
	
	
	
	$(document).ready(function() {
	<?php
        	if($roles[0]=='franchise'){
        	echo("getFiber($franchise_id);");
        	}
        	if($roles[0]=='branch'){
        	}
        	?>
        $('#city').on('change', function() {
            var city = $(this).val();
            if(city == '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/"+city,
                type: "GET",
                success:function(data) {
                   $('#distributor').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   // alert(errorThrown);
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
                   // alert(errorThrown);
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
                    //alert(errorThrown);
                }
            });
        }); 
		
		/*$('#distributor').on('change', function() {
            var distributor = $(this).val();
            var city = $("#city").val();
            if(distributor == '' || distributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				$('#franchise').html("<option value=''>-- Select Franchise --</option>");
				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
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
        function getFranchise(city, branch){
        if(branch == '' || branch <=0){
                    	$('#franchise').html("<option value=''>-- Select Franchise --</option>");
        				$('#fiber').html("<option value=''>-- Select Fiber --</option>");
        				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
                    	return;
                    }
                    $.ajax({
                        url: "{{url('/admin/customers/branch-franchises')}}/"+city+"/"+branch,
                        type: "GET",
                        success:function(data) {
                           $('#franchise').html(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                           // alert(errorThrown);
                        }
                    });
        }
        $('#branch').on('change', function() {
            var city = $("#city").val();
            var branch = $(this).val();
            getFranchise(city, branch);
        });

        function getFiber(franchise){
        if(franchise == '' || franchise <=0){
                    	$('#fiber').html("<option value=''>-- Select Fiber --</option>");
        				$('#olt_id').html("<option value=''>-- Select OLT ID --</option>");
        				//$('#dp_num').html("<option value=''>-- Select DP --</option>");
                    	return;
                    }
        			$.ajax({
                        url: "{{url('/admin/fiber-laying/franchise-fibers')}}/"+franchise+"/fh",
                        type: "GET",
                        success:function(data) {
                           $('#fiber').html(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            //alert(errorThrown);
                        }
                    });

        			$.ajax({
                        url: "{{url('/admin/olt/franchise-olts')}}/"+franchise,
                        type: "GET",
                        success:function(data) {
                           $('#olt_id').html(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                           // alert(errorThrown);
                        }
                    });

        			/*
                    $.ajax({
                        url: "{{url('/admin/dp/franchise-dps')}}/"+franchise,
                        type: "GET",
                        success:function(data) {
                           $('#dp_num').html(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                    */
        }
		$('#franchise').on('change', function() {
            var franchise = $(this).val();
//            alert(franchise);
			getFiber(franchise);
        });
		
		$('#fiber').on('change', function() {
            var fiber = $(this).val();
			if(fiber == '' || fiber <=0){
            	$('#fiber_color').html("<option value=''>-- Select Fiber Color --</option>");
				return;
            }
			$.ajax({
                url: "{{url('/admin/fiber-laying/fiber-fibercolors')}}/"+fiber,
                type: "GET",
                success:function(data) {
                   $('#fiber_color').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
        });

        $('#olt_id').on('change', function() {
            var olt_id = $(this).val();
			if(olt_id == '' || olt_id <=0){
            	$('#dp_num').html("<option value=''>-- Select DP --</option>");
				return;
            }
			$.ajax({
                url: "{{url('/admin/olt/dp-ids')}}/"+olt_id,
                type: "GET",
                success:function(data) {
                   $('#dp_num').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                   // alert(errorThrown);
                }
            });
        });
			
		$('#dp_num').on('change', function() {
            var dp_num = $("#dp_num").val();
			var dp_port = $("#dp_port").val();
            var dp_num_text = $("#dp_num option:selected").text();
            var splitter_core = $("#splitter_core").val();
            

            if(dp_num > 0){
                $.ajax({
                    url: "{{url('/admin/fh/dpcolors')}}/"+dp_num,
                    type: "GET",
                        success:function(data) {
                            $('#splitter_core').html(data);
                        },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        //alert(errorThrown);
                    }
                });
            }else{
                $('#splitter_core').html("<option value=''>-- Select Splitter Core --</option>");
            }
              if(dp_num > 0){
                $.ajax({
                    url: "{{url('/admin/fh/dpcolorsextra')}}/"+dp_num,
                    type: "GET",
                        success:function(data) {
                            $('#splitter').html(data);
                        },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        //alert(errorThrown);
                    }
                });
            }
			
            if(dp_num_text != '' && splitter_core !=''){
                //alert(dp_num_text+'/'+splitter_core);
				$("#generate_fh_id").val(dp_num_text+'/'+splitter_core);
                //$("#generate_fh_id").val('dfds fsdfds/rgdfgd');
			}else{
				$("#generate_fh_id").val('');
			}	
		});	
        
        	$('#splitter').on('change', function() {
            var splitter = $(this).val();
            var franch=$('#franchise').val();
           // alert(franch);
          //alert(splitter); 
        			$.ajax({
                        url: "{{url('/admin/fh/split')}}/"+splitter+"/"+franch,
                        type: "GET",
                        success:function(data) {
                          //alert(data);
                          $('#splitter_serialno').html(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                           // alert(errorThrown);
                        }
                    });
		
        });
	$('#termination_box').on('change', function() {
            var pid = $(this).val();
            var franch=$('#franchise').val();
           // alert(franch);
          //alert(splitter); 
        			$.ajax({
                        url: "{{url('/admin/fh/termination')}}/"+pid+"/"+franch,
                        type: "GET",
                        success:function(data) {
                          //alert(data);
                        $('#termination_box_serial_no').html(data);
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                           // alert(errorThrown);
                        }
                    });
		
        });

        $('#splitter_core').on('change', function() {
            var dp_num_text = $("#dp_num option:selected").text();
            var splitter_core = $("#splitter_core").val();
		
			if(dp_num_text != '' && splitter_core !=''){
                //alert(dp_num_text+'/'+splitter_core);
				$("#generate_fh_id").val(dp_num_text+'/'+splitter_core);
                //$("#generate_fh_id").val('dfds fsdfds/rgdfgd');
                //$('#splitter').html("<option value=''>-- Select Splitter  --</option>");
			}else{
				$("#generate_fh_id").val('');
			}	
		});	
		
		
		
		
        //$('#city').val({{old('city')}}).trigger('change'); 	/* $splitters = array("1:8"=>"1:8","1:16"=>"1:16"); */
        
    });
</script>  
@stop
