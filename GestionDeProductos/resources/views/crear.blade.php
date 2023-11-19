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
    <h1>Registrar Nuevo Producto</h1>
    <form action="{{ route('producto.crear') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Codigo" class="form-label">Codigo</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" placeholder="alfanumerico 14">
        </div>

        <div class="mb-3">
            <label for="Nombre_P" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre_P" name="Nombre_P" placeholder="Nombre">
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion">
        </div>

        <div class="mb-3">
            <label for="Cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" placeholder="numeros">
        </div>

        <div class="mb-3">
            <label for="Precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="Precio" name="Precio" placeholder="numeros">
        </div>

        <div class="mb-3">
            <label for="idCategoria1" class="form-label">Categoría</label>
            <select class="form-select" id="idCategoria1" name="idCategoria1">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->idCategoria }}">{{ $categoria->Nombre_C }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="idSucursal1" class="form-label">Sucursal</label>
            <select class="form-select" id="idSucursal1" name="idSucursal1">
                @foreach ($sucursales as $sucursal)
                    <option value="{{ $sucursal->idSucursal }}">{{ $sucursal->Nombre_S }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Administrado_Por" class="form-label">Administrado Por</label>
            <select class="form-select" id="Administrado_Por" name="Administrado_Por">
                @foreach ($administradores as $administrador)
                    <option value="{{ $administrador->idAdministradores }}">{{ $administrador->Nombre_A }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar nuevo producto</button>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
@endsection
