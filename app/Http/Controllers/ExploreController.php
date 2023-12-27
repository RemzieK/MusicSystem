<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class ExploreController extends Controller
{
    public function index()
{
    $data = Album::with('artist', 'genre')->get();

    return view('explore', ['data' => $data]);
}

  
}
