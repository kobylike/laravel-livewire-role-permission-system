<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
          if(Auth::check()){

             /** @var \App\Models\User */
             $user =Auth::user();

             // Ensure the user is authenticated and has the role passed as a parameter
         if ( $user->hasRole($role)) {

            return $next($request);

            }

            }


        return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
    }
}
