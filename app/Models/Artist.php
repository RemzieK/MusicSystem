<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name', 'is_group'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
