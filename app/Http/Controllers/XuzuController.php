<?php

namespace App\Http\Controllers;

use App\Models\Xuzu;
use Illuminate\Http\Request;

class XuzuController extends Controller
{
    public function index() {
        $produk = Xuzu::paginate(12);
        return view('layouts.xuzu', compact('produk'));
    }
}
