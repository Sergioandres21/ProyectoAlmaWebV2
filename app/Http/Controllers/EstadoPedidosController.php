<?php

namespace App\Http\Controllers;

use App\Models\EstadoPedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoPedidosController extends Controller
{
/*     public function __construct()
    {
        $this->middleware('can:admin.estadopedidos.index')->only('index');
        $this->middleware('can:admin.estadopedidos.create')->only('create', 'update');
        $this->middleware('can:admin.estadopedidos.destroy')->only('destroy');
    } */

    public function index(){
        return view('estadoPedidos.index');
    }

    public function listarEstado(){
        $estado = EstadoPedidos::all();
        return response()->json([
            'estadoPedidos'=>$estado,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50|unique:estadopedidos',
            'estadoPedido'=>'required|digits:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $estado = new EstadoPedidos;
            $estado->NombreEstado = $request->input('nombre');
            $estado->estadoPedido = $request->input('estadoPedido');
            $estado->save();
            return response()->json([
                'status'=>200,
                'message'=>'Estado Registrado exitosamente',
            ]);
        }   
    }

    public function edit($id)
    {
        $estado = EstadoPedidos::find($id);

        if ($estado) {
            return response()->json([
                'status'=>200,
                'estado'=>$estado,
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
            'nombre'=>'required|max:50|unique:estadopedidos',
            'estadoPedido'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $estado = EstadoPedidos::find($id);

            if ($estado) {
                $estado->NombreEstado = $request->input('nombre');
                $estado->estadoPedido = $request->input('estadoPedido');
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

    public function actualizarestado(Request $request){
        $estadorol = EstadoPedidos::findOrFail($request->id)->update(['estado' => $request->estado]); 

        if($request->estado == 0)  {
            $nuevoestado = '<br> <button type="button" class="btn btn-sm btn-danger">Inactivo</button>';
        }else{
            $nuevoestado ='<br> <button type="button" class="btn btn-sm btn-success">Activo</button>';
        }
    
        return response()->json(['var'=>''.$nuevoestado.'']);
    }

    public function eliminar($id){
        $estado = EstadoPedidos::find($id);
        $estado->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Estado eliminado satisfactoriamente',
        ]);
    }

}
