<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Xuzu;
use Illuminate\Support\Facades\Auth;

class XuzuAdminController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return view('admin.layouts.xuzu');
        } else {
            return view('admin.auth.login');
        }
    }

    public function index()
    {
        $produk = Xuzu::paginate(5);
        return view('admin.layouts.xuzu', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/'), $imageName);

        $produk = new Xuzu([
            'nama' => $request->get('nama'),
            'deskripsi' => $request->get('deskripsi'),
            'harga' => $request->get('harga'),
            'gambar' => $imageName,
        ]);

        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $produk = Xuzu::findOrFail($id);
        return response()->json($produk, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_nama' => 'required',
            'edit_deskripsi' => 'required',
            'edit_harga' => 'required|numeric',
            'edit_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $produk = Xuzu::find($id);

        $produk->nama = $request->get('edit_nama');
        $produk->deskripsi = $request->get('edit_deskripsi');
        $produk->harga = $request->get('edit_harga');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/' . $produk->gambar));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/'), $imageName);
            $produk->gambar = $imageName;
        }

        $produk->save();

        return response()->json($produk, 200);
    }

    public function destroy($id)
    {
        $produk = Xuzu::findOrFail($id);
        $produk->delete();

        // Delete old image
        File::delete(public_path('images/post/' . $produk->gambar));

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
