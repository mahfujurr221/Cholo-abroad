<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'phone',
        'email',
        'city',
        'preferred_country',
        'visa_type',
        'highest_education',
        'target_intake',
        'notes',
        'status',
    ];
}
