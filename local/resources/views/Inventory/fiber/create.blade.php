@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.fibermenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Add Fiber Stock</h4></div>
	  
	</div>
		<div class="card-body" style="padding:5px;">
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
             @endif
            	@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	    @endif
        </div>

       
        
	
	<div class="card-body">
	  
	  
		
	

	  {!! Form::open(['route' =>['fiber.storefiber'],'method'=>'post','id'=>"myform"])!!}
	      @csrf
		  <div class="row">	
		    <div class="form-group col-md-3"> {!! Form::label('product_name', 'Product Name*') !!}
        {!! Form::select('product_name',$products,null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Product Name')) !!} </div>
	
		
		    <div class="form-group col-md-3"> {!! Form::label('name', 'Manufacture Name*') !!}
        {!! Form::text('manufacture_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Manufacturer Name')) !!} </div>
	
		
		<div class="form-group col-md-3">
		    	<?php $manufacturer_year = array('2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020','2021'=>'2021','2022'=>'2022','2023'=>'2023'); ?>
		     {!! Form::label('manufact_year', 'Manufacture Year') !!}
			{!! Form::select('manufact_year',$manufacturer_year,null, array('class' => 'form-control','placeholder'=>'Select  Year')) !!}
		</div>
		
	
		
		<div class="form-group col-md-3">
		     {!! Form::label('drum_number', 'Drum Number') !!}
			{!! Form::text('drum_number',null, array('class' => 'form-control','placeholder'=>'Enter Drum Number','required'=>'required',)) !!}
		</div>
	    <div class="form-group col-md-3"> {!! Form::label('fiber_core', 'Fiber Core') !!}
        {!! Form::select('fiber_core', [], null,array('class' => 'form-control','required'=>'required') ) !!}</div>
        <!-- Start copy -->
		
		<div class="form-group col-md-4"> {!! Form::label('start_reading', 'Staring Reading*') !!}
		<br>
	<select name="thousand" id="thousand1" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
	<select name="hundreds" id="hundreds1" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
	<select name="tens" id="tens1" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select>
    <select name="ones" id="ones1" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select>
    <script>
        $(document).ready(function() {
    $('#start_reading').keyup(function(e) {
        var txtVal = $(this).val();
        $('#dummy_startreading').val(txtVal);
    });
    </script>
        {!! Form::text('start_reading',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Starting Reading')) !!} </div>
<!--	<input type="text" name="dummy_startreading" id="dummy_startreading">-->
	<script>
    $('#thousand1').change(function () {
    changeThird1();
});
   $('#hundreds1').change(function () {
    changeThird1();
});
   $('#tens1').change(function () {
    changeThird1();
});
 $('#ones1').change(function () {
    changeThird1();
});


function changeThird1() {
    var res;
    var th=$('#thousand1').val();
    var hun=$('#hundreds1').val();
     var tens=$('#tens1').val();
      var ones=$('#ones1').val();
      if(th>=0 || hun>=0 || tens>=0)
      {
          res=parseInt($('#thousand1').val() + '' + $('#hundreds1').val()+ '' + $('#tens1').val()+ '' + $('#ones1').val(),10)
        $('#start_reading').val(res);
      }
}
$('#hundreds1').change(function () {
    changeThird1();
});
</script>	  
		<div class="form-group col-md-4"> {!! Form::label('end_reading', 'End Reading*') !!}
		<br>
	<select name="thousand" id="thousand2" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
	<select name="hundreds" id="hundreds2" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
	<select name="tens" id="tens2" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select>
    <select name="ones" id="ones2" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select>
       {!! Form::text('end_reading',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter end Reading')) !!} </div>
       
       <div class="form-group col-md-4"> {!! Form::label('length', 'Length*') !!}
		<br>
	<select name="thousand" id="thousand" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
	<select name="hundreds" id="hundreds" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
?>
</select>
	<select name="tens" id="tens" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select>
    <select name="ones" id="ones" class="form-control" style="width:58px;float:left">
    <?php
    for ($i=0; $i<=9; $i++)
    {
        ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    }
    ?>
    </select>
   
        {!! Form::text('length',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Get Length')) !!} </div>
        		<div class="form-group col-md-3">
		     {!! Form::label('buying_price', 'Buying Price') !!}
			{!! Form::text('price_per_meter',null, array('class' => 'form-control','placeholder'=>'Enter Buying Price')) !!}
		</div>
			<div class="form-group col-md-3">
		     {!! Form::label('selling_price', 'Selling Price') !!}
			{!! Form::text('selling_price',null, array('class' => 'form-control','placeholder'=>'Enter Selling Price')) !!}
		</div>
		
	    
		<div class="form-group col-md-3"> {!! Form::label('vendorssuppliers', 'Vendors/Suppliers') !!}
        {!! Form::select('vendors_suppliers', $vendors, null,array('class' => 'form-control','required'=>'required') ) !!}</div>
        	<!-- /*$fiber_core_items = array('2'=>'2','4'=>'4','6'=>'6','8'=>'8','12'=>'12','24'=>'24','48'=>'48'); ?> -->
	
        
    
<script>
    $('#thousand').change(function () {
    changeThird();
});
   $('#hundreds').change(function () {
    changeThird();
});
   $('#tens').change(function () {
    changeThird();
});
 $('#ones').change(function () {
    changeThird();
});


function changeThird() {
    var res;
    var th=$('#thousand').val();
    var hun=$('#hundreds').val();
     var tens=$('#tens').val();
      var ones=$('#ones').val();
      if(th>=0 || hun>=0 || tens>=0 || ones>=0)
      {
          res=parseInt($('#thousand').val() + '' + $('#hundreds').val()+ '' + $('#tens').val()+ '' + $('#ones').val(),10)
  
      }
   $('#length').val(res);   
}
</script>
		
		  </div>
		<script>
    $('#thousand2').change(function () {
    changeThird2();
});
   $('#hundreds2').change(function () {
    changeThird2();
});
   $('#tens2').change(function () {
    changeThird2();
});

  $('#ones2').change(function () {
    changeThird2();
});

function changeThird2() {
    var res;
    var th=$('#thousand2').val();
    var hun=$('#hundreds2').val();
     var tens=$('#tens2').val();
      var ones=$('#ones2').val();
      if(th>=0 || hun>=0 || tens>=0 || ones>=0)
      {
          res=parseInt($('#thousand2').val() + '' + $('#hundreds2').val()+ '' + $('#tens2').val()+ '' + $('#ones2').val(),10)
    $('#end_reading').val(res);
      }
      
     
      
}
</script>
<script>
      
   
    $(document).ready(function(){
        $('#myform').submit(function() {
             var length,stread,endread;
      length=$('#length').val();
      stread=parseInt($('#start_reading').val());
      endread=parseInt($('#end_reading').val());
      var sum;
      if(stread==1)
      {
        sum=stread;
        sum=(endread-1)+1
      }
       if(endread==1)
      {
        sum=stread;
        sum=(stread-1)+1
      }
      if(stread>endread)
      {
          sum=stread-endread
      }
        if(stread<endread)
        {
           
        sum=endread-stread;
        
        }
        
      if(length!=sum)
      {
      alert('Length is not Matching based on Range Reading..');
      return false;
      }
        else    
        return true;
});
    });
</script>
<script>
    
</script>
<script>
  	$('#product_name').on('change', function() {
            var category_id = $(this).val();
          var productId= $(this).val();
		//	alert(productId);
			$.ajax({
                url: "{{url('/admin/inventory/stocks/getfibercore')}}/"+productId,
                type: "GET",
                success:function(data) {
                   //alert(data);
                   $('#fiber_core').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

	</script>
<script>
    function checkValues()
    {
        
    }
</script>
        
      
       {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
      {!! Form::close() !!} 
	  

	</div>
  </div>

		  
@stop
