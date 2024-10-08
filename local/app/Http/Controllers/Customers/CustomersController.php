<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Artisan;
use Illuminate\Support\Facades\Input;
use App\Sms;
use Session;
use Mail;
use App\Invoices;
use Carbon\Carbon;
use Log;
use Breadcrumbs;
use \stdClass;
use App\Mail\MyTestMail;
use App\Mail\SljFiberMail;
use DB;
use vendor\swiftmailer;
use Illuminate\Support\Str;
use App\Mail\DurgaConfirm;
use App\Mail\PaymentEmail;
use App\Mail\PayChequeEmail;
use App\Mail\ActiveEmail;
use App\Mail\TermsandConditions;
use App\Mail\PaymentOnlineEmail;
use App\Mail\PaymentOnlineFailEmail;
use App\Mail\PickupDevice;



class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
         $id = Auth::user()->id;
$user = Auth::user();
        $id = Auth::user()->id;
          $no=1;
       $roles = $user->getRoleNames(); 
        if($roles[0]=='superadmin')
        {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->orderBy('slj_customers.id')
                ->paginate(20);
        }
        else
        {
              $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('eid',$id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        }

        return view('customers.index',['data'=>$data]);
    }
    public function RequestDisconnect()
    {
        $kk="disconnect";
         $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status',$kk)
               // ->whereDate('expiry_date', '>', Carbon::now()) // added by durga
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('customers.reqdiscon',['data'=>$data]);
    }
    public function CompetatorIndex()
    {
        
         return view('customers.competatorlist');
    }
    public function updateintresteddata(Request $request)
    {
        
    }
    public function updatefollowuplist(Request $request,$id)
    {
        
    }
     public function GetFollowupdata($customer_id)
    {
        $row=\App\Prospect::where('id',$customer_id)->first();
        
        return $row;
        
    }
    public function setnotintrested($id)
    {
        $cusid = \App\Prospect::find($id);
        $input=array();
        $input['status']="Not-Intrested";
        $cusid->update($input);
         return redirect('admin/customers/followup')->with('success', 'Followup  was Updated successfully.');

        
    }
    public function setintrested($id)
    {
        //\App\Prospect::where('id',$customer_id)->first();
         $cusid = \App\Prospect::find($id);
        $input=array();
        $input['status']="Intrested";
        $cusid->update($input);
         return redirect('admin/customers/followup')->with('success', 'Followup  was Updated successfully.');

        
    }
         public function updatefollowmdata(Request $request)
         
    {
        $input=array();
        $status=$request['status'];
        $id=$request['customerid'];
           $cusid = \App\Prospect::find($id);
           
        
        if($status=="Followup")
        {
            $input['followdt']=$request['caldate'];
            $input['followtime']=$request['caltime'];
                 $input['service']=$request['service'];
       
            $cusid->update($input);            
            
        }
        if($status=="Intrested")
        {
            $input['status']=$status;
            $input['followdt']=$request['caldate'];
                $input['followtime']=$request['caltime'];
            $input['active']='N';
            $input['service']=$request['service'];
            $cusid->update($input);            
            
            
        }
        if($status=="Not-Intrested")
        {
            $input['status']=$status;
             $input['active']='N';
           
           
            $cusid->update($input);            
            
        }
        
        
        return redirect('admin/customers/followup')->with('success', 'Followup  was Updated successfully.');

        
    }
    public function intrestedindex()
    {
        return view('customers.intrestedlist');
    }
    public function notintrestedindex()
    {
         return view('customers.not-intrestedlist');

    }
     public function FollowupIndex()
    {
        
         return view('customers.followuplist');
    }
  public function AddProspect()
    {
                $id = \Auth::user()->id;
       $internets = \App\Competator::select('name')->where('status','Y')->where('conectiontype','Internet')->pluck('name','name');
	$cables = \App\Competator::select('name')->where('status','Y')->where('conectiontype','Cable')->pluck('name','name');
		
		$user = Auth::user();
        $id = Auth::user()->id;
          $no=1;
       $roles = $user->getRoleNames(); 
             $data = \App\Employees::select('branch')
                            ->where('user_id',$id);
               
    
         return view('customers.add-prospect',['internets'=>$internets,'cables'=>$cables,'data'=>'$data']);
    }
    public function acceptedterms()
    {
         return view('customers.acceptedtermsconditions');

    }
    public function AddCompetator()
    {
        
         return view('customers.add-competator');
    }
    public function emailstore(Request $request)
    {
        $input = array();
        $custid = \App\Customers::orderBy('id', 'desc')->first(); // gets the whole row
        $custmaxid = $custid->id;
        $custmaxid=$custmaxid+1;
         $custmail=$request['customemail'];
          
        $input['cust_id']=$custmaxid;
        $input['token']=sha1(time());
        $input['email']=$custmail;
        $input['status']=1;
              // $input['token'] = Str::random(64);
  

        \App\EmailVerification::create($input);
            
             $details = [
        'title' => 'Test for Email',
        'body' => 'This is for testing email using smtp',
        'custmemail' => $custmail,
        'token'=>$input['token']
        
    ];
   
 // Mail::to($custmail)->send(new \App\Mail\DurgaConfirm($details));
   

    /*
        Mail::send('emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->customemail);
              $message->subject('SLJ FiberNetworks - Email Verification Mail');
          });
          */
        
    }
    public function TermsVerify($em)
    {
        $k=1;
           $verifyUser = \App\EmailVerification::where('email', $em)->where('status','=',$k)->first();
      
            $details = [
        'title' => 'Mail from SLJ Fiber Networks Pvt.Ltd',
        'body' => 'This is for Terms and Condtions Email',
        'custmemail' => $em
    
        
    ];
    if(empty($verifyUser->chkmail))
    {
            $dp = \App\EmailVerification::where('email', $em)->first();
            $input=array();
            $input['chkemail']=$em;
              $dp->update($input);
                
     
     //Mail::to($em)->send(new \App\Mail\TermsandConditions($details));
    }

    }
    public function verifyAccount(Request $request)
    {
        $input=Array();
        $token=$request['token'];
         $verifyUser = \App\EmailVerification::where('token', $token)->first();
        $em=$verifyUser->email;
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser))
        {
              $input=array();
              
            if($verifyUser->status==null)
            {
            $input['status']=1;
            $input['chkemail']=$em;
                  $verifyUser->update($input);
                  
        
                $message = "Your e-mail is verified. Now you can Proceed.";
                $details = [
        'title' => 'Mail from SLJ Fiber Networks Pvt.Ltd',
        'body' => 'This is for Terms and Condtions Email',
        'custmemail' => $em
    
        
    ];
     Mail::to($em)->send(new \App\Mail\TermsandConditions($details));

                
            } else {
                $message = "Your e-mail is already verified.";
            }
        }
  
      //return redirect()->route('customers::create')->with('message', $message);
    }
        
    
    public function storecompetator(Request $request)
    {
        $input = array();
        $input['name']=$request['name'];
        $input['conectiontype']=$request['contype'];
        $input['status']='Y';

        \App\Competator::create($input);
         return redirect('admin/customers/competator')->with('success', 'Competator was Added successfully.');

        
    }
    public function addippool()
    {
        $items = \App\City::where('status','Y')->pluck('name', 'id');
		
		return view('customers.ippool',['items'=>$items]);
        
 
    }
    
    public function networktype($id)
    {
        
                
            
        return view('customers.change-network');
        
 
    }
   
    public function addnas()
    {
        $items = \App\City::where('status','Y')->pluck('name', 'id');
		
		return view('customers.newnas',['items'=>$items]);
        
 
    }
     public function ippoolstore(Request $request)
    {
          $validatedData = $request->validate([
            'city' => 'required',
           // 'distributor' => 'required',
			//'subdistributor' => 'required',
            'branch' => 'required',
            'franchise' => 'required',
            'pool_name' => 'required',
            'ip_from' => 'required',
            'ip_to' => 'required'
        
            
        ]);
        $input = request()->all();
        \App\Ippool::create($input);
        
        $employeedata=array();
		  $id = \Auth::user()->id;
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Create Ippool";
     $employeedata['value_of_action']=$input['pool_name'];
     
      \App\Employees_Logs::create($employeedata);
 return redirect('admin/customers/ippool')->with('success', 'IPpool was created successfully.');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function dashboard()
    {
        $id = Auth::user()->id;

        $data = \App\Customers::join('users','users.id', '=', 'slj_customers.user_id')
            ->select('users.first_name','users.last_name','users.email','users.mobile','slj_customers.*','slj_customers.id as customerid')
            ->where('users.id',$id)
            ->first();

		$connection_type = $data->connection_type;
        $package = $data->package;
        $subpackage = $data->sub_package;

        $package_details = array();
        $subpackage_details = array();

        if($data->connection_type == "cable"){
            $package_details = \App\CablePackages::select('slj_cable_packages.*')
            ->where('id',$package)
            ->first();
        }else if($data->connection_type == "broadband"){
            $package_details = \App\BroadbandPackages::where('id',$package)->first();
            $subpackage_details = \App\BroadbandSubPackages::where('id',$subpackage)->first();
        }else{
            $package_details = \App\BroadbandPackages::where('id',$package)->first();
            $subpackage_details = \App\BroadbandSubPackages::where('id',$subpackage)->first();
        }

        return view('customers.dashboard',['data'=>$data,'package_details'=>$package_details,'subpackage_details'=>$subpackage_details]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function profile()
    {
        $id = Auth::user()->id;
        //if($id <=0){return redirect('/');}

        $userdetails = \App\User::find($id);

        return view('customers.profile',['userdetails'=>$userdetails]);
    }
     public function GetModels($manufacturer)
    {
        $user = Auth::user();
        $id = Auth::user()->id;
          $no=1;
       $roles = $user->getRoleNames(); 
        if($roles[0]=='superadmin')
       
      	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->whereNull('current_user_id')->where('status','available')->get()->unique('identification');
      	if($roles[0]=='distributor')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('distributor_status','available')->get()->unique('identification');
      if($roles[0]=='branch')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('branch_status','available')->get()->unique('identification');
      
        if($roles[0]=='franchise')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('franchise_status','available')->get()->unique('identification');
      
     	else
     	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('employee_status','available')->get()->unique('identification');

        $html = "<option value=''>-- Select Model Number --</option>";
        foreach($submodels as $sb)
        {
           
           $html.="<option value='".$sb->identification."'>".$sb->identification."</option>";
        }

        return $html;
    }
    public function GetSTBModels($manufacturer)
    {
        $user = Auth::user();
        $id = Auth::user()->id;
          $no=1;
       $roles = $user->getRoleNames(); 
        if($roles[0]=='superadmin')
       
      	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->whereNull('current_user_id')->where('status','available')->get()->unique('identification');
      	if($roles[0]=='distributor')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('branch_status','available')->get()->unique('identification');
      
      	if($roles[0]=='branch')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('branch_status','available')->get()->unique('identification');
      if($roles[0]=='distributor')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('branch_status','available')->get()->unique('identification');
      
        if($roles[0]=='franchise')
       	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('franchise_status','available')->get()->unique('identification');
      
     	else
     	$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('employee_status','available')->get()->unique('identification');

        $html = "<option value=''>-- Select Model Number --</option>";
        foreach($submodels as $sb)
        {
           
           $html.="<option value='".$sb->identification."'>".$sb->identification."</option>";
        }

        return $html;
    }
      public function GetSerialNumber($stb_model)
    {
        $id = Auth::user()->id;
       $user = Auth::user();
      
          $no=1;
       $roles = $user->getRoleNames(); 
        if($roles[0]=='superadmin')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->whereNull('current_user_id')->where('status','available')->get();
       	if($roles[0]=='distributor')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->where('current_user_id',$id)->where('distributor_status','available')->get();
      
       	if($roles[0]=='branch')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->where('current_user_id',$id)->where('branch_status','available')->get();
      
       	 if($roles[0]=='franchise')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->where('current_user_id',$id)->where('franchise_status','available')->get();
      
     	else
     	$submodels = \App\StockProducts::where('identification',$stb_model)->where('current_user_id',$id)->where('employee_status','available')->get();

        $html = "<option value=''>-- Select Model Number --</option>";
        foreach($submodels as $sb)
        {
           
           $html.="<option value='".$sb->serial_no."'>".$sb->serial_no."</option>";
        }

        return $html;
    }

  public function GetSTBSerialNumber($stb_model)
    {
        $id = Auth::user()->id;
       $user = Auth::user();
      
          $no=1;
       $roles = $user->getRoleNames(); 
        if($roles[0]=='superadmin')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->whereNull('current_user_id')->where('status','available')->get();
       	if($roles[0]=='distributor')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->whereNull('current_user_id')->where('distributor_status','available')->get();
       	
       	if($roles[0]=='branch')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->whereNull('current_user_id')->where('branch_status','available')->get();
       	
       	 if($roles[0]=='franchise')
       	$submodels = \App\StockProducts::where('identification',$stb_model)->where('current_user_id',$id)->where('franchise_status','available')->get();
      
     	else
     	$submodels = \App\StockProducts::where('identification',$stb_model)->where('current_user_id',$id)->where('employee_status','available')->get();

        $html = "<option value=''>-- Select Model Number --</option>";
        foreach($submodels as $sb)
        {
           
           $html.="<option value='".$sb->serial_no."'>".$sb->serial_no."</option>";
        }

        return $html;
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateProfile (Request $request)
    {
        $id = Auth::user()->id;
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $requestdata = $request->all();
        $data['name'] = $requestdata['name'];
        $data['first_name'] = $requestdata['name'];
        $data['email'] = $requestdata['email'];

        //Update details
        $user = \App\User::find($id);
        $user->update($data);
	$employeedata=array();
	
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Update Profile ";
     $employeedata['value_of_action']=$input['name'];
     
      \App\Employees_Logs::create($employeedata);

        return redirect('customer/profile')->with('success', 'Profile details updated successfully.');
    }



	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function paymentHistory()
    {
        $id = Auth::user()->id;
		$customer = \App\Customers::where('user_id',$id)->first();

		$data = \App\Transactions::where('customer_id','=',$customer->id)
                ->orderBy('id')
                ->paginate(20);
        	  $employeedata=array();
	  
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Payment History";
     \App\Employees_Logs::create($employeedata);        
                
        return view('customers.payment-history',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     */
    public function updateChangePassword (Request $request)
    {
        $user_id = Auth::user()->id;
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $requestdata = $request->all();
        //$data['oldpassword'] = $requestdata['oldpassword'];

        //Update details

        $current_password = Auth::User()->password;
        if(Hash::check($requestdata['oldpassword'], $current_password))
        {
            $obj_user = \App\User::find($user_id);
            $obj_user->password = Hash::make($requestdata['password']);
            $obj_user->save();
            return redirect()->back()->with('success', 'Password updated successfully.');
        }
        else
        {
            //return redirect('admin/changepassword')->withErrors('oldpassword.required', 'Failed - Invalid Old Password.');
            return redirect()->back()->with("error","Invalid old password.");
        }


    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function newCustomers()
    {
        $distributors = array();
		 $subdistributors = array();
		$branches = array();
		$franchises = array();

		$cities = \App\City::where('status','Y')->pluck('name', 'id');

		if(isset($_GET['distributor'])){
			$distributors = \App\Distributors::where('id',$_GET['distributor'])->pluck('distributor_name as name', 'id');
		}
			if(isset($_GET['subdistributor'])){
			$subdistributors = \App\SubDistributors::where('id',$_GET['subdistributor'])->pluck('subdistributor_name as name', 'id');
		}
		if(isset($_GET['branch'])){
			$branches = \App\Branches::where('id',$_GET['branch'])->pluck('branch_name as name', 'id');
		}
		if(isset($_GET['franchise'])){
			$franchises = \App\Franchises::where('id',$_GET['franchise'])->pluck('franchise_name as name', 'id');
		}

		$data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','new')
                ->orderBy('slj_customers.id')
                ->paginate(20);


        //return view('customers::new',['data'=>$data,'cities'=>$cities]);

		return view('customers.new', [
			'data' => $data->appends(Input::except('page')),
			'cities'=>$cities,
			'distributors'=>$distributors,
			'subdistributors'=>$subdistributors,
			'branches'=>$branches,
			'franchises'=>$franchises,
		]);


    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function technicalCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                //->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                //->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                //->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                //->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                //->leftJoin('slj_txns','slj_customers.id', '=', 'slj_txns.customer_id')
				->select('slj_customers.*','users.mobile','users.email','users.name')
				->where('slj_customers.current_status','=','technical')
				->orderBy('slj_customers.id')
                ->paginate(15);

        return view('customers.technical',['data'=>$data]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function activationCustomers()
    {
        // echo "ok";die;
         $user = Auth::user();
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
      if($roles[0]=='superadmin')
      {
        
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','activation')
                ->where('slj_customers.smartcard_added_user','=',0)
                ->orderBy('slj_customers.id')
                ->paginate(20);
      }
      else
      {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','activation')
                ->where('slj_customers.smartcard_added_user','=',0)
                ->where('eid',$id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
      }
        return view('customers.activation',['data'=>$data]);
    }

    public function smartboxUsers()
    {
        // echo "ok";die;
         $user = Auth::user();
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
      if($roles[0]=='superadmin')
      {
        
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','activation')
                ->where('slj_customers.smartcard_added_user','=',1)
                ->orderBy('slj_customers.id')
               // ->paginate(20);
               ->get();
      }
      else
      {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','activation')
                ->where('slj_customers.smartcard_added_user','=',1)
                ->where('eid',$id)
                ->orderBy('slj_customers.id')
                //->paginate(20);
                ->get();
      }
        return view('customers.smartbox_users',['data'=>$data]);
    }



	/**
     * Display a listing of the resource.
     * @return Response
     */
     public function updateDisconnect()
     {
         
     }
    public function activeCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
        ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
        ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
        ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
        ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
        ->where('slj_customers.current_status','=','activation')
        ->where('slj_customers.smartcard_added_user','=',2)
        ->orderBy('slj_customers.id')
        ->paginate(20);




        // $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
        //         ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
        //         ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
        //         ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
        //         ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
        //         ->whereIn('slj_customers.current_status',['active','activated'])
        //        // ->whereDate('expiry_date', '>', Carbon::now()) // added by durga
        //         ->orderBy('slj_customers.id')
        //         ->paginate(20);
                
                /*
                   $exipireed_customers = \App\Customers::whereDate('expiry_date', '<', Carbon::now());
                    $customer_data = array();
                    $customer_data['current_status'] = "expired";
                    $exipireed_customers->update($customer_data); //Update details
                    
                */
                    
        return view('customers.active',['data'=>$data]);
    }

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function scheduleCustomers()
    {
          $user = Auth::user();
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
      if($roles[0]=='superadmin')
      {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','scheduled')
                ->orderBy('slj_customers.id')
                ->paginate(20);
      }
      else
      {
 $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','scheduled')
                ->where('eid',$id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
      }
        return view('customers.schedule',['data'=>$data]);
    }


	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function expiredCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','expired')
				->orderBy('slj_customers.id')
                ->paginate(20);
        return view('customers.expired',['data'=>$data]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function closedCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.status','=','closed')
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('customers.closed',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $user = Auth::user();
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
        $franchise_list=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.city';
            $branch = \App\Branches::join('users','users.id', '=', $tbl)->select('slj_branches.id')->where('users.id',$id)->first();
            $franchise_list = \App\Franchises::where('branch',$branch->id)->pluck('franchise_name','id');            
        }

		$cities = \App\City::where('status','Y')->pluck('name', 'id');
		$states = \App\State::where('status','Y')->pluck('name', 'id');
		
		$connection_types = \App\ConnectionType::select('id','title')->pluck('title','id');

/*
		$connectiontypes = \App\ConnectionType::orderBy('title')->get();

		foreach($connectiontypes as $connectiontype){
			$type = strtolower($connectiontype->title);
			$connection_types[$type] = $connectiontype->title;
		}
		*/

		//default type - broadband
		$connectiontypedetails = \App\ConnectionType::where('title','broadband')->first();

        $packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');
		$combopackages = \App\ComboPackages::where('status','Y')->pluck('package_name as name', 'id');

		$cabledata = \App\CablePackages::where('status','Y')->select('package_name as name', 'id','type')->get();

		$cabledatabytype = array();
		foreach($cabledata as $cable){
			$data = array();
			$data['id'] = $cable['id'];
			$data['name'] = $cable['name'];
			$type = $cable['type'];
			$cabledatabytype[$type][] = $data;
		}

		$iptvdata = \App\IptvPackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		$iptvdatabytype = array();
		foreach($iptvdata as $iptv)
		{
			$data = array();
			$data['id'] = $iptv['id'];
			$data['name'] = $iptv['name'];
			$type = $iptv['type'];
			$iptvdatabytype[$type][] = $data;
			
		}

		return view('customers.create',['connectiontypedetails'=>$connectiontypedetails,'states'=>$states,'cities'=>$cities,'franchise_list'=>$franchise_list,'connection_types'=>$connection_types,'packages'=>$packages,'combopackages'=>$combopackages, 'cabledatabytype'=>$cabledatabytype,'iptvdatabytype'=>$iptvdatabytype]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
     public function storeproespect(Request $request)
     {
         $validatedData = $request->validate([
          'name' => 'required',
          'mob' => 'required',
          'status' => 'required',
          'branch' => 'required'
          
        ]);
        $input=array();
        $input['name']=$request['name'];
        $input['mob']=$request['mob'];
         $input['branch']=$request['branch'];
       
        $input['address']=$request['address'];
        $input['intercompany']=$request['interusage'];
        $input['cablecompany']=$request['cabusage'];
        $input['status']=$request['status'];
        $input['active']='Y';
        
       \App\Prospect::create($input);
       
       $employeedata=array();
		  $id = \Auth::user()->id;
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Create Prospect";
     $employeedata['value_of_action']=$request['name'];
     
      \App\Employees_Logs::create($employeedata);

      return redirect('admin/customers/proepsect')->with('success', 'Added Prospect successfully.');

        }
    public function store(Request $request)
    {
        $datav=1;
        $validatedData = $request->validate([
          'email' => 'required|unique:users'              
          
        ]);
        $custid = \App\Customers::orderBy('id', 'desc')->first(); // gets the whole row
        if(!empty($custid->id))
        {
        $custmaxid = $custid->id;
        $custmaxid=$custmaxid+1;
        }
        else
        {
            $custmaxid=1;
        }
        
        $allowedFileExtensions = [
          'jpeg', 'jpg', 'png', 'gif',
        ];
        
        if ($request->hasFile("customer_pic")) {
            $extension = $request->customer_pic->extension();
            if (!in_array($extension , $allowedFileExtensions)) {
                return redirect()->back()->withInput($request->input())
                ->withErrors(['customer_pic' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
            }
        }

        if ($request->hasFile("address_proof")) {
            $extension = $request->address_proof->extension();
            if (!in_array($extension , $allowedFileExtensions)) {
                return redirect()->back()->withInput($request->input())
                ->withErrors(['address_proof' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
            }
        }

        if ($request->hasFile("identity_proof")) {
            $extension = $request->address_proof->extension();
            if (!in_array($extension , $allowedFileExtensions)) {
                return redirect()->back()->withInput($request->input())
                ->withErrors(['identity_proof' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
            }
        }
        $cust_pay=array();
        $input = request()->all();
        

        $user = Auth::user();
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
        $franchise_list=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.city';
            $branch = \App\Branches::join('users','users.id', '=', $tbl)->select('slj_branches.id','slj_branches.city','slj_branches.distributor_id')->where('users.id',$id)->first();
            //$franchise_list = \App\Franchises::where('branch',$branch->id)->pluck('franchise_name','id');
             $input['state']=$branch->state;
			$input['city']=$branch->city;
            $input['distributor']=$branch->distributor_id;
			 $input['subdistributor']=$branch->subdistributor_id;
            $input['branch']=$branch->id;
        }

        if($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id'; 
            $branch = \App\Franchises::join('users','users.id', '=', $tbl)->select('slj_franchises.id','slj_franchises.city','slj_franchises.distributor_id','slj_franchises.branch')->where('users.id',$id)->first();
            $input['state']=$branch->state;
		    $input['city']=$branch->city;
            $input['distributor']=$branch->distributor_id;
			$input['subdistributor']=$branch->subdistributor_id;
            $input['branch']=$branch->branch;
            $input['franchise']=$branch->id;
        }	
        
        
        
             if(isset($input['distributor1']))
             {
           if($roles[0]!='branch' || $roles[0]!='franchise' || $roles[0]!='superadmin')
         {
        $input['distributor']=$input['distributor1'];
        $input['branch'] =$input['branches1'];
        
       $input['franchise'] =$input['franchises1'];
       
       $cust_pay['distributor']=$input['distributor1'];
        $cust_pay['branch'] =$input['branches1'];
        
       $cust_pay['franch'] =$input['franchises1'];
         }
             }
       if($roles[0]=='superadmin')
         {
               $input['distributor']=$input['distributor'];
			    $input['subdistributor']=$input['subdistributor'];
        $input['branch'] =$input['branch'];
        
       $input['franchise'] =$input['franchise'];
         $cust_pay['distributor']=$input['distributor'];
        $cust_pay['branch'] =$input['branch'];
        
       $cust_pay['franch'] =$input['franchise'];
         }
        
        $input['status'] = "N";
        $input['current_status'] = "new";
        $cust_pay['paytype']="new";
		 $cust_pay['state']=$input['state'];
		  
		$input['state']=$input['state'];
       // $input['date_of_birth']=$input['date_of_birth'];
       $input['date_of_birth'] =  date("Y-m-d", strtotime($input['date_of_birth']) );
		
		
//$connection=\App\ConnectionType::where('id',$input['connection_type'])->first();
//$input['connection_type']=$connection->title;
        $user_data = array();
        $user_data['name'] = $input['first_name']." ".$user_data['first_name'] = $input['last_name'];
        $user_data['first_name'] = $input['first_name'];
        $user_data['last_name'] = $input['last_name'];
        $user_data['password'] = "";//Hash::make($input['password']);
        $user_data['email'] = $input['email'];
        $user_data['mobile'] = $input['mobile'];
        $user_data['address_proof_type'] = $input['address_proof_type'];
        $user_data['address_proof_no'] = $input['address_proof_no'];

        $user_data['status'] = "N";
       // $user_data['eid']=$id;

// start email
$attachmentPath="";
//$mail_status = Mail::to($input['email']);
  //$msg="welcome";
//mail($input['email'],"My subject",$msg);

//end email
$em=$input['email'];
 $details = [
        'title' => 'Mail from SLJ Fiber Networks Pvt.Ltd',
        'body' => 'This is for Terms and Condtions Email',
        'custmemail' => $em
    
        
    ];
   //  Mail::to($em)->send(new \App\Mail\TermsandConditions($details));




        //User
        $user = \App\User::create($user_data);
        $input['user_id'] = $user->id;

        if($input['connection_type'] == 5){
            $cust_pay['connection_type']='cable';
            if(isset($input['cablepackage']) && count($input['cablepackage'])>0){
                $input['cable_packages'] = implode(",",$input['cablepackage']);
            }

            if(isset($input['cableallacart']) && count($input['cableallacart'])>0){
                $input['cable_allacart'] = implode(",",$input['cableallacart']);
            }

			if(isset($input['cablelocal']) && count($input['cablelocal'])>0){
                $input['cable_local'] = implode(",",$input['cablelocal']);
            }

			if(isset($input['cablebase']) && count($input['cablebase'])>0){
                $input['cable_base'] = implode(",",$input['cablebase']);
            }

			unset($input['secure_deposite_amount']);
			unset($input['androidbox_security_deposit']);

            unset($input['package']);
            unset($input['sub_package']);
			unset($input['combo_package']);
            unset($input['combo_sub_package']);
        }else 
        if($input['connection_type'] == 7){
            $cust_pay['connection_type']=7;
            if(isset($input['combopackage']) && count($input['combopackage'])>0){
                $input['combo_package'] = implode(",",$input['combopackage']);
            }

            if(isset($input['comboallacart']) && count($input['comboallacart'])>0){
                $input['combo_allacart'] = implode(",",$input['comboallacart']);
            }

			if(isset($input['combolocal']) && count($input['combolocal'])>0){
                $input['combo_local'] = implode(",",$input['combolocal']);
            }

			if(isset($input['combobase']) && count($input['combobase'])>0){
                $input['combo_base'] = implode(",",$input['combobase']);
            }
                
			//unset($input['secure_deposite_amount']);
			//unset($input['androidbox_security_deposit']);

            unset($input['package']);
            unset($input['sub_package']);
			unset($input['combo_package']);
			if(count($request['combopackage'])>0)
			{
			$input['combo_package']=implode(",",$input['combopackage']);
			}
            
			$input['combo_sub_package']=$request['combo_sub_package'];
            //unset($input['combo_sub_package']);
        }else
        
        if($input['connection_type'] == 6){
            $cust_pay['connection_type']='iptv';
            if(isset($input['iptvpackage']) && count($input['iptvpackage'])>0){
                $input['iptv_packages'] = implode(",",$input['iptvpackage']);
            }

            if(isset($input['iptvallacart']) && count($input['iptvallacart'])>0){
                $input['iptv_allacart'] = implode(",",$input['iptvallacart']);
            }

			if(isset($input['iptvlocal']) && count($input['iptvlocal'])>0){
                $input['iptv_local'] = implode(",",$input['iptvlocal']);
            }

			if(isset($input['iptvbase']) && count($input['iptvbase'])>0){
                $input['iptv_base'] = implode(",",$input['iptvbase']);
            }

			unset($input['package']);
            unset($input['sub_package']);
			unset($input['combo_package']);
            unset($input['combo_sub_package']);
        }else if($input['connection_type'] == 'broadband'){
            $cust_pay['connection_type']='broadband';
            $input['cable_packages'] = "";
            $input['cable_allacart'] = "";
			$input['cable_base'] = "";
			$input['cable_local'] = "";

			$input['iptv_packages'] = "";
            $input['iptv_allacart'] = "";
			$input['iptv_base'] = "";
			$input['iptv_local'] = "";

			unset($input['setup_box_amount']);
			unset($input['androidbox_security_deposit']);

			unset($input['combo_package']);
            unset($input['combo_sub_package']);
        }else if($input['connection_type'] == 'combo'){
             $cust_pay['connection_type']='combo';
            $input['cable_packages'] = "";
            $input['cable_allacart'] = "";
			$input['cable_base'] = "";
			$input['cable_local'] = "";

			$input['iptv_packages'] = "";
            $input['iptv_allacart'] = "";
			$input['iptv_base'] = "";
			$input['iptv_local'] = "";

			//$input['package'];
            //nset($input['sub_package'];
		}
		if(empty($input['secure_deposite_amount']))
		$input['secure_deposite_amount']=0;
		if(empty($input['setup_box_amount']))
		$input['setup_box_amount']=0;
		if(empty($input['Installation Amount']))
		$input['Installation Amount']=0;
		if(empty($input['package']))
		$input['package']=0;
$cust_pay['amount']=$input['secure_deposite_amount']+$input['setup_box_amount']+$input['package']+$input['Installation Amount'];
		//Customer Photo
        $customer_photo_name = "";
        if($photo = $request->hasFile('customer_pic')) {
            $photo = $request->file('customer_pic') ;
            $fileName = $user->id."-photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/customers/photos/' ;
            $photo->move($destinationPath,$fileName);
            $customer_photo_name = $fileName ;
        }

		//Address Proof
        $address_proof_name = "";
        if($photo = $request->hasFile('address_proof')) {
            $photo = $request->file('address_proof') ;
            $fileName = $user->id."-address-proof-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/customers/address-proofs/' ;
            $photo->move($destinationPath,$fileName);
            $address_proof_name = $fileName ;
        }

		//Identity Proof
        $identity_proof_photo_name = "";
        if($photo = $request->hasFile('identity_proof')) {
            $photo = $request->file('identity_proof') ;
            $fileName = $user->id."-identity-proof-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/customers/identity-proofs/' ;
            $photo->move($destinationPath,$fileName);
            $identity_proof_photo_name = $fileName ;
        }

		$input['customer_pic'] = $customer_photo_name;
		$input['address_proof'] = $address_proof_name;
		$input['identity_proof'] = $identity_proof_photo_name;

        $input['technical_details_status'] = "N";
        $input['eid']=$id;
		
		
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');
		 
		$url = $base_url.'RSMS/SubscriberCreate';
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json",
			'Authorization: ' . $access_token
		);
		
        if($input['connection_type'] == 7 || $input['connection_type'] == 5){

        
		
		 $query_params = array(
		    'operatorid'       => isset($input['operator_id']) ? $input['operator_id'] : null,
			'casform_id'       => isset($input['casform_id']) ? $input['casform_id'] : "",
			'customer_name'    => isset($input['first_name']) ? $input['first_name'] : null,
			'customer_name_l'  => isset($input['last_name']) ? $input['last_name'] : null,
			'father_name'      => isset($input['f_name_c_name']) ? $input['f_name_c_name'] : null,
			'date_of_birth'    => isset($input['date_of_birth']) ? $input['date_of_birth'] : null,
			'address'          => isset($input['billing_address']) ? $input['billing_address'] : null,
			'email'            => isset($input['email']) ? $input['email'] : null,
			'mobile_no'        => isset($input['mobile']) ? $input['mobile'] : null,
			'install_address'  => isset($input['installation_address']) ? $input['installation_address'] : null,
			'address_proof'    => isset($input['address_proof_no']) ? $input['address_proof_no'] : null,
            'landline_no'    => isset($input['landline_no']) ? $input['landline_no'] : "",
		);
       // print_r( $query_params);die;
        
        $query_string = http_build_query($query_params);		
		$json_data = json_encode($query_params);
       
		
		$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

		 $response = curl_exec($ch);
         curl_close($ch);
         $response_decode = json_decode($response,1);
         
         $sub_id = $response_decode['sub_id'];
		$input['api_response'] = $response;
        $input['api_request'] = $json_data;
        $input['sub_id'] = $sub_id;
        }
		
		
        //Customer
        $customer = \App\Customers::create($input);
            $cust_pay['customer_id']=$customer->id;
            $cust_pay['installation_address']=$input['installation_address'];
            \App\CustomerPayments::create($cust_pay);
        //Assign Customer Role
        $user->assignRole('customer');
        ///branch/customers/new
        $user = Auth::user();
        $roles = $user->getRoleNames(); 
        //echo $roles[0];//exit;
        $url='admin/customers/process-payment/' . $customer->id . '/' . $input['payment_mode'];
        /*if($roles[0]=='branch' || $roles[0]=='franchise'){
            $url=$roles[0].'/customers/new';    
        }*/
        
        $employeedata=array();
	 $maxcusId = \App\Customers::latest()->value('id');
     $employeedata['employee_id']=$user->id;
     $employeedata['action_name']="Create CustomerApplication ";
     $employeedata['value_of_action']=$cust_pay['customer_id'];
     
      \App\Employees_Logs::create($employeedata);
	  
        return redirect($url)->with('success', 'Customer added successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('customers.show');
    }
    public function EmailData($email)
    {
    	$verifystatus = \App\EmailVerification::select('status')->where('email','=',$email)->where('status','=',1)->first();
    	$kk=2;
    	if(!empty($verifystatus->status))
    	{
    	   $html=1; 
         
                return $html;
    	}
    	else
    	return $kk;

	
   }

    public function Emailverify($email)
    {
  
      $input = array();
        $custid = \App\Customers::orderBy('id', 'desc')->first(); // gets the whole row
       if(!empty($custid->id))
       {
        $custmaxid = $custid->id;
        $custmaxid=$custmaxid+1;
         $custmail=$email;
       }
       else
       {
          $custmaxid=1;
        $input['cust_id']=$custmaxid;
        $custmail=$email;
       }
        $input['token']=sha1(time());
        $input['email']=$email;
          $tokenval= $input['token'];
  

        \App\EmailVerification::create($input);
            
       
   
    $details = [
        'title' => 'Mail from SLJ Fiber Networks',
        'body' => 'This is for Customer Verification Email',
        'custmemail' => $email,
        'token'=>$input['token']
        
    ];
    // Mail::to($email)->send(new \App\Mail\DurgaConfirm($details));

   // Mail::to($email)->send(new \App\Mail\MyTestMail($details));
    
   
    //dd("Email is Sent.");

    }

     public function EmailConfirm($email)
     {
       $input = array();
        $custid = \App\Customers::orderBy('id', 'desc')->first(); // gets the whole row
          if(!empty($custid->id))
       {
        $custmaxid = $custid->id;
        $custmaxid=$custmaxid+1;
         $custmail=$email;
       }
       else
       {
           $custmaxid=1;
           $custmail=$email;
           
       }
        $input['cust_id']=$custmaxid;
        $input['token']=sha1(time());
        $input['email']=$email;
             $tokenval= $input['token'];
  

    //    \App\EmailVerification::create($input);
            
             $details = [
        'custmemail' => $email,
        'token'=>$tokenval
        
                 ];
   
 //Mail::to($email)->send(new \App\Mail\MyTestMail($details));
  
  
     }
     public function emailtemplate()
     {
    $custmail="sljfibernetworksteam@gmail.com";
      $details = [
        'title' => 'Test for Email',
        'body' => 'This is for testing email using smtp',
        'custmemail' => $custmail,
        
    ];
return view('customers.emailtemplate',['details'=>$details]);   
     
     }
     public function emupdate()
{
    $custmail="sljfibernetworksteam@gmail.com";
      $details = [
        'title' => 'Test for Email',
        'body' => 'This is for testing email using smtp',
        'custmemail' => $custmail,
        
    ];
return view('customers.emailtemplate',['details'=>$details]);   

    //Mail::to($custmail)->send(new \App\Mail\MyTestMail($details));
    
 // Mail::to($custmail)->send(new \App\Mail\DurgaConfirm($details));
   
    
}
    public function processPayment($id, $payment_mode = "")
    {
       
        $customerdetails = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->firstorFail();

		$newtransactiondetails = \App\Transactions::where('customer_id','=',$customerdetails->id)->where('payment_type','=','new')->where('status','=','success')->first();

		if(count((array)$newtransactiondetails) > 0) {
			return view('customers.process-payment-details',['customerdetails'=>$customerdetails,'newtransactiondetails'=>$newtransactiondetails]);
		} else {
			$package_amount = 0;
			if($customerdetails->connection_type == 5){

				//Cable Packages
				if(!empty($customerdetails->cable_packages)){
					$packages = explode(",",$customerdetails->cable_packages);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->cable_allacart)){
					$packages = explode(",",$customerdetails->cable_allacart);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->cable_base)){
					$packages = explode(",",$customerdetails->cable_base);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->cable_local)){
					$packages = explode(",",$customerdetails->cable_local);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}
			}else if($customerdetails->connection_type == 6){

				//IPTV Packages
				if(!empty($customerdetails->iptv_packages)){
					$packages = explode(",",$customerdetails->iptv_packages);
					$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->iptv_allacart)){
					$packages = explode(",",$customerdetails->iptv_allacart);
					$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->iptv_base)){
					$packages = explode(",",$customerdetails->iptv_base);
					$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->iptv_local)){
					$packages = explode(",",$customerdetails->cable_local);
					$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
				}
			}else if($customerdetails->connection_type == 3){
				if($customerdetails->sub_package >0){
					$packagedetails = \App\BroadbandSubPackages::find($customerdetails->sub_package);
					$package_amount = $packagedetails->total;
				}

			}else if($customerdetails->connection_type == 7){
			    
				//if($customerdetails->combo_sub_package >0){
				//	$packagedetails = \App\ComboSubPackages::find($customerdetails->combo_sub_package);
				//	$package_amount = $packagedetails->total;
				//}
				
				if(!empty($customerdetails->combo_package)){
					$packages = explode(",",$customerdetails->combo_package);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->combo_local)){
					$packages = explode(",",$customerdetails->combo_local);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->combo_base)){
					$packages = explode(",",$customerdetails->combo_base);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}

				if(!empty($customerdetails->combo_allacart)){
					$packages = explode(",",$customerdetails->combo_allacart);
					$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
				}
				if(!empty($customerdetails->combo_sub_package)){
				    	 $subamt=\App\ComboSubPackages::where('id','=', $customerdetails->combo_sub_package)->first();
				    	 $package_amount+=$subamt->total;
				
				    
				}
				
				
				
			}
                      $employeedata=array();
	
     $employeedata['employee_id']=	  $id = \Auth::user()->id;

     $employeedata['action_name']="Create Process Payment ";
     $employeedata['value_of_action']=$customerdetails->id;
     
      \App\Employees_Logs::create($employeedata);
	  
                    
			//To Avoid View Cache
			$random_value = mt_rand(10000,10000000);

			return view('customers.process-payment',['random_value'=>$random_value,'customerdetails'=>$customerdetails,'package_amount'=>$package_amount, 'payment_mode' => $payment_mode]);
		}
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function paymentResponse() // online payment response
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();

        $pay_later_url='admin/customers/new';
        $all_url = 'admin/customers';
        $add_technical_url='admin/customers/technical';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $pay_later_url=$roles[0].'/customers/new';
            $add_technical_url=$roles[0].'/customers/technical';
            $all_url = $roles[0].'/customers';
        }
		if(isset($_POST) && count($_POST)>0){
            $inwardFlowTypeQuery = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->first();
            if (!$inwardFlowTypeQuery) {
                Session::flash('error', "payment flow type inward required");
                return redirect('admin/accounts/paymenttype')->with('error', 'payment flow type inward required');
            } else if ($inwardFlowTypeQuery) {
                $inwardFlowType = $inwardFlowTypeQuery->id;
                $status = $_POST["status"];
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];

                $amount = $_POST["amount"];
                $txnid = $_POST["txnid"];
                $posted_hash = $_POST["hash"];
                $key = $_POST["key"];
                $productinfo = $_POST["productinfo"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];

                $salt = env("SALT"); //Please change this value with live salt for production

                if (isset($_POST["additionalCharges"])) {
                    $additionalCharges=$_POST["additionalCharges"];
                    $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                }
                else {
                    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                }
                $hash = hash("sha512", $retHashSeq);

                if ($hash != $posted_hash || $status !='success') {
                                        $paymentdetails = explode("__",$productinfo);
                    $customer_id = $paymentdetails[1];

                    $customer = \App\Customers::find($customer_id);

                     if($customer->connection_type == 3) 
                    {
$packdetails = \App\BroadbandPackages::select('package_name')->where('id','=',$customer->package)->first();

$subpackdetails = \App\BroadbandSubPackages::select('sub_plan_name','total')->where('id','=',$customer->sub_package)->first();
 
                   $totamt=$subpackdetails->total+($customer->installation_amount)+($customer->secure_deposite_amount);
                    $details = [
        'custmemail' => $email,
        'depositamt'=>$customer->secure_deposite_amount,
        
        'instaamt'=>$customer->installation_amount,
        'price'=>$subpackdetails->total,
        'totalamt'=>$totamt,
        'packagename'=>$packdetails->package_name,
        'sub-packagename'=>$subpackdetails->sub_plan_name,
        'connection_type'=>$customer->connection_type

    ];
                   

}
 // Mail::to($email)->send(new \App\Mail\PaymentOnlineFailEmail($details));


                    
                   
                    return redirect($pay_later_url)->with('error_message', "<h3>Invalid Transaction. Please try again </h3>");
                    
                }
                else {
                    $paymentdetails = explode("__",$productinfo);
                    $customer_id = $paymentdetails[1];

                    $customer = \App\Customers::find($customer_id);
                    $customer_data = array();
                    $customer_data['current_status'] = "technical";
                    $customer->update($customer_data); //Update details
                    
                    
                    $txn_data = array();
                    $txn_data['txnid'] = $txnid;
                    $txn_data['amount'] = $amount;
                    $txn_data['payment_source'] = $_POST['payment_source'];
                    // txns to slj system
                    $txn_data['payment_flow_type'] = $inwardFlowType;
                    // customer user id
                    $txn_data['user_id'] = $customer->user_id;
                    // 3 - customer 
                    $txn_data['payment_from'] = 3;
                    $txn_data['payment_type'] = "new";
                    $txn_data['payment_message'] = $productinfo;
                    $txn_data['status'] = $status;
                    $txn_data['customer_id'] = $customer_id;
                    $txn_data['payment_mode'] = 'Payment Gateway';

                    //Txs
                    $txnRecord = \App\Transactions::create($txn_data);

                    $bill_number = Invoices::where("paid", "=", 1)->max('bill_number');

                    if ($bill_number == "" ) {
                        $bill_number = 1;
                    } else {
                        $today = Carbon::now();
                        if ($today->month == 4 && $today->day == 1) {
                            $bill_number = 1;
                        } else {
                            $bill_number++;
                        }
                    }

                    // Create invoice code starts here
                    $invoiceData = [];
                    $invoiceData["invoice_type"] = "New";
                    $invoiceData["payment_type"] = "New Connection";
                    $invoiceData["bill_number"] = $bill_number;
                    $invoiceData["address"] = $customer->billing_address;
                    $invoiceData["gst_number"] = $customer->gstin;

                    // customer role is 3
                    $invoiceData["created_to"] = 3;

                    $unpaid_invoices_sum = Invoices::where("created_for", $customer->id)
                    ->where("created_to", $invoiceData['created_to'])
                    ->where("status", "=", 1)
                    ->latest('id')->first();

                    $invoiceData["po_number"] = 'SLJ' . sprintf('%08d', $customer->id);
                    $invoiceData["txn_id"] = $txnRecord->id;
                    $invoiceData["payment_gateway_txn_id"] = $txnid;
                    $invoiceData["paid_through"] = 'online';
                    $invoiceData["invoice_date"] = Carbon::now();
                    $txn_data['payment_gateway'] = $_POST['payment_source'];
                    $invoiceData["paid_date"] = Carbon::now();
                    $invoiceData["paid_amount"] = $amount;
                    $invoiceData["amount"] = $amount;
                    $invoiceData["total_amount"] = $amount;
                    // the logged in user
                    $invoiceData["created_by"] = $user->id;
                    // user who is impacting
                    $invoiceData["created_for"] = $customer->id;
                    // create by role
                    // admin role is 1
                    $invoiceData["created_from"] = 4;
                    $invoiceData["payment_flow_type"] = 'inward';
                    $invoiceData["ptype"] = 1;
                    // active
                    $invoiceData["status"] = 1;
                    $invoiceData["paid"] = 1;

                    $invoiceData["phone"] = $phone;
                    $invoiceData["email"] = $email;
                    // active
                    $invoiceData["name"] = $firstname . " " . $lastname;

                    if($customer->connection_type == 5) {
                        $package = [];
                        // Cable Packages
                        if(!empty($customer->cable_packages)){
                            $packages = explode(",",$customer->cable_packages);
                            $package['cable_packages'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            // $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                        }

                        if(!empty($customer->cable_allacart)){
                            $packages = explode(",",$customer->cable_allacart);
                            $package['cable_allacart'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            // $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                        }

                        if(!empty($customer->cable_base)){
                            $packages = explode(",",$customer->cable_base);
                            $package['cable_base'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                                    $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                        }

                        if(!empty($customer->cable_local)){
                            $packages = explode(",",$customer->cable_local);
                            $package["cable_local"] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            // $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                        }
                        $invoiceData["package"] = $this->implodeAssociativeArray($package);
                    }
                    else if($customer->connection_type == 3) {
                        $invoiceData["package"] = \App\BroadbandPackages::findOrFail($customer->package)->package_name;
                        if ($customer->sub_package != '') {
                            $invoiceData["sub_package"] = \App\BroadbandSubPackages::findOrFail($customer->sub_package)->sub_plan_name;
                        }
                    } else if($customer->connection_type == 6) {
                        $package = [];
                        //IPTV Packages
                        if(!empty($customerdetails->iptv_packages)){
                            $packages = explode(",",$customer->iptv_packages);
                            $package['iptv_packages'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                        }

                        if(!empty($customer->iptv_allacart)){
                            $packages = explode(",",$customer->iptv_allacart);
                            $package['iptv_allacart'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                        }

                        if(!empty($customer->iptv_base)){
                            $packages = explode(",",$customer->iptv_base);
                            $package['iptv_base'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                        }

                        if(!empty($customer->iptv_local)){
                            $packages = explode(",",$customer->cable_local);
                            $package['iptv_local'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                        }
                        $invoiceData["package"] = $this->implodeAssociativeArray($package);
                    }   else if($customer->connection_type == 7) {
                        if ($customer->combo_package >0) {
                            $invoiceData["package"] = \App\ComboPackages::findOrFail($customer->combo_package)->package_name;
                            if ($customer->combo_sub_package != '' && $customer->combo_sub_package > 0 ) {
                                $invoiceData["sub_package"] = \App\ComboSubPackages::findOrFail($customer->combo_sub_package)->sub_plan_name;
                            }
                        }
                    }

                    $invoiceData["payment_date"] = Carbon::now();

                    $invoiceData["base_price"] = $paymentdetails[2];

                    // $invoiceData["discount_amount"] = $customer->discount_amount;
                    $invoiceData["paid_amount"] = $amount;

                    if ($unpaid_invoices_sum) {
                        $invoiceData["current_balance"] = floatval($unpaid_invoices_sum->current_balance) - floatval($amount);
                    }
                    else {
                        $invoiceData["current_balance"] = $amount;
                    }
                    $invoiceData["payment_mode"] = 'Online';
                    // paid invoice from branch
                    Invoices::create($invoiceData);
                    $custval = \App\CustomerPayments::where('customer_id','=',$customer->id)->first();
                
                    $customerpayments = \App\CustomerPayments::find($custval->id);
                    $customer_pay = array();
                    $customer_pay['trans_id']=$txnid;
                    $customer_pay["payment_mode"] = 'Online';
                    
                    $maxinvoiceId = \App\Invoices::latest()->value('id');
                    $customer_pay['invoice_id']=$maxinvoiceId;
                    $customerpayments->update($customer_pay);
                    
                    
                     if($customer->connection_type == 3) 
                    {
$packdetails = \App\BroadbandPackages::select('package_name')->where('id','=',$customer->package)->first();

$subpackdetails = \App\BroadbandSubPackages::select('sub_plan_name','total')->where('id','=',$customer->sub_package)->first();
 
                   $totamt=$subpackdetails->total+($customer->installation_amount)+($customer->secure_deposite_amount);
                    $details = [
        'custmemail' => $email,
        'depositamt'=>$customer->secure_deposite_amount,
        
        'instaamt'=>$customer->installation_amount,
        'price'=>$subpackdetails->total,
        'totalamt'=>$totamt,
        'packagename'=>$packdetails->package_name,
        'sub-packagename'=>$subpackdetails->sub_plan_name,
        'connection_type'=>$customer->connection_type

    ];
                   

}
 if($customer->connection_type == 7)
                   {
                       $package_amount=0;
                    $totamt=0;
$packages=[];
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    $cablelocal=[];
                    $cablepack=[];
                     $instaamt=$customer->installation_amount;
                   
                    // Cable Packages
                    if(!empty($customer->installation_amount))
                    {
                    $package_amount+=$customer->installation_amount;
                    $instaamt=$customer->installation_amount;
                    
                    }
                     if(!empty($customer->secure_deposite_amount))
                    {
                    $package_amount+=$customer->secure_deposite_amount;
                    }
                     if(!empty($customer->androidbox_security_deposit))
                    {
                    $package_amount+=$customer->androidbox_security_deposit;
                    }
                    $base_price=1000;
                      $packplanamout= \App\ComboSubPackages::where('id', $customer->combo_sub_package)->first();
                    
                    $package_amount=$package_amount+$customer->secure_deposite_amount+$instaamt+$customer->androidbox_security_deposit;
                     $details = [
        'custmemail' => $email,
       
        'secure_deposite_amount'=>$customer->secure_deposite_amount,
        'androidbox_security_deposit'=>$customer->androidbox_security_deposit,
        'packamount'=>$packplanamout->total,
        'instaamt'=>$instaamt,
        'totalamt'=>$package_amount,
        'combo_packages'=>$customer->combo_package,
        'combo_allacart'=>$customer->combo_allacart,
        'combo_local'=>$customer->combo_local,
        'combo_base'=>$customer->combo_base,
        'connection_type'=>$customer->connection_type,
        'package_plan'=>$customer->combo_sub_package
    ];
                   


                    
                   }
                   
                      $package_amount=0;
$totamt=0;
                   if($customer->connection_type == 6) {
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    // Cable Packages
                    if(!empty($customer->iptv_packages)){
                        $packages = explode(",",$customer->iptv_packages);
                        $package['iptv_packages'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_packages=null;

                    if(!empty($customer->iptv_allacart)){
                        $packages = explode(",",$customer->iptv_allacart);
                        $package['iptv_allacart'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_allacart='';

                    if(!empty($customer->iptv_base)){
                        $packages = explode(",",$customer->iptv_base);
                        $package['iptv_base'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                           $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_base='';

                    if(!empty($customer->iptv_local)) {
                        $packages = explode(",",$customer->iptv_local);
                        $package['iptv_local'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_local='';
                  $instaamt=$customer->installation_amount;
                    if(!empty($instaamt))
                    {
                    $totamt=$totamt+$instaamt;
                    }
                    if(!empty($customer->setup_box_amount))
                    {
                    $totamt=$totamt+$customer->setup_box_amount;
                    }
                    if(!empty($customer->androidbox_security_deposit))
                    {
                    $totamt=$totamt+$customer->androidbox_security_deposit;
                    }
                    $totamt=$package_amount+$totamt;
                    $details = [
        'custmemail' => $email,
        'base_price'=>$base_price,

        'androidbox_security_deposit'=>$customer->androidbox_security_deposit,
        'secure_deposite_amount'=>$customer->secure_deposite_amount,
        'instaamt'=>$customer->installation_amount,
        'totalamt'=>$totamt,
        'iptv_allacart'=>$customer->iptv_allacart,
        'iptv_packages'=>$customer->iptv_packages,
        'iptv_local'=>$customer->iptv_local,
        'iptv_base'=>$customer->iptv_base,
        'connection_type'=>$customer->connection_type
    ];
                   


                    
                   }
     
          
 // Mail::to($email)->send(new \App\Mail\PaymentOnlineEmail($details));

                    
                    
        
                    //send sms
                    $message = "Dear ".  $_POST["firstname"] . " " . $_POST["lastname"]  . ",%0a We received Rs." . $amount . "  for New Installation, through Online. Your account no is SLJ" . sprintf('%08d', $customer_id) . " for future references. Thank you for choosing us. %0a%0aRegards, %0aSLJ Fiber Networks Pvt.Ltd. Team.";
                    $mobile = $_POST['phone']; //"918125449686";
                    $sms = new Sms();
                    $sms->sendSms($mobile, $message);
                    return redirect($add_technical_url)->with('success_message', "<h3>Thank You. Your order status is <b>". $status ."</b>.</h3>"."<h4>Your Transaction ID for this transaction is <b>".$txnid."</b>.</h4>"."<h4>We have received a payment of Rs. <b>" . $amount . "</b>.</h4>");
                }
            }
        }
        else
        {
               
          return redirect($all_url);
        }
		//return view('customers::payment-response',['status'=>$status,'firstname'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'posted_hash'=>$posted_hash,'key'=>$key,'productinfo'=>$productinfo,'email'=>$email,'salt'=>$salt]);
    }

    /**
     * Cashpayment reponse.
     * @param int $id
     * @return Response
     */
    public function cashPaymentResponse()
    {   
        $user = Auth::user();
        $roles = $user->getRoleNames();

        $pay_later_url='admin/customers/new';
        $all_url = 'admin/customers';
        $add_technical_url='admin/customers/technical';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $pay_later_url=$roles[0].'/customers/new';
            $add_technical_url=$roles[0].'/customers/technical';
            $all_url = $roles[0].'/customers';
        }
		if(isset($_POST) && count($_POST)>0) 
		{
            $inwardFlowTypeQuery = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->first();
            if (!$inwardFlowTypeQuery) 
            {
                Session::flash('error', "payment flow type inward required");
                return redirect('admin/accounts/paymenttype')->with('error', 'payment flow type inward required');
            }
            else
            if ($inwardFlowTypeQuery) 
            {
                $inwardFlowType = $inwardFlowTypeQuery->id;

                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];

                $amount = $_POST["amount"];
                $txnid = "";
                $productinfo = $_POST["productinfo"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $base_price = $_POST["package_amount"];

                if (isset($_POST["additionalCharges"])) {
                    $additionalCharges=$_POST["additionalCharges"];
                }
				$paymentdetails = explode("__",$productinfo);
				$customer_id = $paymentdetails[1];

				$customer = \App\Customers::find($customer_id);
				$customer_data = array();
                $customer_data['current_status'] = "technical";
          
                $customer_data['ucreateddt']=Carbon::now();
                
				$customer->update($customer_data); //Update details

				$txn_data = array();
				$txn_data['txnid'] = $txnid;
				$txn_data['amount'] = $amount;
                $txn_data['payment_type'] = "new";
				// txns to slj system
				$txn_data['payment_flow_type'] = $inwardFlowType;
				// customer user id
				$txn_data['user_id'] = $customer->user_id;
				// 3 - customer 
				$txn_data['payment_from'] = 3;
				$txn_data['payment_message'] = $productinfo;
				$txn_data['customer_id'] = $customer_id;
				$txn_data['payment_mode'] = 'Cash';
				$txn_data['status'] = 'success';

                //Txs
                $txnRecord = \App\Transactions::create($txn_data);


                $bill_number = Invoices::where("paid", "=", 1)->max('bill_number');

                if ($bill_number == "" ) {
                    $bill_number = 1;
                } else {
                    $today = Carbon::now();
                    if ($today->month == 4 && $today->day == 1) {
                        $bill_number = 1;
                    } else {
                        $bill_number++;
                    }
                }
                
                // Create invoice code starts here
                $invoiceData = [];
                $invoiceData["invoice_type"] = "New";
                $invoiceData["payment_type"] = "New Connection";
                // customer role is 3
                $invoiceData["created_to"] = 3;

                $unpaid_invoices_sum = Invoices::where("created_for", $customer->id)
                ->where("created_to", $invoiceData['created_to'])
                ->where("status", "=", 1)
                ->latest('id')->first();

                $invoiceData["po_number"] = 'SLJ' . sprintf('%08d', $customer->id);
                $invoiceData["txn_id"] = $txnRecord->id;
                $invoiceData["paid_through"] = 'cash';
                $invoiceData["invoice_date"] = Carbon::now();
                $invoiceData["paid_amount"] = $amount;
                $invoiceData["gst_number"] = $customer->gstin;
                $invoiceData["address"] = $customer->billing_address;

                $invoiceData["bill_number"] = $bill_number;

                $invoiceData["amount"] = $amount;
                $invoiceData["total_amount"] = $amount;
                // the logged in user
                $invoiceData["created_by"] = $user->id;
                // user who is impacting
                $invoiceData["created_for"] = $customer->id;
                // create by role
                // admin role is 1
                $invoiceData["created_from"] = 4;
                $invoiceData["payment_flow_type"] = 'inward';
                $invoiceData["ptype"] = 1;
                // active
                $invoiceData["status"] = 1;
                $invoiceData["paid"] = 1;

                $invoiceData["phone"] = $phone;
                $invoiceData["email"] = $email;
                // active
                $invoiceData["name"] = $firstname . " " . $lastname;

                if($customer->connection_type == 5) {
                    $package = [];
                    // Cable Packages
                    if(!empty($customer->cable_packages)) {
                        $packages = explode(",",$customer->cable_packages);
                        $package['cable_packages'] = \App\CablePackages::whereIn('id', $packages)
                        ->pluck('package_name')->implode(',');
                      //  $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_allacart)){
                        $packages = explode(",",$customer->cable_allacart);
                        $package['cable_allacart'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                       //  $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_base)){
                        $packages = explode(",",$customer->cable_base);
                        $package['cable_base'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                   //  $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_local)){
                        $packages = explode(",",$customer->cable_local);
                        $package["cable_local"] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                      //   $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    $invoiceData["package"] = $this->implodeAssociativeArray($package);
                }
                else if($customer->connection_type == 3) {
                    $invoiceData["package"] = \App\BroadbandPackages::findOrFail($customer->package)->package_name;
                    if ($customer->sub_package != '') {
                        $invoiceData["sub_package"] = \App\BroadbandSubPackages::findOrFail($customer->sub_package)->sub_plan_name;
                    }
                } else if($customer->connection_type == 6){
                    $package = [];
                    //IPTV Packages
                    if(!empty($customerdetails->iptv_packages)){
                        $packages = explode(",",$customer->iptv_packages);
                        $package['iptv_packages'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->iptv_allacart)){
                        $packages = explode(",",$customer->iptv_allacart);
                        $package['iptv_allacart'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->iptv_base)){
                        $packages = explode(",",$customer->iptv_base);
                        $package['iptv_base'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->iptv_local)) {
                        $packages = explode(",",$customer->cable_local);
                        $package['iptv_local'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    $invoiceData["package"] = $this->implodeAssociativeArray($package);
                } 
                /*
                else 
                if($customer->connection_type == 'combo') 
                {
                    if ($customer->combo_package >0) 
                    {
                        $invoiceData["package"] = \App\ComboPackages::findOrFail($customer->combo_package)->package_name;
                        if ($customer->combo_sub_package != '' && $customer->combo_sub_package > 0 ) 
                        {
                            $invoiceData["sub_package"] = \App\ComboSubPackages::findOrFail($customer->combo_sub_package)->sub_plan_name;
                        }
                    }
                }
                */

                $invoiceData["payment_date"] = Carbon::now();
                $invoiceData["base_price"] = $base_price;
                // $invoiceData["discount_amount"] = $customer->discount_amount;
                $invoiceData["paid_amount"] = $amount;

                if ($unpaid_invoices_sum) {
                    $invoiceData["current_balance"] = floatval($unpaid_invoices_sum->current_balance) - floatval($amount);
                }
                else {
                    $invoiceData["current_balance"] = $amount;
                }
                $invoiceData["payment_mode"] = 'Cash';
                // paid invoice from branch
                Invoices::create($invoiceData);
                /*
                
                    $customerpayments = \App\CustomerPayments::find($customer->id);
                    $customer_pay = array();
                    $customer_pay['trans_id']=$txnid;
                    $customer_pay["payment_mode"] = 'Cash';
                    
                    $maxinvoiceId = \App\Invoices::latest()->value('id');
                    $customer_pay['invoice_id']=$maxinvoiceId;
                    $customerpayments->update($customer_pay);
                    */
                       $instaamt=$customer->installation_amount;
                     $depositamt=$customer->secure_deposite_amount;
                  
                    $totamt=0;
                    if($customer->connection_type == 3) 
                    {
$packdetails = \App\BroadbandPackages::select('package_name')->where('id','=',$customer->package)->first();

$subpackdetails = \App\BroadbandSubPackages::select('sub_plan_name','total')->where('id','=',$customer->sub_package)->first();
 
                   $totamt=$subpackdetails->total+$instaamt+$depositamt;
                    $details = [
        'custmemail' => $email,
        'depositamt'=>$depositamt,
        
        'instaamt'=>$instaamt,
        'price'=>$subpackdetails->total,
        'totalamt'=>$totamt,
        'packagename'=>$packdetails->package_name,
        'sub-packagename'=>$subpackdetails->sub_plan_name,
        'connection_type'=>$customer->connection_type

    ];
                   

}
$package_amount=0;
$totamt=0;
                   if($customer->connection_type == 5) {
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    // Cable Packages
                    if(!empty($customer->cable_packages)) {
                        $packages = explode(",",$customer->cable_packages);
                        $cablepack = \App\CablePackages::whereIn('id', $packages)
                        ->pluck('package_name')->implode(',');
                        $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                
                    }
                    if(!empty($customer->cable_allacart)){
                        $packages = explode(",",$customer->cable_allacart);
                        $cableallacart = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_base)){
                        $packages = explode(",",$customer->cable_base);
                        $cablebase = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                      $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_local)){
                        $packages = explode(",",$customer->cable_local);
                        $cablelocal= \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                         $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    if(!empty($instaamt))
                    {
                    $totamt=$totamt+$instaamt;
                    }
                    if(!empty($customerdetails->setup_box_amount))
                    {
                    $totamt=$totamt+$customerdetails->setup_box_amount;
                    }
                    $base_price=1000;
                    $totalamt=$customer->installation_amount+$customer->setup_box_amount+$package_amount;
                    $details = [
        'custmemail' => $email,
        'base_price'=>$base_price,

        'setup_box_amount'=>$customer->setup_box_amount,
        'instaamt'=>$instaamt,
        'totalamt'=>$totalamt,
        'cablepackages'=>$customer->cable_packages,
        'cableallacart'=>$customer->cable_allacart,
        'cablelocal'=>$customer->cable_local,
        'cablebase'=>$customer->cable_base,
        'connection_type'=>$customer->connection_type
    ];
                   


                    
                   }
                   
                   if($customer->connection_type == 7)
                   {
                       $package_amount=0;
                    $totamt=0;
$packages=[];
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    $cablelocal=[];
                    $cablepack=[];
                     $instaamt=$customer->installation_amount;
                   
                    // Cable Packages
                    if(!empty($customer->installation_amount))
                    {
                    $package_amount+=$customer->installation_amount;
                    $instaamt=$customer->installation_amount;
                    
                    }
                     if(!empty($customer->secure_deposite_amount))
                    {
                    $package_amount+=$customer->secure_deposite_amount;
                    }
                     if(!empty($customer->androidbox_security_deposit))
                    {
                    $package_amount+=$customer->androidbox_security_deposit;
                    }
                    $base_price=1000;
                      $packplanamout= \App\ComboSubPackages::where('id', $customer->combo_sub_package)->first();
                    
                    $package_amount=$package_amount+$customer->secure_deposite_amount+$instaamt+$customer->androidbox_security_deposit;
                     $details = [
        'custmemail' => $email,
       
        'secure_deposite_amount'=>$customer->secure_deposite_amount,
        'androidbox_security_deposit'=>$customer->androidbox_security_deposit,
        'packamount'=>$packplanamout->total,
        'instaamt'=>$instaamt,
        'totalamt'=>$package_amount,
        'combo_packages'=>$customer->combo_package,
        'combo_allacart'=>$customer->combo_allacart,
        'combo_local'=>$customer->combo_local,
        'combo_base'=>$customer->combo_base,
        'connection_type'=>$customer->connection_type,
        'package_plan'=>$customer->combo_sub_package
    ];
                   


                    
                   }
                   
                   
              $package_amount=0;
$totamt=0;
                   if($customer->connection_type == 6) {
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    // Cable Packages
                    if(!empty($customer->iptv_packages)){
                        $packages = explode(",",$customer->iptv_packages);
                        $package['iptv_packages'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_packages=null;

                    if(!empty($customer->iptv_allacart)){
                        $packages = explode(",",$customer->iptv_allacart);
                        $package['iptv_allacart'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                           $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_allacart='';

                    if(!empty($customer->iptv_base)){
                        $packages = explode(",",$customer->iptv_base);
                        $package['iptv_base'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                }
                    else
                    $customer->iptv_base='';

                    if(!empty($customer->iptv_local)) {
                        $packages = explode(",",$customer->iptv_local);
                        $package['iptv_local'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                           $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_local='';
                  $instaamt=$customer->installation_amount;
                    if(!empty($instaamt))
                    {
                    $totamt=$totamt+$instaamt;
                    }
                    if(!empty($customer->setup_box_amount))
                    {
                    $totamt=$totamt+$customer->setup_box_amount;
                    }
                    
                    if(!empty($customer->androidbox_security_deposit))
                    {
                    $totamt=$totamt+$customer->androidbox_security_deposit;
                    }
                    //$base_price=1000;
                    $totamt=$base_price+$totamt;
                    $details = [
        'custmemail' => $email,
        'base_price'=>$base_price,

        'androidbox_security_deposit'=>$customer->androidbox_security_deposit,
        'secure_deposite_amount'=>$customer->secure_deposite_amount,
        'instaamt'=>$instaamt,
        'totalamt'=>$totamt+$package_amount,
        'iptv_allacart'=>$customer->iptv_allacart,
        'iptv_packages'=>$customer->iptv_packages,
        'iptv_local'=>$customer->iptv_local,
        'iptv_base'=>$customer->iptv_base,
        'connection_type'=>$customer->connection_type
    ];
                   


                    
                   }
     
                   
    
   //  Mail::to($email)->send(new \App\Mail\PaymentEmail($details));

                    

                //send sms
                $message = "Dear ". $_POST["firstname"] . " " . $_POST["lastname"] . ",%0a We received Rs." . $amount . "  for New Installation, through " . $txn_data['payment_mode'] . ". Your account no is SLJ" . sprintf('%08d', $customer_id) . " for future references. Thank you for choosing us. %0a%0aRegards, %0aSLJ Fiber Networks Pvt.Ltd. Team.";

                $mobile = $_POST['phone']; //"918125449686";
                $sms = new Sms();
                $sms->sendSms($mobile, $message);

				return redirect($add_technical_url)->with('success_message', "<h3>Thank You. Customer is created successfully</h3>");
            }
        }
		return redirect($all_url);
    }

    /**
     * Cheque payment reponse.
     * @return Response
     */
    public function chequePaymentResponse()
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();
        $pay_later_url='admin/customers/new';
        $all_url = 'admin/customers';
        $add_technical_url='admin/customers/technical';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $pay_later_url=$roles[0].'/customers/new';
            $add_technical_url=$roles[0].'/customers/technical';
            $all_url = $roles[0].'/customers';
        }
	if(isset($_POST) && count($_POST)>0) {
            $inwardFlowTypeQuery = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->first();
            if (!$inwardFlowTypeQuery) {
                Session::flash('error', "payment flow type inward required");
                return redirect('admin/accounts/paymenttype')->with('error', 'payment flow type inward required');
            } else if ($inwardFlowTypeQuery) {
                $inwardFlowType = $inwardFlowTypeQuery->id;

     	        $firstname = $_POST["firstname"];
                $lastname = $_POST["firstname"];

                $amount = $_POST["amount"];
                $txnid = "";
                $productinfo = $_POST["productinfo"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $base_price = $_POST["package_amount"];
			if (isset($_POST["additionalCharges"])) {
				$additionalCharges=$_POST["additionalCharges"];
                        }
				$paymentdetails = explode("__",$productinfo);
				$customer_id = $paymentdetails[1];

				$customer = \App\Customers::find($customer_id);
				$customer_data = array();
                $customer_data['current_status'] = "technical";
				$customer->update($customer_data); //Update details

				$txn_data = array();
				$txn_data['txnid'] = $txnid;
				$txn_data['amount'] = $amount;
				$txn_data['payment_type'] = "new";

				// txns to slj system
				$txn_data['payment_flow_type'] = $inwardFlowType;
				// customer user id
				$txn_data['user_id'] = $customer->user_id;
				// 3 - customer 
				$txn_data['payment_from'] = 3;
          	    $txn_data['status'] = 'success';

                $txn_data['payment_message'] = $productinfo;
				$txn_data['customer_id'] = $customer_id;
				$txn_data['payment_mode'] = 'Cheque';

                $input = request()->all();
                $txn_data['cheque_no'] = $input['cheque_no'];
				$txn_data['issuing_bank_name'] = $input['issuing_bank_name'];
				$txn_data['issuing_date'] = $input['issuing_date'];
				$txn_data['branch'] = $input['branch'];
				$chequeno=$input['cheque_no'];
				$issuebank=$input['issuing_bank_name'];
				$issuedate=$input['issuing_date'];
				$issuebranch=$input['branch'];

                //Txs
                $txnRecord = \App\Transactions::create($txn_data);

                $bill_number = Invoices::where("paid", "=", 1)->max('bill_number');

                if ($bill_number == "" ) {
                    $bill_number = 1;
                } else {
                    $today = Carbon::now();
                    if ($today->month == 4 && $today->day == 1) {
                        $bill_number = 1;
                    } else {
                        $bill_number++;
                    }
                }

                // Create invoice code starts here
                $invoiceData = [];
                $invoiceData["invoice_type"] = "New";
                $invoiceData["payment_type"] = "New Connection";
                // customer role is 3
                $invoiceData["created_to"] = 3;
                $invoiceData["bill_number"] = $bill_number;

                $unpaid_invoices_sum = Invoices::where("created_for", $customer->id)
                ->where("created_to", $invoiceData['created_to'])
                ->where("status", "=", 1)
                ->latest('id')->first();

                $invoiceData["po_number"] = 'SLJ' . sprintf('%08d', $customer->id);
                $invoiceData["txn_id"] = $txnRecord->id;
                $invoiceData["paid_through"] = 'cheque';

                $invoiceData["invoice_date"] = Carbon::now();
                $invoiceData["paid_amount"] = $amount;
                $invoiceData["gst_number"] = $customer->gstin;
                $invoiceData["address"] = $customer->billing_address;

                $invoiceData["amount"] = $amount;
                $invoiceData["total_amount"] = $amount;

                // the logged in user
                $invoiceData["created_by"] = $user->id;
                // user who is impacting 
                $invoiceData["created_for"] = $customer->id;
                // create by role
                // admin role is 1
                $invoiceData["created_from"] = 4;
                $invoiceData["payment_flow_type"] = 'inward';
                $invoiceData["ptype"] = 1;
                // active
                $invoiceData["status"] = 1;
                $invoiceData["paid"] = 1;

                $invoiceData["phone"] = $phone;
                $invoiceData["email"] = $email;
                // active
                $invoiceData["name"] = $firstname . " " . $lastname;

                if($customer->connection_type == 5) {
                    $package = [];
                    // Cable Packages
                    if(!empty($customer->cable_packages)){
                        $packages = explode(",",$customer->cable_packages);
                        $package['cable_packages'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                        // $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_allacart)){
                        $packages = explode(",",$customer->cable_allacart);
                        $package['cable_allacart'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                        // $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_base)){
                        $packages = explode(",",$customer->cable_base);
                        $package['cable_base'] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
//                                    $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_local)){
                        $packages = explode(",",$customer->cable_local);
                        $package["cable_local"] = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                        // $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    $invoiceData["package"] = $this->implodeAssociativeArray($package);
                }
                else if($customer->connection_type == 3) {
                    $invoiceData["package"] = \App\BroadbandPackages::findOrFail($customer->package)->package_name;
                    if ($customer->sub_package != '') {
                        $invoiceData["sub_package"] = \App\BroadbandSubPackages::findOrFail($customer->sub_package)->sub_plan_name;
                    }
                } else if($customer->connection_type == 6){
                    $package = [];
                    //IPTV Packages
                    if(!empty($customerdetails->iptv_packages)){
                        $packages = explode(",",$customer->iptv_packages);
                        $package['iptv_packages'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->iptv_allacart)){
                        $packages = explode(",",$customer->iptv_allacart);
                        $package['iptv_allacart'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->iptv_base)){
                        $packages = explode(",",$customer->iptv_base);
                        $package['iptv_base'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->iptv_local)){
                        $packages = explode(",",$customer->cable_local);
                        $package['iptv_local'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    $invoiceData["package"] = $this->implodeAssociativeArray($package);
                }  
                

                $invoiceData["payment_date"] = Carbon::now();
                $invoiceData["base_price"] = $base_price;
                // $invoiceData["discount_amount"] = $customer->discount_amount;
                $invoiceData["paid_amount"] = $amount;
                $invoiceData["gst_number"] = $customer->gstin;

                if ($unpaid_invoices_sum) {
                    $invoiceData["current_balance"] = floatval($unpaid_invoices_sum->current_balance) - floatval($amount);
                }
                else {
                    $invoiceData["current_balance"] = $amount;
                }
                $invoiceData["payment_mode"] = 'Cheque';
                // paid invoice from branch
                Invoices::create($invoiceData);
                    $customerpayments = \App\CustomerPayments::select('customer_id')->where('customer_id',$customer->id);
                    $customer_pay = array();
                    $customer_pay['trans_id']=$txnRecord->id;
                    $customer_pay["payment_mode"] = 'Cheque';
                    $maxinvoiceId = \App\Invoices::latest()->value('id');
                    $customer_pay['invoice_id']=$maxinvoiceId;
                    $customerpayments->update($customer_pay);

$package_amount=0;
$totamt=0;
                   if($customer->connection_type == 6) {
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    // Cable Packages
                    if(!empty($customer->iptv_packages)){
                        $packages = explode(",",$customer->iptv_packages);
                        $package['iptv_packages'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_packages=null;

                    if(!empty($customer->iptv_allacart)){
                        $packages = explode(",",$customer->iptv_allacart);
                        $package['iptv_allacart'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                          $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_allacart='';

                    if(!empty($customer->iptv_base)){
                        $packages = explode(",",$customer->iptv_base);
                        $package['iptv_base'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_base='';

                    if(!empty($customer->iptv_local)) {
                        $packages = explode(",",$customer->iptv_local);
                        $package['iptv_local'] = \App\IptvPackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    else
                    $customer->iptv_local='';
                  
                    
                    if(!empty($customer->secure_deposite_amount))
                    {
                    $totamt=$totamt+$customer->secure_deposite_amount;
                    }
                    if(!empty($customer->androidbox_security_deposit))
                    {
                    $totamt=$totamt+$customer->androidbox_security_deposit;
                    }
                     if(!empty($customer->installation_amount))
                    {
                    $totamt=$totamt+$customer->installation_amount;
                    }
                    $base_price=1000;
                    $totamt=$totamt+$package_amount;
                    $details = [
        'custmemail' => $email,
        'base_price'=>$base_price,

        'androidbox_security_deposit'=>$customer->androidbox_security_deposit,
        'secure_deposite_amount'=>$customer->secure_deposite_amount,
        'instaamt'=>$customer->installation_amount,
        'totalamt'=>$totamt,
        'iptv_allacart'=>$customer->iptv_allacart,
        'iptv_packages'=>$customer->iptv_packages,
        'iptv_local'=>$customer->iptv_local,
        'iptv_base'=>$customer->iptv_base,
        'connection_type'=>$customer->connection_type,
        'chequeno'=>$chequeno,

        'issuebank'=>$issuebank,
        'issuedate'=>$issuedate,
        'issuebranch'=>$issuebranch

    ];
                   
   }
   $package_amount=0;
$totamt=0;
                   if($customer->connection_type == 5) {
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    // Cable Packages
                    if(!empty($customer->cable_packages)) {
                        $packages = explode(",",$customer->cable_packages);
                        $cablepack = \App\CablePackages::whereIn('id', $packages)
                        ->pluck('package_name')->implode(',');
                         $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                
                    }
                    if(!empty($customer->cable_allacart)){
                        $packages = explode(",",$customer->cable_allacart);
                        $cableallacart = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                         $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_base)){
                        $packages = explode(",",$customer->cable_base);
                        $cablebase = \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                      $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }

                    if(!empty($customer->cable_local)){
                        $packages = explode(",",$customer->cable_local);
                        $cablelocal= \App\CablePackages::whereIn('id', $packages)->pluck('package_name')->implode(',');
                        $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
                    }
                    if(!empty($customer->installation_amount))
                    {
                       $instaamt=$customer->installation_amount; 
                    }
                    if(!empty($customer->setup_box_amount))
                    {
                    $totamt=$totamt+$customer->setup_box_amount+$package_amount+$instaamt;
                    }
                    
                    //$totamt=$base_price+$totamt;
                    $details = [
        'custmemail' => $email,
        'base_price'=>$base_price,

        'setup_box_amount'=>$customer->setup_box_amount,
        'instaamt'=>isset($instaamt)?$instaamt:0,
        'totalamt'=>$totamt,
        'cablepackages'=>$customer->cable_packages,
        'cableallacart'=>$customer->cable_allacart,
        'cablelocal'=>$customer->cable_local,
        'cablebase'=>$customer->cable_base,
        'connection_type'=>$customer->connection_type,
        'chequeno'=>$chequeno,

        'issuebank'=>$issuebank,
        'issuedate'=>$issuedate,
        'issuebranch'=>$issuebranch
    ];
                   


                    
                   }
                     $instaamt=$customer->installation_amount;
                     $depositamt=$customer->secure_deposite_amount;
                    $totamt=0;
                    if($customer->connection_type == 3) 
                    {
$packdetails = \App\BroadbandPackages::select('package_name')->where('id','=',$customer->package)->first();

$subpackdetails = \App\BroadbandSubPackages::select('sub_plan_name','total')->where('id','=',$customer->sub_package)->first();
 
                    if(!empty($instaamt))
                    {
                    $totamt=$totamt+$instaamt;
                    }
                    if(!empty($depositamt))
                    {
                    $totamt=$totamt+$depositamt;
                    }
                    
                    $totamt=$subpackdetails->total+$instaamt+$depositamt;
                    $details = [
        'custmemail' => $email,
        'price'=>$subpackdetails->total,
        'depositamt'=>$depositamt,
        
        'instaamt'=>$instaamt,
        'totalamt'=>$totamt,
        'packagename'=>$packdetails->package_name,
        'sub-packagename'=>$subpackdetails->sub_plan_name,
        'connection_type'=>$customer->connection_type,
        'chequeno'=>$chequeno,

        'issuebank'=>$issuebank,
        'issuedate'=>$issuedate,
        'issuebranch'=>$issuebranch


    ];
                   

}

                  if($customer->connection_type == 7)
                   {
                       $package_amount=0;
                    $totamt=0;
                    $packages=[];
                    $package = [];
                     $cableallaacart=[];
                    $cablebase=[];
                    $cablelocal=[];
                    $cablepack=[];
                     $instaamt=$customer->installation_amount;
                   
                    // Cable Packages
                    if(!empty($customer->installation_amount))
                    {
                    $package_amount+=$customer->installation_amount;
                    $instaamt=$customer->installation_amount;
                    
                    }
                     if(!empty($customer->secure_deposite_amount))
                    {
                    $package_amount+=$customer->secure_deposite_amount;
                    }
                     if(!empty($customer->androidbox_security_deposit))
                    {
                    $package_amount+=$customer->androidbox_security_deposit;
                    }
                     $packplanamout= \App\ComboSubPackages::where('id', $customer->combo_sub_package)->first();
                    
                    
                     $details = [
        'custmemail' => $email,
       
        'secure_deposite_amount'=>$customer->secure_deposite_amount,
        'androidbox_security_deposit'=>$customer->androidbox_security_deposit,
        'packamount'=>$packplanamout->total,
        'instaamt'=>$instaamt,
        'totalamt'=>$package_amount,
        'combo_packages'=>$customer->combo_package,
        'combo_allacart'=>$customer->combo_allacart,
        'combo_local'=>$customer->combo_local,
        'combo_base'=>$customer->combo_base,
        'connection_type'=>$customer->connection_type,
        'package_plan'=>$customer->combo_sub_package,
         'chequeno'=>$chequeno,
        'issuebank'=>$issuebank,
        'issuedate'=>$issuedate,
        'issuebranch'=>$issuebranch

    ];
                   
           }
                  

    //Mail::to($email)->send(new \App\Mail\PayChequeEmail($details));












                //send sms
                $message = "Dear ".  $_POST["firstname"] . " " . $_POST["lastname"]  . ",%0a We received Rs." . $amount . "  for New Installation, through " . $txn_data['payment_mode'] . ". Your account no is SLJ" . sprintf('%08d', $customer_id) . " for future references. Thank you for choosing us. %0a%0aRegards, %0aSLJ Fiber Networks Pvt.Ltd. Team.";
                //$message = "Your Complaint will be resolved with in 48 hours";
                $mobile = $input['phone']; //"918125449686";
                $sms = new Sms();
                $sms->sendSms($mobile, $message);
                // $sms->sendSms("+919632324012", "cheque payment successfull");

				return redirect($add_technical_url)->with('success_message', "<h3>Thank You. Customer is created successfully</h3>");
            }
        }

			return redirect($all_url);
    }


	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function renewUser($id)
    {
        $customerdetails = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->first();

		$package_amount = 0;
		if($customerdetails->connection_type == 'cable'){

			//Cable Packages
			if(!empty($customerdetails->cable_packages)){
				$packages = explode(",",$customerdetails->cable_packages);
				$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
			}

			if(!empty($customerdetails->cable_allacart)){
				$packages = explode(",",$customerdetails->cable_allacart);
				$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
			}

			if(!empty($customerdetails->cable_base)){
				$packages = explode(",",$customerdetails->cable_base);
				$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
			}

			if(!empty($customerdetails->cable_local)){
				$packages = explode(",",$customerdetails->cable_local);
				$package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
			}
		}   else if($customerdetails->connection_type == 'iptv'){

			//IPTV Packages
			if(!empty($customerdetails->iptv_packages)){
				$packages = explode(",",$customerdetails->iptv_packages);
				$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
			}

			if(!empty($customerdetails->iptv_allacart)){
				$packages = explode(",",$customerdetails->iptv_allacart);
				$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
			}

			if(!empty($customerdetails->iptv_base)){
				$packages = explode(",",$customerdetails->iptv_base);
				$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
			}

			if(!empty($customerdetails->iptv_local)){
				$packages = explode(",",$customerdetails->cable_local);
				$package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
			}
		}   else if($customerdetails->connection_type == 'broadband'){
			if($customerdetails->sub_package >0){
				$packagedetails = \App\BroadbandSubPackages::find($customerdetails->sub_package);
				$package_amount = $packagedetails->total;
			}
		}   else if($customerdetails->connection_type == 'combo') {
			if($customerdetails->combo_sub_package >0){
				$packagedetails = \App\ComboSubPackages::find($customerdetails->combo_sub_package);
				$package_amount = $packagedetails->total;
			}
		}

		//To Avoid View Cache
		$random_value = mt_rand(10000,10000000);

		return view('customers.renew-process-payment',[
          'random_value'=>$random_value,
          'customerdetails'=>$customerdetails,
          'package_amount'=>$package_amount
        ]);
    }


	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function renewResponse()
    {
        $user = Auth::user();
        $roles = $user->getRoleNames(); 

        $pay_later_url='admin/customers/new';
        $all_url = 'admin/customers';
        $add_technical_url='admin/customers/technical';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $pay_later_url=$roles[0].'/customers/new';
            $add_technical_url=$roles[0].'/customers/technical';
            $all_url = $roles[0].'/customers';
        }
		if(isset($_POST) && count($_POST)>0){
            $inwardFlowTypeQuery = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->first();

        if (!$inwardFlowTypeQuery) {
            Session::flash('error', "payment flow type inward required");
            return redirect('admin/accounts/paymenttype')->with('error', 'payment flow type inward required');
        } else if ($inwardFlowTypeQuery) {
            $inwardFlowType = $inwardFlowTypeQuery->id;

			$status = $_POST["status"];
			$firstname = $_POST["firstname"];
			$amount = $_POST["amount"];
			$txnid = $_POST["txnid"];
			$posted_hash = $_POST["hash"];
			$key = $_POST["key"];
			$productinfo = $_POST["productinfo"];
			$email = $_POST["email"];

			$salt = env("SALT"); //Please change this value with live salt for production

			if (isset($_POST["additionalCharges"])) {
				$additionalCharges=$_POST["additionalCharges"];
				$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}else {
				$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
			}
			$hash = hash("sha512", $retHashSeq);

			if ($hash != $posted_hash || $status !='success') {
				return redirect('admin/customers')->with('error_message', "<h3>Invalid Transaction. Please try again </h3>");
			}else {
				$paymentdetails = explode("__",$productinfo);
				$customer_id = $paymentdetails[1];

				$customer = \App\Customers::find($customer_id);
				if($customer->sub_package > 0){
					$sub_package = \App\BroadbandSubPackages::find($customer->sub_package);
					if($sub_package->time_unit >0){
						if($sub_package->unit_type == 'month'){
							$time = 30 * $sub_package->time_unit;
						}else{
							$time = $sub_package->time_unit;
						}
					}
				}

				if($customer->combo_sub_package > 0){
					$sub_package = \App\ComboSubPackages::find($customer->combo_sub_package);
					if($sub_package->time_unit >0){
						if($sub_package->unit_type == 'month'){
							$time = 30 * $sub_package->time_unit;
						}else{
							$time = $sub_package->time_unit;
						}
					}
				}

				if(!empty($customer->expiry_date)){
					$expdate = date("Y-m-d",strtotime($customer->expiry_date));
				}else{
					$expdate = date("Y-m-d");
				}

				$expiry_date = date('Y-m-d', strtotime($expdate.''.$time.'days'));

				$customer_data = array();

				$customer_data['expiry_date'] = $expiry_date;
				$customer_data['status'] = "Y";

				$customer_data['current_status'] = "active";
				$customer->update($customer_data); //Update details

				$txn_data = array();
				$txn_data['txnid'] = $txnid;
				$txn_data['amount'] = $amount;
				$txn_data['payment_source'] = $_POST['payment_source'];
                $txn_data['payment_type'] = "renew";
				// txns to slj system
				$txn_data['payment_flow_type'] = $inwardFlowType;
				// customer user id
				$txn_data['user_id'] = $customer->user_id;
				// 3 - customer 
				$txn_data['payment_from'] = 3;
				$txn_data['payment_message'] = $productinfo;
				$txn_data['status'] = $status;
				$txn_data['customer_id'] = $customer_id;
				$txn_data['payment_mode'] = 'Payment Gateway';

				//Txs
				\App\Transactions::create($txn_data);

				return redirect($all_url)->with('success_message', "<h3>Successfully Renewed Your Account. Order status is <b>". $status ."</b>.</h3>"."<h4>Transaction ID for this transaction is <b>".$txnid."</b>.</h4>"."<h4>We have received a payment of Rs. <b>" . $amount . "</b>.</h4>");
            }
          }
		} else {
			return redirect($all_url);
		}

		//return view('customers::payment-response',['status'=>$status,'firstname'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'posted_hash'=>$posted_hash,'key'=>$key,'productinfo'=>$productinfo,'email'=>$email,'salt'=>$salt]);
    }

	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
     public function editcompetator($id)
     {
           $competatordetails =  \App\Competator::where('id',$id)->select('slj_competators.*')
                ->first();
        
        return view('customers.editcompetators',['competatordetails'=>$competatordetails]);


     }
       public function editprospect($id)
     {
           $prospectdetails =  \App\Prospect::where('id',$id)->select('prospect.*')
                ->first();
        
        return view('customers.editprospect',['prospectdetails'=>$prospectdetails]);


     }
   
          public function updatecompetator(Request $request,$id)
     {
          
        return view('customers.competator');


     }
    public function edit($id)
    {
        $customerdetails = $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->first();

        $franchise_list=array();

		//$packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');

		$cabledata = \App\CablePackages::where('status','Y')->select('package_name as name', 'id','type')->get();

		$cabledatabytype = array();
		foreach($cabledata as $cable){
			$data = array();
			$data['id'] = $cable['id'];
			$data['name'] = $cable['name'];
			$type = $cable['type'];
			$cabledatabytype[$type][] = $data;
		}


		$iptvdata = \App\IptvPackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		$iptvdatabytype = array();
		foreach($iptvdata as $iptv){
			$data = array();
			$data['id'] = $iptv['id'];
			$data['name'] = $iptv['name'];
			$type = $iptv['type'];
			$iptvdatabytype[$type][] = $data;
		}


		$distributors = \App\Distributors::where('id',$customerdetails->distributor)->pluck('distributor_name as name', 'id');
		$subdistributors = \App\Subdistributors::where('id',$customerdetails->subdistributor)->pluck('subdistributor_name as name', 'id');
        $branches = \App\Branches::where('city',$customerdetails->city)->pluck('branch_name as name', 'id');
        $franchises = \App\Franchises::where('id',$customerdetails->franchise)->pluck('franchise_name as name', 'id');
        $cities = \App\City::pluck('name', 'id');
		$states = \App\State::where('status','Y')->pluck('name', 'id');

        $olt = \App\OLT::where('franchise_id',$customerdetails->franchise)->pluck('id as name', 'id');

        $dp = \App\DP::pluck('id as name', 'id');
        $fh = \App\FH::pluck('id as name', 'id');



        $cities = \App\City::where('status','Y')->pluck('name', 'id');
        $packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');
        $subpackages = \App\BroadbandSubPackages::where('status','Y')->where('package',$customerdetails->package)->pluck('sub_plan_name as name', 'id');

		$combopackages = \App\ComboPackages::where('status','Y')->pluck('package_name as name', 'id');
        $combosubpackages = \App\ComboSubPackages::where('status','Y')->where('package',$customerdetails->combo_package)->pluck('sub_plan_name as name', 'id');


		//$cablepackages = \App\CablePackages::where('type','packages')->select('package_name as name', 'id')->get();

        //$cableallacart = \App\CablePackages::where('type','allacart')->select('channels_description as name', 'id')->get();



        return view('customers.edit',['combopackages'=>$combopackages,'franchise_list'=>$franchise_list, 'combosubpackages'=>$combosubpackages, 'cabledata'=>$cabledata, 'cabledatabytype'=>$cabledatabytype,'iptvdatabytype'=>$iptvdatabytype,'distributors'=>$distributors,'subdistributors'=>$subdistributors,'branches'=>$branches,'franchises'=>$franchises,'states'=>$states,'cities'=>$cities,'packages'=>$packages,'subpackages'=>$subpackages,'customerdetails'=>$customerdetails,'olt'=>$olt,'dp'=>$dp,'fh'=>$fh,]);
      //  return view('customers::edit');

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $customer = \App\Customers::find($id);

        $user = \App\User::find($customer->user_id);

        $requestdata = $request->all();

        $data = array();
        $data['name'] = $requestdata['first_name']." ".$requestdata['last_name'];
        $data['first_name'] = $requestdata['first_name'];
        $data['last_name'] = $requestdata['last_name'];
        $data['email'] = $requestdata['email'];
        $data['mobile'] = $requestdata['mobile'];
        $user->update($data);

        $customerdata = array();
		 if(!empty($requestdata['state'])){
        $customerdata['state'] = $requestdata['state'];
        }
        if(!empty($requestdata['city'])){
        $customerdata['city'] = $requestdata['city'];
        }
        if(!empty($requestdata['distributor'])){
	$customerdata['distributor'] = $requestdata['distributor'];
        }
		 if(!empty($requestdata['subdistributor'])){
	$customerdata['subdistributor'] = $requestdata['subdistributor'];
        }
        if(!empty($requestdata['branch'])){
        $customerdata['branch'] = $requestdata['branch'];
        }
        if(!empty($requestdata['franchise'])){
        $customerdata['franchise'] = $requestdata['franchise'];
        }
        $customerdata['connection_type'] = $requestdata['connection_type'];

        $customerdata['package'] = $requestdata['package'];
        $customerdata['sub_package'] = $requestdata['sub_package'];
        $customerdata['f_name_c_name'] = $requestdata['f_name_c_name'];
        $customerdata['alt_mobile_num'] = $requestdata['alt_mobile_num'];
        //$customerdata['caf_form'] = $requestdata['caf_no'];

        $customerdata['gstin'] = $requestdata['gstin'];
        $customerdata['installation_amount'] = $requestdata['installation_amount'];
        $customerdata['secure_deposite_amount'] = $requestdata['secure_deposite_amount'];
        $customerdata['setup_box_amount'] = $requestdata['setup_box_amount'];
        $customerdata['billing_address'] = $requestdata['billing_address'];
        $customerdata['installation_address'] = $requestdata['installation_address'];

        $customerdata['landmark'] = $requestdata['landmark'];
        //$customerdata['user_city'] = $requestdata['user_city'];
        $customerdata['pincode'] = $requestdata['pincode'];

        if($requestdata['connection_type'] == 'cable'){
            if(isset($requestdata['cablepackage']) && count($requestdata['cablepackage'])>0){
                $customerdata['cable_packages'] = implode(",",$requestdata['cablepackage']);
            }else{
			    $customerdata['cable_packages'] = '';
			}

            if(isset($requestdata['allacart']) && count($requestdata['allacart'])>0){
                $customerdata['cable_allacart'] = implode(",",$requestdata['allacart']);
            }else{
			    $customerdata['cable_allacart'] = '';
			}

			if(isset($requestdata['cablelocal']) && count($requestdata['cablelocal'])>0){
                $customerdata['cable_local'] = implode(",",$requestdata['cablelocal']);
            }else{
			    $customerdata['cable_local'] = '';
			}

			if(isset($requestdata['cablebase']) && count($requestdata['cablebase'])>0){
                $customerdata['cable_base'] = implode(",",$requestdata['cablebase']);
            }else{
			    $customerdata['cable_base'] = '';
			}

            unset($customerdata['package']);
            unset($customerdata['sub_package']);
        }else if($requestdata['connection_type'] == 'broadband'){
            $customerdata['cable_packages'] = "";
            $customerdata['cable_allacart'] = "";
			$customerdata['cable_base'] = "";
			$customerdata['cable_local'] = "";
        }else{
            if(isset($requestdata['cablepackage']) && count($requestdata['cablepackage'])>0){
                $customerdata['cable_packages'] = implode(",",$requestdata['cablepackage']);
            }else{
			    $customerdata['cable_packages'] = '';
			}

            if(isset($requestdata['allacart']) && count($requestdata['allacart'])>0){
                $customerdata['cable_allacart'] = implode(",",$requestdata['allacart']);
            }else{
			    $customerdata['cable_allacart'] = '';
			}

			if(isset($requestdata['cablelocal']) && count($requestdata['cablelocal'])>0){
                $customerdata['cable_local'] = implode(",",$requestdata['cablelocal']);
            }else{
			    $customerdata['cable_local'] = '';
			}

			if(isset($requestdata['cablebase']) && count($requestdata['cablebase'])>0){
                $customerdata['cable_base'] = implode(",",$requestdata['cablebase']);
            }else{
			    $customerdata['cable_base'] = '';
			}
        }

		//Customer Photo
        $photo = '';
        if($request->hasFile('customer_pic')) {
            $photo = $request->file('customer_pic') ;
            $fileName = $user->id."-photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/customers/photos/' ;
            $photo->move($destinationPath,$fileName);
            // $customer_photo_name = $fileName ;
            $customerdata['customer_pic'] = $fileName;
        }


        //Address Proof
        $photo = '';
        if( $request->hasFile('address_proof')) {
            $photo = $request->file('address_proof') ;
            $fileName = $user->id."-address-proof-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/customers/address-proofs/' ;
            $photo->move($destinationPath,$fileName);
            // $address_proof_name = $fileName ;
            $customerdata['address_proof'] = $fileName;
        }
        $photo = '';

        //Identity Proof
        if($request->hasFile('identity_proof')) {
            $photo = $request->file('identity_proof') ;
            $fileName = $user->id."-identity-proof-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/customers/identity-proofs/' ;
            $photo->move($destinationPath,$fileName);
            $customerdata['identity_proof'] = $fileName;
        }

        $customer->update($customerdata); //Update details
        
         $user = Auth::user();
        $roles = $user->getRoleNames(); 
         $url='admin/customers';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $url = $roles[0].'/customers';
        }
        return redirect($url)->with('success', 'Customer details updated successfully.');

    }
    public function DeviceStore(Request $request)
    {
        
        
		$requestdata = $request->all();
		$customerdata = array();
		if(!empty($requestdata['cmp_name']))
		{
		$customerdata['cmp_name'] = $requestdata['cmp_name'];
		}
		if(!empty($requestdata['model_number']))
		{
        $customerdata['model_number'] = $requestdata['model_number'];
		}
        if(!empty($requestdata['serial_number']))
		{
        $customerdata['serial_number'] = $requestdata['serial_number'];
		}
        $custeremail=$requestdata['cusmail'];
        $cusid=$requestdata['cusid'];
        $contype=$requestdata['contype'];
        
        if(!empty($requestdata['stb_cmp_name']))
        {
            $customerdata['stb_cmp_name']=$requestdata['stb_cmp_name'];
        }
        if(!empty($requestdata['stb_model_number']))
        {
            $customerdata['stb_model_number']=$requestdata['stb_model_number'];
        }
        if(!empty($requestdata['stb_serial_number']))
        {
            $customerdata['stb_serial_number']=$requestdata['stb_serial_number'];
        }
        $itemCount=0;
       if(isset($requestdata['ontsta']) && count($requestdata['ontsta'])>0){
           $cusid=$requestdata['cusid'];
        
           $input=array();
           $input['cus_id']=$cusid;
           $input['contype']=$contype;
           
            $itemCount=count($requestdata['ontsta']);
             $serial_no = \App\MissingDevices::orderBy('id', 'desc')->first(); // gets the whole row
             if(empty($serial_no->id))
             $maxid=1;
             else
             {
        $maxid = $serial_no->id;
        $maxid=$maxid+1;
             }
        $input['missing_id']=$maxid;
       //  $custmail=$request['customemail'];
       
       if(empty($maxid))
       $maxid=0;
          $missval=0;
        $customerid=$requestdata['cusid'];
        $empid=$requestdata['empid'];
           for($x = 0; $x <$itemCount; $x++)
            {
                $input['missing_device']=$requestdata['ontsta'][$x];
                $input['cus_id']=$customerid;
                
                if($requestdata['ontsta'][$x]=="stbm" || $requestdata['ontsta'][$x]=="wrm" || $requestdata['ontsta'][$x]=="ftnm")
                {
                    $missval=1;
                }
       
                \App\MissingDevices::create($input);
            }
           
           
            
            
       }
       $empid=$requestdata['empid'];
       $empdata = \App\StockProducts::where('current_user_id',$empid)->first();
       $emprec = \App\StockProducts::find($empdata->id);
       $inputd=array();
       $inputd['employee_status']="available";
       $query = $emprec->update($inputd);
      
       
        
       if($contype==5)
       {
             $details = [
        'custmemail' => $custeremail,
         'stbcompany'=>$requestdata['stb_cmp_name'],
        'stbmodelnumber'=>$requestdata['stb_model_number'],
        'stbserialnumber'=>$requestdata['stb_serial_number'],
        'contype'=>$contype,
        'itemCount'=>$itemCount,
        'maxid'=>$maxid,
        'missval'=>$missval
       
        
                    ];
                    
         if($query)
       {
           
           
       }
       }
       if($contype==7)
       {
             $details = [
        'custmemail' => $custeremail,
        'ontcompany'=>$requestdata['cmp_name'],
        'ontmodelnumber'=>$requestdata['model_number'],
        'ontserialnumber'=>$requestdata['serial_number'],
         'stbcompany'=>$requestdata['stb_cmp_name'],
        'stbmodelnumber'=>$requestdata['stb_model_number'],
        'stbserialnumber'=>$requestdata['stb_serial_number'],
        'contype'=>$contype,
        'itemCount'=>$itemCount,
        'maxid'=>$maxid,
        'missval'=>$missval
       
       
       
       
        
                    ];
       }
        if($contype==3)
        {
                  $details = [
        'custmemail' => $custeremail,
        'ontcompany'=>$requestdata['cmp_name'],
        'ontmodelnumber'=>$requestdata['model_number'],
        'ontserialnumber'=>$requestdata['serial_number'],
        'contype'=>$contype,
        'itemCount'=>$itemCount,
        'maxid'=>$maxid,
        'missval'=>$missval
       
       
       
                       ];
        }          
        if($missval!=1)
    Mail::to($custeremail)->send(new \App\Mail\PickupDevice($details));


            
    
         $kk="disconnect";
         $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status',$kk)
               // ->whereDate('expiry_date', '>', Carbon::now()) // added by durga
                ->orderBy('slj_customers.id')
                ->paginate(20);
       
          return view('customers.reqdiscon',['data'=>$data]);
  
        
        
    }
    public function GetEquipment($cusid)
    {
         $user = Auth::user();
        $roles = $user->getRoleNames(); 
       
        $stockdata=array();
        $empdata=array();
         $empdata = \App\Customers::where('id',$cusid)->get();
       $st="STB";
       $on="ONT";
        $stockontdata = \App\StockProducts::where('customer_id',$cusid)->where('catname',$on)->first();
        
        $customerid=$cusid;
        
        
        $stockstbdata = \App\StockProducts::where('customer_id',$cusid)->where('catname',$st)->first();
     
    if(!empty($stockontdata))
      $empdata = \App\Employees::where('user_id',$stockontdata->current_user_id)->first();
      else
      $empdata = \App\Employees::where('user_id',$stockstbdata->current_user_id)->first();
      
     $cusdata=\App\Customers::where('id',$cusid)->first();
     $cusdata1= \App\User::where('id',$cusdata->user_id)->first();
     
  
    $contype=$cusdata->connection_type;     
     $cusname=$cusdata1->name;
        
        
return view('customers.pickupequipment',['stockontdata'=>$stockontdata,'stockstbdata'=>$stockstbdata,'empdata'=>$empdata,'cusname'=>$cusname,'contype'=>$contype,'cusdata1'=>$cusdata1,'customerid'=>$customerid]);
   
    
        
        
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function addTechnical($id)
    {
        
        $customerdetails = $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->first();

        $olt = \App\OLT::where('branch',$customerdetails->branch)->pluck('id as name', 'id');
    $franchisedetails = \App\Franchises::where('id',$customerdetails->franchise)->first();
    $ipdetails = \App\Ippool::where('franchise',$customerdetails->franchise)->where('status','y')->first();
        $dp=$fh=$fh_port=array();
        $dp = \App\DP::where('franchise',$customerdetails->franchise)->pluck('generate_dp as name', 'id');
        $dp1 = \App\DP::where('franchise',$customerdetails->franchise)->pluck('generate_dp as name', 'id');
        $fh = \App\FH::where('franchise',$customerdetails->franchise)->pluck('generate_fh_id as name', 'id');
        
        $fh_port = \App\FH::where('franchise',$customerdetails->franchise)->pluck('dp_port as name', 'id');
        $connection_types = \App\ConnectionType::where('id',$customerdetails->connection_type)->pluck('id');
      
       // print_r($connection_types);die;
        //$dp=$fh=$fh_port=array();
        /*
		 $query=\App\Ipaddresspool::select('count(Ip_number) as copies')
        ->groupBy('IpName','Ip_number')
        ->first();
        
            if(empty($query->copies))
                    $ipnumber=2;
                else
                    $ipnumber=($query->copies)+2;
                    */
		
        return view('customers.add-technical',['dp'=>$dp,'dp1'=>$dp1,'fh'=>$fh,'fh_port'=>$fh_port,'olt'=>$olt,'customerdetails'=>$customerdetails,'franchisedetails'=>$franchisedetails,'ipdetails'=>$ipdetails,'connection_types'=>$connection_types]);
    }
    
    /**
     * 
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateTechnical(Request $request, $id)
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $customer = \App\Customers::find($id);
        $requestdata = $request->all();
        //  dd($requestdata);
        $customerdata = array();
      //  $customerdata['olt'] = $requestdata['olt'];
        $customerdata['dp'] = $requestdata['dp'];
        $customerdata['fh'] = $requestdata['fh'];
        $customerdata['fh_color'] = '';
        $customerdata['fh_port'] = $requestdata['fh_port'];

        $customerdata['fiber_length'] = $requestdata['fiber_length'];

        $customerdata['long_lat'] = $requestdata['long_lat'];
        $customerdata['technical_details_status'] = "Y";
        $customerdata['technical_details_c_date'] = date("Y-m-d");
        $customerdata['current_status'] = "activation";
        $customerdata['eid']=$user_id;
           $customer->update($customerdata); //Update details
        $ippool=array();
        if(!empty($requestdata['imp']))
        $impval=$requestdata['imp'];
      
        $requestdata['pool_name'] =   isset($requestdata['pool_name'])?$requestdata['pool_name']: 0;
       $ippool['Ip_number']= isset($requestdata['ipnum'])?$requestdata['ipnum']: 0;
        $ippool['customer_id']=$id;
        // $ippool['IpName']=$requestdata['pool_name'];
        $ippool['status']="y";
        \App\Ipaddresspool::create($ippool);
        
        
                /*
        else
        {
             $ippool['status']="y";
             $ippool['Ip_number']=$requestdata['ipnum'];
   
	             $updatedata = \App\Ipaddresspool::where('Ip_number',$requestdata['ipnum'])->first();
 
	            $updatedata->update($ippool);
        }
        */
        
        //$reserves = DB::table('reserves')->select(DB::raw('*, count(*) as count_row'))->groupBy('day')->get();
        $data = \App\Ipaddresspool::select(DB::raw('count(Ip_number) as count_row'))
	                               ->where('IpName',$requestdata['pool_name'])
	                               ->groupBy("IpName")
	                               ->get();
	       $countdata=count($data);
	       if($countdata>=1)
	       {
	   foreach($data as $d)
	   {
	       $count=$d->count_row;
	   }
	   if($count==252)
	   {
	            $updatepool=array();
	            $updatepool['status']="n";
	             $poolname = \App\Ippool::where('pool_name',$requestdata['pool_name'])->first();
 
	            $poolname->update($updatepool);
	   }
	       }
        
        
        
        
       // $query=\App\Ipaddresspool
        
        
        

     
        $user = Auth::user();
        $roles = $user->getRoleNames(); 
        
        $url='admin/customers/activation';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $url = $roles[0].'/customers/activation';
        }
        return redirect($url)->with('success', 'Customer technical details added successfully.');

    }




    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function activateUser($id)
    {
        $customerdetails = $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email as email')
                ->where('slj_customers.id','=',$id)
                ->first();
       $franchise_list = \App\Franchises::pluck('franchise_name','op_id');

       $operator = \App\Franchises::where('id',$customerdetails->franchise)->select('op_id')->first();
                
      

        return view('customers.user-activate',['customerdetails'=>$customerdetails,'franchise_list'=>$franchise_list,'sub_id'=>$customerdetails->sub_id,'operator'=>$operator,'customer_id'=>$id]);
    }
	
    public function smartboxActivateUser($id)
    {
       

            $smartbox_details = $data = \App\SmartBox::select('smart_box.*')
                    ->where('smart_box.customer_id','=',$id)
                    ->first(); 
                    
        // dd($smartbox_details);
         $smartcard  = $smartbox_details['smart_card'];//='100C0090000000060218';
         $box_id  = $smartbox_details['box_id'];
         $sub_id  = $smartbox_details['sub_id'];// = 12963;
         $operator_id  = $smartbox_details['op_id'];
         $customer_id  = $smartbox_details['customer_id'];
         $smartbox_running_id  = $smartbox_details['id'];
 
         $access_token = 'ei0ff1d675eec4c016fa86a4d12b';
         $base_url = config('constants.base_url');
	    $url = $base_url.'RSMS/Base_PackageList?sub_id='.$sub_id.'&smartcard='.$smartcard;
            
        $headers = array(
          "Accept: application/json",
            'Authorization: ' . $access_token
        );
     
            
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         $response = curl_exec($ch);
                
        curl_close($ch);
     
        //$input['api_response'] = $response;
        //$input['api_request'] = $json_data;
        // Decode the JSON string into a PHP array
        $packages = json_decode($response, true);

        // Print the PHP array
        // echo "<pre>";print_r($packages);die; 

           return view('customers.firsttime-activation',['smartcard'=>$smartcard,'box_id'=>$box_id,'sub_id'=>$sub_id,'operator_id'=>$operator_id,'customer_id'=>$customer_id,'packages'=>$packages,'smartbox_running_id'=>$smartbox_running_id]);

      
    }

	 public function updateActivateUser(Request $request, $id)
    {
		 $data = $request->all();
        //dd($data);
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');
		 $sub_id = isset($data['sub_id']) ? $data['sub_id'] : '0';
		 $cas_type = isset($data['cas_type']) ? $data['cas_type'] : '';
		 $smartcard = isset($data['smart']) ? $data['smart'] : '';
		 $box_id = isset($data['subscribername']) ? $data['subscribername'] : '';
		 $operator_id = isset($data['operator_id']) ? $data['operator_id'] : '';
         $stb_company = isset($data['stb_company']) ? $data['stb_company'] : 1;
         $stb_model_number = isset($data['stb_model_number']) ? $data['stb_model_number'] : '';

         $customer_id = isset($data['customer_id']) ? $data['customer_id'] : '0';
		
		 
	  $url = $base_url.'RSMS/AddSmartcard?sub_id='.$sub_id.'&smartcard='.$smartcard.'&box_id='.$box_id.'&operator_id='.$operator_id;
		
		 $headers = array(
            "Accept: application/json",
            'Authorization: ' . $access_token
        );
		
               
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         $response = curl_exec($ch);
		          
        curl_close($ch);
		
		$input['api_response'] = $response;
        $input['api_request'] = $url;
        
        $data = json_decode(($response), true);
        $id = Auth::user()->id;

        $input['cas_type'] = $cas_type;
        $input['smart_card'] = $smartcard;

        $input['box_id'] = $box_id;
        $input['stb_company'] = $stb_company;
        $input['stb_model_number'] = $stb_model_number;
        $input['op_id'] = $operator_id;
        $input['sub_id'] = $sub_id;
        
        $input['customer_id'] = $customer_id;
        $input['cas_type'] = $cas_type;

        // $input['api_request'] = "";
        // $input['api_response'] = $response;
        $input['api_url'] = $url;
        $input['created_by'] = $id;
      
		
		
        //Customer
        $smart_box = \App\SmartBox::create($input);

    //update customer table



    $customerdata = array();
    $customerdata['smartcard_added_user'] = 1; 
    $customer = \App\Customers::where('id', $customer_id);
    $customer->update($customerdata);
 
      //  return redirect('admin/customers/active')->with('success', 'updated Activate User details added successfully. !');
	//    return view('customers.firsttime-activation',['smartcard'=>$smartcard,'box_id'=>$box_id,'sub_id'=>$sub_id,'operator_id'=>$operator_id]);
	   return view('customers.smartbox_users',['smartcard'=>$smartcard,'box_id'=>$box_id,'sub_id'=>$sub_id,'operator_id'=>$operator_id]);
   
		
	}
	
	

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
   /*  public function updateActivateUser(Request $request, $id)
    {
        $customer = \App\Customers::find($id);
            $custmerid=$id;
		$validatedData = $request->validate([
            'password' => 'required',
        ]);

   
    
    
    
		$requestdata = $request->all();
		$customerdata = array();
		$customerdata['stb_num'] = $requestdata['stb_num'];
        $customerdata['stb_model'] = $requestdata['stb_model'];
        $customerdata['stb_company'] = $requestdata['stb_company'];
        if(!empty($requestdata['stb_num1']))
        {
    	$ontnum = $requestdata['stb_num1'];
        $ontmodel= $requestdata['stb_model1'];
        $ontcompany = $requestdata['stb_company1'];
        }
        
        
        
        $em=$requestdata['custem'];
   $user = Auth::user();
        $id = Auth::user()->id;
       $roles = $user->getRoleNames(); 
       
  
       
        $stockserialnumber = \App\StockProducts::where('serial_no',$customerdata['stb_num'])->first();
        if(!empty($stockserialnumber->serial_no))
       {
      
        $stockdata=array();
        
         if($roles[0]=='franchise')
       $stockdata['franchise_status']='transfered';
         if($roles[0]=='branch')
       $stockdata['branch_status']='transfered';
        if($stockserialnumber->employee_status=="available")
        {
               $stockdata['employee_status']='transfered';
               	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Stock Transfered";
     \App\Employees_Logs::create($employeedata);
        }
       
        $stockdata['customer_id']=$custmerid;
     
        
        
        $stockserialnumber->update($stockdata);
        
        
       }
        
		if ($requestdata['renewal_cycle'] == 'schedule')
		{
			$originalDate = $requestdata['schedule_date'];
			$schedule_date = date("Y-m-d", strtotime($originalDate));
			$customerdata['schedule_date'] = $schedule_date;
			$customerdata['current_status'] = "scheduled";
			$customerdata['status'] = "N";
		}else{
			$time = 30;
			if($customer->connection_type == 5 || $customer->connection_type == 6) {
				$time = '30';
			}else{
				if($customer->sub_package > 0){
					$sub_package = \App\BroadbandSubPackages::find($customer->sub_package);

					if($sub_package->time_unit >0){
						if($sub_package->unit_type == 'month'){
							$time = 30 * $sub_package->time_unit;
						}else{
							$time = $sub_package->time_unit;
						}
					}
				}

				if($customer->combo_sub_package > 0){
					$sub_package = \App\ComboSubPackages::find($customer->combo_sub_package);
					if($sub_package->time_unit >0){
						if($sub_package->unit_type == 'month'){
							$time = 30 * $sub_package->time_unit;
						}else{
							$time = $sub_package->time_unit;
						}
					}
				}
			}
			$curdate = date('Y-m-d');

			$expiry_date = date('Y-m-d', strtotime($curdate.''.$time.'days'));
	    	$curtime = date('H:i:s');
            $expiry_date = @date("Y-m-d H:i:s",strtotime($expiry_date.$curtime)) ;
			$customerdata['expiry_date'] = $expiry_date;
			$customerdata['status'] = "Y";
			$customerdata['current_status'] = "activated";
			$customerdata['active_updated_date'] = Carbon::now();
		}


		$user = \App\User::find($customer->user_id);

        $userdata = array();
        $userdata['password'] = Hash::make($requestdata['password']);
        $userdata['status'] = "Y";

        //Update user details
	    $user->update($userdata);

        $customerdata['renewal_cycle'] = $requestdata['renewal_cycle'];
     	$customer->update($customerdata); //Update customer details

        $user = Auth::user();
        $roles = $user->getRoleNames();
        $url='admin';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $url=$roles[0];
        }            
        
          if($customer->connection_type == 3) 
                    {
                   $stbserialno=$requestdata['stb_num'];
                $stbmodel= $requestdata['stb_model'];
                $stbcompany = $requestdata['stb_company'];
$packdetails = \App\BroadbandPackages::select('package_name')->where('id','=',$customer->package)->first();

$subpackdetails = \App\BroadbandSubPackages::select('sub_plan_name','time_unit')->where('id','=',$customer->sub_package)->first();
 $ctype="broadband";
        
             $details = [
        'packagename'=>$packdetails->package_name,
        'custmemail'=>$customer->email,
        'sub-packagename'=>$subpackdetails->sub_plan_name,
        'time-duration'=>$subpackdetails->time_unit,
        'connection'=>$ctype,
        'stbserialno'=>$stbserialno,
        'stbmodel'=>$stbmodel,
        'stbcompany'=>$stbcompany
        


    ];
                   

                    }
                    if($customer->connection_type == 5)
                    {
                         $stbserialno=$requestdata['stb_num'];
                $stbmodel= $requestdata['stb_model'];
                $stbcompany = $requestdata['stb_company'];
$packdetails = \App\CablePackages::select('package_name')->where('id','=',$customer->cable_packages)->first();


                $ctype="cable";
        
                    $details = [
        'packagename'=>$packdetails->package_name,
        'custmemail'=>$customer->email,
        'connection'=>$ctype,
        'stbserialno'=>$stbserialno,
        'stbmodel'=>$stbmodel,
        'stbcompany'=>$stbcompany
        
   
    ];
                   

} 
 if($customer->connection_type == 7) 
                    {
                         $ontserialno=$requestdata['stb_num'];
                $ontmodel= $requestdata['stb_model'];
                $ontcompany = $requestdata['stb_company'];
                $stbserialno=$requestdata['stb_num1'];
                $stbmodel= $requestdata['stb_model1'];
                $stbcompany = $requestdata['stb_company1'];

$subpackdetails = \App\ComboSubPackages::select('package','time_unit')->where('id','=',$customer->combo_sub_package)->first();
$packdetails = \App\ComboPackages::select('package_name')->where('id','=',$subpackdetails->package)->first();

 $ctype="combo";
        
                
        
                    $details = [
        'packagename'=>$packdetails->package_name,
        'custmemail'=>$customer->email,
                'time-duration'=>$subpackdetails->time_unit,
                    'connection'=>$ctype,
                    'ontserialno'=>$ontserialno,
        'ontmodel'=>$ontmodel,
        'ontcompany'=>$ontcompany,
        'stbserialno'=>$stbserialno,
        'stbmodel'=>$stbmodel,
        'stbcompany'=>$stbcompany
        
   

      
    ];
                   

}
 if($customer->connection_type == 6) 
                    {
                         $stbserialno=$requestdata['stb_num'];
                $stbmodel= $requestdata['stb_model'];
                $stbcompany = $requestdata['stb_company'];
$packdetails = \App\IptvPackages::select('package_name')->where('id','=',$customer->iptv_packages)->first();

$ctype="iptv combo";
 
                
        
                    $details = [
        'packagename'=>$packdetails->package_name,
        'custmemail'=>$customer->email,
                         'connection'=>$ctype,
                         'stbserialno'=>$stbserialno,
        'stbmodel'=>$stbmodel,
        'stbcompany'=>$stbcompany
        
   
       
    ];
                   

}
  Mail::to($em)->send(new \App\Mail\ActiveEmail($details));

        
        
		if ($requestdata['renewal_cycle'] == 'schedule')
		{
			return redirect($url.'/customers')->with('success', 'Customer Activation Scheduled Successfully.');
		}else{
			return redirect($url.'/customers')->with('success', 'Customer activated successfully.');
		}

    } */

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
	 
	  public function firstTimeActivation(Request $request)
    {
		 $data = $request->all();
        //    echo "<pre>";print_r($data);die;
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');
		 $sub_id = isset($data['sub_id']) ? $data['sub_id'] : '0';		 
		 $smartcard = isset($data['smart']) ? $data['smart'] : '';
		 $plan_type = isset($data['plan_type']) ? $data['plan_type'] : 1;
		 $plan = isset($data['plan']) ? $data['plan'] : '';
         $package_id = isset($data['package']) ? $data['package'] :'';
         $date = isset($data['date']) ? $data['date'] :'';
         $smartbox_running_id = isset($data['smartbox_running_id']) ? $data['smartbox_running_id'] :'';
         $customer_id = isset($data['customer_id']) ? $data['customer_id'] :'';

         $ip = "192.168.70.254";
		 $customer_pay = "false";
		
		 
	  $url = $base_url.'RSMS/FirsttimeActivation?sub_id='.$sub_id.'&smartcard='.$smartcard.'&plan_type='.$plan_type.'&plan='.$plan.'&package_id='.$package_id.'&ip='.$ip.'&customer_pay='.$customer_pay;
	  

		
		 $headers = array(
            "Accept: application/json",
            'Authorization: ' . $access_token
        );
		
               
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
		          
        curl_close($ch);
		
		//$input['api_response'] = $response;
        //$input['api_request'] = $json_data;
        
        $data = json_decode(($response), true);
        $id = Auth::user()->id;
		
		// $input['sub_id'] = $sub_id;      
        // $input['smart_card'] = $smartcard;

        $input['plan_type'] = $plan_type;
        $input['plan'] = $plan;
        $input['package'] = $package_id;
        $input['ip_address'] = $ip;
        if(!empty($date)){
         $input['date'] = date("Y-m-d",strtotime($date));
        }
       
        // $input['customer_pay'] = $customer_pay;

        $input['first_time_activation_api'] = $url;
        $input['first_time_activation_request'] = $url;
        $input['first_time_activation_response'] = $response;
        // $input['created_by'] = $id;
       
    
        $smart_box = \App\SmartBox::where('id', $smartbox_running_id)->update($input);
		

        $customerdata = array();
    $customerdata['smartcard_added_user'] = 2; 
    $customer = \App\Customers::where('id', $customer_id);
    $customer->update($customerdata);
		
        return redirect('admin/customers/active')->with('success', 'updated Activate User details added successfully. !');
	  // return view('customers.firsttime-activation');
   
		
	}
    public function destroy($id)
    {
        //
    }
    public function destroyfollowup($id)
    {
             $data = \App\Prospect::where('id',$id)->count();
                \App\Prospect::destroy($id);
                
         return redirect('admin/customers/followup')->with('success', 'Status was deleted successfully.');
      
    }
public function destroyintrested($id)
    {
             $data = \App\Prospect::where('id',$id)->count();
                \App\Prospect::destroy($id);
                
         return redirect('admin/customers/intrested')->with('success', 'Status was deleted successfully.');
      
         
            
    }
public function destroynotintrested($id)
    {
             $data = \App\Prospect::where('id',$id)->count();
                \App\Prospect::destroy($id);
                
         return redirect('admin/customers/intrestedlist')->with('success', 'Status was deleted successfully.');
      
         
            
    }

    public function getCityBranchFranchises($city,$branch)
    {
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        /*if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        else*/
        $ids=array();
        if($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.id';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
        if($ids){
            $citybranchefranchises = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('city',$city)->where('branch',$branch)->whereIn('slj_franchises.id',$ids)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();
        }
        else{
            $citybranchefranchises = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('city',$city)->where('branch',$branch)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();
        }
        

        $html = "<option value=''>-- Select Franchise --</option>";
        foreach($citybranchefranchises as $franchise){
            $html.="<option value='".$franchise->id."'>".$franchise->franchise_name."</option>";
        }

        return $html;
    }

    public function getBranchFranchises($branch)
    {
        $citybranchefranchises = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('branch',$branch)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();

        $html = "<option value=''>-- Select Franchise --</option>";
        foreach($citybranchefranchises as $franchise){
            $html.="<option value='".$franchise->id."'>".$franchise->franchise_name."</option>";
        }

        return $html;
    }

    public function getPackageSubPackages($package)
    {
        $subpackages = \App\BroadbandSubPackages::where('package',$package)->where('status','Y')->select('id','sub_plan_name')->get();

        $html = "<option value=''>-- Select Sub Package --</option>";
        foreach($subpackages as $subpackage){
            $html.="<option value='".$subpackage->id."'>".$subpackage->sub_plan_name."</option>";
        }

        return $html;
    }

	public function getComboPackageSubPackages($package)
    {
        $subpackages = \App\ComboSubPackages::where('package',$package)->where('status','Y')->select('id','sub_plan_name')->get();

        $html = "<option value=''>-- Select Combo Sub Package --</option>";
        foreach($subpackages as $subpackage){
            $html.="<option value='".$subpackage->id."'>".$subpackage->sub_plan_name."</option>";
        }

        return $html;
    }

    /**
     * Display a general information of individual customer.
     * @return Response
    */
    public function viewGeneralInfo($viewtype, $customerId)
    {
        $breadcrumbs = \Breadcrumbs::setListElement('ol')
        ->setListItemCssClass('breadcrumb-item')
        ->addCrumb('Home', url('/'));
        $breadcrumbs->setDivider("");
        $user = Auth::user();
        $roles = $user->getRoleNames(); 
         $url='admin/customers';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $url = $roles[0].'/customers';
        }       
        if ($viewtype == "all-customers") {
            $breadcrumbs->addCrumb('All Customers', url($url));
        } else if ($viewtype == "active-customers") {
            $breadcrumbs->addCrumb('Active Customers', url($url.'/active'));
        } else if ($viewtype == "expired-customers") {
            $breadcrumbs->addCrumb('Expired Customers', url($url.'/expired'));
        }
        $breadcrumbs->addCrumb('Customer Details', '/');

        // working mac and account type is connection type ?
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_broadband_packages','slj_customers.package', '=', 'slj_broadband_packages.id')
                ->leftJoin('slj_broadband_subpackages','slj_customers.sub_package', '=', 'slj_broadband_subpackages.id')
                ->leftJoin('slj_combo_packages','slj_customers.combo_package', '=', 'slj_combo_packages.id')
                ->leftJoin('slj_combo_subpackages','slj_customers.combo_sub_package', '=', 'slj_combo_subpackages.id')
                ->leftJoin('slj_cable_packages','slj_customers.cable_packages', '=', 'slj_cable_packages.id')
                ->leftJoin('slj_iptv_packages','slj_customers.iptv_packages', '=', 'slj_iptv_packages.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->where('slj_customers.id', $customerId)
                ->select('slj_customers.id as account_no',
                'slj_customers.id as customer_id',
                'slj_customers.connection_type as account_type',
                'slj_customers.f_name_c_name as f_name_c_name',
                'slj_customers.expiry_date as expiry_date',
                'slj_broadband_packages.package_name as bpackage_name',
                'slj_broadband_subpackages.sub_plan_name as sbpackage_name',    
                'slj_combo_packages.package_name as copackage_name',
                'slj_combo_subpackages.sub_plan_name as scopackage_name',    
                'slj_cable_packages.package_name as cpackage_name',
                'slj_iptv_packages.package_name as ipackage_name',    
                'slj_customers.current_status as current_status',
                'slj_customers.active_updated_date as active_updated_date',
                'slj_customers.ucreateddt as ucreateddt',
                'slj_customers.customer_pic as customer_pic',
                'slj_franchises.franchise_name',
                'slj_branches.branch_name',
                'slj_cities.name as city_name',
                'users.mobile',
                'users.email',
                'users.name as customer_name', 
                'users.status as account_status',
                'slj_customers.*'
                )->first();
                	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Customer Information";
     \App\Employees_Logs::create($employeedata);
     
        return view('customers.view-general-info',[
          'data'=>$data,
          'viewtype' => $viewtype,
          'breadcrumbs' => $breadcrumbs
        ]);
    }

    function implodeAssociativeArray($flattened) {
        if (!empty($flattened)) {
            array_walk($flattened, function(&$value, $key) {
                $value = "{$key}|{$value}";
            });
            return implode('@', $flattened);
        } else {
            return "";
        }
    }

	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
     public function CustmDetInfo($cusid)
     {
         
     }
     public function CustmDisDet($cusid)
     {
         
          $customer = \App\Customers::find($cusid);
                $data=array();
            $data['current_status']="disconnect";
            
               $customer->update($data); 
           
               return 1;
               
                
        
     }
     
     
    public function editType($edittype, $id)
    {
        $customerdetails = $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->first();

        $franchise_list=array();

		//$packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');

		$cabledata = \App\CablePackages::where('status','Y')->select('package_name as name', 'id','type')->get();

		$cabledatabytype = array();
		foreach($cabledata as $cable){
			$data = array();
			$data['id'] = $cable['id'];
			$data['name'] = $cable['name'];
			$type = $cable['type'];
			$cabledatabytype[$type][] = $data;
		}


		$iptvdata = \App\IptvPackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		$iptvdatabytype = array();
		foreach($iptvdata as $iptv){
			$data = array();
			$data['id'] = $iptv['id'];
			$data['name'] = $iptv['name'];
			$type = $iptv['type'];
			$iptvdatabytype[$type][] = $data;
		}


		$distributors = \App\Distributors::where('id',$customerdetails->distributor)->pluck('distributor_name as name', 'id');
        $branches = \App\Branches::where('city',$customerdetails->city)->pluck('branch_name as name', 'id');
        $franchises = \App\Franchises::where('id',$customerdetails->franchise)->pluck('franchise_name as name', 'id');
        $cities = \App\City::pluck('name', 'id');

        $olt = \App\OLT::where('franchise_id',$customerdetails->franchise)->pluck('id as name', 'id');

        $dp = \App\DP::pluck('id as name', 'id');
        $fh = \App\FH::pluck('id as name', 'id');



        $cities = \App\City::where('status','Y')->pluck('name', 'id');
        $packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');
        $subpackages = \App\BroadbandSubPackages::where('status','Y')->where('package',$customerdetails->package)->pluck('sub_plan_name as name', 'id');

		$combopackages = \App\ComboPackages::where('status','Y')->pluck('package_name as name', 'id');
        $combosubpackages = \App\ComboSubPackages::where('status','Y')->where('package',$customerdetails->combo_package)->pluck('sub_plan_name as name', 'id');


		//$cablepackages = \App\CablePackages::where('type','packages')->select('package_name as name', 'id')->get();

        //$cableallacart = \App\CablePackages::where('type','allacart')->select('channels_description as name', 'id')->get();

        return view('customers.customer-details-edit',[
            'combopackages'=>$combopackages,
            'franchise_list'=>$franchise_list, 
            'combosubpackages'=>$combosubpackages, 
            'cabledata'=>$cabledata, 
            'cabledatabytype'=>$cabledatabytype,
            'iptvdatabytype'=>$iptvdatabytype,
            'distributors'=>$distributors,
            'branches'=>$branches,
            'franchises'=>$franchises,
            'cities'=>$cities,
            'packages'=>$packages,
            'subpackages'=>$subpackages,
            'customerdetails'=>$customerdetails,
            'olt'=>$olt,
            'dp'=>$dp,
            'fh'=>$fh,
            'edittype'=>$edittype
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateCustomer(Request $request, $edittype, $id)
    {
        $customer = \App\Customers::find($id);
        $user = \App\User::find($customer->user_id);
        $requestdata = $request->all();
        $data = array();
        $customerdata = array();

        if ($edittype == "change-password") {
            $validatedData = $request->validate([
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
            $data['password'] = Hash::make($requestdata['password']);
        }

        if ($edittype == "basic-information") {
            $validatedData = $request->validate([
                'mobile' => 'required',
            ]);
            $data['mobile'] = $requestdata['mobile'];
            $customerdata['alt_mobile_num'] = $requestdata['alt_mobile_num'];
        }

		if ($edittype == 'upload-documents') {
            //Customer Photo
            $photo = '';
            if($request->hasFile('customer_pic')) {
                $photo = $request->file('customer_pic') ;
                $fileName = $user->id."-photo-".time().".".$photo->getClientOriginalExtension() ;
                $destinationPath = public_path().'/uploads/customers/photos/' ;
                $photo->move($destinationPath,$fileName);
                // $customer_photo_name = $fileName ;
                $customerdata['customer_pic'] = $fileName;
            }

            //Address Proof
            $photo = '';
            if( $request->hasFile('address_proof')) {
                $photo = $request->file('address_proof') ;
                $fileName = $user->id."-address-proof-".time().".".$photo->getClientOriginalExtension() ;
                $destinationPath = public_path().'/uploads/customers/address-proofs/' ;
                $photo->move($destinationPath,$fileName);
                // $address_proof_name = $fileName ;
                $customerdata['address_proof'] = $fileName;
            }
            $photo = '';

            //Identity Proof
            if($request->hasFile('identity_proof')) {
                $photo = $request->file('identity_proof') ;
                $fileName = $user->id."-identity-proof-".time().".".$photo->getClientOriginalExtension() ;
                $destinationPath = public_path().'/uploads/customers/identity-proofs/' ;
                $photo->move($destinationPath,$fileName);
                $customerdata['identity_proof'] = $fileName;
            }
        }

        if ($edittype == "location-information") {
            $customerdata['billing_address'] = $requestdata['billing_address'];
            $customerdata['installation_address'] = $requestdata['installation_address'];
            $customerdata['landmark'] = $requestdata['landmark'];
            $customerdata['pincode'] = $requestdata['pincode'];
        }

        if ($edittype == "package-and-prices-change") {
            $customerdata['expiry_date'] = $requestdata['expiry_date'];
            // $customerdata['current_status'] = 'expired';
        }

        $user->update($data);
        $customer->update($customerdata); //Update details
        
        	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Update Customer";
    $employeedata['value_of_action']=$customer->user_id;
      
     \App\Employees_Logs::create($employeedata);

        return redirect()->back()->with('success', 'Customer details updated successfully.');
    }

    /**
     * Get Broadband sub package price.
     *
     * @param int $package
     * package id
     * @param int $subPackage
     * sub package id
     */
    public function getBroadbandSubPackagesPrice($package, $subpackage) {
        $package_amount = 0;

        if ($subpackage > 0) {
            $packagedetails = \App\BroadbandSubPackages::find($subpackage);
            $package_amount = $packagedetails->price;
        }

        return $package_amount;
    }
  public function getBranchFranchisesExtra($city,$branch)
    {
        
        
        $citybranchefranchises = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('branch',$branch)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();
            
           //$html = "<option value=''>-- Select Franch --</option>";
           /*
        foreach($citybranchefranchises as $franchise)
			{
			    	$html.="<option value='".$franchise->id."'>".$franchise->franchise_name."</option>";
			}
		
       */
       $html="";
        
        foreach($citybranchefranchises as $franchise)
			{
			 $html .= '<div class="col-md-3">';
			 $html .= '<label class="radio-inline mr10" style="font-size: 11px">';
			 $html .= "<input type='checkbox' name='franchise[]' class='checkbx1' value='".$franchise->id."'>$franchise->franchise_name";
			 $html .= '</label>';
			 $html .= '</div>';
           
			}
			
			

        return $html;
    }
      public function getBranchFranchisesExtraEdit($city,$branch,$user_id)
    {
        
        
        $citybranchefranchises = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('branch',$branch)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();
            
        //dd($citybranchefranchises);          
            
            
            $html='<option value="">--select Franchise--</option>';
            
               $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        $ids=array();
        $citybranches=array();
        // $dist_ids=array(); 
             $dist_ids = explode(',', $branch);
            $html='';
            
            
             $emp = \App\Employees::select('slj_employees.franch')->where('branch', $branch)->where('city', $city)->where('id', $user_id)->first();
            //  $emp = \App\Employees::join('users','users.id', '=', 'slj_employees.id')->where('branch',$branch)->where('users.status','Y')->where('city', $city)->select('slj_employees.franch')->first();
             
            //  dd($emp);
            if(!empty($emp)){
             $branchesgroup1 = explode(",",$emp->franch);
            }
             
            foreach ($dist_ids as $dist_idnum) 
             {
                 
        //   $cbs =  \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('branch',$dist_idnum)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();
           $franc = \App\Franchises::select('slj_franchises.id','franchise_name')->where('branch', $dist_idnum)->where('city', $city)->get();
           foreach ($franc as $cbs) 
             {
                        if(!empty($branchesgroup1) && in_array($cbs->id,$branchesgroup1)){$selected  = "selected";}else{$selected = "";}
                        
           			   $html.="<option ".$selected." value='".$cbs->id."'>".$cbs->franchise_name."</option>";
             }
			   
             }
     
       
        //foreach($citybranchefranchises as $franchise)
		//	{
			 //$html .= '<div class="col-md-3">';
			 //$html .= '<label class="radio-inline mr10" style="font-size: 11px
			 //$html .="<option value='".$franchise->id."'>$franchise->franchise_name</option>";
		//    $html.="<option value='".$franchise->id."'>".$franchise->franchise_name."</option>";
			// $html .= "<input type='checkbox' name='franchises[]' class='frandata' value='".$franchise->id."'>$franchise->franchise_name";
			// $html .= '</label>';
			 //$html .= '</div>';
           
		//	}

        return $html;
    }
    /**
     * Get package sub package price.
     *
     * @param int $package
     * package id
     * @param int $subPackage
     * sub package id
     */
    public function getCableTvSubPackagesPrice(
        $package,
        $cable_packages,
        $cable_allacart,
        $cable_base,
        $cable_local
    ) {
        $package_amount = 0;
        //Cable Packages
        if(!empty($cable_packages)){
            $packages = explode(",",$cable_packages);
            $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
        }

        if(!empty($cable_allacart)){
            $packages = explode(",",$cable_allacart);
            $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
        }

        if(!empty($cable_base)){
            $packages = explode(",",$cable_base);
            $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
        }

        if(!empty($cable_local)){
            $packages = explode(",",$cable_local);
            $package_amount+= \App\CablePackages::whereIn('id', $packages)->sum('total_amount');
        }

        return $package_amount;
    }

    /**
     * Get IPTv sub package price.
     *
     * @param int $package
     * package id
     * @param int $subPackage
     * sub package id
     */
    public function getIptvSubPackagesPrice(
        Request $request) {
        $package_amount = 0;
        $requestdata = $request->all();
        //IPTV Packages
        if(!is_null($requestdata['input_iptv_package'])){
            $packages = explode(",", $requestdata['input_iptv_package']);
            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
        }

        if(!is_null($requestdata['input_allacart'])) {
            $packages = explode(",", $requestdata['input_allacart']);
            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
        }

        if(!is_null($requestdata['input_iptv_base'])) {
            $packages = explode(",", $requestdata['input_iptv_base']);
            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
        }

        if(!!is_null($requestdata['input_iptv_local'])) {
            $packages = explode(",", $requestdata['input_iptv_local']);
            $package_amount+= \App\IptvPackages::whereIn('id', $packages)->sum('total_amount');
        }

        return $package_amount;
    }

    /**
     * Get combo sub package price.
     *
     * @param int $connection_type
     * package id
     * @param int $package
     * package id
     * @param int $subPackage
     * sub package id
     */
    public function getComboSubPackagesPrice($package, $combo_sub_package) {
        $package_amount = 0;
        if ($combo_sub_package > 0){
            $packagedetails = \App\ComboSubPackages::find($combo_sub_package);
            $package_amount = $packagedetails->total;
        }
        return $package_amount;
    }
    public function getOperatorId($id)
    {
        $op_id = \App\Franchises::where('id',$id)->select('op_id')->first();

        return $op_id['op_id'];
    }

    public function get_smartbox($op_id, $cas_type =1)
    {
        // $data = $request->all();
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');
		//  $cas_type = isset($data['cas_type']) ? $data['cas_type'] : 1;
		
		//  $operator_id = isset($data['operator_id']) ? $data['operator_id'] : '';
		
		 
		$url = $base_url.'RSMS/NotAllocatedSmartcard?operator_id='.$op_id.'&castype='.$cas_type;
		
		 $headers = array(
            "Accept: application/json",
            'Authorization: ' . $access_token
        );
		
               
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
		          
        curl_close($ch);
		
		//$input['api_response'] = $response;
        //$input['api_request'] = $json_data;
        
        $data = json_decode(($response), true);
        $smartcard_list = $data['smartcard_list'];
		//print_r($smartcard_list);die;

        
     	//$submodels = \App\StockProducts::where('manufacturer',$manufacturer)->where('current_user_id',$id)->where('employee_status','available')->get()->unique('identification');

        $html = "<option value=''>-- Select Smart Box --</option>";
        foreach($smartcard_list as $sb)
        {
           
           $html.="<option value='".$sb['subscribername']."'>".$sb['subscriberid']."</option>";
        }

        echo $html;
    }

}
