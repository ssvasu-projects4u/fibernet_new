<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Designations extends Model
{
    
	protected $table = 'slj_designations';
	
	protected $fillable = [
        'department',
		'designation',
		'status'
    ];
	
	
}