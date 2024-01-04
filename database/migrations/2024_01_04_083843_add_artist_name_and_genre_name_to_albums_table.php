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
    Schema::table('albums', function (Blueprint $table) {
        $table->string('artist_name')->after('name')->nullable(); // Add this line
        $table->string('genre_name')->after('artist_name')->nullable(); // Add this line
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('albums', function (Blueprint $table) {
            //
        });
    }
};
