<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\AnekaSlempang;

use Illuminate\Http\Request;

class DetailAnekaSlempangController extends Controller
{
    public function show($id)
    {
        // dd($id);

        $produkDetailAS = AnekaSlempang::find($id);



        if (!$produkDetailAS) {
            abort(404);
        }

        return view('layouts.detail.detail_aneka_slempang', compact('produkDetailAS'));
    }
}
