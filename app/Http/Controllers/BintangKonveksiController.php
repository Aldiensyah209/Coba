<?php

namespace App\Http\Controllers;

use App\Models\BintangKonveksi;
use App\Models\SocialMedia;
use App\Models\User;
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
        $whatsappPriority = SocialMedia::where('isPriority', 1)->first();
        $email = User::pluck('email')->first();

        return view('layouts.bintang_konveksi', compact(
            'produk',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
            'whatsappPriority',
            'email',
        ));
    }
}
