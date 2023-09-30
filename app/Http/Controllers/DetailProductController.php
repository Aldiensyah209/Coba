<?php

namespace App\Http\Controllers;

use App\Models\AnekaSlempang;
use App\Models\BintangKonveksi;
use App\Models\SocialMedia;
use App\Models\Xuzu;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function show(Request $request)
    {
        switch ($request->product) {
            case 'xuzu':
                $productDetail = Xuzu::find($request->id);
                $category = 'xuzu';
                break;
            case 'bintang-konveksi':
                $productDetail = BintangKonveksi::find($request->id);
                $category = 'bintangKonveksi';
                break;
            case 'aneka-slempang':
                $productDetail = AnekaSlempang::find($request->id);
                $category = 'anekaSlempang';
                break;
        }

        if (!$productDetail) {
            abort(404);
        }

        $whatsapp = SocialMedia::pluck('whatsapp');
        $instagram = SocialMedia::pluck('instagram');
        $facebook = SocialMedia::pluck('facebook');
        $tiktok = SocialMedia::pluck('tiktok');

        return view('layouts.detail_product', compact(
            'productDetail',
            'category',
            'whatsapp',
            'instagram',
            'facebook',
            'tiktok',
        ));
    }
}
