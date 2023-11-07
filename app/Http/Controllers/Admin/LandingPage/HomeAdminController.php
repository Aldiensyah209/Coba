<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\HomeImage;
use App\Models\HomeVideo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $konten = Home::all();
        $gambar = HomeImage::paginate(3);
        $video = HomeVideo::all();
        return view('admin.layouts.home', compact('konten', 'gambar', 'video'));
    }

    //------------------------------HOME KONTEN---------------------------------
    public function storeKonten(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $konten = new Home([
            'judul' => $request->get('judul'),
            'deskripsi' => $request->get('deskripsi'),
        ]);

        $konten->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getByIdKonten($id)
    {
        $konten = Home::findOrFail($id);
        return response()->json($konten, 200);
    }

    public function updateKonten(Request $request, $id)
    {
        $request->validate([
            'edit_judul' => 'required',
            'edit_deskripsi' => 'required',
        ]);

        $konten = Home::find($id);

        $konten->judul = $request->get('edit_judul');
        $konten->deskripsi = $request->get('edit_deskripsi');

        $konten->save();

        return response()->json($konten, 200);
    }

    public function destroyKonten($id)
    {
        $konten = Home::findOrFail($id);
        $konten->delete();

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }

    //------------------------------GAMBAR SLIDER---------------------------------
    public function storeGambar(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = date('YmdHis') . "." . $request->gambar->Extension();
        $request->gambar->move(public_path('images/post/hero/'), $imageName);

        $gambar = new HomeImage([
            'gambar' => $imageName,
        ]);

        $gambar->save();

        return redirect()->back()->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function destroyGambar($id)
    {
        $gambar = HomeImage::findOrFail($id);
        $gambar->delete();

        // Delete old image
        File::delete(public_path('images/post/hero/' . $gambar->gambar));

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }

    //------------------------------VIDEO SLIDER---------------------------------
    public function storeVideo(Request $request)
    {
        $request->validate([
            'tautan' => 'required',
        ]);

        $video = new HomeVideo([
            'tautan' => $request->get('tautan'),
        ]);

        $video->save();

        return redirect()->back()->with('success', 'Video berhasil ditambahkan.');
    }

    public function getByIdVideo($id)
    {
        $video = HomeVideo::findOrFail($id);
        return response()->json($video, 200);
    }

    public function updateVideo(Request $request, $id)
    {
        $request->validate([
            'edit_tautan' => 'required',
        ]);

        $video = HomeVideo::find($id);

        $video->tautan = $request->get('edit_tautan');

        $video->save();

        return response()->json($video, 200);
    }

    public function destroyVideo($id)
    {
        $video = HomeVideo::findOrFail($id);
        $video->delete();

        return redirect()->back()->with('success', 'Video berhasil dihapus.');
    }
}
