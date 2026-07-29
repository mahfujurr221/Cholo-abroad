<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::name('frontend.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        // Cached GET pages (HTML cached for 30 days, auto-busted on any model update)
        Route::middleware('cache.page')->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/about', 'about')->name('about');
            Route::get('/services', 'services')->name('services');
            Route::get('/countries', 'countries')->name('countries');
            Route::get('/faq', 'faq')->name('faq');
            Route::get('/contact', 'contact')->name('contact');
            Route::get('/apply', 'apply')->name('apply');
        });

        // POST routes — never cached
        Route::post('/contact', 'submitContact')->name('contact.submit');
        Route::post('/apply', 'submitApply')->name('apply.submit');
    });
});
