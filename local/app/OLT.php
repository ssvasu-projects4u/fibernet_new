<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class OLT extends Model
{
    
	protected $table = 'slj_olt';
	
	protected $fillable = [
        'city',
        'distributor',
		'subdistributor',
		'branch',	
		'olt_model',
		'olt_serial_number',
		'olt_port',
		'company_name',
		'olt_ip_address',
		'username',
		'password'
		
    ];
	
}