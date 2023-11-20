<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    RoleAndPermissionController,
    DashboardController,
    WebController,
};


Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('website');
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