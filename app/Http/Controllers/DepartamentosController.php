<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartamentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.departamentos.index')->only('index');
        $this->middleware('can:admin.departamentos.create')->only('create', 'update');
        $this->middleware('can:admin.departamentos.destroy')->only('destroy');
    }

    public function index(){
        return view('departamentos.index');
    }

    public function listarDepartamento(){
        $dpt = Departamentos::all();
        return response()->json([
            'departamentos'=>$dpt,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $dpt = new Departamentos;
            $dpt->nombre = $request->input('nombre');
            $dpt->save();
            return response()->json([
                'status'=>200,
                'message'=>'Departamento Registrado exitosamente',
            ]);
        }   
    }

    public function edit($id)
    {
        $dpt = Departamentos::find($id);

        if ($dpt) {
            return response()->json([
                'status'=>200,
                'departamento'=>$dpt,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Departamento No funciona.'
            ]);
        }
        
    }

    public function actualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $dpt = Departamentos::find($id);

            if ($dpt) {
                $dpt->nombre = $request->input('nombre');
                $dpt->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Departamento Actualizado exitosamente',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Estado No funciona.'
                ]);
            } 
        }   
    }

    public function eliminar($id){
        $dpt = Departamentos::find($id);
        $dpt->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Departamento eliminado satisfactoriamente',
        ]);
    }

}
