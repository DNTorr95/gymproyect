<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class asistencia extends Model
{
    use HasFactory;
    protected $table = 'asistencias';
    use SoftDeletes;

    protected $fillable = [
        'persona_id',
        'dia',
        'fecha',
    ];

    public function persona()
    {
        return $this->belongsTo(persona::class,'persona_id', 'id');
    }

}
