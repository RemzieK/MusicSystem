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
        
        $originalFileName = time().'.'.$request->image->extension();  
    
        $request->image->move(public_path('images'), $originalFileName);
    
        $image = new Image;
        $image->album_id = $album_id;
        $image->image_path = 'images/'.$originalFileName;
        $image->save();
    
        return redirect()->route('explore'); 
    }
    
    public function showImage($image_id)
    {
        $image = Image::find($image_id);
        $album = $image->album;

        return view('image.show', ['image' => $image]);
    }

    public function delete($image_id)
    {
        $image = Image::findOrFail($image_id);
        $image->delete();

        return redirect()->route('explore');
    }
}
