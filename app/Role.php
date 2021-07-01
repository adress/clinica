<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'nombre',
    ];

    public function products()
    {
        return $this->belongsToMany(Empleado::class);
    }
}
