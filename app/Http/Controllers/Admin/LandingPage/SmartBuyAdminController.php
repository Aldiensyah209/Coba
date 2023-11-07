<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmartBuy;
use Illuminate\Support\Facades\File;

class SmartBuyAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $smartBuy = SmartBuy::paginate(5);
        return view('admin.layouts.smartbuy', compact('smartBuy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'deskripsi' => 'required'
        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        
        $request->gambar->move(public_path('images/post/smart_buy/'), $imageName);

        $smartBuy = new SmartBuy([
            'judul' => $request->get('judul'),
            'gambar' => $imageName,
            'deskripsi' => $request->get('deskripsi'),
        ]);

        $smartBuy->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $smartBuy = SmartBuy::findOrFail($id);
        return response()->json($smartBuy, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_judul' => 'required',
            'edit_gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'edit_deskripsi' => 'required',

        ]);

        $smartBuy = SmartBuy::find($id);

        $smartBuy->judul = $request->get('edit_judul');
        $smartBuy->deskripsi = $request->get('edit_deskripsi');

        if ($request->hasFile('edit_gambar')) {
            // Delete old image
            File::delete(public_path('images/post/smart_buy/' . $smartBuy->gambar));

            $imageName = date('YmdHis') . "." . $request->edit_gambar->Extension();
            $request->edit_gambar->move(public_path('images/post/smart_buy/'), $imageName);
            $smartBuy->gambar = $imageName;
        }

        $smartBuy->save();

        return response()->json($smartBuy, 200);
    }

    public function destroy($id)
    {
        $smartBuy = SmartBuy::findOrFail($id);
        $smartBuy->delete();

        // Delete old image
        File::delete(public_path('images/post/product/' . $smartBuy->gambar));

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }
}
