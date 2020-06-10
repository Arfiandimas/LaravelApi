<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/;

Route::prefix('angkatan')->group(function () {
    Route::post('/store', 'AngkatanController@store');
    Route::delete('/{id}/delete', 'AngkatanController@destroy');
});

Route::prefix('kelas')->group(function () {
    Route::post('/store', 'KelasController@store');
    Route::delete('/{id}/delete', 'KelasController@destroy');
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', 'MahasiswaController@index');
    Route::post('/store', 'MahasiswaController@store');
    Route::put('/{id}/update', 'MahasiswaController@update');
    Route::delete('/{id}/delete', 'MahasiswaController@destroy');
});