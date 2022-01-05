<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nota_de_venta extends Model
{
    use HasFactory;
    protected $table = 'nota_de_ventas';
    use SoftDeletes;

    protected $fillable = [
        'administrador_id',
        'cliente_id',
        'monto',
        'fecha',
    ];

    public function administrador()
    {
        return $this->belongsTo(Administrador::class,'administrador_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id', 'id');
    }

    public function detalleVenta()
    {
        return $this->hasMany(DetalleDeVenta::class, 'nventa_id', 'id');
    }

}
