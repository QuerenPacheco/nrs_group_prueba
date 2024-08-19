@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Clientes</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($beneficioNegativo)
            <div class="alert alert-danger">
                <p class="text-center">Existen clientes con beneficio negativo.</p>
            </div>
        @endif
        @if ($clientes->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha de Alta</th>
                        <th>Proveedor</th>
                        <th>Calidad</th>
                        <th>Precio de Venta</th>
                        <th>Precio de Compra</th>
                        <th>Beneficio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        @php
                            $precioCompra = $cliente->calidad->precio_compra ?? 0;
                            $beneficio = $cliente->precio_venta - $precioCompra;
                        @endphp
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->fecha_alta->format('Y-m-d') }}</td>
                            <td>{{ $cliente->proveedor->nombre_empresa }}</td>
                            <td>{{ $cliente->calidad->nombre }}</td>
                            <td>{{ $cliente->precio_venta }}</td>
                            <td>{{ $precioCompra }}</td>
                            <td>
                                @if ($beneficio < 0)
                                    <span class="text-danger">{{ $beneficio }}</span>
                                @else
                                    {{ $beneficio }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="alert alert-info text-center">No hay clientes disponibles en este momento.</p>
        @endif

        <a href="{{ route('clientes.create') }}" class="btn btn-success">Añadir Cliente</a>
        <a href="{{ url('/exportarClientes') }}" class="btn btn-primary">Exportar a CSV</a>

    </div>

@endsection
