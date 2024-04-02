<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Ipaddresspool extends Model
{
    
	protected $table = 'ipaddress';
	
	protected $fillable = [
        'customer_id',
        'IpName',
        'Ip_number',
        'status'
    ];
	
	public $timestamps = false;
	
	
}