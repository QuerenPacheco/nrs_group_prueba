@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Proveedor</h1>

        <!-- Mensaje de éxito si existe -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre_empresa) }}" required>
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais', $proveedor->pais) }}" required>
            </div>

            <div class="mb-3">
                <label for="cif" class="form-label">CIF</label>
                <input type="number" class="form-control" id="cif" name="cif" value="{{ old('cif', $proveedor->cif) }}" required></td> 
            </div>

            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha de Alta</label>
                <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="{{ old('fecha_alta', $proveedor->fecha_alta->format('Y-m-d')) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
