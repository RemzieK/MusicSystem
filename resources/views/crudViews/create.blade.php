
<div style="text-align: center;">
    <h2>Create Record</h2>
    @if(session('error'))
        <div style="color: red; margin-bottom: 16px;">{{ session('error') }}</div>
    @endif
    <form action="{{ route('explore.store') }}" method="POST" enctype="multipart/form-data" style="border: 3px solid #f1f1f1; width: 60%; margin: auto; margin-top: 5%; padding: 16px;background-color: lavender;">
        @csrf

        <div style="margin-bottom: 16px;">
            <label for="artist_name">Artist Name:</label>
            <input type="text" name="artist_name" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            @if ($errors->has('artist_name'))
                <div style="color: red;">{{ $errors->first('artist_name') }}</div>
            @endif
        </div>

        <div style="margin-bottom: 16px;">
            <label for="album_name">Album Name:</label>
            <input type="text" name="album_name" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            @if ($errors->has('album_name'))
                <div style="color: red;">{{ $errors->first('album_name') }}</div>
            @endif
        </div>

        <div style="margin-bottom: 16px;">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            @if ($errors->has('genre'))
                <div style="color: red;">{{ $errors->first('genre') }}</div>
            @endif
        </div>

        <div style="margin-bottom: 16px;">
            <label for="release_year">Release Year:</label>
            <input type="text" name="release_year" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            @if ($errors->has('release_year'))
                <div style="color: red;">{{ $errors->first('release_year') }}</div>
            @endif
        </div>

        <div style="margin-bottom: 16px;">
            <label for="is_group">Is Group:</label>
            <select name="is_group" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            @if ($errors->has('is_group'))
                <div style="color: red;">{{ $errors->first('is_group') }}</div>
            @endif
        </div>

        <button type="submit" style="background-color: #aa048b; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%;">Create</button>
    </form>
</div>

