<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Album;

class ImageController extends Controller
{
    public function create()
    {
        $albums = Album::all();
        return view('explore.create', compact('albums'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $album = Album::findOrFail($request->album_id);

        $imageData = file_get_contents($request->file('image')->getRealPath());

        $image = new Image([
            'album_id' => $album->id,
            'image_data' => $imageData,
        ]);

        $image->save();

        return redirect()->route('explore')->with('success', 'Image uploaded successfully.');
    }
}
