<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class DP extends Model
{
    
	protected $table = 'slj_dp';
	
	protected $fillable = [
        'city',
        'branch',
		'distributor',
		'subdistributor',
		'franchise',
		'olt_id',
		'olt_port_num',
		'fiber',
		'fiber_color',
		'long_lat',
		'latitude',
		'longitude',
		'splitter',
		'generate_dp',
		'distance',
		'user_id',
		'splitter_serialno',
		'enclosure_serialno'
		
		
    ];
	
}