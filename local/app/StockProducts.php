<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class StockProducts extends Model {

	protected $table = 'slj_stock_products';

	protected $fillable = [
    'product',
    'vendor',
    'type',
    'notes',
    'serial_no', 
    'identification',
    'manufacturer',
    'brand', 
    'warranty',
    'warranty_date',
    'buy_price',
    'selling_price',
    'barcode',
    'status',
    'current_user_type',
    'current_user_id',
    'transferred_from',
    'transferred_user_type',
    'warehouse_status',
    'distributor_status',
    'branch_status',
    'employee_status',
    'franchise_status',
    'customer_id',
    'manufacture_year',
    'drum_number',
    'price_per_meter',
    'length',
    'start_reading',
    'end_reading',
    'dummy_startreading',
    'dummy_endreading',
    'assign_status'
    
  ];

}