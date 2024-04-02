@extends('layouts.popup')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
		<div class="modal-header">
			<div class="card-header">
				<div class="float-left">
					<h3 class="m-0 font-weight-bold text-primary">Credits description</h3>
				</div>
			</div>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">

	<div class="card-body table-responsive" style="padding:5px;">
	  <!-- @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif -->

			<div class="container">
    			<table class="table table-striped">
					<tbody>
	     			<?php if ($data->invoice_number) { ?>
						<tr>
							<th scope="row">Invoice Number:</th>
							<td>{{ $data->invoice_number }}</td>
						</tr>
    				<? } ?>
					<?php if ($data->payment_from == 2) { ?>
						<tr>
							<th scope="row">Franchise:</th>
							<td>{{ $data->name }}</td>
						</tr>
    				<? } ?>
	     			<?php if ($data->payment_from == 1) { ?>
						<tr>
							<th scope="row">Branch:</th>
							<td>{{ $data->name }} </td>
						</tr>
    				<? } ?>
					<?php if ($data->payment_from == 3) { ?>
						<tr>
							<th scope="row">Customer Name:</th>
							<td>{{ $data->name }}</td>
						</tr>
    				<? } ?>

					<tr>
						<th scope="row">Payment Type:</th>
						<td>{{ $data->inpayment_type }}</td>
					</tr>

					<!-- <tr>
						<th scope="row">Payment Mode:</th>
						<td>
						<?php // if ($data->payment_mode == "Payment Gateway") { ?>
							<p>Online</p>
							<?php // } else { ?>
     							<p>{{ ucfirst($data->payment_mode) }}</p>
							<?php // } ?>
							<?php // if ($data->payment_mode == "Cheque") { ?>
							<table>
								<tr><td>Cheque No:</td><td>{{ $data->cheque_no }}</td></tr>
								<tr><td>Bank Name:</td><td>{{ $data->issuing_bank_name }}</td></tr>
								<tr><td>Issuing date:</td><td>{{ $data->issuing_date }}</td></tr>
								<tr><td>Branch:</td><td>{{ $data->branch }}</td></tr>
							</table>
							<?php // } ?>
						</div>
						</td>
					</tr> -->
					<!-- <?php // if ($data->payment_source) { ?>
						<tr>
							<th scope="row">Payment Source:</th>
							<td>{{ $data->payment_source }}</td>
						</tr>
    				<? // } ?> -->
				</tbody>
		</table>
		</div>
	</div>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>  
@stop
