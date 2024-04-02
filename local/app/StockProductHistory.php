<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class StockProductHistory extends Model
{
    
	protected $table = 'slj_stock_product_history';
	
	protected $fillable = [
        'stock_id', 
        'description'
    ];
	
	
}