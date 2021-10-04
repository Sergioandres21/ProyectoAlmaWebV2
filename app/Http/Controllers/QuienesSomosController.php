<?php

namespace App\Http\Controllers;

use App\Models\QuienesSomos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuienesSomosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.quienes-somos.index')->only('index');
    }

    public function index(){
        $quienes=QuienesSomos::all();
        return view('quienesSomos.index')->with('quienes', $quienes);
    }

    public function listarQuienes(){
        $quienes = QuienesSomos::all();
        return response()->json([
            'quienes'=>$quienes,
        ]);
    }

    public function edit($id)
    {
        $quienes = QuienesSomos::find($id);

        if ($quienes) {
            return response()->json([
                'status'=>200,
                'quienes'=>$quienes,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Registro No funciona.'
            ]);
        }
        
    }

    public function actualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'quienes'=>'required|max:500',
            'mision'=>'required|max:500',
            'vision'=>'required|max:500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $quienes = QuienesSomos::find($id);

            if ($quienes) {
                $quienes->quienes = $request->input('quienes');
                $quienes->mision = $request->input('mision');
                $quienes->vision = $request->input('vision');
                $quienes->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Registro Actualizado exitosamente',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Registro No funciona.'
                ]);
            } 
        }   
    }

}
