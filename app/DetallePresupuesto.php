<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePresupuesto extends Model
{
   	protected $table = 'detalle_presupuesto';

    protected $fillable = [
        'cantidadrequerida',
        'cantidad',
        'producto_id',
        'presupuesto_id',
    ];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }

    public function productos()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }
}

