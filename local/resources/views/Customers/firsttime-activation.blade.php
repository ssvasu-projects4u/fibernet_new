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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Activattion User</h3></div>
	  
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
	  
	  
	
	   {!! Form::open(['route' =>['customers.firsttimeactivation'],'method'=>'post','id'=>'create_form'])!!}
	       @csrf
	      

	    
	    <div class="row">  
			
		<div class="form-group col-md-3">
			<label>Smartcard</label>
			<div>{{ isset($smartcard)? $smartcard :'' }}</div>
		</div>

		<div class="form-group col-md-3">
		<label>Boxid</label>
		<div>{{ isset($box_id)? $box_id :'' }}</div>

		

		
 		<input type ="hidden" name= "subscribername" id="subscribername" value = "" class ="form-control">
 		<input type ="hidden" name= "smart" id="smart" value = "{{ isset($smartcard)? $smartcard :''}}" class ="form-control">
		<input type ="hidden" name= "sub_id" id="sub_id" value = "{{isset($sub_id)?$sub_id:'' }}" class ="form-control">
		<input type ="hidden" name= "smartbox_running_id" id="smartbox_running_id" value = "{{ isset($smartbox_running_id)?$smartbox_running_id:'' }}" class ="form-control">
		<input type ="hidden" name= "customer_id" id="customer_id" value = "{{ isset($customer_id)?$customer_id:'' }}" class ="form-control">

		</div>
		
		<div class="form-group col-md-3">
			<label>lco name</label>
			<div>{{ isset($sub_id)?$sub_id:'' }}</div>
		</div>

		<?php //echo "<pre>";print_r($packages);?>
		<div class="form-group col-md-3">
		<label for="recharge_type">Package Name</label>
		<select class="form-control" name="package" id="package">
			<option value="">Select Package</option>
			@if(isset($packages))
			@foreach($packages as $package)
				<option value="{{ $package['id'] }}">{{ $package['product_name'] }}</option>
			@endforeach
			@endif
		
		</select>
	</div>

		<div class="form-group col-md-3">
			<label>recharge type</label>
			
			<select class="form-control" name="plan_type" id="recharge_type">
		        <option> Select Type </option>
		          <option value="1"> Plan </option>
		          <option value="2"> Date </option>
		               <option value="3"> Date to Date </option>
		    </select>
		</div>
		
		<div class="form-group col-md-3" id="package_plan_div">
			<label>Package Plan</label> 
			<select class="form-control" name="plan" id="package_plan">
		        <option> Select Type </option>
		          <option value="1"> 1 Month </option> 
		    </select>
		</div>
		
		
		<div class="form-group col-md-3" id="expire_date_div">
			<label>Choose Date</label> 
		    <input class="form-control" type="date" name="date" id="date" value="">
		</div>
		
	        
		<div class="form-group col-md-12" align="right">
       {!! Form::submit('Confirmation', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
      </div>


      <hr>
	  

	</div>
  </div>
	
<script type="text/javascript">
	$(document).ready(function() {
	    
	       $("#expire_date_div").hide();
                $("#package_plan_div").hide();
                
	    $(document).on("change","#recharge_type",function(){
	        var recharge_type = $(this).val();
	        if(recharge_type == '1'){
	            $("#package_plan_div").show();
                $("#expire_date_div").hide();
	        }else if(recharge_type == '2'){
	              $("#expire_date_div").show();
                $("#package_plan_div").hide();
	        }else if(recharge_type =='3'){
	             $("#expire_date_div").hide();
                $("#package_plan_div").hide();
	        }
	    })
	    
	    
	    
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
                    // alert(errorThrown);
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
                    // alert(errorThrown);
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
                    // alert(errorThrown);
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
                    // alert(errorThrown);
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
                    // alert(errorThrown);
                }
            });
        });
</script>

@stop
