<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoagenda extends Model
{
    use HasFactory;
    protected $tabla = 'estadoagendas';
    protected $fillable = [
        'id',
        'NombreEstado',
        'estadoAgenda'
    ];
}
