<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallbackController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    RoleAndPermissionController,
    DashboardController,
    WebController,
};



Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link berhasil dibuat!';
});


Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('website');
    Route::get('/web-team', 'team')->name('web-team');
    Route::get('/web-company', 'company')->name('web-company');
    Route::get('/web-certificates', 'certificates')->name('web-certificates');
    Route::get('/web-service', 'service')->name('web-service');
    Route::get('/web-catalog', 'catalog')->name('web-catalog');
    Route::get('/web-portfolio', 'portfolio')->name('web-portfolio');
    Route::get('/web-contact', 'contact')->name('web-contact');
    Route::post('/web-submit-contact', 'submitContact')->name('web-submit-contact');
});

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleAndPermissionController::class);
});
Route::resource('settings', App\Http\Controllers\SettingController::class)->middleware('auth')->only(['index', 'edit', 'update']);
Route::resource('contacts', App\Http\Controllers\ContactController::class)->middleware('auth');
Route::resource('vms', App\Http\Controllers\VmController::class)->middleware('auth');
Route::resource('companies', App\Http\Controllers\CompanyController::class)->middleware('auth');
Route::resource('certificates', App\Http\Controllers\CertificateController::class)->middleware('auth');
Route::resource('socials', App\Http\Controllers\SocialController::class)->middleware('auth');
Route::resource('clients', App\Http\Controllers\ClientController::class)->middleware('auth');
Route::resource('teams', App\Http\Controllers\TeamController::class)->middleware('auth');

Route::resource('banners', App\Http\Controllers\BannerController::class)->middleware('auth');
Route::resource('testimonies', App\Http\Controllers\TestimonyController::class)->middleware('auth');

Route::resource('businesses', App\Http\Controllers\BusinessController::class)->middleware('auth');
Route::resource('portfolios', App\Http\Controllers\PortfolioController::class)->middleware('auth');
