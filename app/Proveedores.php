<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedor';

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion'
    ];

}
