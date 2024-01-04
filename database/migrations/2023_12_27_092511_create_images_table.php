<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
{
    Schema::create('images', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('album_id');
        $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
        $table->string('image_path')->nullable(); // Change to string and add nullable
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('images');
    }
}

