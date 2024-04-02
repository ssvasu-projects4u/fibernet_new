@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header bottom-submenu my-0 py-0 pl-0 pt-0 pr-2">

<nav class="navbar py-0">
<ul class="nav">


@if(Request::segment(2) == 'distributors')
  @can("create-distributor")
    <li class="nav-item"><a class="nav-link utility-distributor2" rId="{{$id}}" href="javascript:void(0);">Create Utility</a></li>
  @endcan
  @can("create-distributor")
   <li class="nav-item"><a class="nav-link " href="{{url('admin/distributors/distutility/'.$id)}}">List Utility</a></li>
   @endcan
@can("create-distributor")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/distributors/moving/'.$id)}}">Moving Utility</a></li>
  @endcan
  @can("create-distributor")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/distributors/trash/'.$id)}}">Trash Utility</a></li>
    
  @endcan
@can("create-distributor")
    <li class="nav-item"><a class="nav-link" href="{{url('admin/distributors/sale/'.$id)}}">Sale Utility</a></li>
  @endcan

@endif

</ul>
</nav>
</div>
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Moving Utility</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	  @if(Session::has('success'))
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> 
	  @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
    
 {!! Form::open(['route' =>['storeutilitiemoving'],'method'=>'post','files'=>'true'])!!}
	      @csrf
	      
		  <div class="row">	
		<div id="newtool" class="form-group col-md-3"> 
		    {!! Form::label('city', 'City') !!}
	        {!! Form::select('city',$cname, null, array('class' => 'form-control','placeholder'=>'Enter City Name')) !!}
        </div>
		<div id="newtool" class="form-group col-md-3"> {!! Form::label('itemname', 'Item name') !!}
        {!! Form::select('itemname',$ItemsNames,null, array('class' => 'form-control','placeholder'=>'Enter Items Name')) !!} </div>
		 <div class="form-group col-md-3"> {!! Form::label('name', 'Brand Name*') !!}
        {!! Form::text('brand',null, array('class' => 'form-control','placeholder'=>'Enter Brand Name','id' => 'brand')) !!} </div>
		<div class="form-group col-md-3"> {!! Form::label('modelno', 'Model Number') !!}
        {!! Form::text('modelno',null, array('class' => 'form-control','placeholder'=>'Enter Model Number')) !!} </div>
        </div>
          <div class="row">
		<div class="form-group col-md-3"> {!! Form::label('serial_no', 'Serial  Number') !!}
		 {!! Form::text('serial_no',null, array('class' => 'form-control','placeholder'=>'Enter Serial Number')) !!} 
		 </div>
		 <div class="form-group col-md-3"> {!! Form::label('move_to', 'Move To') !!}
		 <select name="move_to" class="form-control" id="move_to">
		     <option value="">Select Option</option>
		     <option value="distributor">Distributor</option>
		     <option value="branch">Branch</option>
		     
		      </select>
		 
		 </div>
		  <div class="form-group col-md-3"> {!! Form::label('Offices', 'Offices') !!}
		  {!! Form::select('Offices',[],null, array('class' => 'form-control','placeholder'=>'Select Office')) !!}
        <input type="hidden" id="distid" name="distid">
        
		  
		  </div>
	 </div>

       <div class="row">
       <input type="submit" class="btn btn-success" id="submitmoving"
