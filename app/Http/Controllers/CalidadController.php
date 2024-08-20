<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\Calidad;

class CalidadController extends Controller
{
    public function index()
    {
        $calidades = Calidad::all();

        return view('calidades.listar', compact('calidades'));
    }

    public function create($proveedor_id = null)
    {
        $proveedores = Proveedor::all();
        $proveedorPreseleccionado = Proveedor::findOrFail($proveedor_id);
        return view('calidades.crear', compact('proveedores', 'proveedorPreseleccionado'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'nombre' => trim($request->input('nombre')),
            'precio' => trim($request->input('precio')),
            'precio_compra' => trim($request->input('precio_compra')),
        ]);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_compra' => 'required|numeric',
            'proveedor_id' => 'required|exists:proveedores,id',
        ], [
            'nombre.required' => 'El campo nombre no puede estar vacío.',
            'precio_compra.required' => 'El campo precio de compra no puede estar vacío.',
        ]);
        $proveedor_id = $validated['proveedor_id'];

        Calidad::create($validated);
        return redirect()->route('proveedores.show', $proveedor_id)->with('success', 'Calidad creada con éxito.');
    }


    public function edit($id)
    {
        $calidad = Calidad::findOrFail($id);
        $proveedorPreseleccionado = Proveedor::findOrFail($calidad->proveedor_id);
        return view('calidades.edit', compact('calidad', 'proveedorPreseleccionado'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio_compra' => 'required|numeric',
            'proveedor_id' => 'required|exists:proveedores,id',
        ], [
            'nombre.required' => 'El campo nombre no puede estar vacío.',
            'precio_compra.required' => 'El campo precio de compra no puede estar vacío.',
            'proveedor_id.required' => 'Debe seleccionar un proveedor, no puede estar vacío.',
        ]);

        $calidad = Calidad::findOrFail($id);
        $calidad->update($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Calidad actualizada con éxito.');
    }

    public function destroy($id)
    {
        $calidad = Calidad::findOrFail($id);
        $proveedor_id = $calidad->proveedor_id;
        $calidad->delete();

        return redirect()->route('proveedores.show', $proveedor_id)->with('success', 'Calidad eliminada con éxito.');
    }
}
