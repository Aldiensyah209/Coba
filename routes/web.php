<?php

use App\Http\Controllers\BajuAdminController;
use App\Http\Controllers\DashboardAdminController;
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
    return view('');
});


//admin dashboard route
Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.index');

// BAJU ADMIN
Route::get('/baju', [BajuAdminController::class, 'index'])->name('baju.index');
