<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompras extends Model
{
   protected $table = 'detalle_compras';

    protected $fillable = [
        'product_compra_id',
        'subcategoria_id',
        'tipo_pago',
        'cantidad',
        'unidad',
        'iva',
        'precio',
        'compra_id'
    ];

    public function productos()
    {
        return $this->belongsTo(Productos::class, 'product_compra_id');
    }

    public function subcategorias()
    {
        return $this->belongsTo(SubCategorias::class, 'subcategoria_id');
    }
}
