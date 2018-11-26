<?php

namespace App\Http\Middleware;
use Validator;
use Closure;

class apiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validador = Validator::make($request->all(),[
            'user' => 'required',
            'api_token' => 'required'
        ]);
        if($validador->fails()){
            return response()->json(['mensaje'=>'No autorizado'],401);
        }

        if($request->user == 'administrador'){
            if(!($request->api_token == env('TOKEN_ADM'))){
                return response()->json(['mensaje'=>'No autorizado'],401);
            }
            return $next($request);
        }
        else if($request->user == 'empleado'){
            if(!($request->api_token == env('TOKEN'))){
                return response()->json(['mensaje'=>'No autorizado'],401);
            }
        }
        return $next($request);
    }
}
