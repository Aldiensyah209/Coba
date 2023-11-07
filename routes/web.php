<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\Auth\ResetPasswordAdminController;
use App\Http\Controllers\Admin\LandingPage\AboutAdminController;
use App\Http\Controllers\Admin\LandingPage\BeritaAdminController;
use App\Http\Controllers\Admin\LandingPage\SmartBuyAdminController;
use App\Http\Controllers\Admin\LandingPage\TestimoniAdminController;
use App\Http\Controllers\Admin\LandingPage\GaleriAdminController;
use App\Http\Controllers\Admin\LandingPage\HomeAdminController;
use App\Http\Controllers\Admin\LandingPage\SocialMediaAdminController;
use App\Http\Controllers\Admin\Product\XuzuAdminController;
use App\Http\Controllers\Admin\Product\BintangKonveksiAdminController;
use App\Http\Controllers\Admin\Product\AnekaSlempangAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnekaSlempangController;
use App\Http\Controllers\BintangKonveksiController;
use App\Http\Controllers\SmartBuyController;
use App\Http\Controllers\XuzuController;
use App\Http\Controllers\DetailProductController;
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

// ----------------------------------LANDING PAGE----------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('cors');
Route::get('xuzu-store', [XuzuController::class, 'index'])->name('landingPage.xuzu');
Route::get('bintang-konveksi-store', [BintangKonveksiController::class, 'index'])->name('landingPage.bintangKonveksi');
Route::get('aneka-slempang-store', [AnekaSlempangController::class, 'index'])->name('landingPage.anekaSlempang');
Route::get('smart-buy', [SmartBuyController::class, 'index'])->name('smartBuy');
Route::get('detail/{product}/{id}', [DetailProductController::class, 'show'])->name('product_detail');


