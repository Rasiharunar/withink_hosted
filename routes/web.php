<?php

use App\Http\Controllers\adminDash;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashViewController;
use App\Http\Controllers\editView;
use App\Http\Controllers\RelayController;
use App\Http\Controllers\RelayViewController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SensorViewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama
Route::get('/', function () {
    return view('landing');
});

Route::get('/esp/simpan/{deviceCode}/{kelembapan}/{volume_tanki}', [SensorController::class, 'simpanSensor']);

Route::get('/esp/get-relay-data-esp/{deviceCode}', [RelayController::class, 'getRelayDataEsp'])->name('get-relay-data-esp');


Route::group(['middleware' => ['auth', 'CheckRole:admin']], function (){
    Route::get('/admin/dashboard', [adminDash::class, 'adminView'])
    ->name('admin.dashboard')
    ->middleware(CheckRole::class);
    Route::get('/admin/edit', [editView::class, 'editView'])
    ->name('admin.edit')
    ->middleware(CheckRole::class);
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
    ->name('admin.destroy'); // Menambahkan rute ini
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});
// Route yang membutuhkan autentikasi
Route::group(['middleware' => ['auth']], function (){

    Route::get('/dashboard', [DashViewController::class, 'dashView'])->name('dashboard');
    Route::get('/relay', [RelayViewController::class, 'relayView'])->name('relay');
    Route::get('/sensor', [SensorViewController::class, 'sensorView'])->name('sensor');

    // Route untuk sensor
    Route::get('/readKelembapan', [SensorController::class, 'readKelembapan']);
    Route::get('/readVolumeTanki', [SensorController::class, 'readVolumeTanki']);
    // Route::get('/simpan/{kelembapan}/{volume_tanki}', [SensorController::class, 'simpanSensor']);

    // Route untuk kontrol relay
    Route::post('/control-relay', [RelayController::class, 'controlRelay'])->name('control-relay');
    Route::get('/get-relay-data', [RelayController::class, 'getRelayData'])->name('get-relay-data');
    Route::get('/readRelay1', [RelayController::class, 'readRelay1']);
    Route::get('/readRelay2', [RelayController::class, 'readRelay2']);

    // Route untuk profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk autentikasi
require __DIR__.'/auth.php';
