<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\App;
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

Route::middleware('hakAkses')->group(function () {
    Route::get('/','App\Http\Controllers\dashboardController@index')->name('/');
    Route::get('/halaman-buku','App\Http\Controllers\bukuController@index')->name('halaman-buku');
    Route::get('/halaman-pengarang','App\Http\Controllers\pengarangController@index')->name('halaman-pengarang');
    Route::get('/halaman-penerbit','App\Http\Controllers\penerbitController@index')->name('halaman-penerbit');
    Route::get('/halaman-anggota','App\Http\Controllers\anggotaController@index')->name('halaman-anggota');
    Route::get('/halaman-petugas','App\Http\Controllers\petugasController@index')->name('halaman-petugas');
    Route::get('/halaman-genre','App\Http\Controllers\genreController@index')->name('halaman-genre');

    // tambah
    Route::get('/tambah-buku','App\Http\Controllers\bukuController@create')->name('tambah-buku');
    Route::get('/tambah-pengarang','App\Http\Controllers\pengarangController@create')->name('tambah-pengarang');
    Route::get('/tambah-penerbit','App\Http\Controllers\penerbitController@create')->name('tambah-penerbit');
    Route::get('/tambah-anggota','App\Http\Controllers\anggotaController@create')->name('tambah-anggota');
    Route::get('/tambah-genre','App\Http\Controllers\genreController@create')->name('tambah-genre');

    // edit
    Route::get('/edit-buku/{id}','App\Http\Controllers\bukuController@edit')->name('edit-buku');
    Route::get('/edit-pengarang/{id}','App\Http\Controllers\pengarangController@edit')->name('edit-pengarang');
    Route::get('/edit-penerbit/{id}','App\Http\Controllers\penerbitController@edit')->name('edit-penerbit');
    Route::get('/edit-anggota/{id}','App\Http\Controllers\anggotaController@edit')->name('edit-anggota');
    Route::get('/edit-genre/{id}','App\Http\Controllers\genreController@edit')->name('edit-genre');
});


// Controller buku



Route::post('/simpan-buku','App\Http\Controllers\bukuController@store')->name('simpan-buku');



Route::put('/update-buku/{id}','App\Http\Controllers\bukuController@update')->name('update-buku');

Route::delete('/delete-buku/{id}','App\Http\Controllers\bukuController@destroy')->name('delete-buku');


// Controller pengarang



Route::post('/simpan-pengarang','App\Http\Controllers\pengarangController@store')->name('simpan-pengarang');


Route::put('/update-pengarang/{id}','App\Http\Controllers\pengarangController@update')->name('update-pengarang');

Route::delete('/delete-pengarang/{id}','App\Http\Controllers\pengarangController@destroy')->name('delete-pengarang');


// controller karya pengarang
Route::get('/halaman-karya-pengarang','App\Http\Controllers\karyaController@index')->name('halaman-karya-pengarang');

Route::get('/tambah-karya-pengarang','App\Http\Controllers\karyaController@create')->name('tambah-karya-pengarang');

Route::post('/simpan-karya-pengarang','App\Http\Controllers\karyaController@store')->name('simpan-karya-pengarang');

Route::get('/edit-karya-pengarang/{id}','App\Http\Controllers\karyaController@edit')->name('edit-karya-pengarang');

Route::post('/update-karya-pengarang/{id}','App\Http\Controllers\karyaController@update')->name('update-karya-pengarang');


// controller penerbit


Route::post('/simpan-penerbit','App\Http\Controllers\penerbitController@store')->name('simpan-penerbit');



Route::put('/update-penerbit/{id}','App\Http\Controllers\penerbitController@update')->name('update-penerbit');

Route::delete('/delete-penerbit/{id}','App\Http\Controllers\penerbitController@destroy')->name('delete-penerbit');


// controller anggota



Route::post('/simpan-anggota','App\Http\Controllers\anggotaController@store')->name('simpan-anggota');



Route::put('/update-anggota/{id}','App\Http\Controllers\anggotaController@update')->name('update-anggota');

Route::delete('/delete-anggota/{id}','App\Http\Controllers\anggotaController@destroy')->name('delete-anggota');

Route::resource('/anggota', App\Http\Controllers\anggotaController::class);




// controller login and register
Route::get('/login', [loginController::class, 'login'])->name('login');

Route::post('/loginUser', [loginController::class, 'loginUser'])->name('loginUser');

Route::get('/register', [loginController::class, 'register'])->name('register');

Route::post('/registerUser', [loginController::class, 'registerUser'])->name('registerUser');

Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/reset', [loginController::class, 'reset'])->name('reset');

Route::post('/resetUser', [loginController::class, 'resetUser'])->name('resetUser');



// controller petugas

Route::delete('/delete-petugas/{id}','App\Http\Controllers\petugasController@destroy')->name('delete-petugas');



// controller genre



Route::post('/simpan-genre','App\Http\Controllers\genreController@store')->name('simpan-genre');


Route::put('/update-genre/{id}','App\Http\Controllers\genreController@update')->name('update-genre');

Route::delete('/delete-genre/{id}','App\Http\Controllers\genreController@destroy')->name('delete-genre');



