<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use \App\Traits\ClearsFrontendCache;
    use HasFactory;

    protected $guarded = [];

}




