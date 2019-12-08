<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        //dd('hit');
      //  dd(now()->format('s'));
      /* if(now()->format('s')%2){
          return $next($request);
      } */
        return $next($request);
        //return response("Not allowed");
    }
}
