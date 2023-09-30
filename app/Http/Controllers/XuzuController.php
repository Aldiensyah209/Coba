<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Models\Xuzu;
use Illuminate\Http\Request;

class XuzuController extends Controller
{
    public function index()
    {
        $produk = Xuzu::paginate(12);
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        return view('layouts.xuzu', compact(
            'produk',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
        ));
    }
}
