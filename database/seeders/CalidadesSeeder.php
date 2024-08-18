<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Calidad;

class CalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedor_id = 4;

        DB::table('calidades')->insert([
            'nombre' => 'Calidad 1',
            'precio' => 12.05,
            'precio_compra' => 1.05,
            'proveedor_id' => $proveedor_id,
        ]);
    }
}
