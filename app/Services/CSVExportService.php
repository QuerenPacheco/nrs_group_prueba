<?php

namespace App\Services;

use App\Models\Cliente;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Response;

class CSVExportService
{
    public function exportarCSV($modelo, $columnas, $nombreArchivo)
    {
        $objetos = $modelo::all();
        $cabecera = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$nombreArchivo",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];


        $callback = function () use ($objetos, $columnas) {
            $archivo = fopen('php://output', 'w');
            fputcsv($archivo, array_keys($columnas));

            foreach ($objetos as $objeto) {
                $fila = [];
                foreach ($columnas as $campo) {
                    if (strpos($campo, '->') !== false) {
                        $relacion = explode('->', $campo);
                        $relacionObjeto = $objeto;
                        foreach ($relacion as $rel) {
                            $relacionObjeto = $relacionObjeto->$rel;
                        }
                        $fila[] = $relacionObjeto;
                    } else {
                        $fila[] = $objeto->$campo;
                    }
                }
                fputcsv($archivo, $fila);
            }

            fclose($archivo);
        };

        return Response::stream($callback, 200, $cabecera);
    }
}
