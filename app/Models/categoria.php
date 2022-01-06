<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    use SoftDeletes;

    protected $fillable = [
        'nombre',
    ];

    public function producto()
    {
        return $this->hasMany(producto::class, 'categoria_id', 'id');
    }
}
