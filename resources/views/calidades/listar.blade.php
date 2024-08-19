@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Calidades</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($calidades->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio de Compra</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($calidades as $calidad)

                        <tr>
                            <td>{{ $calidad->id }}</td>
                            <td>{{ $calidad->nombre }}</td>
                            <td>{{ $calidad->precio_compra }}</td>
                            <td>{{ $calidad->proveedor->nombre_empresa }}</td>
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
        @else
            <p class="alert alert-info text-center">No hay calidades disponibles en este momento.</p>
        @endif

        <a href="{{ route('calidades.create') }}" class="btn btn-success">Añadir Calidad</a>
    </div>

@endsection
