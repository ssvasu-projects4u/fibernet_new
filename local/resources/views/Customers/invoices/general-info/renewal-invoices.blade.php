@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    @include('customers.customer-details-topmenu')

    <div class="card-body" style="padding: 0 !important;">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger"> @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach </div>
        @endif
    </div>
    <div class="row">
        @include('customers.customer-details-navigation')
        @include('customers.customer-details-basic-info')
    </div>

<div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Renewal Invoices</h3></div>
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
		<th>Actions</th>
      <th>Connection Type</th>
      <th>Order No.</th>
      <th>Invoice No.</th>
      <th>Franchise Name</th>
      <th>Status</th>
      <th>Renew type</th>
      <th>Invoice Type</th>

      <th>Package</th>
      <th>Sub Package</th>
      <th>Combo Package</th>
      <th>Combo Sub Package</th>

      <th>Cable Base</th>
      <th>Cable Tv Package</th>
      <th>Cable Packages</th>
      <th>Cable Allacart</th>      
      <th>Iptv Base</th>
      <th>Iptv Packages</th>
      <th>Iptv Local</th>
      <th>Iptv Allacart</th>

      <th>Renew date</th>
      <th>Invoice Date</th>
      <th>Renew By</th>
      <th>Package Price</th>
      <th>Discount</th>
      <th>Additional Charges</th>
      <th>Final Invoice Amount</th>
      <th>Paid through</th>
      <th>Paid Amount</th>
      <th>Paid Date</th>
      <th>Balance</th>
      <th>Current Balance</th>
	  </tr>
	  </thead>
  <tbody>
	@foreach ($scheduledRenwalInvoices as $scheduledRenwalInvoice)
        <tr>
		<td align="center"><div class="btn-group">
            <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
            <ul class="dropdown-menu dropdown-default" role="menu">
                <?php  if ($scheduledRenwalInvoice->paid == 0) { ?>
                <li><a class="dropdown-item" data-toggle="modal" data-target="#pay-form" href="{{url('admin/customers/renew-user-invoices/pay/'.$scheduledRenwalInvoice->invoice_id).'/form'}}" title='pay' ><i class="fas fa-money-bill-alt" aria-hidden="true"></i> Pay Invoice</a>
                </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" data-toggle="modal" data-target="#payment-pickup" href="{{url('admin/customers/renew-user-invoices/payment-pickup/'.$scheduledRenwalInvoice->invoice_id.'/form')}}" title='generate' ><i class="fas fa-truck" aria-hidden="true"></i> Payment Pickup</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <?php } ?>
                {{-- <li><a class="dropdown-item" href="{{url('admin/customers/renew-user-invoice/edit/'.$scheduledRenwalInvoice->invoice_id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit Invoice</a></li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li> --}}
                <li><a class="dropdown-item" href="{{url('admin/customers/renew-user-invoice/download/'.$scheduledRenwalInvoice->invoice_id)}}" title='download' ><i class="fas fa-download" aria-hidden="true"></i> Download</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" data-toggle="modal" data-target="#send-mail-form" href="{{url('admin/customers/renew-user-invoice/send-mail-form/'.$scheduledRenwalInvoice->invoice_id)}}" title='send-mail' ><i class="fas fa-envelope" aria-hidden="true"></i> Send Email</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item anchor-print-preview" target="_blank" href="{{url('admin/customers/renew-user-invoice/print/'.$scheduledRenwalInvoice->invoice_id)}}" title='print' ><i class="fas fa-print" aria-hidden="true"></i> Print</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" href="{{url('admin/customers/renew-user-invoice/cancel/'.$scheduledRenwalInvoice->invoice_id)}}" title='cancel' ><i class="fa fa-times" aria-hidden="true"></i> Cancel</a> </li>
                <li class="divider"><hr class="py-0 my-0 mb-4"></li>
                <li><a class="dropdown-item" href="{{url('admin/customers/renew-user-invoice/delete/'.$scheduledRenwalInvoice->invoice_id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
            </ul>
		</td>
		<td>{{ $scheduledRenwalInvoice->connection_type }}</td>
		<td>{{ $scheduledRenwalInvoice->order_number }}</td>
		<td>{{ $scheduledRenwalInvoice->invoice_number }}</td>
		<td>{{ $scheduledRenwalInvoice->franchise_name }}</td>
		<td>{{ $scheduledRenwalInvoice->paid == 0 ? 'Unpaid': 'Paid' }}</td>
		<td>{{ ucfirst($scheduledRenwalInvoice->renew_type) }}</td>
		<td>{{ $scheduledRenwalInvoice->invoice_type }}</td>

    <td>{{ $scheduledRenwalInvoice->bpackage_name }}</td>
		<td>{{ $scheduledRenwalInvoice->sbpackage_name }}</td>

    <td>{{ $scheduledRenwalInvoice->copackage_name }}</td>
		<td>{{ $scheduledRenwalInvoice->scopackage_name }}</td>

    <td>
      <?php 
      if ($scheduledRenwalInvoice->cable_base != "") {
        $packages = explode(",", $scheduledRenwalInvoice->cable_base);
        $cable_bases = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
      foreach($cable_bases as $cable_base) { ?>
        <div>{{ $cable_base->name }}</div>
        <?php }
      } ?>
    </td>

    <td>
      <?php if ($scheduledRenwalInvoice->cable_packages != "") {
              $packages = explode(",", $scheduledRenwalInvoice->cable_packages);
              $cable_packages = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();

          foreach($cable_packages as $cable_package) { ?>
            <div>{{ $cable_package->name }}</div>
              <?php }  } ?>
    
    </td>

    <td>
      <?php if ($scheduledRenwalInvoice->cable_local != "") {
              $packages = explode(",", $scheduledRenwalInvoice->cable_local);
              $cable_locals = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
          foreach($cable_locals as $cable_local) { ?>
            <div>{{ $cable_local->name }}</div>
          <?php  }
          } ?>
    </td>
    <td>
      <?php if ($scheduledRenwalInvoice->cable_allacart != "") {
          $packages = explode(",", $scheduledRenwalInvoice->cable_allacart);
          $cable_allacarts = \App\CablePackages::whereIn('id', $packages)
          ->select('package_name as name')->get();
          foreach($cable_allacarts as $cable_allacart) { ?>
            <div>{{ $cable_allacart->name }}</div>
            <?php }
          } ?>
    </td>
    <td>
      <?php 
      if ($scheduledRenwalInvoice->iptv_base != "") {
        $packages = explode(",", $scheduledRenwalInvoice->iptv_base);
        $iptv_bases = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
      foreach($iptv_bases as $iptv_base) { ?>
        <div>{{ $iptv_base->name }}</div>
        <?php }
      } ?>
    </td>

    <td>
      <?php if ($scheduledRenwalInvoice->iptv_packages != "") {
              $packages = explode(",", $scheduledRenwalInvoice->iptv_packages);
              $iptv_packages = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();

          foreach($iptv_packages as $iptv_package) { ?>
            <div>{{ $iptv_package->name }}</div>
              <?php }  } ?>
    
    </td>

    <td>
      <?php if ($scheduledRenwalInvoice->iptv_local != "") {
              $packages = explode(",", $scheduledRenwalInvoice->iptv_local);
              $iptv_locals = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
          foreach($iptv_locals as $iptv_local) { ?>
            <div>{{ $iptv_local->name }}</div>
          <?php  }
          } ?>
    </td>
    <td>
      <?php if ($scheduledRenwalInvoice->iptv_allacart != "") {
          $packages = explode(",", $scheduledRenwalInvoice->iptv_allacart);
          $iptv_allacarts = \App\IptvPackages::whereIn('id', $packages)
          ->select('package_name as name')->get();
          foreach($iptv_allacarts as $iptv_allacart) { ?>
            <div>{{ $iptv_allacart->name }}</div>
            <?php }
          } ?>
    </td>

		<td>{{ $scheduledRenwalInvoice->renew_date }}</td>
		<td>{{ $scheduledRenwalInvoice->created_at }}</td>
		<td>{{ $scheduledRenwalInvoice->renewby_first_name }} {{ $scheduledRenwalInvoice->renewby_last_name }}</td>
		<td>{{ $scheduledRenwalInvoice->package_amount }}</td>
		<td>{{ $scheduledRenwalInvoice->discount_amount }}</td>
		<td>{{ $scheduledRenwalInvoice->additional_amount }}</td>
    <th>{{ $scheduledRenwalInvoice->total_amount }}</th>
    <th>{{ ucfirst(str_replace("_", " ", $scheduledRenwalInvoice->payment_type)) }}</th>    
    <th>{{ $scheduledRenwalInvoice->paid_amount }}</th>
    <th>{{ $scheduledRenwalInvoice->paid_date }}</th>
    <th>{{ $scheduledRenwalInvoice->balance }}</th>    
    <th>{{ $scheduledRenwalInvoice->current_balance }}</th>
		</tr>
    @endforeach
	</tbody>
	</table>

	{{ $scheduledRenwalInvoices->links() }}
	</div>
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
  <style>
      ol.breadcrumbs {
          list-style-type: none;
      }

      li.breadcrumb-item {
          display: inline;
      }
  </style>
@stop
