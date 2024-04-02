@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Cheque Invoices</h3></div>
	</div>


	<div class="card-body" style="padding:5px;">
	  @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
        @if($errors->any())
      <div class="alert alert-danger"> @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach </div>
      @endif

	  <div class="table-responsive">
	  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100" id="po">
      <thead>
	  <tr class="table-warning">
    <th>action</th>
		<th>Paid</th>
		<th>Payment Type</th>
		<!-- <th>Cheque Status</th> -->
		<th>Payment Mode</th>
		<th>Invoice Number</th>
    <th>Order/PO Number</th>
    <th>Invoice Type</th>
    <th>Payment Flow Type</th>
    <th>Invoice Date</th>
		<th>From Date</th>
		<th>End Date</th>
		<th>Amount(in Rs.)</th>
		<th>CGst(%)</th>
		<th>CGst Amount(in Rs.)</th>
		<th>SGst(%)</th>
		<th>SGst Amount(in Rs.)</th>
		<th>Total Amount(in Rs.)</th>
		<th>Phone</th>
    <th>Email</th>
    <th>Name</th>
    <th>Package</th>
    <th>Sub package</th>
    <th>Payment Date</th>
    <th>Renewed by</th>
    <th>Base Price</th>
    <th>Discount</th>
    <th>Paid Amount</th>
    <th>Current Balance</th>
	  </tr>
	  </thead>
  <tbody>
	@foreach ($data as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
      <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
      @canany([
        "cheque-update",
      ])
        <ul class="dropdown-menu dropdown-default" role="menu">
          @can("cheque-update")
            <li><a class="dropdown-item" data-toggle="modal" data-target="#cheque-update-form" href="{{url('admin/accounts/invoices/cheque-update/'.$datarow->id.'/form') }}" title='cheque-update-form' >
              <i class="fas fa-money-bill-alt" aria-hidden="true"></i> Cheque Update</a>
            </li>
          @endcan
        </ul>
      @endcanany
      </div>
		</td>
    <td>{{ $datarow->paid == 1 ? 'paid': 'unpaid' }}</td>
		<td>{{ ucfirst($datarow->paymenttype) }}</td>
		<!-- <td>{{ $datarow->cheque_status }}</td> -->
		<td>{{ $datarow->paid_through }}</td>
		<td>{{ $datarow->invoice_number }}</td>
		<td>{{ $datarow->po_number }}</td>
		<td>{{ ucfirst($datarow->invoice_type) }}</td>
		<td>{{ ucfirst($datarow->payment_flow_type) }}</td>
		<td>{{ $datarow->created_at ? $datarow->created_at : '-' }}</td>
    <td>{{ $datarow->from_date ? date("d-M-Y",strtotime($datarow->from_date)) : '-' }}</td>
    <td>{{ $datarow->end_date ? date("d-M-Y",strtotime($datarow->end_date)) : '-' }}</td>
		<td>{{ $datarow->amount }}</td>
		<td>{{ $datarow->cgst_value ?  $datarow->cgst_value : '-' }}</td>
    <td>{{ $datarow->cgst_amount ? $datarow->cgst_amount : '-' }}</td>
		<td>{{ $datarow->sgst_value ?  $datarow->sgst_value : '-' }}</td>
    <td>{{ $datarow->sgst_amount ? $datarow->sgst_amount : '-' }}</td>
    <td>{{ $datarow->total_amount }}</td>
		<td>{{ $datarow->phone ? $datarow->phone : '-' }}</td>
		<td>{{ $datarow->email ? $datarow->email : '-' }}</td>
		<td>{{ $datarow->name  ? $datarow->name : '-' }}</td>
    <td>{{ $datarow->package ? $datarow->package : '-' }}</td>
		<td>{{ $datarow->sub_package ? $datarow->sub_package : '-' }}</td>
    <td>{{ $datarow->payment_date ? date("d-M-Y",strtotime($datarow->payment_date)) : '-' }}</td>
		<td>{{ $datarow->renewed_by ? $datarow->renewed_by : '-' }}</td>
    <td>{{ $datarow->base_price ? $datarow->base_price : '-' }}</td>
		<td>{{ $datarow->discount_amount ? $datarow->discount_amount : '-'}}</td>
		<td>{{ $datarow->paid_amount ? $datarow->paid_amount : '-'}}</td>
		<td>{{ $datarow->current_balance ? $datarow->current_balance : '-'  }}</td>
		</tr>
    @endforeach
	</tbody>
	</table>

	{{ $data->links() }}
	</div>
	</div>
  </div>
  <div id="cheque-update-form" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>var jQuery_1_12_4 = $.noConflict(true);</script>
@stop
