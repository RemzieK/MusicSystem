<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;

class UpdateAlbumsWithArtistAndGenreNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $albums = Album::all();
        foreach ($albums as $album) {
            $artist = Artist::find($album->artist_id);
            $genre = Genre::find($album->genre_id);

            if ($artist && $genre) {
                $album->artist_name = $artist->name;
                $album->genre_name = $genre->name;
                $album->save();
            }
        }
    }

   
    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('artist_name');
            $table->dropColumn('genre_name');
        });
    }
}

