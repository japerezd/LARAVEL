<?php

namespace App\Http\Middleware;

use Closure;

class CheckControl
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
       echo'INDEX';
        //dd('asas');
        if($request->idApp==1234){
            
            return redirect()->route("alumnos.create");
        }
        /* else{
            return redirect()->route("alumnos.index");
        } */
        return $next($request);
    }
}
