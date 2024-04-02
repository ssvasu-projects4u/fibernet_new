<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class FH extends Model
{
    
	protected $table = 'slj_fh';
	
	protected $fillable = [
        'city',
		'distributor',
        'branch',
		'franchise',
		'fiber',
		'olt_id',
		'dp_num',
		'fiber_color',
		'splitter',
		'splitter_core',
		'dp_port',
		'latitude',
		'longitude',
		'long_lat',
		'distance',
		'generate_fh_id',
		'user_id',
		'termination_box'
    ];
	
}