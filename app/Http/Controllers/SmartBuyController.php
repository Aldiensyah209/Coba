<?php

namespace App\Http\Controllers;

use App\Models\SmartBuy;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class SmartBuyController extends Controller
{
    public function index()
    {
        $smartBuy = SmartBuy::all();
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        $email = User::pluck('email')->first();

        return view('layouts.smart_buy', compact(
            'smartBuy',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
            'email'
        ));
    }
}
