<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $primaryKey = 'numeroIdentificacion';
    public $incrementing = false;
    protected $tabla = 'proveedores';
    protected $fillable = [
        'numeroIdentificacion',
        'id_municipio',
        'tipoDocumento',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'celular',
        'direccionResidencia',
        'estado'
    ];

    public function municipios(){
        return $this->belongsTo(municipio::class, 'id_municipio');
    }
}
