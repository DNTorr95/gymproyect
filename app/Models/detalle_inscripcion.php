<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class detalle_inscripcion extends Model
{
    use HasFactory;
    protected $table = 'detalle_inscripcions';
    use SoftDeletes;

    protected $fillable = [
        'grupo_id',
        'disciplina_id',
        'inscripcion_id',
        'precio',

    ];

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class,'inscripcion_id', 'id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class,'grupo_id', 'id');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class,'disciplina_id', 'id');
    }

}
