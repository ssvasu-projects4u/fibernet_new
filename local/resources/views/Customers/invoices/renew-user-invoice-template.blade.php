@extends('layouts.invoice')

@section('content')
<div class="invoice-wrapper">
<table class="table-header">
  <tr>
    <td>
      <img src="{{ asset('assets/img/slj-fiber-networks-invoice.png') }}" alt="sljfiber" style="width: 150px; height: 100px;" />
    </td>
    <td>
      <div class="page-title"><span class="invoice-header"><h1>INVOICE</h1></span></div>    
    </td>
    <td>
      <?php if ($data->paid == 1) {?>
        <img src="{{ asset('assets/img/slj-fiber-networks-invoice-paid.jpg') }}" alt="sljfiber invoice paid" style="width: 100px; height: 100px;" />
      <?php } ?>
    </td>
  </tr>
</table>
<p></p>
<hr>
<p></p>
  <table class="table overview-table">
    <thead>
      <tr>
        <th scope="col">Invoice From</th>
        <th scope="col">Invoice To</th>
        <th scope="col">Customer Information</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="left-text"><div>
            <div><strong>SLJ Fiber Networks Pvt.Ltd.</strong></div>
            <div>D.NO.4-8-25/2, Opp Chinna Ramalayam, Saketpuram, Main Road, Naidupet Koretipadu, Guntur-2.</div>
            <div><strong>GSTIN :</strong> 37AAZCS9680E1ZE</div></div>
        </td>
        <td class="left-text"><div>
            <div><strong>Name: </strong>{{ $data->name }}</div>
            <div><strong>Address: </strong> {{ $data->installation_address }} </div>
            <div><strong>Registered Mobile: </strong>  {{ $data->phone }}</div>
            <div><strong>GST Number: </strong>{{ $data->gst_number }} </div>
        </td>
        <td>
            <div>
                <table>
                <tr><td>Order No</td><td>{{ $data->order_number }}</td></tr>
                <tr><td>Invoice No</td><td>{{ $data->invoice_number }}</td></tr>
                <tr><td>Billing Date</td><td>{{ $data->created_at }}</td></tr>
                <tr><td>Due Date</td><td>{{ $data->created_at }}</td></tr>
                <?php if ( $data->from_date && $data->end_date ) { ?>
                  <tr><td>Billing Period</td><td>{{ $data->from_date }} To {{ $data->end_date}}</td></tr>
                <?php } ?>
                </table>
            </div>
        </td>
    </tr>
    </tbody>
  </table>
  <p></p>
  <table class="table  breakup-table">
    <caption><h2>Invoice Breakup</h2></caption>
    <thead>
      <tr>
        <th scope="col">Description</th>
        <th scope="col">Quantity</th>
        <th scope="col">Unit Cost</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
                                                        <?php if ($data->connection_type == "broadband")  { ?>
                                                          <div><span>Package : </span> <span>{{ $package->package_name }}</span></div>
                                                          <div><span>Sub Package : </span> <span>{{ $subpackage->sub_plan_name }}</span></div>
                                                        <?php } ?>

                                                        <?php if ($data->connection_type == "combo")  { ?>
                                                            <div><span>Combo Package : </span><span>{{ $combopackage->package_name }}</span></div>
                                                            <div><span>Combo Sub Package : </span><span>{{ $combosubpackage->sub_plan_name }}</span></div>
                                                        <?php } ?>

                                                        <?php if ($data->connection_type == "iptv")  { ?>
                                                                <div><span>Iptv *</span></div>
                                                            <?php if ($data->iptv_base != "") {
                                                                    $packages = explode(",", $data->iptv_base);
                                                                    $iptv_bases = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                 ?>
                                                                <div><strong>ITPV Base</strong></div>
                                                                <div>
                                                                    <?php foreach($iptv_bases as $iptv_base) { ?>
                                                                    <div>{{ $iptv_base->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($data->iptv_packages != "") {
                                                                    $packages = explode(",", $data->iptv_packages);
                                                                    $iptv_packages = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>ITPV Packages</strong></div>
                                                                <div>
                                                                   <?php foreach($iptv_packages as $iptv_package) { ?>
                                                                  <div>{{ $iptv_package->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->iptv_local != "") {
                                                                    $packages = explode(",", $data->iptv_local);
                                                                    $iptv_locals = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
                                                                ?>
                                                            <div>
                                                                <div><strong>ITPV Local</strong></div>
                                                                <div>
                                                                <?php foreach($iptv_locals as $iptv_local) { ?>
                                                                  <div>{{ $iptv_local->name }}</div>
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->iptv_allacart != "") {
                                                                $packages = explode(",", $data->iptv_allacart);
                                                                $iptv_allacarts = \App\IptvPackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>ITPV Allacart</strong></div>
                                                                <div>
                                                                 <?php foreach($iptv_allacarts as $iptv_allacart) { ?>
                                                                  <div>{{ $iptv_allacart->name }}</div>
                                                                 <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        <?php } ?>


                                                        <?php if ($data->connection_type == "cable")  { ?>
                                                            <div>
                                                                <div><span>Cable *</span></div>
                                                                <div></div>
                                                            </div>
                                                            <?php if ($data->cable_base != "") {
                                                                    $packages = explode(",", $data->cable_base);
                                                                    $cable_bases = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                 ?>
                                                            <div>
                                                                <div><strong>Cable Base</strong></div>
                                                                <div>
                                                                    <?php foreach($cable_bases as $cable_base) { ?>
                                                                    <div>{{ $cable_base->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->cable_packages != "") {
                                                                    $packages = explode(",", $data->cable_packages);
                                                                    $cable_packages = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>Cable Packages</strong></div>
                                                                <div>
                                                                   <?php foreach($cable_packages as $cable_package) { ?>
                                                                  <div>{{ $cable_package->name }}</div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->cable_local != "") {
                                                                    $packages = explode(",", $data->cable_local);
                                                                    $cable_locals = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();                                                                
                                                                ?>
                                                            <div>
                                                                <div><strong>Cable Local</strong></div>
                                                                <div>
                                                                <?php foreach($cable_locals as $cable_local) { ?>
                                                                  <div>{{ $cable_local->name }}</div>
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                            <?php if ($data->cable_allacart != "") {
                                                                $packages = explode(",", $data->cable_allacart);
                                                                $cable_allacarts = \App\CablePackages::whereIn('id', $packages)->select('package_name as name')->get();
                                                                ?>
                                                            <div>
                                                                <div><strong>Cable Allacart</strong></div>
                                                                <div>
                                                                 <?php foreach($cable_allacarts as $cable_allacart) { ?>
                                                                  <div>{{ $cable_allacart->name }}</div>
                                                                 <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
                                                        <?php } ?>


        </td>
        <td>{{ $data->time }}</td>
        <td class="right-text"><span>{{ $data->package_amount }} (+)</span></td>
        <td class="right-text"><span>{{ $data->package_amount }}</span></td>
      </tr>
      <tr>
        <td colspan="3" class="right-text"><strong>Additional Charge(+)</strong></td>
        <td class="right-text"><strong>{{ $data->additional_amount }}</strong></td>
      </tr>
      <tr>
        <td colspan="3" class="right-text"><strong>Discount (-)</strong></td>
        <td class="right-text"><strong>{{ $data->discount_amount }}</strong></td>
      </tr>
      <tr class="grey-background">
        <td colspan="3" class="right-text"><strong>GRAND TOTAL</strong></td>
        <td class="right-text"><strong>{{ $data->total_amount }}</strong></td>
      </tr>
      <?php  if ($data->paid == 0 ) { ?>
        <tr>
          <td colspan="3" class="right-text"><strong>Balance Due</strong></td>
          <td class="right-text"><strong class="red">{{ $data->total_amount }}</strong></td>
        </tr>
      <?php  } ?>
    </tbody>
  </table>
  <p></p>
  <?php if ($data["paid"] == 1) { ?>
  <table class="table  payment-table">
    <caption><h2></h2></caption>
    <thead>
      <tr>
        <th scope="col">Bill No</th>
        <th scope="col">Payment Mode</th>
        <th scope="col">Notes</th>
        <th scope="col">Paid Date</th>
        <th scope="col">Paid Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="right-text"><span>{{ $data->bill_number }}</span></td>
        <td class="right-text"><span>{{ ucfirst(str_replace("_", " ", $data->payment_type)) }}</span></td>
        <td class="right-text"><span>{{ $data->note }}</span></td>
        <td class="right-text"><span>{{ $data->paid_date }} </span></td>
        <td class="right-text"><span>{{ $data->paid_amount }}</span></td>
      </tr>
    </tbody>
  </table>
      <?php } ?>
  <p></p>
  <hr>
  <p></p>
      <p class="center-text">***This is computer generated invoice. No signature required***</p>
      <p></p>
   
</div>
  <style>
      .red {
          color: red
      }
      .invoice-wrapper {
          border: 5px solid red;
          padding: 10px;
      }
      table, th, td {
          border: 1px solid rgb(119, 118, 118);
          border-collapse: collapse;
          text-align: center;
          width: 100%;
      }
      table, tr, td {
          border: 1px solid rgb(119, 118, 118);
          border-collapse: collapse;
          /* text-align: center; */
      }
      th, .grey-background{
          background-color: rgb(180, 180, 180);
          height: 40px;
      }
      .invoice-header, .center-text {
          text-align: center;
      }
      caption {
          text-align: left;
          height: 60px;
          border: 1px solid rgb(119, 118, 118);
      }
      .right-text {
          text-align: right;
      }
      .left-text {
          text-align: left;
          vertical-align: top;
      }

      .table-header  {
          table-layout: fixed;
          border: none;
      }
      .table-header tr td {
          border: none;
      }

      .paid-indicator  {
        color: green
      }
    </style>
@stop
