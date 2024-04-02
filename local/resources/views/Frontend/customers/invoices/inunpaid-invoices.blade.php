@extends('layouts.customer')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Unpaid Invoice</h3></div>
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
		<!-- <th>Actions</th> -->
		<th>Connection Type</th>
		<th>Order No.</th>
    <th>Invoice No.</th>
    <th>Franchise Name</th>
    <th>Status</th>
    <th>Renew type</th>
		<th>Status</th>
		<th>Renew Type</th>
		<th>Invoice Type</th>
    <th>Package</th>
    <th>Sub Package</th>
    <th>Renew date</th>
    <th>Invoice Date</th>
    <th>Renew By</th>
    <th>Package Price</th>
		<th>CGst(%)</th>
		<th>CGst Amount(in Rs.)</th>
		<th>SGst(%)</th>
		<th>SGst Amount(in Rs.)</th>
		<th>Final Invoice Amount</th>
    <th>Current Balance</th>
	  </tr>
	  </thead>
  <tbody>
	@foreach ($data as $datarow)
        <tr>
		<!-- <td align="center"><div class="btn-group">
            <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
            <ul class="dropdown-menu dropdown-default" role="menu">
                <li><a class="dropdown-item" data-toggle="modal" data-target="#pay-form" href="{{url('admin/accounts/invoices/pay/'.$datarow->id).'/form'}}" title='pay' ><i class="fas fa-money-bill-alt" aria-hidden="true"></i> Pay Invoice</a>
                </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" data-toggle="modal" data-target="#payment-pickup" href="{{url('admin/accounts/invoices/payment-pickup/'.$datarow->id.'/form')}}" title='generate' ><i class="fas fa-truck" aria-hidden="true"></i> Payment Pickup</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                {{-- <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit Invoice</a></li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li> --}}
                <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/download/'.$datarow->id)}}" title='download' ><i class="fas fa-download" aria-hidden="true"></i> Download</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" data-toggle="modal" data-target="#send-mail-form" href="{{url('admin/accounts/invoice/send-mail-form/'.$datarow->id)}}" title='send-mail' ><i class="fas fa-envelope" aria-hidden="true"></i> Send Email</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item anchor-print-preview" target="_blank" href="{{url('admin/accounts/invoice/print/'.$datarow->id)}}" title='print' ><i class="fas fa-print" aria-hidden="true"></i> Print</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/cancel/'.$datarow->id)}}" title='cancel' ><i class="fa fa-times" aria-hidden="true"></i> Cancel</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            </ul>
        </div>
		</td> -->
		<td>{{ ucfirst($datarow->payment_type) }}</td>
		<td>{{ $datarow->invoice_number }}</td>
		<td>{{ $datarow->po_number }}</td>
		<td>{{ ucfirst(str_replace("_"," ", $datarow->invoice_type)) }}</td>
		<td>{{ ucfirst($datarow->payment_flow_type) }}</td>
		<td>{{ $datarow->created_at ? date("d-M-Y h:i:s", strtotime($datarow->created_at)) : '-' }}</td>
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

	{# $data->links() #}
	</div>
	</div>
  </div>
  <div id="payment-pickup" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <div id="pay-form" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>
  <div id="send-mail-form" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<script>var jQuery_1_12_4 = $.noConflict(true);</script>
  <script>
    jQuery_1_12_4(document).ready(function() {
      // $('#po').DataTable();
      jQuery_1_12_4(".anchor-print-preview").click(function(event) {
        event.preventDefault();
        window.open($(this).attr("href")).print();
      });
    } );
  </script>
@stop
