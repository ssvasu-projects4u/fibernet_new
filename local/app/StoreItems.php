<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class StoreItems extends Model {

	protected $table = 'slj_stock_items';

	protected $fillable = [
    'itemname',
    'brand',
    'modelno',
    'serial_no', 
    'photo',
    'city',
    'distributor',
    'branch',
    'description',
    'category_name',
    'buyingdate',
    'buyingprice',
    'invoice_file',
    'serialnum_file'
    
    
   
    
    
  ];

}