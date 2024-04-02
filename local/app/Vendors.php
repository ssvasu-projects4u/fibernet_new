<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Vendors extends Model
{
    
	protected $table = 'slj_vendors';
	
	protected $fillable = [
        'company_name',
		'contact_name',
		'email',
		'mobile',
		'landline',
		'address',
		'notes',
		'photo',
		'status',
		'type'
    ];
	
}