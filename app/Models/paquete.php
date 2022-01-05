<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class paquete extends Model
{
    use HasFactory;
    protected $table = 'paquetes';
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion',
    ];

    public function disciplina()
    {
        return $this->hasMany(Disciplina::class, 'area_id', 'id');
    }

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class, 'inscripcion_id', 'id');
    }
}
