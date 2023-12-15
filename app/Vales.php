<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vales extends Model
{
   protected $table = 'vales';

    protected $fillable = [
        'total',
        'estatus',
        'presupuesto_id',
        'user_id'
    ];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuesto_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detallevale()
    {
        return $this->hasMany(DetalleVales::class, 'vale_id');
    }
}
