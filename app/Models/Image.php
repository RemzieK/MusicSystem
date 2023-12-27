<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['album_id', 'image_data'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}