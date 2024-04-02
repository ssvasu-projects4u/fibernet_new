<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class OLTPorts extends Model
{
    
	protected $table = 'slj_olt_ports';
	
	protected $fillable = [
        'olt_id',
        'olt_port',
		'franchise_id'
	];
	
}