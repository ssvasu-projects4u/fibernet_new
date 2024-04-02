<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
use Auth;
class ProductsController extends Controller
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
      
      if($roles[0]=='superadmin' || $roles[0]=="Inventory Manager")
      {
          $data = \App\Products::orderBy('name')->paginate(20);
      }
      else
      {
         $userid=\Auth::user()->id; 
          $data = \App\StockHistory::join('users','users.id', '=', 'slj_stock_history.to_user_id')
                           	->select('slj_stock_history.*')
            	           	->where('slj_stock_history.to_user_id', '=', \Auth::user()->id)
            	         
				            ->paginate(10); // added by durga
        // $data = \App\Products::orderBy('name')->paginate(20); old information

        //echo "<pre>"; print_r($data); exit;
      }
      
      $employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Product List";
     
      \App\Employees_Logs::create($employeedata);
	  
		return view('inventory.products.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->pluck('name', 'id');
      //  $vendors = \App\Vendors::where('status','Y')->pluck('name', 'id');
		return view('inventory.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
     public function GetCorV($productid)
  {
      // $uid = \Auth::user()->id;
     // $fiber=\App\Products::select('fiber_core')->where('id',$productid)->first();
      
      $data="<option value=''>--$productid--</option>";
    
      return $data;
  }
     public function storefiberproduct(Request $request)
     {
         	$input = request()->all();
         	$input['status'] = "Y";
         	$input['category']="14";
         	
         	\App\Products::create($input);

        return redirect('admin/inventory/stocks/add-fiberproduct')->with('success', 'Fiber Product created successfully.');
     }
    public function store(Request $request)
    {
        //
		//$validatedData = $request->validate([
			//'name' => 'required|unique:slj_product_categories'
		//]);
		 $data = array();
        	    $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        if ($request->hasFile("product_photo")) {
                    $extension = $request->tool_pick->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['product_photo' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('product_photo')) {
    				$photo = $input['tool_pick'] ;
    				$fileName = $user_id."-photo-".time().".".$photo->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/products/' ;
    				$photo->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				//$data['photo']=$fileName;
    				
    			}
    			 
		$input = request()->all();
        //$input['status'] = "Y";

		\App\Products::create($input);

        return redirect('admin/inventory/products')->with('success', 'Product created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $data = \App\StockProducts::join('slj_products','slj_stock_products.product', '=', 'slj_products.id')->where('product',$id)->orderBy('slj_stock_products.created_at','desc')->paginate(20);
        
        return view('inventory.products.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
     
     public function storebranchutility(Request $request)
  {
      $input = request()->all();
        	
    $data = array();
        	    $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        if ($request->hasFile("tool_pick")) {
                    $extension = $request->tool_pick->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['tool_pick' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('tool_pick')) {
    				$photo = $input['tool_pick'] ;
    				$fileName = $user_id."-photo-".time().".".$photo->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/office/' ;
    				$photo->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				$data['photo']=$fileName;
    				
    			}
    			  $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    		
    			if ($request->hasFile("invoice_file")) {
                    $extension = $request->invoice_file->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['invoice_file' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('invoice_file')) {
    				$invoicefname = $input['invoice_file'] ;
    				$fileName = $user_id."-invoice-".time().".".$invoicefname->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/office/' ;
    				$invoicefname->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				$data['invoice_file']=$fileName;
    				
    			}
    			  $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    		
    			if ($request->hasFile("serialno_photo")) {
                    $extension = $request->serialno_photo->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['serialno_photo' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('serialno_photo')) {
    				$invoicefname = $input['serialno_photo'] ;
    				$fileName = $user_id."-invoice-".time().".".$invoicefname->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/office/' ;
    				$invoicefname->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				$data['serialnum_file']=$fileName;
    				
    			}
    	$data['itemname'] = $input['newtool_name'];
    	      
    	         
    	                
                $data['city']=1;
                $data['branch'] = $input['utilitybranch'];
                
                $data['serial_no'] = $input['serialnumber'];
                $data['brand'] = $input['bname'];
                $data['modelno'] = $input['model_number'];
                $data['status'] = "available";
                $data['description']=$input['description'];
                 $data['category_name']=$input['category'];
                 $data['buyingdate']=$input['buyingdate'];
                $data['buyingprice'] = $input['buyingprice'];
               
                
                \App\StoreItems::create($data);
                
        return redirect('admin/branches/branchutility/'.$data['branch'])->with('success', 'Utility was created successfully.');
  }
  public function storedistutility(Request $request)
  {
      $input = request()->all();
        	
                $data = array();
        	    $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        if ($request->hasFile("tool_pick")) {
                    $extension = $request->tool_pick->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['tool_pick' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('tool_pick')) {
    				$photo = $input['tool_pick'] ;
    				$fileName = $user_id."-photo-".time().".".$photo->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/office/' ;
    				$photo->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				$data['photo']=$fileName;
    				
    			}
    			  $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    		
    			if ($request->hasFile("invoice_file")) {
                    $extension = $request->invoice_file->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['invoice_file' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('invoice_file')) {
    				$invoicefname = $input['invoice_file'] ;
    				$fileName = $user_id."-invoice-".time().".".$invoicefname->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/office/' ;
    				$invoicefname->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				$data['invoice_file']=$fileName;
    				
    			}
    			  $allowedFileExtensions = [
                    'jpeg', 'jpg', 'png', 'gif',
                ];
                
		        
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    		
    			if ($request->hasFile("serialno_photo")) {
                    $extension = $request->serialno_photo->extension();
				    if (!in_array($extension , $allowedFileExtensions)) {
					return redirect()->back()->withInput($request->input())
					->withErrors(['serialno_photo' => $extension . ' is not allowed in customer pic. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
				    }
			    }
                $user_id = Auth::user()->id;
               	$tool_photo_name = "";
    			if($photo = $request->hasFile('serialno_photo')) {
    				$invoicefname = $input['serialno_photo'] ;
    				$fileName = $user_id."-invoice-".time().".".$invoicefname->getClientOriginalExtension() ;
    				$destinationPath = public_path().'/uploads/office/' ;
    				$invoicefname->move($destinationPath,$fileName);
    				$tool_photo_name = $fileName ;
    				$data['serialnum_file']=$fileName;
    				
    			}
    	$data['itemname'] = $input['newtool_name'];
    	      
    	                
                $data['city'] = 1;
                
                $data['distributor'] = $input['utilitydistributor'];
                $data['brand'] = $input['bname'];
                
                $data['serial_no'] = $input['serialnumber'];
                $data['brand'] = $input['bname'];
                $data['modelno'] = $input['model_number'];
                $data['status'] = "available";
                $data['description']=$input['description'];
                 $data['category_name']=$input['category'];
                 $data['buyingdate']=$input['buyingdate'];
                $data['buyingprice'] = $input['buyingprice'];
                 
               
                
                \App\StoreItems::create($data);
                
        return redirect('admin/distributors/distutility/'.$data['distributor'])->with('success', 'Utility was created successfully.');
 
  }
  
    public function edit($id)
    {
        $details = \App\Products::find($id);
        $categories = \App\ProductCategories::where('status','Y')->whereNull('parent')->pluck('name', 'id');
        $subcategories = \App\ProductCategories::where('status','Y')->where('parent',$details->category)->orderBy('name')->pluck('name', 'id');
        
		return view('inventory.products.edit',['details'=>$details,'categories'=>$categories,'subcategories'=>$subcategories]);
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
		//	'name' => 'required|unique:slj_product_categories,name,'.$id
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
    
    
		//Update details
		$product->update($data);
		
		$employeedata=array();
    	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Product Updating";
     $employeedata['value_of_action']=$requestdata['name'];
     
      \App\Employees_Logs::create($employeedata);
	  
		
		return redirect('admin/inventory/products')->with('success', 'Product updated successfully.');
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
            return redirect('admin/inventory/products')->with('error', 'Product cannot be deleted because of dependency');
        //}
    }
    public function CustomerTransferShow($id)
    {
          $user = \Auth::user();
      $roles = $user->getRoleNames();
      
      if($roles[0]=='superadmin')
      {
          $userid = Auth::user()->id;
        $stocktransferdata = \App\StockProducts::where('status','transferred')->where('product',$id)->get();
        $stockdata=array();
      }
      else
      {
        
        
        $userid = Auth::user()->id;
        $stocktransferdata = \App\StockProducts::where('current_user_id',$userid)->where('employee_status','transfered')->get();
        $stockdata=array();
        
      } 
        return view('inventory.products.customer-transfer',['stocktransferdata'=>$stocktransferdata]);
         
         
    }
    
}
