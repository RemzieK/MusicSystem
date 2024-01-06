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
        return view('explore', compact('albums'));
    }
    
    public function uploadNew($album_id)
    {
        $album = Album::findOrFail($album_id);
        return view('upload-new', compact('album')); 
    }
    public function store(Request $request, $album_id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $album = Album::findOrFail($album_id);
    
        $imagePath = $request->file('image')->store('images');
    
        $image = new Image;
        $image->album_id = $album_id;
        $image->image_path = $imagePath;
        $image->save();
    
        return redirect()->route('explore'); 
    }
    



// Method to display an image with its album
public function showImage($image_id)
{
    $image = Image::find($image_id);
    $album = $image->album;

    // Pass the album to your view
    return view('image.show', ['image' => $image]);
}

    

}
