@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Añadir Proveedor</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('proveedores.store') }}" method="POST" class="col-6 mx-auto">
        @csrf

        <div class="mb-3">
            <label for="nombre_empresa" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" required>
        </div>

        <div class="mb-3">
            <label for="cif" class="form-label">CIF</label>
            <input type="text" class="form-control" id="cif" name="cif" required>
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
