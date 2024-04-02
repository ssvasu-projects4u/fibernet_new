<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Artisan;
use Illuminate\Support\Facades\Input;
use Session;
use App\Invoices;
use Carbon\Carbon;

class FranchiseCustomersController extends Controller
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
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_franchises.user_id', '=', \Auth::user()->id)
				->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.franchise.customers.index',['data'=>$data]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function newCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','new')
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);


			//print_r($data);

        //return view('customers::new',['data'=>$data,'cities'=>$cities]);

		return view('frontend.franchise.customers.new', [
			'data' => $data->appends(Input::except('page')),
		]);


    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function technicalCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','technical')
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
				->orderBy('slj_customers.id')
                ->paginate(15);

        return view('frontend.franchise.customers.technical',['data'=>$data]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function activationCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','activation')
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.franchise.customers.activation',['data'=>$data]);
    }


	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function activeCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->whereIn('slj_customers.current_status',['active','activated'])
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.franchise.customers.active',['data'=>$data]);
    }





	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function scheduleCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','scheduled')
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.franchise.customers.schedule',['data'=>$data]);
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
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
				->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.franchise.customers.expired',['data'=>$data]);
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
				->where('slj_franchises.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.franchise.customers.closed',['data'=>$data]);
    }



    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //Artisan::call('cache:clear');
		//Artisan::call('view:clear');

		$cities = \App\City::where('status','Y')->pluck('name', 'id');

		$connectiontypes = \App\ConnectionType::orderBy('title')->get();
		//echo "<pre>"; print_r($connectiontypes); exit;

		foreach($connectiontypes as $connectiontype){
			$type = strtolower($connectiontype->title);
			$connection_types[$type] = $connectiontype->title;
		}

		//default type - broadband
		$connectiontypedetails = \App\ConnectionType::where('title','broadband')->first();


		//echo "<pre>"; print_r($connection_types); exit;

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
		foreach($iptvdata as $iptv){
			$data = array();
			$data['id'] = $iptv['id'];
			$data['name'] = $iptv['name'];
			$type = $iptv['type'];
			$iptvdatabytype[$type][] = $data;
		}

		return view('frontend.franchise.customers.create',['connectiontypedetails'=>$connectiontypedetails,'cities'=>$cities,'connection_types'=>$connection_types,'packages'=>$packages,'combopackages'=>$combopackages, 'cabledatabytype'=>$cabledatabytype,'iptvdatabytype'=>$iptvdatabytype]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            //'password' => 'required',
            'email' => 'required|unique:users',
			'customer_pic' => 'image|mimes:jpeg,png,jpg,gif',
			'address_proof' => 'image|mimes:jpeg,png,jpg,gif',
			'identity_proof' => 'image|mimes:jpeg,png,jpg,gif',
        ]);


		$input = request()->all();
        $input['status'] = "N";
        $input['current_status'] = "new";


        //echo "<pre>"; print_r($input); exit;

        $user_data = array();
        $user_data['name'] = $input['first_name']." ".$user_data['first_name'] = $input['last_name'];
        $user_data['first_name'] = $input['first_name'];
        $user_data['last_name'] = $input['last_name'];
        $user_data['password'] = "";//Hash::make($input['password']);
        $user_data['email'] = $input['email'];
        $user_data['mobile'] = $input['mobile'];
        $user_data['status'] = "N";

        //User
        $user = \App\User::create($user_data);
        $input['user_id'] = $user->id;

        if($input['connection_type'] == 'cable'){
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
        }else if($input['connection_type'] == 'iptv'){
            if(isset($input['iptvpackage']) && count($input['iptvpackage'])>0){
                $input['cable_packages'] = implode(",",$input['iptvpackage']);
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
            $input['cable_packages'] = "";
            $input['cable_allacart'] = "";
			$input['cable_base'] = "";
			$input['cable_local'] = "";

			$input['iptv_packages'] = "";
            $input['iptv_allacart'] = "";
			$input['iptv_base'] = "";
			$input['iptv_local'] = "";

			unset($input['package']);
            unset($input['sub_package']);
		}

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

        //Customer
        $customer = \App\Customers::create($input);

        //Assign Customer Role
        $user->assignRole('customer');

        return redirect('franchise/customers/process-payment/'.$customer->id)->with('success', 'Customer added successfully.');
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
		}else if($customerdetails->connection_type == 'iptv'){

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
		}else if($customerdetails->connection_type == 'broadband'){
			if($customerdetails->sub_package >0){
				$packagedetails = \App\BroadbandSubPackages::find($customerdetails->sub_package);
				$package_amount = $packagedetails->total;
			}

		}else if($customerdetails->connection_type == 'combo'){
			if($customerdetails->combo_sub_package >0){
				$packagedetails = \App\ComboSubPackages::find($customerdetails->combo_sub_package);
				$package_amount = $packagedetails->total;
			}
		}

		//To Avoid View Cache
		$random_value = mt_rand(10000,10000000);

		return view('frontend.franchise.customers.renew-process-payment',['random_value'=>$random_value,'customerdetails'=>$customerdetails,'package_amount'=>$package_amount]);
    }


	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function renewResponse()
    {
		if(isset($_POST) && count($_POST)>0) {
            $inwardFlowTypeQuery = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->first();
            if (!$inwardFlowTypeQuery) {
                Session::flash('error', "payment flow type inward ");
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

				//echo $customer->sub_package; exit;
				if($customer->sub_package > 0){
					$sub_package = \App\BroadbandSubPackages::find($customer->sub_package);
					//echo "<pre>"; print_r($sub_package); exit;
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


				//echo "<pre>"; print_r($requestdata); exit;

				if(!empty($customer->expiry_date)){
					$expdate = date("Y-m-d",strtotime($customer->expiry_date));
				}else{
					$expdate = date("Y-m-d");
				}

				$expiry_date = date('Y-m-d', strtotime($expdate.' + '.$time.'days'));

				$customer_data = array();

				$customer_data['expiry_date'] = $expiry_date;
				$customer_data['status'] = "Y";

				$customer_data['current_status'] = "active";
				$customer->update($customer_data); //Update details

				$txn_data = array();
				$txn_data['txnid'] = $txnid;
				$txn_data['amount'] = $amount;
                $txn_data['payment_source'] = $_POST['payment_source'];
                // payment to slj 
                $txn_data['payment_flow_type'] = $inwardFlowType;
                // customer user_id
                $txn_data['user_id'] = $customer->user_id;
                // 3 -customer txns
                $txn_data['payment_from'] = 3;

				$txn_data['payment_type'] = "renew";
				$txn_data['payment_message'] = $productinfo;
				$txn_data['status'] = $status;
				$txn_data['customer_id'] = $customer_id;

				//Txs
				\App\Transactions::create($txn_data);

				return redirect('franchise/customers')->with('success_message', "<h3>Successfully Renewed Your Account. Order status is <b>". $status ."</b>.</h3>"."<h4>Transaction ID for this transaction is <b>".$txnid."</b>.</h4>"."<h4>We have received a payment of Rs. <b>" . $amount . "</b>.</h4>");
			}
          }
		}else{
			return redirect('franchise/customers');
		}

		//return view('customers::payment-response',['status'=>$status,'firstname'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'posted_hash'=>$posted_hash,'key'=>$key,'productinfo'=>$productinfo,'email'=>$email,'salt'=>$salt]);
    }

	/**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $customerdetails = $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->first();



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

		//print_r($combosubpackages); exit;

		//$cablepackages = \App\CablePackages::where('type','packages')->select('package_name as name', 'id')->get();

        //$cableallacart = \App\CablePackages::where('type','allacart')->select('channels_description as name', 'id')->get();



        return view('frontend.franchise.customers.edit',['combopackages'=>$combopackages, 'combosubpackages'=>$combosubpackages, 'cabledata'=>$cabledata, 'cabledatabytype'=>$cabledatabytype,'iptvdatabytype'=>$iptvdatabytype,'distributors'=>$distributors,'branches'=>$branches,'franchises'=>$franchises,'cities'=>$cities,'packages'=>$packages,'subpackages'=>$subpackages,'customerdetails'=>$customerdetails,'olt'=>$olt,'dp'=>$dp,'fh'=>$fh,]);
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
        //print_r($customer); exit;

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
        $customerdata['city'] = $requestdata['city'];
		$customerdata['distributor'] = $requestdata['distributor'];
        $customerdata['branch'] = $requestdata['branch'];
        $customerdata['franchise'] = $requestdata['franchise'];
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

        $customer->update($customerdata); //Update details

        return redirect('franchise/customers')->with('success', 'Customer details updated successfully.');

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

        $olt = \App\OLT::where('franchise_id',$customerdetails->franchise)->pluck('id as name', 'id');

        $dp = \App\DP::where('franchise',$customerdetails->franchise)->pluck('id as name', 'id');
        $fh = \App\FH::where('franchise',$customerdetails->franchise)->pluck('id as name', 'id');

        //$cablepackages = \App\CablePackages::where('type','packages')->select('package_name as name', 'id')->get();

        //$cableallacart = \App\CablePackages::where('type','allacart')->select('channels_description as name', 'id')->get();

        //echo "<pre>"; print_r($cablepackages); exit;


        //$branches = \App\Branches::pluck('branch_name as name', 'id');
        //$franchises = \App\Franchises::pluck('franchise_name as name', 'id');
        //$cities = \App\City::pluck('name', 'id');
        //$packages = \App\BroadbandPackages::pluck('package_name as name', 'id');
        //$subpackages = \App\BroadbandSubPackages::pluck('sub_plan_name as name', 'id');

        return view('frontend.franchise.customers.add-technical',['dp'=>$dp,'fh'=>$fh,'olt'=>$olt,'customerdetails'=>$customerdetails]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateTechnical(Request $request, $id)
    {
        $customer = \App\Customers::find($id);
        //print_r($customer); exit;

        $requestdata = $request->all();

        $customerdata = array();
        $customerdata['olt'] = $requestdata['olt'];
        $customerdata['dp'] = $requestdata['dp'];
        $customerdata['fh'] = $requestdata['fh'];
        $customerdata['fh_color'] = $requestdata['fh_color'];

        $customerdata['fiber_length'] = $requestdata['fiber_length'];
        $customerdata['stb_num'] = $requestdata['stb_num'];
        $customerdata['stb_model'] = $requestdata['stb_model'];
        $customerdata['stb_company'] = $requestdata['stb_company'];

        $customerdata['long_lat'] = $requestdata['long_lat'];
        $customerdata['technical_details_status'] = "Y";
        $customerdata['technical_details_c_date'] = date("Y-m-d");
        $customerdata['current_status'] = "activation";

        $customer->update($customerdata); //Update details

        return redirect('franchise/customers/activation')->with('success', 'Customer technical details added successfully.');

    }




    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function activateUser($id)
    {
        $customerdetails = $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->select('slj_customers.*','users.name','users.first_name','users.last_name','users.mobile','users.email')
                ->where('slj_customers.id','=',$id)
                ->first();

        return view('frontend.franchise.customers.user-activate',['customerdetails'=>$customerdetails]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateActivateUser(Request $request, $id)
    {
        $customer = \App\Customers::find($id);

		$validatedData = $request->validate([
            'password' => 'required',
        ]);


		$requestdata = $request->all();

		//echo "<pre>"; print_r($requestdata); exit;
		$customerdata = array();


		if ($requestdata['renewal_cycle'] == 'schedule')
		{
			$originalDate = $requestdata['schedule_date'];
			$schedule_date = date("Y-m-d", strtotime($originalDate));
			$customerdata['schedule_date'] = $schedule_date;
			$customerdata['current_status'] = "scheduled";
			$customerdata['status'] = "N";
		}else{

			$time = 30;
			if($customer->connection_type == 'cable' || $customer->connection_type == 'iptv') {
				$time = '30';
			}else{
				//echo $customer->sub_package; exit;
				if($customer->sub_package > 0){
					$sub_package = \App\BroadbandSubPackages::find($customer->sub_package);
					//echo "<pre>"; print_r($sub_package); exit;
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

			//echo "<pre>"; print_r($requestdata); exit;

			$curdate = date('Y-m-d');

			$expiry_date = date('Y-m-d', strtotime($curdate.' + '.$time.'days'));
			$customerdata['expiry_date'] = $expiry_date;
			$customerdata['status'] = "Y";
			$customerdata['current_status'] = "activated";
			$customerdata['active_updated_date'] = date("Y-m-d");
		}


		$user = \App\User::find($customer->user_id);

        $userdata = array();
        $userdata['password'] = Hash::make($requestdata['password']);
        $userdata['status'] = "Y";

        //Update user details
	    $user->update($userdata);

        $customerdata['renewal_cycle'] = $requestdata['renewal_cycle'];
		$customer->update($customerdata); //Update customer details

		if ($requestdata['renewal_cycle'] == 'schedule')
		{
			return redirect('franchise/customers')->with('success', 'Customer Activation Scheduled Successfully.');
		}else{
			return redirect('franchise/customers')->with('success', 'Customer activated successfully.');
		}

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function getCityBranchFranchises($city,$branch)
    {
        $citybranchefranchises = \App\Franchises::join('users','users.id', '=', 'slj_franchises.user_id')->where('city',$city)->where('branch',$branch)->where('users.status','Y')->select('slj_franchises.id','franchise_name')->get();

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
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function addPayment()
    {   $id = Auth::user()->id;
        $customerdetails = \App\User::where('users.id','=',$id)
                ->first();
        $totalPaidAmount = \App\Franchises::where('user_id','=',$id)->pluck('available_balance');
                $totalPaidAmount = $totalPaidAmount[0];
        //$totalPaidAmount = \App\PaymentDetails::where('user_id','=',$customerdetails->id)->where('payment_from','=',1)->where('payment_status','=','success')->sum('amount');
		
			$package_amount = 0;
			
			
			//To Avoid View Cache
			$random_value = mt_rand(10000,10000000);
		
			return view('frontend.franchise.add-payment',['random_value'=>$random_value,'customerdetails'=>$customerdetails,'totalPaidAmount'=>$totalPaidAmount]);	
			

        
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function paymentResponse()
    {           
        if(isset($_POST) && count($_POST)>0) {
			$status = $_POST["status"];
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
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
			     $branch_data = \App\Franchises::where('user_id','=',$productinfo)->first();

                $branch_name=$branch_data->franchise_name;
                $branchidnumber=$branch_data->id;
			
			 $txn_data= array();
				$txn_data['txnid'] = $txnid;
				
				$txn_data['payment_mode'] = "Payment Gateway";
				$txn_data['payment_from'] = 2;
				$txn_data['user_id'] = $id = \Auth::user()->id;
				$txn_data['amount'] =$amount;
				$txn_data['payment_type'] = "Deposit";
			
				$txn_data['payment_message'] = $productinfo;
				$txn_data['status'] = "Recheck & Attempted";
                \App\Transactions::create($txn_data);
                
                $depositData1=array();
                $depositData1['name']=$branch_name;
                $depositData1['deposit_type']="Payment Gateway";
                $depositData1['deposit_amount']=$amount;
                $depositData1['deposit_for']=1;
                $depositData1['deposit_date']=Carbon::now();
                
                 $depositData1['payment_type']="Deposit";
                $depositData1['franchise_branch_id']=$branchidnumber;
                
                
                $depositdata = \App\Deposits::create($depositData1);
                
            
				return redirect('franchise/dashboard')->with('error_message', "<h3>Invalid Transaction. Please try again </h3>");
			}else {
				//$paymentdetails = explode("__",$productinfo);
				//$customer_id = $paymentdetails[1];
				
				//$customer = \App\User::find($customer_id);
				//$customer_data = array();
				//$customer_data['current_status'] = "technical";
				//$customer->update($customer_data); //Update details
				$id = Auth::user()->id;
				$txn_data = array();
				$txn_data['txnid'] = $txnid;
				$txn_data['amount'] = $amount;
				$txn_data['payment_source'] = $_POST['payment_source'];
				$txn_data['payment_from'] = 1;
				$txn_data['payment_message'] = $productinfo;
				$txn_data['payment_status'] = $status;
				$txn_data['user_id'] = $productinfo;
                $txn_data['created_by'] = $productinfo;

				//Txs
				\App\PaymentDetails::create($txn_data);
                $f_data = \App\Franchises::where('user_id','=',$productinfo)->first();

                //print_r($branch_id);exit;
                $f_name=$f_data->franchise_name;
                $f_id = $f_data->id;

                $depositData =array(
                    'deposit_amount' => $amount,
                    'deposit_type' => 'Payment Gateway',
                    'deposit_date' => date('Y-m-d'),
                    'franchise_branch_id' => $f_id,
                    'name'=>$f_name,
                    'deposit_for'=>1
                );
                $depositdata = \App\Deposits::create($depositData);
                $franchise_branch = \App\Franchises::find($f_id);
                //print_r($franchise_branch);exit;
                $data['credited_balance'] = $franchise_branch->credited_balance+$amount;
                $data['available_balance'] = $data['credited_balance']-$franchise_branch->debited_balance;
                $res=$franchise_branch->update($data); //Update details
				$inwardFlowType = \App\Paymenttype::where('payment_flow_type', 'inward')
                ->select("id")->firstOrFail()->id;

                $txn_data = array();
				$txn_data['txnid'] = $txnid;
				$txn_data['amount'] = $amount;
                $txn_data['payment_type'] = 'new';
				// txns to slj system
				$txn_data['payment_flow_type'] = $inwardFlowType;
				// customer user id
				$txn_data['user_id'] = $id;
				// 3 - customer
				$txn_data['payment_from'] = 2;
				$txn_data['payment_message'] = $productinfo;
				//$txn_data['customer_id'] = $customer_id;
				$txn_data['payment_mode'] = 'Payment Gateway';
				$txn_data['status'] = $status;
                $txn_data['payment_source']=$_POST['payment_source'];
                //Txs
                $txnRecord = \App\Transactions::create($txn_data);


                $invoiceData = [];
                $invoiceData["invoice_type"] = "Deposit";
                $invoiceData["payment_type"] = "Online Franchise Deposit";
                $invoiceData['payment_through'] = $_POST['payment_source'];

                // franchise 
                $invoiceData["created_to"] = 2;

                // $unpaid_invoices_sum = Invoices::where("franchise_branch_id", $f_id)
                // ->where("created_to", $invoiceData['created_to'])
                // ->where("paid", "=", 0)
                // ->where("status", "=", 1)
                // ->sum('current_balance');

                // sum of unpaid invoices
                $unpaid_invoices_sum = Invoices::where("franchise_branch_id",
                  $f_id
                )->where("created_to", $invoiceData['created_to'])
                    // ->where("paid", "=", 0)
                    ->where("cancelled", "=", 0)
                    ->where("status", "=", 1)
                    ->sum("total_amount");

                // sum of paid invoices
                $paid_invoices_sum = Invoices::where("franchise_branch_id",
                  $f_id
                )->where("created_to", $invoiceData['created_to'])
                    ->where("paid", "=", 1)
                    ->where("cancelled", "=", 0)
                    ->where("status", "=", 1)
                    ->sum("total_amount");

                // sum of deleted invoices
                $deleted_invoices_sum = Invoices::where("franchise_branch_id",
                $f_id
                 )->where("created_to", $invoiceData['created_to'])
                //   ->where("paid", "=", 1)
                //   ->where("cancelled", "=", 0)
                ->where("status", "=", 0)
                ->sum("total_amount");

                $cancelled_invoices_sum = Invoices::where("franchise_branch_id",
                  $f_id
                )->where("created_to", $invoiceData['created_to'])
                    // ->where("paid", "=", 1)
                    ->where("cancelled", "=", 1)
                    // ->where("status", "=", 1)
                    ->sum("total_amount");

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

                $depositdataOrderNumber = \App\Deposits::find($depositdata->id)->order_number;

                $invoiceData["po_number"] = $depositdataOrderNumber;
                $invoiceData["bill_number"] = $bill_number;
                $invoiceData["txn_id"] = $txnRecord->id;
                $invoiceData["payment_gateway_txn_id"] = $txnid;
                $invoiceData["paid_amount"] = $amount;
                $invoiceData["paid_date"] = Carbon::now();
                $invoiceData["payment_date"] = Carbon::now();

                $invoiceData["amount"] = $amount;
                $invoiceData["total_amount"] = $amount;
                // the logged in user 
                $invoiceData["created_by"] = $id;
                // user who is impacting 
                $invoiceData["created_for"] = $id;
                // create by role
                // franchise role is 2 (role of a logged in user)
                $invoiceData["created_from"] = 2;
                // $invoiceData["base_price"] = $amount;
                $invoiceData["payment_flow_type"] = 'inward';
                $invoiceData["ptype"] = 1;

                // $franchise_branch 
                $invoiceData["name"] = $franchise_branch->franchise_name;
                $invoiceData["address"] = $franchise_branch->agreement_address;
                $invoiceData["payment_mode"] = 'Online';

                $invoiceData["franchise_branch_id"] = $f_id;
                // active 
                $invoiceData["status"] = 1;
                // paid invoice
                $invoiceData["paid"] = 1;
                $invoiceData["current_balance"] =  floatval($unpaid_invoices_sum)  - (floatval($paid_invoices_sum) + floatval($deleted_invoices_sum) + floatval($cancelled_invoices_sum) + floatval($amount));
                // paid invoice from franchise
                Invoices::create($invoiceData);

				return redirect('franchise/dashboard')->with('success_message', "<h3>Thank You. Your order status is <b>". $status ."</b>.</h3>"."<h4>Your Transaction ID for this transaction is <b>".$txnid."</b>.</h4>"."<h4>We have received a payment of Rs. <b>" . $amount . "</b>.</h4>");
			}
        }
        else {
			return redirect('franchise/dashboard');
		}

		//return view('customers::payment-response',['status'=>$status,'firstname'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'posted_hash'=>$posted_hash,'key'=>$key,'productinfo'=>$productinfo,'email'=>$email,'salt'=>$salt]);
    }
}
