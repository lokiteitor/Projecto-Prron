<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Departamento as DepartamentoResource;

class Empleado extends JsonResource
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
            'nomina' => $this->nomina,
            'ap_paterno' => $this->ap_paterno,
            'ap_materno' => $this->ap_materno,
            'direccion' => $this->direccion,
            'departamento' => new DepartamentoResource($this->departamento),
            'empleado' => $this->tipo_empleado,
            'sueldo' => $this->sueldo,
            'nombre' => $this->nombre
        ];
    }
}
