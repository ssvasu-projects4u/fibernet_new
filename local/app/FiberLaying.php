<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class FiberLaying extends Model
{
    
	protected $table = 'slj_fiber_laying';
	
	protected $fillable = [
        'city',
		'distributor',
        'branch',
		'franchise',
		'fiber_to',
		'fiber_name',
		'fiber_company_name',
		'fiber_code',
		'fiber_core',
		'fiber_color',
		'route_description',
		'fiber_starting_reading',
		'fiber_starting_long_lat',
		'fiber_ending_reading',
		'fiber_laying_fiber_distance',
		'ending_long_lat',
		'user_id'
	];

    public function scopeFilter($query, $params)
    {
        if ( isset($params['fiber_to']) && trim($params['fiber_to'] !== '')) {
            $query->where($this->table.'.fiber_to', '=', trim($params['fiber_to']));
		}

        if ( isset($params['city']) && trim($params['city'] !== '') ) {
            $query->where($this->table.'.city', '=', trim($params['city']));
		}

        if ( isset($params['distributor']) && trim($params['distributor'] !== '') ) {
            $query->where($this->table.'.distributor', '=', trim($params['distributor']));
		}

        if ( isset($params['branch']) && trim($params['branch'] !== '') ) {
            $query->where($this->table.'.branch', '=', trim($params['branch']));
		}

        if ( isset($params['franchise']) && trim($params['franchise'] !== '') ) {
            $query->where($this->table.'.franchise', '=', trim($params['franchise']));
		}

        return $query;
    }
}