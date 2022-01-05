<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'precio',
        'stock', 
        'categoria_id',  
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id', 'id');
    }

    public function detalleVenta()
    {
        return $this->hasMany(DetalleDeVenta::class, 'producto_id', 'id');
    }
}
