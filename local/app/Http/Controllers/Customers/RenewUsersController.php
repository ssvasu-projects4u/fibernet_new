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
use Carbon\Carbon;
use Log;
use Breadcrumbs;
use \stdClass;
use App\RenewUserInvoices;
use App\RenewUserHistory;
use PDF;
use App;
use Mail;
use App\Mail\SljFiberMail;

class RenewUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
				$packages = explode(",",$customerdetails->iptv_local);
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
     * Display a general information of individual customer.
     * @return Response
    */
    public function renewGeneralInfo($viewtype, $customerId)
    {
        $user = Auth::user();
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames();

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
        $customerDetail = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_broadband_packages','slj_customers.package', '=', 'slj_broadband_packages.id')
                ->leftJoin('slj_broadband_subpackages','slj_customers.sub_package', '=', 'slj_broadband_subpackages.id')
                ->leftJoin('slj_combo_packages','slj_customers.combo_package', '=', 'slj_combo_packages.id')
                ->leftJoin('slj_combo_subpackages','slj_customers.combo_sub_package', '=', 'slj_combo_subpackages.id')
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
                'slj_broadband_packages.id as bpackage_id',
                'slj_broadband_subpackages.id as sbpackage_id',                
                'slj_combo_packages.package_name as copackage_name',
                'slj_combo_subpackages.sub_plan_name as scopackage_name',
                'slj_combo_packages.id as copackage_id',
                'slj_combo_subpackages.id as scopackage_id',    
                'slj_customers.current_status as current_status',
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

                $franchise_list=array();
                if($roles[0]=='branch'){
                    $tbl='slj_branches.user_id'; 
                    $column='slj_branches.city';
                    $branch = \App\Branches::join('users','users.id', '=', $tbl)->select('slj_branches.id')->where('users.id',$id)->first();
                    $franchise_list = \App\Franchises::where('branch',$branch->id)->pluck('franchise_name','id');            
                }

                // $cities = \App\City::where('status','Y')->pluck('name', 'id');
      
                // $connectiontypes = \App\ConnectionType::orderBy('title')->get();
        
                // foreach($connectiontypes as $connectiontype){
                //     $type = strtolower($connectiontype->title);
                //     $connection_types[$type] = $connectiontype->title;
                // }

                // //default type - broadband
                // $connectiontypedetails = \App\ConnectionType::where('title','broadband')->first();

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
        $combosubpackages = [];
        $subpackages = [];
        // dd($customerDetail->bpackage_name);
        if ($customerDetail->bpackage_name != "") {
            $subpackages = \App\BroadbandSubPackages::where('status','Y')->where('package',$customerDetail->bpackage_id)->pluck('sub_plan_name as name', 'id');

        }
        else if ($customerDetail->copackage_name != "") {
            $combosubpackages = \App\ComboSubPackages::where('status','Y')->where('package',$customerDetail->copackage_id)->pluck('sub_plan_name as name', 'id');
        }

        $lastInvoice = RenewUserInvoices::latest()->first();

        return view('customers.renew-general-info',[
          'data' => $customerDetail,
          'viewtype' => $viewtype,
          'breadcrumbs' => $breadcrumbs,
          'combopackages'=> $combopackages,
          'combosubpackages'=> $combosubpackages,
          'cabledata'=> $cabledata,
          'cabledatabytype'=> $cabledatabytype,
          'iptvdatabytype'=> $iptvdatabytype,
          'packages'=> $packages,
          'subpackages'=> $subpackages,
          'invoice' => $lastInvoice,
          'package_amount' => $this->packageAmount($customerDetail->customer_id)
        ]);
    }

    /**
     * Display a general information of individual customer.
     * @return Response
    */
    public function renewalConfiramtion($renewId, $viewtype, $customerId) {
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
                'slj_customers.current_status as current_status',
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

        $renew = RenewUserHistory::findOrFail($renewId);
        $lastInvoice = RenewUserInvoices::latest()->first();

        $package = "";
        $subpackage = "";
        $combopackage = "";
        $combosubpackage = "";

        if ( $renew->connection_type == 'broadband' ) {
            $package = \App\BroadbandPackages::findorFail($renew->package);
            $subpackage = \App\BroadbandSubPackages::findorFail($renew->sub_package);
        } else if ( $renew->connection_type == 'combo') {
            $combopackage = \App\ComboPackages::findorFail($renew->combo_package);
            $combosubpackage = \App\ComboSubPackages::findorFail($renew->combo_sub_package);
        }

        return view('customers.renew-confirm-general-info',[
          'data' => $data,
          'viewtype' => $viewtype,
          'breadcrumbs' => $breadcrumbs,
          'renew' => $renew,
          'invoice' => $lastInvoice,
          'combopackage' => $combopackage,
          'combosubpackage' => $combosubpackage,
          'package'=>$package,
          'subpackage'=>$subpackage,
        ]);
    }

    /**
     *
     * Display a listing of the customer Scheduled Renewal.
     *
     * @return Response
     *
     */
    public function scheduledRenewal($viewtype=null, $customerId=null) {
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
            'slj_customers.current_status as current_status',
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

        $scheduledRenwalUser = RenewUserHistory::join('slj_renewuser_invoices as ri', 'slj_renew_user_history.id', '=', 'ri.renew_id')
            ->leftJoin('slj_broadband_packages','slj_renew_user_history.package', '=', 'slj_broadband_packages.id')
            ->leftJoin('slj_broadband_subpackages', 'slj_renew_user_history.sub_package', '=', 'slj_broadband_subpackages.id')
            ->leftJoin('slj_combo_packages','slj_renew_user_history.combo_package', '=', 'slj_combo_packages.id')
            ->leftJoin('slj_combo_subpackages','slj_renew_user_history.combo_sub_package', '=', 'slj_combo_subpackages.id')
            ->leftJoin('slj_branches','slj_renew_user_history.branch', '=', 'slj_branches.id')
            ->select(
                'ri.*',
                'slj_renew_user_history.*',
                'slj_renew_user_history.customer_id',
                'slj_broadband_packages.package_name as bpackage_name',
                'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
                'slj_combo_packages.package_name as copackage_name',
                'slj_combo_subpackages.sub_plan_name as scopackage_name',
                'ri.id as invoice_id',
                'slj_branches.branch_name',
            )
            ->where('slj_renew_user_history.renew_cycle', 'schedule')
            ->where('slj_renew_user_history.confirmed', 1)
            ->where('slj_renew_user_history.status', 1)
            // ->where('ri.paid', 1)
            ->where('slj_renew_user_history.customer_renewed', 0)
            ->where('ri.cancelled', 0)
            ->where('ri.status', 1)
            ->where('slj_renew_user_history.customer_id', $customerId)
            ->orderBy('slj_renew_user_history.updated_at', 'desc')
            ->paginate(20);

        return view('customers.scheduled-renewal',[
            'data'=>$data,
            'viewtype' => $viewtype,
            'breadcrumbs' => $breadcrumbs,
            'scheduledRenwalUser' => $scheduledRenwalUser,
        ]);
    }

    /**
     * Display a listing of the customer renewal history.
     * @return Response
     */
    public function renewalGeneralInfoHistory($viewtype=null, $customerId=null) {
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
                'slj_customers.current_status as current_status',
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

    $renewalhistories = RenewUserInvoices::join('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select(['slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name',
            'slj_renewuser_invoices.id as invoice_id'
        ])
        ->where('rh.customer_id', $customerId)
        ->orderBy('slj_renewuser_invoices.updated_at', 'desc')
        ->paginate(20);

        return view('customers.renewal-general-info-history',[
            'data'=>$data,
            'viewtype' => $viewtype,
            'breadcrumbs' => $breadcrumbs,
            'renewalhistories' => $renewalhistories,
        ]);
    }

    /**
     * Display a listing of the customer renewal history.
     * @return Response
     */
    public function renewalHistory() {
        $data = RenewUserInvoices::join('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select('slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',    
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name',
            'slj_renewuser_invoices.id as invoice_id'
        )
        ->orderBy('slj_renewuser_invoices.updated_at', 'desc')
        ->paginate(20);

        return view('customers.renewal-history',[
            'data'=>$data,
        ]);
    }

    /**
     * Display a listing of the customer renewal invoices.
     * @return Response
     */
    public function customerGeneralInfoRenewalInvoices($viewtype=null, $customerId=null) {
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
            'slj_customers.current_status as current_status',
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

        $scheduledRenwalInvoices = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
            ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
            ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
            ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
            ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
            ->leftJoin('users','rh.renew_by', '=', 'users.id')
            ->select(['slj_renewuser_invoices.*', 'rh.*',
                'slj_broadband_packages.package_name as bpackage_name',
                'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
                'slj_combo_packages.package_name as copackage_name',
                'slj_combo_subpackages.sub_plan_name as scopackage_name',
                'users.first_name as renewby_first_name',
                'users.last_name as renewby_last_name',
                'slj_renewuser_invoices.id as invoice_id',
                'slj_renewuser_invoices.paid_amount',
                'rh.payment_type'
            ])
            ->where('rh.customer_id', $customerId)
            ->orderBy('slj_renewuser_invoices.updated_at', 'desc')
            ->paginate(20);

        return view('customers.invoices.general-info.renewal-invoices',[
            'viewtype' => $viewtype,
            'breadcrumbs' => $breadcrumbs,
            'scheduledRenwalInvoices' => $scheduledRenwalInvoices,
            'data'=>$data,            
          ]
        );
    }

    /**
     * Display a listing of the customer renewal invoices.
     * @return Response
     */
    public function customerRenewalInvoices()
    {
        $data = RenewUserInvoices::join('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select('slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name',
            'slj_renewuser_invoices.id as invoice_id'
        )
        ->where('slj_renewuser_invoices.paid', 0)
        // ->where('rh.payment_type', "!=" , "cheque_payment")
        ->where('slj_renewuser_invoices.status', 1)
        ->where('slj_renewuser_invoices.cancelled', 0)
        ->orderBy('slj_renewuser_invoices.updated_at', 'desc')
        ->paginate(20);

        return view('customers.invoices.inunpaid-invoices',[
          'data'=>$data,
        ]);
    }

    /**
     * Display a listing of the customer renewal invoices.
     * @return Response
     */
    public function customerRenewalPaidInvoices()
    {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select('slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name',
            'slj_renewuser_invoices.id as invoice_id'
        )
        ->where('slj_renewuser_invoices.paid', 1)
        ->where('slj_renewuser_invoices.status', 1)
        ->where('slj_renewuser_invoices.cancelled', 0)
        ->orderBy('slj_renewuser_invoices.updated_at', 'desc')
        ->paginate(20);

        return view('customers.invoices.inpaid-invoices',[
          'data'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function customersRenewaluser(Request $request, $viewtype, $customerId) {
        $customer = \App\Customers::findOrFail($customerId);

        $franchise = \App\Franchises::findOrFail($customer->franchise);

        $user = Auth::user();
        $roles = $user->getRoleNames();
		$requestdata = $request->all();
        $curdate = Carbon::now();

        if ($customer->status == "Y" && $customer->connection_status != "expired") {
            $curdate = new Carbon($customer->expiry_date);
            if ($requestdata['renew_cycle'] == 'schedule') {
                $curdate = new Carbon($requestdata["scheduled_datetime"]);
            }            
            if ($customer->connection_type == "broadband") {
                if ($customer->package != $requestdata["package"]) {
                    return redirect()->back()
                    ->withErrors("Active User package shouldn't be changed.");
                }
            }
            else if ($customer->connection_type == "combo") {
                if ($customer->combo_package != $requestdata["combo_package"]) {
                    return redirect()->back()
                    ->withErrors("Active User Package shouldn't be changed.");
                }
            }
            else if ($customer->connection_type == "iptv") {
                if ($customer->iptv_packages != $requestdata["iptvpackages"]) {
                    return redirect()->back()
                    ->withErrors("Active User Package shouldn't be changed.");
                }                
            }
            else if ($customer->connection_type == "cable") {
                if(!empty($requestdata["cablepackages"])) // changed by DURGA
                {
                if ($customer->cable_packages != $requestdata["cablepackages"]) {
                    return redirect()->back()
                    ->withErrors("Active User Package shouldn't be changed.");
                }
                }
            }
        }
        if ($requestdata['renew_cycle'] == 'schedule') {
            $curdate = new Carbon($requestdata["scheduled_datetime"]);
        }
        $requestdata["customer_id"] = $customerId;
        $custdata=array();
        $custdata["customer_id"] = $customerId;
        $requestdata["branch"] = $customer->branch;
        $custdata["branch"] = $customer->branch;
        $requestdata["installation_address"] = $customer->installation_address;
        $custdata["installation_address"] = $customer->installation_address;
    

        $requestdata["user_id"] = $customer->user_id;
        $requestdata["renew_by"] = $user->id;
        $requestdata["franchise"] = $franchise->id;
        $custdata["franch"] = $franchise->id;
        $custdata["city"] = $customer->city;
        $requestdata["franchise_name"] = $franchise->franchise_name;
        $requestdata["renew_type"] = 'existing';
        $custdata["paytype"]="Renewal";
        

        $requestdata["additional_amount"] = $requestdata["additional_charges_amount"];

        if ($requestdata['connection_type'] == "iptv") {
          if (isset($requestdata["iptvbase"])) {
            $requestdata["iptv_base"] = implode(",", $requestdata["iptvbase"]);
          }
          if (isset($requestdata["iptvpackage"])) {
            $requestdata["iptv_packages"] = implode(",", $requestdata["iptvpackage"]);
          }
          if (isset($requestdata["iptvlocal"])) {
            $requestdata["iptv_local"] = implode(",", $requestdata["iptvlocal"]);
          }
          if (isset($requestdata["iptvallacart"])) {
            $requestdata["iptv_allacart"] = implode(",", $requestdata["iptvallacart"]);
          }
        }

        if ($requestdata['connection_type'] == "cable") {
            if (isset($requestdata["cablebase"])) {
              $requestdata["cable_base"] = implode(",", $requestdata["cablebase"]);
            }
            if (isset($requestdata["cablepackage"])) {
              $requestdata["cable_packages"] = implode(",", $requestdata["cablepackage"]);
            }
            if (isset($requestdata["cablelocal"])) {
              $requestdata["cable_local"] = implode(",", $requestdata["cablelocal"]);
            }
            if (isset($requestdata["cableallacart"])) {
              $requestdata["cable_allacart"] = implode(",", $requestdata["cableallacart"]);
            }
        }

        $renewalhistory = RenewUserHistory::create($requestdata);

        $time = '';
        if ($requestdata['connection_type'] == 'cable' ||
            $requestdata['connection_type'] == 'iptv') {
            $time = 30;
        } else {
            if ($requestdata['connection_type'] == "broadband" && $requestdata['sub_package'] > 0) {
                $sub_package = \App\BroadbandSubPackages::find($requestdata['sub_package']);

                if ($sub_package->time_unit >0) {
                    if ($sub_package->unit_type == 'month') {
                        $time = 30 * $sub_package->time_unit;
                    } else {
                        $time = $sub_package->time_unit;
                    }
                }
            }

            if ( $requestdata['connection_type'] ==  "combo" && $requestdata['combo_sub_package'] > 0) {
                $sub_package = \App\ComboSubPackages::find($requestdata['combo_sub_package']);
                if ($sub_package->time_unit >0) {
                    if ($sub_package->unit_type == 'month') {
                        $time = 30 * $sub_package->time_unit;
                    } else {
                        $time = $sub_package->time_unit;
                    }
                }
            }
        }
$custdata["connection_type"]=$requestdata['connection_type'];
\App\CustomerPayments::create($custdata);
        $expiry_date = $curdate->addDays($time);
        $url='admin';
        if($roles[0]=='branch' || $roles[0]=='franchise') {
          $url=$roles[0];
        }

        // customer role is 3
        $invoiceData["created_to"] = 3;

        // admin role id
		$invoice['created_from'] = 4;

        $renewalhistory->update([
            'new_expiry_date' => $expiry_date,
            'time' => $time . ' days'
        ]);
        return redirect($url.'/customers/view/general-info/'.$renewalhistory->id.'/'.$viewtype.'/'.$renewalhistory->customer_id.'/renewal-confiramtion');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function customersRenewaluserConfirm(Request $request, $renewId, $viewtype, $customerId) {
        $customer = \App\Customers::findOrFail($customerId);
        $user = \App\User::findOrFail($customer->user_id);
        $renewalhistory = RenewUserHistory::findOrFail($renewId);
        $requestdata = $request->all();
        $cust_payments=array();
        $requestdata['confirmed'] = 1;
        if ($requestdata["payment"] == "pay_now") {
            // if ($requestdata['payment_type'] != "cheque_payment" ) {
            $requestdata['payment_status'] = "paid";
            $requestdata['paid_date'] = Carbon::now();
            $newexpiredate = Carbon::now()->addMonth(); // added by durga new code
            $requestdata['balance'] = 0.0;
            $cust_payments['payment_status']="paid";
            $cust_payments['amount']=$renewalhistory->final_payable;
            $cust_payments['paid_date'] = Carbon::now();
            $cust_payments['payment_mode']=$requestdata['payment_type'];
              $custpay = \App\CustomerPayments::findOrFail($customerId);
            $custpay->update($cust_payments);

            // }
            // else {
            //   $requestdata['payment_status'] = "unpaid";
            // }
          $requestdata['payment_type'] = $requestdata['payment_type'];
          
        }
        else {
          $requestdata['payment_status'] = "unpaid";
        }
        $renewalhistory->update($requestdata);

        if ($renewalhistory->renew_cycle == "immediate") {
            // if ($requestdata['payment_type'] != "cheque_payment" ) {
                $fromdate = Carbon::now();
                $requestdata['from_date'] = $fromdate;
               // $requestdata['end_date'] = $renewalhistory->new_expiry_date;
                $requestdata['end_date'] = $newexpiredate;
                $requestdata['new_expiry_date'] = $newexpiredate; // This is new code
                $requestdata['csbu'] = $customer->status;
                $requestdata['ccsbu'] = $customer->current_status;
                $requestdata['clconnectiontype'] = $customer->connection_type; 
              //  $requestdata['cle'] = $customer->expiry_date;
              $requestdata['cle'] = $newexpiredate; // new code added here for expiry date
                $requestdata['clp'] = $customer->package  != "" ? $customer->package : NULL;
                $requestdata['clsp'] = $customer->sub_package  != "" ? $customer->sub_package : NULL;

                // combo package
                $requestdata['clcp'] = $customer->combo_package  != "" ? $customer->combo_package : NULL;
                $requestdata['clcsp'] = $customer->combo_subpackage  != "" ? $customer->combo_sub_package : NULL;

                // cable package
                $requestdata['clcpa'] = $customer->cable_package !=  "" ? $customer->cable_package : NULL;
                $requestdata['clca'] = $customer->cable_allacart != "" ? $customer->cable_allacart : NULL;
                $requestdata['clcb'] = $customer->cable_base != "" ? $customer->cable_base : NULL;
                $requestdata['clcl'] = $customer->cable_local != "" ? $customer->cable_local : NULL;

                // cable package
                $requestdata['clip'] = $customer->iptv_package != "" ? $customer->iptv_package : NULL;
                $requestdata['clia'] = $customer->iptv_allacart != "" ? $customer->iptv_allacart : NULL;
                $requestdata['clib'] = $customer->iptv_base != "" ? $customer->iptv_base : NULL;
                $requestdata['clil'] = $customer->iptv_local != "" ? $customer->iptv_local : NULL;
                $renewalhistory->update($requestdata);

                $customer_data = array();
               // $customer_data['expiry_date'] = $renewalhistory->new_expiry_date;
                $customer_data['expiry_date'] = $newexpiredate;
               
                $customer_data['status'] = "Y";
                $customer_data['renew_from_date'] = $fromdate;
                $customer_data['current_status'] = "active";
                $customer_data['package'] = $renewalhistory->package;
                $customer_data['sub_package'] = $renewalhistory->sub_package;
                // combo package
                $customer_data['combo_package'] = $renewalhistory->combo_package;
                $customer_data['combo_subpackage'] = $renewalhistory->combo_subpackage;

                $customer_data['cable_allacart'] = $renewalhistory->cable_allacart;
                $customer_data['cable_packages'] = $renewalhistory->cable_packages;
                $customer_data['cable_base'] = $renewalhistory->cable_base;
                $customer_data['cable_local'] = $renewalhistory->cable_local;

                $customer_data['iptv_allacart'] = $renewalhistory->iptv_allacart;
                $customer_data['iptv_packages'] = $renewalhistory->iptv_packages;
                $customer_data['iptv_base'] = $renewalhistory->iptv_base;
                $customer_data['iptv_local'] = $renewalhistory->iptv_local;

                $customer->update($customer_data);

                $this->renewUserInvoiceCreate($renewalhistory);

                $renewalhistory->update([
                    'customer_renewed' => 1
                ]);
            // }
        }
        else if ($renewalhistory->renew_cycle == "schedule") {
            if ($renewalhistory->generate_invoice == "immediate") {
              $this->renewUserInvoiceCreate($renewalhistory);
            }
        }
        $renewalhistory->update($requestdata);

        $user = Auth::user();
        $roles = $user->getRoleNames();
        $url='admin';
        if($roles[0]=='branch' || $roles[0]=='franchise'){
            $url=$roles[0];
        }

        return redirect($url.'/customers/view/general-info/'.$viewtype.'/'.$customerId.'/view-general-info')->with('success', ' Well done! User renewd successfully.');
    }

    /**
     *  get package amount from customer details
     */
    public function packageAmount($customer_id) {
		$package_amount = 0;
        $customerdetails = \App\Customers::findOrFail($customer_id);
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
				$packages = explode(",",$customerdetails->iptv_local);
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

        return $package_amount;
    }

    /**
     * Create Renew User Invoice.
     *
     */
    function renewUserInvoiceCreate($renewalhistory) {
        $customer = \App\Customers::findOrFail($renewalhistory->customer_id);
        $user = \App\User::findOrFail($customer->user_id);

        $invoice['renew_id'] = $renewalhistory->id;
        $invoice['customer_id'] = $customer->id;

        // check immediate or schedule 
        if ($renewalhistory->renew_cycle == "schedule") {
          $invoice['from_date'] = $renewalhistory->scheduled_datetime;
        }
        else {
          $invoice['from_date'] = Carbon::now();
        }
        $invoice['end_date'] = $renewalhistory->new_expiry_date;

        // $invoice['amount'] = $renewalhistory->total_amount;
        $invoice['base_price'] = $renewalhistory->package_amount;
        // $invoice['paid_amount'] = $renewalhistory->paid_amount;
        $invoice['total_amount'] = $renewalhistory->final_payable;
        $invoice['billing_address'] = $customer->billing_address;
        $invoice['installation_address'] = $customer->installation_address;

        $invoice['gst_number'] = $customer->gstin;
        $invoice['email'] = $user->email;
        // $invoice['sgst_amount'] = $renewalhistory->sgst_amount;

        $invoice['phone'] = $user->mobile;
        $invoice['name'] = $user->first_name . " " . $user->last_name;
        $invoice['invoice_type'] = 'renewal';

		$invoice['payment_type'] = 'Renew User';
        if ($renewalhistory->payment_status == "paid") {
            $invoice['bill_number'] = $this->getBillNumber();
            $invoice['paid'] = 1;
            $invoice['paid_amount'] = $renewalhistory->final_payable;
        }
        else {
            $invoice['paid'] = 0;
        }
        $invoice['renew_date'] = $renewalhistory->created_at;
        $invoice['customer_id'] = $renewalhistory->customer_id;

        if ($renewalhistory->generate_invoice == "while-schedule-time") {
          $invoice['invoice_date'] = $renewalhistory->scheduled_date;
        } else {
          $invoice['invoice_date'] = Carbon::now();
        }

        $totalSubtract = ($this->someOfdeleteRenewInvoice($customer->id)
            + $this->someOfCancelledRenewInvoice($customer->id) 
            +  floatval($invoice["total_amount"])
        );
        if ($renewalhistory->payment_status == "paid") {
            if ($this->someOfUnpaidRenewInvoice($customer->id) == 0.0) {
                $invoice["current_balance"] = 0.0;
            }
            else {
                $invoice["current_balance"] = $this->someOfUnpaidRenewInvoice($customer->id) - $totalSubtract;
            }
        } else {
           $invoice["current_balance"] = $this->someOfUnpaidRenewInvoice($customer->id) + floatval($invoice["total_amount"]);
        }

        RenewUserInvoices::create($invoice);
    }

    /**
     * 
     */
    function renewUserScheduledExecute() {
      $renewhistories = RenewUserHistory::where('status', 1)
      ->where("confirmed", 1)
      ->where("renew_cycle", "schedule")
      ->where("scheduled_datetime", "<=", Carbon::now())
      ->where("customer_renewed", 0)
      ->get();
      if (!empty($renewhistories)) {
        foreach ($renewhistories as $key => $renewalhistory) {
            $renewalhistorydata = RenewUserHistory::findorFail($renewalhistory->id);
            $fromdate = Carbon::now();
            $requestdata = [];
            $requestdata['from_date'] = $fromdate;
            $requestdata['end_date'] = $renewalhistorydata->new_expiry_date;
            $customer = \App\Customers::findOrFail($renewalhistorydata->customer_id);
            $requestdata['csbu'] = $customer->status;
            $requestdata['ccsbu'] = $customer->current_status;
            $requestdata['clconnectiontype'] = $customer->connection_type; 
            $requestdata['cle'] = $customer->expiry_date;
            $requestdata['clp'] = $customer->package  != "" ? $customer->package : NULL;
            $requestdata['clsp'] = $customer->sub_package  != "" ? $customer->sub_package : NULL;

            // combo package
            $requestdata['clcp'] = $customer->combo_package  != "" ? $customer->combo_package : NULL;
            $requestdata['clcsp'] = $customer->combo_subpackage  != "" ? $customer->combo_sub_package : NULL;

            // cable package
            $requestdata['clcpa'] = $customer->cable_package !=  "" ? $customer->cable_package : NULL;
            $requestdata['clca'] = $customer->cable_allacart != "" ? $customer->cable_allacart : NULL;
            $requestdata['clcb'] = $customer->cable_base != "" ? $customer->cable_base : NULL;
            $requestdata['clcl'] = $customer->cable_local != "" ? $customer->cable_local : NULL;

            // cable package
            $requestdata['clip'] = $customer->iptv_package != "" ? $customer->iptv_package : NULL;
            $requestdata['clia'] = $customer->iptv_allacart != "" ? $customer->iptv_allacart : NULL;
            $requestdata['clib'] = $customer->iptv_base != "" ? $customer->iptv_base : NULL;
            $requestdata['clil'] = $customer->iptv_local != "" ? $customer->iptv_local : NULL;
            $request["paid_status"] = "paid";
            $request["paid_date"] = Carbon::now();
            $renewalhistory->update($requestdata);

            $customer_data = array();
            $customer_data['expiry_date'] = $renewalhistorydata->new_expiry_date;
            $customer_data['status'] = "Y";
            $customer_data['renew_from_date'] = $fromdate;
            $customer_data['current_status'] = "active";
            $customer_data['package'] = $renewalhistorydata->package;
            $customer_data['sub_package'] = $renewalhistorydata->sub_package;
            // combo package
            $customer_data['combo_package'] = $renewalhistorydata->combo_package;
            $customer_data['combo_subpackage'] = $renewalhistorydata->combo_subpackage;

            $customer_data['cable_allacart'] = $renewalhistorydata->cable_allacart;
            $customer_data['cable_packages'] = $renewalhistorydata->cable_packages;
            $customer_data['cable_base'] = $renewalhistorydata->cable_base;
            $customer_data['cable_local'] = $renewalhistorydata->cable_local;

            $customer_data['iptv_allacart'] = $renewalhistorydata->iptv_allacart;
            $customer_data['iptv_packages'] = $renewalhistorydata->iptv_packages;
            $customer_data['iptv_base'] = $renewalhistorydata->iptv_base;
            $customer_data['iptv_local'] = $renewalhistorydata->iptv_local;

            $customer->update($customer_data);

            if ($renewalhistorydata->generate_invoice == "while-schedule-time") {
                $this->renewUserInvoiceCreate($renewalhistory);
            }

            $renewalhistory->update([
                'customer_renewed' => 1
            ]);
        }
        // $this->renewUserInvoiceCreate($renewalhistory);
      }
    }

    /**
     * Get the total deleted Renew User invoice amount
     */
    function someOfdeleteRenewInvoice($customerId) {
        // sum of deleted invoices
        return floatval(RenewUserInvoices::where('customer_id', $customerId)
        ->where("status", "=", 0)
        ->sum("total_amount"));
    }

    /**
     * Get the total Cancelled Renew User invoice amount
     */
    function someOfCancelledRenewInvoice($customerId) {
        return floatval(RenewUserInvoices::where('customer_id', $customerId)
          ->where("cancelled", "=", 1)
          ->sum("total_amount"));
    }

    /**
     * Get the total unpaid Renew User invoice amount
     */
    function someOfUnpaidRenewInvoice($customerId) {
        return floatval(RenewUserInvoices::where('customer_id', $customerId)
          ->where("cancelled", "=", 0)
          ->where("status", "=", 1)
          ->where("paid", 0)
          ->sum("total_amount"));
    }

    /**
     * Get the total unpaid Renew User invoice amount
     */
    function someOfPaidRenewInvoice($customerId) {
        return  floatval(RenewUserInvoices::where('customer_id', $customerId)
        ->where("paid", "=", 1)
        ->where("cancelled", "=", 0)
        ->where("status", "=", 1)
        ->sum("paid_amount"));
    }

    /**
     * Get the total unpaid Renew User invoice amount
     */
    function getBillNumber() {
        $bill_number = RenewUserInvoices::where("paid", "=", 1)->max('bill_number');

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
        return $bill_number;
    }

    /**
     * Display a listing of the payInvoiceForm invoices.
     * @return 
     */
    public function payInvoiceForm($invoiceId)
    {
        $data = RenewUserInvoices::findorFail($invoiceId);
        return view('customers.invoices.pay-invoice-form',compact('data'));
    }

    /**
     *  Store pay invoices.
     *
     * @return
     */
    public function payInvoiceStore(Request $request, $invoiceId) {
        $invoice = RenewUserInvoices::findOrFail($invoiceId);
        $renewuserHistory = RenewUserHistory::findOrfail($invoice->renew_id);

        $unpaid_invoices_sum = $this->someOfUnpaidRenewInvoice($renewuserHistory->customer_id);

        // sum of paid invoices
        $paid_invoices_sum = $this->someOfPaidRenewInvoice($renewuserHistory->customer_id);

        // sum of deleted invoices
        $deleted_invoices_sum = $this->someOfdeleteRenewInvoice($renewuserHistory->customer_id);
        $cancelled_invoices_sum = $this->someOfCancelledRenewInvoice($renewuserHistory->customer_id);

        // if ($request->post('payment_type') != "cheque_payment") {
        $invoice->paid =  1;
        // Update paid in renewhistory also.
        $renewuserHistory->payment_status = 'paid';
        $invoice->current_balance =  $unpaid_invoices_sum - ($deleted_invoices_sum + $cancelled_invoices_sum + $request->post("paid_amount"));

        $bill_number = $this->getBillNumber();
        $invoice->bill_number = $bill_number;
        // }
        // else {
            // $renewuserHistory->payment_status = 'unpaid';
            $renewuserHistory->payment_type = $request->post('payment_type');
            $renewuserHistory->ref_no = $request->post('reference_number');
        if ($request->post('payment_type') == "cheque_payment") {            
            $renewuserHistory->cheque_date = $request->post('issuing_date');
            $renewuserHistory->cheque_no = $request->post('cheque_no');
            $renewuserHistory->bank_name = $request->post('issuing_bank_name');
        }
        // }

        $invoice->note =  $request->post('note');
        // $invoice->reference_number = $request->post('reference_number');
        // $invoice->payment_date = Carbon::now();
        $renewuserHistory->paid_date = Carbon::now();
        // $invoice->name  = $request->post('name');
        // $invoice->email  = $request->post('email');
        // $invoice->phone  = $request->post('phone');
        $invoice->paid_amount = floatval($request->post('paid_amount'));
        // $invoice->gst_number = $request->post('gst_number');
        $invoice->balance = $request->post('balance');

        $invoice->type = $request->post('type');
        $invoice->save();
        $renewuserHistory->save();

        return redirect()->back()->withSuccess("Thank You. Invoice Payment stored.");
    }

    /**
     * Display payment pickup form 
     * @return form
     */
    public function paymentPickupForm($invoiceId)
    {
        $data = RenewUserInvoices::findorFail($invoiceId);
        return view('customers.invoices.invoice-payment-pickup-form', compact('data'));
    }

    /**
     * store payment pickup
     * @return form
     */
    public function paymentPickupStore(Request $request, $invoiceId)
    {
        $invoice = RenewUserInvoices::findOrFail($invoiceId);

        $renewuserHistory = RenewUserHistory::findOrfail($invoice->renew_id);

        $unpaid_invoices_sum = $this->someOfUnpaidRenewInvoice($renewuserHistory->customer_id);

        // sum of paid invoices
        $paid_invoices_sum = $this->someOfPaidRenewInvoice($renewuserHistory->customer_id);

        // sum of deleted invoices
        $deleted_invoices_sum = $this->someOfdeleteRenewInvoice($renewuserHistory->customer_id);

        $cancelled_invoices_sum = $this->someOfCancelledRenewInvoice($renewuserHistory->customer_id);

        // if ($request->post('payment_type') != "cheque_payment") {
          $invoice->paid =  1;
          $renewuserHistory->payment_status = "paid";
          $renewuserHistory->pay_mode = 'pickup';
          $renewuserHistory->payment_type = $request->post('payment_type');

          $bill_number = $this->getBillNumber();
          $invoice->bill_number = $bill_number;

        $invoice->current_balance =  $unpaid_invoices_sum - ($deleted_invoices_sum + $cancelled_invoices_sum + $request->post("paid_amount"));

        $renewuserHistory->ref_no = $request['reference_number'];
    
        // }
        // else {
        if ($request->post('payment_type') == "cheque_payment") {
            // $renewuserHistory->payment_status = 'unpaid';
            $renewuserHistory->cheque_date = $request['issuing_date'];
            $renewuserHistory->cheque_no = $request['cheque_no'];
            $renewuserHistory->bank_name = $request['issuing_bank_name'];
         }
        $invoice->paid_amount = floatval($request->post('paid_amount'));
        $invoice->payment_pickup_date = $request->post('payment_pickup_date');
        $invoice->balance = $request->post('balance');

        // $renewuserHistory->payment_date = Carbon::now();
        $renewuserHistory->paid_date = Carbon::now();

        $invoice->note = $request->post('note');
        $invoice->save();
        // Update paid in renewhistory also.
        $renewuserHistory->save();

        return redirect()->back()->withSuccess("Thank You. Invoice Payment stored.");
    }

    /**
     * disable the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function invoiceDestroy($id)
    {
        $invoice = RenewUserInvoices::findOrFail($id);
        $invoice->status = 0;
        $invoice->save();
        return redirect()->back()->withSuccess('Invoice deleted successfully');
    }

    /**
     * disable the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function renewHistoryDestroy($renewid) {
        $renewhistory = RenewUserHistory::findOrFail($renewid);
        $invoice = RenewUserInvoices::where('renew_id', $renewhistory->id)->first();
        $invoice->status = 0;
        $renewhistory->status = 0;
        $invoice->save();
        $renewhistory->save();

        return redirect()->back()->withSuccess('Invoice deleted successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function invoiceCancel($id)
    {
        $invoice = RenewUserInvoices::findOrFail($id);
        $invoice->cancelled = 1;
        $invoice->save();

        return redirect()->back()->withSuccess('Invoice cancelled successfully');
    }

    /**
     * print the specified resource from storage.
     * @param int $id
     * @return Response
     */
    function printInvoice($id) {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select([
            'slj_renewuser_invoices.*', 'rh.*',
            'rh.payment_type',
            'slj_renewuser_invoices.paid_amount',
            'rh.paid_date',
            'rh.time',
            'slj_renewuser_invoices.gst_number',
            'rh.installation_address',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        ])
        ->where('slj_renewuser_invoices.id', $id)->first();

        // $franchise_branch = "";
        // $user = "";
        // $customer = "";
        // if (!is_null($data["created_to"]) && $data["created_to"] == 1) {
        //     $franchise_branch = \App\Branches::findOrFail($data['franchise_branch_id']);
        //     $user = \App\User::findOrFail($franchise_branch["user_id"]);
        // }
        // else if (!is_null($data["created_to"]) && $data["created_to"] == 2) {
        //     $franchise_branch = \App\Franchises::findOrFail($data['franchise_branch_id']);
        //     $user = \App\User::findOrFail($franchise_branch["user_id"]);
        // }
        // else if (!is_null($data["created_to"]) && $data["created_to"] == 3) {
        //     if (!is_null($data['created_for'])) {
        //         $customer = \App\Customers::findOrFail($data['created_for']);
        //     }
        // }

        // $html = view('po-invoice-template')->render();
        // return view('customers::invoices.bankaccount_list',['bankaccount'=>$bankaccount, 'data'=>$data]);

		// return PDF::load($html)->download();
        $package = "";
        $subpackage = "";
        $combopackage = "";
        $combosubpackage = "";

        if ( $data->connection_type == 'broadband' ) {
            $package = \App\BroadbandPackages::findorFail($data->package);
            $subpackage = \App\BroadbandSubPackages::findorFail($data->sub_package);
        } else if ( $data->connection_type == 'combo') {
            $combopackage = \App\ComboPackages::findorFail($data->combo_package);
            $combosubpackage = \App\ComboSubPackages::findorFail($data->combo_sub_package);
        }

        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('customers::invoices.renew-user-invoice-template', [
            'data' => $data,
            'combopackage' => $combopackage,
            'combosubpackage' => $combosubpackage,
            'package'=>$package,
            'subpackage'=>$subpackage,
            // 'franchise_branch' => $franchise_branch,
            // 'user' => $user,
            // 'customer' => $customer
        ]);
        return $pdf->stream();
    }

    /**
     * download the specified resource from storage.
     * @param int $id
     * @return Response
     */
    function downloadInvoice($id) {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select(['slj_renewuser_invoices.*', 'rh.*',
            'rh.payment_type',
            'slj_renewuser_invoices.paid_amount',
            'rh.paid_date',
            'rh.time',
            'slj_renewuser_invoices.gst_number',
            'rh.installation_address',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        ])
        ->where('slj_renewuser_invoices.id', $id)->first();

        $package = "";
        $subpackage = "";
        $combopackage = "";
        $combosubpackage = "";

        if ( $data->connection_type == 'broadband' ) {
            $package = \App\BroadbandPackages::findorFail($data->package);
            $subpackage = \App\BroadbandSubPackages::findorFail($data->sub_package);
        } else if ( $data->connection_type == 'combo') {
            $combopackage = \App\ComboPackages::findorFail($data->combo_package);
            $combosubpackage = \App\ComboSubPackages::findorFail($data->combo_sub_package);
        }

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('customers.invoices.renew-user-invoice-template', [
            'data' => $data,
            'combopackage' => $combopackage,
            'combosubpackage' => $combosubpackage,
            'package'=>$package,
            'subpackage'=>$subpackage,
            // 'franchise_branch' => $franchise_branch,
            // 'user' => $user,
            // 'customer' => $customer
        ]);

        return $pdf->download('renew-invoice-'.$data->invoice_number.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    // public function invoiceEdit($id)
    // {
    //     // $paymenttype = Paymenttype::pluck('name','id');
    //     $invoice = RenewUserInvoices::find($id);
    //     // return view('customers::invoices.ioedit', compact('paymenttype','invoice'));
    //     return view('customers::invoices.ioedit', compact('invoice'));
    // }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    // public function invoiceUpdate(Request $request, $id)
    // {
    //     // dd($id);
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         $this->throwValidationException(
    //             $request, $validator
    //         );
    //     }
    //     $input = $request->all();
    //     $input['updated_by'] = Auth::user()->id;
    //     $invoice = RenewUserInvoices::find($id);
    //     $invoice->update($input);
    //     return redirect()->route('io.index')
    //                     ->with('success','Invoice updated successfully');
    // }

    /**
     * Display payment pickup form 
     * @return form
     */
    public function sendMailForm($invoiceId)
    {
        // $data = RenewUserInvoices::findorFail($invoiceId);
        return view('customers.invoices.invoice-send-mail-form', compact('invoiceId'));
    }

    /**
     * Send email the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function invoiceSendEmail(Request $request, $id)
    {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select([
            'slj_renewuser_invoices.*', 'rh.*',
            'rh.payment_type',
            'slj_renewuser_invoices.paid_amount',
            'rh.paid_date',
            'rh.time',
            'slj_renewuser_invoices.gst_number',
            'rh.installation_address',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        ])
        ->where('slj_renewuser_invoices.id', $id)->first();

        if ($request->post("email") == "") {
            return redirect()->back()->withErrors(['Email id is not found in the invoice']);
        }

        $recieverEmail =  $request->post("email");
        if (!$data->invoice_number) {
            return redirect()->back()->withErrors(['Invoice Number Not Found']);
        }
        $invoice_number = $data->invoice_number;
        $attachmentPath = public_path('pdf/invoices/invoice-'.$invoice_number.'.pdf');
        // $franchise_branch = "";
        // $user = "";
        // $customer = "";
        // if (!is_null($data["created_to"]) && $data["created_to"] == 1) {
        //     $franchise_branch = \App\Branches::findOrFail($data['franchise_branch_id']);
        //     $user = \App\User::findOrFail($franchise_branch["user_id"]);
        // }
        // else if (!is_null($data["created_to"]) && $data["created_to"] == 2) {
        //     $franchise_branch = \App\Franchises::findOrFail($data['franchise_branch_id']);
        //     $user = \App\User::findOrFail($franchise_branch["user_id"]);
        // }
        // else if (!is_null($data["created_to"]) && $data["created_to"] == 3) {
        //     if (!is_null($data['created_for'])) {
        //         $customer = \App\Customers::findOrFail($data['created_for']);
        //     }
        // }

        $package = "";
        $subpackage = "";
        $combopackage = "";
        $combosubpackage = "";

        if ( $data->connection_type == 'broadband' ) {
            $package = \App\BroadbandPackages::findorFail($data->package);
            $subpackage = \App\BroadbandSubPackages::findorFail($data->sub_package);
        } else if ( $data->connection_type == 'combo') {
            $combopackage = \App\ComboPackages::findorFail($data->combo_package);
            $combosubpackage = \App\ComboSubPackages::findorFail($data->combo_sub_package);
        }
        
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('customers::invoices.renew-user-invoice-template', [
            'data' => $data,
            'combopackage' => $combopackage,
            'combosubpackage' => $combosubpackage,
            'package'=>$package,
            'subpackage'=>$subpackage,
        ]);
        $pdf->save($attachmentPath);

        try {
            $mail_status = Mail::to($recieverEmail)
            ->send(
            new SljFiberMail(
                $attachmentPath,
                'invoice-'.$invoice_number.'.pdf',
                "Invoice for your SLJ FIBER NETWORKS service",
                "Dear Subscriber,

Thanks for availing SLJ FIBER NETWORKS service. Your Internet invoice no ".$invoice_number." is attached with this mail.
You are requested to make payment Immediately
You can make payment/renew online.
Please ignore if already paid
Thanks again for being with us.

With warm wishes,
SLJ FIBER NETWORKS Pvt.Ltd.

Note:
1. This is a system generated email Please do not reply to this email.
2. If you have any queries, Please revert back with your account number mentioned on the bill.
3. Protect Environment and Save Trees. Please print this e-bill only If it's absolutely necessary.
4. Please visit www.sljfibernetworks.com.",
                'invoice-' . $invoice_number
                )
            );
            unlink($attachmentPath);

            //If error from Mail::send
            if($mail_status != null && $mail_status->failures() > 0) {
                //Fail for which email address...
                foreach(Mail::failures as $address) {
                  return redirect()->back()->withErrors(['Email sending failed for this address', Mail::failures]);
                }
            }
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        return redirect()->back()->withSuccess('Mail has sent');
    }

    /**
     * Display a listing of the cancelled invoices.
     * @return Response
     */
    public function cancelledInvoices(Request $request)
    {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select('slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        )
        ->where("slj_renewuser_invoices.cancelled", 1)
        ->orderby("slj_renewuser_invoices.updated_at", "desc")
        ->paginate(50);

        return view('customers.invoices.incancelled-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Display a listing of the deleted invoices.
     * @return Response
     */
    public function deletedInvoices(Request $request)
    {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select(['slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        ])
        // deleted
        ->where('slj_renewuser_invoices.status', '0')
        ->orderby("slj_renewuser_invoices.updated_at", "desc")
        ->paginate(300);

        return view('customers.invoices.indeleted-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 300);
    }

    /**
     * Display a listing of the cancelled invoices.
     * @return Response
     */
    public function chequeInvoices(Request $request)
    {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select(['slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        ])
        // deleted
        ->where('slj_renewuser_invoices.status', '1')
        // cancelled
        ->where("slj_renewuser_invoices.cancelled", "=", 0 )
        ->where("rh.cheque_status", "=", NULL )
        // ->where("rh.payment_type", "=", 'cheque_payment' )
        ->where("slj_renewuser_invoices.paid", "=", 0 )
        ->orderby("slj_renewuser_invoices.updated_at", "desc")
        ->paginate(50);

        return view('customers.invoices.incheque-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Display cheque update form
     * @return form
     */
    public function chequeUpdateFormInvoices($invoiceId)
    {
        // $data = RenewUserInvoices::findorFail($invoiceId);
        return view('customers.invoices.invoice-cheque-update-form', compact('invoiceId'));
    }

    /**
     * Display cheque Update Store form
     * @return form
     */
    public function chequeUpdateStoreInvoices(Request $request, $invoiceId)
    {
        $invoice = RenewUserInvoices::findorFail($invoiceId);
        $renewuserHistory = RenewUserHistory::findOrfail($invoice->renew_id);

        $chequeUpdate = $request->post('cheque_update');
        $renewuserHistory->cheque_status = $chequeUpdate;
        if ($chequeUpdate == "cheque_cleared") {
            $invoice->paid = 1;
            // Update paid in renewhistory also.
            $renewuserHistory->payment_status = 'paid';

            $unpaid_invoices_sum = $this->someOfUnpaidRenewInvoice($renewuserHistory->customer_id);

            // sum of paid invoices
            $paid_invoices_sum = $this->someOfPaidRenewInvoice($renewuserHistory->customer_id);

            // sum of deleted invoices
            $deleted_invoices_sum = $this->someOfdeleteRenewInvoice($renewuserHistory->customer_id);

            $cancelled_invoices_sum = $this->someOfCancelledRenewInvoice($renewuserHistory->customer_id);
    

            $bill_number = RenewUserInvoices::where("paid", "=", 1)->max('bill_number');

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
            $invoice->bill_number = $bill_number;
            $invoice->current_balance =  $unpaid_invoices_sum  - ($paid_invoices_sum + $deleted_invoices_sum + $cancelled_invoices_sum + $invoice->paid_amount);
        }
        $invoice->save();

        $renewuserHistory->save();

        return redirect()->back()
        ->withSuccess("Thank You. Cheque Status Updated For the Invoice.");
    }

    /**
     * Display a listing of the cancelled invoices.
     * @return Response
     */
    public function chequeBounceInvoices(Request $request)
    {
        $data = RenewUserInvoices::leftJoin('slj_renew_user_history as rh', 'rh.id', '=', 'slj_renewuser_invoices.renew_id')
        ->leftJoin('slj_broadband_packages','rh.package', '=', 'slj_broadband_packages.id')
        ->leftJoin('slj_broadband_subpackages','rh.sub_package', '=', 'slj_broadband_subpackages.id')
        ->leftJoin('slj_combo_packages','rh.combo_package', '=', 'slj_combo_packages.id')
        ->leftJoin('slj_combo_subpackages','rh.combo_sub_package', '=', 'slj_combo_subpackages.id')
        ->leftJoin('users','rh.renew_by', '=', 'users.id')
        ->select(['slj_renewuser_invoices.*', 'rh.*',
            'slj_broadband_packages.package_name as bpackage_name',
            'slj_broadband_subpackages.sub_plan_name as sbpackage_name',
            'slj_combo_packages.package_name as copackage_name',
            'slj_combo_subpackages.sub_plan_name as scopackage_name',
            'users.first_name as renewby_first_name',
            'users.last_name as renewby_last_name'
        ])
        // cancelled
        ->where("rh.cheque_status", "=", "cheque_bounced" )
        // ->where("rh.payment_type", "=", 'cheque_payment' )
        ->where("slj_renewuser_invoices.paid", "=", 0 )
        ->where("slj_renewuser_invoices.cancelled", "=", 0 )
        ->where("slj_renewuser_invoices.status", "=", 1 )
        ->orderby("slj_renewuser_invoices.updated_at", "desc")
        ->paginate(50);

        return view('customers.invoices.incheque-bounce-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * expiryUserScheduledExecute
     */
    function expiryUserScheduledExecute() {
        $expiryCustomers = \App\Customers::where("expiry_date", "<=", Carbon::now())
        ->get();
        foreach ($expiryCustomers as $key => $expiryCustomer) {
          $customer = \App\Customers::findOrFail($expiryCustomer->id);
          $customer->update([
            "current_status" => "expired"
          ]);
        }
    }
  
}
