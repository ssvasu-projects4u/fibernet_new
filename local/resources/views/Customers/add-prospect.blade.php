<?php 
    $user = Auth::user();
  
    $roles = $user->getRoleNames(); 
    //echo $roles[0];exit;
    $layout='layouts.admin';
    if($roles[0]=='branch' || $roles[0]=='franchise'){
        //echo $roles[0];exit;
        $layout='layouts.'.$roles[0];    
    }
 ?>
@extends($layout)

@section('content')
    <!-- Page Heading -->
    <div class="card shadow mb-4">
	<!--  @include('customers.topmenu') -->
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Prospect </h3></div>
	  
	</div>
	
	
	<div class="card-body">
	  @if(Session::has('success'))
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		@endif
		
		@if($errors->any())
	  <div class="alert alert-danger"> 
	  @foreach($errors->all() as $error)
		<p>{{ $error }}</p>
		@endforeach </div>
	  @endif
	  
	    {!! Form::open(['route' =>['customers.storeproespect'],'id'=>'submit5','method'=>'post'])!!}
	    
	      @csrf
					<h5 class="bg-primary text-white px-2 pt-1 pb-1">Basic Information</h5>
					<div class="row">
					    		<div class="form-group col-md-6"> {!! Form::label('usage', 'Usage Connection *') !!}
					    		<input type="checkbox" data-id="div1" class="my_features" style="margin-left:30px"  >   Internet
					    		<input type="hidden" value="" style="">
					    		<input type="checkbox" data-id="div2"  style="margin-left:30px" class="my_features" > Cable
					    		
					    		    
					    		    </div>
					 	</div>
					<div class="row">
					    
					<div class="form-group col-md-6"> {!! Form::label('name', 'Name *') !!}
	        {!! Form::text('name',null, array('class' => 'form-control','placeholder'=>'Enter Landmark')) !!} </div>
	        <div class="form-group col-md-3"> {!! Form::label('mob', 'Contact Number *') !!}
	        {!! Form::text('mob',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Contact Number')) !!} </div>
		</div>	
		<div class="row">
					    
		<div class="form-group col-md-6"> {!! Form::label('address', 'Address') !!}
	     {!! Form::textarea('address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Address')) !!} </div>
		     <div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
		     <?php
		      $roles = $user->getRoleNames(); 
       ?>
            	
           @php 
           $id = Auth::user()->id;
           $branchdet = DB::table('slj_branches')->select('branch_name')->pluck('branch_name','branch_name');
            @endphp     
              {!! Form::select('branch',$branchdet,null, array('class' => 'form-control')) !!} 
	      
	     
	        
	        </div>
	        
		</div>	
					
					<div class="row">
					     <div class="form-group col-md-3" id="div1" class="toggleDiv"> {!! Form::label('interusage', 'Internet Usage ') !!}
				        {!! Form::select('interusage',$internets,null, array('class' => 'form-control','placeholder'=>'Select Usage Company')) !!} </div>
	                    
	                    <div class="form-group col-md-3" id="div2" class="toggleDiv"> {!! Form::label('cabusage', 'Cable Usage ') !!}
				        {!! Form::select('cabusage',$cables,null, array('class' => 'form-control','placeholder'=>'Select Usage Company')) !!} </div>
                    
				
					    <div class="form-group col-md-3"> {!! Form::label('status', 'Status *') !!}
                        
                        	<?php $statusvalues = [
				"Willing" => "Willing",
				"Followup" => "Followup"
			]; ?>
		
				        {!! Form::select('status',$statusvalues,null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Status')) !!} </div>

				        
					
					</div>
					
					
					
						

				
		
        
            <input type="submit" value="Submit" name="submit5" id="submit5" class="btn btn-success">
        
        	{!! Form::close() !!} 
	</div>
  </div>
<div>
  

  
@stop
<style>
    .toggleDiv { display:none}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
 $(function() {
  $('.my_features').on("change",function() { 
    $(`#${this.dataset.id}`).toggle(this.checked);
 }).change(); // trigger the change
});

</script>
 <script type="text/javascript">
jQuery(document).ready(function($) {
  $('.my_features').click(function(){
    var checkbox = $(this);
    
    //you can use data() method to get data-* attributes
    var name = checkbox.data('name');
    
        if(name.length>0 ) {  
        
        if(name=="interusage")
{
      $('#interusage').show();
      $('#cabusage').hide();
      
}
      
        if(name=="cabusage")
{
      $('#interusage').hide();
      $('#cabusage').show();
      
}
  if(name=="interusage" && name=="cabusage")
{
      $('#interusage').show();
      $('#cabusage').show();
      
}
    }          
  });
});
//just setup change and each to use the same function
</script>
