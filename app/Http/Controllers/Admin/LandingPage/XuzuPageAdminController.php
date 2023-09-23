<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xuzu;

class XuzuPageAdminController extends Controller
{
    public function xuzu()
    {
        $produkXuzu = Xuzu::all(); // Ambil semua data Xuzu dari database
        return view('landingpage.xuzuPage', compact('produkXuzu'));
    }
}
