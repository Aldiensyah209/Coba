<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnekaSlempang;
use Illuminate\Support\Facades\File;

class AnekaSlempangAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $produk = AnekaSlempang::paginate(5);
        return view('admin.layouts.aneka_slempang', compact('produk'));
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
        $request->gambar->move(public_path('images/post/product/aneka_slempang/'), $imageName);

        $produk = new AnekaSlempang([
            'nama_as' => $request->get('nama'),
            'deskripsi_as' => $request->get('deskripsi'),
            'harga_as' => $request->get('harga'),
            'gambar_as' => $imageName,
        ]);

        $produk->save();

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $produk = AnekaSlempang::findOrFail($id);
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

        $produk = AnekaSlempang::find($id);

        $produk->nama_as = $request->get('edit_nama');
        $produk->deskripsi_as = $request->get('edit_deskripsi');
        $produk->harga_as = $request->get('edit_harga');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/product/aneka_slempang/' . $produk->gambar_as));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/product/aneka_slempang/'), $imageName);
            $produk->gambar_as = $imageName;
        }

        $produk->save();

        return response()->json($produk, 200);
    }

    public function destroy($id)
    {
        $produk = AnekaSlempang::findOrFail($id);
        $produk->delete();

        // Delete old image
        File::delete(public_path('images/post/product/aneka_slempang/' . $produk->gambar_as));

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
