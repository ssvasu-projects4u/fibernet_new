<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class ConnectionType extends Model
{
    
	protected $table = 'slj_connection_types';
	
	protected $fillable = [
        'title',
        'installation_amount',
		'olt_security_deposit',
		'setupbox_amount',
		'ont_security_deposit',
		'rental_amount',
    ];
	
}