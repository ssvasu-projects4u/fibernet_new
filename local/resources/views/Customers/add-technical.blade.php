<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];exit;
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
	   @include('customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Add Technial Details</h3></div>
	  
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
	  
	 
	  {!! Form::model($customerdetails, array('route' => array('customers.addtechnical', $customerdetails->id),'method'=>'put')) !!}
	       @csrf
	       <?php
	   $user = Auth::user();
        $roles = $user->getRoleNames();
        if($roles[0]=='superadmin')
        {
            
	  ?>
    
	      <div class="row">
	      <!--	
					<div class="form-group col-md-3"> {!! Form::label('olt', 'OLT') !!}
						        {!! Form::select('olt', $olt, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT --') ) !!} </div>
									
							 -->	
							<div class="form-group col-md-3"> {!! Form::label('dp', 'DP') !!}
				        {!! Form::select('dp', $dp, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select DP --') ) !!} </div>
				       

				        <div class="form-group col-md-3"> {!! Form::label('fh', 'FH') !!}
        {!! Form::select('fh', $fh, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select FH --') ) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('fh_port', 'FH Port') !!}
        {!! Form::select('fh_port', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select FH Port --') ) !!} </div>

         				
					
	<?php	if($connection_types[0] != 5)
        {	?>
        			 
        			<div class="form-group col-md-3"> {!! Form::label('vlan', 'VLAN') !!}
        									<input type="text" id="vlan" name="vlan" class="form-control" value="{{$franchisedetails->vlan }}">
				         </div>
				         	<div class="form-group col-md-3"> {!! Form::label('ipaddress', 'Ipaddress') !!}
				         	               
				         	          <?php    
				         	           
				         	           $ip_addarray=array();
				         	       //   echo "kk".$ipdetails->ip_from;
	                                 if(!empty($ipdetails->ip_from))
				         	                $ip_addarray = explode (".", $ipdetails->ip_from);
				         	       if(!empty($ipdetails->pool_name))
				         	         {
				         	            // echo "yes";
				         	        ?>
				         	        @php
				         	               
				         	                $data = DB::table("ipaddress")
	                                                 ->select(DB::raw("COUNT('Ip_number') as count_row"))
	                                                    ->where('IpName',$ipdetails->pool_name)
	                                                    ->where('status','y')
	                                                    ->groupBy(DB::raw("IpName"))
	                                                    ->get();
	                                   $ipcount=count($data);    
	                               
	                                         

	                                @endphp
	                                
	                              <?php
	                               foreach($data as $d)
	                               {
	                                          $ipnumber=$d->count_row;
	                                }
	                                if(empty($ipnumber))
	                                $ipnumber=255;
	                                echo $ipnumber;
	                              if($ipnumber<252)
	                              { 
	             
	           $datas= DB::table('ipaddress')->select('IpName',DB::raw("max(Ip_number) as maxip"))
	     ->where('IpName',$ipdetails->pool_name)
	                                                    
	           ->groupBy('IpName')->get();                     
	           foreach($datas as $s)
	           {
	               $maxid=$s->maxip;
	           }
	           if($maxid==254)
	          {
	               $datas= DB::table('ipaddress')->select('Ip_number')
	                ->where('IpName',$ipdetails->pool_name)
	                ->where('status','n')->first();
	                //echo $datas->Ip_number;
	              $ipnumber=$datas->Ip_number;
	              $impval=1;
	              }
	          else
	          {

	                                                     $ipnumber=$ipnumber+2; 
	                                                     $impval=0;
	          }
	          if($impval==1)
	          {
                                                     ?>
                   <input type="hidden" value="10" name="imp" id="imp"> 
                   <?php }?>
	                                          <input type="text" id="ippooladdress" name="ippooladdress" class="form-control" value="{{ $ip_addarray[0]}}.{{$ip_addarray[1]}}.{{$ip_addarray[2] }}.{{ $ipnumber }}">      
	                                                <input type="hidden" value="{{ $ipnumber}}" name="ipnum" id="ipnum">
	                                                <input type="hidden" value="{{ $ipdetails->pool_name}}" name="pool_name" id="pool_name">
	                                                
	                                <?php }  else {
	                                    
	                                    
	                                 $ipnumber=2;
	                                ?>
	                                
	                                
	                             <input type="text" id="ippooladdress" name="ippooladdress" class="form-control" value="{{ $ip_addarray[0]}}.{{$ip_addarray[1]}}.{{$ip_addarray[2] }}.{{ $ipnumber }}">      
	                                  <input type="hidden" value="{{ $ipnumber}}" name="ipnum" id="ipnum">
	                                   <input type="hidden" value="{{ $ipdetails->pool_name}}" name="pool_name" id="pool_name">
	                                               
	                             <?php } } else { ?>
	                               <input type="text" id="ippooladdress" name="ippooladdress" class="form-control" value="">      
	                               <?php } ?>
	                                        
        									
				         </div>
						 <?php } ?>
				         	<div class="form-group col-md-3"> {!! Form::label('fiber_length', 'Fiber Length (in Meters)') !!}
				        {!! Form::text('fiber_length',null, array('class' => 'form-control','placeholder'=>'Enter Fiber Length (in Meters)')) !!} </div>
						
						<div class="form-group col-md-6"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
					{!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map1','placeholder'=>'Enter Latitude & Longitude')) !!} 
		<a class="btn btn-sm btn-warning getMap" map_num="1">Get</a>	
		</div>


					</div>
						

		
		
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  <?php } else { 
	  
  $user_id = Auth::user()->id;

    //echo $customerdetails->id;

	  ?>
	  
	  <div class="row">
	      <!--	
					<div class="form-group col-md-3"> {!! Form::label('olt', 'OLT') !!}
						        {!! Form::select('olt', $olt, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select OLT --') ) !!} </div>
									
							 -->	
							<div class="form-group col-md-3"> {!! Form::label('dp', 'DP') !!}
				        {!! Form::select('dp', $dp, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select DP --') ) !!} </div>
				       

				        <div class="form-group col-md-3"> {!! Form::label('fh', 'FH') !!}
        {!! Form::select('fh', $fh, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select FH --') ) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('fh_port', 'FH Port') !!}
        {!! Form::select('fh_port', [], null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select FH Port --') ) !!} </div>

         				
		<?php	if($connection_types[0] != 5)
        {	?>			
        	       			 
        			<div class="form-group col-md-3"> {!! Form::label('vlan', 'VLAN') !!}
        									<input type="text" id="vlan" name="vlan" class="form-control" value="{{$franchisedetails->vlan }}">
				         </div>
				         	<div class="form-group col-md-3"> {!! Form::label('ipaddress', 'Ipaddress') !!}
				         	                
				         	             <?php   
				         	             			         	          
				         	        
				         	           $ip_addarray=array();
				         	           	                              $impval=0;
	                                 if(!empty($ipdetails->ip_from))
	                           
				         	                $ip_addarray = explode (".", $ipdetails->ip_from);
				         	                
				         	      if(!empty($ipdetails->pool_name))
				         	         {
				         	      
				         	        ?>
				         	       
                                        @php
				         	                $data = DB::table("ipaddress")
	                                                 ->select(DB::raw("COUNT('Ip_number') as count_row"))
	                                                    ->where('IpName',$ipdetails->pool_name)
	                                                    ->where('status','y')
	                                                    ->groupBy(DB::raw("IpName"))
	                                                    ->get();
	                                   $ipcount=count($data);    
	                                   

	                                @endphp

	                              <?php
	                           
	                               foreach($data as $d)
	                               {
	                                          $ipnumber=$d->count_row;
	                                }
	                       
	                                if(empty($ipnumber))
	                                {
	                                $ipnumber=255;
	                               
	                                }

	                              if($ipnumber<252)
	                              { 
                                
                            	      $datas= DB::table('ipaddress')->select('IpName',DB::raw("max(Ip_number) as maxip"))
                            	     ->where('IpName',$ipdetails->pool_name)
	                                  ->groupBy('IpName')->get();   
	                                  
                        	           foreach($datas as $s)
                        	           {
                        	               $maxid=$s->maxip;
                            	       }
                                                    	       
                            	           if($maxid==254)
                            	          {
                            	               $datas= DB::table('ipaddress')->select('Ip_number')
                            	                ->where('IpName',$ipdetails->pool_name)
                            	                ->where('status','n')->first();
                            	                //echo $datas->Ip_number;
                            	                $ipnumber=$datas->Ip_number;
                            	                $impval=1;
                            	          }
                                	          else
                                	          {
                                	             
                                                   $ipnumber=$ipnumber+2;
                                                   $impval=0;
                                                   ?>
                                                   	                             <input type="text" id="ippooladdress" name="ippooladdress" class="form-control" value="{{ $ip_addarray[0]}}.{{$ip_addarray[1]}}.{{$ip_addarray[2] }}.{{ $ipnumber }}">      
	                                  <input type="hidden" value="{{ $ipnumber}}" name="ipnum" id="ipnum">
	                                   <input type="hidden" value="{{ $ipdetails->pool_name}}" name="pool_name" id="pool_name">
	                             
                                                <?php   
                                	          }
                                	          
                            	          if($impval==1)
                            	          {
                            	             
                                        ?>
                                        
                                            <input type="hidden" value="10" name="imp" id="imp"> 
                   
	                                          <input type="text" id="ippooladdress" name="ippooladdress" class="form-control" value="{{ $ip_addarray[0]}}.{{$ip_addarray[1]}}.{{$ip_addarray[2] }}.{{ $ipnumber }}">      
	                                                <input type="hidden" value="{{ $ipnumber}}" name="ipnum" id="ipnum">
	                                                <input type="hidden" value="{{ $ipdetails->pool_name}}" name="pool_name" id="pool_name">
	                                                
	                                    <?php 
                            	           }
	                              
                            	           else 
                            	           {
	                                         $ipnumber=2;
	                                         //echo $ipnumber;
	                               
	                                       ?>
	                                       <!--
	                                 <input type="hidden" value="1" name="imp" id="imp"> 
                 
	                                
	                             <input type="text" id="ippooladdress" name="ippooladdress" class="form-control" value="{{ $ip_addarray[0]}}.{{$ip_addarray[1]}}.{{$ip_addarray[2] }}.{{ $ipnumber }}">      
	                                  <input type="hidden" value="{{ $ipnumber}}" name="ipnum" id="ipnum">
	                                   <input type="hidden" value="{{ $ipdetails->pool_name}}" name="pool_name" id="pool_name">
	                                   -->
	                                               
	                                    <?php
	                                        }
}
				         	         }
	                            ?>
        									
				         </div>
						 <?php } ?>
				         	<div class="form-group col-md-3"> {!! Form::label('fiber_length', 'Fiber Length (in Meters)') !!}
				        {!! Form::text('fiber_length',null, array('class' => 'form-control','placeholder'=>'Enter Fiber Length (in Meters)')) !!} </div>
						
						<div class="form-group col-md-6"> {!! Form::label('long_lat', 'Latitude & Longitude') !!}
					{!! Form::text('long_lat',null, array('class' => 'form-control','id'=>'map1','placeholder'=>'Enter Latitude & Longitude')) !!} 
		<a class="btn btn-sm btn-warning getMap" map_num="1">Get</a>	
		</div>


					</div>	
						

		
		
		
		
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  <?php }  ?>

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
		$('#map'+map_num).val(position.coords.latitude+","+ position.coords.longitude);
	}
	
	$(document).ready(function() {
		$('#fh').on('change', function() {
			var fh = $(this).val();
			if(fh == '' || fh <=0){
				$('#fh_port').html("<option value=''>-- Select FH Port --</option>");
				return;
            }
			$.ajax({
                url: "{{url('/admin/fh/fhports')}}/"+fh,
                type: "GET",
                success:function(data) {
                   $('#fh_port').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
            $('#olt').on('change', function() {
                            var olt = $(this).val();
                            if(olt == '' || olt <=0){
                                    $('#dp').html('<option selected="selected" value="">-- Select DP --</option>');
                                    return;
                }
                            $.ajax({
                                url: "{{url('/admin/dp/dpdata')}}/"+olt,
                                type: "GET",
                                success:function(data) {
                                   $('#dp').html(data);
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    alert(errorThrown);
                                }
                            });
            });	
            $('#dp').on('change', function() {
                            var dp = $(this).val();
                            if(dp === '' || dp <=0){
                                    $('#fh').html('<option selected="selected" value="">-- Select FH --</option>');
                                    return;
                }
                            $.ajax({
                                url: "{{url('/admin/fh/fhdata')}}/"+dp,
                                type: "GET",
                                success:function(data) {
                                   $('#fh').html(data);
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    alert(errorThrown);
                                }
                            });
            });
	});
	
	
	
	</script> 
@stop
