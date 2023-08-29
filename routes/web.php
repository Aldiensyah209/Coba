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
// Route::get('/baju', [BajuAdminController::class, 'index'])->name('baju');
Route::get('/celana', [CelanaAdminController::class, 'index'])->name('celana');
Route::get('/aksesoris', [AksesorisAdminController::class, 'index'])->name('aksesoris');

Route::get('/baju', [BajuAdminController::class, 'index'])->name('baju.index');
Route::get('/baju/create', [BajuAdminController::class, 'create'])->name('baju.create');
Route::post('/baju', [BajuAdminController::class, 'store'])->name('baju.store');
Route::get('/baju/{id}/edit', [BajuAdminController::class, 'edit'])->name('baju.edit');
Route::put('/baju/{id}', [BajuAdminController::class, 'update'])->name('baju.update');
Route::delete('/baju/{id}', [BajuAdminController::class, 'destroy'])->name('baju.destroy');
