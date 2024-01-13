<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::table('albums', function (Blueprint $table) {
        $table->string('artist_name')->after('name')->nullable();
        $table->string('genre_name')->after('artist_name')->nullable();
    });
}


   
public function down(): void
{
    Schema::table('albums', function (Blueprint $table) {
        $table->dropColumn('artist_name');
        $table->dropColumn('genre_name');
    });
}
};
