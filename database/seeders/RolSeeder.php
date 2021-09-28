<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Usuario']);
        $role3 = Role::create(['name' => 'Profesional']);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver el dashboard'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Asignar un rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver llistado de categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 'description' => 'Eliminar categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.index', 'description' => 'Ver listado de etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.create', 'description' => 'Crear etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit', 'description' => 'Editar etiquetas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy', 'description' => 'Eliminar etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'user.home', 'description' => 'Ver página principal del usuario'])->syncRoles([$role2]);
        Permission::create(['name' => 'profesional.home', 'description' => 'Ver página principal del profesional'])->syncRoles([$role3]);
    }
}
