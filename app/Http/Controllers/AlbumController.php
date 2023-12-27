<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
    {
        
        return view('albums.create');
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'release_year' => 'required',
            'artist_id' => 'required',
            'genre_id' => 'required',
        ]);
    
        Album::create($request->all());
    
        return redirect()->route('albums.index')
                        ->with('success','Album created successfully.');
    }
    
    public function show(Album $album)
    {
        
        return view('albums.show',compact('album'));
    }
    
    public function edit(Album $album)
    {
        
        return view('albums.edit',compact('album'));
    }
    
    public function update(Request $request, Album $album)
    {
      
        $request->validate([
            'name' => 'required',
            'release_year' => 'required',
            'artist_id' => 'required',
            'genre_id' => 'required',
        ]);
    
        $album->update($request->all());
    
        return redirect()->route('albums.index')
                        ->with('success','Album updated successfully');
    }
    
    public function destroy(Album $album)
    {
       
        $album->delete();
    
        return redirect()->route('albums.index')
                        ->with('success','Album deleted successfully');
    }
    
}
