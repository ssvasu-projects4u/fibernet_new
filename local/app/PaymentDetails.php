<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class PaymentDetails extends Model
{
    
	protected $table = 'slj_payment_details';
	
	protected $fillable = [
        'txnid',
		'amount',
		'payment_source',
		'payment_from',
		'payment_message',
		'payment_status',
		'user_id',
    ];
	
}