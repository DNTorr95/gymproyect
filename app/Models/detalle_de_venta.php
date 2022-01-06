<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_de_venta extends Model
{
    use HasFactory;
    protected $table = 'detalle_de_ventas';
    use SoftDeletes;

    protected $fillable = [
        'nventa_id',
        'producto_id',
        'cantidad',
    ];

    public function notaDeVenta()
    {
        return $this->belongsTo(nota_de_venta::class,'nventa_id', 'id');
    }

    public function producto()
    {
        return $this->belongsTo(producto::class,'nventa_id', 'id');
    }
}
