<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Proveedor;
use App\Models\Calidad;
use App\Services\CSVExportService;


class ClienteController extends Controller
{
    protected $csvExportService;

    public function __construct(CSVExportService $csvExportService)
    {
        $this->csvExportService = $csvExportService;
    }

    public function index()
    {
        $clientes = Cliente::all();
        $beneficioNegativo = $clientes->some(function ($cliente) {
            $precioCompra = $cliente->calidad->precio_compra ?? 0;
            return ($cliente->precio_venta - $precioCompra) < 0;
        });

        return view('clientes.listar', compact('clientes', 'beneficioNegativo'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('clientes.crear', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'nombre' => trim($request->input('nombre')),
            'apellidos' => trim($request->input('apellidos')),
            'dni' => trim($request->input('dni')),
            'precio_venta' => trim($request->input('precio_venta')),
        ]);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|size:9',            
            'fecha_alta' => 'required|date',
            'precio_venta' => 'required|numeric',
            'proveedor_id' => 'required|exists:proveedores,id',
            'calidad_id' => 'required|exists:calidades,id',
        ], [
            'nombre.required' => 'El campo nombre no puede estar vacío.',
            'apellidos.required' => 'El campo apellidos no puede estar vacío.',
            'dni.required' => 'El campo DNI no puede estar vacío.',
            'dni.size' => 'El DNI debe tener :size caracteres.',
            'fecha_alta.required' => 'La fecha de alta no puede estar vacío.',
            'precio_venta.required' => 'El precio de venta no puede estar vacío.',
            'proveedor_id.required' => 'Debe seleccionar no puede estar vacío.',
            'calidad_id.required' => 'Debe seleccionar no puede estar vacío.',
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    public function getCalidades($proveedor_id)
    {
        $calidades = Calidad::where('proveedor_id', $proveedor_id)->get();
        return response()->json($calidades);
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $proveedores = Proveedor::all();
        $calidades = Calidad::where('proveedor_id', $cliente->proveedor_id)->get();

        return view('clientes.edit', compact('cliente', 'proveedores', 'calidades'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|size:9',
            'fecha_alta' => 'required|date',
            'precio_venta' => 'required|numeric',
            'proveedor_id' => 'required|exists:proveedores,id',
            'calidad_id' => 'required|exists:calidades,id',
        ], [
            'nombre.required' => 'El campo nombre no puede estar vacío.',
            'apellidos.required' => 'El campo apellidos no puede estar vacío.',
            'dni.required' => 'El campo DNI no puede estar vacío.',
            'dni.size' => 'El DNI debe tener :size caracteres.',
            'fecha_alta.required' => 'La fecha de alta no puede estar vacío.',
            'precio_venta.required' => 'El precio de venta no puede estar vacío.',
            'proveedor_id.required' => 'Debe seleccionar no puede estar vacío.',
            'calidad_id.required' => 'Debe seleccionar no puede estar vacío.',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }

    public function exportarClientes()
    {
        $columnas = [
            'Nombre' => 'nombre',
            'Apellidos' => 'apellidos',
            'DNI' => 'dni',
            'Fecha de alta' => 'fecha_alta',
            'Precio de venta' => 'precio_venta',
            'Precio de compra' => 'calidad->precio_compra',
            'Proveedor' => 'proveedor->nombre_empresa',
            'Calidad' => 'calidad->nombre'
        ];


        return $this->csvExportService->exportarCSV(Cliente::class, $columnas, 'listado_clientes.csv');
    }
}
