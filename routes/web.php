<?php

use App\Http\Controllers\AksesorisAdminController;
use App\Http\Controllers\BajuAdminController;
use App\Http\Controllers\BintangKonveksiAdminController;
use App\Http\Controllers\CelanaAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\XuzuAdminController;
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
    return view('index');
})->name('utama');


// Admin Route
Route::get('/admin', [LoginAdminController::class, 'index'])->name('admin');
Route::post('/login', [LoginAdminController::class, 'authenticate'])->name('login');
Route::get('/logout', [LoginAdminController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard')->middleware('auth');;

Route::get('/xuzu', [XuzuAdminController::class, 'index'])->name('xuzu.index')->middleware('auth');;
Route::get('/xuzu/{id}', [XuzuAdminController::class, 'getById'])->name('xuzu.id');
Route::post('/xuzu/create', [XuzuAdminController::class, 'store'])->name('xuzu.store');
Route::put('/xuzu/update/{id}', [XuzuAdminController::class, 'update'])->name('xuzu.update');
Route::delete('/xuzu/delete/{id}', [XuzuAdminController::class, 'destroy'])->name('xuzu.destroy');

Route::get('/bintang-konveksi', [BintangKonveksiAdminController::class, 'index'])->name('bk.index')->middleware('auth');;
Route::get('/bintang-konveksi/{id}', [BintangKonveksiAdminController::class, 'getById'])->name('bk.id');
Route::post('/bintang-konveksi/create', [BintangKonveksiAdminController::class, 'store'])->name('bk.store');
Route::put('/bintang-konveksi/update/{id}', [BintangKonveksiAdminController::class, 'update'])->name('bk.update');
Route::delete('/bintang-konveksi/delete/{id}', [BintangKonveksiAdminController::class, 'destroy'])->name('bk.destroy');

