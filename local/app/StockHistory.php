<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class StockHistory extends Model
{
    
	protected $table = 'slj_stock_history';
	
	protected $fillable = [
        'stock_ids', 
        'from_user_type', 
        'from_user_id', 
        'to_user_type', 
        'to_user_id', 
        'description'
    ];
	
	
}