<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = array_slice(func_get_args(),2);

        if(auth()->check()){
            return $next($request);
        }else{
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }
}
