<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class BroadbandPackages extends Model
{
    
	protected $table = 'slj_broadband_packages';
	
	protected $fillable = [
        'package_name',
		'download_speed',
		'upload_speed',
		'package_type',

		'package_data_type',
		'fup_limit',
		'fup_calculation_type',
		'fallback_plan',
		
		'carry_remaining_data',
		'split_fup',
		'limit_online_time',
		'online_time_perday',

		
		'billing_type',
		'billing_mode',
		'status',
		'self_care_portal',


		'service_tax',
		'service_tax_type',
		'expiry_date_change_mode',
		'enable_brust',

		'brust_download',
		'brust_upload',
		'brust_threshold_download',
		'burst_threshold_upload',


		'brust_download_time',
		'brust_upload_time',
		'priority',
		'custom_attributes',
		'your_comments'


    ];
	
}