<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Comida as ComidaResource;
use App\Comida;

class ComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ComidaResource::collection(Comida::paginate(5));
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
        $comida = Comida::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'costo' => $request->costo
        ]);

        return new ComidaResource($comida);
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
        return new ComidaResource(Comida::findOrFail($id));
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
        $comida = Comida::find($id);
        $comida->update($request->only(['nombre','descripcion','costo']));
        return new ComidaResource($comida);
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
        Comida::findOrFail($id)->delete();
        return response()->json(null,204);
    }
}
