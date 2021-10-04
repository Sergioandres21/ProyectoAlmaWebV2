<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarifaServicio extends Model
{
    use HasFactory;
    protected $tabla = 'tarifa_servicios';
    protected $fillable = [
        'id',
        'anoTarifa',
        'resolucion'
    ];
}
