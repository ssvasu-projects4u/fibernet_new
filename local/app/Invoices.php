<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Invoices extends Model
{
	protected $table = 'slj_invoices';
	protected $fillable = [
	  'invoice_number',
	  'txn_id',
	  'payment_gateway_txn_id',
	  'invoice_type',
	  'payment_flow_type',
	  'ptype',
	  'po_number',
	  'from_date',
	  'end_date',
	  'amount',
	  'gst_value',
	  'gst_amount',
	  'cgst_value',
	  'cgst_amount',
	  'sgst_value',
	  'sgst_amount',
	  'total_amount',
	  'address',
	  'gst_number',
	  'phone',
	  'email',
	  'name',
	  'type',
	  'status',
	  'paid',
	  'department',
	  'assigned_to',
	  'payment_mode',
	  'franchise_branch_id',
	  'current_balance',
	  'created_from',
	  'created_to',
	  'created_by',
	  'created_for',
	  'package',
	  'sub_package',
	  'base_price',
	  'paid_date',
	  'paid_amount',
	  'discount_amount',
	  'renewed_by',
	  'invoice_date',
	  'payment_date',
	  'pay_mode',
	  'reference_number',
	  'paid_through',
	  'note',
	  'payment_pickup_date',
	  'payment_type',
	  'address',
	  'cheque_status',
	  'bill_number'
    ];

}
