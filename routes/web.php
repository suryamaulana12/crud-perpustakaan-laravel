<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halaman-buku','App\Http\Controllers\bukuController@index')->name('halaman-buku');

Route::get('/tambah-buku','App\Http\Controllers\bukuController@create')->name('tambah-buku');

Route::post('/simpan-buku','App\Http\Controllers\bukuController@store')->name('simpan-buku');

Route::get('/edit-buku/{id}','App\Http\Controllers\bukuController@edit')->name('edit-buku');

Route::post('/update-buku/{id}','App\Http\Controllers\bukuController@update')->name('update-buku');

Route::get('/delete-buku/{id}','App\Http\Controllers\bukuController@destroy')->name('delete-buku');

