<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosCompras extends Model
{
    protected $table = 'productos_compras';

    protected $fillable = [
        'nombre',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
