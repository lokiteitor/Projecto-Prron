<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    public function empleados()
    {
        return $this->hasMany('App\empleado','nomina');
    }

}
