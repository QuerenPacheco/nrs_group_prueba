<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\CSVExportService;

use App\Models\Proveedor;

class ProveedorController extends Controller
{
    protected $csvExportService;

    public function __construct(CSVExportService $csvExportService)
    {
        $this->csvExportService = $csvExportService;
    }

    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.listar', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.crear');
    }

    public function store(Request $request)
    {
        $request->merge([
            'nombre_empresa' => trim($request->input('nombre_empresa')),
            'pais' => trim($request->input('pais')),
            'cif' => trim($request->input('cif')),
        ]);

        $validated = $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'cif' => 'required|string|max:9',
            'fecha_alta' => 'required|date'
        ], [
            'nombre_empresa.required' => 'El campo nombre no puede estar vacío.',
            'pais.required' => 'El campo país no puede estar vacío.',
            'cif.required' => 'El campo CIF no puede estar vacío.',
            'fecha_alta.required' => 'La fecha de alta no puede estar vacío.'
        ]);

        Proveedor::create($validated);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado con éxito.');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'cif' => 'required|string|size:9',
            'fecha_alta' => 'required|date',
        ],
        [
            'nombre_empresa.required' => 'El campo nombre no puede estar vacío.',
            'pais.required' => 'El campo país no puede estar vacío.',
            'cif.required' => 'El campo CIF no puede estar vacío.',
            'cif.size' => 'El CIF debe tener :max caracteres.',
            'fecha_alta.required' => 'La fecha de alta no puede estar vacío.'
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado con éxito.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado con éxito.');
    }

    public function exportarProveedores()
    {
        $columnas = [
            'Nombre' => 'nombre_empresa', 
            'País' => 'pais', 
            'CIF' => 'cif', 
            'Fecha de alta' => 'fecha_alta'
        ];


        return $this->csvExportService->exportarCSV(Proveedor::class, $columnas, 'listado_proveedores.csv');
    }
}
