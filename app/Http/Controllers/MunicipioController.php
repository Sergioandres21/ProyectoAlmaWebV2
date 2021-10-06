<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Models\municipio;
use Illuminate\Http\Request;


class MunicipioController extends Controller
{
    public function index(){
       $municipios = municipio::all();

       return view('admin.municipios.index', compact('municipios'));
    }

    public function create(){

        $departamentos = Departamentos::pluck('nombre', 'id')->toArray();
        
        return view('admin.municipios.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreMunicipio' => 'required|max:50|unique:municipios',
            'id_departamento' => 'required',
        ]);

        $municipio = municipio::create($request->all());

        alert()->success('Registro','Municipio creado con éxito');

        return redirect()->route('admin.municipios.index', $municipio);
    }

    public function edit(municipio $municipio)
    {
        $departamentos = Departamentos::pluck('nombre', 'id')->toArray();
        
        return view('admin.municipios.edit', compact('departamentos', 'municipio'));
    }

    public function update(Request $request, municipio $municipio)
    {
        $request->validate([
            'nombreMunicipio' => 'required|max:50|unique:municipios',
            'id_departamento' => 'required',
        ]);

        $municipio->update($request->all());

        alert()->success('Actualización','Municipio actualizado con éxito');

        return redirect()->route('admin.municipios.edit', $municipio)->with('El municipio se actualizó con éxito');
    }

    public function destroy(municipio $municipio)
    {
        $municipio->delete();

        return redirect()->route('admin.municipios.index', $municipio)->with('eliminar','ok');
    }
}
