<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BeritaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $berita = Berita::paginate(5);
        return view('admin.layouts.berita', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tautan' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/berita/'), $imageName);

        $berita = new Berita([
            'judul' => $request->get('judul'),
            'tautan' => $request->get('tautan'),
            'gambar' => $imageName,
        ]);

        $berita->save();

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $berita = Berita::findOrFail($id);
        return response()->json($berita, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_judul' => 'required',
            'edit_tautan' => 'required',
            'edit_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $berita = Berita::find($id);

        $berita->judul = $request->get('edit_judul');
        $berita->tautan = $request->get('edit_tautan');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/berita/' . $berita->gambar));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/berita/'), $imageName);
            $berita->gambar = $imageName;
        }

        $berita->save();

        return response()->json($berita, 200);
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        // Delete old image
        File::delete(public_path('images/post/berita/' . $berita->gambar));

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
}
