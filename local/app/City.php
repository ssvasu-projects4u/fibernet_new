<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    
	protected $table = 'slj_cities';
	
	protected $fillable = [
        'name','status'
    ];
	
	public $timestamps = false;
	
	
}