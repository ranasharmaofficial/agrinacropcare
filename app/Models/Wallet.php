<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $primaryKey   =   'id';
    protected $fillable = [ 
        'amount',
        'work_id',
        'employee_id',
        'transaction_no',
        'cr_dr',
        'paid_by',
        
    ];
}
