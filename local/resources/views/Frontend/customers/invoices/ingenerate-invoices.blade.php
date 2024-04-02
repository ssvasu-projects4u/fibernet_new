@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Generate Invoice</h3></div>
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
        <h5><span color="red">{{$errors->first()}}</span></h5>
        @endif


	  <div class="table-responsive">
	  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100" id="po">
      <thead>
	  <tr class="table-warning">
		<th>Actions</th>
		<th>Payment Type</th>
		<th>PO Number</th>
		<th>Invoice Type</th>
		<th>Payment Flow Type</th>
        <th>Next Invoice generate on</th>
		<th>From Date</th>
		<th>End Date</th>
		<th>Amount per month(in Rs.)</th>
		<th>CGst(%)</th>
		<th>CGst Amount(in Rs.)</th>
		<th>SGst(%)</th>
		<th>SGst Amount(in Rs.)</th>
		<th>Gst(%)</th>
		<th>Gst Amount(in Rs.)</th>
		<th>Total Amount(in Rs.)</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Name</th>
	  </tr>
	  </thead>
  <tbody>
	@foreach ($data as $datarow)
		@php
			$cgst_amount = $datarow->amount * ( $datarow->cgst_value/100);
			$sgst_amount =$datarow->amount * ( $datarow->sgst_value/100);
			$gst_amount = $cgst_amount + $sgst_amount;
		@endphp	
        <tr>
		<td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
                <ul class="dropdown-menu dropdown-default" role="menu">
                    <li><a class="dropdown-item" href="{{url('admin/accounts/purchase-order/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/accounts/purchase-order/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                    <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                    <li><a class="dropdown-item" href="{{url('admin/accounts/invoices/generate/'.$datarow->id)}}" title='generate' onclick="return confirm('Are you sure to generate invoice?')"><i class="fas fa-money-bill-alt" aria-hidden="true"></i> Generate Invoice</a> </li>
                </ul>
            </div>
		</td>
		<td>{{ ucfirst($datarow->paymenttype) }}</td>
		<td>{{ $datarow->po_number }}</td>
		<td>{{ ucfirst(str_replace("_"," ", $datarow->invoice_type)) }}</td>
		<td>{{ ucfirst($datarow->payment_flow_type) }}</td>
		<td>{{ date("d-M-Y",strtotime($datarow->renew_date)) }}</td>
		<td>{{ date("d-M-Y",strtotime($datarow->from_date)) }}</td>
		<td>{{ date("d-M-Y",strtotime($datarow->end_date)) }}</td>
		<td>{{ $datarow->amount }}</td>
		<td>{{ $datarow->cgst_value }}</td>
		<td>{{ $cgst_amount }}</td>
		<td>{{ $datarow->sgst_value }}</td>
		<td>{{ $sgst_amount }}</td>
		<td>{{ $datarow->gst_value }}</td>
		<td>{{ $gst_amount }}</td>
		<td>{{ $datarow->total_amount }}</td>
		<td>{{ $datarow->phone }}</td>
		<td>{{ $datarow->email }}</td>
		<td>{{ $datarow->name }}</td>
		</tr>
    @endforeach
	</tbody>
	</table>

	{{ $data->links() }}
	</div>
	</div>
  </div>
  <script>
    $(document).ready(function() {
    $('#po').DataTable();
} );
  </script>	  
@stop
