<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidad extends Model
{
    use HasFactory;

    protected $table = 'calidades';
    protected $fillable = ['nombre', 'precio_compra', 'proveedor_id'];

    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }

    public function clientes()
    {

        return $this->hasMany(Cliente::class);
    }
}
