<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Employees extends Model
{
    
	protected $table = 'slj_employees';
	
	protected $fillable = [
        'user_id',
		'city',
		// fahter name
		'f_name_c_name',
		'alt_mobile_num',
		'password',
		'employee_photo',
		'address',
		'joining_date',
		'status',
		'department',
		'designation',
		'role',
		'resume',
		'aadhar_card',
		'id_prrof',
		'pan_card',
		'experience_letter',
		'sslc',
		'puc_diploma_file',
		'under_graduate',
		'post_graduate',
		'resignation_letter',
		'note',
		'resignation_date',
		'distributor',
		'subdistributor',
		'branch',
		'franch'
    ];

    public function scopeFilter($query, $params)
    {
        if ( isset($params['city']) && trim($params['city'] !== '')) {
            $query->where($this->table.'.city', '=', trim($params['city']));
		}

        if ( isset($params['status']) && trim($params['status'] !== '') ) {
            $query->where('users.status', '=', trim($params['status']));
		}

        if ( isset($params['department']) && trim($params['department'] !== '') ) {
            $query->where($this->table.'.department', '=', trim($params['department']));
		}

        if ( isset($params['designation']) && trim($params['designation'] !== '') ) {
            $query->where($this->table.'.designation', '=', trim($params['designation']));
		}

        if ( isset($params['role']) && trim($params['role'] !== '') ) {
            $query->where('roles.id', '=', trim($params['role']));
		}

        return $query;
    }
}