<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('genres')->insert([
        ['name' => 'Rock'],
        ['name' => 'Pop'],
        ['name' => 'Hip Hop'],
        ['name' => 'R&B'],
        ['name' => 'Indie Rock'],
        ['name' => 'Dark Pop'],
        ['name' => 'Indie Pop'],
        ['name' => 'Electropop'],
        ['name' => 'Rap'],
        ['name' => 'Trap'],
    ]);
}

}
