<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedidos extends Model
{
    use HasFactory;
    protected $tabla = 'estado_pedidos';
    protected $fillable = [
        'id',
        'NombreEstado'
    ];
}
