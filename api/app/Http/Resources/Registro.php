<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

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
            'comida' => ComidaResource::collection($this->id_comida),
            'empleado' => Empleado::collection($this->nomina),
            'fecha' => $this->fecha
        ]
    }
}
