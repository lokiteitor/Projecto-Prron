<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    public function departamento()
    {
        return $this->belongsTo('App\Departamento','id_departamento','id');
    }

    public function registros()
    {
        return $this->hasMany('App\Registro_comida','nomina','nomina');
    }
}
