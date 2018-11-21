<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Registro as RegistroResource;
use App\Registro_comida as Registro;
use App\Empleado;
use App\Http\Resources\RegistroCollection;
use Validator;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO : no mostrar todos los registros        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // fecha de hoy
        $fecha = date('Y-n-d');

        $rules = [
            'comida' => 'required|integer|exists:comidas,id',
            'nomina' => 'required|integer|exists:empleados,nomina',
        ];

        $validador = Validator::make($request->all(),$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 422);
        }        
        $registro = Registro::create([
            'id_comida' => $request->comida,
            'nomina' => $request->nomina
        ]);
        return new RegistroResource($registro);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO : quizas mostrar un solo registro sea innecesario
        // mostrar los registros de un empleado
        return null;
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
        // TODO : actualizar un registro es innecesario
        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO : lanza pagina de codigo 404 en vez de 204
        Registro::findOrFail($id)->delete();
        return response()->json(['mensaje'=>'Elemento eliminado'],204);

    }

    public function getEmpleadoRegistros(Request $request,$idEmpleado)
    {
        $registros = Empleado::findOrFail($idEmpleado)->registros()->paginate(30);
        return new RegistroCollection($registros);
    }
}
