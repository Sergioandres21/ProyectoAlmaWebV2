<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sergio Andrés',
            'email' => 'sergio@gmail.com',
            'password' => bcrypt('sergio')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Manuela',
            'email' => 'manuela@gmail.com',
            'password' => bcrypt('manuela')
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Alejandra',
            'email' => 'alejandra@gmail.com',
            'password' => bcrypt('alejandra')
        ])->assignRole('Profesional');

        /* $useradmin=User::create([
            'name' => 'admin sergio',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'fullacces' => 'yes',
            'codigo' => 'adm1',
        ]);

        $user1=User::create([
            'name' => 'usuario manuela',
            'email' => 'manuela@gmail.com',
            'password' => Hash::make('manuela'),
            'fullacces' => 'no',
            'codigo' => 'casa1',
        ]);

        $profesional1=User::create([
            'name' => 'profesional alejandra',
            'email' => 'alejandra@gmail.com',
            'password' => Hash::make('alejandra'),
            'fullacces' => 'no',
            'codigo' => 'casa2',
        ]); */
    }
}
