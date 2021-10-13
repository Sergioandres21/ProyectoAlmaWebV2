<?php

namespace App\Http\Controllers;

use App\Models\profesionales;
use Illuminate\Http\Request;
use App\Models\municipio;

class ProfesionalesController extends Controller
{
    public function index(){
        $profesionales = profesionales::all();
 
        return view('admin.profesionales.index', compact('profesionales'));
     }
 
     public function create(){
 
        $municipio = municipio::pluck('nombreMunicipio', 'id')->toArray();
         
        return view('admin.profesionales.create', compact('municipio'));
     }

     public function store(Request $request)
     {
         $request->validate([
             'numeroIdentificacion' => 'required|digits:10|unique:profesionales',
             'id_municipio' => 'required',
             'tipoDocumento' => 'required',
             'nombres' => 'required|max:45',
             'apellidos' => 'required|max:40',
             'email' => 'required|max:45|email',
             'celular' => 'required|digits:10',
             'direccionResidencia' => 'required|max:55',
             'estado' => 'required'
         ]);
 
         $profesional = profesionales::create($request->all());
 
         alert()->success('Registro','Profesional creado con éxito');
 
         return redirect()->route('admin.profesionales.index', $profesional);
     }

     public function edit(profesionales $profesionale)
    {
        $municipio = municipio::pluck('nombreMunicipio', 'id')->toArray();
        
        return view('admin.profesionales.edit', compact('municipio', 'profesionale'));
    }

    public function update(Request $request, profesionales $profesionale)
    {
        $request->validate([
            'numeroIdentificacion' => 'required|digits:10|unique:proveedores',
            'id_municipio' => 'required',
            'tipoDocumento' => 'required',
            'nombres' => 'required|max:45',
            'apellidos' => 'required|max:40',
            'email' => 'required|max:45|email',
            'celular' => 'required|digits:10',
            'direccionResidencia' => 'required|max:55',
            'estado' => 'required'
        ]);

        $profesionale->update($request->all());

        alert()->success('Actualización','Proveedor actualizado con éxito');

        return redirect()->route('admin.profesionales.edit', $profesionale)->with('El profesional se actualizó con éxito');
    }

    public function destroy(profesionales $profesionale)
    {
        $profesionale->delete();

        return redirect()->route('admin.profesionales.index', $profesionale)->with('eliminar','ok');
    }
}
