<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubAreas extends Model
{
    protected $table = 'sub_areas';

    protected $fillable = [
        'clave','nombre', 'area_id'
    ];

     public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
