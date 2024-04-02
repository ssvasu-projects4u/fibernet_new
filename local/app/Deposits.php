<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Deposits extends Model
{
    
	protected $table = 'slj_deposits';
	
	protected $fillable = [
                'name',
                'deposit_amount',
		'deposit_type',
		'deposit_date',
		'franchise_branch_id',
		'deposit_for',
		'deposit_desc',
		'order_number'
    ];
	
}
