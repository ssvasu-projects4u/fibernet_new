<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Complaints extends Model
{
    
	protected $table = 'slj_complaints';
	
	protected $fillable = [
        'complaint_slno',
		'customerid',
		//'stb_number',
		//'mobile_number',
		//'branch_name',
		'priority',
		'call_from',
		'complaint_type',
		'complaint_sub_type',
		'expected_resolved_by',
		'inprogress_start_at',
		'resolved_at',
		'closed_at',
		'description',
		'status',
		'deleted',
		'created_by',
		'updated_by'
	];
	
}