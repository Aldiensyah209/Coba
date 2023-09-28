<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class GaleriAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gambar = Galeri::paginate(5);
        return view('admin.layouts.galeri', compact('gambar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/galeri/'), $imageName);

        $gambar = new Galeri([
            'gambar' => $imageName,
        ]);

        $gambar->save();

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $gambar = Galeri::findOrFail($id);
        $gambar->delete();

        // Delete old image
        File::delete(public_path('images/post/galeri/' . $gambar->gambar));

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
