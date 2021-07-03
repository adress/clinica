<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    static $reglas = [
        'nombre' => 'required',
        'email' => 'required|email',
        'sexo' => 'required|in:M,F',
        'area_id' => 'required',
        'descripcion' => 'required',
        'roles' => 'required'
    ];

    protected $perPage = 10;

    protected $fillable = [
        'nombre',
        'email',
        'sexo',
        'area_id',
        'boletin',
        'descripcion',
    ];

    public function sexoName()
    {
        if ($this->sexo == 'M') {
            return "Masculino";
        } else {
            return "Femenino";
        }
    }


    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
