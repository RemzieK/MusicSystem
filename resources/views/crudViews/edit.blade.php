@extends('layouts.app')

@section('content')
    <h1>Edit Record</h1>

    <form action="{{ route('explore.update', $record->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="artist_name">Artist Name:</label>
        <input type="text" name="artist_name" value="{{ $record->artist_name }}" required>

        <label for="album_name">Album Name:</label>
        <input type="text" name="album_name" value="{{ $record->name }}" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="{{ $record->genre->name }}" required>

        <label for="release_year">Release Year:</label>
        <input type="text" name="release_year" value="{{ $record->release_year }}" required>

        <label for="is_group">Is Group:</label>
        <select name="is_group" required>
            <option value="1" {{ $record->is_group == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ $record->is_group == 0 ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
