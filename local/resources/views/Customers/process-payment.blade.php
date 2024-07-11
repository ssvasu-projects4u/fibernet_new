<?php 
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];exit;
    $layout='layouts.admin';
    $pay_later_url='admin/customers/new';
    if($roles[0]=='branch' || $roles[0]=='franchise') {
        //echo $roles[0];exit;
        $layout='layouts.'.$roles[0];  
        $pay_later_url=$roles[0].'/customers/new';
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
if($customerdetails->connection_type == 5){
	$total_amount = $package_amount + $customerdetails->installation_amount + $customerdetails->setup_box_amount - $customerdetails->discount_amount;
}else if( $customerdetails->connection_type == 3){
    
	$total_amount = $package_amount +  $customerdetails->installation_amount + $customerdetails->secure_deposite_amount - $customerdetails->discount_amount;
//echo $package_amount+$customerdetails->androidbox_security_deposit+$customerdetails->installation_amount+$customerdetails->setup_box_amount;
//echo $customerdetails->androidbox_security_deposit; $customerdetails->secure_deposite_amount
}else if( $customerdetails->connection_type == 7 || $customerdetails->connection_type == 6){
	$total_amount = $package_amount + $customerdetails->androidbox_security_deposit + $customerdetails->installation_amount + $customerdetails->secure_deposite_amount - $customerdetails->discount_amount;
//echo $package_amount+$customerdetails->androidbox_security_deposit+$customerdetails->installation_amount+;
//echo $customerdetails->androidbox_security_de
}



$MERCHANT_KEY = env("MERCHANT_KEY"); //Please change this value with live key for production

$hash_string = '';
// Merchant Salt as provided by Payu


$SALT = env("SALT"); //Please change this value with live salt for production





$PAYU_BASE_URL = env("PAYU_BASE_URL");



$action = '';

$posted = array();

if(!empty($_POST)) {

    //print_r($_POST); die;

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
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Process Payment</h3></div>

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
		<input type="hidden" name="surl" value="{{ url('admin/customers/payment-response')}}" />
		<input type="hidden" name="furl" value="{{ url('admin/customers/payment-response')}}" />
		<input type="hidden" name="firstname" id="firstname" value="<?php echo $first_name; ?>" />
		<input type="hidden" name="lastname" id="lastname" value="<?php echo $last_name; ?>" />
		<input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
		<input type="hidden" name="amount" value="<?php echo isset($total_amount)?$total_amount:''; ?>" />
		<input type="hidden" name="phone" value="<?php echo $mobile; ?>" />
		<input type="hidden" name="package_amount" id="package-amount" value="<?php echo $package_amount; ?>" />
		<input type="hidden" name="productinfo" value="<?php echo $connection_type."__".$customerdetails->id."__".$package_amount; ?>" />

	   <table class="table" id="<?php echo $random_value; ?>">
			<tr>
				<th>Package Amount</th><td>{{$package_amount}}</td>
			</tr>
				<?php if($customerdetails->installation_amount>0)
				{
				    
				?>
			<tr>
				<th>Installation Amount</th><td>{{$customerdetails->installation_amount}}</td>
			</tr>
			<?php } ?>
			<?php if($customerdetails->connection_type == 5 || $customerdetails->connection_type == 7){ 
			if($customerdetails->setup_box_amount > 0)
			{
			?>
			<tr>
				<th>Setup Box Amount</th><td>{{($customerdetails->setup_box_amount > 0)?$customerdetails->setup_box_amount:0}}</td>
			</tr>
			<?php }  }
			if($customerdetails->secure_deposite_amount > 0)
			{
			?>
			<tr>
				<th>ONT Security Deposit</th><td>{{($customerdetails->secure_deposite_amount > 0)?$customerdetails->secure_deposite_amount:0}}</td>
				<?php $secureamt=$customerdetails->secure_deposite_amount;?>
			</tr>
			<?php }  ?>
			<?php if($customerdetails->connection_type == 7 || $customerdetails->connection_type == 6){
			if($customerdetails->androidbox_security_deposit > 0)
		       {
		
			?>
			<tr>
				<th>Androidbox Security Deposit</th><td>{{($customerdetails->androidbox_security_deposit > 0)?$customerdetails->androidbox_security_deposit:0}}</td>
			</tr>
			<?php } }
			if($customerdetails->discount_amount > 0)
			{
			?>

			<tr>
				<th>Discount Amount</th><td>{{($customerdetails->discount_amount > 0)?$customerdetails->discount_amount:0}}</td>
			</tr>
            <?php } ?>
			<tr class="bg bg-primary text-white">
				<th><b>Total Amount<b></th><td>{{ isset($total_amount)?$total_amount:'' }}</td>
			</tr>
			<tr>
			<td style="border-bottom:none;vertical-align:bottom" rowspan="5">
					<a href="{{url($pay_later_url)}}" class="btn btn-primary">&lt; Pay Later</a> &nbsp;&nbsp;&nbsp; </td>
							<?php if ($payment_mode == "Cash") { ?>
				<td style="text-align:right">{!! Form::submit('Cash Payment &gt;', ['class' => 'btn btn-success', 'name' => 'submitbutton', 'value' => 'cash-payment', 'formaction' => url("/admin/customers/cash-payment-response")]) !!} </td>
				<?php } else if ($payment_mode == "Cheque") { ?>
				<td>
					<div>
					{!! Form::open(['route' =>['customers.cheque.store'],'id'=>'customer_payment_submit','method'=>'post'])!!}					
					<div class="form-group"> {!! Form::label('cheque_no', 'Cheque No *') !!}
				        {!! Form::text('cheque_no',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Cheque No')) !!} </div>

				        <div class="form-group"> {!! Form::label('issuing_bank_name', 'Issuing Bank Name *') !!}
				        {!! Form::text('issuing_bank_name',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Issuing Bank Name')) !!} </div>

				        <div class="form-group"> {!! Form::label('issuing_date', 'Issuing Date *') !!}
				        {!! Form::text('issuing_date',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Issuing Date', 'autocomplete' => 'off')) !!} </div>

				        <div class="form-group"> {!! Form::label('branch', 'Branch *') !!}
				        {!! Form::text('branch',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Branch')) !!} </div>

					</div>
					{!! Form::submit('Cheque Payment &gt;', ['class' => 'btn btn-success', 'name' => 'submitbutton', 'value' => 'cheque-payment', 'formaction' => url("/admin/customers/cheque-payment-response")]) !!} 
				</td>
				<?php }  else if ($payment_mode == "Payment Gateway") { ?>
				<td style="text-align:right">{!! Form::submit('Proceed to Payment &gt;', ['class' => 'btn btn-success', 'name' => 'submitbutton','value' => 'proceed-to-payments']) !!}</td>
				<?php } ?>
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
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript">
    var j = jQuery.noConflict();
	j(function() {
    	j("#issuing_date").datepicker({ dateFormat: "yy-mm-dd" });
	});
  </script>
@stop
