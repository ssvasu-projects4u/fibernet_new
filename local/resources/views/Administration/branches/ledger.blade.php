@extends('layouts.admin')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Ledger</h3></div>
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

        <th>Transaction-ID</th>
        <th>Transaction Reason</th>
        <th>Remarks</th>
        <th>Transaction Date</th>
        <th>UserName</th>        
        <th>Credit</th>
        <th>Debit</th>
       <th>Balance</th>
        <th>Notes</th>
    
       

	  </tr>
	  </thead>
  <tbody>
      <?php $tottaxamount=0; ?>
      	@foreach ($data as $datarow1)
      	
	<?php $totcredit=$datarow1->credited_balance;
	$creditbal=$totcredit;
//	$tottaxamount=$tottaxamount+$datarow1->amount;
	$i=1;
	?>
	@endforeach
	<?php
	
	
//	$totcredit=$totcredit+$tottaxamount;
    $rowcount=count($data);
    
	?>
	
    
	@foreach ($data as $datarow)
        <tr>
          
		<td>{{ $datarow->txnid ? ucfirst($datarow->txnid) : '' }}</td>
		<td>{{ $datarow->payment_type ? $datarow->payment_type : '-' }}</td>
				<td></td>
				

		<td>{{ $datarow->created_at ? date("d-M-Y  h:i:s",strtotime($datarow->transdate)) : '-' }}</td>
		<td>{{ $datarow->email ? $datarow->email : '-' }}</td>
			<td>{{ $datarow->amount ? $datarow->amount : '-' }}</td>
		
		<td>{{ $datarow->debited_balance ? ucfirst($datarow->debited_balance)  : '-' }}</td>
		<td>
		    <?php
		    $j=1;
		    ?>
                @foreach($data as $datarow5)
                    <?php
                      if($j>=$i)
                      {
                       $tottaxamount=$tottaxamount+$datarow5->amount;
                       
                      }
                       $j++;
                    ?>
                @endforeach
                
                
           
        
	            {{ $creditbal+$tottaxamount }}
			</td>
		<td></td>
    
	

    
		</tr>
		<?php $tottaxamount=0;
		$i++; ?>
    @endforeach
	</tbody>
	</table>

	
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
