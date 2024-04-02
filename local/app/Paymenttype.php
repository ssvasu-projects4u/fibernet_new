<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
    protected $table = 'slj_payment_type';
	
	protected $fillable = ['name','payment_flow_type'];
}


