<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use \App\Traits\ClearsFrontendCache;
    use HasFactory;

    protected $guarded = [];

    public function faqs()
    {
        return $this->hasMany(Faq::class)->where('active_status', 1)->orderBy('id');
    }
}


