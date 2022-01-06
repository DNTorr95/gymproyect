<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    use SoftDeletes;

    protected $fillable = [
        'edad',
        'persona_id',
    ]; 
 

    public function persona()
    {
        return $this->belongsTo(persona::class,'persona_id', 'id');
    }

    public function peso()
    {
        return $this->hasMany(control_de_peso::class, 'cliente_id', 'id');
    }

    public function inscripcion()
    {
        return $this->hasMany(inscripcion::class, 'inscripcion_id', 'id');
    }

    public function notaDeVenta()
    {
        return $this->hasMany(nota_de_venta::class, 'cliente_id', 'id');
    }

}
