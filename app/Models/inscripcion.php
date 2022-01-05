<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class inscripcion extends Model
{
    use HasFactory;
    protected $table = 'inscripcions';
    use SoftDeletes;

    protected $fillable = [
        'paquete_id',
        'cliente_id',
        'fecha_ini',
        'fecha_fin',
        //'cod_qr',
        'total',
    ];

    public function paquete()
    {
        return $this->belongsTo(Paquete::class,'paquete_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id', 'id');
    }

    public function detalle_inscripcion()
    {
        return $this->hasMany(detalle_inscripcion::class, 'inscripcion_id', 'id');
    }
}
