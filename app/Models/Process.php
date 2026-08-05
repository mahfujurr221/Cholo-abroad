<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends Model
{
    use \App\Traits\ClearsFrontendCache;
    use HasFactory;

    protected $fillable = [
        'title',
        'title_bn',
        'description',
        'description_bn',
        'step_number',
        'icon',
        'color',
        'active_status',
        'created_by',
        'updated_by',
    ];

}
