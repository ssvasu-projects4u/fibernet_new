<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
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
        $data = \App\User::leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('roles.name','!=', "customer")
        ->select('users.*', 'roles.name as role')
        ->orderBy('users.name')->paginate(20);
        // dd($data);
        return view('users.users.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::where('status','Y')->pluck('name', 'id');
        $permissions = Permission::where('status','Y')->get();

        return view('users.users.create',['roles'=>$roles,'permissions'=>$permissions]);
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
            'password' => 'required|min:8',
            'email' => 'required|unique:users',
            'role' => 'required'
        ]);
        
        $input = request()->all();
        
        $user = array();

        $user['name'] = $input['name'];
        $user['first_name'] = $input['name'];
        $user['password'] = Hash::make($input['password']);
        $user['email'] = $input['email'];
        $user['status'] = $input['status'];
        $userdata = \App\User::create($user);

        //$user->save();

        //Assign Role
        //$userdata = \App\User::where('email',$input['email'])->first();
        
        //echo "<pre>"; print_r($userdata); exit;

        $userdata->assignRole($input['role']);

        if(isset($input['permission']) && count($input['permission'])>0){    
            $userdata->givePermissionTo($input['permission']);
        }


        //echo "<pre>"; print_r($input); exit;

        return redirect('admin/users')->with('success', 'User created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('users.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $userdetails = \App\User::find($id);
        $roles = Role::where('status','Y')->pluck('name', 'name as id');
        $permissions = Permission::where('status','Y')->get();

        $userrolenames = $userdetails->getRoleNames();
        //$userpermissionnames = $userdetails->getPermissionNames();

        $userroles = array();
        $userpermissions = array();

        foreach ($userrolenames as $key => $role) {
            $userroles[] = $role;
        }

        

        //echo "<pre>"; print_r($userpermissions); exit;

        return view('users.users.edit',['userdetails'=>$userdetails,'permissions'=>$permissions,'roles'=>$roles,'userroles'=>$userroles]);
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
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            //'role' => 'required'
        ]);

        $requestdata = $request->all(); 
        $data['name'] = $requestdata['name'];
        $data['first_name'] = $requestdata['name'];
        $data['email'] = $requestdata['email'];
        $data['status'] = $requestdata['status'];

        // Update details
        $user = \App\User::find($id);
        if ((strpos($user->email, "e-") == 0) &&
         ($data['email'] != $user->email)) {
          $data['email'] = 'e-' . $requestdata['email'];
        }

        $user->update($data);

        $userrolenames = $user->getRoleNames();
        $userpermissionnames = $user->getPermissionNames();

        $userroles = array();
        $userpermissions = array();

        foreach ($userrolenames as $key => $role) {
            $userroles[] = $role;
        }

        foreach ($userpermissionnames as $key => $permission) {
            $userpermissions[] = $permission;
        }

        if(!in_array($requestdata['role'],$userroles)){
           $user->syncRoles($requestdata['role']); 
        }

        if(isset($requestdata['permission']) && $requestdata['permission'] != $userpermissions){
           $user->syncPermissions($requestdata['permission']); 
        }


        
        return redirect('admin/users')->with('success', 'User details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = array();
        $data['status'] = "D";

        $user = \App\User::find($id);
        $user->update($data);
        return redirect('admin/users')->with('success', 'User deleted successfully.');
    }


    public function userswithrole($role)
    {
        if($role == "warehouse"){
            $data = \App\Warehouses::orderBy('warehouse_name')->select('warehouse_name as name', 'id')->where('status','Y')->get();
        }else if($role == "distributor"){
            $data = \App\User::join('slj_distributors','slj_distributors.user_id', '=', 'users.id')->role('distributor')->where('users.status','Y')->orderBy('slj_distributors.distributor_name')->select('slj_distributors.distributor_name as name', 'users.id')->get();
        }else if($role == "franchise"){
            $data = \App\User::join('slj_franchises','slj_franchises.user_id', '=', 'users.id')->role('franchise')->where('users.status','Y')->orderBy('slj_franchises.franchise_name')->select('slj_franchises.franchise_name as name', 'users.id')->get();
        }else if($role == "employee"){
            $data = \App\User::join('slj_employees','slj_employees.user_id', '=', 'users.id')->where('users.status','Y')->orderBy('name')->select('name', 'users.id')->get();
        }else{
            $data = \App\User::role($role)->orderBy('name')->get();
        }
        $html = "<option value=''>-- Select User --</option>";
        foreach($data as $user){
            $html.="<option value='".$user->id."'>".$user->name."</option>";
        }

        return $html;   
    }
}
