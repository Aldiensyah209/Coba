<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Models\User;
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
        $whatsappPriority = SocialMedia::where('isPriority', 1)->first();
        $email = User::pluck('email')->first();
        
        return view('layouts.xuzu', compact(
            'produk',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
            'whatsappPriority',
            'email'
        ));
    }
}
