<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategorias extends Model
{
    protected $table = 'subcategorias';

    protected $fillable = [
        'nombre', 'categorias_id'
    ];

     public function categorias()
    {
        return $this->belongsTo(Categorias::class, 'categorias_id');
    }
}
