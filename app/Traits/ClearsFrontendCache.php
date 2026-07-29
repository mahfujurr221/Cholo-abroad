<?php

namespace App\Traits;

trait ClearsFrontendCache
{
    /**
     * Boot the trait to listen for model events.
     */
    public static function bootClearsFrontendCache()
    {
        static::saved(function ($model) {
            if (function_exists('clear_frontend_cache')) {
                clear_frontend_cache();
            }
        });

        static::deleted(function ($model) {
            if (function_exists('clear_frontend_cache')) {
                clear_frontend_cache();
            }
        });
    }
}
