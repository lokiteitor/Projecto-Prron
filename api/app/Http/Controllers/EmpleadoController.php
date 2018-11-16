<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Empleado as EmpleadoResource;
use App\Empleado;
use App\Departamento;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return EmpleadoResource::collection(Empleado::paginate(30));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO : revisar relacion departamento
        $empleado = Empleado::create([
            'nomina' => $request->nomina,
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
            'direccion' => $request->direccion,
            'tipo_empleado' => $request->tipo,
            'sueldo' => $request->sueldo,
            'id_departamento' => $request->departamento
        ]);
        return new EmpleadoResource($empleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return new EmpleadoResource(Empleado::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO : actualizar departamento
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->only(['nombre','ap_paterno',
            'ap_materno','direccion','tipo','sueldo'
        ]));
        return new EmpleadoResource($empleado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return response()->json(['mensaje'=>'Elemento eliminado'],204);
    }
}
