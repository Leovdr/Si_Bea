<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

// Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendaftar', [App\Http\Controllers\HomeController::class, 'pendaftar'])->name('pendaftar');
Route::get('/hasil', [App\Http\Controllers\HomeController::class, 'hasil'])->name('hasil');



Route::get('/TambahProdi', [App\Http\Controllers\HomeController::class, 'prodi'])->name('TambahProdi');
Route::get('/daftar', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::get('/kondisi', [App\Http\Controllers\systemcontroller::class, 'kondisi'])->name('kondisi');

Route::post('/TmbPrd', [App\Http\Controllers\systemcontroller::class, 'store'])->name('prosestambah');
Route::post('/daftarmahasiswa', [App\Http\Controllers\systemcontroller::class, 'daftarmahasiswa'])->name('daftarmahasiswa');
Route::get('/bobot', [App\Http\Controllers\systemcontroller::class, 'kondisi'])->name('bobot');
Route::get('/matriks', [App\Http\Controllers\systemcontroller::class, 'matriks'])->name('matriks');
Route::get('/prefensi', [App\Http\Controllers\systemcontroller::class, 'preferensi'])->name('prefensi');
Route::get('/ranking', [App\Http\Controllers\systemcontroller::class, 'rangking'])->name('ranking');
