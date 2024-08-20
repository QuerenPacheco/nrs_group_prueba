@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Editar Cliente</h1>

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

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $cliente->apellidos) }}" required>
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $cliente->dni) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="{{ old('fecha_alta', $cliente->fecha_alta->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de Venta</label>
            <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="{{ old('precio_venta', $cliente->precio_venta) }}" required></td>
        </div>

        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select class="form-select" id="proveedor_id" name="proveedor_id" required>
                @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ $proveedor->id == old('proveedor_id', $cliente->proveedor_id) ? 'selected' : '' }}>
                    {{ $proveedor->nombre_empresa }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="calidad_id" class="form-label">Calidad</label>
            <select class="form-select" id="calidad_id" name="calidad_id" required>
                @foreach($calidades as $calidad)
                <option value="{{ $calidad->id }}" {{ $calidad->id == $cliente->calidad_id ? 'selected' : '' }}>
                    {{ $calidad->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('proveedor_id').addEventListener('change', function() {
        var proveedorId = this.value;
        var calidadSelect = document.getElementById('calidad_id');
        calidadSelect.disabled = true;
        calidadSelect.innerHTML = '<option value="">Seleccione una calidad</option>';

        if (proveedorId) {
            fetch(`/calidades/${proveedorId}`)
                .then(response => response.json())
                .then(data => {
                    calidadSelect.disabled = false;
                    data.forEach(calidad => {
                        var option = document.createElement('option');
                        option.value = calidad.id;
                        option.text = calidad.nombre;
                        calidadSelect.add(option);
                    });
                });
        }
    });
</script>
@endsection