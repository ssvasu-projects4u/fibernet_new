@extends('layouts.admin')

@section('content')
	<style>
           .ui-corner-all
        {
            -moz-border-radius: 4px 4px 4px 4px;
        }
       
        .ui-widget
        {
            font-family: Verdana,Arial,sans-serif;
            font-size: 15px;
        }
        .ui-menu
        {
            display: block;
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 2px;
        }
        .ui-autocomplete
        {
			overflow-x: hidden;
			max-height: 200px;
			width:1px;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;
            _width: 160px;
            padding: 4px 0;
            margin: 2px 0 0 0;
            list-style: none;
            background-color: #fff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        }
        .ui-menu .ui-menu-item
        {
            clear: left;
            float: left;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .ui-menu .ui-menu-item a
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            cursor: pointer;
            background-color: #ffffff;
        }
        .ui-menu .ui-menu-item a:hover
        {
            display: block;
            padding: 3px 3px 3px 3px;
            text-decoration: none;
            color: White;
            cursor: pointer;
            background-color: #006699;
        }
        .ui-widget-content a
        {
            color: #222222;
        }
    </style>

    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('inventory.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Manage Stocks</h3></div>
	  
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
		<?php
			$category = null;
			$sub_category = null;
			$brand = null;
			if(isset($_GET['category']) && ($_GET['category'] > 0)){
				$category = $_GET['category'];
			}
			if(isset($_GET['sub_category']) && ($_GET['sub_category'] > 0)){
				$sub_category = $_GET['sub_category'];
			}
			if(isset($_GET['brand']) && ($_GET['brand'] != "")){
				$brand = $_GET['brand'];
			}
			$req = \Request::all();
			$querystring = http_build_query($req);			
		?>
		<div class="row">
		<div class="form-group col-md-3"> 
		{!! Form::label('category', 'Category') !!}
		{!! Form::select('category', $categories, $category,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Category --') ) !!} </div>
		<div class="form-group col-md-3"> 
		{!! Form::label('sub_category', 'Sub Category') !!}
		{!! Form::select('sub_category', $subcategories, $sub_category,array('required'=>'required','class' => 'form-control','placeholder'=>'-- Select Sub Category --') ) !!} </div>
        <div class="form-group col-md-3">
		{!! Form::label('brand', 'Brand') !!}
		  <input type="text" id="brand" value="{{$brand}}" size="75" name="brand" class="form-control input-lg search-input ui-autocomplete-input" placeholder="Search for Autofill" required="" autocomplete="off">
		</div>
		<div class="form-group col-md-3"><br> <a href="{{ url('admin/inventory/stocks') }}" class="btn btn-primary">Reset</a> </div>
		</div>
		
		

	  <table class="table table-bordered">
	  <tr class="table-warning">
	  	<th width="25">Transfer</th>
		<th>Product</th>
		<th>SKU</th>
		<th>Total</th>
		<th>Available</th>
		<th>Transferred</th>
		<th>Installed</th>
		<th>Theft</th>
		<th>Damaged</th>
		<th>In-Active</th>
		<th>Description</th>
	  </tr>
	@foreach ($data as $datarow)
        <tr>
        	<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        @canany([
          "transfer-from-stocks-to-warehouse",
          "transfer-from-stocks-to-distributor",
          "transfer-from-stocks-to-branch",
          "transfer-from-stocks-to-franchise",
          "transfer-from-stocks-to-employee",
        ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can("transfer-from-stocks-to-warehouse")
      			<li><a class="dropdown-item" href="{{url('admin/inventory/stocks/transfer-to-warehouse/manage-wise/'.$datarow->id.'?'.$querystring)}}"><i class="fa fa-reply" aria-hidden="true"></i> Transfer to Warehouse</a></li>
          @endcan
          @can("transfer-from-stocks-to-distributor")
        		<li><a class="dropdown-item" href="{{url('admin/inventory/stocks/transfer-to-distributor/manage-wise/'.$datarow->id.'?'.$querystring)}}"><i class="fa fa-reply" aria-hidden="true"></i> Transfer to Distributor</a></li>
          @endcan
          @can("transfer-from-stocks-to-branch")
        		<li><a class="dropdown-item" href="{{url('admin/inventory/stocks/transfer-to-branch/manage-wise/'.$datarow->id.'?'.$querystring)}}"><i class="fa fa-reply" aria-hidden="true"></i> Transfer to Branch</a></li>
          @endcan
          @can("transfer-from-stocks-to-franchise")			
        		<li><a class="dropdown-item" href="{{url('admin/inventory/stocks/transfer-to-franchise/manage-wise/'.$datarow->id.'?'.$querystring)}}"><i class="fa fa-reply" aria-hidden="true"></i> Transfer to Franchise</a></li>
          @endcan
          @can("transfer-from-stocks-to-employee")
      		  <li><a class="dropdown-item" href="{{url('admin/inventory/stocks/transfer-to-employee/manage-wise/'.$datarow->id.'?'.$querystring)}}"><i class="fa fa-reply" aria-hidden="true"></i> Transfer to Employee</a></li>
          @endcan
        </ul>
        @endcanany
            </div>
		</td>
		<td>{{ $datarow->name }}</td>
		<td>{{ ucfirst($datarow->sku) }}</td>
		<td>{{ ($datarow->count_total>0)?$datarow->count_total:0 }}</td>
		<td>{{ ($datarow->count_available>0)?$datarow->count_available:0 }}</td>
		<td>{{ ($datarow->count_transferred>0)?$datarow->count_transferred:0 }}</td>
		<td>{{ ($datarow->count_installed>0)?$datarow->count_installed:0 }}</td>
		<td>{{ ($datarow->count_theft>0)?$datarow->count_theft:0 }}</td>
		<td>{{ ($datarow->count_damaged>0)?$datarow->count_damaged:0 }}</td>
		<td>{{ ($datarow->count_inactive>0)?$datarow->count_inactive:0 }}</td>
		<td>{{ $datarow->description }}</td>
		</tr>
    @endforeach
	</table>
    {{ !empty($data) ?  $data->links() : ""}}
	</div>
  </div>

	<script src="{{asset('assets/js/autocomplete/jquery.js')}}"></script> 
	<script src="{{asset('assets/js/autocomplete/jquery-ui.min.js')}}"></script>
  	<script type="text/javascript">
  		$('#category').on('change', function() {
            var category_id = $(this).val();
			if(category_id != '' && category_id >0){
            	location.href = "{{ url('admin/inventory/stocks')}}?category="+category_id;
            }else{
				location.href = "{{ url('admin/inventory/stocks')}}";
			}
		});

		$('#sub_category').on('change', function() {
			var category = $('#category').val();
			var sub_category = $(this).val();
			if(sub_category != '' && sub_category >0){
            	location.href = "{{ url('admin/inventory/stocks')}}?category="+category+"&sub_category="+sub_category;
            }else{
				location.href = "{{ url('admin/inventory/stocks')}}?category="+category;	
			}
		});

		var src = "{{ route('search.brand.front.json') }}";
		$("#brand").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: src,
					dataType: "json",
					data: {
						term: request.term,
					},
					success: function(data) {
						if (data.length == 1) {
							$("#brand").val('');
						}
						console.log(data);
						response(data);
					}
				});
			},
			min_length: 3,
			select: function(event, ui) {
				$('#brand').val(ui.item.value);
				var category = $('#category').val();
				var sub_category = $('#sub_category').val();
            	location.href = "{{ url('admin/inventory/stocks')}}?brand="+ui.item.value+"&category="+category+"&sub_category="+sub_category;
			},
			messages: {
				noResults: '',
				results: function() {}
			}
		});
	</script>
		  
@stop
