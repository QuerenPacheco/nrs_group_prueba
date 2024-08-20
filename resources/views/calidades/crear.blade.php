@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Añadir Calidad</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('calidades.store') }}" method="POST" class="col-6 mx-auto">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" id="precio_compra" name="precio_compra" required step="0.01">
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <input type="text" class="form-control" id="proveedor" name="proveedor" value="{{ $proveedorPreseleccionado->nombre_empresa }}" required disabled>
            <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" value="{{ $proveedorPreseleccionado->id }}" required hidden>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
