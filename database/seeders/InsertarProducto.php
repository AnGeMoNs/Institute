<?php

namespace Database\Seeders;
use App\Models\Producto; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InsertarProducto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'Codigo' => '12345678901234',
            'Nombre_P' => 'Iphone15',
            'Descripcion' => 'CorreResident4',
            'Cantidad' => 3,
            'Precio' => 800000,
            'idCategoria1' => 1,
            'idSucursal1' => 1,
            'Administrado_Por' => 1
        ]);

        Producto::create([
            'Codigo' => '92345678901234',
            'Nombre_P' => 'NikeAirMax',
            'Descripcion' => 'Comodidad-moderna',
            'Cantidad' => 24,
            'Precio' => 90000,
            'idCategoria1' => 2,
            'idSucursal1' => 2,
            'Administrado_Por' => 1
        ]);
    }
}
