<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Genre;
use App\Models\Artist;
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
        'artist_name' => 'required|max:255',
        'album_name' => 'required|max:255',
        'genre' => 'required|max:255',
        'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        'is_group' => 'required|boolean',
    ]);

    $artist = Artist::firstOrCreate(['name' => $request->artist_name, 'is_group' => $request->is_group]);
    $genre = Genre::firstOrCreate(['name' => $request->genre]);

    $album = new Album;
    $album->artist_id = $artist->id;
    $album->artist_name = $artist->name;  
    $album->name = $request->album_name;
    $album->genre_id = $genre->id;
    $album->genre_name = $genre->name;  
    $album->release_year = $request->release_year;
    $album->is_group = $request->is_group;
    $album->save();

    return redirect()->route('explore');  
}


    
    

public function create()
{
    return view('crudViews.create');
}

public function edit($id)
{
    $record = Album::find($id);

    return view('crudViews.edit', compact('record'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'album_name' => 'required|max:255',
        'artist_name' => 'required|max:255',
        'genre' => 'required|max:255',
    ]);

    $album = Album::find($id);
    $album->name = $request->album_name;
    $album->release_year = $request->release_year;
    $album->is_group = $request->is_group;

    // Update the name field of the related Artist and Genre models
    $album->artist->name = $request->artist_name;
    $album->genre->name = $request->genre;

    $album->push();  // This will save the Album model and all its related models

    return redirect()->route('explore');
}



    public function delete($id)
    {
        $album = Album::find($id);
        $album->delete();

        return redirect()->route('explore');
    }
}

