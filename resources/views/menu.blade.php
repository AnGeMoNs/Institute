@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h1>Lista de Productos</h1>
    <div class="my-3">
        <form action="{{ route('producto.buscar') }}" method="GET" class="d-inline">
            <input type="text" name="busqueda" placeholder="Buscar productos..." class="form-control d-inline w-auto">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <a href="{{ route('producto.mostrarCrear') }}" class="btn btn-success ms-2">Crear Nuevo Producto</a>
        <div class="d-inline-block ms-2 text-end">
            @auth('admin')
               <div class="p-2 bg-dark text-white rounded-3 d-flex justify-content-center align-items-center" style="height: 40px;">
                   {{ Auth::guard('admin')->user()->Nombre_A }}
               </div>
            @endauth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Cerrar Sesión</button>
            </form>
        </div>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>ID Categoría</th>
                <th>ID Sucursal</th>
                <th>Administrado Por</th>
                <th>Acciones</th>
                <th>Creación</th>
                <th>Última Actualización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productosinicio as $producto)
                <tr>
                    <td>{{ $producto->idProducto }}</td>
                    <td>{{ $producto->Codigo }}</td>
                    <td>{{ $producto->Nombre_P }}</td>
                    <td>{{ $producto->Descripcion }}</td>
                    <td>{{ $producto->Cantidad }}</td>
                    <td>{{ $producto->Precio }}</td>
                    <td>{{ $producto->idCategoria1 }}</td>
                    <td>{{ $producto->idSucursal1 }}</td>
                    <td>{{ $producto->administrador->Nombre_A }}</td>
                    <td>
                        <form action="{{ route('producto.eliminar', $producto->idProducto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro quieres eliminar este producto?')">Eliminar</button>
                        </form>
                        <a href="{{ route('producto.mostrarEditar', $producto->idProducto) }}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    <td>{{ $producto->created_at }}</td>
                    <td>{{ $producto->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
