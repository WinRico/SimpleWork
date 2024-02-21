<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FreelancerMiddlewar
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a user is authenticated
        if (!empty(Auth::check())) {
            // Check if the authenticated user has roleId 6 (freelancer)
            if (Auth::user()->roleId == 6) {
                // Allow the request to proceed to the next middleware in the pipeline
                return $next($request);
            } else {
                // If the authenticated user does not have roleId 6, log them out and redirect to the login page
                Auth::logout();
                return redirect(route('login'));
            }
        } else {
            // If no user is authenticated, log them out and redirect to the login page
            Auth::logout();
            return redirect(route('login'));
        }
    }
}
