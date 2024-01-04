<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('albums', function (Blueprint $table) {
       
        $table->increments('id');
        $table->string('name');
        $table->integer('release_year')->nullable();
        $table->unsignedInteger('artist_id');
        $table->unsignedInteger('genre_id');
        $table->string('artist_name');
        $table->string('genre_name');
        $table->timestamps();

        $table->foreign('artist_id')->references('id')->on('artists');
        $table->foreign('genre_id')->references('id')->on('genres');
        
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
