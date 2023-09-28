<?php

namespace App\Http\Controllers;

use App\Models\BintangKonveksi;
use Illuminate\Http\Request;

class BintangKonveksiController extends Controller
{
    public function index() {
        $produk = BintangKonveksi::paginate(12);
        return view('layouts.bintang_konveksi', compact('produk'));
    }
}
