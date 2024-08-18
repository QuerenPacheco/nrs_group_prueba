@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Proveedores</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if ($proveedores->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>País</th>
                        <th>CIF</th>
                        <th>Fecha de Alta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre_empresa }}</td>
                            <td>{{ $proveedor->pais }}</td>
                            <td>{{ $proveedor->cif }}</td>
                            <td>{{ $proveedor->fecha_alta->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-info text-center">No hay proveedores disponibles en este momento.</p>
        @endif
        
        <a href="{{ route('proveedores.create') }}" class="btn btn-success">Añadir Proveedor</a>
        <a href="{{ url('/exportarProveedores') }}" class="btn btn-primary">Exportar a CSV</a>

    </div>
@endsection
