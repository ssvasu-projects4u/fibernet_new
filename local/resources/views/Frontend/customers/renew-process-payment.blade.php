@extends('layouts.customer')
@section('content')
<?php
$first_name = $customerdetails->first_name;
$last_name = $customerdetails->last_name;
$cusid = $customerdetails->id;
$city = $customerdetails->city;
$mobile = $customerdetails->mobile;
$email = $customerdetails->email;
$connection_type = $customerdetails->connection_type;
$address =$customerdetails->installation_address;
$total_amount = $package_amount;


$MERCHANT_KEY = env("MERCHANT_KEY"); //Please change this value with live key for production

$hash_string = '';
// Merchant Salt as provided by Payu


$SALT = env("SALT"); //Please change this value with live salt for production



$PAYU_BASE_URL = env("PAYU_BASE_URL");


$action = '';

$posted = array();
if(!empty($_POST)) {
	//echo "<pre>"; print_r($_POST); exit;
	foreach($_POST as $key => $value) {
		if($key == "amount"){
			if($connection_type == 'broadband'){
				$sub_package = $_POST['sub_package'];
				$subpackage = \App\BroadbandSubPackages::find($sub_package);

				$price = 0;
				if($subpackage->total > 0){
					$price = $subpackage->total;
				}
				$posted[$key] = $price;
				$total_amount = $price;
			}

			if($connection_type == 'combo'){
				$sub_package = $_POST['combo_sub_package'];
				$subpackage = \App\ComboSubPackages::find($sub_package);

				$price = 0;
				if($subpackage->total > 0){
					$price = $subpackage->total;
				}
				$posted[$key] = $price;
				$total_amount = $price;
			}

			if($connection_type == 'iptv'){
				$packages = array();
				if(isset($_POST['iptvbase']) && count($_POST['iptvbase'])>0){
					$packages = array_merge($packages, $_POST['iptvbase']);
				}

				if(isset($_POST['iptvpackage']) && count($_POST['iptvpackage'])>0){
					$packages = array_merge($packages, $_POST['iptvpackage']);
				}

				if(isset($_POST['iptvlocal']) && count($_POST['iptvlocal'])>0){
					$packages = array_merge($packages, $_POST['iptvlocal']);
				}

				if(isset($_POST['iptvallacart']) && count($_POST['iptvallacart'])>0){
					$packages = array_merge($packages, $_POST['iptvallacart']);
				}

				//echo "<pre>"; print_r($packages); exit;

				$iptvprice = \App\IptvPackages::whereIn('id',$packages)->sum('total_amount');
				//echo "<pre>";print_r($subpackage); exit;

				$price = 0;
				if($iptvprice > 0){
					$price = $iptvprice;
				}
				$posted[$key] = $price;
				$total_amount = $price;
			}


			if($connection_type == 'cable'){
				$packages = array();
				if(isset($_POST['cablebase']) && count($_POST['cablebase'])>0){
					$packages = array_merge($packages, $_POST['cablebase']);
				}

				if(isset($_POST['cablepackage']) && count($_POST['cablepackage'])>0){
					$packages = array_merge($packages, $_POST['cablepackage']);
				}

				if(isset($_POST['cablelocal']) && count($_POST['cablelocal'])>0){
					$packages = array_merge($packages, $_POST['cablelocal']);
				}

				if(isset($_POST['cableallacart']) && count($_POST['cableallacart'])>0){
					$packages = array_merge($packages, $_POST['cableallacart']);
				}

				//echo "<pre>"; print_r($packages); exit;

				$cableprice = \App\CablePackages::whereIn('id',$packages)->sum('total_amount');
				//echo "<pre>";print_r($cableprice); exit;

				$price = 0;
				if($cableprice > 0){
					$price = $cableprice;
				}
				$posted[$key] = $price;
				$total_amount = $price;
			}



		} else{
			$posted[$key] = $value;
		}
	}
	//echo $total_amount; exit;
}

//echo "<pre>"; print_r($posted); die;

$formError = 0;

