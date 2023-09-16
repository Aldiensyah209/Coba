<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $konten = About::all();
        return view('admin.layouts.about', compact('konten'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $konten = new About([
            'judul' => $request->get('judul'),
            'deskripsi' => $request->get('deskripsi'),
        ]);

        $konten->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $konten = About::findOrFail($id);
        return response()->json($konten, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_judul' => 'required',
            'edit_deskripsi' => 'required',
        ]);

        $konten = About::find($id);

        $konten->judul = $request->get('edit_judul');
        $konten->deskripsi = $request->get('edit_deskripsi');

        $konten->save();

        return response()->json($konten, 200);
    }

    public function destroy($id)
    {
        $konten = About::findOrFail($id);
        $konten->delete();

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }
}
