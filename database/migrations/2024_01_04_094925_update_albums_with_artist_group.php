<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Album;
use App\Models\Artist;

class UpdateAlbumsWithArtistGroup extends Migration
{
    public function up()
    {
        $albums = Album::all();
        foreach ($albums as $album) {
            $artist = Artist::find($album->artist_id);

            if ($artist) {
                $album->is_group = $artist->is_group;
                $album->save();
            }
        }
    }

    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->dropColumn('is_group');
        });
    }
}
