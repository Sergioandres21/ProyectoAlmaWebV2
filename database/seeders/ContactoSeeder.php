<?php

namespace Database\Seeders;

use App\Models\Contacto;
use Illuminate\Database\Seeder;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contacto::create([
            'whatsapp' => 'https://wa.link/kobe1c',
            'email' => 'almacentroestetica@gmail.com',
            'instagram' => 'https://www.instagram.com/almaestetica20/',
            'descripcion' => 'Es un gusto poder atenderte como en realidad te lo mereces.'
        ]);
    }
}