name="submititems" value="Submit">
         {!! Form::close() !!} 

	  </div>

	</div>
  </div>
	<script type="text/javascript">
  	$('#category').on('change', function() {
            var category_id = $(this).val();
			if(category_id == '' || category_id <=0){
            	$('#sub_category').html("<option value=''>-- Select Sub Category --</option>");
				return;
            }
			$.ajax({
                url: "{{url('/admin/inventory/product-categories/subcategories')}}/"+category_id,
                type: "GET",
                success:function(data) {
                   $('#sub_category').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

	</script>
	<script>
     $('.utility-distributor2').on('click', function () {
                                        var rid = $(this).attr('rId');
                                       $('#utilitydistributor').val(rid);
                                      //alert('welcome');
                                       $('#kingdist11').modal('show');

                                   });
                                    
</script>


	    
	

 <script type="text/javascript">
jQuery(document).ready(function($) {
 $('.my_features').on("change",function() { 
    var checkbox = $(this).val();
    var k=$('#tool_name').val();
   // alert(k);
    
    //alert(checkbox);
    
    //you can use data() method to get data-* attributes
    var name = checkbox
    
        if(name.length>0 ) {  
        
        if(name=="normal")
{
        if(k!="New")
      $('#normal').show();
      $('#advanced').hide();
      
}
      
        if(name=="advanced")
{
        if(k!="New")
        {
      $('#normal').hide();
      $('#advanced').show();
        }

        
      
}
 
    }          
  });
  $('#tool_name').on("change",function() { 
       var a = $(this).val();
  if(a=="New")
  
     $('#newtool').show();
    
     else
        $('#newtool').hide();
  
      
  });
});
//just setup change and each to use the same function
</script>
<script>
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
		
		
		$('#distributor').on('change', function() {
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
        });
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<!--
<script>
    $('#newutility_distributor_form').on('keyup blur click', function () {
                                         var isForm = $(this).validate({
                                           rules: {

                                           }
                                       }).checkForm();
                                       if (isForm) {
                                           $('#utility_distributor_form_btn').attr('disabled', false);
                                       } else {
                                           $('#utility_distributor_form_btn').attr('disabled', true);
                                       }

                                   });

                              
</script>
	-->  
	 
	 
<script>
    $(document).ready(function() {
        $('#itemname').on('change', function() {
            var item = $(this).val();
            
            $.ajax({
              url: "{{url('admin/distributors/itemchange')}}/"+item,
                  type: "GET",
                success:function(data) {
                  //  alert(data);
                   $('#brand').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
              $.ajax({
              url: "{{url('admin/distributors/getmodelno')}}/"+item,
                  type: "GET",
                success:function(data) {
                  //  alert(data);
                   $('#modelno').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
             $.ajax({
              url: "{{url('admin/distributors/getserialno')}}/"+item,
                  type: "GET",
                success:function(data) {
                  //  alert(data);
                   $('#serial_no').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
             $.ajax({
              url: "{{url('admin/distributors/getdistid')}}/"+item,
                  type: "GET",
                success:function(data) {
                  //  alert(data);
                   $('#distid').val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });

        });
        $('#move_to').on('change', function() {
             var office = $(this).val();
             var distid=$('#distid').val();
            // alert(office);
              $.ajax({
              url: "{{url('admin/distributors/getoffices')}}/"+office+"/"+distid,
                  type: "GET",
                success:function(data) {
                   // alert(data);
                   $('#Offices').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
           
        });
       
    });
</script>

     <div id="kingdist11" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
            <div class="modal-dialog">

			<div class="modal-content" style="width: 750px;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="popupHeader">Add Utility</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                         {!! Form::open(['route' =>['storeutilitydistributor'],'method'=>'post','files'=>'true','id'=>'newutility_distributor_form'])!!}
                   @csrf
                        <div class="row">
                        <div class="form-group col-md-3"> {!! Form::label('cateogry', 'Category Name') !!}
               @php
               
               $catdet = DB::table('slj_utlity_cat')->select('category_name')->get();
                @endphp
                <select class="form-control" name="category" required id="category">
        <option value="option_select" disabled selected>Select Option</option>
        @foreach($catdet as $shopping)
            <option value="{{ $shopping->category_name }}">{{ $shopping->category_name }}</option>
        @endforeach
    </select>


        
            <input type="hidden" value="" id="utilitydistributor" name="utilitydistributor">

                        </div>

        <div id="newtool" class="form-group col-md-3"> {!! Form::label('name', 'Enter Item Name') !!}
        {!! Form::text('newtool_name',null, array('class' => 'form-control','placeholder'=>'Enter Tool Name')) !!} </div>
		
          <div class="form-group col-md-3"> {!! Form::label('name', 'Brand Name*') !!}
        {!! Form::text('bname',null, array('class' => 'form-control','placeholder'=>'Enter Brand Name')) !!} </div>
		<div class="form-group col-md-3"> {!! Form::label('name', 'Model Number') !!}
        {!! Form::text('model_number',null, array('class' => 'form-control','placeholder'=>'Enter Model Number')) !!} </div>
                        <div class="row">
                           		<div class="form-group col-md-3"> {!! Form::label('serialnumber', 'Serial  Number') !!}
		 {!! Form::text('serialnumber',null, array('class' => 'form-control','placeholder'=>'Enter Serial Number')) !!} 
		 </div>
		 	 <div class="form-group col-md-3"> {!! Form::label('buyingdate', 'Buying Date*') !!}
                                {!! Form::text('buyingdate',null, array('class' => 'form-control ','id' => 'datepicker2','required'=>'required')) !!} </div>
        
         <div class="form-group col-md-3"> {!! Form::label('buyingprice', 'Buying Price*') !!}
                                {!! Form::text('buyingprice',null, array('class' => 'form-control ','id' => 'datepicker2','required'=>'required')) !!} </div>
    	 <div class="form-group col-md-3"> {!! Form::label('serialno_photo', 'Upload Serialno_Photo') !!}
		 <input type="file" name="serialno_photo" class="form-control" id="serialno_photo" accept="image/*;capture=camera"/>
	        </div>
	  
        </div>
        
        <div class="row">
         <div class="form-group col-md-3"> {!! Form::label('invoice', 'Invoice Upload') !!}
		 <input type="file" name="invoice_file" class="form-control" id="invoice_file" accept="image/*;capture=camera"/>
	        </div>
	        
		 <div class="form-group col-md-3"> {!! Form::label('photo', 'Photo') !!}
		 <input type="file" name="tool_pick" class="form-control" id="tool_pick" accept="image/*;capture=camera"/>
	        </div>
	        	     <div class="form-group col-md-6"> {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',null, array('class' => 'form-control','rows'=>2,'placeholder'=>'Enter Description')) !!} 
</div>

                        </div>

                        <div class="modal-footer">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=>'utility_distributor_form_btn']) !!}
                            {!! Form::button('Cancel', ['class' => 'btn btn-danger','data-dismiss' => 'modal']) !!}
                        </div>

                        {!! Form::close() !!}
                  
                    </div>
        </div>
        </div>
        </div>
     
     
     
@stop
