<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class canciones extends Model
{
    protected $fillable = [
        'nombre', 'artista', 'duracion', 'imagen', 'audio'
    ];
    
    public function artista()
    {
        return $this->belongsTo(artista::class);
    }
}
