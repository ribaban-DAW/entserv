<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicacion';

    protected $fillable = [
        'titulo',
        'texto',
        'fechaCreacion',
        'publicado',
        'fechaPublicacion',
        'idCategoria',
    ];
}
