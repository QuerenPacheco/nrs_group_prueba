<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proveedores')->insert([
            'nombre_empresa' => 'Proveedor 1',
            'pais' => 'Italia',
            'cif' => '123456789',
            'fecha_alta' => '1996-06-27',
        ]);
    }
}
