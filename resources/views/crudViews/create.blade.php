@extends('layouts.app')

@section('content')
    @auth
        Authenticated User: {{ Auth::user() }}
        Is Admin: {{ Auth::user()->is_admin }}
    @endauth

    <h1>Create Record</h1>

    @if(Auth::user()->is_admin)
        <form action="{{ route('explore.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="artist_name">Artist Name:</label>
            <input type="text" name="artist_name" required>

            <label for="album_name">Album Name:</label>
            <input type="text" name="album_name" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" required>

            <label for="image">Image:</label>
            <input type="file" name="image" required>

            <button type="submit">Create</button>
        </form>
    @endif
@endsection
