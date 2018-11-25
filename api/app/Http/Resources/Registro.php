<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Comida as ComidaResource;
use App\Http\Resources\Empleado as EmpleadoResource;
use App\Empleado;
use App\Comida;

class Registro extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_comida' => new ComidaResource(Comida::find($this->id_comida)),
            'nomina' => $this->nomina,
            'created_at' => $this->created_at
        ];
    }
}
