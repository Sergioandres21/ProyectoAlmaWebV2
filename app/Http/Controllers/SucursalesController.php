<?php

namespace App\Http\Controllers;

use App\Models\sucursales;
use Illuminate\Http\Request;
use App\Models\municipio;

class SucursalesController extends Controller
{
    public function index(){
        $sucursales = sucursales::all();
 
        return view('admin.sucursales.index', compact('sucursales'));
     }
 
     public function create(){
 
         $municipio = municipio::pluck('nombreMunicipio', 'id')->toArray();
         
         return view('admin.sucursales.create', compact('municipio'));
     }

     public function store(Request $request)
     {
         $request->validate([
             'nombreSucursal' => 'required|max:50|unique:sucursales',
             'id_municipio' => 'required',
             'direccion' => 'required|max:50',
         ]);
 
         $sucursal = sucursales::create($request->all());
 
         alert()->success('Registro','Sucursal creada con éxito');
 
         return redirect()->route('admin.sucursales.index', $sucursal);
     }

     public function edit(sucursales $sucursale)
    {
        $municipio = municipio::pluck('nombreMunicipio', 'id')->toArray();
        
        return view('admin.sucursales.edit', compact('municipio', 'sucursale'));
    }

    public function update(Request $request, sucursales $sucursale)
    {
        $request->validate([
            'nombreSucursal' => 'required|max:50|unique:sucursales',
            'id_municipio' => 'required',
            'direccion' => 'required|max:50',
        ]);

        $sucursale->update($request->all());

        alert()->success('Actualización','Sucursal actualizada con éxito');

        return redirect()->route('admin.sucursales.edit', $sucursale)->with('La sucursal se actualizó con éxito');
    }

    public function destroy(sucursales $sucursale)
    {
        $sucursale->delete();

        return redirect()->route('admin.sucursales.index', $sucursale)->with('eliminar','ok');
    }
}
