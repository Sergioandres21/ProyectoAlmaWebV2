<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.permisos.index');
        $this->middleware('can:admin.permisos.create');
        $this->middleware('can:admin.permisos.edit');
        $this->middleware('can:admin.permisos.show');
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permisos.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permisos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:permissions',
            'description' => 'required|max:80|unique:permissions'
        ]);

        $permiso = Permission::create($request->all());

        alert()->success('Registro','Permiso creado con éxito');

        return redirect()->route('admin.permisos.index')->with('El permiso se registro con éxito');
    }


    public function show($id)
    {
        $permission = Permission::find($id);

        return view('admin.permisos.show')->with('permission', $permission);
    }


    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('admin.permisos.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);

        $request->validate([
            'name' => 'required|max:50|unique:permissions',
            'description' => 'required|max:80|unique:permissions'
        ]);

        $permission->update($request->only('name', 'description'));

        alert()->success('Actualización','Permiso actualizado con éxito');

        return redirect()->route('admin.permisos.index')->with('El permiso se actualizó con éxito');
    }


    public function destroy($id)
    {
        $permission = Permission::find($id);
        
        $permission->delete();

        return redirect()->route('admin.permisos.index')->with('eliminar','ok');
    }
}
