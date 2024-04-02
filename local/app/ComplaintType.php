<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class ComplaintType extends Model
{
    
	protected $table = 'slj_complaint_types';
	
	protected $fillable = [
        'title',
        'connection_type',
		    'description'
    ];
	
}