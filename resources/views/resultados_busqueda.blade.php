{{-- resultados_busqueda.blade.php --}}
@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h1>Resultados de tu Búsqueda</h1>
    @if(count($productos) > 0)
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>ID Sucursal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->Codigo }}</td>
                        <td>{{ $producto->Nombre_P }}</td>
                        <td>{{ $producto->Descripcion }}</td>
                        <td>{{ $producto->Cantidad }}</td>
                        <td>{{ $producto->Precio }}</td>
                        <td>{{ $producto->idSucursal1 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay nada!!!</p>
    @endif
</div>
@endsection
