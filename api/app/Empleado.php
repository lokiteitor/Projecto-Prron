<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    protected $primaryKey = 'nomina';
    public $incrementing = false;
    protected $fillable = ['nomina','nombre','ap_paterno',
    'ap_materno','direccion','tipo_empleado','sueldo','id_departamento'];
    public function departamento()
    {
        return $this->belongsTo('App\Departamento','id_departamento','id');
    }

    public function registros()
    {
        return $this->hasMany('App\Registro_comida','nomina','nomina');
    }
}
