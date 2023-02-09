<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    RoleAndPermissionController
};

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/', fn () => view('dashboard'));
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleAndPermissionController::class);
});

Route::resource('gateways', App\Http\Controllers\GatewayController::class)->middleware('auth')->only(['index']);
Route::resource('rawdatas', App\Http\Controllers\RawdataController::class)->middleware('auth')->only(['index']);

Route::resource('subnets', App\Http\Controllers\SubnetController::class)->middleware('auth');
Route::resource('devices', App\Http\Controllers\DeviceController::class)->middleware('auth');
Route::resource('tickets', App\Http\Controllers\TicketController::class)->middleware('auth');
Route::resource('settings', App\Http\Controllers\SettingController::class)->middleware('auth')->only(['index','edit','update']);
