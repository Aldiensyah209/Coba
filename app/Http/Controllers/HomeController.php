<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\HomeImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $home = Home::all();
        $homeImage = HomeImage::all();
        return view('landingPage.home', compact('home', 'homeImage'));
    }
}
