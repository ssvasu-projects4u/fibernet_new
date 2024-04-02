<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Artisan;
use Auth;
use DB;

class ConnectionTypesController extends Controller
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
    	$data = \App\ConnectionType::orderBy('title')->paginate(20);
		return view('packages.connection-types.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('packages.connection-types.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'title' => 'required|unique:slj_connection_types'
		]);
		
		
		$input = request()->all();
		
		
		//echo "<pre>"; print_r($input); exit;


		$data = \App\ConnectionType::create($input);
		//echo $data->id;
		//exit;

		

        return redirect('admin/connection-types')->with('success', 'Connection Type created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.connection-types.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $connectiontypedetails = \App\ConnectionType::find($id);
		
		
		return view('packages.connection-types.edit',['connectiontypedetails'=>$connectiontypedetails]);
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
			'title' => 'required|unique:slj_connection_types,title,'.$id
		]);
		
		$requestdata = $request->all(); 
		
		// $data['distributor_share'] = $requestdata['distributor_share'];
  		// $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$connectiontype = \App\ConnectionType::find($id);
		$connectiontype->update($requestdata);
		
		return redirect('admin/connection-types')->with('success', 'Connection type details updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $connectiontypedetails = \App\ConnectionType::find($id);
		
		$customers = \App\Customers::where('connection_type',strtolower($connectiontypedetails->title))->count();
        
        if($id > 0 && $customers == 0){
            \App\ConnectionType::destroy($id);
            
            return redirect('admin/connection-types')->with('success', 'Connection Type deleted successfully.');
        }else{
            return redirect('admin/connection-types')->with('error', 'Connection Type cannot be deleted because of dependency');
        }
    }
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function getDetails($title)
    {
             $id = Auth::user()->id;
$user = Auth::user();
        $id = Auth::user()->id;
          $no=1;
       $roles = $user->getRoleNames(); 
        if($roles[0]=='superadmin')
        {
       
              $data = \App\ConnectionType::where('id',$title)->first();
		return $data;
        }
      else
        {
        $data = \App\ConnectionType::where('id',$title)->first();
		return $data;
            
        }
        
    }



}
