<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class DPD extends Model
{
    
	protected $table = 'slj_dpd';
	
	protected $fillable = [
        'city',
		'distributor',
        'branch',
		'franchise',
		'fiber',
		'long_lat',
		'user_id',
		'Enclosure'
    ];
	
}