<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class BroadbandSubPackages extends Model
{
    
	protected $table = 'slj_broadband_subpackages';
	
	protected $fillable = [
        'package',
		'sub_plan_name',
		'price',
		'gst',
		'total',
		'time_unit',
		'unit_type',
		'package_selection',
		'distributor_share',
		'franchise_share',
		'short_description',
		'status'
    ];
	
}