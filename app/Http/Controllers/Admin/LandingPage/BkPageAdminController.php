<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BintangKonveksi;

class BkPageAdminController extends Controller
{
    public function bk()
    {
        $produkBk = BintangKonveksi::all(); // Ambil semua data Xuzu dari database
        return view('landingpage.bintangkonveksi', compact('produkBk'));
    }
}
