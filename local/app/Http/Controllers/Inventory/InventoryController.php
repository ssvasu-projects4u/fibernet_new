<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InventoryController extends Controller
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
        $data = \App\Employees::join('users', 'users.id', '=', 'slj_employees.user_id')
            ->leftJoin('slj_departments', 'slj_employees.department', '=', 'slj_departments.id')
            ->leftJoin('slj_designations', 'slj_employees.designation', '=', 'slj_designations.id')
            ->select('slj_employees.*','users.status','users.name','users.email','users.mobile','slj_departments.department','slj_designations.designation')
                ->orderBy('slj_employees.created_at')->paginate(20);

        return view('administration.employees.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('name',['superadmin','customer','franchise','distributor','branch'])->pluck('name', 'id');
        $departments = \App\Departments::where('status','Y')->pluck('department as name', 'id');
        return view('administration.employees.create',['roles'=>$roles,'departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|unique:users',
            'mobile' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'role' => 'required'
        ]);
        
        $input = request()->all();
        
        $user['name'] = $input['name'];
        $user['first_name'] = $input['name'];
        $user['password'] = Hash::make($input['password']);
        $user['email'] = $input['email'];
        $user['mobile'] = $input['mobile'];
        $user['status'] = $input['status'];
		$user = \App\User::create($user);
		
		$employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Create User ";
     $employeedata['value_of_action']=$input['name'];
     
      \App\Employees_Logs::create($employeedata);
	
		
        //Assign Role
        $user->assignRole($input['role']);

        //Photo
        $employee_photo_name = "";
        if($photo = $request->hasFile('employee_photo')) {
            $photo = $request->file('employee_photo') ;
            $fileName = $userdata->id."-photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $photo->move($destinationPath,$fileName);
            $employee_photo_name = $fileName ;
        }

        //Aadhar Card
        $aadharcard_name = "";
        if($aadharcard = $request->hasFile('aadhar_card')) {
            $aadharcard = $request->file('aadhar_card') ;
            $fileName = $userdata->id."-aadhar-".time().".".$aadharcard->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $aadharcard->move($destinationPath,$fileName);
            $aadharcard_name = $fileName ;
        }

        //Pan Card
        $pancard_name = "";
        if($pancard = $request->hasFile('pan_card')) {
            $pancard = $request->file('pan_card') ;
            $fileName = $userdata->id."-pan-".time().".".$pancard->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $pancard->move($destinationPath,$fileName);
            $pancard_name = $fileName ;
        }

        //Employee Data
        $employee = new \App\Employees();
        $employee['user_id'] = $user->id;
        $employee['address'] = $input['address'];
        $employee['department'] = $input['department'];
        $employee['designation'] = $input['designation'];
        $employee['aadhar_card'] = $aadharcard_name;
        $employee['pan_card'] = $pancard_name;
        $employee['employee_photo'] = $employee_photo_name;
        $employee->save();

        return redirect('admin/employees')->with('success', 'Employee created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.employees.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $roles = Role::whereNotIn('name',['superadmin','customer','franchise','distributor','branch'])->pluck('name', 'id');
        $departments = \App\Departments::where('status','Y')->pluck('department as name', 'id');

        $userdetails = \App\Employees::join('users', 'users.id', '=', 'slj_employees.user_id')->select('slj_employees.*','users.name','users.email','users.mobile','users.status')->orderBy('slj_employees.created_at')->where('slj_employees.id',$id)->first();

        $designations = \App\Designations::where('department',$userdetails->department)->where('status','Y')->pluck('designation as name', 'id');


    

        return view('administration.employees.edit',['userdetails'=>$userdetails,'roles'=>$roles,'departments'=>$departments,'designations'=>$designations]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    { 
        $employee = \App\Employees::find($id);
        $user_id = $employee->user_id;

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user_id,
            'address' => 'required',
            'mobile' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'role' => 'required'
        ]);


        //Update User details
        $user = \App\User::find($user_id);
        $requestdata = $request->all(); 
        $data['name'] = $requestdata['name'];
        $data['first_name'] = $requestdata['name'];
        $data['email'] = $requestdata['email'];
        $data['mobile'] = $requestdata['mobile'];
        $data['status'] = $requestdata['status']; 
        $user->update($data);



        	$employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Update Employee";
     $employeedata['value_of_action']=$requestdata['name'];
     \App\Employees_Logs::create($employeedata);
	  
     
        //Sync Roles
        $userrolenames = $user->getRoleNames();
        $userroles = array();
        
        foreach ($userrolenames as $key => $role) {
            $userroles[] = $role;
        }

        if(!in_array($requestdata['role'],$userroles)){
           $user->syncRoles($requestdata['role']); 
        }

       

        //$userpermissions = array();
        //$userpermissionnames = $user->getPermissionNames();
        
        // foreach ($userpermissionnames as $key => $permission) {
        //     $userpermissions[] = $permission;
        // }

         // if(isset($requestdata['permission']) && $requestdata['permission'] != $userpermissions){
        //    $user->syncPermissions($requestdata['permission']); 
        // }

        
        //Update Employee details
        $employee->update($requestdata);
        
        return redirect('admin/employees')->with('success', 'Employee details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $employee = \App\Employees::find($id);
        $user = \App\User::find($employee->user_id);

        $data = array();
        $data['status'] = "D";
        $user->update($data);
        $employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Delete Employee";
     $employeedata['value_of_action']=$employee->user_id;
     
      \App\Employees_Logs::create($employeedata);
	  
        return redirect('admin/employees')->with('success', 'Employee deleted successfully.');
    }



    public function getDepartmentDesignations($department)
    {
        $departmentdesignations = \App\Designations::where('department',$department)->where('status','Y')->select('id','designation')->get();

        $html = "<option value=''>-- Select Designation --</option>";
        foreach($departmentdesignations as $designation){
            $html.="<option value='".$designation->id."'>".$designation->designation."</option>";
        }

        return $html;
    }

    

}
