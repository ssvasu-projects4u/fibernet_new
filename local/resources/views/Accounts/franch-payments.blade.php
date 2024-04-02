@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Franch Payments</h3></div>
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
         <th>Sr.No</th>
        <th>Franch_ID</th>
        <th>Status</th>
        <th>Franchise_Name</th>
        <th>Trans_ID</th>
        <th>Trans_Date</th>
        <th>Payment Mode</th> 
        <th>Payment Type</th>        
        <th>Online PaymentTrans-ID</th>
        <th>Amount</th>
        <th>Balance</th>
        <th>Date Added</th>
        <th>End-Time</th>
        <th>Duration</th>
        <th>Bank Trans-ID</th>
        <th>Bank Name</th>
        <th>Merchant Trans-ID</th>
     
	  </tr>
	  </thead>
 <tbody>
   @php $sno = ($data->currentpage()-1)* $data->perpage() + 1;@endphp 
 
	@foreach ($data as $datarow)
        <tr>
          <td>{{ $sno }}</td>
		<td>{{ $datarow->franchise_branch_id ? $datarow->franchise_branch_id : '-' }}</td>
		<td>{{ $datarow->status }}</td>
		<td>{{ $datarow->name ? $datarow->name : '-' }}</td>
		<td>{{ $datarow->manual_transid}}</td>
		<td>{{ $datarow->created_at ? date("d-M-Y  h:i:s",strtotime($datarow->created_at)) : '-' }}</td>
  	
		<td>
		    {{ $datarow->payment_mode }}
		    
		    </td>
		<td>{{ $datarow->payment_type }}</td>
		<td>
		    	@if($datarow->payment_mode!="Cash")
		{{	$datarow->txnid }}
		@endif
		</td>
	    <td>{{ $datarow->deposit_amount ? $datarow->deposit_amount : '-' }}</td>
	 <td>
	     		    <?php
	     		    $bname=$datarow->name;
		    $j=1;
		    $tottaxamount=0;
		    
                foreach($data as $datarow5)
                    {
                        
                      if($j>=$sno && $bname==$datarow5->name)
                      {
                       $tottaxamount=$tottaxamount+$datarow5->deposit_amount;
                       
                      }
                       $j++;
                    }
                    ?>
                    
                @if($datarow->status=="success")
                {{ $tottaxamount}}
                
                @endif
	     

	 </td>
	
	<Td></Td>
	<Td></Td>
	<Td></Td>
	<Td></Td>
	<Td></Td>
	<Td></Td>


    
		</tr>
		<?php $sno++; ?>
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
