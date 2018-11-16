<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $fillable = ['nombre','descripcion'];
    public function empleados()
    {
        return $this->hasMany('App\empleado','nomina');
    }

}
