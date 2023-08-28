<?php

use App\Http\Controllers\AksesorisAdminController;
use App\Http\Controllers\BajuAdminController;
use App\Http\Controllers\CelanaAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\LoginAdminController;
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
Route::get('/admin', [LoginAdminController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
Route::get('/baju', [BajuAdminController::class, 'index'])->name('baju');
Route::get('/celana', [CelanaAdminController::class, 'index'])->name('celana');
Route::get('/aksesoris', [AksesorisAdminController::class, 'index'])->name('aksesoris');
