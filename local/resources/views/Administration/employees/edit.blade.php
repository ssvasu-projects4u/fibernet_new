@extends('layouts.admin')

@section('content')
<!--  <link href="{{asset('assets/css/multiselect.css')}}" rel="stylesheet">
     <script src="{{ asset('assets/js/multiselect.min.js')}}"></script> -->
    <script src="{{ asset('assets/js/bootstrap-multiselect.js')}}"></script>
     
  
    <?php
        //dd($userdetails);
    ?>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit Employee</h4></div>
	  
	</div>
	
	
	<div class="card-body">
	   
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif

	  {!! Form::model($userdetails, array('route' => array('employees.update', $userdetails->id), 'id'=>'edit_form', 'method'=>'put', 'files'=>'true')) !!}
      @csrf
      @csrf
          <h5 class="bg-primary text-white px-2 pt-1 pb-1">Basic Information</h5>
          <div class="row">
            <input type="hidden" id="user-id" name="user_id" value="{{ $userdetails->user_id }}">
            <input type="hidden" id="emp_id" name="emp_id" value="{{ $userdetails->id }}">
					<?php // if( in_array('superadmin', $roles)){ ?>
        <div class="form-group col-md-3"> {!! Form::label('state', 'State *') !!}
					{!! Form::select('state', $states, null,array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select State --') ) !!} </div>

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
				        {!! Form::text('email',str_replace("e-", "", $userdetails->email) , array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Email')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('mobile', 'Mobile Number*') !!}
        {!! Form::text('mobile',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Mobile Number')) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('alt_mobile_num', 'Alternate Mobile No') !!}
				        {!! Form::text('alt_mobile_num',null, array('class' => 'form-control','placeholder'=>'Enter Alternate Mobile No')) !!} </div>

        <div class="form-group col-md-3">
            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-61">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password"  placeholder="Enter Password">
                <p>The password must be at least 8 characters.</p>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-3"> 
            {!! Form::label('employee_photo', 'Employee Photo') !!} 
            <?php
                $path = asset('local/public/uploads/default-image.png');
				

                $src = asset('local/public/uploads/employees/'.$userdetails->employee_photo);
			
                if($userdetails->employee_photo !=''){
                    $path = $src;
                }
            ?>
            <div><img width="100px" height="100px" src="{{asset($path)}}"></div>
            <p></p>
            {!! Form::file('employee_photo',null, array('class' => 'form-control')) !!} </div>
            
         
           
           
           <div class="form-group col-md-3">
                	{!! Form::label('distributor', 'Distributor') !!}
			   		 <?php
			    	$distributorgroup = array();
            if(!empty($userdetails->distributor)){
                
								$distributorgroup = explode(",",$userdetails->distributor);
								
							
            }
           
            ?>
            <div>
              <select class="form-control"  name="distributor[]" id="example-getting-started-distributor" multiple>
                    @php $user1 = DB::table('slj_distributors')->select('id','distributor_name')->get(); @endphp
            @foreach($user1 as $p)

      <option value="{{$p->id}}" <?php if(in_array($p->id,$distributorgroup)){echo "selected";} ?>>{{$p->distributor_name}}</option>
		   
			
			@endforeach					
					</select>					
            
</div>			
            </div>

            <div class="form-group col-md-3">
                	{!! Form::label('subdistributor', 'Sub Distributor') !!}
			   		 <?php
			    	$subdistributorgroup = array();
                   
            if(!empty($userdetails->subdistributor)){
                
								$subdistributorgroup = explode(",",$userdetails->subdistributor);
								
							
            }
           
            ?>

           
            <div>
              <select class="form-control"  name="subdistributor[]" id="example-getting-started-subdistributor" multiple>
              <?php

                $distids = explode(',',$userdetails->distributor);

                       //if(!empty($userdetails->subdistributor)){
                           ?>
              @foreach($distids as $dist) 
            @php 
                $subdis = DB::table('slj_subdistributors')->where('distributor_id', $dist)->get();
                             
            @endphp
            @foreach($subdis as $subd)
              <option value="{{$subd->id}}" <?php if(in_array($subd->id,$subdistributorgroup)){echo "selected";} ?>>{{$subd->subdistributor_name}}</option>

              @endforeach
			@endforeach
            <?php //} ?>		
					</select>					
            
</div>			
            </div>
           
           
           
           
           
            <div class="form-group col-md-3">
                	{!! Form::label('branches', 'Branches') !!}
		       <?php
			    	$branchesgroup = array();
            if(!empty($userdetails->branch)){
                
								$branchesgroup = explode(",",$userdetails->branch);
								
							
            }
           
            ?>
            <div>
              <select class="form-control branchc"  name="branches[]" id="example-getting-started-branch" multiple>
                  
           <?php
                     //  if(!empty($userdetails->branch)){
                        $braches = explode(",",$userdetails->subdistributor);
                     
                           ?>
             @foreach($braches as $bra)
            @php 
               
                  $branches = DB::table('slj_branches')->where('subdistributor_id',$bra)->get(); 
                 
                
            @endphp
            @foreach($branches as $bran)
              <option value="{{$bran->id}}" <?php if(in_array($bran->id,$branchesgroup)){echo "selected";} ?>>{{$bran->branch_name}}</option>

              @endforeach
            
              @endforeach		
			
			
            <?php // } ?>
			    </select>
			  </div>
			</div>
           
            
            <div class="form-group col-md-3">
                	{!! Form::label('franchise', 'Franchises') !!}
		
			   		 <?php
			    	$branchesgroup1 = array();
            if(!empty($userdetails->franch)){
                
								$branchesgroup1 = explode(",",$userdetails->franch);
								
                                $fanches = explode(",",$userdetails->branch);
							
            }
            ?>
             <select class="form-control"  name="franchises[]" id="example-getting-started" multiple>
             @foreach($fanches as $fr)                 
            @php 
                      
            $allfranch = DB::table('slj_franchises')->where('branch', $fr)->get(); 
            @endphp
            @foreach($allfranch as $fra)  
            <option value="{{$fra->id}}" <?php if(in_array($fra->id,$branchesgroup1)){echo "selected";} ?>>{{$fra->franchise_name}}</option>
			@endforeach
			@endforeach	
                   </select>
            		
										
            
			</div>
			
            </div>
            <!--
              <div class="form-group col-md-3">
                  	{!! Form::label('franchise', 'Franchises') !!}
                  		/* 
                  		
			    	$branchesgroup1 = array();
            if(!empty($userdetails->franch)){
                
								$branchesgroup1 = explode(",",$userdetails->franch);
								
							
            }
            ?>
            */
                  <select class="form-control kkk"  name="franchises1[]" id="example-getting-started" multiple>
                                  @foreach($branchesgroup1 as $pp)
            @php 
            $user1 = DB::table('slj_franchises')->where('id', $pp)->first(); 
            
            @endphp
            <option value="{{$pp}}">{{$user1->franchise_name}}</option>
			
			@endforeach	
                   </select>
                                
                 </div>

              
            
             </div>
            -->

    </div>
    <style>
		/* example of setting the width for multiselect */
		#testSelect1_multiSelect {
		    
			width: 200px;
		}
	</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started-branch').multiselect();
        $('#example-getting-started-distributor').multiselect();
        $('#example-getting-started-subdistributor').multiselect();
        $('#example-getting-started').multiselect();
        
    });
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
        {!! Form::select('designation', $designations, $userdetails['designation'],array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Designation --') ) !!} </div>

        <div class="form-group col-md-3"> {!! Form::label('role', 'Role*') !!}
        {!! Form::select('role', $roles, $role, array('class' => 'form-control','required'=>'required','placeholder'=>'-- Select Role --') ) !!} </div>
        </div>


        <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Upload Documents</h5>
        <div class="row">
        <div class="form-group col-md-12">
            <table class="table" width="100%" style="border: 1px solid #ccc">
               <thead>
                    <tr class="bg-dark text-white">
                        <th style="width:200px">Document Name</th>
                        <th style="width:200px">File View</th>
                        <th style="width:150px">File Name</th>
                        <th style="width:300px">File Upload</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{!! Form::label('resume', 'Resume') !!}</td>
                            <td>                          
                            <?php
                                if ($userdetails->resume != "") { 
                                    $src = asset('local/public/uploads/employees/'.$userdetails->resume);
									
                                    $src1=$userdetails->resume;
                                    
                                ?>
                                  <a href="{{ $src }}" target="_blank" >View</a>
                                 
                                  
                            <?php } else $src1=""; ?>
                            </td>
                            <td>{{$src1}}</td>
                            <td>{!! Form::file('resume',null, array('id'=> 'resume', 'class' => 'form-control')) !!}</td>
                        </tr>
                        <tr> 
                            <td>{!! Form::label('aadhar_card', 'Aadhar Card') !!}</td>
                            <td>
                            <?php 
                                if ($userdetails->aadhar_card != "") { 
                                        $src = asset('local/public/uploads/employees/'.$userdetails->aadhar_card);
										
                                        $src1=$userdetails->aadhar_card;
                                ?>
                                <a href="{{ $src }}" target="_blank" >View</a>
                            <?php } else $src1=""; ?>
                            </td>    
                            <td>{{ $src1 }}</td>                        
                            <td>{!! Form::file('aadhar_card',null, array('class' => 'form-control')) !!}</td>
                        </tr>
                        <tr> 
                            <td>{!! Form::label('id_proof', 'ID Proof*') !!}</td>
                            <td>
                                <?php
                                if ($userdetails->id_proof != "") { 
                                    $src = asset('local/public/uploads/employees/'.$userdetails->id_proof);
								
                                    $src2=$userdetails->id_proof;
                                ?>
                                    <a href="{{ $src }}" target="_blank" >View</a>
                                <?php } else $src2=""; ?>
                            </td>
                            <td>{{ $src2 }}</td> 
                            <td> {!! Form::file('id_proof',null, [
                                'class' => 'form-control',
                                'required' => '']) !!}
                            </td>
                        </tr>
                        <tr> 
                            <td>{!! Form::label('pan_card', 'PAN Card') !!}</td>
                            <td>
                            <?php 
                                    if ($userdetails->pan_card != "") { 
                                        $src = asset('local/public/uploads/employees/'.$userdetails->pan_card); 
										
                                        $src2=$userdetails->pan_card;
                                ?>
                                        <a href="{{ $src }}" target="_blank" >View</a>
                                <?php } else $src2=""; ?>
                            </td>
                            <td>{{ $src2 }}</td>                             
                            <td>{!! Form::file('pan_card',null, array('class' => 'form-control')) !!}</td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('experience_letter', 'Experience Letter') !!}</td>
                            <td>
                            <?php 
                                if ($userdetails->experience_letter != "") {
                                   $src = asset('local/public/uploads/employees/'.$userdetails->experience_letter);
									
                                    $src2=$userdetails->experience_letter;
                                ?>
                                    <a href="{{ $src2 }}" target="_blank" >View</a>
                            <?php } else $src2=""; ?>
                            </td> 
                            <td>{{ $src2 }}</td>                            
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
                        <th style="width:200px">File View</th>   
                       <th style="width:150px">File Name</th>
                        <th style="width:300px">File Upload</th>
                        <th style="width:200px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SSLC</td>
                        <td>
                        <?php
                            if ($userdetails->sslc != "") {
                                $src = asset('local/public/uploads/employees/'.$userdetails->sslc);  
									 
                            ?>
                                    <a href="{{ $src }}" target="_blank" >View</a>
                            <?php } else $src=""; ?>
                        </td>  
                        <td></td>
                        <td>
                            {!! Form::file("sslc",null, array('id'=> 'sslc-file', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                       
                    </tr>
                    <tr>
                        <td>PUC/Diploma/+2</td>
                        <td>
                            <?php 
                            if ($userdetails->puc_diploma != "") {
                                $src = asset('local/public/uploads/employees/'.$userdetails->puc_diploma);
								
                                ?>
                                <a href="{{ $src }}" target="_blank" >View</a>
                            <?php } ?>
                        </td>
                         <td></td>
                        <td>
                            {!! Form::file("puc_diploma_file",null, array('id'=> 'puc-diploma-file', 'class' => 'form-control onchangeupload')) !!}
                            
                          
                        </td>
                       
                    </tr>
                    <tr>
                        <td>Under Graduate</td>
                        <td>
                            <?php
                            if ($userdetails->under_graduate != "") {
                                $src = asset('local/public/uploads/employees/'.$userdetails->under_graduate);
								 
                            ?>
                                    <a href="{{ $src }}" target="_blank" >View</a>
                            <?php } ?>
                        </td>
                         <td></td>
                        <td>
                        {!! Form::file("under_graduate",null, array('id'=> 'graduate', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                       
                    </tr>
                    <tr>
                        <td>Post Graduate</td>
                        <td>
                            <?php
                            if ($userdetails->post_graduate != "") {
                                $src = asset('local/public/uploads/employees/'.$userdetails->post_graduate);
																
                                ?>
                                <a href="{{ $src }}" target="_blank" >View</a>
                            <?php } ?>
                        </td>
                        <td>
                        {!! Form::file("post_graduate",null, array('id'=> 'post-graduate', 'class' => 'form-control onchangeupload')) !!}
                        </td>
                        <td><button type="button" id="add" name="add" class="btn btn-primary btn-sm ph15"> Add Certificate</button></td>
                    </tr>
                    <?php
                        if (!empty($certificates)) {
                        foreach($certificates as $key => $file) {
                            ?>
                            <tr id="row-existing-{{ $file->id }}">
                                <td>
                                    <input type="text" id="file-series-existing-{{ $file->id }}"
                                    placeholder="Certificaticate Name" class="form-control onchangeupload  name_list"
                                    name="file_existing_series[{{ $file->id }}]" required value="{{ $file->certification_name }}" />
                                </td>
                            
                                <td>

                                <?php 
								$src = asset('local/public/uploads/employees/' . $file->filename);
								
								

								?>
                                    <a href="{{ $src }}" target="_blank" >View</a>
                                    <p></p>
                                </td>
                                <td>
                                <input name="file_existing_name_series[{{ $file->id }}]"  type="file">
                            </td>
                                
                                <td>
                                    <button type="button" name="remove" id="{{$file->id}}" class="btn btn-danger btn-sm ph15 existing_btn_remove">Remove</button>
                               </td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
            </div>
        </div>
        <input name="remove_existing" id="remove-existing" type="hidden" value="">
		{!! Form::submit('Update', ['class' => 'btn btn-success', 'id'=>'create_form_btn']) !!}
		{!! Form::close() !!}

  </div>
  <script>
      <script>
$(document).ready(function(){

 $('#first_level').multiselect({
  nonSelectedText:'Select First Level Category',
  buttonWidth:'400px',
  onChange:function(option, checked){
   $('#second_level').html('');
   $('#second_level').multiselect('rebuild');
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_second_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#second_level').html(data);
      $('#second_level').multiselect('rebuild');
     }
    })
   }
  }
 });
  });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
		var i=0;
		$('#add').click(function() {
			count=$('#dynamic_field tr').length;  
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id="file-series-'+i+'" placeholder="Certificaticate Name" class="form-control onchangeupload  name_list" name="file_series[]" required value="" /></td><td></td><td><input name="file_name_series[]" required type="file"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm ph15 btn_remove">Remove</button></td></tr>');
		});

        $('#department').on('change', function() {
            var department = $(this).val();
            if(department == '' || department <=0) {
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

        $('#name').keyup(function () {
            var replaceSpace = $(this).val();

            var result = replaceSpace.trim().replace(/\s/g, "-");

            $("#name").val(result);

        });

        $('#edit_form').on('keyup blur click', function () {
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
                            url: "{{url('admin/franchises/emailEditchecking')}}",
                            type: "post",
                            data: {
                                email: function () {
                                    return $("#email").val();
                                },
                                user_create_type: 'employee',
                                user_id: function () {
                                    return $("#user-id").val();
                                }
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        }
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
                $('#edit_form_btn').attr('disabled', false);
            } else {
                $('#edit_form_btn').attr('disabled', true);
            }
        });
    });

	$(document).on('click', '.btn_remove', function(){  
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
 	});

     $(document).on('click', '.existing_btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row-existing-'+button_id+'').remove();
        $vl = $("#remove-existing").val();
        $("#remove-existing").val($vl+' ' + button_id);
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

    $('#name').keyup(function () {
        var replaceSpace = $(this).val();

        var result = replaceSpace.trim().replace(/\s/g, "-");

        $("#name").val(result);

    });


</script>  	

<script>

$('#example-getting-started-distributor').multiselect({
         
       onChange:function(option, checked)
  {
    //  $('#example-getting-started-branch').html('');
      $('#example-getting-started-subdistributor').html('');
                
  
  // $('#example-getting-started-branch').multiselect('rebuild');
   $('#example-getting-started-subdistributor').multiselect('rebuild');
   var distributor = this.$select.val();
   if(distributor.length > 0)
   {
            var city = $("#city").val();
             var user_id = $("#emp_id").val(); 
          
            
          //alert(distributor);
           
	   
            $.ajax({
                url: "{{url('/admin/franchises/citydistributorsubdistributorextraedit')}}/"+city+"/"+distributor+"/"+user_id,
                type: "GET",
                success:function(data) {
            //    alert(data);
                // $('#example-getting-started-branch').html(data);
                // $('#example-getting-started-branch').multiselect('rebuild');

                $('#example-getting-started-subdistributor').html(data);
                $('#example-getting-started-subdistributor').multiselect('rebuild');
             
                  
               //$('example-getting-started-branch').append(data);
                //$('#example-getting-started-branch').multiselect('rebuild');
             
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
   }
  }
            
    
      });
</script>

<script>

$('#example-getting-started-subdistributor').multiselect({
         
       onChange:function(option, checked)
  {
      $('#example-getting-started-branch').html('');
                
  
   $('#example-getting-started-branch').multiselect('rebuild');
   var subdistributor = this.$select.val();
   if(subdistributor.length > 0)
   {
            var city = $("#city").val();
             var user_id = $("#emp_id").val(); 
          
            
          //alert(distributor);
           
	   
            $.ajax({
                url: "{{url('/admin/franchises/citysubdistributorbranchesextraedit')}}/"+city+"/"+subdistributor+"/"+user_id,
                type: "GET",
                success:function(data) {
            //    alert(data);
                $('#example-getting-started-branch').html(data);
                $('#example-getting-started-branch').multiselect('rebuild');
             
                  
               //$('example-getting-started-branch').append(data);
                //$('#example-getting-started-branch').multiselect('rebuild');
             
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
   }
  }
            
    
      });
</script>
<script>
     $('#example-getting-started-branch').multiselect({
         onChange:function(option, checked)
  {

                 $('#example-getting-started').html('');
   $('#example-getting-started').multiselect('rebuild');
   var branch = this.$select.val();
   if(branch.length > 0)
   {
          //alert(branch);
         
          var city = $("#city").val();
          var user_id = $("#emp_id").val(); 
        
        //alert(city);
    
          
            $.ajax({
                url: "{{url('/admin/customers/branch-franchisesextraedit')}}/"+city+"/"+branch+"/"+user_id,
                type: "GET",
                success:function(data1) {
                console.log(data1);
            
             
                $('#example-getting-started').html(data1);
                $('#example-getting-started').multiselect('rebuild');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    //alert(errorThrown);
                }
            });
    }
    }
             
        
     });
  
  
</script>
  

@stop