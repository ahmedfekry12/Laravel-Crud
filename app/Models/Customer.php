<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable =[
        'first_name',
        'last_name',
        'email',
        'phone',
        'file',
        'bank_account',
        'about',
    ];
}
