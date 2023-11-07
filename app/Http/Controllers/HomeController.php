<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AnekaSlempang;
use App\Models\Berita;
use App\Models\BintangKonveksi;
use App\Models\Galeri;
use App\Models\Home;
use App\Models\HomeImage;
use App\Models\HomeVideo;
use App\Models\SocialMedia;
use App\Models\Testimoni;
use App\Models\User;
use App\Models\Xuzu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::all()->first();
        $homeImage = HomeImage::all();
        $homeVideo = HomeVideo::all();
        $about = About::all();
        $berita = Berita::all();
        $xuzu = Xuzu::latest()->first();
        $bintangKonveksi = BintangKonveksi::latest()->first();
        $anekaSlempang = AnekaSlempang::latest()->first();
        $testimoni = Testimoni::latest()->take(4)->get();
        $galeri = Galeri::all();
        $whatsappPriority = SocialMedia::where('isPriority', 1)->first();
        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');
        $email = User::pluck('email')->first();

        $videoID = array();
        $regex = "#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#";

        foreach ($homeVideo as $item) {
            preg_match($regex, $item->tautan, $matches);
            array_push($videoID, $matches[0]);
        }

        return view('layouts.home', compact(
            'home',
            'homeImage',
            'videoID',
            'about',
            'xuzu',
            'bintangKonveksi',
            'anekaSlempang',
            'testimoni',
            'galeri',
            'whatsappPriority',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
            'email',
            'berita'
        ));
    }
}
