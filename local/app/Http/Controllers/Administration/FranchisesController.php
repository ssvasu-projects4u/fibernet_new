<?php
namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Invoices;
use Auth;
use Carbon\Carbon;


class FranchisesController extends Controller
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
        $user = \Auth::user();
      $roles = $user->getRoleNames();
      
      if($roles[0]=='superadmin')
      {
        $data = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')
        		->leftjoin('slj_cities','slj_franchises.city', '=', 'slj_cities.id')
				->leftjoin('slj_branches','slj_franchises.branch', '=', 'slj_branches.id')
				->select('slj_franchises.*','slj_cities.name as city_name','slj_branches.branch_name','users.mobile','users.status')
				->orderBy('franchise_id','asc')
				->paginate(20);
      }
      else
      {
            
          $userid=\Auth::user()->id;
          $data = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
                            ->join('slj_cities','slj_employees.city', '=', 'slj_cities.id')
                            
            	               ->select('slj_employees.*','users.mobile','users.status','slj_cities.name as cityname','slj_cities.id as cityid')
            	           	->where('slj_employees.user_id', '=', \Auth::user()->id)
            	         
				            ->paginate(10);
      }
				
		return view('administration.franchises.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $items = \App\City::where('status','Y')->pluck('name', 'id');
		
		return view('administration.franchises.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'city' => 'required',
			'distributor' => 'required',
			'branch' => 'required',
			'franchise_name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8',
			'mobile' => 'required',
			'name' => 'required',
			'vlan' => 'required',

			//'aadhar' => 'required',
			//'landline' => 'required',
			//'agreement_address' => 'required',
			//'bank_account' => 'required',
			//'ifsc_code' => 'required',
			//'bank_branch_name' => 'required',
			//'bank_name' => 'required',
			//'area_description' => 'required',
			//'aadhar_card' => 'required',
			//'pan_card' => 'required',
			//'bank_passbook' => 'required'
		]);
		

		
        $input = request()->all();

        //Create Franchise User
        $user = array();
        $user['name'] = $input['name'];
        $user['first_name'] = $input['name'];
        $user['last_name'] = "";
        $user['password'] = Hash::make($input['password']);
        $user['email'] = $input['email'];
        $user['mobile'] = $input['mobile'];
        
        $user['status'] = "Y";
        $userdata = \App\User::create($user);
        
        $employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Created Franchise ";
     $employeedata['value_of_action']=$input['name'];
     
      \App\Employees_Logs::create($employeedata);
	  
        
        //Assign Role
        $userdata->assignRole('franchise');

		//Generate Franchise Id
		$data = \App\Franchises::select('franchise_id')->orderBy('franchise_id','desc')->first();
		$franchiseid = "00000";
		if(isset($data->franchise_id)){
			$franchiseid = substr($data->franchise_id, -5);	
		}
		$franchiseid = "SLJFR".str_pad($franchiseid + 1, 5, 0, STR_PAD_LEFT);	
		$input['franchise_id'] = $franchiseid;
		$input['user_id'] = $userdata->id;
		$input['distributor_id'] = $input['distributor'];
    	$input['vlan'] = $input['vlan'];
		\App\Franchises::create($input);

        return redirect('admin/franchises')->with('success', 'Franchise created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.franchises.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $franchisedetails = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->select('slj_franchises.*','users.name','users.email','users.mobile')->find($id);
		$items = \App\City::where('status','Y')->pluck('name', 'id');
		
		$distributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('users.status','Y')->where('city',$franchisedetails->city)->pluck('distributor_name as name', 'slj_distributors.id');

		$branches = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->where('users.status','Y')->where('city',$franchisedetails->city)->where('distributor_id',$franchisedetails->distributor_id)->pluck('branch_name as name', 'slj_branches.id');

      
      // \App\Employees_Logs::create($employeedata);
	  
		
		return view('administration.franchises.edit',['distributors'=>$distributors,'branches'=>$branches,'items'=>$items, 'franchisedetails'=>$franchisedetails]); 
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $franchise = \App\Franchises::find($id);
        $validatedData = $request->validate([
			'city' => 'required',
			'distributor' => 'required',
			'branch' => 'required',
			'franchise_name' => 'required',
			'email' => 'required|unique:users,email,'.$franchise->user_id,
			'mobile' => 'required',
			'name' => 'required',
		

			//'city' => 'required',
			//'landline' => 'required',
			//'agreement_address' => 'required',
			//'bank_account' => 'required',
			//'ifsc_code' => 'required',
			//'bank_branch_name' => 'required',
			//'bank_name' => 'required',
			//'area_description' => 'required',
			//'aadhar_card' => 'required',
			//'pan_card' => 'required',
			//'bank_passbook' => 'required'
		]);
		
		
		$requestdata = $request->all(); 
		
		$data['franchise_name'] = $requestdata['franchise_name'];
		$data['city'] = $requestdata['city'];
		$data['branch'] = $requestdata['branch'];
		$data['aadhar'] = $requestdata['aadhar'];
		
		$data['landline'] = $requestdata['landline'];
		$data['agreement_address'] = $requestdata['agreement_address'];
		$data['bank_holder_name'] = $requestdata['bank_holder_name'];
		$data['bank_account'] = $requestdata['bank_account'];
		$data['ifsc_code'] = $requestdata['ifsc_code'];
		$data['bank_branch_name'] = $requestdata['bank_branch_name'];
		$data['bank_name'] = $requestdata['bank_name'];
		$data['area_description'] = $requestdata['area_description'];
		$data['vlan'] = $requestdata['vlan'];
		
		//Update details
		$franchise->update($data);

      $employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Update Franchises";
     $employeedata['value_of_action']=$requestdata['franchise_name'];
     \App\Employees_Logs::create($employeedata);
	 

		$user = \App\User::find($franchise->user_id);
        $data = array();
        $data['name'] = $requestdata['name'];
        $data['first_name'] = $requestdata['name'];
        $data['email'] = $requestdata['email'];
        $data['mobile'] = $requestdata['mobile'];
        $user->update($data);
		
		return redirect('admin/franchises')->with('success', 'Franchise details updated successfully.');
    }

    /**
     * change_password the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function change_password(Request $request)
    {
        
        $validatedData = $request->validate([
			'password' => 'required',
		]);
		
		
		$requestdata = $request->all(); 
		


		$user = \App\User::find($requestdata['userID']);
                $data = array();
                $data['password'] = Hash::make($requestdata['password']);
                $user->update($data);
		
		return redirect('admin/'.$requestdata['pageName'])->with('success', 'Password updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('franchise',$id)->count();
        $dpid = \App\Branches::where('id',$id)->count(); // added new feature by durga
        
        if($id > 0 && $customers == 0 && $dpid==0){
            $franchise = \App\Franchises::find($id);
            $user = \App\User::find($franchise->user_id);
            
            \App\Franchises::destroy($id);
            if($franchise->user_id > 0){
                $user = \App\User::find($franchise->user_id);
                \App\User::destroy($franchise->user_id); //remove user
                
                if(!empty($user->roles->first()) && count($user->roles->first())>0){
                    $user->removeRole($user->roles->first()); //remove role from user
                }
                if(!empty($user->permissions) && count($user->permissions)>0){
                    $user->revokePermissionTo($user->permissions); //remove permissions from user
                }
            }
        	$employeedata=array();
	        $id = \Auth::user()->id;
      
            $employeedata['employee_id']=$id;
     $employeedata['action_name']="Deleted Franchises";
     $employeedata['value_of_action']=$franchise->id;
     
     \App\Employees_Logs::create($employeedata);
	
            return redirect('admin/franchises')->with('success', 'Franchise deleted successfully.');
        }else{
            return redirect('admin/franchises')->with('error', 'Franchise cannot be deleted because of dependency');
        }
    }

    public function checkIsEmailExsit(Request $request)
    {
        $data = $request->all();
        if ((isset($data["user_create_type"]) == true) &&  $data["user_create_type"] == "employee") {
            $email = trim($data["email"]);
            if(strpos($email, "e-") == "") {
                $email = "e-".$email;
            }
            $user = \App\User::where('users.email', $email)->count();
            if ($user > 0) {
              return 'false';
            }
            return 'true';
        }
        else {
            $user = \App\User::where('users.email',trim($data['email']))->count();
            return ($user==0)? 'true':'false';
        }
    }

    public function checkIsEmailEditExsit(Request $request)
    {
        $data = $request->all();
        if ((isset($data["user_create_type"]) == true) &&  $data["user_create_type"] == "employee") {
            $email = trim($data["email"]);
            if(strpos($email, "e-") == "") {
                $email = "e-".$email;
            }
            $user = \App\User::where('users.email', $email)
            ->where('users.id',$data['user_id'])
            ->count();
            if ($user > 0) {
                return 'true';
            }
            else {
                $user = \App\User::where('users.email', $email)
                ->count();
                return ($user==0)? 'true':'false';
            }
        }
        else {
            $user = \App\User::where('users.email',trim($data['email']))->count();
            return ($user==0)? 'true':'false';
        }
    }

    public function getCityBranches($city)
    {
        $citybranches = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->where('city',$city)
        ->where('users.status','Y')->select('slj_branches.id','branch_name')->get();

        $html = "<option value=''>-- Select Branch --</option>";
        foreach($citybranches as $branch){
			$html.="<option value='".$branch->id."'>".$branch->branch_name."</option>";
        }

        return $html;
    }

    public function getCityDistributorBranches($city,$distributor)
    {
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        $ids=array();
        
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        if($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.branch';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
       
        if($ids){
            
            $citybranches = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->where('city',$city)->where('distributor_id',$distributor)->whereIn('slj_branches.id',$ids)->where('users.status','Y')->select('slj_branches.id','branch_name')->get();
        }
        $branchdetails=array();
        if($roles[0]=='superadmin')
        {
               $citybranches = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->where('city',$city)->where('distributor_id',$distributor)->where('users.status','Y')->select('slj_branches.id','branch_name')->get();
        }
        else
        {
            $branchdetails = \App\Employees::select('branch')->where('user_id',$id)->first();
            $branchgroup = explode(",",$branchdetails->branch);
            $citybranches = \App\Branches::select('slj_branches.id','branch_name')->whereIn('slj_branches.id',$branchgroup)->get();
   		}

                
							
								
					    
           
            

        $html = "<option value=''>-- Select Branch --</option>";
        foreach($citybranches as $branch){
			$html.="<option value='".$branch->id."'>".$branch->branch_name."</option>";
        }

        return $html;
    }
     public function getCityDistributorBranchesExtra($city,$distributor)
    {
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        $ids=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        elseif($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.branch';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
        if($ids){
            
            $citybranches = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->where('city',$city)->where('distributor_id',$distributor)->whereIn('slj_branches.id',$ids)->where('users.status','Y')->select('slj_branches.id','branch_name')->get();
        }
        else{
            $citybranches = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->where('city',$city)->where('distributor_id',$distributor)->where('users.status','Y')->select('slj_branches.id','branch_name')->get();
        }
        
        $html='';
        
        foreach($citybranches as $branch)
			{
			    $html .= '<div class="col-md-3">';
			    $html .= '<label class="radio-inline mr10" style="font-size: 11px;">';
			    $html .= "<input type='checkbox' class='checkbx' name='branches[]' id='branch' value='".$branch->id."'>$branch->branch_name";
			    $html .= '</label>';
			    $html .= '</div>';
			   
		
            }

        return $html;
    }
	  public function getCityDistributorBranchesExtraEdit($city,$distributor)
    {
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        $ids=array();
       // $citybranches=array();
        $dist_ids=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        elseif($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.branch';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
            
             $dist_ids = explode(',', $distributor);
            $html='';
            //foreach ($dist_ids as $dist_idnum) 
            // {
                 
           $kk = \App\Branches::select('slj_branches.*')->whereIn('distributor_id', $dist_ids)->get();
           
            foreach($kk as $cbs)
            {
                    
           			   $html.="<option value='".$cbs->id."'>".$cbs->branch_name."</option>";
            }
    

        return $html;
    }
	
	
	
    public function getFranchiseDetails($franchise)
    {
		$franchisedetails = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->select('slj_franchises.*','users.name','users.email','users.mobile')->find($franchise);
		$html = "<table class='table table-bordered table-hover'>";
		$html.= "<tr><th>Franchise Name</th><td>".$franchisedetails->franchise_name."</td></tr>";
		$html.= "<tr><th>Contact Name</th><td>".$franchisedetails->name."</td></tr>";
		$html.= "<tr><th>Contact Number</th><td>".$franchisedetails->mobile."</td></tr>";
		$html.= "<tr><th>Contact Email</th><td>".$franchisedetails->email."</td></tr>";
		$html.= "</table>";
		return $html;
    }
     public function franchledger(Request $request)
    {
            $user = Auth::user();
              $roles = $user->getRoleNames();
              $user_id = Auth::user()->id;
              
    switch($request->viewrecord) {

    case 'ViewLedger':
            $input = request()->all();
                $stdt=$input['start_date'];
                 $enddt=$input['end_date'];
                 $franchid=$input['franchid'];
              
              $data = \App\Transactions::join('slj_franchises','slj_franchises.user_id', '=', 'slj_txns.user_id')
                                    ->join('users','users.id', '=','slj_txns.user_id')    
                                    ->where('slj_franchises.id','=',$franchid)
                                    ->whereBetween('slj_txns.created_at', [$stdt, $enddt])
                             ->select('slj_franchises.*','slj_txns.user_id','slj_txns.txnid','slj_txns.payment_type','slj_txns.amount','slj_txns.created_at as transdate','users.*')
                             ->orderBy('slj_txns.id', 'DESC')->get();

              
         		return view('administration::franchises.franchledger',['data'=>$data,'franchid'=>$franchid,'stdt'=>$stdt]); 
 
        
        break;
        
     case 'Download-Ledger':
         $input = request()->all();
                $stdt=$input['start_date'];
                 $enddt=$input['end_date'];
                 $franchid=$input['franchid'];
              
              $data = \App\Transactions::join('slj_franchises','slj_franchises.user_id', '=', 'slj_txns.user_id')
                                    ->join('users','users.id', '=','slj_txns.user_id')    
                                    ->where('slj_franchises.id','=',$franchid)
                                    ->whereBetween('slj_txns.created_at', [$stdt, $enddt])
                             ->select('slj_franchises.*','slj_txns.user_id','slj_txns.txnid','slj_txns.payment_type','slj_txns.amount','slj_txns.created_at as transdate','users.*')
                             ->orderBy('slj_txns.id', 'DESC')->get();
                             
            
 foreach($data as $d)
         {
             $filenamepath=$d->franchise_name;
         }
          if(empty($filenamepath))
                 $fileName='Ledger.csv';
            else
              $fileName = $filenamepath.'-Ledger.csv';
        

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Transaction ID', 'Transaction Reason', 'Transaction Date', 'User Name','Credit','Debit','Balance','Notes');

        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $i=1;
            foreach ($data as $datarow) {
                $row['txnid']  = $datarow->txnid;
                $row['payment_type']    = $datarow->payment_type;
                $row['transdate']    = date("d-M-Y  h:i:s",strtotime($datarow->transdate));
                $row['email']  = $datarow->email;
                $row['amount']  = $datarow->amount;
                $row['debited_balance']  =$datarow->debited_balance;
                
                $creditbal=$datarow->credited_balance;
                $tottaxamount=0;
                 
		    $j=1;
		    
                foreach($data as $datarow5)
                {
                   
                      if($j>=$i)
                      {
                       $tottaxamount=$tottaxamount+$datarow5->amount;
                       
                      }
                       $j++;
                }
                
                
                $i++;
           
        
	            $creditbal=$creditbal+$tottaxamount;
		
                $row['balance']  = $creditbal;
                $row['notes']  = "";
                
                fputcsv($file, array($row['txnid'], $row['payment_type'], $row['transdate'], $row['email'], $row['amount'],$row['debited_balance'],$row['balance'],$row['notes']));
            }

            fclose($file);
        };
                  return response()->stream($callback, 200, $headers);
 
              
         	
         break;
    }
    
             
     
        
    }
   
    public function ledger(Request $request)
    {
            $user = Auth::user();
              $roles = $user->getRoleNames();
              $user_id = Auth::user()->id;
              
              switch($request->viewrec) {

    case 'View': 
         $input = request()->all();
                $stdt=$input['start_date'];
                 $enddt=$input['end_date'];
                 $branchid=$input['branchid'];
              
              $data = \App\Transactions::join('slj_branches','slj_branches.user_id', '=', 'slj_txns.user_id')
                                    ->join('users','users.id', '=','slj_txns.user_id')    
                                    ->where('slj_branches.id','=',$branchid)
                                    ->whereBetween('slj_txns.created_at', [$stdt, $enddt])
                             ->select('slj_branches.*','slj_txns.user_id','slj_txns.txnid','slj_txns.payment_type','slj_txns.amount','slj_txns.created_at as transdate','users.*')
                             ->orderBy('slj_txns.id', 'DESC')->get();

              
         		return view('administration::branches.ledger',['data'=>$data,'branchid'=>$branchid,'stdt'=>$stdt]); 


       
    break;

    case 'Download': 
                 $input = request()->all();
                $stdt=$input['start_date'];
                 $enddt=$input['end_date'];
                 $branchid=$input['branchid'];
     // $fileName = 'tasks.csv';
       $data = \App\Transactions::join('slj_branches','slj_branches.user_id', '=', 'slj_txns.user_id')
                                    ->join('users','users.id', '=','slj_txns.user_id')    
                                    ->where('slj_branches.id','=',$branchid)
                                    ->whereBetween('slj_txns.created_at', [$stdt, $enddt])
                             ->select('slj_branches.*','slj_txns.user_id','slj_txns.txnid','slj_txns.payment_type','slj_txns.amount','slj_txns.created_at as transdate','users.*')
                             ->orderBy('slj_txns.id', 'DESC')->get();
                             
                             
         
         foreach($data as $d)
         {
             $filenamepath=$d->branch_name;
         }
          $fileName = $filenamepath.'-Ledger.csv';
        

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Transaction ID', 'Transaction Reason', 'Transaction Date', 'User Name','Credit','Debit','Balance','Notes');

        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            $i=1;
            foreach ($data as $datarow) {
                $row['txnid']  = $datarow->txnid;
                $row['payment_type']    = $datarow->payment_type;
                $row['transdate']    = date("d-M-Y  h:i:s",strtotime($datarow->transdate));
                $row['email']  = $datarow->email;
                $row['amount']  = $datarow->amount;
                $row['debited_balance']  =$datarow->debited_balance;
                
                $creditbal=$datarow->credited_balance;
                $tottaxamount=0;
                 
		    $j=1;
		    
                foreach($data as $datarow5)
                {
                   
                      if($j>=$i)
                      {
                       $tottaxamount=$tottaxamount+$datarow5->amount;
                       
                      }
                       $j++;
                }
                
                
                $i++;
           
        
	            $creditbal=$creditbal+$tottaxamount;
		
                $row['balance']  = $creditbal;
                $row['notes']  = "";
                
                fputcsv($file, array($row['txnid'], $row['payment_type'], $row['transdate'], $row['email'], $row['amount'],$row['debited_balance'],$row['balance'],$row['notes']));
            }

            fclose($file);
        };
                  return response()->stream($callback, 200, $headers);
 
    break;
}
             
     
        
    }
    public function add_deposit(Request $request)
    {
        $validatedData = $request->validate([
			'deposit_amount' => 'required',
			'deposit_type' => 'required',
			'deposit_date' => 'required'
		]);

        $input = request()->all();

        $invoiceData = [];
        //Create Franchise User
        $redirect_page=$input['pageName'];
        unset($input['_token']);
        unset($input['pageName']);
        $depositdata = \App\Deposits::create($input);
        $txnid=$depositdata->id;

        $id=$input['franchise_branch_id'];
        if($input['deposit_for']==2){
            $franchise_branch = \App\Branches::find($id);
            $deposit_for=1;
            $invoiceData["payment_type"] = "Branch Deposit";
            $invoiceData["created_to"] = 1;
            $invoiceData["name"] = $franchise_branch->branch_name;
            $invoiceData["address"] = $franchise_branch->office_address;
        }
        elseif($input['deposit_for']==1){
            $franchise_branch = \App\Franchises::find($id);
            $deposit_for=2;
            $invoiceData["payment_type"] = "Franchise Deposit";
            $invoiceData["created_to"] = 2;
            $invoiceData["name"] = $franchise_branch->franchise_name;
            $invoiceData["address"] = $franchise_branch->agreement_address;
        }
        $invoiceData["invoice_type"] = "Deposit";

        //print_r($franchise_branch);exit;
        $data['credited_balance'] = $franchise_branch->credited_balance+$input['deposit_amount'];
	    $data['available_balance'] = $data['credited_balance']-$franchise_branch->debited_balance;
        $res=$franchise_branch->update($data); //Update details
        //var_dump($res);exit;
        $id = \Auth::user()->id;

        $inwardFlowType = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->firstOrFail()->id;
        $txn_data = array();
        if($input['deposit_type']=="Payment Gateway")
        $txn_data['txnid'] = $input['transid'];
        else
        $txn_data['txnid'] = "";
        
        $txn_data['amount'] = $input['deposit_amount'];
        $txn_data['payment_type'] = 'Deposit';
        // txns to slj system
        $txn_data['payment_flow_type'] = $inwardFlowType;
        // customer user id
        $txn_data['user_id'] = $id;
        // 3 - customer
        $txn_data['payment_from'] = $deposit_for;
        $txn_data['payment_message'] = $input['deposit_desc'];
        //$txn_data['customer_id'] = $customer_id;
        $txn_data['payment_mode'] = $input['deposit_type'];
        $kc="success";
        $maxtxtnid = \App\Transactions::where("status", "=", $kc)->max('manual_transid');

                    //$maxtxnid = $newestCliente->manual_transid;
                    
            if(empty($maxtxtnid))
                	$maxtxtnid=1;
            else
                    $maxtxtnid=intval($maxtxtnid)+1;
       // if($txn_data['payment_mode']!="Payment Gateway")
        $txn_data['manual_transid']=$maxtxtnid;
      
        
        
        
        $txn_data['status'] = 'success';
        //Txs
        $txnRecord = \App\Transactions::create($txn_data);

        // sum of unpaid invoices
        $unpaid_invoices_sum = Invoices::where("franchise_branch_id",
          $input['franchise_branch_id']
        )->where("created_to", $invoiceData['created_to'])
            // ->where("paid", "=", 0)
            ->where("cancelled", "=", 0)
            ->where("status", "=", 1)
            ->sum("total_amount");

        // sum of paid invoices
        $paid_invoices_sum = Invoices::where("franchise_branch_id",
          $input['franchise_branch_id']
        )->where("created_to", $invoiceData['created_to'])
            ->where("paid", "=", 1)
            ->where("cancelled", "=", 0)
            ->where("status", "=", 1)
            ->sum("total_amount");

        // sum of deleted invoices
        $deleted_invoices_sum = Invoices::where("franchise_branch_id",
        $input['franchise_branch_id']
      )->where("created_to", $invoiceData['created_to'])
        //   ->where("paid", "=", 1)
        //   ->where("cancelled", "=", 0)
          ->where("status", "=", 0)
          ->sum("total_amount");

          $cancelled_invoices_sum = Invoices::where("franchise_branch_id",
          $input['franchise_branch_id']
        )->where("created_to", $invoiceData['created_to'])
            // ->where("paid", "=", 1)
            ->where("cancelled", "=", 1)
            // ->where("status", "=", 1)
            ->sum("total_amount");

        $depositdataOrderNumber = \App\Deposits::find($depositdata->id)->order_number;

        $amount = $input['deposit_amount'];
        $invoiceData["po_number"] = $depositdataOrderNumber;
        $invoiceData["txn_id"] = $txnRecord->id;
        // $invoiceData["payment_gateway_txn_id"] = $txnid;
        // $invoiceData["paid_amount"] = $amount;
        // $invoiceData["paid_date"] = Carbon::now();
        $invoiceData["payment_date"] = Carbon::now();

        $invoiceData["amount"] = $amount;
        $invoiceData["total_amount"] = $amount;

        // the logged in user
        $invoiceData["created_by"] = Auth::user()->id;

        // user who is impacting
        // $invoiceData["created_for"] = $input['franchise_branch_id'];
        $invoiceData["franchise_branch_id"] = $input['franchise_branch_id'];
        $invoiceData["created_from"] = 4;
        // $invoiceData["base_price"] = $amount;
        $invoiceData["payment_flow_type"] = 'inward';
        $invoiceData["ptype"] = 1;
        $invoiceData["status"] = 1;
        $invoiceData['payment_mode'] = $input['deposit_type'];
        $invoiceData["current_balance"] = ( floatval($unpaid_invoices_sum) + floatval($amount)) - (floatval($paid_invoices_sum) + floatval($deleted_invoices_sum) + floatval($cancelled_invoices_sum));

       // unpaid invoice from admin
        $invoice = Invoices::create($invoiceData);
        return redirect('admin/'.$redirect_page)->with('success', 'Deposit created successfully.');
    }
}
