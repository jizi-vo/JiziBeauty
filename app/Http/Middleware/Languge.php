<?php

namespace App\Http\Middleware;
use App;
use Closure;
use Illuminate\Http\Request;

class Languge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('locale')){
            App::setlocale(session()->get('locale'));

        }
        return $next($request);
    }
}
