<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\AnekaSlempang;
use App\Models\BintangKonveksi;
use App\Models\Galeri;
use App\Models\Home;
use App\Models\HomeImage;
use App\Models\Smartbuy;
use App\Models\SocialMedia;
use App\Models\Testimoni;
use App\Models\Xuzu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::all();
        $homeImage = HomeImage::all();
        $about = About::all();
        $xuzu = Xuzu::latest()->get();
        $bintangKonveksi = BintangKonveksi::latest()->get();
        $anekaSlempang = AnekaSlempang::latest()->get();
        $testimoni = Testimoni::latest()->take(4)->get();
        $galeri = Galeri::all();
        $sosmed = SocialMedia::all();
        $produkDetail = Xuzu::all();
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        return view('layouts.home', compact(
            'home',
            'homeImage',
            'about',
            'xuzu',
            'bintangKonveksi',
            'anekaSlempang',
            'testimoni',
            'galeri',
            'sosmed',
            'produkDetail',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
        ));
    }
}
