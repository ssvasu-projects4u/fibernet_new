<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Warehouses extends Model
{
    
	protected $table = 'slj_warehouses';
	
	protected $fillable = [
		'city',
		'warehouse_name',
		'address',
		'latitude',
		'longitude',
		'description',
		'status'
	];
	
}