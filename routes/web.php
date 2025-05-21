<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatakuliahController;




Route::get('/', function () {
    return view('index');
});

Route::resource('mahasiswa', MahasiswaController::class);

Route::resource('dosen', DosenController::class);

Route::resource('jurusan', JurusanController::class);

Route::resource('matakuliah', MatakuliahController::class);