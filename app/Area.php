<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'id', 'nombre',
    ];

    public function products()
    {
        return $this->hasMany(Empleado::class);
    }
}
