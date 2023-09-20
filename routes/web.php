<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\LandingPage\AboutAdminController;
use App\Http\Controllers\Admin\LandingPage\HomeAdminController;
use App\Http\Controllers\Admin\LandingPage\SmartBuyAdminController;
use App\Http\Controllers\Admin\LandingPage\TestimoniAdminController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\Product\XuzuAdminController;
use App\Http\Controllers\Admin\Product\BintangKonveksiAdminController;
use App\Http\Controllers\HomeController;
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

// WEB UTAMA
Route::get('/', [HomeController::class, 'index'])->name('utama');

// ADMIN ROUTE
Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

Route::controller(XuzuAdminController::class)->group(function () {
    Route::get('xuzu', 'index')->name('xuzu.index');
    Route::get('xuzu/{id}', 'getById')->name('xuzu.id');
    Route::post('xuzu/create', 'store')->name('xuzu.store');
    Route::put('xuzu/update/{id}', 'update')->name('xuzu.update');
    Route::delete('xuzu/delete/{id}', 'destroy')->name('xuzu.destroy');
});

Route::controller(BintangKonveksiAdminController::class)->group(function () {
    Route::get('bintang-konveksi', 'index')->name('bk.index');
    Route::get('bintang-konveksi/{id}', 'getById')->name('bk.id');
    Route::post('bintang-konveksi/create', 'store')->name('bk.store');
    Route::put('bintang-konveksi/update/{id}', 'update')->name('bk.update');
    Route::delete('bintang-konveksi/delete/{id}', 'destroy')->name('bk.destroy');
});

// AUTH
Route::controller(LoginAdminController::class)->group(function () {
    Route::get('admin', 'index')->name('admin')->middleware('isLogin');
    Route::post('login', 'authenticate')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(HomeAdminController::class)->group(function () {
    Route::get('home', 'index')->name('homeAdmin.index');
    Route::get('home-content/{id}', 'getByIdKonten')->name('homeContent.id');
    Route::post('home-content/create', 'storeKonten')->name('homeContent.store');
    Route::put('home-content/update/{id}', 'updateKonten')->name('homeContent.update');
    Route::delete('home-content/delete/{id}', 'destroyKonten')->name('homeContent.destroy');
    Route::post('homeImage/create', 'storeGambar')->name('homeImage.store');
    Route::delete('homeImage/delete/{id}', 'destroyGambar')->name('homeImage.destroy');
});

Route::controller(AboutAdminController::class)->group(function () {
    Route::get('about', 'index')->name('aboutAdmin.index');
    Route::get('about/{id}', 'getById')->name('aboutAdmin.id');
    Route::post('about/create', 'store')->name('aboutAdmin.store');
    Route::put('about/update/{id}', 'update')->name('aboutAdmin.update');
    Route::delete('about/delete/{id}', 'destroy')->name('aboutAdmin.destroy');
});

Route::controller(SmartBuyAdminController::class)->group(function () {
    Route::get('smartbuy', 'index')->name('smartbuyAdmin.index');
    Route::get('smartbuy/{id}', 'getById')->name('smartbuyAdmin.id');
    Route::post('smartbuy/create', 'store')->name('smartbuyAdmin.store');
    Route::put('smartbuy/update/{id}', 'update')->name('smartbuyAdmin.update');
    Route::delete('smartbuy/delete/{id}', 'destroy')->name('smartbuyAdmin.destroy');
});

Route::controller(TestimoniAdminController::class)->group(function () {
    Route::get('testimoni', 'index')->name('testimoniAdmin.index');
    Route::get('testimoni/{id}', 'getById')->name('testimoniAdmin.id');
    Route::post('testimoni/create', 'store')->name('testimoniAdmin.store');
    Route::put('testimoni/update/{id}', 'update')->name('testimoniAdmin.update');
    Route::delete('testimoni/delete/{id}', 'destroy')->name('testimoniAdmin.destroy');
});
