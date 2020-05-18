<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/isi_formulir', 'IsiFormulirController@index')->middleware('siswa')->name('isi_formulir');
Route::get('/isi_formulir/2', 'IsiFormulirController@sekolahAsalView')->middleware('siswa')->name('isi_formulir');
Route::get('/isi_formulir/3', 'IsiFormulirController@orangTuaView')->middleware('siswa')->name('isi_formulir');
Route::get('/isi_formulir/4', 'IsiFormulirController@transkripNilaiView')->middleware('siswa')->name('isi_formulir');
