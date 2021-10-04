<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoAgenda extends Model
{
    use HasFactory;
    protected $tabla = 'estado_agendas';
    protected $fillable = [
        'id',
        'NombreEstado',
        'estadoAgenda'
    ];
}
