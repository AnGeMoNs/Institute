<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Sucursal;
use App\Models\Administradores;
use Illuminate\Http\Request;

class ProductoController extends Controller {

    public function inicio() {
        $productosinicio = Producto::with('administrador')->get();
        return view('menu', ['productosinicio' => $productosinicio]);
    }
    

    public function mostrarCrear() {
        $categorias = Categoria::all();
        $sucursales = Sucursal::all();
        $administradores = Administradores::all();

        return view('crear', [
            'categorias' => $categorias,
            'sucursales' => $sucursales,
            'administradores' => $administradores
        ]);
    }

    public function crear(Request $request) {
        //dd($request->all());
        $request->validate([
            'Codigo' => 'required|unique:Producto,Codigo',
            'Nombre_P' => 'required',
            'Descripcion' => 'required',
            'Cantidad' => 'required|integer|min:0',
            'Precio' => 'required|numeric|min:0',
            'idCategoria1' => 'required|exists:Categoria,idCategoria',
            'idSucursal1' => 'required|exists:Sucursal,idSucursal',
            'Administrado_Por' => 'required|exists:Administradores,idAdministradores'
        ],[
            'Codigo.unique' => 'El codigo ya existe, cambialo',
            'Cantidad.min' => 'La cantidad no puede ser negativa.',
            'Precio.min' => 'El precio no puede ser negativo.',
        ]);
    
        $producto = new Producto();
        $producto->codigo = $request->input('Codigo');
        $producto->nombre_p = $request->input('Nombre_P');
        $producto->descripcion = $request->input('Descripcion');
        $producto->cantidad = $request->input('Cantidad');
        $producto->precio = $request->input('Precio');
        $producto->idcategoria1 = $request->input('idCategoria1');
        $producto->idsucursal1 = $request->input('idSucursal1');
        $producto->administrado_por = $request->input('Administrado_Por');
        $producto->save();
    
        
         return redirect()->route('menu.web')->with('success', 'Producto creado con éxito');
    }
    public function eliminar($id) {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->delete();
            return redirect()->route('menu.web')->with('success', 'Producto eliminado con éxito');
        } else {
            return redirect()->route('menu.web')->with('error', 'Producto no encontrado');
        }
    }
    public function editar(Request $request, $id) {
        $request->validate([
            'Codigo' => 'required|unique:Producto,Codigo,'.$id.',idProducto',
            'Nombre_P' => 'required',
            'Descripcion' => 'required',
            'Cantidad' => 'required|integer|min:0',
            'Precio' => 'required|numeric|min:0',
            'idCategoria1' => 'required|exists:Categoria,idCategoria',
            'idSucursal1' => 'required|exists:Sucursal,idSucursal',
            'Administrado_Por' => 'required|exists:Administradores,idAdministradores'
        ],[
            'Codigo.unique' => 'El codigo ya existe, cambialo',
            'Cantidad.min' => 'La cantidad no puede ser negativa.',
            'Precio.min' => 'El precio no puede ser negativo.',
        ]);
    
        $producto = Producto::findOrFail($id);
        $producto->update([
            'Codigo' => $request->input('Codigo'),
            'Nombre_P' => $request->input('Nombre_P'),
            'Descripcion' => $request->input('Descripcion'),
            'Cantidad' => $request->input('Cantidad'),
            'Precio' => $request->input('Precio'),
            'idCategoria1' => $request->input('idCategoria1'),
            'idSucursal1' => $request->input('idSucursal1'),
            'Administrado_Por' => $request->input('Administrado_Por')
        ]);
    
        return redirect()->route('menu.web')->with('success', 'Producto actualizado con éxito');
    }
    public function mostrarEditar($id) {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $sucursales = Sucursal::all();
        $administradores = Administradores::all();
    
        return view('editar', [
            'producto' => $producto,
            'categorias' => $categorias,
            'sucursales' => $sucursales,
            'administradores' => $administradores
        ]);
    }

    public function buscar(Request $request) {
        $busqueda = $request->get('busqueda');
        $productos = Producto::query();
    
        if (!empty($busqueda)) {
            $productos->where(function ($query) use ($busqueda) {
                $query->where('Codigo', 'LIKE', '%' . $busqueda . '%')
                      ->orWhere('Nombre_P', 'LIKE', '%' . $busqueda . '%');
            });
    
            if (is_numeric($busqueda)) {
                $productos->orWhere('idSucursal1', $busqueda);
            }
        }
    
        $productos = $productos->get();
        return view('resultados_busqueda', ['productos' => $productos]);
    }    
}
