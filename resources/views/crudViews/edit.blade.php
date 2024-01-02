@extends('layouts.app')

@section('content')
    @auth
        Authenticated User: {{ Auth::user() }}
        Is Admin: {{ Auth::user()->is_admin }}
    @endauth

    <h1>Edit Record</h1>

    @if(Auth::user()->is_admin)
        <form action="{{ route('explore.update', ['id' => $record->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="artist_name">Artist Name:</label>
            <input type="text" name="artist_name" value="{{ $record->artist_name }}" required>

            <label for="album_name">Album Name:</label>
            <input type="text" name="album_name" value="{{ $record->album_name }}" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" value="{{ $record->genre }}" required>

            <label for="image">Image:</label>
            <input type="file" name="image">

            <button type="submit">Update</button>
        </form>
    @endif
@endsection
