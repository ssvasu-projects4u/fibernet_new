<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    
	protected $table = 'slj_products';
	
	protected $fillable = [
        'name','category','sub_category', 'unit', 'sku','description','status','fiber_core','product_photo'
    ];
	
	
}