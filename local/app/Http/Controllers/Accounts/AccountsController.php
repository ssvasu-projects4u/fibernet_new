<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
use App\Paymenttype;
use App\PurchaseOrder;
use Carbon\Carbon;
use App\BankAccount;

class AccountsController extends Controller
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
        dd('hi');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function paymentList()
    {
        $data = Paymenttype::orderBy('id', 'desc')->paginate(20);
        return view('accounts.paymenttype_list',['data'=>$data]);
    }
     public function CustomerPayments()
    {
        $data = \App\CustomerPayments::leftjoin('slj_customers','slj_customers.id','customer_id')
    ->leftjoin('slj_branches','slj_branches.id','customer_payments.branch')
    ->leftjoin('slj_franchises','slj_franchises.id','customer_payments.franch')
    ->leftjoin('users','users.id','slj_customers.user_id')
    ->select('customer_payments.*','slj_branches.*','slj_franchises.*','users.*')
            
   ->orderBy('customer_payments.id', 'desc')->paginate(20);
        return view('accounts.customer-payments',['data'=>$data]);
    }
    public function BranchPayments()
    {
    /*
         $data = \App\BranchPayments::select('branch_payments.*')
                ->orderBy('id', 'desc')->paginate(20);
                */
        $id = \Auth::user()->id;
          $branchname=\App\Branches::where('user_id','=',$id)->first();
          $bb=2;
        $data = \App\Deposits::leftjoin('slj_txns','slj_txns.created_at','=','slj_deposits.created_at')
            ->select('slj_deposits.*','slj_txns.*')->where('deposit_for','=',$bb)
        ->orderBy('slj_deposits.id','desc')->paginate(50);
        //$branchdeposit=$branchname->credited_balance;
        
       // return view('accounts::branch-paymnets',compact('$data')->with('i', ($request->input('page', 1) - 1) * 20);
    return view('accounts.branch-paymnets',['data'=>$data]);
     
    }
    public function FranchPayments()
    {
           $bb=1;
        $data = \App\Deposits::leftjoin('slj_txns','slj_txns.created_at','=','slj_deposits.created_at')
            ->select('slj_deposits.*','slj_txns.*')->where('deposit_for','=',$bb)
        ->orderBy('slj_deposits.id','desc')->paginate(50);
        return view('accounts.franch-payments',['data'=>$data]);
     
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function paymentStore(Request $request)
    {
        // dd($request->all());

        $ptype = Paymenttype::create($request->all());
        $employeedata=array();
	$id = \Auth::user()->id;
      
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Payment Store ";
     $employeedata['value_of_action']=$employeedata['name'];
     
      \App\Employees_Logs::create($employeedata);
	  
        if($ptype)
        {
            return redirect()->route('paymenttype.index')->withSuccess('Paymenttype created successfully');
        }else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function paymentEdit($id)
    {
        $ptype = Paymenttype::find($id);
        $data = Paymenttype::orderBy('id', 'desc')->paginate(20);
        return view('accounts.paymenttype_list',['paymenttype'=>$ptype, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function paymenttypeUpdate(Request $request, $id)
    {
        
        $input = $request->all();
        $ptype = Paymenttype::find($id);
        $ptype->update($input);
        return redirect()->route('paymenttype.index')
                        ->with('success','Paymenttype updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function paymenttypeDestroy($id)
    {
        $ptype = Paymenttype::find($id);
        $ptype->delete();
        return redirect()->route('paymenttype.index')
                        ->with('success','Paymenttype deleted successfully');

    }

    /**
     * Display a listing of the purchase orders.
     * @return Response
     */
    public function purchaseOrderList(Request $request)
    {
        $data = PurchaseOrder::join('slj_payment_type as pt','pt.id','=','slj_purchase_order.ptype')
        ->select(['slj_purchase_order.*','pt.name as paymenttype'])
        ->orderby("updated_at", "desc")
        ->paginate(300);
        // dd($data);
        return view('accounts.poindex',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 300);
    }

    /**
     * Display a create page of the purchase orders.
     * @return Response
     */
    public function purchaseOrderCreate()
    {
        $paymenttype = Paymenttype::pluck('name','id');
        // dd($paymenttype);
        return view('accounts.pocreate', compact('paymenttype'));
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'ptype' => 'required',
            'from_date' => 'required',
            'end_date' => 'required',
            'amount' => 'required',
            'gst_value' => 'required',
            'gst_amount' => 'required',
            'total_amount' => 'required',
            'address' => 'required',
            'gst_number' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'name' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function purchaseOrderStore(Request $request)
    {
        $request['created_by'] = Auth::user()->id;
        // $invoice_type = $_POST['invoice_type'];
        $request['renew_date'] = $request["from_date"];
        $request['gst_value'] = $request["cgst_value"] + $request["cgst_value"];
        $request['gst_amount'] = $request["cgst_amount"] + $request["sgst_amount"];
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $purchaseOrder = PurchaseOrder::create($request->all());
        if($purchaseOrder)
        {
            // $po_number = 'SLJ'.sprintf("%06d", $purchaseOrder->id);
            // PurchaseOrder::find($purchaseOrder->id)->update(['po_number'=>$po_number]);
            return redirect()->route('po.index')->withSuccess('Purchase Order created successfully');
        }else
        {
            return redirect()->back()->withWaring('There is some issue with create po');
        }

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function purchaseOrderEdit($id)
    {
        $paymenttype = Paymenttype::pluck('name','id');
        $purchaseOrder = PurchaseOrder::find($id);
        return view('accounts.poedit', compact('paymenttype','purchaseOrder'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function purchaseOrderUpdate(Request $request, $id)
    {
        // $input = $request->all();
        $request['renew_date'] = $request["from_date"];
        $request['gst_value'] = $request["cgst_value"] + $request["cgst_value"];
        $request['gst_amount'] = $request["cgst_amount"] + $request["sgst_amount"];

        $request['updated_by'] = Auth::user()->id;
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->update($request->all());
        return redirect()->route('po.index')
                        ->withSuccess('Purchase Order updated successfully');
    }

    public function purchaseOrderDestroy($id)
    {
       $po = PurchaseOrder::find($id);
        $po->delete();
        return redirect()->route('po.index')
                        ->with('success','Purchase Order deleted successfully'); 
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function bankaccountsList()
    {
        $data = BankAccount::orderBy('id', 'desc')->paginate(20);
        return view('accounts.bankaccount_list',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function bankaccountStore(Request $request)
    {
        // dd($request->all());

        $bankaccount = BankAccount::create($request->all());
        if($bankaccount)
        {
            return redirect()->route('bank-accounts.index')->withSuccess('Bank account created successfully');
        }else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function bankaccountEdit($id)
    {
        $bankaccount = BankAccount::find($id);
        $data = BankAccount::orderBy('id', 'desc')->paginate(20);
        return view('accounts.bankaccount_list',['bankaccount'=>$bankaccount, 'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function bankaccountUpdate(Request $request, $id)
    {        
        $input = $request->all();
        $ptype = BankAccount::find($id);
        $ptype->update($input);
        return redirect()->route('bank-accounts.index')
                        ->with('success','Bank Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function bankaccountDestroy($id)
    {
        $ptype = BankAccount::find($id);
        $ptype->delete();
        return redirect()->route('bank-acounts.index')
                        ->with('success','Bank account deleted successfully');

    }

}
