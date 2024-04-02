<?php

	$groupwisepermissions = array();
	foreach($permissions as $permission) {
		$category = $permission->category;
		$subcategory = $permission->sub_category;
		if ($permission->is_sub_category == 1) {
			$groupwisepermissions[$category][$permission->display_name][] = $permission;
		}
		else {
			if ($subcategory != "") {
				$groupwisepermissions[$category][$subcategory][] = $permission;
			}
		}
	}

	function createId($text) {
		$text = strtolower($text);
		$text = preg_replace('/\s+/', '-', $text);           // Replace spaces with -
		$text = preg_replace('/[^\w\-]+/', '', $text);       // Remove all non-word chars
		$text = preg_replace('/\-\-+/', '-', $text);      // Replace multiple - with single -
		$text = preg_replace('/^-+/', '', $text);        // Trim - from start of text
		$text = preg_replace('/-+$/', '', $text);
		return $text;
	}
?>
@extends('layouts.admin')
@section('content')
	<style>
		.inner-div {
			padding-left: 25px;
		}
		form fieldset{padding: 0px 10px;}
		form fieldset legend{width:auto;font-size: 14px;font-weight: bold;color:#4CAF50}
		form fieldset label{font-size: small;font-size: 12px;font-weight: 600 !important;}
	</style>
	<!-- Page Heading -->
    <div class="card shadow mb-4">
	@include('users.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h4 class="m-0 font-weight-bold text-primary">Edit Role</h4></div>
	</div>
	
	
	<div class="card-body">		
		@if($errors->any())
	  <div class="alert alert-danger"> @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	  {!! Form::model($roledetails, array('route' => array('roles.update', $roledetails->id),'method'=>'put')) !!}
      @csrf
	    <div class="form-group"> {!! Form::label('name', 'Role Name*') !!}
        {!! Form::text('name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Role Name')) !!} </div>
        <div class="form-group"> 
        	{!! Form::label('permission', 'Permissions') !!}
			<div class="row">
				<div class="col-md-12">

					<?php foreach($groupwisepermissions as $groupname=>$subgrouppermissions){ ?>
					<div class="panel-group">
						<div class="panel panel-default">
						<div class="panel-heading">
							<h6 class="panel-title">
							<a data-toggle="collapse" href="#collapse-{{createId($groupname)}}">{{$groupname}}</a>
							</h6>
						</div>

				    <div id="collapse-{{createId($groupname)}}" class="panel-collapse collapse">
						<div class="panel-body">
						<?php foreach($subgrouppermissions as $subgroupname=>$grouppermissions) { ?>

							<fieldset data-toggle="collapse" data-target="#demo-{{createId($subgroupname)}}">
								<legend>{{$subgroupname}}</legend>
								</fieldset>

								<div id="demo-{{createId($subgroupname)}}" class="collapse in inner-div">
									<?php foreach($grouppermissions as $key => $permission) { ?>
										<div><label class="radio-inline mr10">
						<!--<input  class="checkbx" name="permission[]" type="checkbox" value="{{$permission->name}}" old line -->
										<input  class="checkbx" name="permission[]" type="checkbox" value="{{$permission->name}}" 
										<?php if(in_array($permission->id,$rolepermissions) || in_array($permission->name,$dp)){echo "checked";}
										?>>
										  {{$permission->display_name}} </label>&nbsp;&nbsp;</div>
									<?php } ?>
									</div>
							<?php } ?>
						</div>
					</div>
					<p></p>
					<?php } ?>
			</div>
			</div>
         </div>

		  {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
      </form>
	</div>
  </div>
@stop
