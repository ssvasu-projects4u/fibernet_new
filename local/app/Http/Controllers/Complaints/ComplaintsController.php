<?php

namespace App\Http\Controllers\Complaints;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Sms;

class ComplaintsController extends Controller
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

		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
                ->where("slj_complaints.deleted", 0)
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_distributors.distributor_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','slj_complaint_types.title as complaint_sub_type')
				->orderBy('id','desc')
				->paginate(20);

		$departments = \App\Departments::pluck('department as name', 'id');
        $employees = \App\Employees::leftjoin('users','slj_employees.user_id', '=', 'users.id')->pluck('name', 'user_id');

		return view('complaints.index',['data'=>$data,'departments'=>$departments,'employees'=>$employees]);
    }

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function open()
    {
        $data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_distributors.distributor_name','slj_franchises.franchise_name','slj_franchises.id as franchise_id','slj_branches.branch_name','slj_cities.name as city_name','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'open')
				->where('slj_complaints.deleted', '=', 0)
				->orderBy('id','desc')
				->paginate(20);

		$departments = \App\Departments::pluck('department as name', 'id');
        $employees = \App\Employees::leftjoin('users','slj_employees.user_id', '=', 'users.id')->pluck('name', 'user_id');

		return view('complaints.open',['data'=>$data,'departments'=>$departments,'employees'=>$employees]);
	}

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function inprogress()
    {
		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_distributors.distributor_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'in progress')
				->where('slj_complaints.deleted', '=', 0)
                ->orderBy('id','desc')
				->paginate(20);

		return view('complaints.inprogress',['data'=>$data]);
	}

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function resolved()
    {

		$data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_distributors.distributor_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'resolved')
				->where('slj_complaints.deleted', '=', 0)
				->orderBy('id','desc')
				->paginate(20);

		return view('complaints.resolve',['data'=>$data]);
    }

	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function closed()
    {
        $data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_distributors.distributor_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.status', '=', 'closed')
				->where('slj_complaints.deleted', '=', 0)
				->orderBy('id','desc')
				->paginate(20);

        return view('complaints.close',['data'=>$data]);
    }

	/**
     * Display a listing of the deleted resource.
     * @return Response
     */
    public function deleted()
    {
        $data = \App\Complaints::leftjoin('slj_connection_types','slj_complaints.complaint_type', '=', 'slj_connection_types.id')
				->leftjoin('slj_customers','slj_complaints.customerid', '=', 'slj_customers.id')
				->leftjoin('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftjoin('slj_complaint_types','slj_complaints.complaint_sub_type', '=', 'slj_complaint_types.id')
				->select('slj_complaints.*','users.name','users.mobile','users.email','slj_distributors.distributor_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','slj_complaint_types.title as complaint_sub_type')
				->where('slj_complaints.deleted', '=', 1)
				->orderBy('id','desc')
				->paginate(20);

        return view('complaints.delete',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //$departments = \App\Departments::pluck('department as name', 'id');
        //$employees = \App\Employees::leftjoin('users','slj_employees.user_id', '=', 'users.id')->pluck('name', 'user_id');

		//$connection_types = \App\ConnectionType::orderBy('title')->pluck('title','id');
		//$complaint_types = \App\ComplaintType::where('connection_type',3)->pluck('title','id');

		//$departments = \App\Departments::pluck('department as name', 'id');

		return view('complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            //'branch' => 'required',
            'customerid' => 'required',
            //'username' => 'required',
            //'stb_number' => 'required',
            'mobile_number' => 'required',
            //'call_from'=> 'required',
            'complaint_sub_type' => 'required',
            //'complaint_time' => 'required',
            //'assign' => 'required',
            //'status' => 'required',
        ]);

        $data = $request->all();
		$data['status'] = 'open';
		$data['complaint_slno'] = 0;
		$data['created_by'] = \Auth::user()->id;

        $complaint = \App\Complaints::create($data);

        if($complaint)
        {
            //$complaint = \App\Complaints::find($id);
			//$complaint->update($input);
			date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

			$curdate = date('dmy');
			$complaintdetails = \App\Complaints::select('slj_complaints.complaint_slno')
					->where('complaint_slno', 'like', $curdate.'%')
					->orderBy('complaint_slno','desc')
					->first();
			if(isset($complaintdetails->complaint_slno)){
				$ticketno = $complaintdetails->complaint_slno;
				$sno = substr($ticketno,6,strlen($ticketno));
				$ticketno = $curdate.sprintf('%04d', $sno+1);
			}else{
				$ticketno = $curdate."0001";
			}

			$input = array();
			$input['complaint_slno'] = $ticketno;
			$complaint->update($input);

			$customerdetails = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('users.mobile','users.name','slj_customers.connection_type')
				->where('slj_customers.id', $data['customerid'])
                ->first();

			//print_r($customerdetails); exit;

			//send sms
			$message = "Dear ".$customerdetails->name.",%0aYour complaint registered with us for ".$customerdetails->connection_type." with Ticket no ".$ticketno.". Your Complaint will be resolved with in 48 hours. %0a%0aRegards, %0aSLJ Fiber Networks Pvt.Ltd. Team.";
			//$message = "Your Complaint will be resolved with in 48 hours";
			$mobile = $customerdetails->mobile; //"918125449686";
			$sms = new Sms();
			$sms->sendSms($mobile, $message);


			return redirect()->route('complaint.index')->withSuccess('Complaint Created Successfully');
        }else
        {
            return redirect()->back();
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('complaints.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $complaint = \App\Complaints::find($id);

		$customerdetails = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.mobile','users.email')
                ->where('slj_customers.id','=',$complaint->customerid)
                ->first();

		$complaint->name = $customerdetails->name;
		$complaint->email = $customerdetails->email;
		$complaint->mobile_number = $customerdetails->mobile;
		$complaint->complaint_type = $customerdetails->connection_type;

		$complaint_types = \App\ComplaintType::join('slj_connection_types','slj_complaint_types.connection_type', '=', 'slj_connection_types.id')->where('slj_connection_types.title',ucfirst($customerdetails->connection_type))->pluck('slj_complaint_types.title', 'slj_complaint_types.id');

		return view('complaints.edit',['complaint_types'=>$complaint_types,'complaint'=>$complaint]);

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            //'branch' => 'required',
            'customerid' => 'required',
            //'username' => 'required',
            //'stb_number' => 'required',
            'mobile_number' => 'required',
            //'call_from'=> 'required',
            'complaint_sub_type' => 'required',
            //'complaint_time' => 'required',
            //'assign' => 'required',
            //'status' => 'required',
        ]);

        $input = $request->all();
		$input['updated_by'] = \Auth::user()->id;
        $complaint = \App\Complaints::find($id);
        $complaint->update($input);
        return redirect()->route('complaint.index')
                        ->with('success','Complaints updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $complaint = \App\Complaints::find($id);
        $complaint->update([
            'deleted'=> 1,
            'updated_by' => \Auth::user()->id
        ]);
        return redirect()->back()->withSuccess('deleted successfully');
    }

    /**
     * Restore the deleted resource from storage.
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        $complaint = \App\Complaints::find($id);
        $complaint->update([
            'deleted'=> 0,
            'updated_by' => \Auth::user()->id
        ]);
        return redirect()->back()->withSuccess('restored successfully');
    }

    public function updateStatus(Request $request)
    {
        $complaint = \App\Complaints::find($request->id);
		date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

		if($request->val == 'resolved'){
			 $complaint->update([
				'status'=>'resolved',
                'resolved_at'=>date('Y-m-d H:i:s'),
                'updated_by' => \Auth::user()->id
			]);

			$customerdetails = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('users.mobile','users.name','slj_customers.connection_type')
				->where('slj_customers.id', $complaint->customerid)
                ->first();

			//print_r($customerdetails); exit;

			//send sms
			$message = "Dear ".$customerdetails->name.",%0aYour complaint registered with us for ".$customerdetails->connection_type." with Ticket no ".$complaint->complaint_slno.". Your Complaint has been successfully Resolved, if still have issue please contact us on 8885638989. %0a%0aRegards, %0aSLJ Fiber Networks Pvt.Ltd. Team.";
			//$message = "Your Complaint will be resolved with in 48 hours";
			$mobile = $customerdetails->mobile; //"918125449686";
			$sms = new Sms();
			$sms->sendSms($mobile, $message);

		}else if($request->val == 'reopen'){
			$complaint->update([
				'status'=>'open',
				'expected_resolved_by'=>NULL,
				'inprogress_start_at'=>NULL,
				'resolved_at'=>NULL,
                'closed_at'=>NULL,
                'updated_by' => \Auth::user()->id
			]);

		}else{
			 $complaint->update([
                'status'=>$request->val,
                'updated_by' => \Auth::user()->id                
			]);
		}
		return "true";
	}


	public function updateComplaintStatus(Request $request)
    {

        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
		$hours = $request->schedule_time_hours;
		$minutes = $request->schedule_time_minutes;
		$curdate = date('Y-m-d H:i:s');
		$schedule_time = date('Y-m-d H:i',strtotime('+'.$hours.' hour +'.$minutes.' minutes',strtotime($curdate)));

		$complaint = \App\Complaints::find($request->id);
        $complaint->update([
            'status'=>'in progress',
            'expected_resolved_by'=>$schedule_time,
            'inprogress_start_at'=>date('Y-m-d H:i:s'),
            'updated_by' => \Auth::user()->id
        ]);

		$customerdetails = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('users.mobile','users.name','slj_customers.connection_type')
				->where('slj_customers.id', $complaint->customerid)
                ->first();

		//print_r($customerdetails); exit;

		//send sms
		$message = "Dear ".$customerdetails->name.",%0aYour complaint registered with us for ".$customerdetails->connection_type." with Ticket no ".$complaint->complaint_slno.". Your Complaint will be resolved with in ".$hours.":".$minutes." hours. %0a%0aRegards, %0aSLJ Fiber Networks Pvt.Ltd. Team.";
		//$message = "Your Complaint will be resolved with in 48 hours";
		$mobile = $customerdetails->mobile; //"918125449686";
		$sms = new Sms();
		$sms->sendSms($mobile, $message);


        return redirect('admin/complaints/inprogress')->with('success', 'Complaint moved to inprogress successfully.');

    }


    public function updateAssign(Request $request)
    {
        $complaint = \App\Complaints::find($request->id);
        $complaint->update([
            'assign'=>$request->assign,
            'department'=>$request->department,
            'employee'=>$request->employee,
            'updated_by' => \Auth::user()->id
        ]);
        return redirect()->back()->withSuccess('assign updated successfully');

    }

    public function getDepartmentWiseEmployee(Request $request)
    {
        $employees = \App\Employees::leftjoin('users','slj_employees.user_id', '=', 'users.id')->where("slj_employees.department",$request->deptid)->pluck('name', 'user_id');
        return response()->json($employees);
    }



    public static function getEmployeeName($id)
    {
        return DB::table('users')->where('id',$id)->first()->name;
    }

    public function autoCompleteCustomer(Request $request)
    {
        $query = $request->get('term');
        $type = $request->get('type');
        $newcustomerarray[] = array();
        if($type == 'customer_email')
        {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->orderBy('slj_customers.id')->where('users.email', 'LIKE', $query . '%')->get(['slj_customers.id','users.mobile','users.email','users.name','users.email','slj_customers.connection_type']);
                if(!empty($data))
                {
                    foreach ($data as  $value) {

                        $newcustomerarray[] = array('id'=>$value->id,'mobile'=>$value->mobile,'email'=>$value->email,'value'=>$value->email,'name'=>$value->name,'connection_type'=>$value->connection_type);
                    }
                }
        }

		if($type == 'customer_id')
        {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->orderBy('slj_customers.id')->where('slj_customers.id', 'LIKE', $query . '%')->get(['slj_customers.id','users.mobile','users.name','users.email','slj_customers.connection_type']);
                if(!empty($data))
                {
                    foreach ($data as $key => $value) {

                        $newcustomerarray[] = array('id'=>$value->id,'mobile'=>$value->mobile,'value'=>$value->id,'name'=>$value->name,'email'=>$value->email,'connection_type'=>$value->connection_type);
                    }
                }

        }

		if($type == 'customer_mobile')
        {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->orderBy('users.mobile')
                ->where('users.mobile', 'LIKE', trim($query) . '%')
                ->orWhere('users.mobile', 'LIKE', '+91'.trim($query) . '%')
                ->get(['slj_customers.id','users.mobile','users.name','users.email','slj_customers.connection_type']);
                if(!empty($data))
                {
                    foreach ($data as $key => $value) {
                        $newcustomerarray[] = array('id'=>$value->id,'mobile'=>$value->mobile,'value'=>$value->mobile,'name'=>$value->name,'email'=>$value->email,'connection_type'=>$value->connection_type);
                    }
                }

        }

		if($type == 'customer_stbno')
        {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->orderBy('slj_customers.stb_num')->where('slj_customers.stb_num', 'LIKE', $query . '%')
                ->get(['slj_customers.id','users.mobile','users.name','users.email','slj_customers.connection_type', 'slj_customers.stb_num']);
                if(!empty($data))
                {
                    foreach ($data as $key => $value) {
                        $newcustomerarray[] = array('id'=>$value->id,'mobile'=>$value->mobile,'value'=>$value->stb_num,'name'=>$value->name,'email'=>$value->email,'connection_type'=>$value->connection_type);
                    }
                }

        }

		if($type == 'customer_address')
        {
            $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                // ->orderBy('slj_customers.id')
                ->where('installation_address', 'LIKE', '%'. $query . '%')
                ->get(['slj_customers.id','users.mobile','users.name','users.email','slj_customers.connection_type', 'installation_address']);

                if(!empty($data))
                {
                    foreach ($data as $key => $value) {

                        $newcustomerarray[] = array('id'=>$value->id,'mobile'=>$value->mobile,'value'=>$value->installation_address,'name'=>$value->name,'email'=>$value->email,'connection_type'=>$value->connection_type);
                    }
                }

        }

        return \Response::Json($newcustomerarray);
    }


	public function closeComplaintStatus()
    {
        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
		$minutes = 30;
		$curdate = date('Y-m-d H:i:s');
		$close_time = date('Y-m-d H:i:00',strtotime('+'.$minutes.' minutes',strtotime($curdate)));

		$update = array('status' => 'closed','closed_at' => date('Y-m-d H:i:s'));
		\App\Complaints::where('resolved_at','>=',$close_time)->where('status','resolved')->update($update);

		echo "success";
	}
}
