<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generos extends Model
{
    protected $fillable = [
        'genero', 'descripcion', 'portada'
    ];

}
