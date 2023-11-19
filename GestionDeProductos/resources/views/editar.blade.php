@extends('layouts.main')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-4">
    <h1>Editar Producto</h1>
    <form action="{{ route('producto.editar', $producto->idProducto) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" value="{{ $producto->Codigo }}">
        </div>

        <div class="mb-3">
            <label for="Nombre_P" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre_P" name="Nombre_P" value="{{ $producto->Nombre_P }}">
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{ $producto->Descripcion }}">
        </div>

        <div class="mb-3">
            <label for="Cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" value="{{ $producto->Cantidad }}">
        </div>

        <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="Precio" name="Precio" value="{{ $producto->Precio }}">
        </div>

        <div class="mb-3">
            <label for="idCategoria1" class="form-label">Categoría</label>
            <select class="form-select" id="idCategoria1" name="idCategoria1">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->idCategoria }}" {{ $producto->idCategoria1 == $categoria->idCategoria ? 'selected' : '' }}>
                        {{ $categoria->Nombre_C }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idSucursal1" class="form-label">Sucursal</label>
            <select class="form-select" id="idSucursal1" name="idSucursal1">
                @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->idSucursal }}" {{ $producto->idSucursal1 == $sucursal->idSucursal ? 'selected' : '' }}>
                        {{ $sucursal->Nombre_S }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Administrado_Por" class="form-label">Administrado Por</label>
            <select class="form-select" id="Administrado_Por" name="Administrado_Por">
                @foreach ($administradores as $administrador)
                    <option value="{{ $administrador->idAdministradores }}" {{ $producto->Administrado_Por == $administrador->idAdministradores ? 'selected' : '' }}>
                        {{ $administrador->Nombre_A }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection
