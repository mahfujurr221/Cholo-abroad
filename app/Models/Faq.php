<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use \App\Traits\ClearsFrontendCache;
    use HasFactory;

    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeGlobal($query)
    {
        return $query->whereNull('country_id');
    }

    public function scopeForCountry($query, $countryId)
    {
        return $query->where('country_id', $countryId);
    }
}



