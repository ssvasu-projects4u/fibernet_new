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
	   @include('administration.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Create Employee</h4></div>
	</div>
 <?php 
		if(isset($_GET['city'])){$city_id = $_GET['city'];}else{$city_id = null;}
		if(isset($_GET['distributor'])){$distributor_id = $_GET['distributor'];}else{$distributor_id = null;}
		if(isset($_GET['branch'])){$branch_id = $_GET['branch'];}else{$branch_id = null;}
		if(isset($_GET['franchise'])){$franchise_id = $_GET['franchise'];}else{$franchise_id = null;}
	?>
	<div class="card-body">
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  {!! Form::open(['route' =>['employees.store'], 'id'=>'create_form', 'method'=>'post','files'=>'true'])!!}
	      @csrf
          <h5 class="bg-primary text-white px-2 pt-1 pb-1">Basic Information</h5>
          <div class="row">
					<?php // if( in_array('superadmin', $roles)){ ?>
					<div class="form-group col-md-3"> {!! Form::label('city', 'City *') !!}
					{!! Form::select('city', $cities, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select City --') ) !!} </div>       

                    <div class="form-group col-md-3"> {!! Form::label('name', 'Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Name')) !!} </div>

                    <div class="form-group col-md-3"> {!! Form::label('first_name', 'First Name*') !!}
        {!! Form::text('first_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter First Name')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('last_name', 'Last Name*') !!}
        {!! Form::text('last_name',null, array('class' => 'form-control', 'placeholder'=>'Enter Last Name')) !!} </div>

                <div class="form-group col-md-3"> {!! Form::label('f_name_c_name', 'Father Name*') !!}
        {!! Form::text('f_name_c_name',null, array('class' => 'form-control', 'placeholder'=>'Enter Father Name')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('email', 'Email (should be unique )*') !!}
				        {!! Form::text('email',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('mobile', 'Mobile Number*') !!}
        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Mobile Number')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('alt_mobile_num', 'Alternate Mobile No') !!}
				        {!! Form::text('alt_mobile_num',null, array('class' => 'form-control','placeholder'=>'Enter Alternate Mobile No')) !!} </div>

        <div class="form-group col-md-3">
            <label for="password" class="col-form-label text-md-right">{{ __('Password*') }}</label>

            <div class="col-md-61">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password"/>
                <span class="p-viewer">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>
                
                <p>The password must be at least 8 characters.</p>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-3"> {!! Form::label('employee_photo', 'Employee Photo') !!} {!! Form::file('employee_photo',null, array('class' => 'form-control')) !!} </div>

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
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Address</h5>

          <div class="row">

        <div class="form-group col-md-3"> {!! Form::label('address', 'Address*') !!}
        {!! Form::textarea('address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Address')) !!} </div>

                    </div>

                    <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Employement Details</h5>
        <div class="row">

        <div class="form-group col-md-3">
            {!! Form::label('joining_date', 'Joining Date *') !!}
            {!! Form::date('joining_date',
                date('Y-m-d'),
                array('class' => 'form-control datepicker',
                'required' => 'required',
                'id' => 'joining-date',
                'placeholder' => 'yyyy-mm-dd')
            ) !!} @if ($errors->has('joining_date'))
            <span class="help-block">
                    <strong>{{ $errors->first('joining_date') }}</strong>
            </span> @endif
        </div>

        <?php $user_statuses = array('Y'=>'Active','N'=>'In Active'); ?>
        <div class="form-group  col-md-3"> {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', $user_statuses, null,array('class' => 'form-control') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('department', 'Department*') !!}
        {!! Form::select('department', $departments, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Department --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('designation', 'Designation*') !!}
        {!! Form::select('designation', [] , null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Designation --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('role', 'Role*') !!}
        {!! Form::select('role', $roles, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Role --') ) !!} </div>
          <div class="form-group col-md-12"> {!! Form::label('distributor', 'Distributor') !!}
    	<div class="row kk2" style="height: 200px;overflow: scroll;border: 1px solid #ccc">
            
		
			</div>  
			</div>
			
       <div class="form-group col-md-12"> 
        	{!! Form::label('branches', 'Branches') !!}
			<div class="row kk" style="height: 200px;overflow: scroll;border: 1px solid #ccc">
            
		
			</div>
         </div>
         <div class="form-group col-md-12"> 
        	{!! Form::label('franchise', 'Franches') !!}
			<div class="row kk1" style="height: 200px;overflow: scroll;border: 1px solid #ccc">
            
		
			</div>
         </div>
	
        </div>
        <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Upload Documents</h5>
        <div class="row">
        <div class="form-group col-md-12">
            <table class="table" width="100%" style="border: 1px solid #ccc">
                <thead>
                    <tr class="bg-dark text-white">
                        <th style="width:200px">Document Name</th>
                        <th style="width:300px">File Upload</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{!! Form::label('resume', 'Resume') !!}</td>
                            <td>{!! Form::file('resume',null, array('id'=> 'resume', 'class' => 'form-control')) !!}</td>
                        </tr>
                        <tr> 
                            <td>{!! Form::label('aadhar_card', 'Aadhar Card') !!}</td>
                            <td>{!! Form::file('aadhar_card',null, array('class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('id_proof', 'ID Proof*') !!}</td>
                            <td> {!! Form::file('id_proof',null, [
                                'class' => 'form-control',
                                'required' => '']) !!}
                            </td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('pan_card', 'PAN Card') !!}</td>
                            <td>{!! Form::file('pan_card',null, array('class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('experience_letter', 'Experience Letter') !!}</td>
                            <td>{!! Form::file('experience_letter',null, array('class' => 'form-control')) !!}</td>
                        </tr>
                </tbody>
            </table>
        </div>
        </div>
        <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Education Certificates</h5>
        <div class="row">
        <div class="form-group col-md-12">
            <table class="table" width="100%" id="dynamic_field" style="border: 1px solid #ccc">
                <thead>
                    <tr class="bg-dark text-white">
                        <th style="width:200px">Document Name</th>
                        <th style="width:300px">File Upload</th>
                        <th style="width:200px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SSLC</td>
                        <td>
                            {!! Form::file("sslc",null, array('id'=> 'sslc-file', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>PUC/Diploma/+2</td>
                        <td>
                            {!! Form::file("puc_diploma_file",null, array('id'=> 'puc-diploma-file', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Under Graduate</td>
                        <td>
                        {!! Form::file("under_graduate",null, array('id'=> 'graduate', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Post Graduate</td>
                        <td>
                        {!! Form::file("post_graduate",null, array('id'=> 'post-graduate', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                        <td><button type="button" id="add" name="add" class="btn btn-primary btn-sm ph15"> Add Certificate</button></td>
                    </tr>
            </tbody>
        </table>
            </div>
        </div>

       {!! Form::submit('Submit', ['class' => 'btn btn-success', 'id'=>'create_form_btn' ]) !!}
      {!! Form::close() !!}
	</div>
  </div>
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