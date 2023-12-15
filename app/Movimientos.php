<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    protected $table = 'movimientos';

    protected $fillable = [
        'tipo_movimiento_id','cantidad','total','productos_id','presupuesto_id','area_id','user_id'
    ];

    public function tipomovimiento()
    {
        return $this->belongsTo(TipoMovimientos::class, 'tipo_movimiento_id');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'productos_id');
    }

     public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
