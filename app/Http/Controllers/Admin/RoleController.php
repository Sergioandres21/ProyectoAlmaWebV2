<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

Use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles',
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        alert()->success('Registro','Rol creado con éxito');

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se creo con éxito');
    }


    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:80|unique:roles'
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        alert()->success('Registro','Permiso actualizado con éxito');

        return redirect()->route('admin.roles.edit', $role)->with('info', 'El rol se actualizó con éxito');
    }


    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index', $role)->with('eliminar','ok');
    }
}
