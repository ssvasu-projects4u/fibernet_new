    <?php 
    
    $user = Auth::user();
    $roles = $user->getRoleNames(); 
    //echo $roles[0];//exit;
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
     <!--  @include('customers.topmenu1') -->

	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">Not-Intrested List</h3></div>
	  
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
	  <table class="table table-bordered">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>Customer Name</th>
		<th>Mobile</th>
		<th>Branch</th>
		<th>Required Connection </th>
	 
	 <th>Next Followup Date & Time</th>
	 <th>Status</th>
	 
	  </tr>
	
    <?php 	$user_id = Auth::user()->id; 
    $data1=array();
    ?>
    			
  @php $data1 = DB::table('prospect')->where('status','Not-Intrested')->OrderBy('status','desc')->get(); @endphp
    	@foreach ($data1 as $datarow)
        <tr>
		<td align="center"><div class="btn-group">
        <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>

          @canany([
            "edit-fh",
            "delete-fh"
          ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("delete-fh")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/customers/notintrested/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
               @php $no=$datarow->id;@endphp
            @endcan
          </ul>
          @endcanany
      </div>
		</td>
			  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal">{{ __('Login') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="post" id="login" action="{{url('admin/dpd/login/'.$datarow->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input type="hidden" name="usertype" value="common">
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" id="login-button" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
 

            	<td><a id="kk" data-href="{{ $datarow->id }}" class="edit-data"  data-toggle="modal" data-target="#modalRegister" href="">{{ $datarow->name }}</a></td>

 		<td>{{ $datarow->mob }}</td>
 			<td>{{ $datarow->branch }}</td>
		<td>
		       {{ $datarow->service }}
		   
		    </td>
	<td>
	<?php
	    if($datarow->followtime!='')
	    {
	        $dt=date('d-m-Y', strtotime($datarow->followdt));
	        ?>
	    {{ $dt }} {{ $datarow->followtime }}
	    <?php } ?>
	   </td>
	<td>

	 </td>
			</tr>
    @endforeach
	</table>

    
 	</table>

	</div>
  </div>
  
  <style>
.modal {
    text-align: center;
    padding: 0 !important;
}
.modal:before {
    content: '';
    display: inline-block;
    height: 100%;
    vertical-align: middle;
    margin-right: -4px;
}
.modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
    max-width:70%;
}
  </style>
  <script>
  $(document).ready(function(){  
       $('.edit-data').on('click',function(event){
           
       event.preventDefault();
           var customer_id = $(this).attr("data-href");  
          // alert(customer_id);
          
            $.ajax({
                url: "{{url('/admin/customers/followupdata/fetch-data')}}/"+customer_id,
                type: "GET",
                                              cache: false,                         
                success:function(data) {
                $('#cname').val(data.name);
                $('#customerid').val(data.id);
                $('#mob').val(data.mob);
                $('#address').val(data.address);
                   $('#branch').html('');  
        var options = '';  
        for (var i = 0; i < 1; i++) {  
            options += '<option value="' + data.branch + '">' + data.branch + '</option>';  
        }  
                $('#branch').append(options);
                   $('#interusage').html('');  
        var options = '';  
        for (var i = 0; i < 1; i++) {  
            options += '<option value="' + data.intercompany + '">' + data.intercompany + '</option>';  
        }  
                $('#interusage').append(options);
                
                 $('#cableusage').html('');  
        var options = '';  
        for (var i = 0; i < 1; i++) {  
            options += '<option value="' + data.cablecompany + '">' + data.cablecompany + '</option>';  
        }  
                $('#cableusage').append(options);
                
                 $('#status').html('');  
        var options = '';  
        for (var i = 0; i < 1; i++) {  
            if(data.status=="Willing")
            {
                data.status="Intrested"
            options += '<option value="' + data.status + '">' + data.status + '</option>';
            options += '<option value="Not-Intrested">Not-Intrested</option>';  
            options += '<option value="Followup">Followup</option>';  
            
            }
            if(data.status=="Followup")
            {
            options += '<option value="' + data.status + '">' + data.status + '</option>';
            options += '<option value="Intrested">Intrested</option>';  
            options += '<option value="Not-Intrested">Not-Intrested</option>';  
            
            }
            if(data.status=="Not-Intrested")
            
            {
            options += '<option value="' + data.status + '">' + data.status + '</option>'; 
            options += '<option value="Intrested">Intrested</option>';  
            options += '<option value="Followup">Followup</option>';  
            
            
            }
            
            
        }  
                $('#status').append(options);
                
                
                
               
                
                              $('#modalRegister').modal({'show' : true});
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                     
            
                    alert(errorThrown);
                }
            });
      });
  });
     </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      
<div id="modalRegister" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header"><h3>Followup Status</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align-last: center"></h4>
            </div>
            <div class="modal-body">
         {!! Form::open(['route' =>['customers.updateintresteddata'],'id'=>'submit8','method'=>'post'])!!}
	   	<div class="row">
					    
					<div class="form-group col-md-6"> {!! Form::label('name', 'Name *') !!}
					<input type="text" name="cname" class="form-control" id="cname">
	         </div>
	        <div class="form-group col-md-3"> {!! Form::label('mob', 'Contact Number *') !!}
	        {!! Form::text('mob',null, array('class' => 'form-control','required'=>'required','placeholder'=>'Enter Contact Number')) !!} </div>
		</div>	
		<div class="row">
					    
		<div class="form-group col-md-6"> {!! Form::label('address', 'Address') !!}
	     {!! Form::textarea('address',null, array('class' => 'form-control','rows'=>2,'required'=>'required','placeholder'=>'Enter Address')) !!} </div>
		     <div class="form-group col-md-3"> {!! Form::label('branch', 'Branch') !!}
		 
            	
           @php 
           $id = Auth::user()->id;
           $branchdet = DB::table('slj_branches')->select('branch_name')->pluck('branch_name','branch_name');
            @endphp     
              {!! Form::select('branch',$branchdet,null, array('class' => 'form-control')) !!} 
	      
	     
	     
	        
	        </div>
	        
		</div>	
					
					<div class="row">
					    <input type="hidden" id="customerid" name="customerid">
					     <div class="form-group col-md-3" id="div1" class="toggleDiv"> {!! Form::label('interusage', 'Internet Usage ') !!}
				        {!! Form::select('interusage',[],null, array('class' => 'form-control','placeholder'=>'Select Usage Company')) !!} </div>
	                    
	                    <div class="form-group col-md-3" id="div2" class="toggleDiv"> {!! Form::label('cabusage', 'Cable Usage ') !!}
				        {!! Form::select('cabusage',[],null, array('class' => 'form-control','placeholder'=>'Select Usage Company')) !!} </div>
                    
				
					    <div class="form-group col-md-3"> {!! Form::label('status', 'Status *') !!}
                        
                        	<?php $statusvalues = [
				"Willing" => "Willing",
				"Followup" => "Followup"
			]; ?>
		
				        {!! Form::select('status',$statusvalues,null, array('class' => 'form-control','required'=>'required','placeholder'=>'Select Status')) !!} </div>

				           <div class="form-group col-md-3"> {!! Form::label('mob', 'Date') !!}
	        {!! Form::date('caldate',null, array('class' => 'form-control')) !!} </div>
		   <div class="form-group col-md-3"> {!! Form::label('Time', 'Time') !!}
	        {!! Form::time('caltime',null, array('class' => 'form-control')) !!} </div>
		
					
					</div>
					
					
					
						

				
		
        
            <input type="submit" value="Submit" name="submit8" id="submit8" class="btn btn-success">
        
        
	   {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@stop
