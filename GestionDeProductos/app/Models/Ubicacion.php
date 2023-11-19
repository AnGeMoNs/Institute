<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'Ubicacion';
    protected $primaryKey = 'idUbicacion';
    public function sucursal() {
        return $this->hasMany(Sucursal::class, 'Ubicacion1','idUbicacion');
    }
}


