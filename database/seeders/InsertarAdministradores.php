<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InsertarAdministradores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Administradores')->insert(array(
            ['Nombre_A' => 'admin','Contrasena' => '1234',]
        ));
    }
}

