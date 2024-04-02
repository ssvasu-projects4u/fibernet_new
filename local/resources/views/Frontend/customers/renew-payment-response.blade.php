@extends('layouts.customer')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Renew Process Status</h3></div>
	  
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
	  <?php 
		if (isset($_POST["additionalCharges"])) {
			$additionalCharges=$_POST["additionalCharges"];
			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}else {	  
			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
		}
		$hash = hash("sha512", $retHashSeq);

		if ($hash != $posted_hash || $status !='success') {
			echo "Invalid Transaction. Please try again";
		}else {
			echo "<h3>Thank You. Your order status is <b>". $status ."</b>.</h3>";
			echo "<h4>Your Transaction ID for this transaction is <b>".$txnid."</b>.</h4>";
			echo "<h4>We have received a payment of Rs. <b>" . $amount . "</b>.</h4>";
		}
		?>
	</div>
  </div>
@stop
