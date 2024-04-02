@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <style>
        .p-viewer {
	z-index: 9999;
	position: absolute;
	top: 33%;
	right: 15px;
}

.fa-eye {
	color: #000;
}
    </style>
    <div class="card shadow mb-4">
	   <div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Change Network</h4></div>
	</div>
	<div class="card-body">
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['employees.store'], 'id'=>'create_form', 'method'=>'post','files'=>'true'])!!}
	      @csrf
          <h5 class="bg-primary text-white px-2 pt-1 pb-1">Authentication Information</h5>
          <div class="row">
					<?php // if( in_array('superadmin', $roles)){ ?>
					<div class="form-group col-md-3"> {!! Form::label('city', 'Authentication Protocol *') !!}
					{!! Form::text('city', null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Enter Authentication protocol --') ) !!} </div>       

                    <div class="form-group col-md-3"> {!! Form::label('name', 'Max Sessions *') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Max Sessions')) !!} </div>

                    <div class="form-group col-md-3"> {!! Form::label('first_name', 'Domain Name*') !!}
        {!! Form::text('first_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Domain Name')) !!} </div>
        
                            <div class="form-group col-md-3"> {!! Form::label('first_name', 'Filter-ID*') !!}
        {!! Form::text('filterid',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Domain Name')) !!} </div>
                            <div class="form-group col-md-3"> {!! Form::label('first_name', 'Circuit-ID*') !!}
        {!! Form::text('circuit',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Domain Name')) !!} </div>



        
    </div>
    <script>
        $('.p-viewer').on("mousedown", function functionName() {
    //Change the attribute to text
    $('#password').attr('type', 'text');
    $('.fa-eye').removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
}).on("mouseup", function () {
    //Change the attribute back to password
    $('#password').attr('type', 'password');
    $('.fa-eye').removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
}
);
    </script>

            
                    <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">IP4 Information</h5>
        <div class="row">

      <?php $iptype = array('StaticIp'=>'Static IP','DHCP'=>'DHCP'); ?>
       
        <div class="form-group  col-md-3"> {!! Form::label('ipaddressmode', 'IP Address Mode*') !!}
        {!! Form::select('ipaddressmode', $iptype,null,array('class' => 'form-control','placeholder'=>'-- Select IP Type --') ) !!} </div>
    <div class="form-group  col-md-3" id="staticiplabel" style="display:none"> 
    {!! Form::label('static ipaddress', 'Static IP Address') !!}
                                    <input type="text" name="staticip" id="staticip" class="form-control">
                                </div>
            
		
			</div>
			
                    <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">IP6 Information</h5>
        <div class="row">

     
  								<div class="form-group col-md-3"> {!! Form::label('ip6', 'IP6  *') !!}
					{!! Form::text('ip6', null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Enter Authentication protocol --') ) !!} </div>       

                    <div class="form-group col-md-3"> {!! Form::label('ipv6', 'Remove IPV6 Prefix Pool') !!}
        {!! Form::text('ipv6',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Max Sessions')) !!} </div>

                    <div class="form-group col-md-3"> {!! Form::label('dgco', 'DGCO V6 PD Pool') !!}
        {!! Form::text('dgco',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Domain Name')) !!} </div>


            
		
			</div>  
			
      

       {!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=>'create_form_btn' ]) !!}
      {!! Form::close() !!}
	</div>
  </div>
  <script>
$(document).ready(function(){
   
        $('#ipaddressmode').on('change', function(){
        
            var optionValue =$(this).val(); 
//                                alert(optionValue);
             if(optionValue=='StaticIp')
            {
                $('#staticiplabel').show();

              
            } 
            else
            {
                
                 $('#staticiplabel').hide();
            }
           
        });
});
</script>

   <script type="text/javascript">
	$(document).ready(function() {
  $('#city').on('change', function() {
            var city = $(this).val();
           
            if(city == '' || city <=0){
            	$('#distributor').html("<option value=''>-- Select Distributor --</option>");
				$('#branch').html("<option value=''>-- Select Branch --</option>");
            	$('.mr10').html("<option value=''>-- Select Franchise --</option>");
				return;
            }
            $.ajax({
                url: "{{url('/admin/branches/citydistributorsextra')}}/"+city,
                type: "GET",
                success:function(data) {
                  
                   $('.kk2').append(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });
		
		
	  $('body').on('change','.checkbxx',function() {
	     
         
        $('input.checkbxx').each(function (e)
          
        {
            
            
            var checked = [];
            var distributor;
           
            var city = $("#city").val();
          
            
           if($(this).is(":checked"))
             {
                 $('.kk').html("");
            checked.push($(this).val());
           
	       for(var i=0;i<checked.length;i++)
        {
            distributor = checked[i];
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorbranchesextra')}}/"+city+"/"+distributor,
                type: "GET",
                success:function(data) {
                   $('#branch').html(data);
                  
                   $('.kk').append(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
             }
        });
	  })

     $('body').on('change','.checkbx',function() {	  
         
        $('input.checkbx').each(function ()
            
        {
           
             var checked = [];
          var branch;
          var city = $("#city").val();
             
        
       
       
	       if($(this).is(":checked"))
             {
                   $('.kk1').html("");
            checked.push($(this).val());
           
	       for(var i=0;i<checked.length;i++)
        {
            branch = checked[i];
           //alert(branch);
          
            $.ajax({
                url: "{{url('/admin/customers/branch-franchisesextra')}}/"+city+"/"+branch,
                type: "GET",
                success:function(data1) {
                    console.log(data1);
                   $('.kk1').append(data1);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
             }
        });
     });
   });
  
  </script>
   <script type="text/javascript">
    $(document).ready(function() {
		var i=0;
		$('#add').click(function() {
			count=$('#dynamic_field tr').length;  
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="file-name-series-'+i+'" placeholder="Certificaticate Name" class="form-control onchangeupload  name_list" name="file_series[]" required value="" /></td><td><input name="file_name_series[]" required type="file"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm ph15 btn_remove">Remove</button></td></tr>');
		});

        $('#department').on('change', function() {
            var department = $(this).val();
            if(department == '' || department <=0){
                $('#designation').html("<option value=''>-- Select Designation --</option>");
                return;
            }
            $.ajax({
                url: "{{url('/admin/employees/department-designations')}}/"+department,
                type: "GET",
                success:function(data) {
                   $('#designation').html(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        });

        $('#create_form').on('keyup blur click', function () {
            var isForm = $(this).validate({
                rules: {
                    city: {"required": true},
                    name: {"required": true},
                    first_name: {"required": true},
                    f_name_c_name: {"required": true},
                    mobile: {"required": true},
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "{{url('admin/franchises/emailchecking')}}",
                            type: "post",
                            data: {
                                email: function () {
                                    return $("#email").val();
                                },
                                user_create_type: 'employee'
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        }
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    id_proof: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                    designation: {
                        required: true,
                    },
                    role: {
                        required: true,
                    },
                }
            }).checkForm();
            if (isForm) {
                $('#create_form_btn').attr('disabled', false);
            } else {
                $('#create_form_btn').attr('disabled', true);
            }
        });

    });

    $('#name').keyup(function () {
            var replaceSpace = $(this).val();

            var result = replaceSpace.trim().replace(/\s/g, "-");

            $("#name").val(result);

        });


	$(document).on('click', '.btn_remove', function(){  
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});

    $('#header_image').change(function() {
        let formData = new FormData($('#header_image_frm')[0]);
        let file = $('input[type=file]')[0].files[0];
        formData.append('file', file, file.name);
        $.ajax({
            url: '{{ url("/upload-file") }}',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',   
            contentType: false,
            processData: false,   
            cache: false,
            data: formData,
            success: function(data) {
                console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

</script>
 <script src="{{ asset('assets/js/multiselect.min.js')}}"></script>
   

   {{-- <link rel="stylesheet" href="{{ mix('assets/css/multiselect.css') }}"> --}}
@stop