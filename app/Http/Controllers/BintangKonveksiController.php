<?php

namespace App\Http\Controllers;

use App\Models\BintangKonveksi;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class BintangKonveksiController extends Controller
{
    public function index()
    {
        $produk = BintangKonveksi::paginate(12);
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        return view('layouts.bintang_konveksi', compact(
            'produk',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
        ));
    }
}
