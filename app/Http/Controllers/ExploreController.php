<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Album;
use Illuminate\Support\Facades\Auth;




class ExploreController extends Controller
{
    public function index()
{
    $data = Album::with(['artist', 'genre', 'images'])->get();
   
    $isAdmin = Auth::user() ? Auth::user()->is_admin : false;

    return view('explore', compact('data', 'isAdmin'));
}

public function handleCrud(Request $request)
    {
        $isAdmin = auth()->user() ? auth()->user()->is_admin : false;

        if (!$isAdmin) {
            abort(403, 'Unauthorized action.');
        }

        $model = $request->input('model');
        $action = $request->input('action');
        $id = $request->input('id');

        switch ($action) {
            case 'edit':
                return $this->edit($request, $id);
            case 'update':
                return $this->update($request, $id);
            case 'delete':
                return $this->delete($id);
            case 'create':
                return $this->store($request);
            default:
                abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_name' => 'required|max:255',
            'artist_name' => 'required|max:255',
            'genre' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $album = new Album;
        $album->album_name = $request->album_name;
        $album->artist_name = $request->artist_name;
        $album->genre = $request->genre;
        $album->image = $imageName;
        $album->save();

        return redirect()->route('explore');
    }
    public function edit(Request $request, $id)
    {
        $album = Album::find($id);

        return view('edit', compact('album'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'album_name' => 'required|max:255',
            'artist_name' => 'required|max:255',
            'genre' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $album = Album::find($id);
        $album->album_name = $request->album_name;
        $album->artist_name = $request->artist_name;
        $album->genre = $request->genre;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $album->image = $imageName;
        }

        $album->save();

        return redirect()->route('explore');
    }
    public function delete($id)
    {
        $album = Album::find($id);
        $album->delete();

        return redirect()->route('explore.index');
    }
}

