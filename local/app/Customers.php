<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
config(['app.timezone' => 'Asia/Kolkata']);

class Customers extends Model
{
    
	protected $table = 'slj_customers';
	
	protected $fillable = [
        'id', 
        'city', 
		'distributor',
        'branch', 
        'franchise', 
        'user_id', 
        'f_name_c_name', 
        'caf_no', 
        'gstin', 
        'alt_mobile_num', 
        'address_proof', 
        'identity_proof', 
        'customer_pic', 
        'connection_type', 
        'package', 
        'sub_package', 
		'combo_package',
		'combo_local',
		'combo_base',
		'combo_allacart',
        'combo_sub_package', 
        'cable_allacart',
        'cable_packages',
		'cable_local',
		'cable_base',
		'iptv_allacart',
        'iptv_packages',
		'iptv_base',
		'iptv_local',
        'installation_amount', 
        'secure_deposite_amount', 
        'setup_box_amount', 
		'androidbox_security_deposit',
        'discount_reason', 
        'discount_amount', 
        'discount_approved', 
        'discount_comments', 
        'additional_reason', 
        'additional_amount', 
        'additional_approved', 
        'additional_comments', 
        'billing_address', 
        'landmark', 
        'installation_address', 
        'pincode', 
        'olt', 
        'dp', 
        'fh', 
        'fh_port', 
        'fh_color', 
        'fiber_length', 
        'stb_num', 
        'stb_model', 
        'stb_company', 
        'long_lat', 
        'technical_details_status', 
        'technical_details_c_date', 
        'renew_accept', 
        'renewal_cycle', 
        'schedule_date', 
        'expiry_date', 
        'active_discount', 
        'department', 
        'invoice_comment', 
        'active_updated_date',
        'status',
        'current_status',
        'eid',
        'ucreateddt',
        'date_of_birth',
        'state',
        'address_proof_no'
        
    ];
	
}