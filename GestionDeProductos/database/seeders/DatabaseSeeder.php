<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InsertarCategoria::class);
        $this->call(InsertarUbicacion::class);
        $this->call(InsertarAdministradores::class);
        $this->call(InsertarSucursal::class);
        $this->call(InsertarProducto::class);
    }
}
