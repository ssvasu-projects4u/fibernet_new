<?php
$user = Auth::user();
$roles = $user->getRoleNames();
//echo $roles[0];//exit;
$layout = 'layouts.admin';
if ($roles[0] == 'branch' || $roles[0] == 'franchise') {
    //echo $roles[0];exit;
    $layout = 'layouts.' . $roles[0];
}
?> 
@extends($layout)

@section('content')
<!-- Page Heading -->
<div class="card shadow mb-4">
    @include('technical.topmenu')
    <div class="card-header py-2">
        <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Edit Fiber Laying</h3></div>

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


        {!! Form::model($fiberladdetails, array('route' => array('fiber-laying.update', $fiberladdetails->id),'method'=>'put')) !!}
        @csrf

        <div class="row">
            <?php if ($roles[0] != 'branch' && $roles[0] != 'franchise') { ?>
                <div class="form-group col-md-3"> {!! Form::label('city', 'City') !!}
                    {!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>
                <div class="form-group col-md-3"> {!! Form::label('distributor', 'Distributor') !!}
                    {!! Form::select('distributor', $distributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Distributor --') ) !!} </div>
		    
			<div class="form-group col-md-3"> {!! Form::label('subdistributor', 'Sub Distributor') !!}
                    {!! Form::select('subdistributor', $subdistributors, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Sub Distributor --') ) !!} </div>

                <div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
                    {!! Form::select('branch', $branches, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Branch --') ) !!} </div>
            <div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
                    {!! Form::select('franchise', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
          <?php } if ($roles[0] == 'branch' || $roles[0] == 'superadmin' || $roles[0] == 'customer') { ?>
                <div class="form-group col-md-3"> {!! Form::label('franchise', 'Franchise') !!}
                    {!! Form::select('franchise', $items, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Franchise --') ) !!} </div>
            <?php } ?>
            <div class="form-group col-md-3"> {!! Form::label('fiber_name', 'Fiber Name') !!}
                {!! Form::text('fiber_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Name')) !!} </div>

            <div class="form-group col-md-3"> {!! Form::label('fiber_company_name', 'Fiber Company Name') !!}
                {!! Form::text('fiber_company_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Company Name')) !!} </div>

            <div class="form-group col-md-3"> {!! Form::label('fiber_code', 'Fiber Drum Number(Code)') !!}
                {!! Form::text('fiber_code',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Drum Number(Code)')) !!} </div>

            <?php $fiber_to_items = array('dpd'=>'DPD','dp'=>'DP','fh'=>'FH', 'main_line' => 'Main Line'); ?>
            <div class="form-group col-md-3"> {!! Form::label('fiber_to', 'Fiber Related To') !!}
            {!! Form::select('fiber_to', $fiber_to_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>


            <?php $fiber_core_items = array('2' => '2', '4' => '4', '6' => '6', '8' => '8', '12' => '12', '24' => '24', '48' => '48'); ?>
            <div class="form-group col-md-3"> {!! Form::label('fiber_core', 'Fiber Core') !!}
                {!! Form::select('fiber_core', $fiber_core_items, null,array('class' => 'form-control','required'=>'required') ) !!} </div>

            <div class="form-group col-md-9"> {!! Form::label('route_description', 'Route Description') !!}
                {!! Form::text('route_description',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Route Description')) !!} </div>

            <?php
            $fibercolors = array();
            if (isset($fiberladdetails->fiber_color) && !empty($fiberladdetails->fiber_color)) {
                $fibercolors = explode(',', $fiberladdetails->fiber_color);
            }
            ?>
            <div class="form-group col-md-12"> {!! Form::label('fiber_color', 'Fiber Color') !!}
                <div class="row">
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input  class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="blue" <?php
                            if (in_array('blue', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> Blue </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="orange" <?php
                            if (in_array('orange', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> Orange </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="green" <?php
                            if (in_array('green', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> Green </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="brown" <?php
                                                                 if (in_array('brown', $fibercolors)) {
                                                                     echo "checked";
                                                                 }
                                                                 ?>> Brown </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="slate" <?php
                                                                 if (in_array('slate', $fibercolors)) {
                                                                     echo "checked";
                                                                 }
                                                                 ?>> Slate </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="white" <?php
                            if (in_array('white', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> White </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="red" <?php
                            if (in_array('red', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> Red </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="black" <?php
                            if (in_array('black', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> Black </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="yellow" <?php
                            if (in_array('yellow', $fibercolors)) {
                                echo "checked";
                            }
                            ?>> Yellow </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> 
                            <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="violet" <?php
                                   if (in_array('violet', $fibercolors)) {
                                       echo "checked";
                                   }
                            ?>> Violet </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="rose" <?php
                                   if (in_array('rose', $fibercolors)) {
                                       echo "checked";
                                   }
                            ?>> Rose </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline mr10"> 
                            <input class="checkbx fiber_color" name="fiber_color[]" type="checkbox" value="aqua" <?php
                                   if (in_array('aqua', $fibercolors)) {
                                       echo "checked";
                                   }
                            ?>> Aqua </label>	
                    </div>	
                </div>

            </div>
            <div class="col-md-6 form-group"> {!! Form::label('fiber_starting_reading', 'Fiber Start Reading') !!}
                {!! Form::text('fiber_starting_reading',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Start Reading')) !!} </div>
            <div class="col-md-6 form-group"> {!! Form::label('fiber_starting_long_lat', 'Fiber Start Lat & Long') !!}
                {!! Form::text('fiber_starting_long_lat',null, array('class' => 'form-control','id'=>'map2','required'=>'required','placeholder'=>'Enter Start Latitude & Longitude')) !!} <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="2">Get</a></div>



            <div class="col-md-12 form-group">{!! Form::label('poles_info', 'Enter and Add Poles Data Here') !!}
                <table class="table" width="100%" id="dynamic_field" style="border: 1px solid #ccc">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th style="width:200px">Pole Series</th>
                            <th style="width:300px">Lat & Longitude</th>
                            <th style="width:100px"> </th>
                            <th style="width:200px">Loop? </th>
                            <th style="width:200px">Loop(Meters)</th>
                            <th style="width:200px">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="pole_rows">
                        
                        
                        

<?php foreach ($fiberlaying_poles as $key => $pole) { ?>
                            <tr pole_num="{{$key+3}}"> 

                        <input type="hidden"  id="polescount" name="count" value="1" /> 

                        <td> 
                            <input type="hidden" id="pole_id" class="form-control name_list" name="pole_id[]" value="{{$pole->id}}" />

                            <input type="text" id="pole_series" class="form-control name_list" name="pole_series[{{$pole->id}}]" value="{{$pole->pole_series}}" />

                        </td>
                        
                        <td> <input type="text" id="map{{$key+3}}" class="form-control name_list" name="pole_long_lat[{{$pole->id}}]"  value="{{$pole->long_lat}}" /> </td>

                        <td> <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num='{{$key+3}}' id="long_lat{{$key+3}}">Get</a> </td>

                        <td> <input type="checkbox" class="pole_loop_adding" id="check{{$pole->id}}"  name="loop_on[{{$pole->id}}]" value="1" <?php
    if ($pole->loop_meters > 0) {
        echo "checked";
    }
    ?>> </td>

                        <td>
                            <div class="max_tickets{{$pole->id}}" <?php
    if ($pole->loop_meters <= 0) {
        echo "style='display:none;'";
    }
    ?>> 
                                <input type="text" class="form-control" name="loop_meters_num[{{$pole->id}}]" id="checkbox{{$pole->id}}" value="{{$pole->loop_meters}}">
                            </div>
                        </td>

                        <td>
    <?php if ($key == 0) { ?>
                                <button type="button" id="add" name="add" class="btn btn-primary btn-sm ph15"> Add Pole </button>
    <?php } else { ?>
                                <a  title='delete' onclick="return confirm('Are you sure to delete?')" href="{{url('admin/fiber-laying/polls-readings/'.$pole->id.'/delete')}}" class="btn btn-danger btn-sm ph15 btn_remove">Delete Pole</button>
    <?php } ?>	
                        </td>
                        </tr>  
<?php } ?>

                    </tbody>
                </table>
            </div>

            <div class="col-md-6 form-group"> {!! Form::label('fiber_ending_reading', 'Fiber End Reading') !!}
                {!! Form::text('fiber_ending_reading',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Fiber Ending Reading')) !!} </div>

            <div class="col-md-6 form-group"> {!! Form::label('ending_long_lat', 'Fiber End Lat & Long') !!}
                {!! Form::text('ending_long_lat',null, array('class' => 'form-control','id'=>'map22','required'=>'required','placeholder'=>'Enter End Latitude & Longitude')) !!} <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="22">Get</a></div>
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!} 
        {!! Form::close() !!} 
    </div>
</div>

<script type="text/javascript">
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
		if($('#map'+map_num).val()===null || $('#map'+map_num).val()==='')  {
                    
                $('#map'+map_num).val(position.coords.latitude+","+ position.coords.longitude);
            }
	}


    $(document).ready(function () {
        $('#city').on('change', function () {
            var city = $(this).val();
            if (city == '' || city <= 0) {
                $('#distributor').html("<option value=''>-- Select Distributor --</option>");
                $('#branch').html("<option value=''>-- Select Branch --</option>");
                $('#franchise').html("<option value=''>-- Select Franchise --</option>");
                return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributors')}}/" + city,
                type: "GET",
                success: function (data) {
                    $('#distributor').html(data);
                    $('#branch').html("<option value=''>-- Select Branch --</option>");
                    $('#franchise').html("<option value=''>-- Select Franchise --</option>");
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

       /* $('#distributor').on('change', function () {
            var distributor = $(this).val();
            var city = $("#city").val();
            if (distributor == '' || distributor <= 0) {
                $('#branch').html("<option value=''>-- Select Branch --</option>");
                $('#franchise').html("<option value=''>-- Select Franchise --</option>");
                return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranches')}}/" + city + "/" + distributor,
                type: "GET",
                success: function (data) {
                    $('#branch').html(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); */
		
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
                    alert(errorThrown);
                }
            });
        }); 
		
		 $('#subdistributor').on('change', function() {
            var subdistributor = $(this).val();  
				
            if(subdistributor == '' || subdistributor <=0){
            	$('#branch').html("<option value=''>-- Select Branch --</option>");
				 $('#franchise').html("<option value=''>-- Select Franchise --</option>");
            	return;
            }
            $.ajax({
                url: "{{url('/admin/franchises/branches')}}/"+subdistributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }); 


        $('#branch').on('change', function () {
            var city = $("#city").val();
            var branch = $(this).val();
            if (branch == '' || branch <= 0) {
                $('#franchise').html("<option value=''>-- Select Franchise --</option>");
                return;
            }
            $.ajax({
                url: "{{url('/admin/customers/branch-franchises')}}/" + city + "/" + branch,
                type: "GET",
                success: function (data) {
                    $('#franchise').html(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });


        $('#fiber_core').change(function () {
            $('.fiber_color').each(function () {
                $(this).prop("checked", 0);
            });
        });

        $('.fiber_color').change(function () {
            var colors = 0;
            $('.fiber_color').each(function () {
                if ($(this).is(':checked')) {
                    colors = colors + 1;
                }
            });

            if (colors > $('#fiber_core').val()) {
                $(this).prop("checked", 0);
                alert('Reached Maximum Limit. Fiber Core Limit is ' + $('#fiber_core').val());
                return false;
            }
            //alert(colors);  
        });


        //$('#city').val({{old('city')}}).trigger('change');

    });



    $(document).ready(function () {

        var check = ".max_tickets" + 0;
        $(check).hide();
        var i = 3;
        $('#add').click(function () {
            count = $('#pole_rows tr').length+1;
            var mapnum=parseInt($('#pole_rows tr:last').attr('pole_num'))+1;
            i++;
            $('#pole_rows').append(`
                <tr id="row${count}"  pole_num="${mapnum}">
                    <td>
                    <input type="text" id="pole_series" class="form-control name_list" name="pole_series[]" value="Pole ${(count)}" />
                    </td>
                    <td>
                    <input type="text" name="pole_long_lat[]" id="map${mapnum}" class="form-control name_list" />
                    </td>
                    <td>
                    <a class="btn btn-warning text-white btn-sm ph15 getMap" map_num="${mapnum}" name="get[]" id="long_lat${count}" >Get</a></td>
                    <td><input type="checkbox" class="pole_loop_adding" id="check${count}"  name="loop_on[]" value="1"></td>
                    <td><div class="max_tickets${count}"><input type="text" name="loop_meters_num[]" class="form-control">
                    </div>
                    </td>
                    <td><button type="button" name="remove" id="${count}" class="btn btn-danger btn-sm ph15 btn_remove">Delete Pole</button>
                    </td>
                </tr>`);

            var polecount = $('#polescount');
            var poleValue = polecount.val();
            poleValue++;
            polecount.val(poleValue);
            var check = ".max_tickets" + i;
            $(check).hide();

        });

    });

    $(document).on('click', '.btn_remove', function () {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();

        var polecount = $('#polescount');
        var poleValue = polecount.val();
        poleValue--;
        polecount.val(poleValue);

        var x = document.getElementsByClassName("polesnew");
        var i;

        for (i = 0; i < x.length; i++) {
            var val = i + 2;
            x[i].innerHTML = "Pole " + val;
        }
    });

    $(document).on('change', '[type=checkbox]', function (e) {
        var idNum = $(this).attr("id").replace(/\D/g, '');
        var check = ".max_tickets" + idNum;

        if ($(this).is(":checked")) {
            $(check).show();

        } else {
            $(check).hide();
        }

    });

    $(document).on('click', '.getLocation', function () {

        var idNum = $(this).attr("id").replace(/\D/g, '');
        var check = "loc" + idNum;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }

        function showPosition(position)
        {
            document.getElementById(check).value = position.coords.latitude + "," + position.coords.longitude;
        }
    });
</script>
@stop
