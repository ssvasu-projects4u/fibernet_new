<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class EDFA extends Model
{
    
	protected $table = 'slj_edfa';
	
	protected $fillable = [
        'city',
        'branch',
		'distributor',
		'franchise',
		'edfa_serial_number',
		'edfa_ports',
		'edfa_company',
		'edfa_model'
    ];
	
}