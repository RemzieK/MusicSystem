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
        return view('upload-new', compact('album')); // You can replace 'upload-new' with your actual view name
    }
    public function store(Request $request)
{
    $request->validate([
        'album_id' => 'required|exists:albums,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $album = Album::findOrFail($request->album_id);

    // Store the image in the 'public/images' directory and get the path
    $path = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName(), 'public');


    $image = new Image([
        'album_id' => $album->id,
        'image_path' => $path,  // Save the path of the image
    ]);
    
    $image->save();
    

    return redirect()->route('explore')->with('success', 'Image uploaded successfully.');
}

}
