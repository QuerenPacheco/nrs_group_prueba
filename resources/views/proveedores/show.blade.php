@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Detalles del Proveedor</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2>{{ $proveedor->nombre_empresa }}</h2>
        </div>
        <div class="card-body">
            <p><strong>País:</strong> {{ $proveedor->pais }}</p>
            <p><strong>CIF:</strong> {{ $proveedor->cif }}</p>
            <p><strong>Fecha de alta:</strong> {{ $proveedor->fecha_alta }}</p>
            <h3>Calidades Asociadas</h3>
            @if($proveedor->calidades->isEmpty())
                <p>No hay calidades asociadas a este proveedor.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio de Compra</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedor->calidades as $calidad)
                            <tr>
                                <td>{{ $calidad->nombre }}</td>
                                <td>{{ $calidad->precio_compra }}</td>
                                <td>
                                    <a href="{{ route('calidades.edit', $calidad->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="{{ route('calidades.destroy', $calidad->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta calidad?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <a href="{{ route('calidades.create', $proveedor->id) }}" class="btn btn-success">Añadir Calidad</a>

    </div>
</div>
    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar Proveedor</button>
    </form>

<div class="d-grid gap-2 mt-3">
    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver a la Lista de Proveedores</a>
</div>
@endsection
