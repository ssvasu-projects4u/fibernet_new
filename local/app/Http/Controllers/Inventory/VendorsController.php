<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Sms;

class VendorsController extends Controller
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
        $data = \App\Vendors::orderBy('id','desc')
				->paginate(20);
        
		return view('inventory.vendors.index',['data'=>$data]);
    }
	
	
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required',
            'contact_name' => 'required',
            'mobile' => 'required',
            'address'=> 'required',
        ]);

        $data = $request->all();
        //Photo
        $photo_name = "";
        if($request->hasFile('photo')) {
            $photo = $request->file('photo') ;
            $fileName = "photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = 'uploads/vendors-suppliers/' ;
            $photo->move($destinationPath,$fileName);
            $photo_name = $fileName;
        }
        $data['photo'] = $photo_name;
		
        \App\Vendors::create($data);
		return redirect()->route('vendors.index')->withSuccess('Vendor/Supplier Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('inventory.vendors.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $vendor = \App\Vendors::find($id);
		
		return view('inventory.vendors.edit',['vendor'=>$vendor]);
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
            'company_name' => 'required',
            'contact_name' => 'required',
            'mobile' => 'required',
            'address'=> 'required',
        ]);
        
        $vendor = \App\Vendors::find($id);
        $input = $request->all();

        
        //Photo
        if($request->hasFile('photo')) {
            $photo = $request->file('photo') ;
            $fileName = "photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = 'uploads/vendors-suppliers/' ;
            $photo->move($destinationPath,$fileName);
            $photo_name = $fileName;
            $input['photo'] = $photo_name;
        }else{
            $input['photo'] = $vendor->photo;
        }
        
        $vendor->update($input);
        return redirect()->route('vendors.index')->with('success','Vendor/Supplier updated successfully');
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

    
}
