<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Baju;

class BajuAdminController extends Controller
{
    public function index()
    {
        $baju = Baju::paginate(5);
        return view('admin.layouts.baju', compact('baju'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_baju' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar_baju' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = date('YmdHis') . "." . $request->gambar_baju->Extension();
        $request->gambar_baju->move(public_path('images/post/'), $imageName);

        $baju = new Baju([
            'nama_baju' => $request->get('nama_baju'),
            'deskripsi' => $request->get('deskripsi'),
            'harga' => $request->get('harga'),
            'gambar_baju' => $imageName,
        ]);

        $baju->save();

        return redirect()->back()->with('success', 'Baju berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $baju = Baju::findOrFail($id);
        return response()->json($baju, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_nama_baju' => 'required',
            'edit_deskripsi' => 'required',
            'edit_harga' => 'required|numeric',
            'edit_gambar_baju' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $baju = Baju::find($id);

        $baju->nama_baju = $request->get('edit_nama_baju');
        $baju->deskripsi = $request->get('edit_deskripsi');
        $baju->harga = $request->get('edit_harga');

        if ($request->hasFile('edit_gambar_baju')) {
            // Delete old image
            File::delete(public_path('images/post/' . $baju->gambar_baju));

            $imageName = date('YmdHis') . "." . $request->edit_gambar_baju->Extension();
            $request->edit_gambar_baju->move(public_path('images/post/'), $imageName);
            $baju->gambar_baju = $imageName;
        }

        $baju->save();

        return response()->json($baju, 200);
    }

    public function destroy($id)
    {
        $baju = Baju::findOrFail($id);
        $baju->delete();

        // Delete old image
        File::delete(public_path('images/post/' . $baju->gambar_baju));

        return redirect()->back()->with('success', 'Baju berhasil dihapus.');
    }
}
