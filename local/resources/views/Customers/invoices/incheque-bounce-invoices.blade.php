@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Cheque Bounce Invoices</h3></div>
	</div>
	   @include('customers.invoices.topmenu')


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
      <th>Current Balance</th>
	  </tr>
	  </thead>
  <tbody>
	@foreach ($data as $datarow)
        <tr>
        <td align="center"><div class="btn-group">
      <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
        <ul class="dropdown-menu dropdown-default" role="menu">
          <li><a class="dropdown-item" data-toggle="modal" data-target="#cheque-update-form" href="{{url('admin/accounts/invoices/cheque-update/'.$datarow->id.'/form') }}" title='cheque-update-form' >
            <i class="fas fa-money-bill-alt" aria-hidden="true"></i>Cheque Update</a>
          </li>
        </ul>
      </div>
		</td>
      <td>{{ $datarow->connection_type }}</td>
      <td>{{ $datarow->order_number }}</td>
      <td>{{ $datarow->invoice_number }}</td>
      <td>{{ $datarow->franchise_name }}</td>
      <td>{{ $datarow->paid == 0 ? 'Unpaid': 'Paid' }}</td>
      <td>{{ $datarow->renew_type }}</td>
      <td>{{ $datarow->invoice_type }}</td>

      <td>{{ $datarow->bpackage_name }}</td>
      <td>{{ $datarow->sbpackage_name }}</td>

      <td>{{ $datarow->copackage_name }}</td>
      <td>{{ $datarow->scopackage_name }}</td>

    <td>
      <?php 
      if ($datarow->cable_base != "") {
        $packages = explode(",", $datarow->cable_base);
        $cable_bases = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
      foreach($cable_bases as $cable_base) { ?>
        <div>{{ $cable_base->name }}</div>
        <?php }
      } ?>
    </td>

    <td>
      <?php if ($datarow->cable_packages != "") {
              $packages = explode(",", $datarow->cable_packages);
              $cable_packages = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();

          foreach($cable_packages as $cable_package) { ?>
            <div>{{ $cable_package->name }}</div>
              <?php }  } ?>
    
    </td>

    <td>
      <?php if ($datarow->cable_local != "") {
              $packages = explode(",", $datarow->cable_local);
              $cable_locals = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
          foreach($cable_locals as $cable_local) { ?>
            <div>{{ $cable_local->name }}</div>
          <?php  }
          } ?>
    </td>
    <td>
      <?php if ($datarow->cable_allacart != "") {
          $packages = explode(",", $datarow->cable_allacart);
          $cable_allacarts = \App\CablePackages::whereIn('id', $packages)
          ->select('package_name as name')->get();
          foreach($cable_allacarts as $cable_allacart) { ?>
            <div>{{ $cable_allacart->name }}</div>
            <?php }
          } ?>
    </td>
    <td>
      <?php 
      if ($datarow->iptv_base != "") {
        $packages = explode(",", $datarow->iptv_base);
        $iptv_bases = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
      foreach($iptv_bases as $iptv_base) { ?>
        <div>{{ $iptv_base->name }}</div>
        <?php }
      } ?>
    </td>

    <td>
      <?php if ($datarow->iptv_packages != "") {
              $packages = explode(",", $datarow->iptv_packages);
              $iptv_packages = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();

          foreach($iptv_packages as $iptv_package) { ?>
            <div>{{ $iptv_package->name }}</div>
              <?php }  } ?>
    
    </td>

    <td>
      <?php if ($datarow->iptv_local != "") {
              $packages = explode(",", $datarow->iptv_local);
              $iptv_locals = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
          foreach($iptv_locals as $iptv_local) { ?>
            <div>{{ $iptv_local->name }}</div>
          <?php  }
          } ?>
    </td>
    <td>
      <?php if ($datarow->iptv_allacart != "") {
          $packages = explode(",", $datarow->iptv_allacart);
          $iptv_allacarts = \App\IptvPackages::whereIn('id', $packages)
          ->select('package_name as name')->get();
          foreach($iptv_allacarts as $iptv_allacart) { ?>
            <div>{{ $iptv_allacart->name }}</div>
            <?php }
          } ?>
    </td>

      <td>{{ $datarow->renew_date }}</td>
      <td>{{ $datarow->created_at }}</td>
      <td>{{ $datarow->renewby_first_name }} {{ $datarow->renewby_last_name }}</td>
      <td>{{ $datarow->package_amount }}</td>
      <td>{{ $datarow->discount_amount }}</td>
      <td>{{ $datarow->additional_amount }}</td>
      <td>{{ $datarow->total_amount }}</td>
      <td>{{ $datarow->current_balance }}</td>
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
