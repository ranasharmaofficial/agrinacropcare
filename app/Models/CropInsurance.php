<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropInsurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'token_no',
        'employee_id',
        'salutation',
        'name',
        'mobile',
        'gender',
        'dob',
        'address',
        'pincode',
        'state',
        'district',
        'major_crops_insurred',
        'nominee_salutation',
        'nominee_name',
        'nominee_father',
        'nominee_dob',
        'nominee_relation',
        'aadhar_card_pic',
        'farmer_picture',
        'aadhar_no',
        'insurance_start_date',
        'insurance_end_date',
        'plan_details',
        'amount',
        'payment_status',
        'payment_mode',
        'transaction_id',
        'payment_id',
        'receipt_no',
        'payment_mobile',
        'payment_email',
        'payment_card_id',
        'method',
        'wallet',
        'payment_vpa',
        'international_payment',
        'error_reason',
    ];
}