<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class StateController extends Controller
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
		 $data = \App\State::orderBy('name')->paginate(20);
		 return view('administration.states.index',compact('data'));
		//return view('administration::cities.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('administration.states.create');
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

		\App\State::create($input);

        return redirect('admin/state')->with('success', 'State created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.states.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $statedetails = \App\State::find($id);
		
		return view('administration.states.edit',['statedetails'=>$statedetails]);
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
        $state = \App\State::find($id);
		
		//Update details
		$state->update($data);
		
		return redirect('admin/state')->with('success', 'State updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $distributors = \App\Distributors::where('state',$id)->count();
        $customers = \App\Customers::where('state',$id)->count();
        if($id > 0 && $distributors == 0 && $customers == 0){
           // \App\State::destroy($id);
		     $data['status'] = "N";
            $state = \App\State::find($id);
            
            //Update details
            $state->update($data);
             return redirect('admin/state')->with('success', 'State deleted successfully.');
        }else{
            return redirect('admin/state')->with('error', 'State cannot be deleted because of dependency');
        } 
    }
}
