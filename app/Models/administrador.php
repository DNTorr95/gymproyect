<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'administradors';
    use SoftDeletes;

    protected $fillable = [
        'persona_id',
        'usuario',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id', 'id');
    }

    public function notaDeVenta()
    {
        return $this->hasMany(NotaDeVenta::class, 'administrador_id', 'id');
    }
}
