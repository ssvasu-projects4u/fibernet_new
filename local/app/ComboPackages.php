<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class ComboPackages extends Model
{
    
	protected $table = 'slj_combo_packages';
	
	protected $fillable = [
        'package_name',
		'broadband_package',
		'connection_type',
		'cable_allacart',
		'cable_packages',
		'cable_base',
		'cable_local',
		'iptv_allacart',
		'iptv_packages',
		'iptv_base',
		'iptv_local',
		'status',
		'your_comments'
    ];
}