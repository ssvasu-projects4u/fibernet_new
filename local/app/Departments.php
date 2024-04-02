<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Departments extends Model
{
    
	protected $table = 'slj_departments';
	
	protected $fillable = [
        'department','status'
    ];
	
	
}