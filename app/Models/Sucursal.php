<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'Sucursal';
    protected $primaryKey ='idSucursal'; 

    public function productos1() {
        return $this->hasMany(Producto::class,'idSucursal1', 'idSucursal');
    }
    public function ubicaciones() {
        return $this->belongsTo(Ubicacion::class, 'Ubicacion1');
    }
}
