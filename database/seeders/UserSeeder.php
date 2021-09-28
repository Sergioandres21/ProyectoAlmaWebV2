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
            'apellido' => 'Apellido',
            'email' => 'sergio@gmail.com',
            'password' => Hash::make('sergio'),
            'tipo' => '1',
            'celular' => '1234567821',
            'estado' => '1',
            'imagen' => 'img'
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Manuela',
            'apellido' => 'Apellido',
            'email' => 'manuela@gmail.com',
            'password' => Hash::make('manuela'),
            'tipo' => '2',
            'celular' => '1234567893',
            'estado' => '1',
            'imagen' => 'img'
        ])->assignRole('Usuario');

        User::create([
            'name' => 'Alejandra',
            'apellido' => 'Apellido',
            'email' => 'alejandra@gmail.com',
            'password' => hash::make('alejandra'),
            'tipo' => '3',
            'celular' => '1234567895',
            'estado' => '1',
            'imagen' => 'img'
        ])->assignRole('Profesional');

        /* $useradmin=User::create([
            'name' => 'admin sergio',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'fullacces' => 'yes',
            'codigo' => 'adm1',
        ])->assignRole('Profesional');

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
