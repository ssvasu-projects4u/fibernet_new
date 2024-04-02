<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Poles extends Model
{
    
	protected $table = 'slj_poles';
	
	protected $fillable = [
        'fiber_id',
		'long_lat',
		'loop_meters',
		'pole_series'
    ];
	
}