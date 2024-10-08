@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Calidad</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('calidades.update', $calidad->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $calidad->nombre) }}" required>
            </div>

            <div class="mb-3">
                <label for="precio_compra" class="form-label">Precio Compra</label>
                <input type="text" class="form-control" id="precio_compra" name="precio_compra" value="{{ old('precio_compra', $calidad->precio_compra) }}" required>
            </div>

            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" value="{{ $proveedorPreseleccionado->nombre_empresa }}" required disabled>
                <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" value="{{ $proveedorPreseleccionado->id }}" required hidden>
            </div>

           
            <button type="submit" class="btn btn-primary">Actualizar Calidad</button>
            <a href="{{ route('proveedores.show', $calidad->proveedor_id) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
