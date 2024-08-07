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
	   @include('technical.topmenu')
	<div class="card-header py-2">
	  <div class="float-left"><h3 class="m-0 font-weight-bold text-primary">DPD</h3></div>
	  
	</div>
	
	
	<div class="card-body" style="padding:5px;">
	      @if(Session::has('InvalidLogin'))
        <div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ Session::get('InvalidLogin') }}
            @php
                Session::forget('InvalidLogin');
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
      
@if(Session::has('deletedata'))        
<script>
$(function() {
   
$('#loginModal').modal('show');
});
</script>

      
@endif
	  <table class="table table-bordered">
	  <tr class="table-warning">
		<th>Actions</th>
		<th>City</th>
		<th>Distributor</th>
		<th>Branch</th>
		<th>Franchise</th>
		<th>Fiber Name</th>
		<th>DPD</th>
		<th>Created Date</th>
	  </tr
	  <?php
	    $user = Auth::user();
              $roles = $user->getRoleNames();
              if($roles[0]='superadmin' || $roles[0]=='Area Tech Incharge')
              {
                  ?>
	@foreach ($data as $datarow)
	
        <tr>
          <td align="center"><div class="btn-group">

          <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
          @canany([
            "edit-dpd",
            "delete-dpd"
          ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-dpd")
              <li><a class="dropdown-item" href="{{url('admin/dpd/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-dpd")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/dpd/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
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
		<td>{{ $datarow->city_name }}</td>
		<td>{{ $datarow->distributor_name }}</td>
		<td>{{ $datarow->branch_name }}</td>
		<td>{{ $datarow->franchise_name }}</td>
		<td>{{ $datarow->fiber_name }}</td>
		<td>@can("edit-dpd")<a href="{{url('admin/dpd/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a> @endcan {{ $datarow->id }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
    
     <?php } else {  	$user_id = Auth::user()->id; 
    $data1=array();
    ?>
    			
  @php $data1 = DB::table('slj_dpd')->where('user_id', $user_id)->get(); @endphp
    	@foreach ($data1 as $datarow)
	
        <tr>
          <td align="center"><div class="btn-group">

          <button class="btn btn-primary btn-sm btn-demo-space py-0" data-toggle="dropdown"><i class="fas fa-bars"></i></button>
          @canany([
            "edit-dpd",
            "delete-dpd"
          ])
          <ul class="dropdown-menu dropdown-default" role="menu">
            @can("edit-dpd")
              <li><a class="dropdown-item" href="{{url('admin/dpd/edit/'.$datarow->id)}}"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Edit</a></li>
            @endcan
            @can("delete-dpd")
              <li class="divider"><hr class="py-0 my-0 mb-4"></li>
              <li><a class="dropdown-item" href="{{url('admin/dpd/delete/'.$datarow->id)}}" title='delete' onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> </li>
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
	

            @php $user = DB::table('slj_cities')->where('id', $datarow->city)->first(); @endphp
            	<td>{{ $user->name }}</td>

  @php $user = DB::table('slj_distributors')->where('id', $datarow->distributor)->first(); @endphp
		<td>{{ $user->distributor_name }}</td>
		  @php $user = DB::table('slj_branches')->where('id', $datarow->branch)->first(); @endphp
		<td>{{ $user->branch_name }}</td>
	  @php $user = DB::table('slj_franchises')->where('id', $datarow->franchise)->first(); @endphp		
		<td>{{ $user->franchise_name }}</td>
			  @php $user = DB::table('slj_fiber_laying')->where('id', $datarow->fiber)->first(); @endphp		
		<td>{{ $user->fiber_name }}</td>
		<td>@can("edit-dpd")<a href="{{url('admin/dpd/edit/'.$datarow->id)}}" title='edit'><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a> @endcan {{ $datarow->id }}</td>
		<td>{{ date("d-M-Y h:i a",strtotime($datarow->created_at)) }}</td>
		</tr>
    @endforeach
        
    <?php } ?>
	</table>
{{ $data->links() }}
	</div>
  </div>
	
		  
@stop
