<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class disciplina extends Model
{
    use HasFactory;
    protected $table = 'disciplinas';
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'paquete_id',
        'area_id',
    ]; 

    public function area()
    {
        return $this->belongsTo(Area::class,'area_id', 'id');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class,'paquete_id', 'id');
    }

    public function grupo()
    {
        return $this->hasMany(Grupo::class, 'disciplina_id', 'id');
    }

    public function detalle_inscripcion()
    {
        return $this->hasMany(detalle_inscripcion::class, 'disciplina_id', 'id');
    }
}
