<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Branches extends Model
{
    
	protected $table = 'slj_branches';
	
	protected $fillable = [
        'city',
		'branch_name',
		'office_address',
		'long_lat',
		'rent',
		'distributor_id',
		'subdistributor_id',
		'user_id',
		'branch_id',
                'credited_balance',
                'debited_balance',
                'available_balance'
    ];
	
}