<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AksesorisAdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.aksesoris');
    }
}
