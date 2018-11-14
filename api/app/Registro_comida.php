<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_comida extends Model
{
    //
    public function comida()
    {
        return $this->belongsTo('App\Comida','id_comida','id');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Empleado','nomina','nomina');
    }
}
