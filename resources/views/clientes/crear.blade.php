@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Añadir Cliente</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('clientes.store') }}" method="POST" class="col-6 mx-auto">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" required>
        </div>

        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de Venta</label>
            <input type="number" class="form-control" id="precio_venta" name="precio_venta" required step="0.01">
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor_id" required>
                <option value="">Seleccione un proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_empresa }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 div_calidad">
            <label for="calidad" class="form-label">Calidad</label>
            <p class="no_calidad text-center">No hay ninguna calidad asociada a este proveedor.</p>
            <select class="form-control" id="calidad" name="calidad_id" disabled required>
                <option value="">Seleccione una calidad</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.no_calidad').hide()
        $('#proveedor').on('change', function() {
            var proveedorId = $(this).val();
            if (proveedorId) {
                $.ajax({
                    url: '/calidades/' + proveedorId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        
                        $('#calidad').empty().prop('disabled', false);
                        if(data.length > 0){
                            $('#calidad').show();
                            $('.no_calidad').hide();
                            $.each(data, function(key, value) {
                                $('#calidad').append('<option value="">Seleccione una calidad</option>');
                                $('#calidad').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                            });
                        }else{
                            $('#calidad').hide();
                            $('.no_calidad').show();
                        }
                        
                    }
                });
            } else {
                $('#calidad').empty().prop('disabled', true);
                $('#calidad').append('<option value="">Seleccione una calidad</option>');
            }
        });
    });
    
</script>
@endsection
