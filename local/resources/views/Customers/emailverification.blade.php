<html>
    <body>
        
 <!--
 {!! Form::open(['route' =>['customers.emailfinalconfirm'],'method'=>'get','id'=>'create_form1'])!!}
        @csrf
        !! -->
        <form action="https://dashboard.sljfibernetworks.com/emailtemp.php" method="get" id="creat_form1">
       
<h3>SLJ FiberNetworks Email Verification Mail</h3>
Please <b> Accept Terms & Conditions</b>, on Button Click: 
<input type="hidden" value="{{ $details['token'] }}" name="token" id="token">
<input type="submit" name="confirmmail" id="confirmmail" value="For Accept Click Here">
</form>
<!--
{!! Form::close() !!} 
-->

</body>

</html>