if(empty($posted['txnid'])) {
   // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
    empty($posted['key'])
    || empty($posted['txnid'])
    || empty($posted['amount'])
    || empty($posted['firstname'])
    || empty($posted['email'])
    || empty($posted['phone'])
    || empty($posted['productinfo'])

  ) {
    $formError = 1;
  } else {

    $hashVarsSeq = explode('|', $hashSequence);

    foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<script>
  var hash = '<?php echo $hash; ?>';
  function submitPayuForm() {
    if(hash == '') {
      return;
    }

	var payuForm = document.forms.payuForm;
    payuForm.submit();
  }
</script>

    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Online Pay Bill</h3></div>
	</div>


	<div class="card-body">
	  @if (session('success_message'))
	<div class="container">
		<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('success_message') !!}</p>
		</div>
	</div>
	@endif

	@if (session('error_message'))
	<div class="container">
		<div class="alert alert-warning alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <p>{!! session('error_message') !!}</p>
		</div>
	</div>
	@endif


	    <form action="<?php echo $action; ?>" method="post" name="payuForm">
		   @csrf

		<?php //echo "<pre>"; print_r($customerdetails); echo "</pre>";  ?>



		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
		<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		<input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
		<input type="hidden" name="surl" value="{{ url('customer/renew-response')}}" />
		<input type="hidden" name="furl" value="{{ url('customer/renew-response')}}" />
		<input type="hidden" name="firstname" id="firstname" value="<?php echo $first_name; ?>" />
		<input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
		<input type="hidden" name="amount" id="amount" value="<?php echo $total_amount; ?>" />
		<input type="hidden" name="phone" value="<?php echo $mobile; ?>" />
		<input type="hidden" name="productinfo" value="<?php echo $connection_type."__".$customerdetails->id; ?>" />

	    <?php if(isset($posted) && count($posted)>0){ ?>
		<div class="d-flex justify-content-center">
			<div class="spinner-border" style="width: 5rem; height: 5rem;" role="status">
			  <span class="sr-only">Loading...</span>
			</div>
			<div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status">
			  <span class="sr-only">Loading...</span>
			</div>
		</div>
	    <?php }else{ ?>
	   <div class="row">
	   <div class="col-md-10">
	   <table class="table table-bordered">
			<tr>
				<th width="25%">Connection Type</th><td>{{ strtoupper($connection_type)}}</td>
			</tr>
			<?php if($connection_type == 'broadband'){ ?>
			<tr id="sel_broadband_package" style="display:none;">
				<th>Package Details</th>
				<td class="form-group">
					<div class="row">
					<div class="col-md-6">
					{!! Form::label('package', 'Package') !!}
					{!! Form::select('package', $packages, $customerdetails->package,array('id' => 'package','class' => 'form-control mb-3','placeholder'=>'-- Select Broadband Package --', 'disabled' => true) ) !!}
					</div>
					<div class="col-md-6">
					{!! Form::label('package', 'Sub Package') !!}
					{!! Form::select('sub_package', $subpackages, $customerdetails->sub_package,array('id' => 'sub_package','class' => 'form-control','placeholder'=>'-- Select Broadband Sub Package --') ) !!}
					</div>
					</div>
					<a class="btn btn-link" href="{{url('customer/pay-online')}}"><small>< Back to Pay</small></a>
				</td>
			</tr>
			<tr id="label_broadband_package">
				<th>Package Details</th>
				<td class="form-group">
					<?php
					foreach($packages as $package_id=>$package_name){
						if($package_id == $customerdetails->package){echo $package_name." - ";break;}
					}

					foreach($subpackages as $subpackage_id=>$subpackage_name){
						if($subpackage_id == $customerdetails->sub_package){echo $subpackage_name;break;}
					}
					?>&nbsp;&nbsp;&nbsp;&nbsp; |
					<span class="btn btn-link" id="change_package"><small>Change Package</small></span>
				</td>
			</tr>
			<?php }else if($connection_type == 'combo'){ ?>
			<tr id="sel_combo_package" style="display:none;">
				<th>Package Details</th>
				<td class="form-group">
					<div class="row">
					<div class="col-md-6">
					{!! Form::label('combo_package', 'Package') !!}
					{!! Form::select('combo_package', $packages, $customerdetails->combo_package,array('id' => 'combo_package','class' => 'form-control mb-3','placeholder'=>'-- Select Combo Package --') ) !!}
					</div>
					<div class="col-md-6">
					{!! Form::label('combo_sub_package', 'Sub Package') !!}
					{!! Form::select('combo_sub_package', $subpackages, $customerdetails->combo_sub_package,array('id' => 'combo_sub_package','class' => 'form-control','placeholder'=>'-- Select Combo Sub Package --') ) !!}
					</div>
					</div>
					<a class="btn btn-link" href="{{url('customer/pay-online')}}"><small>< Back to Pay</small></a>
				</td>
			</tr>
			<tr id="label_combo_package">
				<th>Package Details</th>
				<td class="form-group">
					<?php
					foreach($packages as $package_id=>$package_name){
						if($package_id == $customerdetails->combo_package){echo $package_name." - ";break;}
					}

					foreach($subpackages as $subpackage_id=>$subpackage_name){
						if($subpackage_id == $customerdetails->combo_sub_package){echo $subpackage_name;break;}
					}
					?>&nbsp;&nbsp;&nbsp;&nbsp; |
					<span class="btn btn-link" id="change_combo_package"><small>Change Package</small></span>
				</td>
			</tr>

			<?php }else if($connection_type == 'iptv'){ ?>
			<tr>
				<th>Package Details</th>
				<td>
					<?php
						$listiptvpackages = array();
						$listiptvallacart = array();
						$listiptvbase = array();
						$listiptvlocal = array();

						if(!empty($customerdetails->iptv_packages)){
							$listiptvpackages = explode(",",$customerdetails->iptv_packages);
						}

						if(!empty($customerdetails->iptv_allacart)){
							$listiptvallacart = explode(",",$customerdetails->iptv_allacart);
						}

						if(!empty($customerdetails->iptv_base)){
							$listiptvbase = explode(",",$customerdetails->iptv_base);
						}

						if(!empty($customerdetails->iptv_local)){
							$listiptvlocal = explode(",",$customerdetails->iptv_local);
						}

						$selectediptvdata = array_merge($listiptvpackages,$listiptvallacart,$listiptvbase,$listiptvlocal);
					?>

					<button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#myModal">
					 View or Change Plan
					</button>

					<div class="container">
					<div class="modal" id="myModal">
					  <div class="modal-dialog">
						<div class="modal-content">

						  <!-- Modal Header -->
						  <div class="modal-header">
							<h4 class="modal-title">IPTV</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						  </div>

						  <!-- Modal body -->
						  <div class="modal-body">

					<div class="row">
					<div class="iptv_container col-md-8">

						<ul class="nav nav-tabs" style="font-size: 12px;">
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#iptvpackages"> Packages </a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvlocal">Local</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvbase">Base</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#iptvallacart">Allacart</a></li>
						</ul><br>

						<div class="tab-content" style="font-size: 12px;">

							<div class="tab-pane container active pl-1 pr-1" id="iptvpackages" >
								<div class="vertical-menu" id="select1">
									@if(isset($iptvdatabytype['packages']) && count($iptvdatabytype['packages'])>0)
										@foreach($iptvdatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listiptvpackages)){continue;} ?>
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_package" value="{{$package['id']}}" name="iptvpackage[]" data-price="{{$package['total_amount']}}">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>

							<div class="tab-pane container pl-1 pr-1" id="iptvlocal">
								<div class="vertical-menu" id="select1">
									@if(isset($iptvdatabytype['local']) && count($iptvdatabytype['local'])>0)
										@foreach($iptvdatabytype['local'] as $package)
									<?php if(in_array($package['id'],$listiptvlocal)){continue;} ?>
											<div class="lab_local">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_local" value="{{$package['id']}}" name="iptvlocal[]" data-price="{{$package['total_amount']}}">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>

							<div class="tab-pane container pl-1 pr-1" id="iptvbase">
								<div class="vertical-menu" id="select1">
									@if(isset($iptvdatabytype['base']) && count($iptvdatabytype['base'])>0)
										@foreach($iptvdatabytype['base'] as $package)
										<?php if(in_array($package['id'],$listiptvbase)){continue;} ?>
											<div class="lab_base">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_base" value="{{$package['id']}}" name="iptvbase[]" data-price="{{$package['total_amount']}}">&nbsp;{{$package['name']}}</label>
											</div>
										@endforeach
									@endif
								</div>
							</div>


						<div class="tab-pane container fade pl-1 pr-1" id="iptvallacart">
							<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
								@if(isset($iptvdatabytype['allacart']) && count($iptvdatabytype['allacart'])>0)
									@foreach($iptvdatabytype['allacart'] as $package)
									<?php if(in_array($package['id'],$listiptvallacart)){continue;} ?>
										<div class="lab_allacart">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_allacart" value="{{$package['id']}}" name="iptvallacart[]" data-price="{{$package['total_amount']}}">&nbsp;{{$package['name']}} </label>
										</div>
									@endforeach
								@endif
							</div>
						</div>


						</div>
					</div>

					<div class="col-md-4 border iptv_container">
						<label>Selected</label>
						<hr class="py-0 my-0 mb-2">

						<input type="hidden" name="iptvcounter" id="iptvcounter" value="0" >
						<div class="vertical-menu" id="selected_iptv_packages" style="font-size: 12px;min-height:250px; max-height: 250px; overflow-y: auto;">

							@if(isset($iptvdatabytype['packages']) && count($iptvdatabytype['packages'])>0)
								@foreach($iptvdatabytype['packages'] as $package)
									<?php if(in_array($package['id'],$listiptvpackages)){ ?>
									<div class="lab_package">
										<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_package" value="{{$package['id']}}" name="iptvpackage[]"  data-price="{{$package['total_amount']}}" checked>&nbsp;{{$package['name']}}</label>
									</div>
								<?php } ?>
								@endforeach
							@endif

							@if(isset($iptvdatabytype['base']) && count($iptvdatabytype['base'])>0)
								@foreach($iptvdatabytype['base'] as $package)
									<?php if(in_array($package['id'],$listiptvbase)){ ?>
									<div class="lab_package">
										<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_base" value="{{$package['id']}}" name="iptvbase[]" data-price="{{$package['total_amount']}}" checked>&nbsp;{{$package['name']}}</label>
									</div>
								<?php } ?>
								@endforeach
							@endif

							@if(isset($iptvdatabytype['local']) && count($iptvdatabytype['local'])>0)
								@foreach($iptvdatabytype['local'] as $package)
									<?php if(in_array($package['id'],$listiptvlocal)){ ?>
									<div class="lab_package">
										<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_local" value="{{$package['id']}}" name="iptvlocal[]" data-price="{{$package['total_amount']}}" checked>&nbsp;{{$package['name']}}</label>
									</div>
								<?php } ?>
								@endforeach
							@endif

							@if(isset($iptvdatabytype['allacart']) && count($iptvdatabytype['allacart'])>0)
								@foreach($iptvdatabytype['allacart'] as $package)
									<?php if(in_array($package['id'],$listiptvallacart)){ ?>
									<div class="lab_package">
										<label class="radio-inline mr10"> <input type="checkbox" class="input_iptv_allacart" value="{{$package['id']}}" name="iptvallacart[]" data-price="{{$package['total_amount']}}" checked>&nbsp;{{$package['name']}}</label>
									</div>
								<?php } ?>
								@endforeach
							@endif


						</div>

					</div>
					</div>
						  </div>

						  <!-- Modal footer -->
						  <div class="modal-footer">
							<p><b>Price</b> : Rs.<span id="updated_plan_amount">{{$package_amount}}</span></p>
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
						  </div>

						</div>
					  </div>
					</div>
					</div>
			</td>
			</tr>
			<?php }else if($connection_type == 'cable'){ ?>
			<tr>
				<th>Package Details</th>
				<td>
					<?php
						$listcablepackages = array();
							$listcableallacart = array();
							$listcablebase = array();
							$listcablelocal = array();

							if(!empty($customerdetails->cable_packages)){
								$listcablepackages = explode(",",$customerdetails->cable_packages);
							}

							if(!empty($customerdetails->cable_allacart)){
								$listcableallacart = explode(",",$customerdetails->cable_allacart);
							}

							if(!empty($customerdetails->cable_base)){
								$listcablebase = explode(",",$customerdetails->cable_base);
							}

							if(!empty($customerdetails->cable_local)){
								$listcablelocal = explode(",",$customerdetails->cable_local);
							}

							$selectedcabledata = array_merge($listcablepackages,$listcableallacart,$listcablebase,$listcablelocal);
					?>

					<button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#myModal">
					 View or Change Plan
					</button>

					<div class="container">
					<div class="modal" id="myModal">
					  <div class="modal-dialog modal-lg">
						<div class="modal-content">

						  <!-- Modal Header -->
						  <div class="modal-header">
							<h4 class="modal-title">Cable</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						  </div>

						  <!-- Modal body -->
						  <div class="modal-body">
								<div class="row">
						<div class="cable_container col-md-8">

							<ul class="nav nav-tabs" style="font-size: 12px;">
								<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cablepackages"> Packages </a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablelocal">Local</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cablebase">Base</a></li>
								<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cableallacart">Allacart</a></li>
							</ul><br>

							<div class="tab-content" style="font-size: 12px;">

							<div class="tab-pane container active pl-1 pr-1" id="cablepackages" >
								<div class="vertical-menu" id="select1">
									@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
										@foreach($cabledatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listcablepackages)){continue;} ?>
											<div class="lab_package">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package" value="{{$package['id']}}" name="cablepackage[]" data-price="{{$package['total_amount']}}" >&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
											</div>
										@endforeach
									@endif
								</div>
							</div>

							<div class="tab-pane container pl-1 pr-1" id="cablelocal">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
											@foreach($cabledatabytype['local'] as $package)
										<?php if(in_array($package['id'],$listcablelocal)){continue;} ?>
												<div class="lab_local">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="cablelocal[]" data-price="{{$package['total_amount']}}" >&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
												</div>
											@endforeach
										@endif
									</div>
								</div>

								<div class="tab-pane container pl-1 pr-1" id="cablebase">
									<div class="vertical-menu" id="select1">
										@if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
											@foreach($cabledatabytype['base'] as $package)
											<?php if(in_array($package['id'],$listcablebase)){continue;} ?>
												<div class="lab_base">
													<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="cablebase[]" data-price="{{$package['total_amount']}}" >&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
												</div>
											@endforeach
										@endif
									</div>
								</div>


							<div class="tab-pane container fade pl-1 pr-1" id="cableallacart">
								<div class="vertical-menu" id="select3" style="height: 250px;overflow-y: scroll;">
									@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
										@foreach($cabledatabytype['allacart'] as $package)
										<?php if(in_array($package['id'],$listcableallacart)){continue;} ?>
											<div class="lab_allacart">
												<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_allacart" value="{{$package['id']}}" name="cableallacart[]" data-price="{{$package['total_amount']}}" >&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
											</div>
										@endforeach
									@endif
								</div>
							</div>
						</div>
						</div>

						<div class="col-md-4 border cable_container">
							<label>Selected</label>
							<hr class="py-0 my-0 mb-2">

							<input type="hidden" name="counter" id="counter" value="0" >
							<div class="vertical-menu" id="selected_channel_packages" style="font-size: 12px;min-height: 250px;max-height: 250px; overflow-y: auto;">
								@if(isset($cabledatabytype['packages']) && count($cabledatabytype['packages'])>0)
									@foreach($cabledatabytype['packages'] as $package)
										<?php if(in_array($package['id'],$listcablepackages)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_package" value="{{$package['id']}}" name="cablepackage[]" data-price="{{$package['total_amount']}}"  checked>&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
										</div>
									<?php } ?>
									@endforeach
								@endif

								@if(isset($cabledatabytype['base']) && count($cabledatabytype['base'])>0)
									@foreach($cabledatabytype['base'] as $package)
										<?php if(in_array($package['id'],$listcablebase)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_base" value="{{$package['id']}}" name="cablebase[]" data-price="{{$package['total_amount']}}"  checked>&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
										</div>
									<?php } ?>
									@endforeach
								@endif

								@if(isset($cabledatabytype['local']) && count($cabledatabytype['local'])>0)
									@foreach($cabledatabytype['local'] as $package)
										<?php if(in_array($package['id'],$listcablelocal)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_local" value="{{$package['id']}}" name="cablelocal[]" data-price="{{$package['total_amount']}}"  checked>&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
										</div>
									<?php } ?>
									@endforeach
								@endif

								@if(isset($cabledatabytype['allacart']) && count($cabledatabytype['allacart'])>0)
									@foreach($cabledatabytype['allacart'] as $package)
										<?php if(in_array($package['id'],$listcableallacart)){ ?>
										<div class="lab_package">
											<label class="radio-inline mr10"> <input type="checkbox" class="input_cable_allacart" value="{{$package['id']}}" name="cableallacart[]" data-price="{{$package['total_amount']}}"  checked>&nbsp;{{$package['name']}} <span class="badge badge-success">Rs.{{$package['total_amount']}}</span></label>
										</div>
									<?php } ?>
									@endforeach
								@endif


							</div>

						</div>
						</div>

						  </div>

						  <!-- Modal footer -->
						  <div class="modal-footer">
							<p><b>Price</b> : Rs.<span id="updated_plan_amount">{{$package_amount}}</span></p>
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
						  </div>

						</div>
					  </div>
					</div>
					</div>
			</td>
			</tr>
			<?php } ?>

			<tr>
				<th>Total Amount</th><td id="package_amount">Rs.<span id="total_plan_amount">{{$package_amount}}</span></td>
			</tr>
			<tr>
				<th style="border-bottom:none">&nbsp;</th><th style="border-bottom:none"> {!! Form::submit('Proceed to Payment &gt;', ['class' => 'btn btn-success']) !!}</td>
			</tr>

		</table>
