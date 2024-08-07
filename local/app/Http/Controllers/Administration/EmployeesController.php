<?php
//test

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $cities = array();
		$roles = array();
		$departments = array();
        $designations = [];
		$cities = \App\City::where('status','Y')->pluck('name', 'id');
        $roles = Role::whereNotIn('name',['superadmin','customer','franchise','distributor','branch'])->pluck('name', 'id');
        $departments = \App\Departments::where('status','Y')->pluck('department as name', 'id');

		if(isset($_GET['department'])) {
            $designations = \App\Designations::where('department', $_GET['department'])->where('status','Y')->pluck('designation as name', 'id');
		}

        $params = $request->all();

        $data = \App\Employees::join('users', 'users.id', '=', 'slj_employees.user_id')
            ->leftJoin('slj_departments', 'slj_employees.department', '=', 'slj_departments.id')
            ->leftJoin('slj_designations', 'slj_employees.designation', '=', 'slj_designations.id')
            ->leftJoin('slj_cities', 'slj_employees.city', '=', 'slj_cities.id')
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('slj_employees.*','users.status','users.name','users.email',
                'users.mobile','slj_departments.department','slj_designations.designation',
                'slj_cities.name as city', 'users.first_name','users.last_name',
                'roles.name as role'
            )
            // ->where($tbl, $operator, $id)
            ->orderBy('slj_employees.created_at', 'desc')
            ->filter($params)
            ->paginate(20);

        return view('administration.employees.index',[
            'data'=>$data,
			'cities'=>$cities,
			'departments'=>$departments,
            'roles'=>$roles,
            'designations'=>$designations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $distributors = array();
        $subdistributors = array();
		$branches = array();
		$franchises = array();

		$cities = \App\City::where('status','Y')->pluck('name', 'id');
        $states = \App\State::where('status','Y')->pluck('name', 'id');

		if(isset($_GET['distributor'])){
			$distributors = \App\Distributors::where('id',$_GET['distributor'])->pluck('distributor_name as name', 'id');
		}
        if(isset($_GET['subdistributor'])){
			$distributors = \App\SubDistributors::where('id',$_GET['subdistributor'])->pluck('subdistributor_name as name', 'id');
		}
		if(isset($_GET['branch'])){
			$branches = \App\Branches::where('id',$_GET['branch'])->pluck('branch_name as name', 'id');
		}
		if(isset($_GET['franchise'])){
			$franchises = \App\Franchises::where('id',$_GET['franchise'])->pluck('franchise_name as name', 'id');
		}
        $roles = Role::whereNotIn('name',['superadmin','customer','franchise','distributor','subdistributor','branch'])->pluck('name', 'id');
        $departments = \App\Departments::where('status','Y')->pluck('department as name', 'id');
		$cities = \App\City::where('status','Y')->pluck('name', 'id');

        return view('administration.employees.create',[
            'roles' => $roles,
            'departments' => $departments,
             'cities' => $cities,
             'states' => $states,
            'distributors'=>$distributors,
            'subdistributors'=>$subdistributors,
			'branches'=>$branches,
			'franchises'=>$franchises
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        if(strpos($email, "e-") == "") {
            $request->merge([
               'email' => "e-".trim($email)
            ]);
        }
 $requestdata = $request->all();
        if(!$request->validate([
            'name' => 'required',
            'first_name' => 'required',            
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'department' => 'required',
            'designation' => 'required',
            'role' => 'required',
            'joining_date' => 'required',
        ])) {
            return redirect()->back()->wihtInput()->with('error');
        }

        $allowedFileExtensions = [
            'jpeg', 'jpg', 'png', 'gif',
          ];
  
          if ($request->hasFile("employee_photo")) {
              $extension = $request->employee_photo->extension();
              if (!in_array($extension , $allowedFileExtensions)) {
                  return redirect()->back()->withInput($request->input())
                  ->withErrors(['employee_photo' => $extension . ' is not allowed in employee photo. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
              }
          }
  
        $input = request()->all();
        
        $userdata = array();
        $userdata['name'] = $input['name'];
        $userdata['first_name'] = $input['first_name'];
        $userdata['last_name'] = $input['last_name'];
        $userdata['password'] = Hash::make($input['password']);
        $userdata['email'] =  $input['email'];
        $userdata['mobile'] = $input['mobile'];
        $userdata['status'] = $input['status'];
        
        $user = \App\User::create($userdata);
      
        //Assign Role
        $user->assignRole($input['role']);

        //Photo
        $employee_photo_name = "";
        if($request->hasFile('employee_photo')) {
            $photo = $request->file('employee_photo') ;
            $fileName = $user->id."-photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $photo->move($destinationPath,$fileName);
            $employee_photo_name = $fileName;
        }

        $resume_name = "";
        if($request->hasFile('resume')) {
            $file = $request->file('resume') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $resume_name = $fileName ;
        }

        $aadhar_card_name = "";
        if($request->hasFile('aadhar_card')) {
            $file = $request->file('aadhar_card');
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $aadhar_card_name = $fileName ;
        }

        $id_proof_name= "";
        if($request->hasFile('id_proof')) {
            $file = $request->file('id_proof') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $id_proof_name = $fileName;
        }

        $pan_card_name= ""; 
        if($request->hasFile('pan_card')) {
            $file = $request->file('pan_card') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $pan_card_name = $fileName ;
        }

        $experience_letter_name = "";
        if($request->hasFile('experience_letter')) {
            $file = $request->file('experience_letter') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $experience_letter_name = $fileName ;
        }

        $sslc_name = "";
        if($request->hasFile('sslc')) {
            $file = $request->file('sslc') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $sslc_name = $fileName;
        }

        $puc_diploma_name = "";
        if($request->hasFile('puc_diploma_file')) {
            $file = $request->file('puc_diploma_file') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $puc_diploma_name = $fileName;
        }

        $under_graduate_name = "";
        if($request->hasFile('under_graduate')) {
            $file = $request->file('under_graduate') ;
            $fileName = $user->id."-aadhar-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $under_graduate_name = $fileName ;
        }

        $post_graduate_name = "";
        if($request->hasFile('post_graduate')) {
            $file = $request->file('post_graduate') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $post_graduate_name = $fileName ;
        }

        //Employee Data
        $employee = new \App\Employees();
        $employee['user_id'] = $user->id;
        $employee['city'] = $input['city'];
        $employee['state'] = $input['state'];
        $employee['f_name_c_name'] = $input['f_name_c_name'];
        $employee['joining_date'] = $input['joining_date'];
        $employee['address'] = $input['address'];
        $employee['department'] = $input['department'];
        $employee['designation'] = $input['designation'];
        $employee['alt_mobile_num'] = $input['alt_mobile_num'];
        $employee['employee_photo'] = $employee_photo_name;
        $employee['resume'] = $resume_name;
        $employee['aadhar_card'] = $aadhar_card_name;
        $employee['id_proof'] = $id_proof_name;
        $employee['pan_card'] = $pan_card_name;
        $employee['experience_letter'] = $experience_letter_name;
        $employee['sslc'] = $sslc_name;
        $employee['puc_diploma'] = $puc_diploma_name;
        $employee['under_graduate'] = $under_graduate_name;
        $employee['post_graduate'] = $post_graduate_name;
       // $employees['distributor']=$input['distributor'];
         if(isset($requestdata['distributor']) && count($requestdata['distributor'])>0){
             $employee['distributor'] = implode(",",$requestdata['distributor']);
        }
		
		  if(isset($requestdata['subdistributor']) && count($requestdata['subdistributor'])>0){
             $employee['subdistributor'] = implode(",",$requestdata['subdistributor']);
        }
        if(isset($requestdata['branches']) && count($requestdata['branches'])>0){
             $employee['branch'] = implode(",",$requestdata['branches']);
        }
         if(isset($requestdata['franchise']) && count($requestdata['franchise'])>0){
       $employee['franch'] = implode(",",$requestdata['franchise']);
           }
        $employee->save();
        /*
        
        // Save Data Into slj_employee2
        $employee1 = new \App\Employees1();
        $employee1['user_id'] = $user->id;
        $employee1['city'] = $input['city'];
        $employees1['distributor']=$input['distributor'];
       
          
        $employee1['branch'] = implode(",",$requestdata['branches']);
           if(isset($requestdata['franchise']) && count($requestdata['franchise'])>0){
        $employee1['franch'] = implode(",",$requestdata['franchise']);
           }
        $employee1->save();
        
        
        
         // Save Data Into slj_employee2
        $employee2 = new \App\Employees2();
        $employee2['user_id'] = $user->id;
        $employee2['city'] = $input['city'];
        $employee2->save(); */
        
        
        $files = $request->file('file_name_series');
        if($request->hasFile('file_name_series'))
        {
            $filesdata = [];
            foreach($request->file('file_name_series') as $key => $file) {
                $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
                $destinationPath = public_path().'/uploads/employees/' ;
                $file->move($destinationPath,$fileName);
                array_push($filesdata, [
                    'user_id' => $user->id,
                    'user_type' => 'employee',
                    'original_filename' => $file->getClientOriginalName(),
                    'filename' => $fileName,
                    'file_path' => $destinationPath .'/' . $fileName,
                    'certification_name' => $input['file_series'][$key]
                ]);
            }
            \App\File::insert($filesdata);
        }
        
        $usrno = \App\Employees::count(); // gets the whole row
        $maxId = DB::table('slj_employees')->max('id');
        
        //dd($maxId);
          
        $empidval = \App\Employees::where('id',$maxId)->first();
        $maxValue = $empidval->employee_id;
            
        $user->username = $maxValue;
        $user->save();
        
		//$user = \App\User::create($user);
        
        return redirect('admin/employees')->with('success', 'Employee created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $userdetails = \App\Employees::join('users', 'users.id', '=', 'slj_employees.user_id')
        ->leftJoin('slj_departments', 'slj_employees.department', '=', 'slj_departments.id')
        ->leftJoin('slj_designations', 'slj_employees.designation', '=', 'slj_designations.id')
        ->leftJoin('slj_cities', 'slj_employees.city', '=', 'slj_cities.id')
        ->leftJoin('slj_branches', 'slj_branches.id', '=', 'slj_employees.branch')
        ->leftJoin('slj_franchises', 'slj_franchises.id', '=', 'slj_employees.franch')
        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('slj_employees.*','users.status','users.name','users.email',
            'users.mobile','slj_departments.department','slj_designations.designation',
            'slj_cities.name as city', 'users.first_name','users.last_name',
            'roles.name as role', 'users.id as user_id', 'slj_employees.branch as branchid','slj_branches.branch_name as branchname'
        )
        ->where('slj_employees.id',$id)->first();
        	$empbranchgroup = array();
		$cabledata = \App\Branches::join('users', 'users.id', '=', 'slj_employees.user_id');

        $certificates = \App\File::where('user_id', $userdetails->user_id)
        ->where('active', 1)
        ->get();

        return view('administration.employees.show', [
            'userdetails'=>$userdetails,
            'certificates'=>$certificates,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
		$cities = \App\City::where('status','Y')->pluck('name', 'id');
        $states = \App\State::where('status','Y')->pluck('name', 'id');

        $roles = Role::whereNotIn('name',['superadmin','customer','franchise','distributor','subdistributor','branch'])->pluck('name', 'id');
        $departments = \App\Departments::where('status','Y')->pluck('department as name', 'id');

        $userdetails = \App\Employees::join('users', 'users.id', '=', 'slj_employees.user_id')
        ->select('slj_employees.*','users.name','users.email','users.mobile','users.status',
            'users.first_name','users.last_name','users.password'
        )
        ->orderBy('slj_employees.created_at')
        ->where('slj_employees.id',$id)->first();
    

        $designations = \App\Designations::where('department',$userdetails->department)
        ->where('status','Y')->pluck('designation as name', 'id');

        $user = \App\User::find($userdetails["user_id"]);
        $user_roles = $user->roles->first()->id;
        $certificates = \App\File::where('user_id', $userdetails->user_id)
        ->where('active', 1)
        ->get();

        return view('administration.employees.edit', [
            'userdetails'=>$userdetails,
            'roles'=>$roles,
            'role'=>$user_roles,
            'departments'=>$departments,
            'designations'=>$designations,
            'cities'=>$cities,
            'states'=>$states,
            'certificates'=>$certificates
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $email = $request->input('email');
        if(strpos($email, "e-") == "") {
            $request->merge([
               'email' => "e-".trim($email)
            ]);
        }

        $employee = \App\Employees::find($id);
        $user_id = $employee->user_id;
        if(!$request->validate([
            'name' => 'required',
            'first_name' => 'required',            
            'address' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'role' => 'required',
            'joining_date' => 'required',
        ])) {
            return redirect()->back()->wihtInput()->with('error');
        }

        $allowedFileExtensions = [
            'jpeg', 'jpg', 'png', 'gif',
          ];
  
          if ($request->hasFile("employee_photo")) {
              $extension = $request->employee_photo->extension();
              if (!in_array($extension , $allowedFileExtensions)) {
                  return redirect()->back()->withInput($request->input())
                  ->withErrors(['employee_photo' => $extension . ' is not allowed in employee photo. Allowed extensions are ' . implode(", ", $allowedFileExtensions) ]);
              }
          }
        
        $userdata = [];
        //Update User details
        $user = \App\User::find($user_id);
        $requestdata = $request->all();
        $userdata['name'] = $requestdata['name'];
        $userdata['first_name'] = $requestdata['first_name'];
        $userdata['last_name'] = $requestdata['last_name'];
        if ($requestdata["password"] != "") {
            $userdata['password'] = Hash::make($requestdata["password"]);
        }
        else {
            $userdata['password'] = $user->password;
        }
        $userdata['email'] = $requestdata['email'];
        $userdata['mobile'] = $requestdata['mobile'];
        $userdata['status'] = $requestdata['status'];
        $user->update($userdata);

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
        $employeedata = [];
        if($request->hasFile('employee_photo')) {
            $photo = $request->file('employee_photo') ;
            $fileName = $user->id."-photo-".time().".".$photo->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $photo->move($destinationPath,$fileName);
            $employeedata['employee_photo'] = $fileName;
        }

        if($request->hasFile('resume')) {
            $file = $request->file('resume') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['resume'] = $fileName;
        }

        if($request->hasFile('aadhar_card')) {
            $file = $request->file('aadhar_card') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['aadhar_card'] = $fileName;            
        }

        if($request->hasFile('id_proof')) {
            $file = $request->file('id_proof') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['id_proof'] = $fileName;            
        }

        if($request->hasFile('pan_card')) {
            $file = $request->file('pan_card') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['pan_card'] = $fileName;            
        }

        if($request->hasFile('experience_letter')) {
            $file = $request->file('experience_letter') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['experience_letter'] = $fileName;            
        }

        if($request->hasFile('sslc')) {
            $file = $request->file('sslc') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['sslc'] = $fileName;            
        }

        if($request->hasFile('puc_diploma_file')) {
            $file = $request->file('puc_diploma_file') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['puc_diploma'] = $fileName;
        }

        if($request->hasFile('under_graduate')) {
            $file = $request->file('under_graduate') ;
            $fileName = $user->id."-aadhar-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['under_graduate'] = $fileName;
        }

        if($request->hasFile('post_graduate')) {
            $file = $request->file('post_graduate') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $employeedata['post_graduate'] = $fileName;
        }

        $employeedata['city'] = $requestdata['city'];
        $employeedata['state'] = $requestdata['state'];
        $employeedata['f_name_c_name'] = $requestdata['f_name_c_name'];
        $employeedata['joining_date'] = $requestdata['joining_date'];
        $employeedata['address'] = $requestdata['address'];
        $employeedata['department'] = $requestdata['department'];
        $employeedata['designation'] = $requestdata['designation'];
        $employeedata['alt_mobile_num'] = $requestdata['alt_mobile_num'];
        // Added by Durga
         if(isset($requestdata['distributor']) && count($requestdata['distributor'])>0){
             $employeedata['distributor'] = implode(",",$requestdata['distributor']);
        }
        if(isset($requestdata['subdistributor']) && count($requestdata['subdistributor'])>0){
            $employeedata['subdistributor'] = implode(",",$requestdata['subdistributor']);
       }
        if(isset($requestdata['branches']) && count($requestdata['branches'])>0){
             $employeedata['branch'] = implode(",",$requestdata['branches']);
        }
         if(isset($requestdata['franchises']) && count($requestdata['franchises'])>0){
       $employeedata['franch'] =implode(",",$requestdata['franchises']);
           }

        //Update Employee details
        $employee->update($employeedata);

        $remove_existing = explode(" ", $requestdata['remove_existing']);
        \App\File::whereIn('id', $remove_existing)->update(['active' => 0]);

        if (isset($requestdata['file_existing_series']) 
        && !empty($requestdata['file_existing_series'])) {
            // Using array_keys() function 
            $keys = array_keys($requestdata['file_existing_series']);

            // Calculate the size of array 
            $size = sizeof($keys);

            // Using loop to access keys 
            for( $i = 0; $i < $size; $i++) {
                $file_update = \App\File::findOrFail($keys[$i]);
                $file_update->update(["certification_name" => $requestdata['file_existing_series'][$keys[$i]]]);
            }
            // foreach($request->file('file_name_series') as $key => $file) {
            //     dd($requestdata['file_existing_series'][$key]);
            //     $file_update = \App\File::findOrFail($requestdata['file_existing_series'][$key]);
            //     $file_update->update(["certification_name" => $requestdata['file_existing_series'][$key]]);
            // }
        }

        if (isset($requestdata['file_existing_name_series']) && !empty($requestdata['file_existing_name_series'])) {
            if($request->hasFile('file_existing_name_series'))
            {
                $keys = array_keys($requestdata['file_existing_name_series']);

                // Calculate the size of array 
                $size = sizeof($keys);
    
                // Using loop to access keys 
                for( $i = 0; $i < $size; $i++) {
                    $file_update = \App\File::findOrFail($keys[$i]);
                    $file = $request->file('file_existing_name_series')[$keys[$i]];
                    $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
                    $destinationPath = public_path().'/uploads/employees/';
                    $file->move($destinationPath,$fileName);
                    $file_update->update( [
                        'original_filename' => $file->getClientOriginalName(),
                        'filename' => $fileName,
                        'file_path' => $destinationPath .'/' . $fileName,
                    ]);
                }
            }
        }

        $files = $request->file('file_name_series');
        if($request->hasFile('file_name_series'))
        {
            $filesdata = [];
            foreach($request->file('file_name_series') as $key => $file) {
                $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
                $destinationPath = public_path().'/uploads/employees/';
                $file->move($destinationPath,$fileName);
                array_push($filesdata, [
                    'user_id' => $user->id,
                    'user_type' => 'employee',
                    'original_filename' => $file->getClientOriginalName(),
                    'filename' => $fileName,
                    'file_path' => $destinationPath .'/' . $fileName,
                    'certification_name' => $requestdata['file_series'][$key]
                ]);
            }
            \App\File::insert($filesdata);
        }

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
        $data['status'] = "N";
        // $data['status'] = "D";
        $user->update($data);
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

    public function resign(Request $request)
    {
        $employee = \App\Employees::findOrFail($request->id);
        $user = \App\User::findOrFail($employee->user_id);
        $user->update([
            'status'=> 'N',
        ]);

        $resignation_letter_name = "";
        if($request->hasFile('resignation_letter')) {
            $file = $request->file('resignation_letter') ;
            $fileName = $user->id."-photo-".time().".".$file->getClientOriginalExtension() ;
            $destinationPath = public_path().'/uploads/employees/' ;
            $file->move($destinationPath,$fileName);
            $resignation_letter_name = $fileName;
        }
        
        $employee->update([
            'resignation_date'=>$request->resignation_date,
            'note'=>$request->note,
            'resignation_letter'=> $resignation_letter_name,
        ]);

        return redirect()->back()->withSuccess('resignation updated successfully');
    }
}
