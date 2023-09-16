<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $remember_me = $request->has('remember_checkbox') ? true : false; 

        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        Session::flash('error', 'Username atau Password Salah');
        return redirect('admin')->withErrors('loginError', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin');
    }
}
