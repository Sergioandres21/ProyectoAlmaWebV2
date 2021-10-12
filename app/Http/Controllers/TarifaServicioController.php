<?php

namespace App\Http\Controllers;

use App\Models\tarifaServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarifaServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tarifaServicios.index')->only('index');
        $this->middleware('can:admin.registrar-tarifaservicios.index');
    }

    public function index(){
        return view('tarifaServicios.index');
    }

    public function listarTarifaservicios(){
        $tarifaServicio = tarifaServicio::all();
        return response()->json([
            'tarifaServicio'=>$tarifaServicio,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'anotarifa'=>'required|digits:4|unique:tarifa_servicios',
            'resolucion'=>'required|max:100|unique:tarifa_servicios'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $tarifaServicio = new tarifaServicio;
            $tarifaServicio->anoTarifa = $request->input('anotarifa');
            $tarifaServicio->resolucion = $request->input('resolucion');
            $tarifaServicio->save();
            return response()->json([
                'status'=>200,
                'message'=>'Tarifa de servicio Registrado exitosamente',
            ]);
        }   
    }

    public function edit($id)
    {
        $tarifaServicio = tarifaServicio::find($id);

        if ($tarifaServicio) {
            return response()->json([
                'status'=>200,
                'tarifaServicio'=>$tarifaServicio,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Tarifa de servicio No funciona.'
            ]);
        }
        
    }

    public function actualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'anoTarifa'=>'required|digits:4|unique:tarifa_servicios',
            'resolucion'=>'required|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $tarifaServicio = tarifaServicio::find($id);

            if ($tarifaServicio) {
                $tarifaServicio->anoTarifa = $request->input('anoTarifa');
                $tarifaServicio->resolucion = $request->input('resolucion');
                $tarifaServicio->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Tarifa de servicio Actualizado exitosamente',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Tarifa de servicio No funciona.'
                ]);
            } 
        }   
    }

    public function eliminar($id){
        $tarifaServicio = tarifaServicio::find($id);
        $tarifaServicio->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Tarifa de servicio eliminado satisfactoriamente',
        ]);
    }
}
