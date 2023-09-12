<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\BintangKonveksi;
use Illuminate\Support\Facades\Auth;

class BintangKonveksiAdminController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return view('admin.layouts.bintang');
        } else {
            return view('admin.auth.login');
        }
    }

    public function index()
    {
        $produk = BintangKonveksi::paginate(5);
        return view('admin.layouts.bintang', compact('produk'));
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

        $produk = new BintangKonveksi([
            'nama_bk' => $request->get('nama'),
            'deskripsi_bk' => $request->get('deskripsi'),
            'harga_bk' => $request->get('harga'),
            'gambar_bk' => $imageName,
        ]);

        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $produk = BintangKonveksi::findOrFail($id);
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

        $produk = BintangKonveksi::find($id);

        $produk->nama_bk = $request->get('edit_nama');
        $produk->deskripsi_bk = $request->get('edit_deskripsi');
        $produk->harga_bk = $request->get('edit_harga');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/' . $produk->gambar_bk));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/'), $imageName);
            $produk->gambar_bk = $imageName;
        }

        $produk->save();

        return response()->json($produk, 200);
    }

    public function destroy($id)
    {
        $produk = BintangKonveksi::findOrFail($id);
        $produk->delete();

        // Delete old image
        File::delete(public_path('images/post/' . $produk->gambar_bk));

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
