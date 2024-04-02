@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   

<div class="card-header bottom-submenu my-0 py-0 pl-0 pt-0 pr-2">
<nav class="navbar py-0">
<ul class="nav">


@if(Request::segment(2) == 'distributors')
  @can("create-distributor")
    <li class="nav-item"><a class="nav-link utility-distributor" rId="{{$id}}" href="javascript:void(0);">Create Utility</a></li>
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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Utilities List</h3></div>
	  
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
	      <th>Distributor Office</th>
		<th>Category</th>
			
		<th>Tool Name</th>
		<th>Model Number</th>
		<th>Serial Number</th>
			
				<th>Photo</th>   
				<th>Description</th>
    
	  </tr>
	  <?php
	    $user =Auth::user();
              $id = \Auth::user()->id;
              $roles = $user->getRoleNames();
        $dp=array();
        ?>
  	   	@foreach ($data as $datarow)

        <tr>
            
		
    <td>
        @php
        $dist = DB::table('slj_distributors')->where('id',$datarow->distributor)->first(); 
        @endphp
	   	    {{ $dist->distributor_name }}
        
        </td>
        <td>{{ $datarow->category_name}}</td>
    	<td>{{ $datarow->itemname }}</td>
	<td>{{ $datarow->modelno }}</td>
	<td>{{ $datarow->serial_no }}</td>

    
        <?php
			$path = asset('public/uploads/default-image.png');
			
			$src = asset('public/uploads/office/'.$datarow->photo);
			if($datarow->photo !=''){
				$path = $src;
			}	
		?>
    
        	<td align="center"><img src="{{asset($path)}}" width="50">
       </td>

    </td>
   <td> {{ $datarow->description }}</td>
  </tr>
  
  <!--
  <a href="{{url('admin/inventory/products/customer/'.$datarow->id)}}"></a>
   $stockinfo= DB::table('slj_stock_products')
    ->select(DB::raw('SUM(product) as total_products','product'))->whereIn('id',$dp)
    ->groupBy('product')
    ->get();
  
  -->
    @endforeach
  
    
    
 
        
  
	</table>

	</div>
  </div>
  
  <!-- start model -->
  
  
  <!-- end model -->
  
<script type="text/javascript">
	$(document).ready(function() {
  $('#cateogry').on('change', function() {
            var cateogry = $(this).val();
           // alert(cateogry);
            
            $.ajax({
                url: "{{url('admin/inventory/products/items/')}}/"+cateogry,
                type: "GET",
                success:function(data) {
                   // alert(data);
                   $('#ItemName').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
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
     $('.utility-distributor').on('click', function () {
                                        var rid = $(this).attr('rId');
                                       $('#utilitydistributor').val(rid);
                                      //alert('welcome');
                                       $('#kingdist10').modal('show');

                                   });
                                    
</script>
	 
	 
		  <div id="kingdist10" class="modal fade" role="dialog" aria-labelleddy="myModalLabel" style="display:none;">
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
