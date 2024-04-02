<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'slj_purchase_order';

	protected $fillable = ['ptype','po_number','invoice_type','payment_flow_type','renew_date','invoice_created','from_date','end_date','amount','gst_value','gst_amount','cgst_value','cgst_amount','sgst_value','sgst_amount','total_amount','address','gst_number','phone','email','name','type','status','invoice_create_complete','created_by','updated_by'];
}
