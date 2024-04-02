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
          <?php  if ($data->created_to == 3) { ?>
            <div><strong>Name: </strong>{{ $data->name }}</div>
            <?php if ($data->address) { ?>
            <div><strong>Address: </strong> {{ $data->address }} </div>
            <?php } ?>
            <?php if ($data->phone) { ?>
            <div><strong>Registered Mobile: </strong>  {{ $data->phone }}</div>
            <?php } ?>
            <?php  if ($data->gst_number) { ?>
                <div><strong>GST Number: </strong>{{ $data->gst_number }} </div>
            <?php  } ?>
          <?php  } else if ($data->created_to == 2) { ?>
            <div><strong>Contact Name: </strong>{{ $user->first_name  }} {{ $user->last_name }}</div>
            <div><strong>Franchise Name: </strong>{{ $franchise_branch->franchise_name }}</div>
            <?php if ($data->address) { ?>
            <div><strong>Address: </strong> {{ $data->address }} </div>
            <?php } ?>
            <?php if ($data->phone) { ?>
            <div><strong>Registered Mobile: </strong>  {{ $data->phone }}</div>
            <?php } ?>
          <?php  } else if ($data->created_to == 1) { ?>
            <div><strong>Owner Name: </strong>{{ $user->first_name }} {{ $user->last_name }}</div>
            <div><strong>Branch Name: </strong>{{ $franchise_branch->branch_name }}</div>
            <?php if ($data->address) { ?>
            <div><strong>Address: </strong> {{ $data->address }} </div>
            <?php } ?>
            <?php if ($data->phone) { ?>
            <div><strong>Registered Mobile: </strong>  {{ $data->phone }}</div>
            <?php } ?>
          <?php  } else { ?>
            <div><strong>Name: </strong>{{ $data->name }}</div>
            <?php if ($data->address) { ?>
            <div><strong>Address: </strong> {{ $data->address }} </div>
            <?php } ?>
            <?php if ($data->phone) { ?>
            <div><strong>Registered Mobile: </strong>  {{ $data->phone }}</div>
            <?php } ?>
            <?php  if ($data->gst_number) { ?>
                <div><strong>GST Number: </strong>{{ $data->gst_number }} </div>
            <?php  } ?>
          <?php  } ?>
        </div></td>
        <td>
            <div>
                <table>
                <?php if ($data->created_to == 3) { ?>
                <tr><td>Customer No</td><td>{{ $data->po_number }}</td></tr>
                <?php } ?>
                <tr><td>User Name</td><td>{{ $data->name }}</td></tr>
                <tr><td>Order No</td><td>{{ $data->po_number }}</td></tr>
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
        <?php if ($data->created_to == 3) { ?>
        <td>
        <?php
        if ($data->package != "") {
            if (strpos($data->package, '@') !== false) {
              $packages = explode("@", $data->package);
              if ($packages) {
                foreach ($packages as $key => $packagevalue) {
                  $selected = explode("|", $packagevalue);
                  for ( $i = 0; $i < count($selected); $i++) {
                    if ($i == 0) {
                      echo "<strong>".ucfirst(str_replace("_", " ", $selected[$i])) ."</strong></br>";
                    }
                    else {
                      echo $selected[$i] . '</br>';
                    }
                  }
                }
              }
            } else {
              echo $data->package;
            }
          } ?>
          <?php       echo  $data->sub_package != "" ? " (".$data->sub_package.")" : ""; ?>
        </td>
        <?php } else { ?>
        <td>{{ $data->payment_type }}</td>
        <?php } ?>
        <td>{{ $data->invoice_type }}</td>
        <td class="right-text"><span>{{ $data->amount }} (+)</span></td>
        <td class="right-text"><span>{{ $data->amount }}</span></td>
      </tr>
        <?php if ($data->gst_amount) { ?>
       <tr>
        <td colspan="3" class="right-text"><strong>CGST @ {{ $data->cgst_value }}% on {{ $data->amount }} (+)</strong></td>
        <td class="right-text"><span>{{ $data->cgst_amount }}</span></td>
      </tr>
      <tr>
        <td colspan="3" class="right-text"><strong>SGST @ {{ $data->sgst_value }}% on {{ $data->amount }} (+)</strong></td>
        <td class="right-text"><span>{{ $data->sgst_amount }}</span></td>
      </tr>
      <!-- <tr>
        <td colspan="3" class="right-text"><strong>GST @ {{ $data->gst_value }}% on {{ $data->amount }} (+)</strong></td>
        <td class="right-text"><span>{{ $data->gst_amount }}</span></td>
      </tr> -->
      <?php } ?>
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
        <td class="right-text"><span>{{ $data->paid_through }}</span></td>
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
