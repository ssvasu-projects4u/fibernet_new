<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class DesignationsController extends Controller
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
	
        $data = \App\Designations::join('slj_departments','slj_departments.id', '=', 'slj_designations.department')->select('slj_designations.id','slj_designations.designation','slj_designations.department as departmentid','slj_departments.department','slj_designations.status')
        // ->where('slj_designations.status','Y')
        ->orderBy('designation')->paginate(20);

		 return view('administration.designations.index',compact('data'));
		//return view('administration::designations.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $items = \App\Departments::where('status','Y')->pluck('department', 'id');
				
		 return view('administration.designations.create',compact('items'));
		//return view('administration::designations.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'department' => 'required',
			'designation' => 'required'
		]);
		
		
		$input = request()->all();
        $input['status'] = "Y";

		\App\Designations::create($input);

        return redirect('admin/designations')->with('success', 'Designation created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.designations.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $designationdetails = \App\Designations::find($id);
		$items = \App\Departments::where('status','Y')->pluck('department', 'id');
		
		 return view('administration.designations.edit',compact('items','designationdetails'));
		//return view('administration::designations.edit',['items'=>$items, 'designationdetails'=>$designationdetails]);
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
			'department' => 'required',
            'designation' => 'required'
		]);
		
		$requestdata = $request->all(); 
		
		$data['department'] = $requestdata['department'];
		$data['designation'] = $requestdata['designation'];
        $designation = \App\Designations::find($id);
		
		//Update details
		$designation->update($data);
		
		return redirect('admin/designations')->with('success', 'Designation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $employees = \App\Employees::where('designation',$id)->count();
        
        if($id > 0 && $employees == 0){
            // \App\Designations::destroy($id);

            $data['status'] = "N";
            $designation = \App\Designations::find($id);
            
            //Update details
            $designation->update($data);

             return redirect('admin/designations')->with('success', 'Designation deleted successfully.');
        }else{
            return redirect('admin/designations')->with('error', 'Designation cannot be deleted because of dependency');
        }
    }
}
