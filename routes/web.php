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

Route::get('/halaman-pengarang','App\Http\Controllers\pengarangController@index')->name('halaman-pengarang');

Route::get('/tambah-pengarang','App\Http\Controllers\pengarangController@create')->name('tambah-pengarang');

Route::post('/simpan-pengarang','App\Http\Controllers\pengarangController@store')->name('simpan-pengarang');

Route::get('/edit-pengarang/{id}','App\Http\Controllers\pengarangController@edit')->name('edit-pengarang');

Route::post('/update-pengarang/{id}','App\Http\Controllers\pengarangController@update')->name('update-pengarang');

Route::get('/delete-pengarang/{id}','App\Http\Controllers\pengarangController@destroy')->name('delete-pengarang');

Route::get('/halaman-karya-pengarang','App\Http\Controllers\karyaController@index')->name('halaman-karya-pengarang');

Route::get('/tambah-karya-pengarang','App\Http\Controllers\karyaController@create')->name('tambah-karya-pengarang');

Route::post('/simpan-karya-pengarang','App\Http\Controllers\karyaController@store')->name('simpan-karya-pengarang');

Route::get('/edit-karya-pengarang/{id}','App\Http\Controllers\karyaController@edit')->name('edit-karya-pengarang');

Route::post('/update-karya-pengarang/{id}','App\Http\Controllers\karyaController@update')->name('update-karya-pengarang');

Route::get('/halaman-penerbit','App\Http\Controllers\penerbitController@index')->name('halaman-penerbit');

Route::get('/tambah-penerbit','App\Http\Controllers\penerbitController@create')->name('tambah-penerbit');

Route::post('/simpan-penerbit','App\Http\Controllers\penerbitController@store')->name('simpan-penerbit');

Route::get('/edit-penerbit/{id}','App\Http\Controllers\penerbitController@edit')->name('edit-penerbit');

Route::post('/update-penerbit/{id}','App\Http\Controllers\penerbitController@update')->name('update-penerbit');

Route::get('/delete-penerbit/{id}','App\Http\Controllers\penerbitController@destroy')->name('delete-penerbit');