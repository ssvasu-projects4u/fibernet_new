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
	   @include('inventory.fibermenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Employee Stocks</h3></div>
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
			$employee = null;
			$employee_search = null;
			$category = null;
			$sub_category = null;
			$city = null;
			$brand = null;			
			if(isset($_GET['city']) && ($_GET['city'] > 0)){
				$city = $_GET['city'];
			}
			if(isset($_GET['employee_search']) && ($_GET['employee_search'] != "")) {
				$employee_search = $_GET['employee_search'];
			}
			if(isset($_GET['category']) && ($_GET['category'] > 0)){
				$category = $_GET['category'];
			}
			if(isset($_GET['sub_category']) && ($_GET['sub_category'] > 0)){
				$sub_category = $_GET['sub_category'];
			}
			if(isset($_GET['brand']) && ($_GET['brand'] != "")){
				$brand = $_GET['brand'];
			}			
		?>
		<div class="row">

        <div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
        {!! Form::select('city', $cities, $city, array('required'=>'required','class' => 'form-control','placeholder'=>'-- select city --') ) !!} </div>

		<div class="form-group col-md-3"> {!! Form::label('employee', 'Employee') !!}
			<div class="input-group">
				<input type="text" id="employee_search" size="75" name="employee_search" value="{{ $employee_search }}" class="form-control input-lg search-input ui-autocomplete-input" placeholder="Search employee" required autocomplete="off">
			</div>
		</div>

	
		<input type="hidden" id="category" value="3" name="category">
      	
    <div class="form-group col-md-3"> 
    {!! Form::label('sub_category', 'Sub Category') !!}
		{!! Form::select('sub_category', $subcategories, $sub_category,array('class' => 'form-control','placeholder'=>'-- Select Sub Category --') ) !!} </div>

		<div class="form-group col-md-3">
   		{!! Form::label('brand', 'Brand') !!}
		  <input type="text" value="{{$brand}}" id="brand" size="75" name="brand" class="form-control input-lg search-input ui-autocomplete-input" placeholder="Search for Autofill" required="" autocomplete="off">
		</div>

		<div class="form-group col-md-3"><br> <a href="{{ url('admin/inventory/stocks/employee-fiberwise') }}" class="btn btn-primary">Reset</a> </div>
		</div>
		
		

	  <table class="table table-bordered">
	  <tr class="table-warning">
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
		$('#city').on('change', function() {
			$("#employee_search").val('');
      $('#category').val("");
      $('#sub_category').val("");
      $('#brand').val("");
		});

		var employee_search_src = "{{ route('search.employee.front.json') }}";

		$("#employee_search").autocomplete({
			source: function(request, response) {
				$.ajax({
					url: employee_search_src,
					dataType: "json",
					data: {
						term: request.term,
						city:  $('#city').val(),
					},
					success: function(data) {
						if (data.length == 1) {
						}
						console.log(data);
						response(data);
					}
				});
			},
			min_length: 3,
			select: function(event, ui) {
				$('#employee_search').val(ui.item.value);
        var category = $('#category').val();
        var sub_category = $('#sub_category').val();
        var brand = $('#brand').val();
        location.href = "{{ url('admin/inventory/stocks/employee-fiberwise')}}?brand="+brand+"&category"+category+"&sub_category"+sub_category+"&employee="+ui.item.id+"&employee_search="+ui.item.value+"&city="+$('#city').val();
			},
			messages: {
				noResults: '',
				results: function() {}
			}
		});

		$('#category').on('change', function() {
			var employee = $('#employee').val();
			var category = $(this).val();
			var city = $('#city').val();
		  $('#sub_category').val("");
      var brand = $('#brand').val();
			if (category != '' && category > 0) {
        location.href = "{{ url('admin/inventory/stocks/employee-fiberwise')}}?brand="+brand+"&city="+city+"&employee="+employee+"&category="+category;
      } else {
				location.href = "{{ url('admin/inventory/stocks/employee-fiberwise')}}?brand="+brand+"&city="+city+"&employee="+employee;
			}
		});

		$('#sub_category').on('change', function() {
			{{--  var employee = $('#employee').val();  --}}
			var city = $('#city').val();
			var category = $('#category').val();
			var sub_category = $(this).val();
			var brand = $("#brand").val();
			if (sub_category != '' && sub_category > 0) {
        location.href = "{{ url('admin/inventory/stocks/employee-fiberwise')}}?brand="+brand+"&city="+city+"&employee={{$employee}}&category="+category+"&sub_category="+sub_category;
      }
      else {
  			location.href = "{{ url('admin/inventory/stocks/employee-fiberwise')}}?brand="+brand+"&city="+city+"&employee={{$employee}}&category="+category;
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
				var city = $('#city').val();

        location.href = "{{ url('admin/inventory/stocks/employee-fiberwise')}}?employee={{$employee}}&city="+city+"&brand="+ui.item.value+"&category="+category+"&sub_category="+sub_category;
			},
			messages: {
				noResults: '',
				results: function() {}
			}
		});

	</script>  
@stop
