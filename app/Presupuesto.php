<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuesto';

    protected $fillable = [
        'descripcion',
        'costo_total',
        'periodo',
        'estatus_presupuesto',
        'user_id',
        'autorizo_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function estatuspresupuesto()
    {
        return $this->belongsTo(EstatusCompras::class, 'estatus_presupuesto');
    }

    public function autorizo()
    {
        return $this->belongsTo(User::class, 'autorizo_id');
    }
}
