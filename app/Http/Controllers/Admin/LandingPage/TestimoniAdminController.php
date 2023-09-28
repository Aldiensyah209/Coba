<?php

namespace App\Http\Controllers\Admin\LandingPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Support\Facades\File;

class TestimoniAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $testimoni = Testimoni::all();

        return view('admin.layouts.testimoni', compact('testimoni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'keterangan' => 'required'

        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/testimoni/'), $imageName);

        $testimoni = new Testimoni([

            'gambar' => $imageName,
            'keterangan' => $request->get('keterangan'),
        ]);

        $testimoni->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return response()->json($testimoni, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'edit_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'edit_keterangan' => 'required',

        ]);

        $testimoni = Testimoni::find($id);

        $testimoni->keterangan = $request->get('edit_keterangan');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/testimoni/' . $testimoni->gambar));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/testimoni/'), $imageName);
            $testimoni->gambar = $imageName;
        }

        $testimoni->save();

        return response()->json($testimoni, 200);
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        // Delete old image
        File::delete(public_path('images/post/testimoni/' . $testimoni->gambar));

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }
}
