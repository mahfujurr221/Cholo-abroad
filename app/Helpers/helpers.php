<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Session;

if (! function_exists('toast')) {
    /**
     * Set a Bootstrap 5 toast message in session
     *
     * @param string $message
     * @param string $type success, danger, warning, info
     */
    function toast(string $message, string $type = 'success')
    {
        Session::flash('message', [
            'text' => $message,
            'type' => $type
        ]);
    }

    function setting()
    {
        return \Illuminate\Support\Facades\Cache::rememberForever('frontend_setting', function () {
            return Setting::first();
        });
    }

    function clear_frontend_cache()
    {
        $keys = [
            'frontend_setting', 'frontend_heroes', 'frontend_countries',
            'frontend_services', 'frontend_processes', 'frontend_testimonials',
            'frontend_cta', 'frontend_about', 'frontend_faqs',
            'frontend_header_countries', 'frontend_apply_countries'
        ];

        foreach ($keys as $key) {
            \Illuminate\Support\Facades\Cache::forget($key);
        }

        // Also flush all full-page HTML caches
        $pageKeys = \Illuminate\Support\Facades\Cache::get('cached_page_urls', []);
        foreach (array_keys($pageKeys) as $pageKey) {
            \Illuminate\Support\Facades\Cache::forget($pageKey);
        }
        \Illuminate\Support\Facades\Cache::forget('cached_page_urls');
    }
}
