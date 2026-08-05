<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'preferred_country',
        'highest_education',
        'english_proficiency',
        'notes',
        'is_read',
        'status',
    ];
}


