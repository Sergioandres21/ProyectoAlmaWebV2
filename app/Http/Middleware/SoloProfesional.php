<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloProfesional
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
        switch(Auth::user()->tipo){
            case('1'):
                return redirect('home');
                break;                 
            case('2'):
                return redirect('user');
                break;
            case('3'):
                return $next($request);
                break;
        }  
    }
}
