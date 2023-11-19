<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administradores extends Authenticatable
{
    use Notifiable;
    protected $table = 'Administradores'; 
    protected $primaryKey ='idAdministradores';
    protected $fillable = ['Nombre_A', 'Contrasena'];
    protected $hidden = [
        'Contrasena', 
    ];

    protected $casts = [];

    public function productos2() {
        return $this->hasMany(Producto::class,'Administrado_Por', 'idAdministradores');
    }

    public function getAuthPassword()
    {
        return $this->Contrasena;
    }
}
