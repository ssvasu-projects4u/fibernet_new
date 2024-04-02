<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\PurchaseOrder;
use App\Invoices;
use Carbon\Carbon;
use PDF;
use App\Paymenttype;
use App\Transactions;
use App;
use Mail;
use App\Mail\SljFiberMail;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create invoice.
     * @return Response
     */
    public function generateInvoice(Request $request, $purchaseOrder)
    {
        // purchaseOrder
        $purchaseOrder = PurchaseOrder::findOrFail($purchaseOrder);
        $invoiceData = $purchaseOrder->toArray();
        $invoice_type = $purchaseOrder->invoice_type;
        // dd($invoice_type);
        if ($invoice_type != "") {
            $datetime = "";
            $invoiceFromDate = "";
            $renew_date = "";
            // $datetime = new Carbon('2016-01-23 11:53:20');
            if (!is_null($purchaseOrder->end_date)) {
              $end_date = new Carbon($purchaseOrder->end_date);
            } else {
               return redirect()->back()->withErrors(['End date not found']);
            }

            if (!is_null($purchaseOrder->renew_date)) {
                // invoice from date
                $datetime = new Carbon($purchaseOrder->renew_date);
                $invoiceFromDate = $purchaseOrder->renew_date;
            }
            // else if (!is_null($purchaseOrder->from_date)) {
            //     $datetime = new Carbon($purchaseOrder->from_date);
            // }
            else {
                return redirect()->back()->withErrors(['Renew date not found']);
                // // throw error 
                // Session::flash('error', "payment flow type inward required");
                // return redirect('admin/accounts/paymenttype')->with('error', 'payment flow type inward required');
            }
            // dd($datetime);
            // 2021-04-07
            // dd($end_date);
            // renew date should be less than the end date
            if ($datetime >= $end_date) {
                // $interval = $datetime->diff($end_date);
                // $days = $interval->format('%a');//now do whatever you like with $days
                // dd($days);
                return redirect()->back()->withErrors(['Invoice Renew date is greater than or equal to end date']);
            }
            $invoiceData["from_date"] = $invoiceFromDate;
                // $datetime = Carbon::now();
            switch ($invoice_type) {
                case 'monthly':
                    // renewe date greater than end date
                    if ($datetime->diff($end_date)->days <= 30 ) {
                        $renew_date = $datetime->addDays(30);
                        $invoiceData["end_date"] = $renew_date;
                    } else {
                        $renew_date = $datetime->addDays(30);
                        if ($renew_date->diff($end_date)->days <= 30) {
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * $renew_date->diff($end_date)->days) + $invoiceData["amount"];
                            $renew_date = $end_date;
                            $invoiceData["end_date"] = $renew_date;
                        } else {
                            $invoiceData["end_date"] = $renew_date;
                        }
                    }
                    break;
                case 'quarterly':
                    if ($datetime->diff($end_date)->days <= 90 ) {
                        $renew_date = $datetime->addDays(90);
                        $invoiceData["end_date"] = $renew_date;
                        $invoiceData["amount"] = (($invoiceData["amount"]/30) * 90);
                    } else {
                        $renew_date = $datetime->addDays(90);
                        if ($renew_date->diff($end_date)->days <= 90) {
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * $renew_date->diff($end_date)->days) + $invoiceData["amount"];
                            $renew_date = $end_date;
                            $invoiceData["end_date"] = $renew_date;
                        } else {
                            $invoiceData["end_date"] = $renew_date;
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * 90);
                        }
                    }
                    break;
                case 'half_yearly':
                    if ($datetime->diff($end_date)->days <= 180 ) {
                        $renew_date = $datetime->addDays(180);
                        $invoiceData["end_date"] = $renew_date;
                        $invoiceData["amount"] = (($invoiceData["amount"]/30) * 180);
                    } else {
                        $renew_date = $datetime->addDays(180);
                        if ($renew_date->diff($end_date)->days <= 180) {
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * $renew_date->diff($end_date)->days) + $invoiceData["amount"];
                            $renew_date = $end_date;
                            $invoiceData["end_date"] = $renew_date;
                        } else {
                            $invoiceData["end_date"] = $renew_date;
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * 180);
                        }
                    }
                case 'yearly':
                    if ($datetime->diff($end_date)->days <= 360 ) {
                        $renew_date = $datetime->addDays(360);
                        $invoiceData["end_date"] = $renew_date;
                        $invoiceData["amount"] = (($invoiceData["amount"]/30) * 360);
                        // dd($invoiceData);
                    } else {
                        $renew_date = $datetime->addDays(360);
                        if ($renew_date->diff($end_date)->days <= 360) {
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * $renew_date->diff($end_date)->days) + $invoiceData["amount"];
                            $renew_date = $end_date;
                            $invoiceData["end_date"] = $renew_date;
                        } else {
                            $invoiceData["end_date"] = $renew_date;
                            $invoiceData["amount"] = (($invoiceData["amount"]/30) * 360);
                        }
                    }
                    break;
            }
            $invoiceData["cgst_amount"] = $invoiceData["amount"] * ($invoiceData["cgst_value"] /100);
            $invoiceData["sgst_amount"] = $invoiceData["amount"] * ($invoiceData["sgst_value"] /100);
            $invoiceData["gst_amount"] = $invoiceData["cgst_amount"] + $invoiceData["sgst_amount"];
            $invoiceData["gst_value"] = $invoiceData["cgst_value"] + $invoiceData["sgst_value"];
            $invoiceData["total_amount"] = $invoiceData["amount"] + $invoiceData["gst_amount"];
            $invoiceData["payment_type"] = \App\Paymenttype::findOrFail($purchaseOrder->ptype)->name;
            $invoiceData["payment_mode"] = 'Online';

            $unpaid_invoices_sum = Invoices::where("po_number",
            $purchaseOrder->po_number
          )
        //   ->where("created_to", $invoiceData['created_to'])
              // ->where("paid", "=", 0)
              ->where("cancelled", "=", 0)
              ->where("status", "=", 1)
              ->sum("total_amount");

          // sum of paid invoices
            $paid_invoices_sum = Invoices::where("po_number",
              $purchaseOrder->po_number
            )
        //   ->where("created_to", $invoiceData['created_to'])
              ->where("paid", "=", 1)
              ->where("cancelled", "=", 0)
              ->where("status", "=", 1)
              ->sum("total_amount");

          // sum of deleted invoices
          $deleted_invoices_sum = Invoices::where("po_number",
          $purchaseOrder->po_number
          )
        //    ->where("created_to", $invoiceData['created_to'])
          //   ->where("paid", "=", 1)
          //   ->where("cancelled", "=", 0)
          ->where("status", "=", 0)
          ->sum("total_amount");

          $cancelled_invoices_sum = Invoices::where("po_number",
            // $f_id
            $purchaseOrder->po_number
          )
        //   ->where("created_to", $invoiceData['created_to'])
              // ->where("paid", "=", 1)
              ->where("cancelled", "=", 1)
              // ->where("status", "=", 1)
              ->sum("total_amount");
            $invoiceData["current_balance"] =  (floatval($unpaid_invoices_sum) +  floatval($invoiceData["total_amount"]))  - (floatval($paid_invoices_sum) + floatval($deleted_invoices_sum) + floatval($cancelled_invoices_sum));

            // $invoiceData["invoice_number"] = "IN" . $invoiceData['po_number'] . $invoiceData["invoice_created"]++;
            Invoices::create($invoiceData);

            $invoiceCreateComplete = 0;
            if ($renew_date->equalTo($end_date) == true) {
              $invoiceCreateComplete = '1';
            }

            $purchaseOrder->renew_date = $renew_date;
            $purchaseOrder->invoice_created = $invoiceData["invoice_created"]++;
            $purchaseOrder->invoice_create_complete = $invoiceCreateComplete;
            $purchaseOrder->save();

            return redirect()->route('in.generate-invoices')->withSuccess('Invoice generated successfully');
        }
        return redirect('admin/accounts/paymenttype')->with('error', 'invoice type is not found');
    }

    /**
     * Display list of pos to generate invoices.
     * @return Response
     */
    public function generateInvoices(Request $request)
    {
        $data = PurchaseOrder::join('slj_payment_type as pt','pt.id','=','slj_purchase_order.ptype')
        ->select(['slj_purchase_order.*','pt.name as paymenttype'])
        ->whereMonth('renew_date', Carbon::now()->month)
        ->whereMonth('renew_date', '>', 'slj_purchase_order.end_date')
        ->where('slj_purchase_order.payment_flow_type', 'inward')
        ->where('invoice_create_complete', 0)
        ->where('status', 1)
        ->orderby("updated_at", "desc")
        ->paginate(50);

        return view('accounts.ingenerate-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Display a listing of the paid invoices.
     * @return Response
     */
    public function paidInvoices(Request $request)
    {
        $data = Invoices::join('slj_payment_type as pt','pt.id','=','slj_invoices.ptype')
        ->select(['slj_invoices.*','pt.name as paymenttype'])
        // paid = 0 is a unpaid invoices
        ->where("slj_invoices.paid", "=", 1 )
        ->where("slj_invoices.cancelled", "=", 0 )
        ->where('status', '1')
        ->orderby("updated_at", "desc")
        ->paginate(50);

        return view('accounts.inpaid-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);

    }

    /**
     * Display a listing of the unpaid invoices.
     * @return Response
     */
    public function unpaidInvoices(Request $request)
    {
        $data = Invoices::join('slj_payment_type as pt','pt.id','=','slj_invoices.ptype')
        ->select(['slj_invoices.*','pt.name as paymenttype'])
        // paid = 0 is a unpaid invoices
        ->where("slj_invoices.paid_through", "=", NULL)
        ->where("slj_invoices.paid", "=", 0)
        ->where("slj_invoices.cancelled", "=", 0 )
        // active
        ->where('status', '1')
        ->orderby("updated_at", "desc")
        ->paginate(50);

        return view('accounts.inunpaid-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Display a listing of the payInvoiceForm invoices.
     * @return 
     */
    public function payInvoiceForm($invoiceId)
    {
        // $paymenttype = Paymenttype::pluck('name','id');
        $data = Invoices::findorFail($invoiceId);
        // return view('accounts::poedit', compact('paymenttype','invoice'));
        return view('accounts.pay-invoice-form',compact('data'));
    }

    /**
     *  Store pay invoices.
     * @return 
     */
    public function payInvoiceStore(Request $request, $invoiceId)
    {
        $inwardFlowType = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->firstOrFail()->id;
        $txn_data = array();
        $txn_data['txnid'] = "";
        $txn_data['amount'] =  $request->post('total_amount');

        // $txn_data['payment_type'] = 'new';
        // txns to slj system
        $txn_data['payment_flow_type'] = $inwardFlowType;
        // customer user id
        $txn_data['user_id'] = 0;
        // 3 - customer 
        $txn_data['payment_from'] = 3;
        $txn_data['payment_message'] = $request->post('note');
        //$txn_data['customer_id'] = $customer_id;
        $txn_data['payment_mode'] = $request->post('ptype');
        if ($txn_data['payment_mode'] == "cheque") {
            $txn_data['cheque_no'] = $request->post('cheque_no');
            $txn_data['issuing_bank_name'] = $request->post('issuing_bank_name');
            $txn_data['issuing_date'] = $request->post('issuing_date');
            $txn_data['branch'] = $request->post('branch');
        }
        $txn_data['status'] = 'success';

        //Txs
        $txn = Transactions::create($txn_data);

        $invoice = Invoices::findOrFail($invoiceId);

        $unpaid_invoices_sum = Invoices::where("po_number",
        $invoice->po_number
      )
    //   ->where("created_to", $invoiceData['created_to'])
          // ->where("paid", "=", 0)
          ->where("cancelled", "=", 0)
          ->where("status", "=", 1)
          ->sum("total_amount");

      // sum of paid invoices
      $paid_invoices_sum = Invoices::where("po_number",
      $invoice->po_number
      )
    //   ->where("created_to", $invoiceData['created_to'])
          ->where("paid", "=", 1)
          ->where("cancelled", "=", 0)
          ->where("status", "=", 1)
          ->sum("total_amount");

      // sum of deleted invoices
      $deleted_invoices_sum = Invoices::where("po_number",
      $invoice->po_number
      )
    //    ->where("created_to", $invoiceData['created_to'])
      //   ->where("paid", "=", 1)
      //   ->where("cancelled", "=", 0)
      ->where("status", "=", 0)
      ->sum("total_amount");

      $cancelled_invoices_sum = Invoices::where("po_number",
        // $f_id
        $invoice->po_number
      )
    //   ->where("created_to", $invoiceData['created_to'])
          // ->where("paid", "=", 1)
          ->where("cancelled", "=", 1)
          // ->where("status", "=", 1)
          ->sum("total_amount");

        $invoice->txn_id =  $txn->id;
        if ($request->post('ptype') != "cheque") {
          $invoice->paid =  1;
          $invoice->current_balance =  floatval($unpaid_invoices_sum)  - (floatval($paid_invoices_sum) + floatval($deleted_invoices_sum) + floatval($cancelled_invoices_sum) +   floatval($request->post("paid_amount")));
          $bill_number = Invoices::where("paid", "=", 1)->max('bill_number');

          if ($bill_number == "" ) {
              $bill_number = 1;
          } else {
              $today = Carbon::now();
              if ($today->month == 4 && $today->day == 1) {
                  $bill_number = 1;
              } else {
                  $bill_number++;
              }
          }
          $invoice->bill_number = $bill_number;
        }

        $invoice->note =  $request->post('note');
        $invoice->paid_through = $request->post('ptype');

        // $invoice->reference_number = $request->post('reference_number');
        $invoice->payment_date = Carbon::now();
        $invoice->paid_date = Carbon::now();
        $invoice->paid_amount = floatval($request->post('paid_amount'));

        $invoice->save();

        return redirect('admin/accounts/invoices/unpaid-invoices')
        ->withSuccess("Thank You. Invoice Payment stored.");
    }

    /**
     * Display payment pickup form 
     * @return form
     */
    public function paymentPickupForm($invoiceId)
    {
        // $paymenttype = Paymenttype::pluck('name','id');
        $data = Invoices::findorFail($invoiceId);
        return view('accounts.invoice-payment-pickup-form', compact('data'));
    }

    /**
     * store payment pickup
     * @return form
     */
    public function paymentPickupStore(Request $request, $invoiceId)
    {
        $inwardFlowType = \App\Paymenttype::where('payment_flow_type', 'inward')
            ->select("id")->firstOrFail()->id;
        $txn_data = array();
        $txn_data['txnid'] = "";
        $txn_data['amount'] =  $request->post('total_amount');

        // $txn_data['payment_type'] = 'new';
        // txns to slj system
        $txn_data['payment_flow_type'] = $inwardFlowType;
        // customer user id
        $txn_data['user_id'] = 0;
        // 3 - customer 
        $txn_data['payment_from'] = 3;
        $txn_data['payment_message'] = $request->post('note');
        //$txn_data['customer_id'] = $customer_id;
        $txn_data['payment_mode'] = $request->post('payment_pickup_type');
        if ($txn_data['payment_mode'] == "cheque") {
            $txn_data['cheque_no'] = $request->post('cheque_no');
            $txn_data['issuing_bank_name'] = $request->post('issuing_bank_name');
            $txn_data['issuing_date'] = $request->post('issuing_date');
            $txn_data['branch'] = $request->post('branch');
        }
        $txn_data['status'] = 'success';

        //Txs
        $txn = Transactions::create($txn_data);

        $invoice = Invoices::findOrFail($invoiceId);

        $unpaid_invoices_sum = Invoices::where("po_number",
        $invoice->po_number
      )
    //   ->where("created_to", $invoiceData['created_to'])
          // ->where("paid", "=", 0)
          ->where("cancelled", "=", 0)
          ->where("status", "=", 1)
          ->sum("total_amount");

      // sum of paid invoices
      $paid_invoices_sum = Invoices::where("po_number",
      $invoice->po_number
      )
    //   ->where("created_to", $invoiceData['created_to'])
          ->where("paid", "=", 1)
          ->where("cancelled", "=", 0)
          ->where("status", "=", 1)
          ->sum("total_amount");

      // sum of deleted invoices
      $deleted_invoices_sum = Invoices::where("po_number",
      $invoice->po_number
      )
    //    ->where("created_to", $invoiceData['created_to'])
      //   ->where("paid", "=", 1)
      //   ->where("cancelled", "=", 0)
      ->where("status", "=", 0)
      ->sum("total_amount");

      $cancelled_invoices_sum = Invoices::where("po_number",
        // $f_id
        $invoice->po_number
      )
    //   ->where("created_to", $invoiceData['created_to'])
          // ->where("paid", "=", 1)
          ->where("cancelled", "=", 1)
          // ->where("status", "=", 1)
          ->sum("total_amount");


        $invoice->txn_id = $txn->id;
        $invoice->pay_mode = 'pickup';

        if ($request->post('payment_pickup_type') != "cheque") {
          $invoice->paid =  1;
          $bill_number = Invoices::where("paid", "=", 1)->max('bill_number');

          if ($bill_number == "" ) {
              $bill_number = 1;
          } else {
              $today = Carbon::now();
              if ($today->month == 4 && $today->day == 1) {
                  $bill_number = 1;
              } else {
                  $bill_number++;
              }
          }
          $invoice->bill_number = $bill_number;
          $invoice->current_balance =  floatval($unpaid_invoices_sum)  - (floatval($paid_invoices_sum) + floatval($deleted_invoices_sum) + floatval($cancelled_invoices_sum) +   floatval($request->post("paid_amount")));
        }
        $invoice->note = $request->post('note');
        $invoice->paid_through = $request->post('payment_pickup_type');
        $invoice->paid_amount = floatval($request->post('paid_amount'));
        $invoice->payment_pickup_date = $request->post('payment_pickup_date');
        $invoice->payment_date = Carbon::now();
        $invoice->paid_date = Carbon::now();

        $invoice->save();
        return redirect('admin/accounts/invoices/unpaid-invoices')
        ->withSuccess("Thank You. Invoice Payment stored.");
    }

    /**
     * disable the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function invoiceDestroy($id)
    {
        $invoice = Invoices::findOrFail($id);
        $invoice->status = 0;
        $invoice->save();
        return redirect()->back()->withSuccess('Invoice deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function invoiceCancel($id)
    {
        $invoice = Invoices::findOrFail($id);
        $invoice->cancelled = 1;
        $invoice->save();

        return redirect()->back()->withSuccess('Invoice cancelled successfully');
    }

    /**
     * print the specified resource from storage.
     * @param int $id
     * @return Response
     */
    function printInvoice($id) {
        $data = Invoices::findOrFail($id);
        $franchise_branch = "";
        $user = "";
        $customer = "";
        if (!is_null($data["created_to"]) && $data["created_to"] == 1) {
            $franchise_branch = \App\Branches::findOrFail($data['franchise_branch_id']);
            $user = \App\User::findOrFail($franchise_branch["user_id"]);
        }
        else if (!is_null($data["created_to"]) && $data["created_to"] == 2) {
            $franchise_branch = \App\Franchises::findOrFail($data['franchise_branch_id']);
            $user = \App\User::findOrFail($franchise_branch["user_id"]);
        }
        else if (!is_null($data["created_to"]) && $data["created_to"] == 3) {
            if (!is_null($data['created_for'])) {
                $customer = \App\Customers::findOrFail($data['created_for']);
            }
        }

        // $html = view('po-invoice-template')->render();
        // return view('accounts::bankaccount_list',['bankaccount'=>$bankaccount, 'data'=>$data]);

		// return PDF::load($html)->download();
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('accounts::po-invoice-template', [
            'data' => $data,
            'franchise_branch' => $franchise_branch,
            'user' => $user,
            'customer' => $customer
        ]);
        return $pdf->stream();
    }

    /**
     * download the specified resource from storage.
     * @param int $id
     * @return Response
     */
    function downloadInvoice($id) {
        $data = Invoices::findOrFail($id);
        $franchise_branch = "";
        $user = "";
        $customer = "";
        if (!is_null($data["created_to"]) && $data["created_to"] == 1) {
            $franchise_branch = \App\Branches::findOrFail($data['franchise_branch_id']);
            $user = \App\User::findOrFail($franchise_branch["user_id"]);
        }
        else if (!is_null($data["created_to"]) && $data["created_to"] == 2) {
            $franchise_branch = \App\Franchises::findOrFail($data['franchise_branch_id']);
            $user = \App\User::findOrFail($franchise_branch["user_id"]);
        }
        else if (!is_null($data["created_to"]) && $data["created_to"] == 3) {
            if (!is_null($data['created_for'])) {
                $customer = \App\Customers::findOrFail($data['created_for']);
            }
        }

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('accounts.po-invoice-template', [
            'data' => $data,
            'franchise_branch' => $franchise_branch,
            'user' => $user,
            'customer' => $customer
        ]);

        return $pdf->download('invoice-'.$data->invoice_number.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    // public function invoiceEdit($id)
    // {
    //     // $paymenttype = Paymenttype::pluck('name','id');
    //     $invoice = Invoices::find($id);
    //     // return view('accounts::ioedit', compact('paymenttype','invoice'));
    //     return view('accounts::ioedit', compact('invoice'));
    // }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    // public function invoiceUpdate(Request $request, $id)
    // {
    //     // dd($id);
    //     $validator = $this->validator($request->all());

    //     if ($validator->fails()) {
    //         $this->throwValidationException(
    //             $request, $validator
    //         );
    //     }
    //     $input = $request->all();
    //     $input['updated_by'] = Auth::user()->id;
    //     $invoice = Invoices::find($id);
    //     $invoice->update($input);
    //     return redirect()->route('io.index')
    //                     ->with('success','Invoice updated successfully');
    // }

    /**
     * Display payment pickup form 
     * @return form
     */
    public function sendMailForm($invoiceId)
    {
        // $data = Invoices::findorFail($invoiceId);
        return view('accounts.invoice-send-mail-form', compact('invoiceId'));
    }

    /**
     * Send email the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function invoiceSendEmail(Request $request, $id)
    {
        $data = Invoices::findOrFail($id);

        if ($request->post("email") == "") {
            return redirect()->back()->withErrors(['Email id is not found in the invoice']);
        }

        $recieverEmail =  $request->post("email");
        if (!$data->invoice_number) {
            return redirect()->back()->withErrors(['Invoice Number Not Found']);
        }
        $invoice_number = $data->invoice_number;
        $attachmentPath = public_path('pdf/invoices/invoice-'.$invoice_number.'.pdf');
        $franchise_branch = "";
        $user = "";
        $customer = "";
        if (!is_null($data["created_to"]) && $data["created_to"] == 1) {
            $franchise_branch = \App\Branches::findOrFail($data['franchise_branch_id']);
            $user = \App\User::findOrFail($franchise_branch["user_id"]);
        }
        else if (!is_null($data["created_to"]) && $data["created_to"] == 2) {
            $franchise_branch = \App\Franchises::findOrFail($data['franchise_branch_id']);
            $user = \App\User::findOrFail($franchise_branch["user_id"]);
        }
        else if (!is_null($data["created_to"]) && $data["created_to"] == 3) {
            if (!is_null($data['created_for'])) {
                $customer = \App\Customers::findOrFail($data['created_for']);
            }
        }


        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('accounts::po-invoice-template', [
            'data' => $data,
            'franchise_branch' => $franchise_branch,
            'user' => $user,
            'customer' => $customer
        ]);
        $pdf->save($attachmentPath);

        try {
            $mail_status = Mail::to($recieverEmail)
            ->send(
            new SljFiberMail(
                $attachmentPath,
                'invoice-'.$invoice_number.'.pdf',
                "Invoice for your SLJ FIBER NETWORKS service",
                "Dear Subscriber,

Thanks for availing SLJ FIBER NETWORKS service. Your Internet invoice no ".$invoice_number." is attached with this mail.
You are requested to make payment Immediately
You can make payment/renew online.
Please ignore if already paid
Thanks again for being with us.

With warm wishes,
SLJ FIBER NETWORKS Pvt.Ltd.

Note:
1. This is a system generated email Please do not reply to this email.
2. If you have any queries, Please revert back with your account number mentioned on the bill.
3. Protect Environment and Save Trees. Please print this e-bill only If it's absolutely necessary.
4. Please visit www.sljfibernetworks.com.",
                'invoice-' . $invoice_number
                )
            );
            unlink($attachmentPath);

            //If error from Mail::send
            if($mail_status != null && $mail_status->failures() > 0) {
                //Fail for which email address...
                foreach(Mail::failures as $address) {
                  return redirect()->back()->withErrors(['Email sending failed for this address', Mail::failures]);
                }
            }
        } catch (\Exception $e) {
            print $e->getMessage();
        }
        return redirect()->back()->withSuccess('Mail has sent');
    }

    /**
     * Display a listing of the cancelled invoices.
     * @return Response
     */
    public function cancelledInvoices(Request $request)
    {
        $data = Invoices::join('slj_payment_type as pt','pt.id','=','slj_invoices.ptype')
        ->select(['slj_invoices.*','pt.name as paymenttype'])
        // cancelled
        ->where("slj_invoices.cancelled", "=", 1 )
        ->orderby("slj_invoices.updated_at", "desc")
        ->paginate(50);

        return view('accounts.incancelled-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Display a listing of the deleted invoices.
     * @return Response
     */
    public function deletedInvoices(Request $request)
    {
        $data = Invoices::join('slj_payment_type as pt','pt.id','=','slj_invoices.ptype')
        ->select(['slj_invoices.*','pt.name as paymenttype'])
        // deleted
        ->where('status', '0')
        ->orderby("slj_invoices.updated_at", "desc")
        ->paginate(300);

        return view('accounts.indeleted-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 300);
    }

    /**
     * Display a listing of the cancelled invoices.
     * @return Response
     */
    public function chequeInvoices(Request $request)
    {
        $data = Invoices::join('slj_payment_type as pt','pt.id','=','slj_invoices.ptype')
        ->select(['slj_invoices.*','pt.name as paymenttype'])
        // cancelled
        ->where("slj_invoices.cancelled", "=", 0 )
        ->where("slj_invoices.cheque_status", "=", NULL )
        ->where("slj_invoices.paid_through", "=", 'cheque' )
        ->where("slj_invoices.paid", "=", 0 )
        ->where("slj_invoices.status", "=", 1 )
        ->orderby("slj_invoices.updated_at", "desc")
        ->paginate(50);

        return view('accounts.incheque-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    /**
     * Display cheque update form
     * @return form
     */
    public function chequeUpdateFormInvoices($invoiceId)
    {
        // $data = Invoices::findorFail($invoiceId);
        return view('accounts.invoice-cheque-update-form', compact('invoiceId'));
    }

    /**
     * Display cheque Update Store form
     * @return form
     */
    public function chequeUpdateStoreInvoices(Request $request, $invoiceId)
    {
        $invoice = Invoices::findorFail($invoiceId);
        $chequeUpdate = $request->post('cheque_update');
        $invoice->cheque_status = $chequeUpdate;
        if ($chequeUpdate == "cheque_cleared") {
          $invoice->paid = 1;

          $unpaid_invoices_sum = Invoices::where("po_number",
                $invoice->po_number
            )
      //   ->where("created_to", $invoiceData['created_to'])
            // ->where("paid", "=", 0)
            ->where("cancelled", "=", 0)
            ->where("status", "=", 1)
            ->sum("total_amount");
  
            // sum of paid invoices
            $paid_invoices_sum = Invoices::where("po_number",
                $invoice->po_number
            )
      //   ->where("created_to", $invoiceData['created_to'])
            ->where("paid", "=", 1)
            ->where("cancelled", "=", 0)
            ->where("status", "=", 1)
            ->sum("total_amount");

            // sum of deleted invoices
            $deleted_invoices_sum = Invoices::where("po_number",
                $invoice->po_number
            )
            //    ->where("created_to", $invoiceData['created_to'])
            //   ->where("paid", "=", 1)
            //   ->where("cancelled", "=", 0)
            ->where("status", "=", 0)
            ->sum("total_amount");

            $cancelled_invoices_sum = Invoices::where("po_number",
            // $f_id
                $invoice->po_number
            )
            //   ->where("created_to", $invoiceData['created_to'])
            // ->where("paid", "=", 1)
            ->where("cancelled", "=", 1)
            // ->where("status", "=", 1)
            ->sum("total_amount");

            $bill_number = Invoices::where("paid", "=", 1)->max('bill_number');

            if ($bill_number == "" ) {
                $bill_number = 1;
            } else {
                $today = Carbon::now();
                if ($today->month == 4 && $today->day == 1) {
                    $bill_number = 1;
                } else {
                    $bill_number++;
                }
            }
            $invoice->bill_number = $bill_number;
            $invoice->current_balance =  floatval($unpaid_invoices_sum)  - (floatval($paid_invoices_sum) + floatval($deleted_invoices_sum) + floatval($cancelled_invoices_sum) +   floatval($invoice->paid_amount));
        }
        $invoice->save();

        return redirect()->back()
        ->withSuccess("Thank You. Cheque Status Updated For the Invoice.");
    }

    /**
     * Display a listing of the cancelled invoices.
     * @return Response
     */
    public function chequeBounceInvoices(Request $request)
    {
        $data = Invoices::join('slj_payment_type as pt','pt.id','=','slj_invoices.ptype')
        ->select(['slj_invoices.*','pt.name as paymenttype'])
        // cancelled
        ->where("slj_invoices.cheque_status", "=", "cheque_bounced" )
        ->where("slj_invoices.paid_through", "=", 'cheque' )
        ->where("slj_invoices.paid", "=", 0 )
        ->where("slj_invoices.cancelled", "=", 0 )
        ->where("slj_invoices.status", "=", 1 )
        ->orderby("slj_invoices.updated_at", "desc")
        ->paginate(50);

        return view('accounts.incheque-bounce-invoices',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

}
