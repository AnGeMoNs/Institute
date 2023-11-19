<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InsertarSucursal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sucursal')->insert(array(
            ['Nombre_S' => 'Norte','Ubicacion1' => 1,],
            ['Nombre_S' => 'Penquista','Ubicacion1' => 2,]
        ));
    }
}

