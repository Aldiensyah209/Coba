<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Xuzu;
use App\Models\BintangKonveksi;
use App\Http\Controllers\Controller;
use App\Models\AnekaSlempang;
use App\Models\Testimoni;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $xuzu = Xuzu::count();
        $bintangKonveksi = BintangKonveksi::count();
        $testimoni = Testimoni::count();
        $anekaSlempang = AnekaSlempang::count();
        
        return view('admin.layouts.dashboard', compact('xuzu', 'bintangKonveksi', 'anekaSlempang', 'testimoni'));
    }
}
