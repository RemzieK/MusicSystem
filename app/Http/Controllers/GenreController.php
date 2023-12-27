<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create()
{
    return view('genres.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
    ]);

    Genre::create($request->all());

    return redirect()->route('genres.index')
                    ->with('success','Genre created successfully.');
}

public function show(Genre $genre)
{
    return view('genres.show',compact('genre'));
}

public function edit(Genre $genre)
{
    return view('genres.edit',compact('genre'));
}

public function update(Request $request, Genre $genre)
{
    $request->validate([
        'name' => 'required',
    ]);

    $genre->update($request->all());

    return redirect()->route('genres.index')
                    ->with('success','Genre updated successfully');
}

public function delete(Genre $genre)
{
    $genre->delete();

    return redirect()->route('genres.index')
                    ->with('success','Genre deleted successfully');
}

}
