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

        Permission::create(['name' => 'admin.permisos.index', 'description' => 'Ver listado de permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permisos.create', 'description' => 'Registrar permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permisos.edit', 'description' => 'Editar permisos de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permisos.show', 'description' => 'Ver permisos de usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.departamentos.index', 'description' => 'Ver departamentos'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.contacto.index', 'description' => 'Ver listado de redes sociales'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tipoServicios.index', 'description' => 'Ver tipo de servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.registrar-tiposervicios.index', 'description' => 'Registrar tipo de servicios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tarifaServicios.index', 'description' => 'Ver tarifa de servicios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.registrar-tarifaservicios.index', 'description' => 'Registrar tarifa de servicios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.quienes-somos.index', 'description' => 'Registrar información de la página principal'])->syncRoles([$role1]);

        Permission::create(['name' => 'user.home', 'description' => 'Ver página principal del usuario'])->syncRoles([$role2]);
        Permission::create(['name' => 'profesional.home', 'description' => 'Ver página principal del profesional'])->syncRoles([$role3]);
    }
}
