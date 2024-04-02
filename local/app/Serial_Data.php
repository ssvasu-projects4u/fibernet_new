<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Serial_Data extends Model
{
    
	protected $table = 'splitter_data';
	
	protected $fillable = [
	    'franch',
        'seriatype', 
        'serial_no', 
        'type'
        
        
    ];
	
	
}