<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $fillable = ['nombre_empresa', 'pais', 'cif', 'fecha_alta'];
    protected $casts = ['fecha_alta' => 'datetime'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function calidades()
    {
        return $this->hasMany(Calidad::class);
    }
}
