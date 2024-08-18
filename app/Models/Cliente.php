<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'dni', 'fecha_alta', 'precio_venta', 'proveedor_id', 'calidad_id'];
    protected $casts = [
        'fecha_alta' => 'datetime',
    ];
    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);

    }
    
    public function calidad()
    {

        return $this->belongsTo(Calidad::class);

    }
}
