<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'descripcion',
        'costo_total',
        'factura',
        'fechacompras',
        'formadepago',
        'estatus_compra_id',
        'proveedor_id',
        'user_id '
    ];

    public function estatuscompras()
    {
        return $this->belongsTo(EstatusCompras::class, 'estatus_compra_id');
    }


    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
