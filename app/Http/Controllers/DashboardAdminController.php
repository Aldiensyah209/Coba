<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Xuzu;
use App\Models\BintangKonveksi;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return view('admin.layouts.dashboard');
        } else {
            return view('admin.auth.login');
        }
    }

    public function index()
    {
        $xuzu = Xuzu::all();
        $bintangKonveksi = BintangKonveksi::all();
        return view('admin.layouts.dashboard', compact('xuzu', 'bintangKonveksi'));
    }
}
