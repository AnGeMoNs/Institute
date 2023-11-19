<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InsertarCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categoria')->insert(array(
            ['Nombre_C' => 'Celulares','Tipo' => 'Electronica',],
            ['Nombre_C' => 'Zapatillas_H','Tipo' => 'Zapatos',],
            ['Nombre_C' => 'Audifonos', 'Tipo' => 'Audio'],
            ['Nombre_C' => 'Notebooks', 'Tipo' => 'Computacion'],
            ['Nombre_C' => 'Consolas', 'Tipo' => 'Videojuegos']
        ));
    }
}

