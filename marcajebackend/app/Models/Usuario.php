<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'tc_usuario';
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'nombre', 'contrasena', 'email','tipo_usuario','estado'
    ];
    public $timestamps = true;
}
