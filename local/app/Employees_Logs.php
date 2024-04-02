<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Employees_Logs extends Model
{
    
	protected $table = 'slj_logs';
	
	protected $fillable = [
        'employee_id','action_name','value_of_action'
    ];
	
	
	
}