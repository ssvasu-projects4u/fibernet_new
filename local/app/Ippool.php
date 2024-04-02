<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Ippool extends Model
{
    
	protected $table = 'ippool';
	

	protected $fillable = [
        'city',
        'distributor',
		'branch',
		'franchise',
		'pool_name',
		'ip_from',
		'ip_to',
		'description',
		'status'
	
    ];
	
	
	
}