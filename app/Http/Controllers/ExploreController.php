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
    $data = Album::with(['artist', 'genre', 'images'])
    ->orderBy('created_at', 'desc')
    ->get();
    
    $isAdmin = Auth::user() ? Auth::user()->is_admin : false;

    return view('explore', compact('data', 'isAdmin'));
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
        'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        'is_group' => 'required|boolean',
    ]);

    $album = Album::find($id);
    $album->name = $request->album_name;
    $album->release_year = $request->release_year;
    $album->is_group = $request->is_group;

    $album->artist->name = $request->artist_name;
    $album->genre->name = $request->genre;

    $album->push();

    return redirect()->route('explore');
}

    public function delete($id)
    {
        $album = Album::find($id);
        $album->delete();

        return redirect()->route('explore');
    }
}

