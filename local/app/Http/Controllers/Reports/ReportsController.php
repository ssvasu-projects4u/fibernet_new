<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ReportsController extends Controller
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
        $data = \App\Deposits::orderBy('id','desc')->paginate(20);
    	return view('reports.index',['data'=>$data]);
    }
     public function branchindex()
    {
          $id = \Auth::user()->id;
          $branchname=\App\Branches::where('user_id','=',$id)->first();
       // $data = \App\Deposits::where('name','=',$branchname->branch_name)->orderBy('id','desc')->paginate(20);
    //    $branchdeposit=$branchname->credited_balance;
    
    $bb=2;
        $data = \App\Deposits::leftjoin('slj_txns','slj_txns.created_at','=','slj_deposits.created_at')
            ->select('slj_deposits.*','slj_txns.*')
            ->where('slj_deposits.deposit_for','=',$bb)
            ->where('slj_deposits.franchise_branch_id','=',$branchname->id)
        ->orderBy('slj_deposits.id','desc')->paginate(50);
        
    	return view('reports.branchindex',['data'=>$data]);
    }
     public function franchiseindex()
    {
          $id = \Auth::user()->id;
          $franchname=\App\Franchises::where('user_id','=',$id)->first();
//$data = \App\Deposits::where('name','=',$franchname->franchise_name)->orderBy('id','desc')->paginate(20);
       // $branchdeposit=$franchname->credited_balance;
       
         $bb=1;
        $data = \App\Deposits::leftjoin('slj_txns','slj_txns.created_at','=','slj_deposits.created_at')
            ->select('slj_deposits.*','slj_txns.*')
            ->where('slj_deposits.deposit_for','=',$bb)
            ->where('slj_deposits.franchise_branch_id','=',$franchname->id)
            ->orderBy('slj_deposits.id','desc')->paginate(50);
        
    	return view('reports.franchiseindex',['data'=>$data]);
    }
    public function logindex()
    {
        $data = \App\Employees_Logs::join('users','users.id','slj_logs.employee_id')
                ->select('users.*','slj_logs.action_name','slj_logs.value_of_action','slj_logs.created_at')
                ->orderBy('id','desc')->paginate(20);
    	return view('reports.logindex',['data'=>$data]);
    }

    public function onlinePayments()
    {
        $data = \App\OPT::orderBy('id','desc')->paginate(20);
	    return view('reports.onlinePayments',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('reports.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('reports.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
