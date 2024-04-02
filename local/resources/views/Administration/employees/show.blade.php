@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   @include('administration.topmenu')
	<div class="card-header py-3">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Employee</h4></div>	  
	</div>
	
	<div class="card-body">		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif

        <h5 class="bg-primary text-white px-2 pt-1 pb-1">Basic Information</h5>
                        <div class="row">
                        <div class="col">
                        <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                            <tbody>

                                            <tr>
                                                <td><span>City</span></td>
                                                <td>{{ $userdetails->city }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>First name</span></td>
                                                <td>{{ $userdetails->first_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Father Name</span></td>
                                                <td>{{ $userdetails->f_name_c_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Mobile number</span></td>
                                                <td>{{ $userdetails->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Employee Photo</span></td>
                                                <?php
                                                    $path = asset('public/uploads/default-image.png');

                                                    $src = asset('public/uploads/employees/'.$userdetails->employee_photo);
                                                    if($userdetails->employee_photo !=''){
                                                        $path = $src;
                                                    }
                                                ?>
                                                <td align="center"><img src="{{asset($path)}}" width="100"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                            <tbody>
                                            <tr>
                                                <td><span>Name</span></td>
                                                <td>{{ $userdetails->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Last name</span></td>
                                                <td>{{ $userdetails->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Email</span></td>
                                                <td>{!! str_replace("e-", "", $userdetails->email) !!}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Alternate mobile number</span></td>
                                                <td>{{$userdetails->alt_mobile_num}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
            </div>
        </div>
        <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Address</h5>

          <div class="row">

        <div class="form-group col-md-3">{{ $userdetails->address }}</div>

                    </div>

                    <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Employement Details</h5>
        <div class="row">
                        <div class="col">
                        <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                            <tbody>

                                            <tr>
                                                <td><span>Joining Date</span></td>
                                                <td>{{ $userdetails->joining_date }}</td>
                                            </tr>
                                            <tr>
                                                <td><span>Department</span></td>
                                                <td>{{ $userdetails->department }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col">
                                        <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                            <tbody>
                                            <tr>
                                                <td><span>Status</span></td>
                                                <td>
                                                    @if($userdetails->status == 'Y')
                                                    <span class="badge badge-success">Active</span>
                                                    @elseif($userdetails->status == 'N')
                                                    <span class="badge badge-warning">Inactive</span>
                                                    @elseif($userdetails->status == 'D')
                                                    <span class="badge badge-secondary">Deleted</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Designation</span></td>
                                                <td>{{ $userdetails->designation }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
            </div>
        </div>
        <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Documents</h5>
        <div class="row">
        <div class="form-group col-md-12">
            <table class="table" width="100%" style="border: 1px solid #ccc">
                <thead>
                    <tr class="bg-dark text-white">
                        <th style="width:50%">Document Name</th>
                        <th style="width:50%">File View</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($userdetails->resume != "") { 
                        $src = asset('public/uploads/employees/'.$userdetails->resume);
                    ?>
                        <tr>
                            <td class="bold-td">Resume</td>
                            <td class="bold-td-link">
                                  <a href="{{ $src }}" target="_blank" >View</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php 
                            if ($userdetails->aadhar_card != "") { 
                                $src = asset('public/uploads/employees/'.$userdetails->aadhar_card);
                        ?>
                        <tr> 
                            <td class="bold-td">Aadhar Card</td>
                            <td class="bold-td-link">
                                  <a href="{{ $src }}" target="_blank" >View</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php
                            if ($userdetails->id_proof != "") { 
                                  $src = asset('public/uploads/employees/'.$userdetails->id_proof);
                            ?>
                        <tr>
                            <td class="bold-td">ID Proof</td>
                            <td class="bold-td-link">
                                  <a href="{{ $src }}" target="_blank" >View</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php 
                            if ($userdetails->pan_card != "") { 
                                $src = asset('public/uploads/employees/'.$userdetails->pan_card);                            
                        ?>
                        <tr>
                            <td class="bold-td">PAN Card</td>
                            <td class="bold-td-link">
                                  <a href="{{ $src }}" target="_blank" >View</a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php 
                            if ($userdetails->experience_letter != "") {
                                $src = asset('public/uploads/employees/'.$userdetails->experience_letter);
                            ?>
                            <tr>
                                <td class="bold-td">Experience Letter</td>
                                <td class="bold-td-link">
                                  <a href="{{ $src }}" target="_blank" >View</a>
                                </td>
                        </tr>
                        <?php } ?>
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
                        <th style="width:50%">Document Name</th>
                        <th style="width:50%">File View</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($userdetails->sslc != "") {
                        $src = asset('public/uploads/employees/'.$userdetails->sslc);                    
                    ?>
                    <tr>
                        <td class="bold-td">SSLC</td>
                        <td class="bold-td-link">
                            <a href="{{ $src }}" target="_blank" >View</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php 
                       if ($userdetails->puc_diploma != "") {
                        $src = asset('public/uploads/employees/'.$userdetails->puc_diploma);
                        ?>
                    <tr>
                        <td class="bold-td">PUC/Diploma/+2</td>
                        <td class="bold-td-link">
                            <a href="{{ $src }}" target="_blank" >View</a>
                        </td>
                    </tr>
                    <?php } ?>

                    <?php
                    if ($userdetails->under_graduate != "") {
                        $src = asset('public/uploads/employees/'.$userdetails->under_graduate);
                    ?>
                    <tr>
                        <td class="bold-td">Under Graduate</td>
                        <td class="bold-td-link">
                            <a href="{{ $src }}" target="_blank" >View</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php
                    if ($userdetails->post_graduate != "") {
                        $src = asset('public/uploads/employees/'.$userdetails->post_graduate);                        
                        ?>
                    <tr>
                        <td class="bold-td">Post Graduate</td>
                        <td class="bold-td-link">
                                  <a href="{{ $src }}" target="_blank" >View</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php
                        if (!empty($certificates)) {
                        foreach($certificates as $file) {
                            ?>
                            <tr>
                                <td class="bold-td">{{ $file->certification_name }}</td>
                                <td class="bold-td-link">
                                    <?php $src = asset('public/uploads/employees/' . $file->filename); ?>
                                    <a href="{{ $src }}" target="_blank" >View</a>
                                </td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
            </div>
        </div>
        <?php if ($userdetails->status == 'N' || $userdetails->status == 'D' ) { ?>
        <hr class="pt-0 pb-0 mb-1 mt-0">
		<h5 class="bg-primary text-white px-2 pt-1 pb-1">Resignation Details</h5>
        <div class="row">
        <div class="form-group col-md-12">
            <table class="table" width="100%" style="border: 1px solid #ccc">
                <thead>
                    <tr class="bg-dark text-white">
                        <th style="width:50%">Detail</th>
                        <th style="width:50%"></th>
                    </tr>
                </thead>            
                <tbody>
                        <tr>
                            <td class="bold-td">Resignation Date</td>
                            <td class="bold-td">
                                {{ $userdetails->resignation_date }}
                            </td>
                        </tr>
                        <tr> 
                            <td class="bold-td">Note</td>
                            <td class="bold-td">
                                {{ $userdetails->note }}
                            </td>
                        </tr>
                        <?php
                            if ($userdetails->resignation_letter != "") { 
                                  $src = asset('public/uploads/employees/'.$userdetails->resignation_letter);                            
                            ?>
                        <tr>
                            <td class="bold-td">Resignation Letter</td>
                            <td class="bold-td-link">
                                <a href="{{ $src }}" target="_blank" >View</a>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div> 
        </div>
        <?php } ?>
  </div>
<link href="{{asset('assets/css/technical.css')}}" rel="stylesheet">
@stop