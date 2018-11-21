<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    //
    // protected $guarded = [];
    protected $fillable = ['nombre','descripcion','costo'];
    public function registros()
    {
        return $this->hasMany('App\Registro_comida','id_comida','id');
    }
}
