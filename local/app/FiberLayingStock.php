<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class FiberLayingStock extends Model
{
    
	protected $table = 'slj_fiberlaying_stock';
	
	protected $fillable = [
        'product_name','manufact_year','drum_number','vendors_suppliers','length','start_reading','end_reading','fiber_core'
    ];
	
	public $timestamps = true;
	
	
}