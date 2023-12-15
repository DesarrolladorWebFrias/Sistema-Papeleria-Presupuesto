<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'clave',
        'nombre',
        'cantidad',
        'precio',
        'iva',
        'medida',
        'user_id',
        'estatus_id',
        'subcategoria_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }

    public function subcategorias()
    {
        return $this->belongsTo(SubCategorias::class, 'subcategoria_id');
    }
}
