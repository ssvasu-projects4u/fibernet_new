<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Artisan;
use Illuminate\Http\Request;
use Session;
use Mail;


class MailController extends Controller 
{
   public function Emailverify($email) 
   {
      $data = array('name'=>"Virat Gandhi");
      
 }
    
}
 ?>