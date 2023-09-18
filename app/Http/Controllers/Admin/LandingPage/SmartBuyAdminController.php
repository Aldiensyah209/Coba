<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Smartbuy;
use Illuminate\Support\Facades\File;

class SmartBuyAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kontentsmartbuy = Smartbuy::all();

        return view('admin.layouts.smartbuy', compact('kontentsmartbuy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'deskripsi' => 'required'

        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/landingPage/'), $imageName);

        $kontentsmartbuy = new Smartbuy([
            'judul' => $request->get('judul'),
            'gambar' => $imageName,
            'deskripsi' => $request->get('deskripsi'),
        ]);



        $kontentsmartbuy->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $kontentsmartbuy = Smartbuy::findOrFail($id);
        return response()->json($kontentsmartbuy, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_judul' => 'required',
            'edit_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'edit_deskripsi' => 'required',

        ]);

        $kontentsmartbuy = Smartbuy::find($id);

        $kontentsmartbuy->judul = $request->get('edit_judul');
        $kontentsmartbuy->deskripsi = $request->get('edit_deskripsi');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/landingPage/' . $kontentsmartbuy->gambar));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/landingPage/'), $imageName);
            $kontentsmartbuy->gambar = $imageName;
        }

        $kontentsmartbuy->save();

        return response()->json($kontentsmartbuy, 200);
    }

    public function destroy($id)
    {
        $kontentsmartbuy = Smartbuy::findOrFail($id);
        $kontentsmartbuy->delete();

        // Delete old image
        File::delete(public_path('images/post/product/' . $kontentsmartbuy->gambar));

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }

    // public function storeGambar(Request $request)
    // {
    //     $request->validate([
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    //     ]);

    //     $imageName = date('YmdHis') . "." . $request->gambar->Extension();
    //     $request->gambar->move(public_path('images/post/landingPage/'), $imageName);

    //     $gambar = new Smartbuyimg([
    //         'gambar' => $imageName,
    //     ]);

    //     $gambar->save();

    //     return redirect()->back()->with('success', 'Gambar berhasil ditambahkan.');
    // }

    // public function destroyGambar($id)
    // {
    //     $gambar = Smartbuyimg::findOrFail($id);
    //     $gambar->delete();

    //     // Delete old image
    //     File::delete(public_path('images/post/landingPage/' . $gambar->gambar));

    //     return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    // }
}
