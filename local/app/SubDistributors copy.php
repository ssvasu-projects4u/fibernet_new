<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class SubDistributors extends Model
{
    
	protected $table = 'slj_distributors';
	
	protected $fillable = [
        'city',
		'distributer_id',
		'distributor_name',
		'office_address',
		'long_lat',
		'rent',
		'user_id',
		'distributor_id',
		'area_description',
		'bank_account',
		'bank_holder_name',
		'ifsc_code',
		'bank_branch_name',
		'bank_name',
    ];
	
}