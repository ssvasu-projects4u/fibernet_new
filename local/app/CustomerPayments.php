<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class CustomerPayments extends Model
{
    
	protected $table = 'customer_payments';
	
	protected $fillable = [
        'customer_id', 
        'city', 
        'distributor', 
        'branch', 
        'franch', 
        'paytype', 
        'payment_mode', 
        'amount', 
        'connection_type', 
        'payment_status', 
        'paid_date', 
        'installation_address',
        'trans_id',
        'invoice_id'
       
    ];
	
}