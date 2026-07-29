<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::name('frontend.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/about', 'about')->name('about');
        Route::get('/services', 'services')->name('services');
        Route::get('/countries', 'countries')->name('countries');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/contact', 'contact')->name('contact');
        
        // Application Form
        Route::get('/apply', 'apply')->name('apply');
        Route::post('/apply', 'submitApply')->name('apply.submit');
    });
});
