<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $artistId1 = DB::table('artists')->where('name', 'Palaye Royale')->first()->id;
        $genreId1 = DB::table('genres')->where('name', 'Indie Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Fever Dream',
            'release_year' => 2022,
            'artist_id' => $artistId1,
            'genre_id' => $genreId1,
        ]);
        
        $artistId2 = DB::table('artists')->where('name', 'Billie Eilish')->first()->id;
        $genreId2 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'When We All Fall Asleep, Where Do We Go?',
            'release_year' => 2019,
            'artist_id' => $artistId2,
            'genre_id' => $genreId2,
        ]);
    
        $artistId3 = DB::table('artists')->where('name', 'Maneskin')->first()->id;
        $genreId3 = DB::table('genres')->where('name', 'R&B')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Rush! (Are U Coming?)',
            'release_year' => 2023,
            'artist_id' => $artistId3,
            'genre_id' => $genreId3,
        ]);

        $artistId4 = DB::table('artists')->where('name', 'Sub Urban')->first()->id;
        $genreId4 = DB::table('genres')->where('name', 'Electropop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Thrill Seeker',
            'release_year' => 2020,
            'artist_id' => $artistId4,
            'genre_id' => $genreId4,
        ]);

        $artistId5 = DB::table('artists')->where('name', 'Ashicko')->first()->id;
        $genreId5 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Daisy 2.0',
            'release_year' => 2019,
            'artist_id' => $artistId5,
            'genre_id' => $genreId5,
        ]);

        $artistId6 = DB::table('artists')->where('name', 'Yungblud')->first()->id;
        $genreId6 = DB::table('genres')->where('name', 'Dark Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Anarchist',
            'release_year' => 2018,
            'artist_id' => $artistId6,
            'genre_id' => $genreId6,
        ]);

        $artistId7 = DB::table('artists')->where('name', 'The Weeknd')->first()->id;
        $genreId7 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Starboy',
            'release_year' => 2019,
            'artist_id' => $artistId7,
            'genre_id' => $genreId7,
        ]);

        $artistId8 = DB::table('artists')->where('name', 'Melanie Martines')->first()->id;
        $genreId8 = DB::table('genres')->where('name', 'Indie Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Cry Baby',
            'release_year' => 2020,
            'artist_id' => $artistId8,
            'genre_id' => $genreId8,
        ]);

        $artistId9 = DB::table('artists')->where('name', 'AC/DC')->first()->id;
        $genreId9 = DB::table('genres')->where('name', 'R&B')->first()->id;
        DB::table('albums')->insert([
            'name' => 'High voltage',
            'release_year' => 1976,
            'artist_id' => $artistId9,
            'genre_id' => $genreId9,
        ]);

        $artistId10 = DB::table('artists')->where('name', '5SOS')->first()->id;
        $genreId10 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'W.D.Y.M',
            'release_year' => 2021,
            'artist_id' => $artistId10,
            'genre_id' => $genreId10,
        ]);

        $artistId11 = DB::table('artists')->where('name', 'Katy Perry')->first()->id;
        $genreId11 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Roar',
            'release_year' => 2017,
            'artist_id' => $artistId11,
            'genre_id' => $genreId11,
        ]);

        $artistId12 = DB::table('artists')->where('name', 'Ruel')->first()->id;
        $genreId12 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'PainKiller',
            'release_year' => 2019,
            'artist_id' => $artistId12,
            'genre_id' => $genreId12,
        ]);

        $artistId13 = DB::table('artists')->where('name', 'Jonas Brothers')->first()->id;
        $genreId13 = DB::table('genres')->where('name', 'Pop')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Sucker',
            'release_year' => 2020,
            'artist_id' => $artistId13,
            'genre_id' => $genreId13,
        ]);

        $artistId14 = DB::table('artists')->where('name', 'Doja Cat')->first()->id;
        $genreId14 = DB::table('genres')->where('name', 'R&B')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Like you',
            'release_year' => 2020,
            'artist_id' => $artistId14,
            'genre_id' => $genreId14,
        ]);

        $artistId15 = DB::table('artists')->where('name', 'All Time Low')->first()->id;
        $genreId15 = DB::table('genres')->where('name', 'R&B')->first()->id;
        DB::table('albums')->insert([
            'name' => 'Dont panic',
            'release_year' => 2012,
            'artist_id' => $artistId15,
            'genre_id' => $genreId15,
        ]);
    }
    
}
