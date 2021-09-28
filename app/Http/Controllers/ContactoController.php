<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactoController extends Controller
{
    public function index(){
        $contacto=Contacto::all();
        return view('contactos.index')->with('contacto', $contacto);
    }

    public function listarContacto(){
        $contacto = Contacto::all();
        return response()->json([
            'contacto'=>$contacto,
        ]);
    }

    public function edit($id)
    {
        $contacto = Contacto::find($id);

        if ($contacto) {
            return response()->json([
                'status'=>200,
                'contacto'=>$contacto,
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
            'whatsapp'=>'required|max:500',
            'email'=>'required|max:500|unique:contactos',
            'instagram'=>'required|max:500',
            'descripcion'=>'max:200'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $contacto = Contacto::find($id);

            if ($contacto) {
                $contacto->whatsapp = $request->input('whatsapp');
                $contacto->email = $request->input('email');
                $contacto->instagram = $request->input('instagram');
                $contacto->descripcion = $request->input('descripcion');
                $contacto->update();
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
