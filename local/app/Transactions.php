<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Transactions extends Model
{

	protected $table = 'slj_txns';
	protected $fillable = [
        'txnid',
		'amount',
		'payment_source',
		'payment_type',
		'payment_flow_type',
		'user_id',
		'payment_from',
		'cheque_no',
		'issuing_bank_name',
		'issuing_date',
		'branch',
		'payment_message',
		'payment_mode',
		'status',
		'customer_id',
    ];
	
}