<?php

namespace App\Http\Controllers;

use App\Models\AnekaSlempang;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class AnekaSlempangController extends Controller
{
    public function index()
    {
        $produk = AnekaSlempang::paginate(12);
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        $whatsappPriority = SocialMedia::where('isPriority', 1)->first();
        $email = User::pluck('email')->first();

        return view('layouts.aneka_slempang', compact(
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