// ----------------------------------ADMIN ROUTE----------------------------------
Route::controller(LoginAdminController::class)->group(function () {
    Route::get('admin', 'index')->name('admin')->middleware('isLogin');
    Route::post('login', 'authenticate')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(ResetPasswordAdminController::class)->group(function () {
    Route::get('admin/reset-password', 'index')->name('resetPassword');
    Route::post('admin/reset-password/update', 'update')->name('updatePassword');
});

Route::get('admin/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

Route::controller(ProfileAdminController::class)->group(function () {
    Route::get('admin/profile', 'index')->name('profile');
    Route::post('admin/profile/update', 'update')->name('updateProfile');
});

Route::controller(XuzuAdminController::class)->group(function () {
    Route::get('admin/xuzu', 'index')->name('xuzu.index');
    Route::get('admin/xuzu/{id}', 'getById')->name('xuzu.id');
    Route::post('admin/xuzu/create', 'store')->name('xuzu.store');
    Route::put('admin/xuzu/update/{id}', 'update')->name('xuzu.update');
    Route::delete('admin/xuzu/delete/{id}', 'destroy')->name('xuzu.destroy');
});

Route::controller(BintangKonveksiAdminController::class)->group(function () {
    Route::get('admin/bintang-konveksi', 'index')->name('bk.index');
    Route::get('admin/bintang-konveksi/{id}', 'getById')->name('bk.id');
    Route::post('admin/bintang-konveksi/create', 'store')->name('bk.store');
    Route::put('admin/bintang-konveksi/update/{id}', 'update')->name('bk.update');
    Route::delete('admin/bintang-konveksi/delete/{id}', 'destroy')->name('bk.destroy');
});

Route::controller(AnekaSlempangAdminController::class)->group(function () {
    Route::get('admin/aneka-slempang', 'index')->name('as.index');
    Route::get('admin/aneka-slempang/{id}', 'getById')->name('as.id');
    Route::post('admin/aneka-slempang/create', 'store')->name('as.store');
    Route::put('admin/aneka-slempang/update/{id}', 'update')->name('as.update');
    Route::delete('admin/aneka-slempang/delete/{id}', 'destroy')->name('as.destroy');
});

Route::controller(HomeAdminController::class)->group(function () {
    Route::get('admin/home', 'index')->name('homeAdmin.index');
    Route::get('admin/home/{id}', 'getByIdKonten')->name('homeContent.id');
    Route::post('admin/home/create', 'storeKonten')->name('homeContent.store');
    Route::put('admin/home/update/{id}', 'updateKonten')->name('homeContent.update');
    Route::delete('admin/home/delete/{id}', 'destroyKonten')->name('homeContent.destroy');
    Route::post('admin/home-image/create', 'storeGambar')->name('homeImage.store');
    Route::delete('admin/home-image/delete/{id}', 'destroyGambar')->name('homeImage.destroy');
    Route::post('admin/home-video/create', 'storeVideo')->name('homeVideo.store');
    Route::get('admin/home-video/{id}', 'getByIdVideo')->name('homeVideo.id');
    Route::put('admin/home-video/update/{id}', 'updateVideo')->name('homeVideo.update');
    Route::delete('admin/home-video/delete/{id}', 'destroyVideo')->name('homeVideo.destroy');
});

Route::controller(AboutAdminController::class)->group(function () {
    Route::get('admin/about', 'index')->name('aboutAdmin.index');
    Route::get('admin/about/{id}', 'getById')->name('aboutAdmin.id');
    Route::post('admin/about/create', 'store')->name('aboutAdmin.store');
    Route::put('admin/about/update/{id}', 'update')->name('aboutAdmin.update');
    Route::delete('admin/about/delete/{id}', 'destroy')->name('aboutAdmin.destroy');
});

Route::controller(SmartBuyAdminController::class)->group(function () {
    Route::get('admin/smartbuy', 'index')->name('smartbuyAdmin.index');
    Route::get('admin/smartbuy/{id}', 'getById')->name('smartbuyAdmin.id');
    Route::post('admin/smartbuy/create', 'store')->name('smartbuyAdmin.store');
    Route::put('admin/smartbuy/update/{id}', 'update')->name('smartbuyAdmin.update');
    Route::delete('admin/smartbuy/delete/{id}', 'destroy')->name('smartbuyAdmin.destroy');
});

Route::controller(TestimoniAdminController::class)->group(function () {
    Route::get('admin/testimoni', 'index')->name('testimoniAdmin.index');
    Route::get('admin/testimoni/{id}', 'getById')->name('testimoniAdmin.id');
    Route::post('admin/testimoni/create', 'store')->name('testimoniAdmin.store');
    Route::put('admin/testimoni/update/{id}', 'update')->name('testimoniAdmin.update');
    Route::delete('admin/testimoni/delete/{id}', 'destroy')->name('testimoniAdmin.destroy');
});

Route::controller(GaleriAdminController::class)->group(function () {
    Route::get('admin/galeri', 'index')->name('galeri.index');
    Route::post('admin/galeri/create', 'store')->name('galeri.store');
    Route::delete('admin/galeri/delete/{id}', 'destroy')->name('galeri.destroy');
});

Route::controller(SocialMediaAdminController::class)->group(function () {
    Route::get('admin/social-media', 'index')->name('sosmed.index');
    Route::get('admin/social-media/{id}', 'getById')->name('sosmed.id');
    Route::post('admin/social-media/create', 'store')->name('sosmed.store');
    Route::put('admin/social-media/update/{id}', 'update')->name('sosmed.update');
    Route::delete('admin/social-media/delete/{id}', 'destroy')->name('sosmed.destroy');
});

Route::controller(BeritaAdminController::class)->group(function () {
    Route::get('admin/berita', 'index')->name('berita.index');
    Route::get('admin/berita/{id}', 'getById')->name('berita.id');
    Route::post('admin/berita/create', 'store')->name('berita.store');
    Route::put('admin/berita/update/{id}', 'update')->name('berita.update');
    Route::delete('admin/berita/delete/{id}', 'destroy')->name('berita.destroy');
});
