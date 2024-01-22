<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->mediumBlob('image_data')->change();
        });
    }
    
    
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
    
};
