<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddlewar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        if (!empty(Auth::check())){
            if (Auth::user()->roleId >= 1 && Auth::user()->roleId < 5 ){
                return $next($request);
            }else if (Auth::user()->roleId == 7){
                return $next($request);
            }else{
                Auth::logout();
                return redirect(route('login'));
            }
        }
        else{
            Auth::logout();
            return redirect(route('login'));
        }

    }
}
