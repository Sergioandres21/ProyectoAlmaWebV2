<?php

namespace Database\Seeders;

use App\Models\QuienesSomos;
use Illuminate\Database\Seeder;

class QuienesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuienesSomos::create([
            'mision' => 'Somos un Centro Integral de Estética y belleza dedicado a mejorar y mantener la belleza del rostro y cuerpo buscando la unificación del concepto belleza-salud, mediante productos de alta calidad en combinación con aparatología de última generación y lo último en técnicas manuales lo que hacen de “ALMA CENTRO DE ESTÉTICA” un espacio único de bienestar, donde la imagen toma punto clave para lograr el éxito tanto personal como profesional, ya que una buena imagen detona belleza, armonía y Salud.',
            'vision' => 'Para el año 2021 “ALMA CENTRO DE ESTÉTICA” se proyecta Convertir en una referencia en el mercado regional a través de la excelencia en la calidad en la provisión de servicios de estética, refiriéndose a los desafíos de la innovación, la actualización constante de los tratamientos y las inversiones estructurales.',
            'quienes' => '“ALMA CENTRO DE ESTÉTICA” es una microempresa de servicios en belleza y estética, con domicilio 16-188 Calle Santa Bárbara, Yolombó, Colombia, constituida en junio del año 2020 y que tiene por objeto brindar a sus clientes: Servicios y tratamientos de belleza y estética especializada en cosmetología; ofrece soluciones a los problemas relacionados con impurezas faciales, Maso terapia, Estética de depilación, Porcelanización facial, entre otros servicios.',
        ]);
    }
}
