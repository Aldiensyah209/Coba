<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $baju = Baju::all();
        return view('admin.layouts.dashboard', compact('baju'));
    }
}
