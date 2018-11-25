<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Departamento as DepartamentoResource;
use App\Departamento;
use Validator;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mostrar todos los registros
        return DepartamentoResource::collection(Departamento::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
        ];

        $validador = Validator::make($request->all(),$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 422);
        }


        $departamento = Departamento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);
        return new DepartamentoResource($departamento);
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
        $departamento = Departamento::findOrFail($id);
        return new DepartamentoResource($departamento);
        
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
        //
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
        ];

        $validador = Validator::make($request->all(),$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 422);
        }
                
        $departamento = Departamento::findOrFail($id);
        $departamento->nombre = $request->nombre;
        $departamento->descripcion = $request->descripcion;
        $departamento->save();
        return new DepartamentoResource($departamento);
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
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();        
        return response()->json(null,204);
        
    }
}
