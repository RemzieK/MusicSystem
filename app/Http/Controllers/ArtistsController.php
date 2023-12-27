<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    public function create()
{
    
    return view('artists.create');
}

public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required',
        'is_group' => 'required',
    ]);

    Artist::create($request->all());

    return redirect()->route('artists.index')
                    ->with('success','Artist created successfully.');
}

public function show(Artist $artist)
{
    
    return view('artists.show',compact('artist'));
}

public function edit(Artist $artist)
{
    
    return view('artists.edit',compact('artist'));
}

public function update(Request $request, Artist $artist)
{
    
    $request->validate([
        'name' => 'required',
        'is_group' => 'required',
    ]);

    $artist->update($request->all());

    return redirect()->route('artists.index')
                    ->with('success','Artist updated successfully');
}

public function destroy(Artist $artist)
{
  
    $artist->delete();

    return redirect()->route('artists.index')
                    ->with('success','Artist deleted successfully');
}

}
