<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey   =   'id';
    protected $fillable = [ 
        'student_id',
        'state_id',
        'district_id',
        'block_id',
        'school_name',
        'school_id',
        'name',
        'email',
        'mobile',
        'password',
    ];
}