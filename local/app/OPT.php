<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// Online payment transaction tracking 
class OPT extends Model
{

	protected $table = 'slj_opt';

	protected $fillable = [
		"payment_status",
		"attempt_type",
		"gateway",
		"order_no",
		"invoice_no",
		"transaction_id",
		"user_name",
		"customer_name",
		"franchise_name",
		"branch",
		"mobile",
		"package_name",
		"sub_package",
		"duration",
		"invoice_amount",
		"paid_amount",
		"bank_transaction_id",
		"bank_name",
		"created_at",
		"updated_at",
    ];
}