<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BintangKonveksi;
use App\Models\Home;
use App\Models\HomeImage;
use App\Models\Smartbuy;
use App\Models\Xuzu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $home = Home::all();
        $homeImage = HomeImage::all();
        $about = About::all();
        $smartBuy = Smartbuy::all();
        $xuzu = Xuzu::latest()->take(2)->get();
        $bintangKonveksi = BintangKonveksi::latest()->take(2)->get();
        return view('landingPage.home', compact('home', 'homeImage', 'about', 'smartBuy', 'xuzu', 'bintangKonveksi'));
    }
}
