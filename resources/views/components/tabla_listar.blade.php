<table class="table table-bordered {{ $clase }}">
    <thead>
        <tr>
            <th>#</th>
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
                $precio_compra = $cliente->calidad->precio_compra ?? 0;
                $beneficio = $cliente->precio_venta - $precio_compra;
            @endphp
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellidos }}</td>
                <td>{{ $cliente->fecha_alta->format('Y-m-d') }}</td>
                <td>{{ $cliente->proveedor->nombre_empresa }}</td>
                <td>{{ $cliente->calidad->nombre }}</td>
                <td>{{ $cliente->precio_venta }}</td>
                <td>{{ $precio_compra }}</td>
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