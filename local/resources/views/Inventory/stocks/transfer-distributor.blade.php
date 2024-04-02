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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Transfer Stock to Distributor</h3></div>
	  <?php if ($stakeholder == "manage-wise") { ?>
	  <div class="float-right"><a href="{{ url('admin/inventory/stocks/') }}" class="btn btn-primary btn-sm"><< Back to {{ ucfirst(str_replace("-wise", "", $stakeholder)) }} Stocks</a></div>	
	  <?php } else { ?>
	  <div class="float-right"><a href="{{ url('admin/inventory/stocks/'.$stakeholder) }}" class="btn btn-primary btn-sm"><< Back to {{ ucfirst(str_replace("-wise", "", $stakeholder)) }} Stocks</a></div>	
	  <?php } ?>
	</div>
	
	
	<div class="card-body">
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
		
		<h5 class="m-10 font-weight-bold text-primary">Product Information</h5>
		<div class="row">
		<div class="col-md-12">
		<table class="table table-striped table-bordered" style="font-size: 12px;">
		<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>SKU</th>
						<th>Unit</th>
						<th>Category</th>
						<th>Sub Category</th>
						<th>Notes</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$product_information->id}}</td>
						<td>{{$product_information->name}}</td>
						<td>{{$product_information->sku}}</td>
						<td>{{$product_information->unit}}</td>
						<td>{{$product_information->category}}</td>
						<td>{{$product_information->sub_category}}</td>
						<td width="20%">{{$product_information->description}}</td>
					</tr>
				</tbody></table>
			</div>
					
		</div>

		<h5 class="m-0 font-weight-bold text-primary">Product Status </h5>
		<table class="table table-striped table-bordered" style="font-size: 12px;" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Total</th>
						<th>Available</th>
						<th>Transferred</th>
						<th>Installed</th>
						<th>Theft</th>
						<th>Damaged</th>
						<th>In-Active</th>
					</tr>
				</thead>
				<tbody>
        <?php if ($product_status) { ?>
					<tr>
						<td>{{ ($product_status->count_total>0)?$product_status->count_total:0 }}</td>
						<td>{{ ($product_status->count_available>0)?$product_status->count_available:0 }}</td>
						<td>{{ ($product_status->count_transferred>0)?$product_status->count_transferred:0 }}</td>
						<td>{{ ($product_status->count_installed>0)?$product_status->count_installed:0 }}</td>
						<td>{{ ($product_status->count_theft>0)?$product_status->count_theft:0 }}</td>
						<td>{{ ($product_status->count_damaged>0)?$product_status->count_damaged:0 }}</td>
						<td>{{ ($product_status->count_inactive>0)?$product_status->count_inactive:0 }}</td>
					</tr>
        <?php } ?>
				</tbody>
			</table>

	
			<div class="card shadow mb-4">
				<div class="card-header py-2">
					<div class="float-left"><h5 class="m-0 font-weight-bold text-primary">Transfer to Distributor</h5></div>
				</div>
				<div class="card-body">	
				
				{!! Form::open(['name'=>'distributor-submit','id'=>'distributor-submit','route' =>'stocks.transfer-to-distributor.submit','method'=>'post'])!!}
		  @csrf
		  <input type="hidden" name="prod_id" value="{{$prod_id}}">
		  <div class="row">	

        <div class="form-group col-md-4"> {!! Form::label('city', 'City') !!}
        {!! Form::select('city', $cities, null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- select city --') ) !!} </div>

		<div class="form-group col-md-4"> {!! Form::label('distributor', 'Distributor') !!}
		{!! Form::select('distributor', [], null,array('required'=>'required','class' => 'form-control','placeholder'=>'-- select distributor --') ) !!} </div>

		<div class="form-group col-md-8"> {!! Form::label('description', 'Description') !!}
		{!! Form::text('description', null,array('class' => 'form-control','placeholder'=>' Enter description ') ) !!} </div>
		</div>
				
    		{!! Form::hidden("stakeholder", $stakeholder) !!}

                <h6 class="m-0 font-weight-bold text-primary">Selected Stock to Transfer</h6>  
<p></p>
                         {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
<p></p>
       	  <div class="table-responsive">
                <table class="table table-bordered" style="font-size: 12px;" id="dest_table">
                <tr class="table-warning">
                <th width="25"><input type="checkbox" id="dest_select_all" name="select_all" value=""></th>    
					<th>Stock Id</th>
					<th>Date Added</th>
					<th>Serial No</th>
					<th>Barcode</th>
					<th>Identification</th>
					<th>Manufacturer</th>
					<th>Brand</th>
					<th>Selling Price</th>					
					<th>Warranty Up To</th>
					<th>Stock Type</th>
					<th>Vendor/Supplier</th>
					<th>Notes</th>
				</tr>
				</table>
            </div>
	  {!! Form::close() !!} 

	  <p></p>

		<h6 class="m-0 font-weight-bold text-primary">Select Available Stock to Transfer </h6>
	  <div class="row">
	  <div class="col-md-12 mb-2">
	  <form class="form-inline">
		 <select name="type" class="form-control" id="select_type">
			<option value="serial_no" selected>Serial No</option>
			<option value="barcode">Barcode</option>
            <option value="brand-name">Brand Name</option>
		</select>
		<div class="input-group">
		<input type="text" id="idtitle" size="75" name="search_string" class="form-control input-lg search-input ui-autocomplete-input" placeholder="Search for Autofill" required="" autocomplete="off">
		</div>

		</form>
		</div></div>
       	  <div class="table-responsive">
                <table class="table table-bordered" style="font-size: 12px;" id="source_table">
                <tr class="table-warning">
                <th width="25"><input type="checkbox" id="select_all" name="select_all" value=""></th>
					<th>Stock Id</th>
					<th>Date Added</th>
					<th>Serial No</th>
					<th>Barcode</th>
					<th>Identification</th>
					<th>Manufacturer</th>
					<th>Brand</th>
					<th>Selling Price</th>					
					<th>Warranty Up To</th>
					<th>Stock Type</th>
					<th>Vendor/Supplier</th>
					<th>Notes</th>
				</tr>
				@foreach ($data as $datarow)
					<tr>
					<td><input type="checkbox" id="checkproduct" class="checkbox" name="checkproduct[]" value="{{$datarow->id}}"></td>
					<td>{{ $datarow->id }}</td>
					<td>{{ date("d-m-Y h:i:s a",strtotime($datarow->created_at)) }}</td>
					<td>{{ $datarow->serial_no }}</td>
					<td>{{ $datarow->barcode }}</td>
					<td>{{ $datarow->identification }}</td>
					<td>{{ $datarow->manufacturer }}</td>
					<td>{{ $datarow->brand }}</td>
					<td>{{ $datarow->buy_price }}</td>
					<td>{{ $datarow->warranty_date != "" ? date("d-m-Y h:i:s a",strtotime($datarow->warranty_date)) : ""}}</td>
					<td>{{ $datarow->type }}</td>
					<td>{{ $datarow->vendor_name }}</td>
					<td>{{ $datarow->notes }}</td>
					</tr>
				@endforeach
				</table>
			</div>
				<?php if (!empty($data->toArray())) { ?>
				{{ $data->appends($_GET)->links() }}
				<?php } ?>

				</div>
			</div>	
		
	  
	</div>
  </div>
	<script src="{{asset('assets/js/autocomplete/jquery.js')}}"></script> 
	<script src="{{asset('assets/js/autocomplete/jquery-ui.min.js')}}"></script>
  	<script type="text/javascript">
  		$(document).ready(function() {
            $('.checkbox').on('click',function() {
              if (this.checked == true) {
                  $(this).closest("tr").detach().appendTo("#dest_table");
              } else {
                  $(this).closest("tr").detach().appendTo("#source_table");                  
              }
            });

            $('#select_all').on('click',function() {
                if(this.checked) {
                    $('.checkbox').each(function() {
                        this.checked = true;
                        $(this).closest("tr").detach().appendTo("#dest_table");
                    });
                }
            });

            $('#dest_select_all').on('click',function() {
                if (this.checked) {
                    $('.checkbox').each(function() {
                        this.checked = false;
                        $(this).closest("tr").detach().appendTo("#source_table");
                    });
                }
            });


			$('#city').on('change', function() {
				var city = $(this).val();
				if(city == '' || city <=0){
					$('#distributor').html("<option value=''>-- Select Distributor --</option>");
					$('#branch').html("<option value=''>-- Select Branch --</option>");
					return;
				}
				$.ajax({
					url: "{{url('inventory/get-distributor-by-city')}}/"+city,
					type: "GET",
					success:function(data) {
					$('#distributor').html(data);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						alert(errorThrown);
					}
				});
			});

			$("#distributor-submit").submit(function( event ) {
				if($('.checkbox:checked').length == 0){
					alert('Select Stock Products');
					return false;
				}	
			});

			var src = "{{ route('search.stock.front.json') }}";
			$("#idtitle").autocomplete({
				source: function(request, response) {
                    $.ajax({
                        url: src,
                        dataType: "json",
                        data: {
                            term: request.term,
                            type:  $('#select_type').val(),
                            stakeholder: "{{ $stakeholder }}",
                            prod_id:  "{{$prod_id}}",                            
                        },
                        success: function(data) {
                            console.log(data);
                            response(data);
                        }
                    });
				},
				min_length: 3,
				select: function(event, ui) {
        			$('#idtitle').val(ui.item.value);
                    $(
                        '<tr>'
                        +'<td><input type="checkbox" checked id="checkproduct" class="selected-checkbox" name="checkproduct[]" value="'+ ui.item.id + '"></td>'
                        +'<td>' + ui.item.id +'</td>'
                        +'<td>' + ui.item.created_at + '</td>'
                        +'<td>' + ui.item.serial_no + '</td>'
                        +'<td>' + ui.item.barcode + '</td>'
                        +'<td>' + ui.item.identification + '</td>'
                        +'<td>' + ui.item.manufacturer + '</td>'
                        +'<td>' + ui.item.brand + '</td>'
                        +'<td>' + ui.item.buy_price + '</td>'
                        +'<td>' + ui.item.warranty_date + '</td>'
                        +'<td>' + ui.item.type + '</td>'
                        +'<td>' + ui.item.vendor_name + '</td>'
                        +'<td>' + ui.item.notes + '</td>'
                        +'</tr>'
                    ).appendTo("#dest_table");
                    $(".selected-checkbox").bind("click", function() {
                        $(this).closest("tr").remove();
                    });
				},
				messages: {
                    noResults: '',
                    results: function() {}
				}
			});

			$('#select_type').on('change', function() {
				$("#idtitle").val('');		
			});
		});

	</script>
	
		  
@stop
