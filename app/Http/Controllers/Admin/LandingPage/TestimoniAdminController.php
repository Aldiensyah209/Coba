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
        $kontenttestimoni = Testimoni::all();

        return view('admin.layouts.testimoni', compact('kontenttestimoni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'keterangan' => 'required'

        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/landingPage/testimoni/'), $imageName);

        $kontenttestimoni = new Testimoni([

            'gambar' => $imageName,
            'keterangan' => $request->get('keterangan'),
        ]);



        $kontenttestimoni->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $kontenttestimoni = Testimoni::findOrFail($id);
        return response()->json($kontenttestimoni, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'edit_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'edit_keterangan' => 'required',

        ]);

        $kontenttestimoni = Testimoni::find($id);


        $kontenttestimoni->keterangan = $request->get('edit_keterangan');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/landingPage/testimoni/' . $kontenttestimoni->gambar));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/landingPage/testimoni/'), $imageName);
            $kontenttestimoni->gambar = $imageName;
        }

        $kontenttestimoni->save();

        return response()->json($kontenttestimoni, 200);
    }

    public function destroy($id)
    {
        $kontenttestimoni = Testimoni::findOrFail($id);
        $kontenttestimoni->delete();

        // Delete old image
        File::delete(public_path('images/post/product/' . $kontenttestimoni->gambar));

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }
}
