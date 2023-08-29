<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;

class BajuAdminController extends Controller
{
    public function index()
    {
        $baju = Baju::all();
        return view('admin.layouts.baju.index', compact('baju'));
    }

    public function create()
    {
        return view('baju.create');
    }

    public function store(Request $request)
    {
        $baju = new Baju;
        $baju->nama_baju = $request->input('nama_baju');
        $baju->harga = $request->input('harga');
        $baju->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('gambar_baju')) {
            $baju->gambar_baju = $request->file('gambar_baju')->store('gambar_baju', 'public');
        }

        $baju->save();

        return redirect()->route('baju.index')->with('success', 'Baju berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $baju = Baju::findOrFail($id);
        return view('baju.edit', compact('baju'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_baju' => 'required',
            'harga' => 'numeric|nullable',
            'deskripsi' => 'nullable',
            'gambar_baju' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        ]);

        $baju = Baju::findOrFail($id);
        $baju->nama_baju = $validatedData['nama_baju'];
        $baju->harga = $validatedData['harga'];
        $baju->deskripsi = $validatedData['deskripsi'];

        if ($request->hasFile('gambar_baju')) {
            $baju->gambar_baju = $request->file('gambar_baju')->store('gambar_baju', 'public');
        }

        $baju->save();

        return redirect()->route('baju.edit', $baju->id)->with('success', 'Baju berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $baju = Baju::findOrFail($id);
        $baju->delete();

        return redirect()->route('baju.index')->with('success', 'Baju berhasil dihapus.');
    }
}
