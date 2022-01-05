<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class control_de_peso extends Model
{
    use HasFactory;
    protected $table = 'control_de_pesos';
    use SoftDeletes;

    protected $fillable = [
        'persona_id',
        'altura',
        'peso',
        'imc',
        'fecha'
    ]; 
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id', 'id');
    }
}
