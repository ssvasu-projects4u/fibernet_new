<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class ProductCategories extends Model
{
    
	protected $table = 'slj_product_categories';
	
	protected $fillable = [
        'name','description','parent','status'
    ];
	
	
}