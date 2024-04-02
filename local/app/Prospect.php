<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Prospect extends Model
{
    
	protected $table = 'prospect';
	
	protected $fillable = [
        'name', 
        'mob', 
        'address', 
        'branch', 
        'intercompany', 
        'cablecompany', 
        'status',
        'followdt',
        'followtime',
        'active',
        'service'
        
    ];
	
	
}