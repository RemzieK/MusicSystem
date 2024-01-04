@extends('layouts.app')

@section('content')
    <h1>Create Record</h1>

    <form action="{{ route('explore.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="artist_name">Artist Name:</label>
        <input type="text" name="artist_name" required>

        <label for="album_name">Album Name:</label>
        <input type="text" name="album_name" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" required>

        <label for="release_year">Release Year:</label>
        <input type="text" name="release_year" required>

        <label for="is_group">Is Group:</label>
<select name="is_group" required>
    <option value="1">Yes</option>
    <option value="0">No</option>
</select>


        <button type="submit">Create</button>
    </form>
@endsection
