<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Home;
use App\Models\HomeImage;
use App\Models\Smartbuy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $home = Home::all();
        $homeImage = HomeImage::all();
        $about = About::all();
        $smartBuy = Smartbuy::all();
        return view('landingPage.home', compact('home', 'homeImage', 'about', 'smartBuy'));
    }
}
