<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVales extends Model
{
    protected $table = 'detalle_vales';

    protected $fillable = [
        'precio',
        'cantidad',
        'iva',
        'total',
        'product_id',
        'vale_id'
    ];

    public function productos()
    {
        return $this->belongsTo(Productos::class, 'product_id');
    }

    public function vales()
    {
        return $this->belongsTo(Vales::class, 'vale_id');
    }
}
