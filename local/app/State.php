<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class State extends Model
{
    
	protected $table = 'slj_states';
	
	protected $fillable = [
        'name','status'
    ];
	
	public $timestamps = false;
	
	
}