@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Clientes</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($clientes->count() > 0)
            @php
                $clase_tabla = '';
            @endphp
            @if($beneficioNegativo)
                <div class="alert alert-danger">
                    <p class="text-center">Existen clientes con beneficio negativo.</p>
                </div>
                @php
                    $clientesNegativo = [];
                    $clientesPositivos = [];
                    $clase_tabla = "table-danger";
                @endphp

                @foreach($clientes as $cliente)
                    @php
                        $precio_compra = $cliente->calidad->precio_compra ?? 0;
                        $beneficio = $cliente->precio_venta - $precio_compra;
                    @endphp

                    @if($beneficio < 0)
                        @php
                            $clientesNegativo[] = $cliente;
                        @endphp
                    @else
                        @php
                            $clientesPositivos[] = $cliente;
                        @endphp         
                    @endif
                @endforeach
                <x-tabla_listar :clientes="$clientesNegativo" :clase="$clase_tabla"></x-tabla_listar>
                @php
                    $clase_tabla = '';
                @endphp
                @if($clientesPositivos)
                    <x-tabla_listar :clientes="$clientesPositivos" :clase="$clase_tabla"></x-tabla_listar>
                @endif
            @else
                <x-tabla_listar :clientes="$clientes" :clase="$clase_tabla"></x-tabla_listar>
            @endif
        @else
            <p class="alert alert-info text-center">No hay clientes disponibles en este momento.</p>
        @endif

        <a href="{{ route('clientes.create') }}" class="btn btn-success">Añadir Cliente</a>
        <a href="{{ url('/exportarClientes') }}" class="btn btn-primary">Exportar a CSV</a>

    </div>

@endsection
