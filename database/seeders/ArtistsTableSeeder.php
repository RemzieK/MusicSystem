<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('artists')->insert([
        ['name' => 'Palaye Royale', 'is_group' => true],
        ['name' => 'Billie Eilish', 'is_group' => false],
        ['name' => 'Maneskin', 'is_group' => true],
        ['name' => 'Sub Urban', 'is_group' => false],
        ['name' => 'Ashicko', 'is_group' => false],
        ['name' => 'Yungblud', 'is_group' => false],
        ['name' => 'The Weeknd', 'is_group' => false],
        ['name' => 'Melanie Martines', 'is_group' => false],
        ['name' => 'AC/DC', 'is_group' => true],
        ['name' => '5SOS', 'is_group' => true],
        ['name' => 'Katy Perry', 'is_group' => false],
        ['name' => 'Ruel', 'is_group' => false],
        ['name' => 'Jonas Brothers', 'is_group' => true],
        ['name' => 'Doja Cat', 'is_group' => false],
        ['name' => 'All Time Low', 'is_group' => true],
    ]);
}

}
