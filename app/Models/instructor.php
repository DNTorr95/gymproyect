<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class instructor extends Model
{
    use HasFactory;
    protected $table = 'instructors';
    use SoftDeletes;

    protected $fillable = [
        'especialidad',
        'persona_id',
    ];


    public function persona()
    {
        return $this->belongsTo(persona::class,'persona_id', 'id');
    }

    public function grupo()
    {
        return $this->hasMany(grupo::class, 'instructor_id', 'id');
    }

}
