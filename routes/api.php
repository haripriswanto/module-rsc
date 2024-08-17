<?php

use App\Http\Controllers\MasterPegawaiController;
use App\Http\Controllers\MasterTimController;
use App\Http\Controllers\TimPegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tim', [MasterTimController::class, 'getData']);
Route::post('/tim', [MasterTimController::class, 'addData']);
Route::get('/pegawai', [MasterPegawaiController::class, 'getData']);
Route::post('/pegawai', [MasterPegawaiController::class, 'addData']);
Route::get('/tim-pegawai', [TimPegawaiController::class, 'getData']);
Route::post('/tim-pegawai', [TimPegawaiController::class, 'addData']);
Route::delete('/tim-pegawai/{id}', [TimPegawaiController::class, 'delete']);
