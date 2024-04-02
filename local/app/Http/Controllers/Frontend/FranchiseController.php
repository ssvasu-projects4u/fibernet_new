<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Auth;

class FranchiseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function login()
    {
        return view('frontend.franchise.login');
    }

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function dashboard()
    {
        $id = Auth::user()->id; 
        
        $data = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')
            ->select('users.first_name','users.last_name','users.email','users.mobile','slj_franchises.*','slj_franchises.id as franchiseid')
            ->where('users.id',$id)
            ->first();
        $fid=$data->id;
		//print_r($data);exit;
			
		$complaints = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_complaint_types.title as complaint_sub_type')
				->where('slj_franchises.user_id', '=', $id)
				->orderBy('id','desc')
				->take(10)
				->get();	
	// active customers count
                $activedata = \App\Customers::whereIn('slj_customers.current_status',['active','activated'])->where('franchise',$fid)->get();
                $activecnt = $activedata->count();
                
                $totalPaidAmount = \App\Franchises::where('user_id','=',$id)->pluck('available_balance');
                $totalPaidAmount = $totalPaidAmount[0];
        return view('frontend.franchise.dashboard',['complaints'=>$complaints, 'data'=>$data, 'activecnt'=>$activecnt, 'totalPaidAmount'=>$totalPaidAmount]);
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


        //echo "<pre>"; print_r($userroles); exit;

        return view('frontend.franchise.profile',['userdetails'=>$userdetails]);
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
        $data['name'] = $requestdata['first_name']." ".$requestdata['last_name'];
        $data['first_name'] = $requestdata['first_name'];
		$data['last_name'] = $requestdata['last_name'];
        $data['email'] = $requestdata['email'];
        
        //Update details
        $user = \App\User::find($id);
        $user->update($data);

        return redirect('franchise/profile')->with('success', 'Profile details updated successfully.');
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
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        $requestdata = $request->all(); 
        //$data['oldpassword'] = $requestdata['oldpassword'];
        
        //Update details
        
        $current_password = Auth::User()->password;           
        if(Hash::check($requestdata['oldpassword'], $current_password))
        {           
            $obj_user = \App\User::find($user_id);
            $obj_user->password = Hash::make($requestdata['password']);;
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
    public function allComplaints()
    {
        $user_id = Auth::user()->id; 
		$franchisedetails = \App\Franchises::where('user_id',$user_id)->first();
		$franchise_id = $franchisedetails->id;
		
		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_complaint_types.title as complaint_sub_type')
				->where('slj_customers.franchise', $franchise_id)
				->orderBy('id','desc')
				->paginate(20);
        
		return view('frontend.franchise.complaints.index',['data'=>$data]);
    }
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function openComplaints()
    {
        $user_id = Auth::user()->id; 
		$franchisedetails = \App\Franchises::where('user_id',$user_id)->first();
		$franchise_id = $franchisedetails->id;
		
		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'open')
				->where('slj_customers.franchise', $franchise_id)
				->orderBy('id','desc')
				->paginate(20);
				
		return view('frontend.franchise.complaints.open',['data'=>$data]);
	}
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function inprogressComplaints()
    {       
		$user_id = Auth::user()->id; 
		$franchisedetails = \App\Franchises::where('user_id',$user_id)->first();
		$franchise_id = $franchisedetails->id;
		
		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'in progress')
				->where('slj_customers.franchise', $franchise_id)
				->orderBy('id','desc')
				->paginate(20);
				
		return view('frontend.franchise.complaints.inprogress',['data'=>$data]);
	}
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function resolvedComplaints()
    {
        
		$user_id = Auth::user()->id; 
		$franchisedetails = \App\Franchises::where('user_id',$user_id)->first();
		$franchise_id = $franchisedetails->id;
		
		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'resolved')
				->where('slj_customers.franchise', $franchise_id)
				->orderBy('id','desc')
				->paginate(20);
				
		return view('frontend.franchise.complaints.resolve',['data'=>$data]);
    }
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function closedComplaints()
    {
        $user_id = Auth::user()->id; 
		$franchisedetails = \App\Franchises::where('user_id',$user_id)->first();
		$franchise_id = $franchisedetails->id;
		
		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'closed')
				->where('slj_customers.franchise', $franchise_id)
				->orderBy('id','desc')
				->paginate(20);
		
        return view('frontend.franchise.complaints.close',['data'=>$data]);
    }	
}
