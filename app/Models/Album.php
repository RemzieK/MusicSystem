<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $fillable = ['name', 'release_year', 'artist_id', 'genre_id', 'artist_name', 'genre_name'];

    public function artist()
{
    return $this->belongsTo(Artist::class, 'artist_id');
}

public function genre()
{
    return $this->belongsTo(Genre::class, 'genre_id');
}

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

