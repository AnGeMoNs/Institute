<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InsertarUbicacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Ubicacion')->insert(array(
            ['Region' => 'Antofagasta','Ciudad_Comuna' => 'Antofagasta','Calle' => 'Prat-530'],
            ['Region' => 'Biobio','Ciudad_Comuna' => 'Concepcion','Calle' => 'Larenas-182']
        ));
    }
}

