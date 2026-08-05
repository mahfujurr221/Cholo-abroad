<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Backend\HeroController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ProcessController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\CtaController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PartnerController;

/*
|--------------------------------------------------------------------------
| Admin / Backend Routes
|--------------------------------------------------------------------------
*/

Route::prefix('back')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /////////////// Roles & Permissions ///////////////
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class)->except(['create', 'show', 'edit']);
    Route::get('roles/permissions/{id}', [RoleController::class, 'addPermissionToRole'])->name('role.permissions');
    Route::put('roles/permissions/{id}', [RoleController::class, 'addPermissionToRoleUpdate'])->name('role-permissions.update');

    /////////////// Users & Profile ///////////////
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile-reset', [ProfileController::class, 'reset'])->name('profile.reset');
    Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');

    /////////////// CMS Modules ///////////////
    Route::resource('heroes', HeroController::class)->except(['show']);
    Route::resource('countries', CountryController::class)->except(['show']);
    Route::get('countries/{id}/faqs', [CountryController::class, 'faqs'])->name('countries.faqs');
    Route::post('countries/{id}/faqs', [CountryController::class, 'faqStore'])->name('countries.faqs.store');
    Route::delete('countries/{id}/faqs/{faqId}', [CountryController::class, 'faqDestroy'])->name('countries.faqs.destroy');
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('processes', ProcessController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::resource('ctas', CtaController::class)->except(['show']);
    Route::resource('about-us', AboutUsController::class)->except(['show']);
    Route::resource('faqs', FaqController::class)->except(['show']);
    Route::resource('partners', PartnerController::class)->except(['show']);
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    
    /////////////// Applications ///////////////
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::put('applications/{id}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');

    /////////////// Settings ///////////////
    Route::resource('settings', SettingController::class)->except(['show', 'edit', 'create', 'destroy']);
});
