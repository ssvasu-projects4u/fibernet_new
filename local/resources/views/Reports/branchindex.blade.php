@extends('layouts.branch')

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	   <!--@include('inventory::topmenu')-->
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Branch Deposits</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;">
	  @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('error') }}
            @php
                Session::forget('error');
            @endphp
        </div>

        @endif
        
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>

        @endif
        <?php
          $user_id = Auth::user()->id;
                   ?>
	  <table class="table table-bordered table-compact">
	  <tr class="table-warning">
	    <th>Sr.No</th>
		<th>Status</th>
			<th>Trans-ID</th>
					<th>Trans_Date</th>
						<th>Payment Mode</th>
							<th>Online PaymentTrans-ID</th>
		<th>Amount</th>
		<th>Balance</th>
		<th>Date Added</th>
		<th>End Time</th>
		<th>Duration</th>
		<th>Bank Trans-ID</th>
	    <th>Bank Name</th>
		
		<th>Merchant Trans-ID</th>
	
	
	  </tr>
  <?php $sno=1; $i=1; ?>
	@foreach ($data as $datarow)
	
        <tr>
		<td>{{ $sno }}</td>
		<td>{{ $datarow->status }}</td>
		<td>{{ $datarow->manual_transid}}</td>
		<td>{{ $datarow->created_at ? date("d-M-Y  h:i:s",strtotime($datarow->created_at)) : '-' }}</td>
		<td>{{ $datarow->deposit_type }}</td>
		<td>@if($datarow->payment_mode!="Cash")
		{{	$datarow->txnid }}
		@endif</td>
		<td>{{ $datarow->deposit_amount }}</td>
		<td>
		    <?php
		    $j=1;
		    $tottaxamount=0;
		    ?>
                @foreach($data as $datarow5)
                    <?php
                      if($j>=$i)
                      {
                       $tottaxamount=$tottaxamount+$datarow5->deposit_amount;
                       
                      }
                       $j++;
                    ?>
                @endforeach
                
             @if($datarow->status=="success")
                {{ $tottaxamount}}
                
                @endif
           
		    
		</td>
		<td></td>
	    <td></td>
	    <td></td>
		<td></td>
		<td></td>
		<td></td>
			<td></td>
	
	
	
		</tr>
		<?php $sno++;$i++; ?>
    @endforeach
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
