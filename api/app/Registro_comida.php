<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_comida extends Model
{
    //
    // protected $guarded = [];
    protected $fillable = ['id_comida','nomina','fecha'];
    public function comida()
    {
        return $this->belongsTo('App\Comida','id_comida');
    }

    public function empleado()
    {
        return $this->belongsTo('App\Empleado','nomina');
    }
}
