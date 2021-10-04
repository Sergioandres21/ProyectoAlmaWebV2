<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TipoServicio;

class TipoServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tipoServicios.index')->only('index');
        $this->middleware('can:admin.registrar-tiposervicios.index');
    }

    public function index(){
        return view('tipoServicios.index');
    }

    public function listarTiposervicios(){
        $tipoServicio = TipoServicio::all();
        return response()->json([
            'tipoServicio'=>$tipoServicio,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
            'estado'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $tipoServicio = new TipoServicio;
            $tipoServicio->nombreTiposervicio = $request->input('nombre');
            $tipoServicio->estado = $request->input('estado');
            $tipoServicio->save();
            return response()->json([
                'status'=>200,
                'message'=>'Tipo de servicio Registrado exitosamente',
            ]);
        }   
    }

    public function edit($id)
    {
        $tipoServicio = TipoServicio::find($id);

        if ($tipoServicio) {
            return response()->json([
                'status'=>200,
                'tipoServicio'=>$tipoServicio,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Tipo de servicio No funciona.'
            ]);
        }
        
    }

    public function actualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
            'estado'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $tipoServicio = TipoServicio::find($id);

            if ($tipoServicio) {
                $tipoServicio->nombreTiposervicio = $request->input('nombre');
                $tipoServicio->estado = $request->input('estado');
                $tipoServicio->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Tipo de servicio Actualizado exitosamente',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Tipo de servicio No funciona.'
                ]);
            } 
        }   
    }

    public function actualizarestado(Request $request){
        $estadotipoServicio = TipoServicio::findOrFail($request->id)->update(['estado' => $request->estado]); 

        if($request->estado == 0)  {
            $nuevoestado = '<br> <button type="button" class="btn btn-sm btn-danger">Inactivo</button>';
        }else{
            $nuevoestado ='<br> <button type="button" class="btn btn-sm btn-success">Activo</button>';
        }
    
        return response()->json(['var'=>''.$nuevoestado.'']);
    }

    public function eliminar($id){
        $tipoServicio = TipoServicio::find($id);
        $tipoServicio->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Tipo servicio eliminado satisfactoriamente',
        ]);
    }
}
