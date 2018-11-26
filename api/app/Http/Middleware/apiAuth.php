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

        if($request->header('Authorization') == env('TOKEN_ADM') || $request->header('Authorization') == env('TOKEN') ){
            return $next($request);                
        }else{
            return response()->json(['mensaje'=>'No autorizado'],401);
        }

        
    }
}
