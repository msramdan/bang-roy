<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    RoleAndPermissionController,
    DashboardController,
};

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleAndPermissionController::class);
});
Route::resource('settings', App\Http\Controllers\SettingController::class)->middleware('auth')->only(['index', 'edit', 'update']);
