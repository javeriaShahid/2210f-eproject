<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('user') && session()->get('user')['role'] == 0)
        {

        }
        if(!session()->has('user'))
        {
            return redirect(Route("login.view"))->with("error" , "You are not logged can't access this page");

        }
        return $next($request);
    }
}
