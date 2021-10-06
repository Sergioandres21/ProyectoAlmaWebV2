<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursales extends Model
{
    use HasFactory;
    protected $tabla = 'sucursales';
    protected $fillable = [
        'id',
        'id_municipio',
        'nombreSucursal',
        'direccion'
    ];

    public function municipios(){
        return $this->belongsTo(municipio::class, 'id_municipio');
    }
}
