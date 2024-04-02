@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Customer Payments</h3></div>
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
        <th>Action</th>
        <th>Customer_Name</th>
        <th>Branch</th>
        <th>Franchise</th>
        <th>Payment Type</th>
        <th>Payment Mode</th>        
        <th>Amount</th>
        <th>Connection Type</th>
       <th>Payment Status</th>
        <th>Payment Date</th>
    
        <th>Installation Address</th>

	  </tr>
	  </thead>
  <tbody>
	@foreach ($data as $datarow)
        <tr>
            <td align="center"><div class="btn-group">
                <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
            @canany(
              [
                "pay-invoice",
                "payment-pickup",
                "download-unpaid-invoice",
                "send-email-unpaid-invoice",
                "print-unpaid-invoice",
                "cancel-unpaid-invoice",
                "delete-unpaid-invoice"
              ]
            )
           
 <ul class="dropdown-menu dropdown-default" role="menu">
                @can("pay-invoice")
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#pay-form" href="{{url('admin/accounts/invoices/pay/'.$datarow->id).'/form'}}" title='pay' ><i class="fas fa-money-bill-alt" aria-hidden="true"></i> Pay Invoice</a>
                  </li>
                  @endcan
                @can("payment-pickup")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#payment-pickup" href="{{url('admin/accounts/invoices/payment-pickup/'.$datarow->id.'/form')}}" title='generate' ><i class="fas fa-truck" aria-hidden="true"></i> Payment Pickup</a> </li>
                  @endcan
                @can("download-unpaid-invoice")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  {{-- <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit Invoice</a></li>
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li> --}}
                  <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/download/'.$datarow->id)}}" title='download' ><i class="fas fa-download" aria-hidden="true"></i> Download</a> </li>
                @endcan
                @can("send-email-unpaid-invoice")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#send-mail-form" href="{{url('admin/accounts/invoice/send-mail-form/'.$datarow->id)}}" title='send-mail' ><i class="fas fa-envelope" aria-hidden="true"></i> Send Email</a> </li>
                @endcan
                @can("print-unpaid-invoice")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  <li><a class="dropdown-item anchor-print-preview" target="_blank" href="{{url('admin/accounts/invoice/print/'.$datarow->id)}}" title='print' ><i class="fas fa-print" aria-hidden="true"></i> Print</a> </li>
                @endcan
                @can("cancel-unpaid-invoice")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/cancel/'.$datarow->id)}}" title='cancel' ><i class="fa fa-times" aria-hidden="true"></i> Cancel</a> </li>
                @endcan
                @can("delete-unpaid-invoice")
                  <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                  <li><a class="dropdown-item" href="{{url('admin/accounts/invoice/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
                @endcan
            </ul>
            @endcanany
        
            </div>
		</td>
		
		<td>{{ $datarow->customer_id ? ucfirst($datarow->name) : '-' }}</td>
		<td>{{ $datarow->branch ? $datarow->branch_name : '-' }}</td>
		<td>{{ $datarow->franch ? $datarow->franchise_name : '-' }}</td>
		<td>{{ $datarow->paytype ? $datarow->paytype : '-' }}</td>
			<td>{{ $datarow->payment_mode ? $datarow->payment_mode	 : '-' }}</td>
		<td>{{ $datarow->amount ? ucfirst($datarow->amount)  : '-' }}</td>
			<td>{{ $datarow->connection_type ? $datarow->connection_type : '-' }}</td>
		<td>{{ $datarow->payment_status ? ucfirst($datarow->payment_status)  : '-' }}</td>
    <td>{{ $datarow->paid_date ? date("d-M-Y  h:i:s",strtotime($datarow->paid_date)) : '-' }}</td>
  
		<td>{{ $datarow->installation_address ? $datarow->installation_address : '-' }}</td>


    
		</tr>
    @endforeach
	</tbody>
	</table>

	{{ $data->links() }}
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
