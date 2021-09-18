<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuienesSomos extends Model
{
    use HasFactory;
    protected $tabla = 'quienes_somos';
    protected $fillable = [
        'id',
        'mision',
        'vision',
        'quienes'
    ];
}
