<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Empleado as EmpleadoResource;
use App\Empleado;
use App\Departamento;
use Illuminate\Validation\Rule;
use Validator;


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
        $res = $request->json()->all();
        // TODO : revisar relacion departamento
        $rules = [
            'nomina' => 'required|integer|unique:empleados,nomina',
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'direccion' => 'required',
            'tipo' => ['required',Rule::in(['operario','confianza'])],
            'sueldo' => 'required|numeric',
            'departamento' => 'exists:departamentos,id'
        ];

        $validador = Validator::make($res,$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 422);
        }
                   
        $empleado = Empleado::create([
            'nomina' => $res['nomina'],
            'nombre' => $res['nombre'],
            'ap_paterno' => $res['ap_paterno'],
            'ap_materno' => $res['ap_materno'],
            'direccion' => $res['direccion'],
            'tipo_empleado' => $res['tipo'],
            'sueldo' => $res['sueldo'],
            'id_departamento' => $res['departamento']
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
        $rules = [
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'direccion' => 'required',
            'tipo' => ['required',Rule::in(['operario','confianza'])],
            'sueldo' => 'required|numeric',
            'departamento' => 'exists:departamentos,id'
        ];

        $validador = Validator::make($request->all(),$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 422);
        }       
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

    public function login(Request $request)
    {
        // revisar las credenciales
        $rules = [
            'usuario' => 'required',
            'password' => 'required'
        ];

        $validador = Validator::make($request->all(),$rules);
        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json($errors, 401);
        }
        
        if($request->usuario == 'administrador'){
            if(!($request->password == env('API_TOKEN_ADM'))){
                return response()->json(['status'=>false],401);
            }
            else{
                // devolver la llave
                return response()->json([
                    'status'=>true,
                    'token'=>env('TOKEN_ADM')
                ],200);
            }
            
        }
        else if($request->usuario == 'empleado'){
            if(!($request->password == env('API_TOKEN_EMP'))){
                return response()->json(['status'=>false],401);
            }
            else{
                return response()->json([
                    'status'=>true,
                    'token'=>env('TOKEN')
                ],200);                
            }
        }
    }

}
