<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class CityController extends Controller
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
       // $data = \App\City::where('status','Y')->orderBy('name')->paginate(20);
		 $data = \App\City::orderBy('name')->paginate(20);
		 return view('administration.cities.index',compact('data'));
		//return view('administration::cities.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $states = \App\State::where('status','Y')->pluck('name', 'id');
        return view('administration.cities.create',['states'=>$states]);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
		$validatedData = $request->validate([
			'name' => 'required'
		]);
		
		
		$input = request()->all();
        $input['status'] = "Y";
       

		\App\City::create($input);

        return redirect('admin/city')->with('success', 'City created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.cities.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $citydetails = \App\City::find($id);
        $states = \App\State::where('status','Y')->pluck('name', 'id');
		
		return view('administration.cities.edit',['citydetails'=>$citydetails,'states'=>$states]);
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
			'name' => 'required'
		]);
		
		$requestdata = $request->all(); 
		
		$data['name'] = $requestdata['name'];
        $data['state'] = $requestdata['state'];
        $city = \App\City::find($id);
		
		//Update details
		$city->update($data);
		
		return redirect('admin/city')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $distributors = \App\Distributors::where('city',$id)->count();
        $customers = \App\Customers::where('city',$id)->count();
        if($id > 0 && $distributors == 0 && $customers == 0){
           // \App\City::destroy($id);
		     $data['status'] = "N";
            $city = \App\City::find($id);
            
            //Update details
            $city->update($data);
             return redirect('admin/city')->with('success', 'City deleted successfully.');
        }else{
            return redirect('admin/city')->with('error', 'City cannot be deleted because of dependency');
        } 
    }
}
