<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class EmailVerification extends Model
{
    
	protected $table = 'slj_emailverification';
	
	protected $fillable = [
	    'email',
	    'cust_id',
	    'token',
        'status',
        'chkemail'
	
    ];
	
}