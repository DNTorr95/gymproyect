<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    use SoftDeletes;

    protected $fillable = [
        'nombre',
    ];

    public function disciplina()
    {
        return $this->hasMany(disciplina::class, 'area_id', 'id');
    }
}
