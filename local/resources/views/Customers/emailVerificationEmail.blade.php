<html>
    <body>
        {!! Form::open(['route' =>['customers.emailconfirm'],'method'=>'put','id'=>'create_form1'])!!}
        @csrf
    


<h3>SLJ FiberNetworks Email Verification Mail</h3>
  <input type="hidden" value="{{ $details['token'] }}" name="token" id="token">
Please verify your email on Button Click: 
<input type="submit" name="verifysub" id="verifysub" value="Verify Email
">


{!! Form::close() !!} 
</body>

</html>