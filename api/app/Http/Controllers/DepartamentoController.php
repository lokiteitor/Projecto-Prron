<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Departamento as DepartamentoResource;
use App\Departamento;

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
        $departamento = Departamento::create([
            'nombre' => $request->id,
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
        return new DepartamentoResource(Departamento::find($id))
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
        $departamento = Departamento::find($id);
        $departamento->update($request->only(['nombre','descripcion']));
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
        $departamento = Departamento::find($id);
        $departamento->delete();
        return response()->json(null,204);
    }
}
