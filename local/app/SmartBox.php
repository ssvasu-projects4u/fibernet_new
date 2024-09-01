<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class SmartBox extends Model
{

	protected $table = 'smart_box';
	protected $fillable = [
		'cas_type',
		'smart_card',
		'box_id',
		'stb_company',
		'stb_model_number',
		'op_id',
		'sub_id',
		'customer_id',
		'package',
		'plan_type',
		'plan',
		'date',
		'api_request',
		'api_response',
		'api_url',
		'created_by',
		'created_at',
		'updated_at',
		'ip_address',
		'first_time_activation_api',
		'first_time_activation_request',
		'first_time_activation_response',
		
    ];
	
}