<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CelanaAdminController extends Controller
{
    public function index()
    {
        return view('admin.layouts.celana');
    }
}
