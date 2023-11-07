<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.layouts.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $auth = Auth::user();
        $user = User::find($auth->id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $user->save();

        return back()->with('success', "Password Changed Successfully");
    }
}
