<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    use SoftDeletes;

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'url_huella',
        'tel',
        'email',
        'foto',
        'fecha_naci',
        'genero',
        'tipo',
    ]; 

    public function administrador()
    {
        return $this->hasOne(administrador::class, 'persona_id', 'id');
    }

    public function cliente()
    {
        return $this->hasOne(cliente::class, 'persona_id', 'id');
    }

    public function instructor()
    {
        return $this->hasOne(instructor::class, 'persona_id', 'id');
    }

    public function asistencia()
    {
        return $this->hasMany(asistencia::class, 'persona_id', 'id');
    }


}
