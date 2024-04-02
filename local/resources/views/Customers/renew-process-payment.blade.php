<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];exit;
    $layout='layouts.admin';
    if($roles[0]=='branch' || $roles[0]=='franchise'){
        //echo $roles[0];exit;
        $layout='layouts.'.$roles[0];    
    }
 ?> 
@extends($layout)
@section('content')
<?php
	$first_name = $customerdetails->first_name;
	$last_name = $customerdetails->last_name;
	$cusid = $customerdetails->id;
	$city = $customerdetails->city;
	$mobile = $customerdetails->mobile;
	$email = $customerdetails->email;
	$connection_type = $customerdetails->connection_type;
	$stb_num = $customerdetails->stb_num;
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
		foreach($_POST as $key => $value) {
			if($key == "amount"){
				$posted[$key] = $total_amount;
			} else{
				$posted[$key] = $value;
			}
		}
	}

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
	   @include('customers.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Renew Payment</h3></div>

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


	    <form action="<?php echo $action; ?>" method="post" name="payuForm">
		   @csrf

		<?php //echo "<pre>"; print_r($customerdetails); echo "</pre>";  ?>

		<div class="row">
		<div class="col-md-6">

		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
		<input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
		<input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
		<input type="hidden" name="surl" value="{{ url('admin/customers/renew-response')}}" />
		<input type="hidden" name="furl" value="{{ url('admin/customers/renew-response')}}" />
		<input type="hidden" name="firstname" id="firstname" value="<?php echo $first_name; ?>" />
		<input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
		<input type="hidden" name="amount" value="<?php echo $total_amount; ?>" />
		<input type="hidden" name="phone" value="<?php echo $mobile ; ?>" />
		<input type="hidden" name="productinfo" value="<?php echo $connection_type."__".$customerdetails->id; ?>" />

	   <table class="table" id="<?php echo $random_value; ?>">
			<tr>
				<th>Package Amount</th><td>{{$package_amount}}</td>
			</tr>

			<tr class="bg bg-primary text-white">
				<th><b>Total Amount<b></th><td>{{$total_amount}}</td>
			</tr>
			<tr>
				<th style="border-bottom:none">&nbsp;</th><th style="border-bottom:none"> {!! Form::submit('Proceed to Payment &gt;', ['class' => 'btn btn-success']) !!}</td>
			</tr>

		</table>
</div>
		</div>
		 </form>
	</div>
  </div>
  <script>
	  $(document).ready(function() {
		  submitPayuForm();
	  });
  </script>
@stop
