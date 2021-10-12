<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    protected $tabla = 'municipios';
    protected $fillable = [
        'id',
        'id_departamento',
        'nombreMunicipio'
    ];

    public function sucursales(){
        return $this->hasMany(sucursal::class, 'id');
    }

    public function departamentos(){
        return $this->belongsTo(Departamentos::class, 'id_departamento');
    }

    public function proveedores(){
        return $this->hasMany(proveedores::class, 'numeroIdentificacion');
    }
}
