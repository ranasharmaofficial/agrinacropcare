<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KisanLoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile',
        'aadhar',
        'pan',
    ];
}