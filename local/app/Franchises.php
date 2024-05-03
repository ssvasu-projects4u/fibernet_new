<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Franchises extends Model
{
    
	protected $table = 'slj_franchises';
	
	protected $fillable = [
        'user_id',
		'city',
		'branch',
		'franchise_id',
		'distributor_id',
		'subdistributor_id',
		'franchise_name',
		'aadhar',
		'landline',
		'agreement_address',
		'bank_account',
		'bank_holder_name',
		'ifsc_code',
		'bank_branch_name',
		'bank_name',
		'area_description',
		'aadhar_card',
		'pan_card',
		'bank_passbook',
		'status',
                'credited_balance',
                'debited_balance',
                'available_balance',
        'vlan'
    ];
	
}