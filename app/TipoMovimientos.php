<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMovimientos extends Model
{
    protected $table = 'tipo_movimiento';

    protected $fillable = [
        'nombre'
    ];

}
