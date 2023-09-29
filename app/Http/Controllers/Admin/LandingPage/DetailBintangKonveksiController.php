<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\BintangKonveksi;
use Illuminate\Http\Request;

class DetailBintangKonveksiController extends Controller
{
    public function show($id)
    {
        // dd($id);

        $produkDetailBK = BintangKonveksi::find($id);



        if (!$produkDetailBK) {
            abort(404);
        }

        return view('layouts.detail.detail_bintang_konveksi', compact('produkDetailBK'));
    }
}
