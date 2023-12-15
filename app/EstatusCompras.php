<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusCompras extends Model
{
    protected $table = 'estatus_compras';

    protected $fillable = [
        'nombre'
    ];
}
