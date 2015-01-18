<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::controller('/booking', 'BookingController');
Route::controller('/login', 'LoginController');
Route::controller('/admin', 'AdminController');
Route::controller('/about', 'AboutController');
Route::controller('/help', 'HelpController');
Route::controller('/promo', 'PromoController');
Route::controller('/customer', 'CustomerController');
Route::controller('/pangkat', 'PangkatController');
Route::controller('/karyawan', 'KaryawanController');

/**
 * Route untuk lapangan
 */

Route::get('/lapangan/detil-harga/{lapanganId}', 'LapanganController@getDetilHarga');
Route::get('/lapangan/set-detil-harga/{lapanganId}/{jamId}', 'LapanganController@setDetilHarga');
Route::get('/lapangan/pemakaian', 'LapanganController@pemakaian');
Route::post('/lapangan/save-detil-harga','LapanganController@saveDetilHarga');
Route::post('/lapangan/update-detil-harga','LapanganController@updateDetilHarga');
Route::resource('/lapangan', 'LapanganController');

/**
 * Route master jam
 */
Route::resource('/jam', 'JamController');

/**
 * Ubah Password
 */
Route::controller('password', 'PasswordController');

//History
Route::controller('history', 'HistoryController');

//Periode Gaji
Route::resource('periode-gaji', 'PeriodeGajiController');

//Generate Gaji
Route::get('generate-gaji/{id}','GenerateGajiController@run');

//view gaji
Route::resource('periode-gaji.gaji','GajiController');