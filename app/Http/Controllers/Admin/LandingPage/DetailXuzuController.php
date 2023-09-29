<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Xuzu;
use Illuminate\Http\Request;

class DetailXuzuController extends Controller
{
    public function show($id)
    {
        // dd($id);

        $produkDetail = Xuzu::find($id);



        if (!$produkDetail) {
            abort(404);
        }

        return view('layouts.detail.detail_xuzu', compact('produkDetail'));
    }
}
