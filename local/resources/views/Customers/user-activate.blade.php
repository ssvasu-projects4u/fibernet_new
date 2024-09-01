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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Activate User<small> - {{$customerdetails->email}} </small></h3></div>
	  
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
	  
	  
	  {!! Form::model($customerdetails, array('route' => array('customers.useractivate', $customerdetails->id),'method'=>'put')) !!}
	       @csrf
	      

	    
	    <div class="row">  
			
		<!--<div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise *') !!}
        {!! Form::select('franchise', $franchise_list, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>-->

		<input type="hidden" id="operator_id" name="operator_id"  value = "{{ $operator->op_id}}" class ="form-control">

		<div class="form-group col-md-3">
			<label>CAS Type	 </label>
			<select name="cas_type" id="cas_type" class ="form-control">
			 
			<option value="1"> Rcas</option>
			</select>
		</div>

		<div class="form-group col-md-3">
			<label>Smartcard</label>
			<select name="smart_box" id="smart_box" class ="form-control">
			<option value=""> --Select smart box--</option>
			</select>
		</div>

		<div class="form-group col-md-3">
		<label>Boxid</label>

		

		
 		<input type ="text" name= "subscribername" id="subscribername" value = "" class ="form-control">
 		<input type ="hidden" name= "smart" id="smart" value = "" class ="form-control">
		<input type ="hidden" name= "sub_id" id="sub_id" value = "{{ $sub_id }}" class ="form-control">
		<input type ="hidden" name= "customer_id" id="customer_id" value = "{{ $customer_id }}" class ="form-control">
		</div>


	         <?php $renew_cycles = array('immediate'=>'Immediate','schedule'=>'Schedule'); ?>
	<!--	<div class="form-group col-md-3"> {!! Form::label('renewal_cycle', 'Renew Cycle') !!}
		<input type="hidden" value="{{$customerdetails->email}}" id="custem" name="custem">
        {!! Form::select('renewal_cycle', $renew_cycles, 'immediate',array('class' => 'form-control','required'=>'required') ) !!} </div>-->

			
	    	<?php $generate_invoice = array('immediate'=>'Immediate','schedule'=>'While Schedule Time'); ?>
		<!--<div class="form-group col-md-3" style="display: none;"> {!! Form::label('invoice_generate_option', 'Generate Invoice') !!}
        {!! Form::select('invoice_generate_option', $generate_invoice, null,array('class' => 'form-control','placeholder'=>'- Select Invoice Generate Option -') ) !!} </div>
        <div class="form-group col-md-3" style="display: none;"> {!! Form::label('schedule_date', 'Schedule Date') !!}
        {!! Form::date('schedule_date', null,array('class' => 'form-control','placeholder'=>'- Schedule Date -','type'=>'date') ) !!} </div>
		<div class="form-group col-md-3"> {!! Form::label('password', 'Password') !!}
	        <input class="form-control" required="required" placeholder="Enter Password" name="password" type="password" id="password">
	         </div>
	    </div>	-->
	    <div class="row">
	        	 <?php if($customerdetails->connection_type == 3){ 
			 
			 	     $user_id = Auth::user()->id;
				        $roles = $user->getRoleNames();
				    
				        if($roles[0]=='superadmin')
				       {
				           
				     ?>
@php $ont = DB::table('slj_stock_products')->select('manufacturer')->whereNull('current_user_id')->where('status','available')->distinct()->get(); @endphp
        <?php } 
        if($roles[0]=='branch')
				       {
				     
        ?>
        	 @php  $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('branch_status','available')->distinct()->get(); @endphp
		<?php }
		if($roles[0]=='franchise')
				       {
				     
        ?>
        	 	 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('franchise_status','available')->where('catname','STB')->distinct()->get(); @endphp
		<?php }
		else
		{
		?>
		
		
			 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('employee_status','available')->distinct()->get(); 
			 @endphp
		<?php }
		?>	 
			 
			 
			<div class="form-group col-md-3"> 
			{!! Form::label('stb_company', 'ONT Company') !!}
		<!--	<select id="stb_company" name="stb_company" class="form-control">
			    <option> Select Company Name </option>
                   @foreach($ont as $p)
                  
                      @if($p->manufacturer!='')
                   <option value="{{$p->manufacturer}}">{{ $p->manufacturer }}</option>
                   @endif
                     @endforeach
               </select>-->			 
			 
		    </div>

			<div class="form-group col-md-3"> {!! Form::label('stb_model', 'ONT Model Number') !!}
		    <!--<select id="stb_model" name="stb_model" class="form-control">
			
			</select>--> </div>
        	<div class="form-group col-md-3"> {!! Form::label('stb_num', 'ONT Serial Number') !!}
        	 <select id="stb_num" name="stb_num" class="form-control">
			
			</select>
			 </div>
			
			
			<?php }
			
			if($customerdetails->connection_type == 6){ 
			 
			 	     $user_id = Auth::user()->id;
				        $roles = $user->getRoleNames();
				    
				        if($roles[0]=='superadmin')
				       {
				           
				     ?>
@php $ont = DB::table('slj_stock_products')->select('manufacturer')->whereNull('current_user_id')->where('status','available')->distinct()->get(); @endphp
        <?php } 
        if($roles[0]=='branch')
				       {
				     
        ?>
        	 @php  $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('branch_status','available')->distinct()->get(); @endphp
		<?php }
		if($roles[0]=='franchise')
				       {
				     
        ?>
        	 	 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('franchise_status','available')->where('catname','ONT')->distinct()->get(); @endphp
		<?php }
		else
		{
		?>
		
		
			 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('employee_status','available')->distinct()->get(); 
			 @endphp
		<?php }
		?>	 
			 
			 
			<div class="form-group col-md-3"> 
			{!! Form::label('stb_company', 'ONT Company') !!}
			<!--<select id="stb_company" name="stb_company" class="form-control">
			    <option> Select Company Name </option>
                   @foreach($ont as $p)
                  
                      @if($p->manufacturer!='')
                   <option value="{{$p->manufacturer}}">{{ $p->manufacturer }}</option>
                   @endif
                     @endforeach
               </select>	-->		 
			 
		    </div>

			<div class="form-group col-md-3"> {!! Form::label('stb_model', 'ONT Model Number') !!}
		   <!-- <select id="stb_model" name="stb_model" class="form-control">
			
			</select> --></div>
        	<div class="form-group col-md-3"> {!! Form::label('stb_num', 'ONT Serial Number') !!}
        	 <select id="stb_num" name="stb_num" class="form-control">
			
			</select>
			 </div>
						 <?php
 	     $user_id = Auth::user()->id;
				        $roles = $user->getRoleNames();
				    
				        if($roles[0]=='superadmin')
				       {
				           
				     ?>
@php $ont = DB::table('slj_stock_products')->select('manufacturer')->whereNull('current_user_id')->where('status','available')->where('catname','STB')->where('subcatname','Android STB')->distinct()->get(); @endphp
        <?php } 
        if($roles[0]=='branch')
				       {
				     
        ?>
         @php  $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('branch_status','available')->where('catname','STB')->where('subcatname','Android STB')->distinct()->get(); @endphp
		<?php }
		if($roles[0]=='franchise')
				       {
				     
        ?>
        	 	 @php
        	 	 
        	 	 $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('franchise_status','available')->where('catname','=','STB')->where('subcatname','Android STB')->distinct()->get(); 
        	 	 
        	 	 @endphp
		<?php }
		else
		{
		?>
		
		
			 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('employee_status','available')->where('catname','STB')->where('subcatname','Android STB')->distinct()->get(); 
			 @endphp
		<?php }
		?>	 
			 
			 
			<div class="form-group col-md-3"> 
			{!! Form::label('stb_company', 'STB Company') !!}
			<input class="form-control" required="required" placeholder="STB Company" name="stb_company1" type="text" id="stb_company1">

		<!--	<select id="stb_company1" name="stb_company1" class="form-control">
			            <option value=""> Select Company Name </option>
				
                   @foreach($ont as $p)
                  
                      @if($p->manufacturer!='')
                   <option value="{{$p->manufacturer}}">{{ $p->manufacturer }}</option>
                   @endif
                     @endforeach
               </select>	-->		 
			 
		    </div>

			<div class="form-group col-md-3"> {!! Form::label('stb_model', 'STB Model Number') !!}
		<!--	<select id="stb_model1" name="stb_model1" class="form-control">
			
			</select>-->
			<input class="form-control" required="required" placeholder="STB Model Number" name="stb_model1" type="text" id="stb_model1">
			</div>

			<div class="form-group col-md-3"> {!! Form::label('stb_company', 'STB Company') !!}
			 <select id="stb_num1" name="stb_num1" class="form-control">
			
			</select>
			</div>
			

			
			<?php }
					
					
	       
			  if($customerdetails->connection_type == 5){ 
			 
			 	     $user_id = Auth::user()->id;
				        $roles = $user->getRoleNames();
				    
				        if($roles[0]=='superadmin')
				       {
				           
				     ?>
@php $ont = DB::table('slj_stock_products')->select('manufacturer')->whereNull('current_user_id')->where('status','available')->where('catname','STB')->where('subcatname','Regular STB')->distinct()->get(); @endphp
        <?php } 
        if($roles[0]=='branch')
				       {
				     
        ?>
        	 @php  $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('branch_status','available')->where('catname','STB')->where('subcatname','Regular STB')->distinct()->get(); @endphp
		<?php }
		if($roles[0]=='franchise')
				       {
				     
        ?>
        	 	 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('franchise_status','available')->where('catname','STB')->where('subcatname','Regular STB')->distinct()->get(); @endphp
		<?php }
		else
		{
		?>
		
		
			 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('employee_status','available')->where('catname','STB')->where('subcatname','Regular STB')->distinct()->get(); 
			 @endphp
		<?php }
		?>	 
			 
			 
			<div class="form-group col-md-3"> 
			{!! Form::label('stb_company', 'STB Company') !!}
			<select id="stb_company" name="stb_company" class="form-control">
			    <option value="">Select Company</option>
                   @foreach($ont as $p)
                  
                      @if($p->manufacturer!='')
                   <option value="{{$p->manufacturer}}">{{ $p->manufacturer }}</option>
                   @endif
                     @endforeach
               </select>			 
			 
		    </div>

		<div class="form-group col-md-3"> {!! Form::label('stb_model', 'STB Model Number') !!}
		    <select id="stb_model" name="stb_model" class="form-control">
			
			</select> </div>
        	<!--<div class="form-group col-md-3"> {!! Form::label('stb_num', 'STB Serial Number') !!}
        	 <select id="stb_num" name="stb_num" class="form-control">
			
			</select>
			 </div>-->
				
			
			<?php }
			 if($customerdetails->connection_type == 7)
			
			
			{ ?>
				<div class="form-group col-md-3"> {!! Form::label('stb_company', 'ONT Company') !!}
				
				   <select id="stb_company" name="stb_company" class="form-control">
				        <option value=""> Select Company Name </option>
				       <?php $no=1;
				        $user_id = Auth::user()->id;
				        $roles = $user->getRoleNames();
				        if($roles[0]=='superadmin')
				       {
				       ?>
				        @php $ont = DB::table('slj_stock_products')->select('manufacturer')->whereNull('current_user_id')->where('status','available')->distinct()->get(); @endphp
				    <?php } ?>
				    <?php
				        if($roles[0]=='franchise')
				       {
				    $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('franchise_status','available')->where('catname','ONT')->distinct()->get(); 
				       }
				    else { ?>
				   	@php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('employee_status','available')->distinct()->get(); @endphp
			 
				    <?php } ?>
                   @foreach($ont as $p)
                  
                      @if($p->manufacturer!='')
                   <option value="{{$p->manufacturer}}">{{ $p->manufacturer }}</option>
                   @endif
                     @endforeach
               </select>
		     </div>
		
			<div class="form-group col-md-3"> {!! Form::label('stb_model', 'ONT Model Number') !!}
		    <select id="stb_model" name="stb_model" class="form-control">
			
			</select> </div>
        	<div class="form-group col-md-3"> {!! Form::label('stb_num', 'ONT Serial Number') !!}
        	 <select id="stb_num" name="stb_num" class="form-control">
			
			</select>
			 </div>
			 <?php
 	     $user_id = Auth::user()->id;
				        $roles = $user->getRoleNames();
				    
				        if($roles[0]=='superadmin')
				       {
				           
				     ?>
@php $ont = DB::table('slj_stock_products')->select('manufacturer')->whereNull('current_user_id')->where('status','available')->where('catname','ONT')->distinct()->get(); @endphp
        <?php } 
        if($roles[0]=='branch')
				       {
				     
        ?>
         @php  $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('branch_status','available')->where('catname','ONT')->distinct()->get(); @endphp
		<?php }
		if($roles[0]=='franchise')
				       {
				     
        ?>
        	 	 @php
        	 	 
        	 	 $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('franchise_status','available')->where('catname','=','STB')->where('subcatname','Regular STB')->distinct()->get(); 
        	 	 
        	 	 @endphp
		<?php }
		else
		{
		?>
		
		
			 @php $ont = DB::table('slj_stock_products')->select('manufacturer')->where('current_user_id',$user_id)->where('employee_status','available')->where('catname','ONT')->distinct()->get(); 
			 @endphp
		<?php }
		?>	 
			 
			 
			<div class="form-group col-md-3"> 
			{!! Form::label('stb_company', 'STB Company') !!}
				<input class="form-control" required="required" placeholder="STB Company" name="stb_company1" type="text" id="stb_company1">
			<!--<select id="stb_company1" name="stb_company1" class="form-control">
			            <option value=""> Select Company Name </option>
				
                   @foreach($ont as $p)
                  
                      @if($p->manufacturer!='')
                   <option value="{{$p->manufacturer}}">{{ $p->manufacturer }}</option>
                   @endif
                     @endforeach
               </select>-->			 
			 
		    </div>

			<div class="form-group col-md-3"> {!! Form::label('stb_model', 'STB Model Number') !!}
			<input class="form-control" required="required" placeholder="STB Model Number" name="stb_model1" type="text" id="stb_model1">
			<!--<select id="stb_model1" name="stb_model1" class="form-control">
			
			</select>-->
			</div>

			<div class="form-group col-md-3"> {!! Form::label('stb_company', 'STB Company') !!}
			 <select id="stb_num1" name="stb_num1" class="form-control">
			
			</select>
			</div>
			
		
			<?php } ?>

	    
	    
	    </div>    
		<div class="form-group col-md-12" align="right">
       {!! Form::submit('Next', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
      </div>


      <hr>
	  

	</div>
  </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#invoice_generate_option").parent().hide();
	    $("#schedule_date").parent().hide();
		$('#renewal_cycle').on('change', function() {
    	var renewal_cycle = $(this).val();
			if(renewal_cycle == 'schedule'){
				$("#invoice_generate_option").parent().show();
				$("#schedule_date").parent().show();
			}else{
				$("#invoice_generate_option").parent().hide();
				$("#schedule_date").parent().hide();
			}
		});
	});
	</script>	
	<script>
      	$('#stb_company').on('change', function() {
            var manufacturer = $(this).val();
          
         
            if(manufacturer == '' || manufacturer <=0){
            	$('#stb_model1').html("<option value=''>-- Select Model --</option>");
			
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/getmodels')}}/"+manufacturer,
                type: "GET",
                success:function(data) {
                    
                   $('#stb_model').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });


		// $('#franchise').on('change', function() {
			$(document).ready(function() {

            var op_id = $("#operator_id").val();
          
       
            $.ajax({
                url: "{{url('/admin/customers/get_smartbox')}}/"+op_id,
                type: "GET",
                success:function(data) {
                    
                   $('#smart_box').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

		$('#smart_box').on('change', function() {
            var subscribername = $(this).val();
			var smart = $("#smart_box option:selected").text();

			$("#subscribername").val(subscribername);
			$("#smart").val(smart);
          
       
           
        });


</script>
	<script>
      	$('#stb_model').on('change', function() {
            var stb_model = $(this).val();
          
         
            if(stb_model == '' || stb_model <=0){
            	$('#stb_num').html("<option value=''>-- Select Serial Number --</option>");
			
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/getserial')}}/"+stb_model,
                type: "GET",
                success:function(data) {
                  
                   $('#stb_num').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
</script>
	<script>
      	$('#stb_company1').on('change', function() {
            var manufacturer = $(this).val();
          
         
            if(manufacturer == '' || manufacturer <=0){
            	$('#stb_model1').html("<option value=''>-- Select Model --</option>");
			
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/getmodels1')}}/"+manufacturer,
                type: "GET",
                success:function(data) {
                    
                   $('#stb_model1').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
</script>
	<script>
      	$('#stb_model1').on('change', function() {
            var stb_model = $(this).val();
          
         
            if(stb_model == '' || stb_model <=0){
            	$('#stb_num').html("<option value=''>-- Select Serial Number --</option>");
			
				return;
            }
            $.ajax({
                url: "{{url('/admin/customers/getserial1')}}/"+stb_model,
                type: "GET",
                success:function(data) {
                  
                   $('#stb_num1').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
</script>

@stop
