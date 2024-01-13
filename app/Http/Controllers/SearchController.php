<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album; 
use App\Models\Artist; 
use App\Models\Genre; 

class SearchController extends Controller
{
  
    public function search(Request $request)
    {
        $artistName = $request->get('artist');
        $albumName = $request->get('album');
        $genreName = $request->get('genre');
        $releaseYear = $request->get('release_year');

        $data = Album::query();

        if ($artistName) {
            $data->whereHas('artist', function ($query) use ($artistName) {
                $query->where('name', 'like', '%' . $artistName . '%');
            });
        }

        if ($albumName) {
            $data->where('name', 'like', '%' . $albumName . '%');
        }

        if ($genreName) {
            $data->whereHas('genre', function ($query) use ($genreName) {
                $query->where('name', 'like', '%' . $genreName . '%');
            });
        }

        if ($releaseYear) {
            $data->where('release_year', 'like', '%' . $releaseYear . '%');
        }

        $data = $data->get();

        if ($data->isEmpty()) {
            session()->flash('error', 'No matching records found.');
            return view('explore');
        }

        return view('explore', compact('data'));
    }
}


