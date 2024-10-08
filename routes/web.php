<?php

use App\Http\Controllers\DashViewController;
use App\Http\Controllers\SensorController;

// use App\Http\Controllers\Controller;
// use App\Http\Controllers\MyController;
use App\Http\Controllers\RelayViewController;
use App\Http\Controllers\RelayController;
use App\Http\Controllers\SensorViewController;
use App\Models\Relay;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', [DashViewController::class, 'dashView'])->name('dashboard');
Route::get('/relay', [RelayViewController::class, 'relayView'])->name('relay');
Route::get('/sensor', [SensorViewController::class, 'sensorView'])->name('sensor');


Route::get('/readPln', [SensorController::class, 'readPln']);
Route::get('/readBatt1', [SensorController::class, 'readBatt1']);
Route::get('/readBatt2', [SensorController::class, 'readBatt2']);
Route::get('/readSuhu', [SensorController::class, 'readSuhu']);

Route::get('/simpan/{plnVal}/{batt1Val}/{batt2Val}/{suhuVal}', [SensorController::class, 'simpanSensor']);

Route::post('/control-relay', [RelayController::class, 'controlRelay']);
Route::get('/get-relay-data', [RelayController::class, 'getRelayData']);
Route::get('/readRelay1', [RelayController::class, 'readRelay1']);
Route::get('/readRelay2', [RelayController::class, 'readRelay2']);


