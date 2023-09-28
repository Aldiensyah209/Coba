<?php

namespace App\Http\Controllers\Admin\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sosmed = SocialMedia::all();
        return view('admin.layouts.social_media', compact('sosmed'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'tiktok' => 'required',
        ]);

        $sosmed = new SocialMedia([
            'whatsapp' => $request->get('whatsapp'),
            'instagram' => $request->get('instagram'),
            'facebook' => $request->get('facebook'),
            'tiktok' => $request->get('instagram'),
            'isPriority' => $request->has('priority') ? 1 : 0,
        ]);

        $sosmed->save();

        return redirect()->back()->with('success', 'Konten berhasil ditambahkan.');
    }

    public function getById($id)
    {
        $sosmed = SocialMedia::findOrFail($id);
        return response()->json($sosmed, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_whatsapp' => 'required',
            'edit_instagram' => 'required',
            'edit_facebook' => 'required',
            'edit_tiktok' => 'required',
        ]);

        $sosmed = SocialMedia::find($id);

        $sosmed->whatsapp = $request->get('edit_whatsapp');
        $sosmed->instagram = $request->get('edit_instagram');
        $sosmed->facebook = $request->get('edit_facebook');
        $sosmed->tiktok = $request->get('edit_tiktok');
        $sosmed->isPriority = $request->has('edit_priority') ? 1 : 0;

        $sosmed->save();

        return response()->json($sosmed, 200);
    }

    public function destroy($id)
    {
        $sosmed = SocialMedia::findOrFail($id);
        $sosmed->delete();

        return redirect()->back()->with('success', 'Konten berhasil dihapus.');
    }
}
