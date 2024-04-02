<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class StoreItemsSales extends Model {

	protected $table = 'slj_Items_sales';

	protected $fillable = [
    
    'itemname',
    'distributor',
    'branch',
    'brand',
    'modelno',
    'serial_no', 
    'customer_name',
    'price'
    
    
  ];

}