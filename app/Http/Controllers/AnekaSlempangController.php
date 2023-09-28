<?php

namespace App\Http\Controllers;

use App\Models\AnekaSlempang;
use Illuminate\Http\Request;

class AnekaSlempangController extends Controller
{
    public function index() {
        $produk = AnekaSlempang::paginate(12);
        return view('layouts.aneka_slempang', compact('produk'));
    }
}
