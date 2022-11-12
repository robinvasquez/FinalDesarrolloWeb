<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcaje extends Model
{
    use HasFactory;
    protected $table = 'tt_marcaje_detail';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'usuario_id','tipo_marcaje_id','fecha','hora'
    ];


}
