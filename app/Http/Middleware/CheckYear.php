<?php

namespace App\Http\Middleware;

use Closure;

class CheckYear
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
        echo "Middleware Group <br>";
        if($request->year>=1980){
            return redirect()->route("novelas.create");
        }
        return $next($request);
    }
}
