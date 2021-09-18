<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index(){
        $roles=Roles::all();
        return view('roles.index')->with('roles', $roles);
    }

    public function listarRoles(){
        $roles = Roles::all();
        return response()->json([
            'roles'=>$roles,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
            'descripcion'=>'required|max:254',
            'estado'=>'required|digits:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $roles = new Roles;
            $roles->nombre = $request->input('nombre');
            $roles->descripcion = $request->input('descripcion');
            $roles->estado = $request->input('estado');
            $roles->save();
            return response()->json([
                'status'=>200,
                'message'=>'Rol Registrado exitosamente',
            ]);
        }   
    }

    public function edit($id)
    {
        $rol = Roles::find($id);

        if ($rol) {
            return response()->json([
                'status'=>200,
                'roles'=>$rol,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Rol No funciona.'
            ]);
        }
        
    }

    public function actualizar(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre'=>'required|max:50',
            'descripcion'=>'required|max:254',
            'estado'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $rol = Roles::find($id);

            if ($rol) {
                $rol->nombre = $request->input('nombre');
                $rol->descripcion = $request->input('descripcion');
                $rol->estado = $request->input('estado');
                $rol->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Rol Actualizado exitosamente',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Rol No funciona.'
                ]);
            } 
        }   
    }

    public function actualizarestado(Request $request){
        $estadorol = Roles::findOrFail($request->id)->update(['estado' => $request->estado]); 

        if($request->estado == 0)  {
            $nuevoestado = '<br> <button type="button" class="btn btn-sm btn-danger">Inactivo</button>';
        }else{
            $nuevoestado ='<br> <button type="button" class="btn btn-sm btn-success">Activo</button>';
        }
    
        return response()->json(['var'=>''.$nuevoestado.'']);
    }

    public function eliminar($id){
        $rol = Roles::find($id);
        $rol->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Rol eliminado satisfactoriamente',
        ]);
    }

}
