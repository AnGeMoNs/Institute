<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Producto extends Model {
    protected $table = 'producto';
    protected $primaryKey = 'idProducto';
    public function categoria() {
        return $this->belongsTo(Categoria::class, 'idCategoria1');
    }
    public function sucursal() {
        return $this->belongsTo(Sucursal::class, 'idSucursal1');
    }
    public function administrador() {
        return $this->belongsTo(Administradores::class, 'Administrado_Por');
    }
    protected $fillable = ['Codigo', 'Nombre_P', 'Descripcion', 'Cantidad', 'Precio', 'idCategoria1', 'idSucursal1', 'Administrado_Por'];

    public function contador() {
        return self::count();
    }

    public function listar() {
        return self::all(); 
    }

    
   /* public function buscar(Request $request) {
        $busqueda = $request->get('busqueda');
        return self::where('Codigo', 'LIKE', '%' . $busqueda . '%')
                   ->orWhere('Nombre_P', 'LIKE', '%' . $busqueda . '%')
                   ->orWhere('idSucursal1', 'LIKE', '%' . $busqueda . '%')
                   ->get();
    }*/
}
