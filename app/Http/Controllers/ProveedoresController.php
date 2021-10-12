<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use Illuminate\Http\Request;
use App\Models\municipio;

class ProveedoresController extends Controller
{
    public function index(){
        $proveedores = proveedores::all();
 
        return view('admin.proveedores.index', compact('proveedores'));
     }
 
     public function create(){
 
        $municipio = municipio::pluck('nombreMunicipio', 'id')->toArray();
         
        return view('admin.proveedores.create', compact('municipio'));
     }

     public function store(Request $request)
     {
         $request->validate([
             'numeroIdentificacion' => 'required|digits:10|unique:proveedores',
             'id_municipio' => 'required',
             'tipoDocumento' => 'required',
             'nombres' => 'required|max:45',
             'apellidos' => 'required|max:40',
             'email' => 'required|max:45|email',
             'telefono' => 'required|digits:7',
             'celular' => 'required|digits:10',
             'direccionResidencia' => 'required|max:55',
             'estado' => 'required'
         ]);
 
         $proveedor = proveedores::create($request->all());
 
         alert()->success('Registro','Proveedor creado con éxito');
 
         return redirect()->route('admin.proveedores.index', $proveedor);
     }

     public function edit(proveedores $proveedore)
    {
        $municipio = municipio::pluck('nombreMunicipio', 'id')->toArray();
        
        return view('admin.proveedores.edit', compact('municipio', 'proveedore'));
    }

    public function update(Request $request, proveedores $proveedore)
    {
        $request->validate([
            'numeroIdentificacion' => 'required|digits:10|unique:proveedores',
            'id_municipio' => 'required',
            'tipoDocumento' => 'required',
            'nombres' => 'required|max:45',
            'apellidos' => 'required|max:40',
            'email' => 'required|max:45|email',
            'telefono' => 'required|digits:7',
            'celular' => 'required|digits:10',
            'direccionResidencia' => 'required|max:55',
            'estado' => 'required'
        ]);

        $proveedore->update($request->all());

        alert()->success('Actualización','Proveedor actualizado con éxito');

        return redirect()->route('admin.proveedores.edit', $proveedore)->with('El proveedor se actualizó con éxito');
    }

    public function destroy(proveedores $proveedore)
    {
        $proveedore->delete();

        return redirect()->route('admin.proveedores.index', $proveedore)->with('eliminar','ok');
    }
}
