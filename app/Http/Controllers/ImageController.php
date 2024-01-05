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
    public function store(Request $request, $album_id)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();  
    $imageData = file_get_contents($request->file('image')); // Get contents before moving the file

    $request->image->move(public_path('images'), $imageName);

    $image = new Image;
    $image->album_id = $album_id;
    $image->image_path = $imageName;
    $image->image_data = $imageData; // Use the retrieved contents
    $image->save();

    return back()
        ->with('success','Image uploaded successfully.')
        ->with('image',$imageName);
}


    

}
