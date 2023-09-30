<?php

namespace App\Http\Controllers;

use App\Models\Smartbuy;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SmartBuyController extends Controller
{
    public function index()
    {
        $smartBuy = Smartbuy::all();
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        return view('layouts.smart_buy', compact(
            'smartBuy',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
        ));
    }
}
