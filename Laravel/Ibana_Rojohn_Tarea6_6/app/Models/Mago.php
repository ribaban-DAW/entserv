<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mago extends Model
{
    use HasFactory;

    protected $table = "mago";

    protected $fillable = [
        "nombre",
        "nivel",
        "escuela",
        "varita",
        "mascota",
    ];
}
