<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Competator extends Model
{
    
	protected $table = 'slj_competators';
	
	protected $fillable = [
        'name','conectiontype','status'
    ];
	
	public $timestamps = false;
	
	
}