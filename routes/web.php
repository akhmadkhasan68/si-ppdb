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

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['siswa'])->group(function () {
    Route::get('/isi_formulir', 'IsiFormulirController@index')->name('isi_formulir');
    Route::get('/isi_formulir/1', 'IsiFormulirController@index')->name('isi_formulir');
    Route::get('/isi_formulir/2', 'IsiFormulirController@sekolahAsalView')->name('isi_formulir');
    Route::get('/isi_formulir/3', 'IsiFormulirController@orangTuaView')->name('isi_formulir');
    Route::get('/isi_formulir/4', 'IsiFormulirController@transkripNilaiView')->name('isi_formulir');
    Route::get('/isi_formulir/5', 'IsiFormulirController@dokumenPendukung')->name('isi_formulir');
    Route::get('/isi_formulir/6', 'IsiFormulirController@simpanPermanen')->name('isi_formulir');
});


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/data_pendaftaran', 'Admin\PendaftaranController@index')->name('data_pendaftaran');
    Route::get('/data_pendaftaran/detail/{id}', 'Admin\PendaftaranController@detail')->name('data_pendaftaran');
});

Route::get('/pengumuman', 'PengumumanController@index')->name('pengumuman');

Route::get('/tentang_aplikasi', 'TentangAplikasiController@index')->name('tentang_aplikasi');