</div>
<div class="col-md-4">&nbsp;</div>
		</div>
	   <?php } ?>




		 </form>
	</div>
  </div>
  <script>
  submitPayuForm();
  function caliculateIPTVTotal(){
		var total_price = 0;
		$("#selected_iptv_packages input[type='checkbox']").each(function(){
			total_price = total_price + parseFloat($(this).attr('data-price'));
			//alert($(this).attr('data-price'));
		});

		total_price = Math.round(total_price * 100) / 100;

		$("#updated_plan_amount").text(total_price);
	}

	function caliculateCableTotal(){
		var total_price = 0;
		$("#selected_channel_packages input[type='checkbox']").each(function(){
			total_price = total_price + parseFloat($(this).attr('data-price'));
			//alert($(this).attr('data-price'));
		});

		total_price = Math.round(total_price * 100) / 100;

		$("#updated_plan_amount").text(total_price);
	}

  $(document).ready(function() {

	$('#change_package').on('click', function() {
		$("#label_broadband_package").hide();
		$("#sel_broadband_package").show();
	});

	$('#change_combo_package').on('click', function() {
		$("#label_combo_package").hide();
		$("#sel_combo_package").show();
	});




	$('#package').on('change', function() {
		var package = $(this).val();
		if(package == '' || package <=0){
			$('#sub_package').html("<option value=''>-- Select Sub Package --</option>");
			return;
		}
		$.ajax({
			url: "{{url('/customer/package-subpackages')}}/"+package,
			type: "GET",
			success:function(data) {
			   $('#sub_package').html(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$('#sub_package').on('change', function() {
		var sub_package = $(this).val();
		if(sub_package == '' || sub_package <= 0){
			return;
		}
		$.ajax({
			url: "{{url('/customer/sub-package')}}/"+sub_package,
			type: "GET",
			success:function(data) {
			   $('#package_amount').text('Rs.'+data);
			   $('#amount').val(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});

	$('#combo_package').on('change', function() {
		var package = $(this).val();
		if(package == '' || package <=0){
			$('#sub_package').html("<option value=''>-- Select Combo Sub Package --</option>");
			return;
		}
		$.ajax({
			url: "{{url('/customer/package-combo-subpackages')}}/"+package,
			type: "GET",
			success:function(data) {
			   $('#combo_sub_package').html(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});


	$('#combo_sub_package').on('change', function() {
		var sub_package = $(this).val();
		if(sub_package == '' || sub_package <= 0){
			return;
		}
		$.ajax({
			url: "{{url('/customer/combo-sub-package')}}/"+sub_package,
			type: "GET",
			success:function(data) {
			   $('#package_amount').text(data);
			   $('#amount').val(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				alert(errorThrown);
			}
		});
	});





		$("#myModal").on("hidden.bs.modal", function () {
			total_price = $('#updated_plan_amount').text();
			$('#total_plan_amount').text(total_price);
		});


		$('body').on('change','#cablepackages .input_cable_package',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateCableTotal();
	        }
	    });

        $('body').on('change','#cableallacart .input_cable_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateCableTotal();
	        }
	    });

		$('body').on('change','#cablelocal .input_cable_local',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateCableTotal();
	        }
	    });

		$('body').on('change','#cablebase .input_cable_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_channel_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateCableTotal();
	        }
	    });


	    $('body').on('change','#selected_channel_packages .input_cable_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#cableallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateCableTotal();

	    });

	    $('body').on('change','#selected_channel_packages .input_cable_package',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablepackages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
			caliculateCableTotal();

	    });

		 $('body').on('change','#selected_channel_packages .input_cable_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablelocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
			caliculateCableTotal();

	    });

		$('body').on('change','#selected_channel_packages .input_cable_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#cablebase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
			caliculateCableTotal();

	    });




		$('body').on('change','#iptvpackages .input_iptv_package',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateIPTVTotal();
	        }
	    });

        $('body').on('change','#iptvallacart .input_iptv_allacart',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateIPTVTotal();
	        }
	    });


		$('body').on('change','#iptvlocal .input_iptv_local',function() {
		    if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_local'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateIPTVTotal();
	        }
	    });

        $('body').on('change','#iptvbase .input_iptv_base',function() {
	        if($(this).is(":checked")) {
	            $(this).attr("checked", true);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#selected_iptv_packages").append("<div class='lab_base'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateIPTVTotal();
	        }
	    });





	    $('body').on('change','#selected_iptv_packages .input_iptv_allacart',function() {
	            $(this).attr("checked", false);
	            var checkboxhtml = $(this).parent().parent().html();
	            $("#iptvallacart .vertical-menu").append("<div class='lab_allacart'>"+checkboxhtml+"</div>");
	            $(this).parent().parent().remove();
				caliculateIPTVTotal();
	    });

	    $('body').on('change','#selected_iptv_packages .input_iptv_package',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvpackages").append("<div class='lab_package'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
			caliculateIPTVTotal();
	    });


		$('body').on('change','#selected_iptv_packages .input_iptv_base',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvbase").append("<div class='lab_base'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
			caliculateIPTVTotal();
	    });

		$('body').on('change','#selected_iptv_packages .input_iptv_local',function() {
	        $(this).attr("checked", false);
            var checkboxhtml = $(this).parent().parent().html();
            $("#iptvlocal").append("<div class='lab_local'>"+checkboxhtml+"</div>");
            $(this).parent().parent().remove();
			caliculateIPTVTotal();
	    });



    });
</script>


@stop
