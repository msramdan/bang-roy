<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    RoleAndPermissionController,
    WilayahController,
    InstanceController,
    TelegramBotController,
    ParsedController,
    DashboardController
};

Route::controller(TelegramBotController::class)->group(function () {
    Route::get('/updated-activity', 'updatedActivity');
    Route::post('/storeMessage', 'storeMessage');
});

Route::get('kota/{provinsiId}', [WilayahController::class, 'kota'])->name('api.kota');
Route::get('kecamatan/{kotaId}', [WilayahController::class, 'kecamatan'])->name('api.kecamatan');
Route::get('kelurahan/{kecamatanId}', [WilayahController::class, 'kelurahan'])->name('api.kelurahan');
Route::get('cluster/{instance_id}', [InstanceController::class, 'get_cluster'])->name('api.cluster');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleAndPermissionController::class);
});
Route::controller(CallbackController::class)->group(function () {
    Route::post('/callback/gateway/uplink', 'index')->name('callback.index');
});

Route::resource('gateways', App\Http\Controllers\GatewayController::class)->middleware('auth')->only(['index']);
Route::resource('rawdatas', App\Http\Controllers\RawdataController::class)->middleware('auth')->only(['index']);
Route::resource('subnets', App\Http\Controllers\SubnetController::class)->middleware('auth');
Route::resource('tickets', App\Http\Controllers\TicketController::class)->middleware('auth');
Route::resource('settings', App\Http\Controllers\SettingController::class)->middleware('auth')->only(['index', 'edit', 'update']);
Route::resource('rawdatas', App\Http\Controllers\RawdataController::class)->middleware('auth');
Route::resource('provinces', App\Http\Controllers\ProvinceController::class)->middleware('auth');
Route::resource('kabkots', App\Http\Controllers\KabkotController::class)->middleware('auth');
Route::resource('kecamatans', App\Http\Controllers\KecamatanController::class)->middleware('auth');
Route::resource('kelurahans', App\Http\Controllers\KelurahanController::class)->middleware('auth');
Route::resource('instances', App\Http\Controllers\InstanceController::class)->middleware('auth');
Route::resource('parseds', App\Http\Controllers\ParsedController::class)->middleware('auth');
Route::controller(ParsedController::class)->group(function () {
    Route::post('/parseds/import_excel', 'import_excel')->name('parseds.import');
});

Route::resource('maintenances', App\Http\Controllers\MaintenanceController::class)->middleware('auth');
Route::resource('clusters', App\Http\Controllers\ClusterController::class)->middleware('auth');
Route::resource('devices', App\Http\Controllers\DeviceController::class)->middleware('auth');
Route::resource('latest-datas', App\Http\Controllers\LatestDataController::class)->middleware('auth');
