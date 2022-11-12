<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMarcaje extends Model
{
    use HasFactory;
    protected $table = 'tc_tipo_marcaje';
    protected $primarykey = 'tipo_marcaje_id';

    public $timestamps = true;
}
