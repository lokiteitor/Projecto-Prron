<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

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
            'id' => $this->nominda,
            'ap_paterno' => $this->ap_paterno,
            'ap_materno' => $this->ap_materno,
            'direccion' => $this->direccion,
            'departamento' => Departamento::collection($this->departamento),
            'empleado' => $this->tipo_empleado,
            'sueldo' => $this->sueldo
        ]
    }
}
