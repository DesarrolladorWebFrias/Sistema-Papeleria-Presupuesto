<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable = [
        'clave','nombre', 'empresa_id'
    ];

     public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}
