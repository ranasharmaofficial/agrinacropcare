<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropInsuranceProcess extends Model
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
        'tenure',
        'total_sum_insurred',
        'gross_premium',
        'nominee_salutation',
        'nominee_name',
        'nominee_father',
        'nominee_dob',
        'nominee_relation',
        'aadhar_card_pic',
        'insurance_start_date',
        'insurance_end_date',
        'plan_details',
    ];
}