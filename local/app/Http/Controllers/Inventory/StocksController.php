<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB,Session;

class StocksController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   * @return Response
  */
   public function GetReadingNumbers($fiber_code)
  {
       $uid = \Auth::user()->id;
            $user = \Auth::user();
      $roles = $user->getRoleNames(); 
          
         if($roles[0]=='superadmin')  
         {
    // $start_reading_no=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('drum_number',$fiber_code)->where('status','available')->first();
     $start_reading_no=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('id',$fiber_code)->where('status','available')->first();
         }
     
     else
     {
      //$start_reading_no=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('drum_number',$fiber_code)->where('employee_status','available')->first();
      $start_reading_no=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('id',$fiber_code)->where('employee_status','available')->first();
     }
          
          $html ="<option value=''>--Select  Reading--</option>";
          $html .="<option value='".$start_reading_no->dummy_startreading."'>".$start_reading_no->dummy_startreading."</option>";
           $html .="<option value='".$start_reading_no->dummy_endreading."'>".$start_reading_no->dummy_endreading."</option>";
      
      return $html;
  }
    public function GetReadingNumbers1($fiber_code)
  {
       $uid = \Auth::user()->id;
      $start_reading_no=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('id',$fiber_code)->where('employee_status','available')->first();
        
      
         $html= $start_reading_no->dummy_endreading;
      
      return $html;
      
  }
    public function GetReadingNumbers2($fiber_code)
  {
       $uid = \Auth::user()->id;
      $start_reading_no=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('id',$fiber_code)->where('employee_status','available')->first();
        
      
         $html= $start_reading_no->dummy_startreading;
      
      return $html;
      
  }
   public function GetFiberCore($fiber_code)
  {
       $uid = \Auth::user()->id;
      $drumdata= \App\StockProducts::where('id',$fiber_code)->first();
      $fiber=\App\FiberLayingStock::select('fiber_core')->where('drum_number',$drumdata->drum_number)->first();
      
      $html="<option value=''>--Select Fiber Core--</option>";
      $html .="<option value='".$fiber->fiber_core."'>".$fiber->fiber_core."</option>";
      
      return $html;
  }
  public function GetCore($fiber_code)
  {
      // $uid = \Auth::user()->id;
     $fiber=\App\Products::where('id',$fiber_code)->first();
      
     $html="<option value=''>--Select Fiber Core--</option>";
      $html .="<option value='".$fiber->fiber_core."'>".$fiber->fiber_core."</option>";
      return $k;
  }
  public function corevalue($productId)
  {
      // $uid = \Auth::user()->id;
      $fiber=\App\Products::select('fiber_core')->where('id',$productId)->first();
      
        $html="<option value=''>--Select Fiber Coree--</option>";
      $html .="<option value='".$fiber->fiber_core."'>".$fiber->fiber_core."</option>";
      return $html;
  }
  
    public function GetDrumNumbers($fiber_company_name) // added by durga
    {
           
           $uid = \Auth::user()->id;
            $user = \Auth::user();
      $roles = $user->getRoleNames(); 
          
         if($roles[0]=='superadmin')  
           $drumnos=\App\StockProducts::select('id','drum_number')->where('manufacturer',$fiber_company_name)->where('status','available')->whereNotNull('length')->get();
         else
           $drumnos=\App\StockProducts::select('id','drum_number')->where('current_user_id',$uid)->where('manufacturer',$fiber_company_name)->where('employee_status','available')->get();
           
       
                    
           
            $html = "<option value=''>-- Select Drum Number --</option>";
          
            //	$html .="<option value='".$g->td."'>".$g->td."</option>";
              foreach($drumnos as $b)
            {
      //  $g=\App\StockProducts::select(DB::raw('sum(fiber_laying_fiber_distance) as td'))->where('fiber_code',$b->drum_number)->first();
       $readdata=\App\StockProducts::select('dummy_startreading','dummy_endreading')->where('id',$b->id)->first();
          $fr=$readdata->dummy_startreading;
          $sr=$readdata->dummy_endreading;
          if($fr>$sr)
          $totalr=intval($readdata->dummy_startreading)-intval($readdata->dummy_endreading);
          else
          $totalr=intval($readdata->dummy_endreading)-intval($readdata->dummy_startreading);
          //$h=\App\FiberLayingStock::select('length')->where('drum_number',$b->drum_number)->first();
        //    $totaldistance=$h->length;
        if($totalr>2)
           //   $html .="<option value='".$b->drum_number."'>".$totaldistance."</option>";
		 $html .="<option value='".$b->id."'>".$b->drum_number."</option>";
		
             }
        
        
            
     // return view('technical::fiberlaying.create',['cities'=>$html,
      return $html;
           
    }
    
    public function fiberindex() // added by durga
    {
      //   $categories = \App\ProductCategories::where('status','Y')->where('parent',14)->orderBy("name")->pluck('name', 'id');
  $categories = \App\Products::where('status','Y')->where('category',14)->orderBy("name")->pluck('name', 'id');
  
 
    $subcategories = array();
    $category = '';
    $data = [];
       $sub_category = '';
  
    if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0))
    {

        $sub_category = trim($_GET['sub_category']);
    

      $brand = '';
      if (isset($_GET['brand']) && (trim($_GET['brand']) != "")) 
      {
        $brand = trim($_GET['brand']);
      }
/*
      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      $query = $query->select(
        'slj_products.id',
        'slj_products.name',
        'slj_products.sku','slj_products.unit','slj_products.description',
        DB::raw("count(slj_stock_products.id) as count_total"),
        DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
      );
      */
      
        $query = \App\StockProducts::select(
        'id','product','length','status',
        DB::raw("count(id) as count_total"),
        DB::raw("sum(case when status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when status='inactive' then 1 else 0 end) as count_inactive")
        );
     

      // category
    //  if (!empty($category)){
   //     $query = $query->where("slj_products.category",$category);
    //  }

          // sub_category
       if (!empty($sub_category)){
         
           $query = $query->where("product",$sub_category);
       }

      // sub_category
      if (!empty($brand)){
        $query = $query->where("slj_stock_products.brand",$brand);
      }

      
      $query = $query->groupBy('id', 'product', 'length', 'status');
      $query = $query->orderBy("id");
      $data = $query->paginate(20);

    }
   // print_r( $query);die;
    	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="List of Fiber";
     \App\Employees_Logs::create($employeedata);
      	 
	 
    return view('inventory.stocks.indexfiber',['data'=>$data,'categories'=>$categories,'subcategories'=>$subcategories]);
    }
 
  public function index() {
    $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->orderBy("name")->pluck('name', 'id');

    $subcategories = array();
    $category = '';
    $data = [];

    if (isset($_GET['category']) && (trim($_GET['category']) > 0)) {
      $category = trim($_GET['category']);
      $subcategories = \App\ProductCategories::where('status','Y')
      ->where('parent',$category)->orderBy("name")->pluck('name', 'id');

      $sub_category = '';
      if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)) {
        $sub_category = trim($_GET['sub_category']);
      }

      $brand = '';
      if (isset($_GET['brand']) && (trim($_GET['brand']) != "")) {
        $brand = trim($_GET['brand']);
      }

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      $query = $query->select(
        'slj_products.id',
        'slj_products.name',
        'slj_products.sku','slj_products.unit','slj_products.description',
        DB::raw("count(slj_stock_products.id) as count_total"),
        DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
      );

      // category
      if (!empty($category)){
        $query = $query->where("slj_products.category",$category);
      }

      // sub_category
      if (!empty($sub_category)){
        $query = $query->where("slj_products.sub_category",$sub_category);
      }

      // sub_category
      if (!empty($brand)){
        $query = $query->where("slj_stock_products.brand",$brand);
      }

      $query = $query->orderBy("slj_products.name");
      $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
      $data = $query->paginate(20);
    }
    	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Stock List";
     \App\Employees_Logs::create($employeedata);
      	 
	 
    return view('inventory.stocks.index',['data'=>$data,'categories'=>$categories,'subcategories'=>$subcategories]);
  }

  /**
   * Display a listing of the resource.
   * @return Responsecreatefiber
   */
    public function createfiberproduct()
    {
        $data = [];
        $s="Fiber";
           $subcategories = \App\ProductCategories::where('status','Y')->where('parent',14)->orderBy("name")->pluck('name', 'id');
            $vendors = \App\Vendors::where('status','Y')->orderBy("company_name")->pluck('company_name', 'id');
      
         return view('inventory.fiber.createfiberproduct',[
        'subcategories'=>$subcategories,
        'vendors'=>$vendors,
        
       
      ]);
    }
     public function createfiber() {
         
          $data = [];
           $products = \App\Products::where('status','Y')->where('category',14)->orderBy("name")->pluck('name', 'id');
            $vendors = \App\Vendors::where('status','Y')->orderBy("company_name")->pluck('company_name', 'id');
      
         return view('inventory.fiber.create',[
        'products'=>$products,
        'vendors'=>$vendors,
        
       
      ]);
         
     }
  
     
   
  public function warehouseFiberStocks() {
    $warehouse = '';
    $data = [];
    $subcategories = array();
    $categories = \App\ProductCategories::where('name','Fiber')->where('status','Y')->whereNull('parent')->orderBy("name")->pluck('name', 'id');
    $cities = \App\City::where('status','Y')->pluck('name', 'id');
    $warehouses = [];
$parentnum = 3;
        $subcategories =  \App\ProductCategories::where('status','Y')->where('parent',3)->orderBy("name")->pluck('name', 'id');
   
    if (!empty($_GET)) {
      if (isset($_GET['city']) && (trim($_GET['city']) > 0)) {
        $city = trim($_GET['city']);
        $warehouses = \App\Warehouses::where("city", $city)
        ->orderBy('warehouse_name')
        ->pluck('warehouse_name as name', 'id');
      }

      if (isset($_GET['warehouse']) && (trim($_GET['warehouse']) > 0)) {
        $warehouse = trim($_GET['warehouse']);
      }
        

      $sub_category = '';
      if(isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)){
        $sub_category = trim($_GET['sub_category']);
      }

      $brand = '';
      if (isset($_GET['brand']) && (trim($_GET['brand']) != "")){
        $brand = trim($_GET['brand']);
      }

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      $query = $query->select(
        'slj_products.id',
        'slj_products.name',
        'slj_products.sku',
        'slj_products.unit',
        'slj_products.description',
        DB::raw("count(slj_stock_products.id) as count_total"),
        DB::raw("sum(case when slj_stock_products.warehouse_status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when slj_stock_products.warehouse_status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
      );

      // $query = $query->where("slj_stock_products.current_user_type","warehouse");
      $query = $query->where("slj_stock_products.warehouse_status", '!=', NULL);

      // warehouse
      if ($warehouse != "") {
        // $query = $query->where("slj_stock_products.current_user_id", $warehouse);
        $query = $query->where(function ($query) use ($warehouse) {
          $query->where('slj_stock_products.current_user_id', $warehouse)
            ->orWhere('slj_stock_products.transferred_from', $warehouse);
        });
      }

      
      

      //sub_category
      //if ($sub_category != "")
        $query = $query->where("slj_products.sub_category",$sub_category);
     // }

      // brand
      if ($brand != ""){
        $query = $query->where("slj_stock_products.brand",$brand);
      }

      $query = $query->orderBy("slj_products.name");
      $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
      $data = $query->paginate(20);
    }

    return view('inventory.stocks.fiberwarehouse-stocks', [
      'data'=>$data,
      'cities'=>$cities,
      'warehouses'=>$warehouses,
      'categories'=>$categories,
      'subcategories'=>$subcategories,
    ]);
  }
  public function warehouseStocks() {
    $warehouse = '';
    $data = [];
    $subcategories = array();
    $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->orderBy("name")->pluck('name', 'id');
    $cities = \App\City::where('status','Y')->pluck('name', 'id');
    $warehouses = [];

    if (!empty($_GET)) {
      if (isset($_GET['city']) && (trim($_GET['city']) > 0)) {
        $city = trim($_GET['city']);
        $warehouses = \App\Warehouses::where("city", $city)
        ->orderBy('warehouse_name')
        ->pluck('warehouse_name as name', 'id');
      }

      if (isset($_GET['warehouse']) && (trim($_GET['warehouse']) > 0)) {
        $warehouse = trim($_GET['warehouse']);
      }
      $category = '';
      if(isset($_GET['category']) && (trim($_GET['category']) > 0)){
        $category = trim($_GET['category']);
        $subcategories = \App\ProductCategories::where('status','Y')->where('parent',$category)->orderBy("name")->pluck('name', 'id');
      }

      $sub_category = '';
      if(isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)){
        $sub_category = trim($_GET['sub_category']);
      }

      $brand = '';
      if (isset($_GET['brand']) && (trim($_GET['brand']) != "")){
        $brand = trim($_GET['brand']);
      }

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      $query = $query->select(
        'slj_products.id',
        'slj_products.name',
        'slj_products.sku',
        'slj_products.unit',
        'slj_products.description',
        DB::raw("count(slj_stock_products.id) as count_total"),
        DB::raw("sum(case when slj_stock_products.warehouse_status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when slj_stock_products.warehouse_status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
      );

      // $query = $query->where("slj_stock_products.current_user_type","warehouse");
      $query = $query->where("slj_stock_products.warehouse_status", '!=', NULL);

      // warehouse
      if ($warehouse != "") {
        // $query = $query->where("slj_stock_products.current_user_id", $warehouse);
        $query = $query->where(function ($query) use ($warehouse) {
          $query->where('slj_stock_products.current_user_id', $warehouse)
            ->orWhere('slj_stock_products.transferred_from', $warehouse);
        });
      }

      // category
      if ($category != "") {
        $query = $query->where("slj_products.category",$category);
      }

      //sub_category
      if ($sub_category != "") {
        $query = $query->where("slj_products.sub_category",$sub_category);
      }

      // brand
      if ($brand != ""){
        $query = $query->where("slj_stock_products.brand",$brand);
      }

      $query = $query->orderBy("slj_products.name");
      $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
      $data = $query->paginate(20);
    }

    return view('inventory.stocks.warehouse-stocks', [
      'data'=>$data,
      'cities'=>$cities,
      'warehouses'=>$warehouses,
      'categories'=>$categories,
      'subcategories'=>$subcategories,
    ]);
  }


  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function distributorStocks() {

    $categories = \App\ProductCategories::where('status','Y')
      ->whereNull('parent')
      ->orderBy("name")
      ->pluck('name', 'id');

    $cities = \App\City::where('status','Y')->pluck('name', 'id');

    $subcategories = array();
    $data = [];

    $distributor = '';
    $category = '';
    $sub_category = '';

    if (isset($_GET['category']) && (trim($_GET['category']) > 0)){
      $category = trim($_GET['category']);
      $subcategories = \App\ProductCategories::where('status','Y')->where('parent',$category)->orderBy("name")->pluck('name', 'id');
    }

    if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)){
      $sub_category = trim($_GET['sub_category']);
    }

    $brand = '';
    if (isset($_GET['brand']) && (trim($_GET['brand']) != "")){
      $brand = trim($_GET['brand']);
    }

    if (isset($_GET['distributor']) && (trim($_GET['distributor']) > 0)) {
      $distributor = trim($_GET['distributor']);
    }

    $distributors = [];
    if (isset($_GET['city']) && $_GET['city'] != "") {
      $city = $_GET['city'];
      $distributors = \App\Distributors::leftjoin('users','users.id', '=', 'slj_distributors.user_id')
      ->where('users.status','Y')
      ->where('slj_distributors.city', $city)
      ->orderBy('slj_distributors.distributor_name')
      ->pluck('slj_distributors.distributor_name as name', 'users.id');
    }

    if (!empty($_GET)) {
      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      $query = $query->select('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit',
        'slj_products.description',
        DB::raw("count(slj_stock_products.id) as count_total"),
        DB::raw("sum(case when slj_stock_products.distributor_status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when slj_stock_products.distributor_status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
      );

      // $query = $query->where("slj_stock_products.current_user_type","distributor");
      $query = $query->where("slj_stock_products.distributor_status", "!=", NULL);

      // distributor
      if ($distributor != "") {
        $query = $query->where(function ($query) use ($distributor) {
          $query->where('slj_stock_products.current_user_id', '=', $distributor)
            ->orWhere('slj_stock_products.transferred_from', '=', $distributor);
        });
      }

      // category
      if($category != "") {
        $query = $query->where("slj_products.category",$category);
      }

      // sub_category
      if ($sub_category != "") {
        $query = $query->where("slj_products.sub_category",$sub_category);
      }

      // brand
      if ($brand != "") {
        $query = $query->where("slj_stock_products.brand",$brand);
      }

      $query = $query->orderBy("slj_products.name");
      $query = $query->groupBy(
        'slj_products.id',
        'slj_products.name',
        'slj_products.sku',
        'slj_products.unit',
        'slj_products.description'
      );
      $data = $query->paginate(20);
    }

    return view('inventory.stocks.distributor-stocks',[
        'data'=>$data,
        'distributors'=>$distributors, 
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'cities' => $cities
    ]);
  }
  
   public function distributorfiberStocks() {

    $categories = \App\ProductCategories::where('status','Y')
      ->where('name','Fiber')
      ->orderBy("name")
      ->pluck('name', 'id');

    $cities = \App\City::where('status','Y')->pluck('name', 'id');

    $subcategories = array();
    $data = [];

    $distributor = '';
    $category = '';
    $sub_category = '';
       $subcategories =  \App\ProductCategories::where('status','Y')->where('parent',3)->orderBy("name")->pluck('name', 'id');
   
    
    if (isset($_GET['category']) && (trim($_GET['category']) > 0)){
      $category = trim($_GET['category']);
    }

    if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)){
      $sub_category = trim($_GET['sub_category']);
    }

    $brand = '';
    if (isset($_GET['brand']) && (trim($_GET['brand']) != "")){
      $brand = trim($_GET['brand']);
    }

    if (isset($_GET['distributor']) && (trim($_GET['distributor']) > 0)) {
      $distributor = trim($_GET['distributor']);
    }

    $distributors = [];
    if (isset($_GET['city']) && $_GET['city'] != "") {
      $city = $_GET['city'];
      $distributors = \App\Distributors::leftjoin('users','users.id', '=', 'slj_distributors.user_id')
      ->where('users.status','Y')
      ->where('slj_distributors.city', $city)
      ->orderBy('slj_distributors.distributor_name')
      ->pluck('slj_distributors.distributor_name as name', 'users.id');
    }

    if (!empty($_GET)) {
      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      $query = $query->select('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit',
        'slj_products.description',
        DB::raw("count(slj_stock_products.id) as count_total"),
        DB::raw("sum(case when slj_stock_products.distributor_status='available' then 1 else 0 end) as count_available"),
        DB::raw("sum(case when slj_stock_products.distributor_status='transferred' then 1 else 0 end) as count_transferred"),
        DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
        DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
        DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
        DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
      );

      // $query = $query->where("slj_stock_products.current_user_type","distributor");
      $query = $query->where("slj_stock_products.distributor_status", "!=", NULL);

      // distributor
      if ($distributor != "") {
        $query = $query->where(function ($query) use ($distributor) {
          $query->where('slj_stock_products.current_user_id', '=', $distributor)
            ->orWhere('slj_stock_products.transferred_from', '=', $distributor);
        });
      }

      // category
      if($category != "") {
        $query = $query->where("slj_products.category",$category);
      }

      // sub_category
      if ($sub_category != "") {
        $query = $query->where("slj_products.sub_category",$sub_category);
      }

      // brand
      if ($brand != "") {
        $query = $query->where("slj_stock_products.brand",$brand);
      }

      $query = $query->orderBy("slj_products.name");
      $query = $query->groupBy(
        'slj_products.id',
        'slj_products.name',
        'slj_products.sku',
        'slj_products.unit',
        'slj_products.description'
      );
      $data = $query->paginate(20);
    }

    return view('inventory.stocks.fiberdistributor-stocks',[
        'data'=>$data,
        'distributors'=>$distributors, 
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'cities' => $cities
    ]);
  }


    /**
     * Display a listing of the resource.
     * @return Response
     */
     public function branchfiberStocks()
     {
           $cities = \App\City::where('status','Y')->pluck('name', 'id');

      $categories = \App\ProductCategories::where('status','Y')
        ->whereNull('parent')
        ->orderBy("name")->pluck('name', 'id');

      $subcategories = array();
      $data = [];

      $branch = '';
      if (isset($_GET['branch']) && (trim($_GET['branch']) > 0)){
        $branch = trim($_GET['branch']);
      }

      $category = '';
        if (isset($_GET['category']) && (trim($_GET['category']) > 0)){
          $category = trim($_GET['category']);
        }

       $subcategories =  \App\ProductCategories::where('status','Y')->where('parent',3)->orderBy("name")->pluck('name', 'id');
   

        $sub_category = '';
        if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)) {
          $sub_category = trim($_GET['sub_category']);
        }

        $brand = '';
        if (isset($_GET['brand']) && (trim($_GET['brand']) != "")) {
          $brand = trim($_GET['brand']);
        }

      if (!empty($_GET)) {
        $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
        $query = $query->select(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.branch_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.branch_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );

        $query = $query->where("slj_stock_products.branch_status", "!=", NULL);

        // branch
        if ($branch != "") {
          $query = $query->where(function ($query) use ($branch) {
            $query->where('slj_stock_products.current_user_id', '=', $branch)
              ->orWhere('slj_stock_products.transferred_from', '=', $branch);
          });
        }

        //category
        if ($category != "") {
          $query = $query->where("slj_products.category", $category);
        }

        // sub_category
        if ($sub_category != "") {
          $query = $query->where("slj_products.sub_category", $sub_category);
        }

        // brand
        if ($brand != "") {
          $query = $query->where("slj_stock_products.brand", $brand);
        }

        $query = $query->orderBy("slj_products.name");
        $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
        $data = $query->paginate(20);
      }

      $distributors = [];
      if (isset($_GET['city']) && $_GET['city'] != "") {
        $city = $_GET['city'];
        $distributors = \App\Distributors::where('city', $city)
          ->orderBy('slj_distributors.distributor_name')
          ->pluck('slj_distributors.distributor_name as name', 'slj_distributors.id');
      }

      $branches = [];
      if (isset($_GET['distributor']) && (trim($_GET['distributor']) > 0)) {
        $distributor = $_GET['distributor'];
        $branches = \App\Branches::leftjoin('users','users.id', '=', 'slj_branches.user_id')
          ->where('users.status','Y')
          ->where('slj_branches.distributor_id', $distributor)
          ->orderBy('slj_branches.branch_name')
          ->pluck('slj_branches.branch_name as name', 'users.id');
      }

      return view('inventory.stocks.fiberbranch-stocks',[
        'data'=>$data,
        'distributors'=>$distributors,
        'branches'=>$branches, 
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'cities'=>$cities
      ]);
     }
    public function branchStocks() {
      $cities = \App\City::where('status','Y')->pluck('name', 'id');

      $categories = \App\ProductCategories::where('status','Y')
        ->whereNull('parent')
        ->orderBy("name")->pluck('name', 'id');

      $subcategories = array();
      $data = [];

      $branch = '';
      if (isset($_GET['branch']) && (trim($_GET['branch']) > 0)){
        $branch = trim($_GET['branch']);
      }

      $category = '';
        if (isset($_GET['category']) && (trim($_GET['category']) > 0)){
          $category = trim($_GET['category']);
        }

        $subcategories = \App\ProductCategories::where('status','Y')
        ->where('parent',$category)->orderBy("name")->pluck('name', 'id');

        $sub_category = '';
        if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)) {
          $sub_category = trim($_GET['sub_category']);
        }

        $brand = '';
        if (isset($_GET['brand']) && (trim($_GET['brand']) != "")) {
          $brand = trim($_GET['brand']);
        }

      if (!empty($_GET)) {
        $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
        $query = $query->select(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.branch_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.branch_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );

        $query = $query->where("slj_stock_products.branch_status", "!=", NULL);

        // branch
        if ($branch != "") {
          $query = $query->where(function ($query) use ($branch) {
            $query->where('slj_stock_products.current_user_id', '=', $branch)
              ->orWhere('slj_stock_products.transferred_from', '=', $branch);
          });
        }

        //category
        if ($category != "") {
          $query = $query->where("slj_products.category", $category);
        }

        // sub_category
        if ($sub_category != "") {
          $query = $query->where("slj_products.sub_category", $sub_category);
        }

        // brand
        if ($brand != "") {
          $query = $query->where("slj_stock_products.brand", $brand);
        }

        $query = $query->orderBy("slj_products.name");
        $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
        $data = $query->paginate(20);
      }

      $distributors = [];
      if (isset($_GET['city']) && $_GET['city'] != "") {
        $city = $_GET['city'];
        $distributors = \App\Distributors::where('city', $city)
          ->orderBy('slj_distributors.distributor_name')
          ->pluck('slj_distributors.distributor_name as name', 'slj_distributors.id');
      }

      $branches = [];
      if (isset($_GET['distributor']) && (trim($_GET['distributor']) > 0)) {
        $distributor = $_GET['distributor'];
        $branches = \App\Branches::leftjoin('users','users.id', '=', 'slj_branches.user_id')
          ->where('users.status','Y')
          ->where('slj_branches.distributor_id', $distributor)
          ->orderBy('slj_branches.branch_name')
          ->pluck('slj_branches.branch_name as name', 'users.id');
      }

      return view('inventory.stocks.branch-stocks',[
        'data'=>$data,
        'distributors'=>$distributors,
        'branches'=>$branches, 
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'cities'=>$cities
      ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
        public function fiberfranchiseStocks() 
        {	
        $categories = \App\ProductCategories::where('status','Y')
      ->whereNull('parent')->orderBy("name")->pluck('name', 'id');

      $cities = \App\City::where('status','Y')->pluck('name', 'id');

      $subcategories = array();
       $subcategories =  \App\ProductCategories::where('status','Y')->where('parent',3)->orderBy("name")->pluck('name', 'id');
   

      $data = [];
      $franchise = '';
      if (isset($_GET['franchise']) && (trim($_GET['franchise']) > 0)) {
        $franchise = trim($_GET['franchise']);
      }

      $category = '';
     
      $sub_category = '';
      if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)) {
        $sub_category = trim($_GET['sub_category']);
      }

      $brand = '';
      if (isset($_GET['brand']) && (trim($_GET['brand']) != "")) {
        $brand = trim($_GET['brand']);
      }

      if (!empty($_GET)) {
        $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
        $query = $query->select(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.franchise_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.franchise_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );

        // $query = $query->where("slj_stock_products.current_user_type", "franchise");
        $query = $query->where("slj_stock_products.franchise_status", "!=", NULL);

        // franchise
        if ($franchise != "") {
          $query = $query->where(function ($query) use ($franchise) {
            $query->where('slj_stock_products.current_user_id', '=', $franchise)
              ->orWhere('slj_stock_products.transferred_from', '=', $franchise);
          });
        }

        // category
        if($category != "") {
          $query = $query->where("slj_products.category", $category);
        }
 
        // sub_category
        if ($sub_category != "") {
          $query = $query->where("slj_products.sub_category", $sub_category);
        }

        // brand
        if ($brand != "") {
          $query = $query->where("slj_stock_products.brand", $brand);
        }

        $query = $query->orderBy("slj_products.name");
        $query = $query->groupBy(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description'
        );
        $data = $query->paginate(20);
      }

      $distributors = [];
      if (isset($_GET['city']) && $_GET['city'] != "") {
        $city = $_GET['city'];
        $distributors = \App\Distributors::where('city', $city)
          ->orderBy('slj_distributors.distributor_name')
          ->pluck('slj_distributors.distributor_name as name', 'slj_distributors.id');
      }

      $branches = [];
      if (isset($_GET['distributor']) && (trim($_GET['distributor']) > 0)){
        $distributor = $_GET['distributor'];
        $branches = \App\Branches::where('distributor_id', $distributor)
          ->orderBy('slj_branches.branch_name')
          ->pluck('slj_branches.branch_name as name', 'slj_branches.id');
      }

      $franchises = [];
      if (isset($_GET['branch']) && (trim($_GET['branch']) > 0)) {
        $branch = $_GET['branch'];
        $franchises = \App\Franchises::leftjoin('users','users.id', '=', 'slj_franchises.user_id')
        ->where('users.status','Y')
        ->where('slj_franchises.branch', $branch)
        ->orderBy('slj_franchises.franchise_name')
        ->pluck('slj_franchises.franchise_name as name', 'users.id');        
        // $franchises = \App\Franchises::where('branch', $branch)
        //   ->orderBy('slj_franchises.franchise_name')
        //   ->pluck('slj_franchises.franchise_name as name', 'slj_franchises.id');
      }

      return view('inventory.stocks.fiberfranchise-wise',[
        'data'=>$data,
        'franchises'=>$franchises,
        'distributors'=> $distributors,
        'branches'=> $branches,
        'franchises'=> $franchises,        
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'cities'=>$cities,
      ]);
    }

       
     
    public function franchiseStocks()
    {	

      $categories = \App\ProductCategories::where('status','Y')
      ->whereNull('parent')->orderBy("name")->pluck('name', 'id');

      $cities = \App\City::where('status','Y')->pluck('name', 'id');

      $subcategories = array();
      $data = [];
      $franchise = '';
      if (isset($_GET['franchise']) && (trim($_GET['franchise']) > 0)) {
        $franchise = trim($_GET['franchise']);
      }

      $category = '';
      if (isset($_GET['category']) && (trim($_GET['category']) > 0)) {
        $category = trim($_GET['category']);
        $subcategories = \App\ProductCategories::where('status','Y')
          ->where('parent',$category)->orderBy("name")
          ->pluck('name', 'id');
      }

      $sub_category = '';
      if (isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)) {
        $sub_category = trim($_GET['sub_category']);
      }

      $brand = '';
      if (isset($_GET['brand']) && (trim($_GET['brand']) != "")) {
        $brand = trim($_GET['brand']);
      }

      if (!empty($_GET)) {
        $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
        $query = $query->select(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.franchise_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.franchise_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );

        // $query = $query->where("slj_stock_products.current_user_type", "franchise");
        $query = $query->where("slj_stock_products.franchise_status", "!=", NULL);

        // franchise
        if ($franchise != "") {
          $query = $query->where(function ($query) use ($franchise) {
            $query->where('slj_stock_products.current_user_id', '=', $franchise)
              ->orWhere('slj_stock_products.transferred_from', '=', $franchise);
          });
        }

        // category
        if($category != "") {
          $query = $query->where("slj_products.category", $category);
        }
 
        // sub_category
        if ($sub_category != "") {
          $query = $query->where("slj_products.sub_category", $sub_category);
        }

        // brand
        if ($brand != "") {
          $query = $query->where("slj_stock_products.brand", $brand);
        }

        $query = $query->orderBy("slj_products.name");
        $query = $query->groupBy(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description'
        );
        $data = $query->paginate(20);
      }

      $distributors = [];
      if (isset($_GET['city']) && $_GET['city'] != "") {
        $city = $_GET['city'];
        $distributors = \App\Distributors::where('city', $city)
          ->orderBy('slj_distributors.distributor_name')
          ->pluck('slj_distributors.distributor_name as name', 'slj_distributors.id');
      }

      $branches = [];
      if (isset($_GET['distributor']) && (trim($_GET['distributor']) > 0)){
        $distributor = $_GET['distributor'];
        $branches = \App\Branches::where('distributor_id', $distributor)
          ->orderBy('slj_branches.branch_name')
          ->pluck('slj_branches.branch_name as name', 'slj_branches.id');
      }

      $franchises = [];
      if (isset($_GET['branch']) && (trim($_GET['branch']) > 0)) {
        $branch = $_GET['branch'];
        $franchises = \App\Franchises::leftjoin('users','users.id', '=', 'slj_franchises.user_id')
        ->where('users.status','Y')
        ->where('slj_franchises.branch', $branch)
        ->orderBy('slj_franchises.franchise_name')
        ->pluck('slj_franchises.franchise_name as name', 'users.id');        
        // $franchises = \App\Franchises::where('branch', $branch)
        //   ->orderBy('slj_franchises.franchise_name')
        //   ->pluck('slj_franchises.franchise_name as name', 'slj_franchises.id');
      }

      return view('inventory.stocks.franchise-stocks',[
        'data'=>$data,
        'franchises'=>$franchises,
        'distributors'=> $distributors,
        'branches'=> $branches,
        'franchises'=> $franchises,        
        'categories'=>$categories,
        'subcategories'=>$subcategories,
        'cities'=>$cities,
      ]);
    }
  public function employeeFiberStocks() {
      	$cities = \App\City::where('status','Y')->pluck('name', 'id');

      //$warehouses = \App\Warehouses::orderBy('warehouse_name')->pluck('warehouse_name as name', 'id');
      $employees = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
        ->where('users.status','Y')
        ->orderBy('name')
        ->pluck('name', 'users.id');

      $categories = \App\ProductCategories::where('status','Y')
        ->whereNull('parent')->orderBy("name")->pluck('name', 'id');

      $subcategories = array();
       $subcategories =  \App\ProductCategories::where('status','Y')->where('parent',3)->orderBy("name")->pluck('name', 'id');
   

      $data = [];
      $employee = '';

    
      
      if (isset($_GET['employee']) && (trim($_GET['employee']) > 0)) {
        $employee = trim($_GET['employee']);
      }
       
        $brand = '';
        if (isset($_GET['brand']) && (trim($_GET['brand']) != "")){
          $brand = trim($_GET['brand']);
        }

      if (!empty($_GET)) {
        $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
        $query = $query->select(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.employee_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.employee_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );

//        $query = $query->where("slj_stock_products.current_user_type","employee");
        $query = $query->where("slj_stock_products.employee_status", "!=", NULL);

   if (isset($_GET['$sub_category']) && (trim($_GET['$sub_category']) != "")){
      $query = $query->where("slj_products.sub_category",$sub_category);
        }
        // Employee
      if ( $employee != "") {
        // $query = $query->where("slj_stock_products.current_user_id",$employee);
        $query = $query->where(function ($query) use ($employee) {
          $query->where('slj_stock_products.current_user_id', '=', $employee)
            ->orWhere('slj_stock_products.transferred_from', '=', $employee)
            ->orWhereNotNull('drum_number');
        });
      }

        // Category // Sub category
       
 
     

       
       $brand = '';
        // Brand
        if ($brand != "") {
          $query = $query->where("slj_stock_products.brand",$brand);
        }
        $query = $query->where('category',3);
        $query = $query->orderBy("slj_products.name");
        $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
        $data = $query->paginate(20);
      }

      return view('inventory.stocks.fiber-employee-stocks',[
        'data' => $data,
        'employees' => $employees,
        'categories' => $categories,
        'subcategories' => $subcategories,
        'cities' => $cities,
      ]);
  }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function employeeStocks() {
  		$cities = \App\City::where('status','Y')->pluck('name', 'id');

      //$warehouses = \App\Warehouses::orderBy('warehouse_name')->pluck('warehouse_name as name', 'id');
      $employees = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
        ->where('users.status','Y')
        ->orderBy('name')
        ->pluck('name', 'users.id');

      $categories = \App\ProductCategories::where('status','Y')
        ->whereNull('parent')->orderBy("name")->pluck('name', 'id');

      $subcategories = array();
      $data = [];
      $employee = '';

      $category = '';
      if (isset($_GET['category']) && (trim($_GET['category']) > 0)) {
        $category = trim($_GET['category']);
        $subcategories = \App\ProductCategories::where('status','Y')->where('parent',$category)->orderBy("name")->pluck('name', 'id');
      }
      
      if (isset($_GET['employee']) && (trim($_GET['employee']) > 0)) {
        $employee = trim($_GET['employee']);
      }
        $sub_category = '';
        if(isset($_GET['sub_category']) && (trim($_GET['sub_category']) > 0)){
          $sub_category = trim($_GET['sub_category']);
        }

        $brand = '';
        if (isset($_GET['brand']) && (trim($_GET['brand']) != "")){
          $brand = trim($_GET['brand']);
        }

      if (!empty($_GET)) {
        $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
        $query = $query->select(
          'slj_products.id',
          'slj_products.name',
          'slj_products.sku',
          'slj_products.unit',
          'slj_products.description',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.employee_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.employee_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );

//        $query = $query->where("slj_stock_products.current_user_type","employee");
        $query = $query->where("slj_stock_products.employee_status", "!=", NULL);

        // Employee
      if ( $employee != "") {
        // $query = $query->where("slj_stock_products.current_user_id",$employee);
        $query = $query->where(function ($query) use ($employee) {
          $query->where('slj_stock_products.current_user_id', '=', $employee)
            ->orWhere('slj_stock_products.transferred_from', '=', $employee);
        });
      }

        // Category
        if ($category != ""){
          $query = $query->where("slj_products.category",$category);
        }

        // Sub category
        if ($sub_category != "") {
          $query = $query->where("slj_products.sub_category",$sub_category);
        }

        // Brand
        if ($brand != "") {
          $query = $query->where("slj_stock_products.brand",$brand);
        }

        $query = $query->orderBy("slj_products.name");
        $query = $query->groupBy('slj_products.id','slj_products.name','slj_products.sku','slj_products.unit','slj_products.description');
        $data = $query->paginate(20);
      }
	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Employee Stock";
     \App\Employees_Logs::create($employeedata);
      	 
	 
      return view('inventory.stocks.employee-stocks',[
        'data' => $data,
        'employees' => $employees,
        'categories' => $categories,
        'subcategories' => $subcategories,
        'cities' => $cities,
      ]);
    }

  	/**
     * Show the form for creating a new resource.
     * @return Response
     */
       public function createstockfiber() { // added by durga
      $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->pluck('name', 'id');
      $products = \App\Products::where('status','Y')->where('category',3)->orderBy("name")->pluck('name', 'id');
      $vendors = \App\Vendors::where('status','Y')->get();

      $vendors_suppliers = array();
      foreach($vendors as $vendor){
          $vendor_type = $vendor->type;
          $vendors_suppliers[$vendor_type][] = array('id'=>$vendor->id,'name'=>$vendor->company_name,'type'=>$vendor->type);
      }

      //echo "<pre>"; print_r($vendors_suppliers); exit;
  		return view('inventory::stocks.createfiber',['products'=>$products,'categories'=>$categories,'vendors_suppliers'=>$vendors_suppliers]);
    }
    public function create() {
      $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->pluck('name', 'id');
      $products = \App\Products::where('status','Y')->pluck('name', 'id');
      $vendors = \App\Vendors::where('status','Y')->get();

      $vendors_suppliers = array();
      foreach($vendors as $vendor){
          $vendor_type = $vendor->type;
          $vendors_suppliers[$vendor_type][] = array('id'=>$vendor->id,'name'=>$vendor->company_name,'type'=>$vendor->type);
      }

      //echo "<pre>"; print_r($vendors_suppliers); exit;
  		return view('inventory.stocks.create',['products'=>$products,'categories'=>$categories,'vendors_suppliers'=>$vendors_suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
         public function storefiber(Request $request) {
         
         
          	$input = request()->all();
         $fr= $input['start_reading'];
          $er=$input['end_reading'];
          
          $k=\App\FiberLayingStock::select('start_reading')->where('drum_number',$input['drum_number'])->first();
          if(!empty($k->start_reading))
          {
          if($fr==$k->start_reading)
          {
              
          
          	 if(!$request->validate([
            //'drum_number' => 'required|unique:slj_stock_products',
         'drum_number' => 'required|unique:slj_stock_products',
         
        ])) {
            return redirect()->back()->wihtInput()->with('error');
        }
          }
        
          }     
        	

        
        \App\FiberLayingStock::create($input);
        	  $employeedata=array();
	  $id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Fiber Laying Stock";
      $employeedata['value_of_action']=$input['product_name'];
    
     \App\Employees_Logs::create($employeedata);
      	 
	 
        
        $datainput=array();
         $datainput['product']=$input['product_name'];
         $datainput['vendor']=$input['vendors_suppliers'];
         $datainput['type']="new";
         $datainput['notes']="";
         
          $datainput['manufacturer']=$input['manufacture_name'];
           $datainput['brand']=$input['manufacture_name'];
            $datainput['buying_price']=$input['length']*$input['length'];
            $datainput['selling_price']=$input['selling_price'];
             $datainput['status']="available";
              $datainput['manufact_year']=$input['manufact_year'];
                $drum_no=preg_replace('/\s+/', '', $input['drum_number']);
                $datainput['drum_number']=$drum_no;
          
         //$datainput['drum_number']=$input['drum_number'];
          $datainput['price_per_meter']=$input['price_per_meter'];
            
           $datainput['length']=$input['length'];
          $datainput['start_reading']=$input['start_reading'];
           $datainput['end_reading']=$input['end_reading'];
            $datainput['dummy_startreading']=$input['start_reading'];
           $datainput['dummy_endreading']=$input['end_reading'];
             \App\StockProducts::create($datainput);
        return redirect('admin/inventory/stocks/fiber')->with('success', 'Fiber Stock added successfully.');
        
        
         
     }
    public function store(Request $request) {
        //
		//$validatedData = $request->validate([
			//'name' => 'required|unique:slj_product_categories'
		//]);

	  	$input = request()->all();
        //$input['status'] = "Y";

      $file = $request->file('import_file');
      if ($file == "") {
        return redirect()->back()->withErrors(['Product upload csv file is required.']);
      }
      $fileName = "csv-".time().".".$file->getClientOriginalExtension();
      $destinationPath = 'uploads/csv/';
      $file->move($destinationPath,$fileName);
      $file_name = $destinationPath.$fileName;
      
      $fileD = fopen($file_name,"r");
      $column = fgetcsv($fileD);
      while(!feof($fileD)){
        $rowData = fgetcsv($fileD);
        if (!empty($rowData)) {
          $data = array();
          $data['product'] = $input['product'];
          $data['vendor'] = $input['vendor'];
          $data['type'] = $input['type'];
          $data['notes'] = $input['description'];
          $data['status'] = "available";
          $pid=$input['product'];
           $productcateid = \App\Products::where('status','Y')->where('id',$pid)->first();
           $subcatename = \App\ProductCategories::where('status','Y')->where('id',$productcateid->category)->first();
           $subsubcatename = \App\ProductCategories::where('status','Y')->where('id',$productcateid->sub_category)->first();
           
          $data['serial_no'] = $rowData[0];
          $data['identification'] = $rowData[1];
          $data['manufacturer'] = $rowData[2];
          $data['brand'] = $rowData[3];
         
         // $data['warranty_date'] = $rowData[4];
          $data['warranty_date'] =date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $rowData[4])));
        
          $data['buy_price'] = $rowData[5];
          $data['selling_price'] = $rowData[6];
          $data['barcode'] = $rowData[7];
          $data['catname']=$subcatename->name;
          $data['subcatname']=$subsubcatename->name;

          $vendors = \App\StockProducts::where('serial_no',$rowData[0])->count();
          if ($vendors <= 0) {
            $stockproduct = \App\StockProducts::create($data);
            \App\StockProductHistory::create(array('stock_id'=>$stockproduct->id,'description'=>'item added'));
          }
        }
      }

      return redirect('admin/inventory/stocks')->with('success', 'Stock Products uploaded successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('inventory.stocks.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $details = \App\Products::find($id);
        $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->pluck('name', 'id');
        $subcategories = \App\ProductCategories::where('status','Y')->where('parent',$details->category)->orderBy('name')->pluck('name', 'id');
        
		return view('inventory.stocks.edit',['details'=>$details,'categories'=>$categories,'subcategories'=>$subcategories]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //$validatedData = $request->validate([
			//'name' => 'required|unique:slj_product_categories,name,'.$id
		//]);
		
		$requestdata = $request->all(); 
		$data = array();
        $data['name'] = $requestdata['name'];
        $data['category'] = $requestdata['category'];
        $data['sub_category'] = $requestdata['sub_category'];
        $data['sku'] = $requestdata['sku'];
        $data['unit'] = $requestdata['unit'];
        $data['description'] = $requestdata['description'];
        $data['status'] = $requestdata['status'];
        $product = \App\Products::find($id);

        //echo "<pre>"; print_r($data); exit;
        
		//Update details
		$product->update($data);
		$employeedata=array();
	
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Update Product";
     $employeedata['value_of_action']=$requestdata['name'];
     
      \App\Employees_Logs::create($employeedata);
	
		
		return redirect('admin/inventory/stocks')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //$designations = \App\Designations::where('department',$id)->count();
        //$employees = \App\Employees::where('department',$id)->count();
        
        //if($id > 0 && $designations == 0 && $employees == 0){
            //\App\Departments::destroy($id);
            // return redirect('admin/departments')->with('success', 'Department deleted successfully.');
        //}else{
            return redirect('admin/inventory/stocks')->with('error', 'Stock cannot be deleted because of dependency');
        //}
    }


    public function viewHistory($id)
    {
        $data = \App\StockProductHistory::join('slj_stock_products','slj_stock_product_history.stock_id', '=', 'slj_stock_products.id')->where('stock_id',$id)->orderBy('slj_stock_products.created_at','desc')->paginate(20);
        return view('inventory.stocks.history',['data'=>$data]);
    }

    public function stockuploadhistory()
    {
        $data = \App\StockProductHistory::join('slj_stock_products','slj_stock_product_history.stock_id', '=', 'slj_stock_products.id')->orderBy('slj_stock_products.created_at','desc')->paginate(20);
        return view('inventory.stocks.history',['data'=>$data]);
    }

    public function download()
    {
     
        //PDF file is stored under public/uploads/stock_upload_sheet.csv
     //   $file= public_path(). "/public/uploads/stock_upload_sheet.csv";
        $file= public_path()."/uploads/stock_upload_sheet.csv";
       // print_r($file);die;
        $headers = array('Content-Type: text/csv');

        return response()->download($file); 
        //response::download($file, 'stock_upload_sheet.csv', $headers);
    }



    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function transfer()
    {
        //$items = session('items');
        //$items = array_unique($items);
        //print_r($items); exit;
        //print_r($items);

        $added_items = array();

        $items = session('items');
        if(is_array($items) && count($items)>0){
            $added_items = \App\StockProducts::join('slj_products','slj_stock_products.product', '=', 'slj_products.id')
            ->select('slj_products.id','slj_products.name','slj_stock_products.*')
            ->whereIn('slj_stock_products.id',$items)
            ->orderBy("slj_stock_products.created_at",'desc')
            ->paginate(20);
        }

        //$users = \App\User::role('warehouse')->orderBy('name')->pluck('name', 'id');
        $users = \App\Warehouses::orderBy('warehouse_name')->pluck('warehouse_name as name', 'id');
        //$products = \App\Products::where('status','Y')->pluck('name', 'id');
        
        return view('inventory.stocks.transfer',['added_items'=>$added_items,'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function submittransfer(Request $request) {
  		$validatedData = $request->validate([
	  		'keyword' => 'required'
      ]);

      $input = request()->all();
      $type = $input['type'];
      $keyword = $input['keyword'];
      $results = array();
      if (!empty($type) && !empty($keyword)) {
        $results = \App\StockProducts::join('slj_products','slj_stock_products.product', '=', 'slj_products.id')
          ->select('slj_products.id','slj_products.name','slj_stock_products.*')
          ->where('slj_stock_products.'.$type,$keyword)
          ->orderBy("slj_stock_products.created_at",'desc')
          ->paginate(10);
      }   

      $items = session('items');
      if (!is_array($items)) {
        $items = array();
      }

      if (isset($_POST['addnsearch'])) {
        foreach ($results as $result) {
          if (!in_array($result->id,$items) && $result->status == 'available') {
              $items[] = $result->id;
          }
        }
        session(['items' => $items]);
        return redirect('admin/inventory/stocks/transfer')->with('success', 'Stock Products added successfully.');
      }
      else {
        $users = \App\User::role('warehouse')->orderBy('name')->pluck('name', 'id');

        $added_items = array();
        if (is_array($items) && count($items)>0) {
          $added_items = \App\StockProducts::join('slj_products','slj_stock_products.product', '=', 'slj_products.id')
            ->select('slj_products.id','slj_products.name','slj_stock_products.*')
            ->whereIn('slj_stock_products.id',$items)
            ->orderBy("slj_stock_products.created_at",'desc')
            ->paginate(5);
        }
        $employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Stock Transfer";
     
      \App\Employees_Logs::create($employeedata);
	
        return view('inventory.stocks.transfer',['results'=>$results,'added_items'=>$added_items,'users'=>$users]);
      }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     *
     */
    public function transferWarehouse($stakeholder, $prod_id) {
      $input = request()->all();
      $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
      ->leftjoin('slj_products','slj_products.id', '=', 'slj_stock_products.product')
      ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
      ->where('slj_stock_products.product',$prod_id);
      if ($stakeholder == "manage-wise") {
        $data = $data->where('slj_stock_products.status','available');
      }
      else {
        $usertype = explode('-', $stakeholder);
        $data = $data->where('slj_stock_products.status','transffered')
          ->where('slj_stock_products.current_user_type', $usertype['0']);
      }

      if (isset($input['category']) && $input['category'] != "") {
        $data = $data->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $data = $data->where("slj_products.sub_category", $input['sub_category']);
      }

      $data = $data->orderBy("slj_stock_products.id",'desc')
        ->paginate(20);

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');

      if ($stakeholder == "manage-wise") {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }
      else {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }
      $query = $query->where("slj_products.id",$prod_id);
      if ($stakeholder != "manage-wise") {
        $usertype = explode('-', $stakeholder);
        $query = $query
        ->where('slj_stock_products.'.$usertype['0'].'_status', '!=', NULL);
      }

      // if (isset($input['warehouse']) && $input['warehouse'] != "") {
      //   $warehouse = $input['warehouse'];
      //   $query = $query->where(function ($query) use ($warehouse) {
      //     $query->where('slj_stock_products.current_user_id', '=', $warehouse)
      //       ->orWhere('slj_stock_products.transferred_from', '=', $warehouse);
      //   });
      // }

      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }
      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $query = $query->groupBy('slj_products.id');
      $product_status = $query->first();

      $query = \App\Products::where("slj_products.id",$prod_id);

      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $query->first();
      $product_information = $query->first();

      $cities = \App\City::where('status','Y')->pluck('name', 'id');

      return view('inventory.stocks.transfer-warehouse',[
        'prod_id'=>$prod_id,
        'data'=>$data,
        'product_information'=>$product_information,
        'product_status'=>$product_status,
        'cities'=>$cities,
        'stakeholder'=>$stakeholder
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function submitTransferWarehouse(Request $request) {
      $validatedData = $request->validate([
        'warehouse' => 'required'
      ]);
      $ids = [];
      $input = request()->all();

      if (empty($input['checkproduct'])) {
        return redirect()->back()->withErrors(['Please select a products to transfer.']);
      }

      $warehouse = $input['warehouse'];
      $description = $input['description'];
      $prod_id = $input['prod_id'];
      $stock_ids = $input['checkproduct'];
      $stakeholder = $input['stakeholder'];

      $user = \Auth::user();
      $roles = $user->getRoleNames(); 
      $rolename = $roles[0];

      foreach ($stock_ids as $stock_id) {
        $data = array();
        $data['current_user_type'] = "warehouse";
        $data['current_user_id'] = $warehouse;
        $data['status'] = "transferred";

        $data['warehouse_status'] = "available";
        $stock_product = \App\StockProducts::find($stock_id);
        $data[$stock_product->current_user_type.'_status'] = "transferred";
        $data['transferred_from'] = $stock_product->current_user_id;
        $data['transferred_user_type'] = $stock_product->current_user_type;

        // Update Stock Product details.
        $stock_product->update($data);
        array_push($ids, $stock_id);
      }

      $data = array();
      $data['stock_ids'] = implode(",",$stock_ids);
      $data['from_user_type'] = $rolename;
      $data['from_user_id'] = $user->id;
      $data['to_user_type'] = "warehouse";
      $data['to_user_id'] = $warehouse;
      $data['description'] = $description;

      \App\StockHistory::create($data);
      return redirect('admin/inventory/stocks/transfer-to-warehouse/'.$stakeholder.'/'.$prod_id)->with('success', 'Stock Products transferred to warehouse successfully. ' . '(' . implode(',', $ids) . ')');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function transferDistributor($stakeholder, $prod_id) {
      $input = request()->all();
      $usertype = explode('-', $stakeholder);

      $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
      ->leftjoin('slj_products','slj_products.id', '=', 'slj_stock_products.product')
      ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
      ->where('slj_stock_products.product',$prod_id);
      if ($stakeholder == "manage-wise") {
        $data = $data->where('slj_stock_products.status', 'available');
      }
      else {
        $data = $data->where('slj_stock_products.'.$usertype['0'].'_status', 'available')
          ->where('slj_stock_products.current_user_type', $usertype['0']);
      }

      if (isset($input['warehouse']) && $input['warehouse'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['warehouse']);
      }

      if (isset($input['category']) && $input['category'] != "") {
        $data = $data->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $data = $data->where("slj_products.sub_category", $input['sub_category']);
      }

      $data = $data->orderBy("slj_stock_products.id",'desc')
      ->paginate(20);

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');

      if ($stakeholder == "manage-wise") {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive"
        ));        
      }
      else {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive"
        ));
      }

      $query = $query->where("slj_products.id", $prod_id);
      if ($stakeholder != "manage-wise") {
        $usertype = explode('-', $stakeholder);
        $query = $query
        ->where('slj_stock_products.'.$usertype['0'].'_status', '!=', NULL);
      }

      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        // $query = $query->where("slj_stock_products.current_user_id", $input['warehouse']);
        $warehouse = $input['warehouse'];
        $query = $query->where(function ($query) use ($warehouse) {
          $query->where('slj_stock_products.current_user_id', '=', $warehouse)
            ->orWhere('slj_stock_products.transferred_from', '=', $warehouse);
        });
      }

      $query = $query->groupBy('slj_products.id');

      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $product_status = $query->first();

      $query = \App\Products::where("slj_products.id",$prod_id);
      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $query = $query->first();
      $product_information = $query->first();

      $cities = \App\City::where('status','Y')->pluck('name', 'id');
      return view('inventory.stocks.transfer-distributor',[
        'prod_id'=>$prod_id,
        'data'=>$data,
        'product_information'=>$product_information,
        'product_status'=>$product_status,
        'cities'=>$cities,
        'stakeholder'=>$stakeholder
      ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function submitTransferDistributor(Request $request) {
      $validatedData = $request->validate([
        'distributor' => 'required'
      ]);
  		$ids = [];
      $input = request()->all();
      if (empty($input['checkproduct'])) {
        return redirect()->back()->withErrors(['Please select a products to transfer.']);
      }

      $distributor = $input['distributor'];
      $description = $input['description'];
      $prod_id = $input['prod_id'];
      $stock_ids = $input['checkproduct'];
      $stakeholder = $input['stakeholder'];
      $user = \Auth::user();
      $roles = $user->getRoleNames(); 
      $rolename = $roles[0];

      foreach($stock_ids as $stock_id){
        $data = array();
        $data['current_user_type'] = "distributor";
        $data['current_user_id'] = $distributor;
        $data['status'] = "transferred";
        $data['distributor_status'] = "available";
        $stock_product = \App\StockProducts::find($stock_id);
        $data[$stock_product->current_user_type.'_status'] = "transferred";        
        $data['transferred_from'] = $stock_product->current_user_id;
        $data['transferred_user_type'] = $stock_product->current_user_type;

        //Update Stock Product details
        $stock_product->update($data);
        array_push($ids, $stock_id);
      }

      $data = array();
      $data['stock_ids'] = implode(",",$stock_ids);
      $data['from_user_type'] = $rolename;
      $data['from_user_id'] = $user->id;
      $data['to_user_type'] = "distributor";
      $data['to_user_id'] = $distributor;
      $data['description'] = $description;

      \App\StockHistory::create($data);
      return redirect('admin/inventory/stocks/transfer-to-distributor/'.$stakeholder.'/'.$prod_id)->with('success', 'Stock Products transferred to distributor successfully.' . '(' . implode(',', $ids) . ')');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function transferBranch($stakeholder, $prod_id) {
      $input = request()->all();
      $usertype = explode('-', $stakeholder);

      $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
        ->leftjoin('slj_products','slj_products.id', '=', 'slj_stock_products.product')
        ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
        ->where('slj_stock_products.product', $prod_id);

      if ($stakeholder == "manage-wise") {
        $data = $data->where('slj_stock_products.status','available');
      }
      else {
        $data = $data->where('slj_stock_products.'.$usertype['0'].'_status', 'available')
          ->where('slj_stock_products.current_user_type', $usertype['0']);
      }

      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['warehouse']);
      }
      
      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['distributor']);
      }

      if (isset($input['category']) && $input['category'] != "") {
        $data = $data->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $data = $data->where("slj_products.sub_category", $input['sub_category']);
      }

      $data = $data->orderBy("slj_stock_products.id",'desc')
        ->paginate(20);

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');

      if ($stakeholder == "manage-wise") {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }
      else {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }

      $query = $query->where("slj_products.id",$prod_id);
      if ($stakeholder != "manage-wise") {
        $usertype = explode('-', $stakeholder);
        $query = $query
        ->where('slj_stock_products.'.$usertype['0'].'_status', '!=', NULL);
      }

      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $warehouse = $input['warehouse'];
        $query = $query->where(function ($query) use ($warehouse) {
          $query->where('slj_stock_products.current_user_id', '=', $warehouse)
            ->orWhere('slj_stock_products.transferred_from', '=', $warehouse);
        });
        // $query = $query->where("slj_stock_products.current_user_id", $input['warehouse']);
      }

      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $distributor = $input['distributor'];
        $query = $query->where(function ($query) use ($distributor) {
          $query->where('slj_stock_products.current_user_id', '=', $distributor)
            ->orWhere('slj_stock_products.transferred_from', '=', $distributor);
        });
        // $query = $query->where("slj_stock_products.current_user_id", $input['distributor']);
      }

      $query = $query->groupBy('slj_products.id');

      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $product_status = $query->first();

      $query = \App\Products::where("slj_products.id",$prod_id);

      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $query = $query->first();
      $product_information = $query->first();

  		$cities = \App\City::where('status','Y')->pluck('name', 'id');

      return view('inventory.stocks.transfer-branch', [
        'prod_id'=>$prod_id,
        'data'=>$data,
        'product_information'=>$product_information,
        'product_status'=>$product_status,
        'cities'=>$cities,
        'stakeholder'=>$stakeholder
      ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function submitTransferBranch(Request $request) {
      $validatedData = $request->validate([
        'branch' => 'required'
      ]);
      $ids = [];
      $input = request()->all();
      if (empty($input['checkproduct'])) {
        return redirect()->back()->withErrors(['Please select a products to transfer.']);
      }        

      $branch = $input['branch'];
      $description = $input['description'];
      $prod_id = $input['prod_id'];
      $stock_ids = $input['checkproduct'];
      $stakeholder = $input['stakeholder'];

      $user = \Auth::user();
      $roles = $user->getRoleNames(); 
      $rolename = $roles[0];

      foreach ($stock_ids as $stock_id) {
        $data = array();
        $data['current_user_type'] = "branch";
        $data['current_user_id'] = $branch;
        $data['status'] = "transferred";
        $data['branch_status'] = "available";

        $stock_product = \App\StockProducts::find($stock_id);
        $data[$stock_product->current_user_type.'_status'] = "transferred";        
        $data['transferred_from'] = $stock_product->current_user_id;
        $data['transferred_user_type'] = $stock_product->current_user_type;

        //Update Stock Product details
        $stock_product->update($data);
        array_push($ids, $stock_id);
      }

      $data = array();
      $data['stock_ids'] = implode(",",$stock_ids);
      $data['from_user_type'] = $rolename;
      $data['from_user_id'] = $user->id;
      $data['to_user_type'] = "branch";
      $data['to_user_id'] = $branch;
      $data['description'] = $description;

      \App\StockHistory::create($data);

      return redirect('admin/inventory/stocks/transfer-to-branch/'.$stakeholder.'/'.$prod_id)->with('success', 'Stock Products transferred to branch successfully.' . '(' . implode(',', $ids) . ')');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function transferFranchise($stakeholder, $prod_id) {
		
      $input = request()->all();
      $usertype = explode('-', $stakeholder);
		
		
      $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
        ->leftjoin('slj_products','slj_products.id', '=', 'slj_stock_products.product')
        ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
        ->where('slj_stock_products.product', $prod_id);
		
		
		
	//	print_r($data);die;

      if ($stakeholder == "manage-wise") {
        $data = $data->where('slj_stock_products.status','available');
      }
      else {
        $data = $data->where('slj_stock_products.current_user_type', $usertype['0']);
      }

      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['warehouse']);
      }

      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['distributor']);
      }

      if ($usertype['0'] == 'branch' && isset($input['branch']) && $input['branch'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['branch']);
      }

      if ($usertype['0'] == 'franchise' && isset($input['franchise']) && $input['franchise'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['franchise']);
      }

      if (isset($input['category']) && $input['category'] != "") {
        $data = $data->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $data = $data->where("slj_products.sub_category", $input['sub_category']);
      }

      $data = $data->orderBy("slj_stock_products.id",'desc')->paginate(20);

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      if ($stakeholder == "manage-wise") {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }
      else {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }

      $query = $query->where("slj_products.id",$prod_id);
      if ($stakeholder != "manage-wise") {
        $usertype = explode('-', $stakeholder);
        $query = $query
        ->where('slj_stock_products.'.$usertype['0'].'_status', '!=', NULL);
      }

      if ( $usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $warehouse = $input['warehouse'];
        $query = $query->where(function ($query) use ($warehouse) {
          $query->where('slj_stock_products.current_user_id', '=', $warehouse)
            ->orWhere('slj_stock_products.transferred_from', '=', $warehouse);
        });
      }

      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $distributor = $input['distributor'];
        $query = $query->where(function ($query) use ($distributor) {
          $query->where('slj_stock_products.current_user_id', '=', $distributor)
            ->orWhere('slj_stock_products.transferred_from', '=', $distributor);
        });
      }

      if ($usertype['0'] == 'branch' && isset($input['branch']) && $input['branch'] != "") {
        $branch = $input['branch'];
        $query = $query->where(function ($query) use ($branch) {
          $query->where('slj_stock_products.current_user_id', '=', $branch)
            ->orWhere('slj_stock_products.transferred_from', '=', $branch);
        });
      }

      if ($usertype['0'] == 'franchise' && isset($input['franchise']) && $input['franchise'] != "") {
        $franchise = $input['franchise'];
        $query = $query->where(function ($query) use ($franchise) {
          $query->where('slj_stock_products.current_user_id', '=', $franchise)
            ->orWhere('slj_stock_products.transferred_from', '=', $franchise);
        });
      }

      $query = $query->groupBy('slj_products.id');
      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $product_status = $query->first();

      $query = \App\Products::where("slj_products.id",$prod_id);
      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.sub_category", $input['sub_category']);
      }

      $query = $query->first();
      $product_information = $query->first();

      $cities = \App\City::where('status','Y')->pluck('name', 'id');
      return view('inventory.stocks.transfer-franchise',['prod_id'=>$prod_id,'data'=>$data,'product_information'=>$product_information,'product_status'=>$product_status, 'cities'=>$cities, 'stakeholder'=>$stakeholder]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function submitTransferFranchise(Request $request) {

      $validatedData = $request->validate([
        'franchise' => 'required'
      ]);

      $ids = [];
      $input = request()->all();
      if (empty($input['checkproduct'])) {
        return redirect()->back()->withErrors(['Please select a products to transfer.']);
      }        
      
      $franchise = $input['franchise'];
      $description = $input['description'];
      $prod_id = $input['prod_id'];
      $stock_ids = $input['checkproduct'];
      $stakeholder = $input['stakeholder'];

      $user = \Auth::user();
      $roles = $user->getRoleNames(); 
      $rolename = $roles[0];

      foreach ($stock_ids as $stock_id) {
        $data = array();
        $data['current_user_type'] = "franchise";
        $data['current_user_id'] = $franchise;
        $data['status'] = "transferred";

        $data['franchise_status'] = "available";
        $stock_product = \App\StockProducts::find($stock_id);
        $data[$stock_product->current_user_type.'_status'] = "transferred";        
        $data['transferred_from'] = $stock_product->current_user_id;
        $data['transferred_user_type'] = $stock_product->current_user_type;

        //Update Stock Product details
        $stock_product->update($data);
        array_push($ids, $stock_id);
      }  

      $data = array();
      $data['stock_ids'] = implode(",",$stock_ids);
      $data['from_user_type'] = $rolename;
      $data['from_user_id'] = $user->id;
      $data['to_user_type'] = "franchise";
      $data['to_user_id'] = $franchise;
      $data['description'] = $description;

      \App\StockHistory::create($data);
      return redirect('admin/inventory/stocks/transfer-to-franchise/'.$stakeholder.'/'.$prod_id)->with('success', 'Stock Products transferred to franchise successfully.' . '(' . implode(',', $ids) . ')');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function transferEmployee($stakeholder, $prod_id) {
		
      $input = request()->all();
      $usertype = explode('-', $stakeholder);

      $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
        ->leftjoin('slj_products','slj_products.id', '=', 'slj_stock_products.product')
        ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
        ->where('slj_stock_products.product',$prod_id); 
		
		
				
    /*   if ($stakeholder == "manage-wise") {
        $data = $data->where('slj_stock_products.status','available');
      }
      else {
        $data = $data->where('slj_stock_products.'.$usertype['0'].'_status', 'available')
          ->where('slj_stock_products.current_user_type', $usertype['0']);
      }
 
      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['warehouse']);
      }

      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['distributor']);
      }

      if ($usertype['0'] == 'branch' && isset($input['branch']) && $input['branch'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['branch']);
      }

      if ($usertype['0'] == 'franchise' && isset($input['franchise']) && $input['franchise'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['franchise']);
      }

      if (isset($input['category']) && $input['category'] != "") {
        $data = $data->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $data = $data->where("slj_products.id", $input['sub_category']);
      }
    
	   $data = $data->orderBy("slj_stock_products.id",'desc')->paginate(20); */
	   
	    if ($stakeholder == "manage-wise") {
        $data = $data->where('slj_stock_products.status','available');
      }
      else {
        $data = $data->where('slj_stock_products.current_user_type', $usertype['0']);
      }

      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['warehouse']);
      }

      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['distributor']);
      }

      if ($usertype['0'] == 'branch' && isset($input['branch']) && $input['branch'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['branch']);
      }

      if ($usertype['0'] == 'franchise' && isset($input['franchise']) && $input['franchise'] != "") {
        $data = $data->where("slj_stock_products.current_user_id", $input['franchise']);
      }

      if (isset($input['category']) && $input['category'] != "") {
        $data = $data->where("slj_products.category", $input['category']);
      }

      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $data = $data->where("slj_products.sub_category", $input['sub_category']);
      }

      $data = $data->orderBy("slj_stock_products.id",'desc')->paginate(20);

      $query = \App\Products::leftjoin('slj_stock_products','slj_stock_products.product', '=', 'slj_products.id');
      if ($stakeholder == "manage-wise") {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }
      else {
        $query = $query->select(
          'slj_products.id',
          DB::raw("count(slj_stock_products.id) as count_total"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='available' then 1 else 0 end) as count_available"),
          DB::raw("sum(case when slj_stock_products.".$usertype['0']."_status='transferred' then 1 else 0 end) as count_transferred"),
          DB::raw("sum(case when slj_stock_products.status='installed' then 1 else 0 end) as count_installed"),
          DB::raw("sum(case when slj_stock_products.status='theft' then 1 else 0 end) as count_theft"),
          DB::raw("sum(case when slj_stock_products.status='damaged' then 1 else 0 end) as count_damaged"),
          DB::raw("sum(case when slj_stock_products.status='inactive' then 1 else 0 end) as count_inactive")
        );
      }
      $query = $query->where("slj_products.id",$prod_id);
      if ($stakeholder != "manage-wise") {
        $usertype = explode('-', $stakeholder);
        $query = $query
        ->where('slj_stock_products.'.$usertype['0'].'_status', '!=', NULL);
      }

      if ($usertype['0'] == 'warehouse' && isset($input['warehouse']) && $input['warehouse'] != "") {
        $query = $query->where("slj_stock_products.current_user_id", $input['warehouse']);
      }

      if ($usertype['0'] == 'distributor' && isset($input['distributor']) && $input['distributor'] != "") {
        $query = $query->where("slj_stock_products.current_user_id", $input['distributor']);
      }

      if ($usertype['0'] == 'branch' && isset($input['branch']) && $input['branch'] != "") {
        $query = $query->where("slj_stock_products.current_user_id", $input['branch']);
      }

      if ($usertype['0'] == 'franchise' && isset($input['franchise']) && $input['franchise'] != "") {
        $query = $query->where("slj_stock_products.current_user_id", $input['franchise']);
      }

      $query = $query->groupBy('slj_products.id');
      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }
      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.id", $prod_id);
      }
      $product_status = $query->first();

      $query = \App\Products::where('id',$prod_id);
      
      /*
      if (isset($input['category']) && $input['category'] != "") {
        $query = $query->where("slj_products.category", $input['category']);
      }
      if (isset($input['sub_category']) && $input['sub_category'] != "") {
        $query = $query->where("slj_products.id", $input['sub_category']);
      }
      */
  

      $query = $query->first();
      $product_information = $query->first();

      $cities = \App\City::where('status','Y')->pluck('name', 'id');
      return view('inventory.stocks.transfer-employee',[
        'prod_id'=>$prod_id,
        'data'=>$data,
        'product_information'=>$product_information,
        'product_status'=>$product_status,
        'cities'=>$cities,
        'stakeholder'=>$stakeholder
      ]);
	  
	   
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function submitTransferEmployee(Request $request) {
      $validatedData = $request->validate([
        'employee' => 'required'
      ]);
      $ids = [];
      $input = request()->all();

      if (empty($input['checkproduct'])) {
        return redirect()->back()->withErrors(['Please select a products to transfer.']);
      }

      $employee = $input['employee'];
      $description = $input['description'];
      $prod_id = $input['prod_id'];
      $stock_ids = $input['checkproduct'];
      $stakeholder = $input['stakeholder'];

      $user = \Auth::user();
      $roles = $user->getRoleNames(); 
      $rolename = $roles[0];

      foreach($stock_ids as $stock_id) {
        $data = array();
        $data['current_user_type'] = "employee";
        $data['current_user_id'] = $employee;
        $data['status'] = "transferred";

        $data['employee_status'] = "available";
        $stock_product = \App\StockProducts::find($stock_id);
        $data[$stock_product->current_user_type.'_status'] = "transferred";
        $data['transferred_from'] = $stock_product->current_user_id;
        $data['transferred_user_type'] = $stock_product->current_user_type;
        $data['assign_status']=1;

        // Update Stock Product details.
        $stock_product->update($data);
        array_push($ids, $stock_id);
      }

      $data = array();
      $data['stock_ids'] = implode(",",$stock_ids);
      $data['from_user_type'] = $rolename;
      $data['from_user_id'] = $user->id;
      $data['to_user_type'] = "employee";
      $data['to_user_id'] = $employee;
      $data['description'] = $description;
      

      \App\StockHistory::create($data);
      return redirect('admin/inventory/stocks/transfer-to-employee/'.$stakeholder.'/'.$prod_id)
      ->with('success', 'Stock Products transferred to employee successfully.' . '(' . implode(',', $ids) . ')');
    }

    public function transferstock($id)
    {
        //$stockproduct = \App\StockProducts::where('id',$id)->first();
        //exit;
        $items = session('items');
        if(!is_array($items)){
            $items = array();
        }
        //print_r($items); exit;
        //if(in_array($id,$items)){
            $items[] = $id;
            session(['items' => $items]);
        //}

        return redirect('admin/inventory/stocks/transfer');
    } 

    public function addmultipletransferstocksubmit(Request $request)
    {
        //$stockproduct = \App\StockProducts::where('id',$id)->first();
        //print_r($_POST); exit;
        $items = session('items');
        if(is_array($items)){
            $items = array_unique($items);
        }else{
            $items = array();
        }
        //print_r($items);  exit;
        //print_r($request->stock_item);  exit;
        $added_items = $request->stock_item;
        //print_r($added_items);  exit;

        if(count($items) == 0){
            session(['items' => $request->stock_item]);
        }else{
            if(isset($added_items) && count($added_items) > 0){
                //$added = array();
                foreach($added_items as $item_id){
                    //if(in_array($item_id,$items)){
                        $items[] = $item_id;
                    //}
                }
                //print_r($items); exit;
                session(['items' => $items]);
            }    
        }

        //if(in_array($id,$items)){
            //$items[] = $id;
            //session(['items' => $items]);
        //}

        return redirect('admin/inventory/stocks/transfer');
    } 

    public function removetransferstock($id)
    {
        $stockproduct = \App\StockProducts::where('id',$id)->first();

        $items = session('items');
        if(!is_array($items)){
            $items = array();
        }
        if(is_array($items) && count($items)){
            $items = array_unique($items);

            //if(in_array($id,$items)){
                if (($key = array_search($id, $items)) !== false) {
                    unset($items[$key]);
                    session(['items' => $items]);
                    //print_r($items); exit;
                    //session('items',$items);
                }
           // }
        }
        //print_r($items); exit;

        //$items = session('items');
        //$items = array_unique($items);
        //print_r($items); exit;
        //session('items',array());
        //$items = session('items');
        //print_r($items); exit;
        //Session::set('items', $items);
        return redirect('admin/inventory/stocks/transfer');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function transferstocksubmit(Request $request)
    {
        //
		//$validatedData = $request->validate([
			//'name' => 'required|unique:slj_product_categories'
        //]);
        $input = request()->all();
        //echo "<pre>"; print_r($_POST); exit;
        $stock_items = $input['stock_item'];

        foreach($stock_items as $stock_item){
            $data = array();
            $data['current_user_type'] = $input['usertype'];
            $data['current_user_id'] = $input['user'];
            $data['status'] = "transferred";
            $data[$input['usertype'].'_status'] = "available";

            $stock_product = \App\StockProducts::find($stock_item);
            // $data['transferred'] = $stock_product->usertype."_transferred";
            $data['transferred_user_type'] = $stock_product->current_user_type;
            $data['transferred_from'] = $stock_product->current_user_id;

            //Update Stock Product details
            $stock_product->update($data);
        } 

        Session::forget('items');
		
        return redirect('admin/inventory/stocks/transfer')->with('success', 'Stock Products transferred successfully.');
    }

    /**
     * Get warehouse of a particualr city
     *
     */
    function getWarehouseByCity($city) {
      $warehouses = \App\Warehouses::where("city", $city)->orderBy('warehouse_name')->pluck('warehouse_name as name', 'id');
      $html = "<option value=''>-- select warehouse --</option>";
      if (!empty($warehouses)) {
        foreach($warehouses as $key => $warehouse){
          $html.="<option value='".$key."'>".$warehouse."</option>";
        }
      }
      return $html;
    }

    function getEmployeesByCity($city) {
        $html = "<option value=''>-- select employees --</option>";
        if ($city != "") {
            $employees = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
            ->where('users.status','Y')
            ->where("slj_employees.city", $city)
            ->orderBy('name')
            ->pluck('name', 'users.id');

            if (!empty($employees)) {
              foreach($employees as $key => $employee) {
                $html.="<option value='".$key."'>".$employee."</option>";
              }
            }
        }
        return $html;
    }

    /**
     * get distributor user by city
     */
    function getDistributorUserByCity($city) {
        $distributors = \App\Distributors::leftjoin('users','users.id', '=', 'slj_distributors.user_id')
        ->where('users.status','Y')
        ->where('city', $city)
        ->orderBy('slj_distributors.distributor_name')
        ->pluck('slj_distributors.distributor_name as name', 'users.id');

        $html = "<option value=''>-- select distributor --</option>";
        if (!empty($distributors)) {
          foreach($distributors as $key => $distributor){
            $html.="<option value='".$key."'>".$distributor."</option>";
          }
        }

        return $html;
    }

    /**
     * get branch user by city
     */
    function getBranchUserByCity($city, $distributor) {
        $branches = \App\Branches::leftjoin('users','users.id', '=', 'slj_branches.user_id')
        ->where('users.status','Y')
        ->where('city', $city)
        ->where('distributor_id', $distributor)
        ->orderBy('slj_branches.branch_name')
        ->pluck('slj_branches.branch_name as name', 'users.id');

        $html = "<option value=''>-- select branch --</option>";
        if (!empty($branches)) {
          foreach($branches as $key => $branch){
            $html.="<option value='".$key."'>".$branch."</option>";
          }
        }

        return $html;
    }    

    /**
     * get franchises user by city
     */
    function getFranchiseUser($city, $distributor, $branch) {
        $franchises = \App\Franchises::leftjoin('users','users.id', '=', 'slj_franchises.user_id')
        ->where('users.status','Y')
        ->where('city', $city)
        ->where('distributor_id', $distributor)
        ->where('branch', $branch)
        ->orderBy('slj_franchises.franchise_name')
        ->pluck('slj_franchises.franchise_name as name', 'users.id');

        $html = "<option value=''>-- select frachise --</option>";
        if (!empty($franchises)) {
          foreach($franchises as $key => $franchise){
            $html.="<option value='".$key."'>".$franchise."</option>";
          }
        }

        return $html;
    }

    /**
     * autoCompleteInventory
     */
    public function autoCompleteInventory(Request $request)
    {
        $query = $request->get('term');
        $type = $request->get('type');
        $stakeholder = $request->get('stakeholder');
        $prod_id = $request->get('prod_id');

        $newproductsarray[] = array();
        if($type == 'serial_no')
        {
            $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
            ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
            ->where('slj_stock_products.product',$prod_id)
            ->where('serial_no', 'LIKE', $query . '%');
            if ($stakeholder == "manage-wise") {
                $data = $data->where('slj_stock_products.status','available');
            }
            else {
                $data = $data->where('slj_stock_products.status','transferred');
            }
            $data = $data->orderBy("slj_stock_products.id",'desc')->get();
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $newproductsarray[] = array(
                        'id' => $value->id,
                        'value' => $value->serial_no,
                        'created_at' => date("d-m-Y h:i:s a",strtotime($value->created_at)),
                        'current_user_id' => $value->current_user_id,
                        'current_user_type' => $value->current_user_type,
                        'barcode' => $value->barcode,
                        'brand' => $value->brand,
                        'buy_price' => $value->buy_price,
                        'identification' => $value->identification,
                        'manufacturer' => $value->manufacturer,
                        'notes' => $value->notes,
                        'product' => $value->product,
                        'serial_no' => $value->serial_no,
                        'status' => $value->status,
                        'type' => $value->type,
                        'updated_at' => date("d-m-Y h:i:s a",strtotime($value->updated_at)),
                        'vendor' => $value->vendor,
                        'vendor_name' => $value->vendor_name,
                        'warranty' => $value->warranty,
                        'warranty_date' => date("d-m-Y h:i:s a",strtotime($value->warranty_date)),
                    );
                }
            }
        }

		if ($type == 'barcode') {
            $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
            ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
            ->where('slj_stock_products.product',$prod_id)
            ->where('barcode', 'LIKE', $query . '%');
            if ($stakeholder == "manage-wise") {
                $data = $data->where('slj_stock_products.status','available');
            }
            else {
                $data = $data->where('slj_stock_products.status','transferred');
            }
            $data = $data->orderBy("slj_stock_products.id",'desc')->get();
            if(!empty($data))
            {
                foreach ($data as $key => $value) {
                    $newproductsarray[] = array(
                        'id' => $value->id,
                        'value' => $value->barcode,
                        'created_at' => date("d-m-Y h:i:s a",strtotime($value->created_at)),
                        'current_user_id' => $value->current_user_id,
                        'current_user_type' => $value->current_user_type,
                        'barcode' => $value->barcode,
                        'brand' => $value->brand,
                        'buy_price' => $value->buy_price,
                        'identification' => $value->identification,
                        'manufacturer' => $value->manufacturer,
                        'notes' => $value->notes,
                        'product' => $value->product,
                        'serial_no' => $value->serial_no,
                        'status' => $value->status,
                        'type' => $value->type,
                        'updated_at' => date("d-m-Y h:i:s a",strtotime($value->updated_at)),
                        'vendor' => $value->vendor,
                        'vendor_name' => $value->vendor_name,
                        'warranty' => $value->warranty,
                        'warranty_date' => date("d-m-Y h:i:s a",strtotime($value->warranty_date)),
                    );
                }
            }
        }

		if($type == 'brand-name') {
            $data = \App\StockProducts::join('slj_vendors','slj_stock_products.vendor', '=', 'slj_vendors.id')
            ->select('slj_vendors.company_name as vendor_name','slj_stock_products.*')
            ->where('slj_stock_products.product',$prod_id)
            ->where('brand', 'LIKE', $query . '%');
            if ($stakeholder == "manage-wise") {
                $data = $data->where('slj_stock_products.status','available');
            }
            else {
                $data = $data->where('slj_stock_products.status','transferred');
            }
            $data = $data->orderBy("slj_stock_products.id",'desc')->get();
            if(!empty($data))
            {
                foreach ($data as $key => $value) {
                    $newproductsarray[] = array(
                        'id' => $value->id,
                        'value' => $value->brand,
                        'created_at' => date("d-m-Y h:i:s a",strtotime($value->created_at)),
                        'current_user_id' => $value->current_user_id,
                        'current_user_type' => $value->current_user_type,
                        'barcode' => $value->barcode,
                        'brand' => $value->brand,
                        'buy_price' => $value->buy_price,
                        'identification' => $value->identification,
                        'manufacturer' => $value->manufacturer,
                        'notes' => $value->notes,
                        'product' => $value->product,
                        'serial_no' => $value->serial_no,
                        'status' => $value->status,
                        'type' => $value->type,
                        'updated_at' => date("d-m-Y h:i:s a",strtotime($value->updated_at)),
                        'vendor' => $value->vendor,
                        'vendor_name' => $value->vendor_name,
                        'warranty' => $value->warranty,
                        'warranty_date' => date("d-m-Y h:i:s a",strtotime($value->warranty_date)),
                    );
                }
            }
        }
        
        return \Response::Json($newproductsarray);
    }

    /**
     * autoCompleteEmployee 
     */
    public function autoCompleteEmployee(Request $request) {
      $query = $request->get('term');
      $city = $request->get('city');

      $employeesarray[] = array();
      $data = \App\Employees::where('employee_id', 'LIKE', $query . '%');
      
/*
      $data = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
      ->where('users.status','Y');
      if ($query != "") {
        $data = $data->where('name', 'LIKE', $query . '%');
      }

      if ($city != "") {
        $data = $data->where("slj_employees.city", $city);
      }
*/
      $data = $data->orderBy('employee_id')->pluck('employee_id', 'user_id');
      if (!empty($data)) {
        foreach ($data as $key => $value) {
          $employeesarray[] = array(
            'id' => $key,
            'value' => $value.' ('.$key.')',
          );
        }
      }

      return \Response::Json($employeesarray);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function autoCompleteBrand(Request $request)
    {
        $query = $request->get('term');
        $brandsarray[] = array();
        $query = \App\StockProducts::where('brand', 'LIKE', $query . '%');
        $query = $query->orderBy("slj_stock_products.brand");
        $query = $query->groupBy('slj_stock_products.brand');
        $data = $query->pluck('brand');

        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $brandsarray[] = array(
                    'value' => $value,
                );
            }
        }
        return \Response::Json($brandsarray);
    }
}
