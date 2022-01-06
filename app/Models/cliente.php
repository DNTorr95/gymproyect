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
        return $this->hasMany(Control_De_Peso::class, 'cliente_id', 'id');
    }

    public function inscripcion()
    {
        return $this->hasMany(Inscripcion::class, 'inscripcion_id', 'id');
    }

    public function notaDeVenta()
    {
        return $this->hasMany(NotaDeVenta::class, 'cliente_id', 'id');
    }

}
