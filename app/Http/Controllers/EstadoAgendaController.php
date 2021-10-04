<?php

namespace App\Http\Controllers;

use App\Models\estadoAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoAgendaController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('can:admin.estadopedidos.index')->only('index');
        $this->middleware('can:admin.estadopedidos.create')->only('create', 'update');
        $this->middleware('can:admin.estadopedidos.destroy')->only('destroy');
    } */

    public function index(){
        return view('estadoAgenda.index');
    }

    public function listarEstadoAgenda(){
        $estadoAgenda = estadoAgenda::all();
        return response()->json([
            'estadoAgenda'=>$estadoAgenda,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
            'estadoAgenda'=>'required|digits:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $estadoAgenda = new estadoAgenda;
            $estadoAgenda->NombreEstado = $request->input('nombre');
            $estadoAgenda->estadoAgenda = $request->input('estadoAgenda');
            $estadoAgenda->save();
            return response()->json([
                'status'=>200,
                'message'=>'Estado Registrado exitosamente',
            ]);
        }   
    }

    public function edit($id)
    {
        $estadoAgenda = estadoAgenda::find($id);

        if ($estadoAgenda) {
            return response()->json([
                'status'=>200,
                'estado'=>$estadoAgenda,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Estado No funciona.'
            ]);
        }
        
    }

    public function actualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
            'estadoAgenda'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $estado = estadoAgenda::find($id);

            if ($estado) {
                $estado->NombreEstado = $request->input('nombre');
                $estado->estadoAgenda = $request->input('estadoAgenda');
                $estado->update();
                
                return response()->json([
                    'status'=>200,
                    'message'=>'Estado Actualizado exitosamente',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Estado No funciona.'
                ]);
            } 
        }   
    }

    public function actualizarEstadoAgenda(Request $request){
        $estadoAgenda = estadoAgenda::findOrFail($request->id)->update(['estado' => $request->estadoAgenda]); 

        if($request->estadoAgenda == 0)  {
            $nuevoestado = '<br> <button type="button" class="btn btn-sm btn-danger">Inactivo</button>';
        }else{
            $nuevoestado ='<br> <button type="button" class="btn btn-sm btn-success">Activo</button>';
        }
    
        return response()->json(['var'=>''.$nuevoestado.'']);
    }

    public function eliminar($id){
        $estadoAgenda = estadoAgenda::find($id);
        $estadoAgenda->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Estado eliminado satisfactoriamente',
        ]);
    } 
}
