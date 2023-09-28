<?php

namespace App\Http\Controllers;

use App\Models\Smartbuy;
use Illuminate\Http\Request;

class SmartBuyController extends Controller
{
    public function index() {
        $smartBuy = Smartbuy::all();
        return view('layouts.smart_buy', compact('smartBuy'));
    }
}
