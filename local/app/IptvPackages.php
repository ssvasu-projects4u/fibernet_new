<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class IptvPackages extends Model
{
    
	protected $table = 'slj_iptv_packages';
	
	protected $fillable = [
        'package_name',
		'channels_description',
		'type',
		'price',
		'gst',
		'total_amount',
		'distributor_share',
		'franchise_share',
		'status'
    ];
	
}